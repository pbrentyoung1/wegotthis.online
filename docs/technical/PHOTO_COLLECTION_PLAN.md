# Photo Collection Deliverable — Implementation Plan

## Summary

A new deliverable type ("Photo Collection") that generates a public upload link
for event photography. Anyone with the link can upload photos from any device —
no account required. Photos land in a media grid inside the deliverable, with
EXIF metadata extracted automatically. Staff curate and download images for
social posting, website use, or archival.

---

## User Stories

**Staff (before event)**
1. Create a project for the event (e.g., "Sunday Service — June 15")
2. Add a Photo Collection deliverable — upload link is auto-generated
3. Copy the link and send it via text, group chat, or email to volunteers
4. Optionally display the QR code on a projection screen for desktop users

**Volunteer / attendee (during event)**
1. Receive a link via text or group chat
2. Tap the link on their phone — opens a mobile-optimized upload page
3. Enter their name (optional), select multiple photos from camera roll
4. Upload — sees per-image progress, confirmation when done
5. Can return to the same link to upload more throughout the event

**Staff (after event)**
1. Open the deliverable — see all uploaded photos in a grid sorted by time taken
2. Review metadata (who shot it, when, what device)
3. Select favorites, download individually or as a zip
4. Mark selected images for use, move deliverable through normal lifecycle
5. Use team discussion tab to coordinate which images go where

---

## Architecture Decisions

### Deliverable type
`Photo Collection` is seeded as a named `DeliverableType`. When this type is
selected, the deliverable show page renders a photo grid instead of the standard
brief tab, and the sidebar shows the upload link card.

### Upload URL format
Primary: `/upload/{slug}` where slug is human-readable and unique.

Generated from deliverable title + short random suffix:
`sunday-service-june-15-x4k2` (slugified title + 4-char random suffix)

This is typeable if someone sees it on a screen, short enough to share in chat,
and still unique enough to prevent collisions.

Stored as `upload_slug` on the deliverable. Generated once on creation.

### QR code
Secondary — generated from the same URL on demand. Displayed in the deliverable
sidebar as a fallback for printed materials or projection screens. Library:
`simplesoftwareio/simple-qrcode`.

### Security model
The upload slug IS the access control. A 4-char suffix on a slugified title is
not cryptographically strong, but the risk is low (uploading photos, not
accessing data). Mitigations:

- `upload_open` boolean toggle — staff can close submissions after the event
- Optional expiry: `upload_closes_at` nullable datetime
- Per-IP rate limiting on the upload endpoint (max 50 images/hour per IP)
- File type validation: images only (JPEG, PNG, HEIC, WebP), max 20MB per file
- Virus/malware scanning deferred — acceptable for MVP with file type checks

### Metadata strategy

Two distinct layers:

**1. EXIF — read from the image file on upload (camera metadata)**

Extracted server-side using PHP's `exif_read_data()`. Stored in dedicated
columns. Never depends on the uploader providing anything — it's pulled
automatically from the file itself.

Fields extracted:
- `exif_taken_at` — DateTime the photo was taken (most reliable EXIF field)
- `exif_gps_lat`, `exif_gps_lng` — GPS coordinates if present
- `exif_device_make`, `exif_device_model` — camera make and model
- `exif_width`, `exif_height` — original pixel dimensions
- `exif_orientation` — raw orientation value (used to auto-rotate display)
- `exif_aperture`, `exif_shutter_speed`, `exif_iso` — exposure settings (stored
  for completeness, surfaced in detail view for photographers)

iOS/Safari note: Safari may strip GPS before upload. Store what arrives,
never depend on GPS being present.

**2. Custom metadata — added by staff in ForWorship (our fields)**

Stored in the database. Staff add these after upload during curation:

- `is_favorite` — quick single-tap star/heart for standout shots
- `tags` — array of freeform labels (JSON column): `["website", "social",
  "bulletin", "candid", "worship", "kids"]`
- `caption` — optional staff-written description or social copy draft
- `notes` — internal staff notes (not shown publicly)
- `approved_for_use` — formal sign-off that image is cleared for publication

**3. Write-back on download (for archival portability)**

When staff download photos, our custom metadata is written back INTO the
image files as IPTC/XMP data before zipping. This means downloaded files
carry their tags, captions, and notes with them — usable in Lightroom,
Photoshop, or any DAM system.

Library: `intervention/image` for image handling + `jenssegers/exif` or raw
`iptcembed()` for writing IPTC fields. ImageMagick preferred over GD for
IPTC write support.

Fields written back:
- IPTC Caption → `caption`
- IPTC Keywords → `tags` (comma-separated)
- IPTC Special Instructions → `notes`
- EXIF fields preserved as-is from original

### Storage
Files stored in S3/R2 under `media/{organization_id}/{deliverable_id}/{filename}`.
Organization-scoped paths prevent cross-tenant access even in a shared bucket.

---

## Database

### New column on `deliverables`
```sql
upload_slug    VARCHAR(100) NULLABLE UNIQUE  -- e.g. "sunday-service-june-15-x4k2"
upload_open    BOOLEAN DEFAULT TRUE
upload_closes_at TIMESTAMP NULLABLE
```

Migration: `add_photo_collection_columns_to_deliverables_table`

### New table: `media_files`
```sql
id                    BIGINT PK
organization_id       FK → organizations
deliverable_id        FK → deliverables

-- Upload provenance
uploader_name         VARCHAR(100) NULLABLE   -- name entered on upload form
uploader_ip           VARCHAR(45)             -- for rate limiting / audit
uploaded_at           TIMESTAMP               -- when it arrived (= created_at alias)

-- File storage
file_path             VARCHAR(500)            -- S3/R2 path
file_name             VARCHAR(255)            -- original filename
file_size             INTEGER                 -- bytes
mime_type             VARCHAR(100)

-- EXIF (camera metadata, read from file on upload)
exif_taken_at         TIMESTAMP NULLABLE      -- when the photo was taken
exif_gps_lat          DECIMAL(10,7) NULLABLE
exif_gps_lng          DECIMAL(10,7) NULLABLE
exif_device_make      VARCHAR(100) NULLABLE   -- e.g. "Apple"
exif_device_model     VARCHAR(100) NULLABLE   -- e.g. "iPhone 15 Pro"
exif_width            INTEGER NULLABLE
exif_height           INTEGER NULLABLE
exif_orientation      SMALLINT NULLABLE       -- raw EXIF orientation 1-8
exif_aperture         VARCHAR(20) NULLABLE    -- e.g. "f/1.8"
exif_shutter_speed    VARCHAR(20) NULLABLE    -- e.g. "1/500"
exif_iso              INTEGER NULLABLE

-- Custom metadata (added by staff during curation)
is_favorite           BOOLEAN DEFAULT FALSE   -- quick star/heart
approved_for_use      BOOLEAN DEFAULT FALSE   -- cleared for publication
caption               TEXT NULLABLE           -- staff caption / social copy draft
notes                 TEXT NULLABLE           -- internal staff notes
tags                  JSONB DEFAULT '[]'      -- ["website","social","bulletin"]

created_at / updated_at
```

**Sorting options supported by this schema:**
- By time taken (`exif_taken_at`) — chronological event order
- By upload time (`created_at`) — order received
- By uploader (`uploader_name`) — group by contributor
- By favorites (`is_favorite DESC`) — stars first
- By approved (`approved_for_use DESC`)
- By tag (PostgreSQL JSONB `@>` operator: `tags @> '["website"]'`)

**Filtering options:**
- Uploader name
- Tag (single or multiple)
- Favorites only
- Approved only
- Date range (taken_at)
- Device make/model

---

## Routes

```php
// Public — no auth
Route::get('/upload/{slug}', [PhotoUploadController::class, 'show'])->name('upload.show');
Route::post('/upload/{slug}', [PhotoUploadController::class, 'store'])->name('upload.store');

// Authenticated — inside deliverable
Route::get('/projects/{project}/deliverables/{deliverable}/media', [DeliverableMediaController::class, 'index'])->name('deliverables.media');
Route::patch('/projects/{project}/deliverables/{deliverable}/media/{mediaFile}', [DeliverableMediaController::class, 'update'])->name('deliverables.media.update');
Route::patch('/projects/{project}/deliverables/{deliverable}/media/{mediaFile}/favorite', [DeliverableMediaController::class, 'toggleFavorite'])->name('deliverables.media.favorite');
Route::delete('/projects/{project}/deliverables/{deliverable}/media/{mediaFile}', [DeliverableMediaController::class, 'destroy'])->name('deliverables.media.destroy');
Route::get('/projects/{project}/deliverables/{deliverable}/media/download', [DeliverableMediaController::class, 'download'])->name('deliverables.media.download');
```

---

## Files to Create

### `app/Http/Controllers/PhotoUploadController.php`

**`show(string $slug): View`**
- Finds deliverable by `upload_slug`
- Aborts 404 if not found
- Aborts 410 (Gone) if `upload_open = false` or `upload_closes_at` has passed
- Returns `upload.show` view with deliverable title and project name

**`store(Request $request, string $slug): JsonResponse`**
- Rate limit: 50 requests/hour per IP via `RateLimiter`
- Validates: `file` required, image mime type, max 20MB
- Finds deliverable by slug, checks open status
- Stores file to S3/R2
- Extracts EXIF via `exif_read_data()`
- Creates `MediaFile` record
- Returns JSON `{ success: true, filename: '...' }` for AJAX progress updates

Accepts multiple files via repeated POST (one file per request from the frontend
to enable per-image progress tracking).

### `app/Http/Controllers/DeliverableMediaController.php`

**`index`** — returns media grid view (authenticated, org-scoped); accepts
sort/filter query params: `sort`, `uploader`, `tag`, `favorites_only`,
`approved_only`

**`update(MediaFile $mediaFile)`** — PATCH: updates caption, notes, tags,
is_favorite, approved_for_use from detail panel form

**`toggleFavorite`** — quick PATCH for single-tap star toggle (returns JSON
for JS update without full page reload)

**`destroy`** — deletes file from S3/R2 and DB record (managers only)

**`download`** — accepts `ids[]` param for selected subset, or all if empty;
calls `MediaFileMetadataWriter` on each file before zipping; streams zip

### `app/Models/MediaFile.php`

- Belongs to `Deliverable`, belongs to `Organization`
- `url()` — returns signed S3/R2 URL for display
- `thumbnailUrl()` — returns a smaller version (generate on upload or on-demand)
- `displayTakenAt()` — returns `exif_taken_at` if present, otherwise `created_at`
  (always have a time to sort by)
- `tagsArray(): array` — casts JSONB tags to PHP array
- `hasTag(string $tag): bool`
- Scopes: `favorite()`, `approvedForUse()`, `withTag(string $tag)`,
  `byUploader(string $name)`, `orderByTaken()`, `orderByUploaded()`
- Cast: `tags` → `array` via Laravel cast

### `app/Services/ExifExtractor.php`

Wraps `exif_read_data()`. Responsibilities:
- Normalize GPS coordinates from DMS (degrees/minutes/seconds) to decimal float
- Parse EXIF DateTime string into a Carbon instance
- Normalize aperture, shutter speed to human-readable strings
- Handle missing fields gracefully — returns null for absent values
- Returns a typed array with all extracted fields

### `app/Services/MediaFileMetadataWriter.php`

Writes custom metadata back into image files before download. Used by
`DeliverableMediaController::download()`.

- Takes a `MediaFile` record and a temp copy of the image file
- Writes IPTC Caption-Abstract → `caption`
- Writes IPTC Keywords → `tags` (one keyword per tag)
- Writes IPTC Special Instructions → `notes`
- Preserves all original EXIF data
- Returns path to the annotated file
- Library: PHP `iptcembed()` for JPEG IPTC, ImageMagick for other formats

---

## Views to Create

### `resources/views/upload/show.blade.php`

Public page — no nav, no auth shell. Clean and minimal.

- ForWorship logo (small, top left)
- Event name and project name (from deliverable + project)
- "Uploading photos for [Event Name]" heading
- Optional name field: "Your name (optional)"
- File picker: large tap target, "Tap to select photos" — `multiple` attribute,
  `accept="image/*"` so camera roll opens on mobile
- Per-file progress bars (JS fetch, one request per file)
- Running count: "3 of 7 uploaded"
- Success state: "Your photos have been received. Thank you!"
- Link to upload more (resets the form)
- Closed state: friendly message "Photo submissions for this event are now closed."

### `resources/views/upload/closed.blade.php`

Simple page shown when `upload_open = false` or past `upload_closes_at`.

### Photo grid on `deliverables/show.blade.php`

When `deliverable->deliverableType->name === 'Photo Collection'`, the main
content area shows:

**Toolbar (above grid)**
- Sort by: Time taken | Upload time | Uploader | Favorites first
- Filter by: Uploader (dropdown) | Tag (multi-select) | Favorites only | Approved only
- View: Grid | List
- Actions: "Download selected", "Download all", "Approve selected"

**Grid view**
- Responsive grid (2 cols mobile, 3-4 cols desktop)
- Each tile:
  - Thumbnail image
  - Star icon (tap to toggle `is_favorite`) — filled yellow if favorited
  - Uploader name + time taken (from EXIF or upload time)
  - Tag badges if any tags applied
  - Checkmark overlay when selected for bulk action
- Click tile → detail panel / lightbox

**Detail panel (slide-in or modal)**
- Full-size image
- All EXIF data displayed: taken at, device, GPS (if present), dimensions,
  aperture/shutter/ISO
- Uploader name + upload time
- Editable fields: Caption, Notes, Tags (freeform input with suggestions)
- Toggle: Is favorite, Approved for use
- Download this photo (with metadata written in)
- Delete button (managers only)

**List view**
- Table: thumbnail (small), filename, uploader, time taken, upload time,
  device, tags, favorite, approved, actions

### Upload link card in deliverable sidebar

New card (shown only for Photo Collection type):

```
Upload link
[https://app.forworship.org/upload/sunday-june-15-x4k2]  [Copy]
Submissions: Open  [Close]
Closes: [date picker or "Never"]

[Show QR code ▼]   ← collapsible

47 photos received
```

---

## Slug Generation

```php
private function generateUploadSlug(string $title): string
{
    $base = Str::slug($title);
    $suffix = Str::lower(Str::random(4));
    $slug = "{$base}-{$suffix}";

    // Ensure uniqueness
    while (Deliverable::where('upload_slug', $slug)->exists()) {
        $suffix = Str::lower(Str::random(4));
        $slug = "{$base}-{$suffix}";
    }

    return $slug;
}
```

Called in `DeliverableManagementService::create()` when type is Photo Collection.

---

## JavaScript (upload page)

Vanilla JS, no framework. Pattern:
- On file input change, iterate selected files
- For each file: create a `FormData`, `fetch()` POST to `/upload/{slug}`
- Show individual progress bar per file (using `XMLHttpRequest` for progress events,
  or `fetch()` with ReadableStream)
- Mark each file done/failed independently
- No page reload required

File: `resources/js/pages/photo-upload.js`
Added to `vite.config.js` input array.

---

## Test Cases (`tests/Feature/PhotoCollectionTest.php`)

**Upload**
1. Upload page loads for open collection
2. Upload page returns 410 for closed collection
3. Upload page returns 404 for unknown slug
4. Photo uploads successfully — MediaFile record created with correct fields
5. EXIF timestamp extracted and stored on upload
6. EXIF GPS coordinates normalized from DMS to decimal
7. Missing EXIF fields stored as null (no error)
8. Rate limit blocks excessive uploads from same IP
9. Non-image file rejected (PDF, video, etc.)
10. File over 20MB size limit rejected
11. Upload closes when upload_closes_at has passed

**Media grid**
12. Staff can view media grid (authenticated, same org)
13. Staff from different org cannot view media grid (403)
14. Grid sorts by exif_taken_at by default
15. Grid filters by uploader name
16. Grid filters by tag using JSONB containment
17. Grid filters favorites only
18. Grid filters approved only

**Metadata editing**
19. Staff can update caption, notes, tags on a media file
20. Staff can toggle is_favorite
21. Staff can toggle approved_for_use
22. Tags stored and retrieved as array

**Download**
23. Download all produces a zip with correct file count
24. Download selected subset produces zip with only selected files
25. Downloaded files contain IPTC caption matching stored caption
26. Downloaded files contain IPTC keywords matching stored tags

**Deletion**
27. Manager can delete a media file — removed from storage and DB
28. Non-manager cannot delete a media file (403)

---

## Deferred

- Thumbnail generation (store originals for MVP, generate thumbs later with
  a queue job or on-demand via image transformation service)
- AI tagging / auto-labeling of photo content
- Direct posting to social platforms from the media grid
- Face detection / people tagging
- Duplicate detection (same image uploaded twice)
- Watermarking
