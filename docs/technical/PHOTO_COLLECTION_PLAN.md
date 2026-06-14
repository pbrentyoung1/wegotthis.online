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

### HEIC handling

iPhones shoot HEIC by default. HEIC has no browser support outside Safari and
is not supported by PHP's built-in image functions without ImageMagick + libheif.

Strategy: **convert HEIC to JPEG on upload before storage.** All downstream
processing (EXIF extraction, thumbnails, crops, display) then works on JPEG.

Upload flow for HEIC files:
1. File arrives, MIME type detected as `image/heic` or `image/heif`
2. `ImageConversionService` converts to JPEG via ImageMagick
3. Converted JPEG replaces the original in memory before storage
4. EXIF extracted from converted JPEG (EXIF is preserved through conversion)
5. Stored as `.jpg` regardless of original extension

If ImageMagick with libheif is unavailable, reject the file with a helpful
message: "HEIC files aren't supported on this server. On iPhone, go to
Settings → Camera → Formats → Most Compatible to upload as JPEG."

**Hosting requirement:** ImageMagick compiled with `libheif` support. Confirm
this is available on the target hosting environment before deploying.

iOS note: Safari on iOS sometimes auto-converts HEIC to JPEG during the file
picker upload flow depending on iOS version. Do not depend on this — always
run the server-side conversion check regardless.

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

### `app/Services/ImageConversionService.php`

Handles format normalization before storage. Called by `PhotoUploadController`
on every upload before EXIF extraction.

- Detects MIME type from file content (not extension — extensions lie)
- HEIC/HEIF → converts to JPEG via ImageMagick, preserving EXIF
- JPEG/PNG/WebP → passed through as-is
- Returns path to normalized file (temp file if converted, original if not)
- Throws `ImageConversionException` if ImageMagick unavailable for HEIC

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

---

## Social Media Crops

### Overview

Staff click a photo in the grid, open the detail panel, and crop it to exact
platform dimensions without leaving ForWorship. The original file is never
modified — each crop is saved as a separate derived file linked to the original.
Cropper.js (already installed for avatar/banner upload) handles the browser-side
crop UI. Intervention Image handles server-side resize to exact pixel dimensions.

### User flow

1. Click photo in grid → detail panel opens
2. Click "Crop for social" → crop tool opens with platform preset selector
3. Select platform (e.g. "Instagram Square") → aspect ratio locks automatically
4. Drag/zoom the crop box to frame the shot
5. Click "Save crop" → server crops and resizes, saves derived file
6. Crop appears in the "Crops for social" section of the detail panel
7. Download individual crop or all crops as a zip

Staff can re-open and adjust any crop at any time. Previously saved crop
coordinates are restored so they can fine-tune rather than start over.

### Platform presets

| Platform | Format | Aspect ratio | Output dimensions |
|---|---|---|---|
| Instagram square | Post | 1:1 | 1080×1080 |
| Instagram portrait | Post | 4:5 | 1080×1350 |
| Instagram story / Reel | Story | 9:16 | 1080×1920 |
| Facebook post | Feed | 1.91:1 | 1200×630 |
| Facebook banner | Cover | 205:78 | 820×312 |
| Facebook story | Story | 9:16 | 1080×1920 |
| Twitter/X post | Feed | 16:9 | 1200×675 |
| YouTube thumbnail | Thumbnail | 16:9 | 1280×720 |
| LinkedIn post | Feed | 1.91:1 | 1200×627 |
| Website hero | Custom | 16:5 | 1600×500 |

Presets stored as a config array (`config/media_crops.php`) so new platforms
can be added without code changes.

### Database: `media_file_crops`

```sql
id                BIGINT PK
media_file_id     FK → media_files
organization_id   FK → organizations
platform          VARCHAR(50)       -- "instagram_square", "facebook_banner", etc.
label             VARCHAR(100)      -- "Instagram Square (1:1)"
file_path         VARCHAR(500)      -- S3/R2 path to the cropped/resized file
width             INTEGER           -- final output width in px
height            INTEGER           -- final output height in px
crop_x            INTEGER           -- crop origin x on original image
crop_y            INTEGER           -- crop origin y on original image
crop_w            INTEGER           -- crop width on original image
crop_h            INTEGER           -- crop height on original image
created_at / updated_at
```

Storing `crop_x/y/w/h` against the original image dimensions means the crop
can be re-opened and adjusted at any time. If the original is ever re-uploaded
or re-processed, crops can be regenerated.

### New routes

```php
Route::post('/projects/{project}/deliverables/{deliverable}/media/{mediaFile}/crops', [MediaCropController::class, 'store'])->name('deliverables.media.crops.store');
Route::get('/projects/{project}/deliverables/{deliverable}/media/{mediaFile}/crops/{crop}/download', [MediaCropController::class, 'download'])->name('deliverables.media.crops.download');
Route::delete('/projects/{project}/deliverables/{deliverable}/media/{mediaFile}/crops/{crop}', [MediaCropController::class, 'destroy'])->name('deliverables.media.crops.destroy');
Route::get('/projects/{project}/deliverables/{deliverable}/media/{mediaFile}/crops/download-all', [MediaCropController::class, 'downloadAll'])->name('deliverables.media.crops.download-all');
```

### `app/Http/Controllers/MediaCropController.php`

**`store(Request $request, ..., MediaFile $mediaFile): JsonResponse`**
- Validates: `platform` (must exist in config), `crop_x`, `crop_y`, `crop_w`,
  `crop_h` (all integers), `original_width`, `original_height`
- Verifies org scope
- Scales crop coordinates to actual image dimensions (Cropper.js sends
  coordinates relative to the displayed size, not the original pixel size)
- Uses Intervention Image to crop then resize to platform output dimensions
- Stores derived file to S3/R2 under
  `media/{org_id}/{deliverable_id}/crops/{media_file_id}/{platform}.jpg`
- Creates or updates `MediaFileCrop` record (upsert by media_file_id + platform)
- Returns JSON with crop URL for immediate preview update

**`download`** — streams single crop file

**`destroy`** — deletes crop from storage and DB

**`downloadAll`** — streams zip of all crops for this media file using
ZipStream-PHP

### `app/Models/MediaFileCrop.php`

- Belongs to `MediaFile`, belongs to `Organization`
- `url()` — signed S3/R2 URL
- `platformLabel(): string` — human-readable label from config
- `aspectRatio(): string` — e.g. "1:1", "16:9"

### `app/Services/ImageCropService.php`

Handles the server-side crop + resize operation:

```php
public function cropAndResize(
    string $sourcePath,
    int $cropX, int $cropY, int $cropW, int $cropH,
    int $outputWidth, int $outputHeight
): string  // returns path to temp output file
```

- Uses Intervention Image
- Crops from source at given coordinates
- Resizes to exact output dimensions (no letterboxing — fill)
- Returns path to temp file for upload to S3/R2
- Cleans up temp file after upload

### `config/media_crops.php`

```php
return [
    'instagram_square' => [
        'label'  => 'Instagram Square',
        'format' => 'Post',
        'width'  => 1080,
        'height' => 1080,
    ],
    'instagram_portrait' => [
        'label'  => 'Instagram Portrait',
        'format' => 'Post',
        'width'  => 1080,
        'height' => 1350,
    ],
    'instagram_story' => [
        'label'  => 'Instagram Story / Reel',
        'format' => 'Story',
        'width'  => 1080,
        'height' => 1920,
    ],
    'facebook_post' => [
        'label'  => 'Facebook Post',
        'format' => 'Feed',
        'width'  => 1200,
        'height' => 630,
    ],
    'facebook_banner' => [
        'label'  => 'Facebook Banner',
        'format' => 'Cover',
        'width'  => 820,
        'height' => 312,
    ],
    'facebook_story' => [
        'label'  => 'Facebook Story',
        'format' => 'Story',
        'width'  => 1080,
        'height' => 1920,
    ],
    'twitter_post' => [
        'label'  => 'Twitter / X Post',
        'format' => 'Feed',
        'width'  => 1200,
        'height' => 675,
    ],
    'youtube_thumbnail' => [
        'label'  => 'YouTube Thumbnail',
        'format' => 'Thumbnail',
        'width'  => 1280,
        'height' => 720,
    ],
    'linkedin_post' => [
        'label'  => 'LinkedIn Post',
        'format' => 'Feed',
        'width'  => 1200,
        'height' => 627,
    ],
    'website_hero' => [
        'label'  => 'Website Hero',
        'format' => 'Custom',
        'width'  => 1600,
        'height' => 500,
    ],
];
```

### JavaScript (`resources/js/pages/photo-crop.js`)

- Loads Cropper.js (already installed)
- On platform select: sets `aspectRatio` on the Cropper instance to match
  the selected preset
- On "Save crop": reads `getData()` from Cropper (returns x, y, width, height,
  scaleX, scaleY relative to original), POSTs to `crops.store` endpoint
- On success: updates the crop list in the detail panel without page reload
- On "Re-crop": loads existing crop coordinates via `setData()` to restore
  the previous crop position

### Detail panel UI (crops section)

```
Crops for social
────────────────────────────────────────
Instagram Square (1:1)    [✓ Saved]  [Re-crop]  [↓]
Facebook Post (1.91:1)    [Crop now]
Facebook Banner           [Crop now]
Instagram Story (9:16)    [✓ Saved]  [Re-crop]  [↓]
+ All other presets collapsed by default

[↓ Download all crops]
```

Saved crops show a small thumbnail preview inline. Unsaved presets show a
"Crop now" button. Clicking expands the crop tool inline (or in a modal) with
that preset's aspect ratio locked.

### Libraries required (all already planned)

| Need | Library |
|---|---|
| Browser crop UI | Cropper.js (already installed) |
| Server-side crop + resize | `intervention/image` (already planned) |
| Streaming zip of all crops | `maennchen/zipstream-php` (already planned) |

No new dependencies required.

### Test cases (additions to `PhotoCollectionTest.php`)

29. Staff can save a crop for a valid platform preset
30. Crop coordinates are scaled correctly from display size to original pixel size
31. Output file matches expected dimensions for each platform
32. Re-cropping updates the existing record (upsert, not duplicate)
33. Staff can download a single crop
34. Download all crops produces a zip with one file per saved crop
35. Staff can delete a crop
36. Invalid platform name rejected (not in config)

**HEIC conversion**
37. HEIC file uploads successfully and is stored as JPEG
38. EXIF data preserved through HEIC → JPEG conversion
39. HEIC file rejected with helpful message if ImageMagick unavailable

---

## Known Minefields

### File format issues
- **HEIC** — covered above. Convert on upload. Confirm libheif on server.
- **HEIF** — same as HEIC, different extension. Same treatment.
- **PNG with transparency** — if a PNG with an alpha channel gets cropped and
  saved as JPEG, transparency becomes black. Always flatten to white background
  before JPEG conversion.
- **Very large images** — a 48MP RAW-equivalent JPEG from a modern iPhone can
  be 25–40MB and 8000×6000px. Processing these synchronously in a web request
  will hit PHP memory limits. Set `memory_limit` generously (256MB+) or cap
  input resolution by downsampling on upload to a max of 4000px on the longest
  edge before storage.
- **Corrupted or truncated files** — `exif_read_data()` can throw warnings or
  fatal errors on malformed files. Always wrap in a try/catch and suppress PHP
  warnings with `@exif_read_data()`.
- **Files with wrong extensions** — detect MIME type from file content using
  `finfo_file()`, not the file extension. Never trust the extension alone.

### EXIF issues
- **EXIF orientation** — iPhones store photos in native sensor orientation and
  rely on EXIF orientation tag to tell software how to rotate for display. If
  you ignore this tag, portrait photos display sideways. Intervention Image's
  `orientate()` method fixes this automatically — call it on every image.
- **Timezone-naive EXIF timestamps** — EXIF DateTime has no timezone. A photo
  taken at "2026-06-15 10:30:00" could be any timezone. Store as-is, display
  as-is. Do not attempt timezone conversion unless the GPS coordinates are
  present and you reverse-geocode the timezone — that's post-MVP complexity.
- **Missing EXIF entirely** — screenshots, images edited in third-party apps,
  and images shared via WhatsApp/iMessage before uploading often have all EXIF
  stripped. The `exif_taken_at` column must be nullable. Always fall back to
  `created_at` for display purposes.
- **GPS coordinates in DMS format** — EXIF stores GPS as degrees/minutes/seconds
  in a nested array, not decimal degrees. `ExifExtractor` must convert:
  `DD + (MM/60) + (SS/3600)`, with sign flipped for S/W hemispheres.

### Upload experience issues
- **Multiple file selection on iOS Safari** — older iOS versions only allow
  selecting one file at a time from the file picker even with `multiple`
  attribute. Workaround: allow repeated single uploads, show a clear "Add more
  photos" button after each upload. iOS 15+ handles multiple selection properly.
- **Large file upload timeouts** — mobile uploads on slow event WiFi can time
  out on large files. Set generous PHP `max_execution_time` and `upload_max_filesize`
  limits. Consider chunked upload for files over 10MB (more complex, post-MVP).
- **Background tab throttling** — if the user switches apps while uploading,
  the browser may throttle or pause the JS fetch requests. Show a "keep this
  page open" notice during active uploads.
- **Duplicate uploads** — same photo uploaded twice (by same or different
  person). No deduplication in MVP. Consider a file hash (`md5` or `sha256`)
  stored on `media_files` for future duplicate detection.

### Storage and serving issues
- **Signed URL expiry** — if you use signed S3/R2 URLs for display, they expire.
  Don't store signed URLs in the database — generate them at display time with
  a TTL (e.g. 1 hour). Cache them briefly in the session if needed.
- **Storage costs at scale** — a busy church event with 50 photographers uploading
  10 photos each is 500 files, manageable. A large conference could be 5000+
  files at 5–10MB each = 25–50GB in a single event. Plan R2 costs accordingly.
  Consider storing at reduced resolution (max 4000px) rather than original size.
- **Public vs signed URLs** — if you use public R2 URLs (no signing), anyone
  with the URL can access the file forever. Signed URLs expire but add latency.
  For event photos this is probably fine with public URLs, but confirm with the
  organization's privacy expectations.

### Crop-specific issues
- **Crop coordinates drift** — Cropper.js returns coordinates relative to the
  image as displayed in the browser, not the original file dimensions. Must
  scale: `actual_x = display_x * (original_width / display_width)`. Easy to
  get wrong, worth a careful test.
- **Upscaling small photos** — if someone uploads a 800×600px photo and requests
  a 1080×1080 Instagram crop, Intervention Image will upscale, producing a
  blurry result. Warn the user if the source resolution is too low for the
  requested output dimensions.
- **JPEG compression artifacts on re-crop** — if a crop is saved as JPEG at
  low quality and then re-cropped, artifacts compound. Always crop from the
  original stored file, never from a previously saved crop. The stored
  `crop_x/y/w/h` coordinates reference the original.

### Security issues
- **File content spoofing** — a malicious actor could rename a PHP file as
  `.jpg` and upload it. Always validate MIME type from file content with
  `finfo_file()` AND check the file can be opened as an image with Intervention
  Image before storing. Reject anything that fails either check.
- **Path traversal** — generate your own filename on the server (UUID + .jpg),
  never use the original filename as the storage path. The original filename
  can be stored in the `file_name` column for display purposes only.
- **Zip bombs** — a crafted ZIP-within-JPEG (polyglot file) could be uploaded.
  The Intervention Image open check catches most of these since they can't be
  parsed as a valid image.

---

## Deferred

- Thumbnail generation (store originals for MVP, generate thumbs later with
  a queue job or on-demand via image transformation service)
- Text overlay / caption burn onto cropped image (event name, church branding)
- Saved crop templates per platform with brand-consistent positioning
- AI tagging / auto-labeling of photo content
- Direct publish to social platform APIs (Facebook Graph, Instagram Basic
  Display) — significant scope, well post-MVP
- Face detection / people tagging
- Duplicate detection (same image uploaded twice)
- Watermarking
