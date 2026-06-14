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

### EXIF extraction
Run server-side on every uploaded file using PHP's `exif_read_data()`.
Store what's present, gracefully handle missing fields.

Fields extracted:
- `exif_taken_at` — DateTime from EXIF (most reliable field)
- `exif_gps_lat`, `exif_gps_lng` — GPS coordinates if present
- `exif_device_make`, `exif_device_model` — camera device info
- `exif_width`, `exif_height` — image dimensions

iOS/Safari note: Safari may strip GPS data before upload. Store what arrives,
don't depend on GPS being present.

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
uploader_name         VARCHAR(100) NULLABLE   -- name entered on upload form
uploader_ip           VARCHAR(45)             -- for rate limiting / audit
file_path             VARCHAR(500)            -- S3/R2 path
file_name             VARCHAR(255)            -- original filename
file_size             INTEGER                 -- bytes
mime_type             VARCHAR(100)
exif_taken_at         TIMESTAMP NULLABLE
exif_gps_lat          DECIMAL(10,7) NULLABLE
exif_gps_lng          DECIMAL(10,7) NULLABLE
exif_device_make      VARCHAR(100) NULLABLE
exif_device_model     VARCHAR(100) NULLABLE
exif_width            INTEGER NULLABLE
exif_height           INTEGER NULLABLE
selected_for_use      BOOLEAN DEFAULT FALSE   -- staff marks favorites
created_at / updated_at
```

---

## Routes

```php
// Public — no auth
Route::get('/upload/{slug}', [PhotoUploadController::class, 'show'])->name('upload.show');
Route::post('/upload/{slug}', [PhotoUploadController::class, 'store'])->name('upload.store');

// Authenticated — inside deliverable
Route::get('/projects/{project}/deliverables/{deliverable}/media', [DeliverableMediaController::class, 'index'])->name('deliverables.media');
Route::patch('/projects/{project}/deliverables/{deliverable}/media/{mediaFile}/select', [DeliverableMediaController::class, 'toggleSelect'])->name('deliverables.media.select');
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

**`index`** — returns media grid view (authenticated, org-scoped)
**`toggleSelect`** — flips `selected_for_use` on a media file
**`destroy`** — deletes file from storage and record from DB
**`download`** — streams a zip of all (or selected) media files

### `app/Models/MediaFile.php`

- Belongs to `Deliverable`, belongs to `Organization`
- `url()` — returns signed S3/R2 URL for display
- `thumbnailUrl()` — returns a smaller version (generate on upload or on-demand)
- Scope `selectedForUse()`, `orderByTaken()`

### `app/Services/ExifExtractor.php`

Wraps `exif_read_data()`, normalizes GPS coordinates from DMS to decimal,
handles missing fields gracefully, returns a plain array.

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

- Photo count + "sorted by time taken" label
- Responsive grid (2 cols mobile, 3-4 cols desktop)
- Each tile: thumbnail, uploader name, time taken, selected badge if marked
- Click → lightbox or full-size view with full metadata
- Toolbar: "Select all", "Download selected", "Download all"

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

1. Upload page loads for open collection
2. Upload page returns 410 for closed collection
3. Upload page returns 404 for unknown slug
4. Photo uploads successfully, MediaFile record created
5. EXIF timestamp extracted and stored
6. Rate limit blocks excessive uploads from same IP
7. Non-image file rejected
8. File over size limit rejected
9. Staff can view media grid (authenticated, same org)
10. Staff can toggle selected_for_use
11. Staff can delete a media file
12. Download endpoint streams a zip
13. Upload closes when upload_closes_at passes

---

## Deferred

- Thumbnail generation (store originals for MVP, generate thumbs later with
  a queue job or on-demand via image transformation service)
- AI tagging / auto-labeling of photo content
- Direct posting to social platforms from the media grid
- Face detection / people tagging
- Duplicate detection (same image uploaded twice)
- Watermarking
