# Google Drive Integration Strategy

## Purpose

Define the MVP file storage and asset integration strategy for ForWorship Creative.

For MVP, the platform should use a Google Drive-first integration model similar to how tools like Trello attach files and links without becoming the primary storage provider for every large media asset.

## Core Principle

Google Drive stores the files.

ForWorship Creative stores the meaning.

The platform should preserve metadata, relationships, workflow context, approvals, usage rights, consent status, search tags, and project/deliverable history while allowing churches to keep ownership of their files in Google Drive.

## Why This Matters

Church communications teams may manage terabytes of:

- Photos.
- Videos.
- Audio files.
- Design source files.
- Print-ready PDFs.
- Brand assets.
- Event media.
- Vendor files.
- Ministry archives.

ForWorship Creative should not require churches to migrate all files into a new proprietary storage system during MVP.

Instead, the platform should connect to Google Drive, reference Drive files and folders, and enrich them with project and asset metadata.

## MVP Storage Decision

For MVP:

- Google Drive should be the primary file storage integration.
- External links should be supported immediately.
- The platform should store metadata and provider references rather than storing every large file directly.
- The storage model should remain provider-abstracted so future providers can be added.

## Trello-Style Attachment Model

MVP should use a Trello-style attachment pattern:

- Attach Google Drive files or folders to Projects, Deliverables, Assets, comments, or closeout records.
- Store the file/folder reference and metadata.
- Let the file continue to live in the church’s Google Drive.
- Open the file through Google Drive when users need to view or edit it.
- Do not duplicate large media files unless intentionally downloaded or archived later.

## What ForWorship Stores

For a Google Drive file or folder, the platform may store:

```text
storage_provider: google_drive
provider_file_id
provider_folder_id
provider_url
web_view_link
web_content_link, if allowed
thumbnail_url
file_name
mime_type
file_extension
file_size
created_time
modified_time
owner/display owner
uploaded_by_profile_id
linked_by_profile_id
permission_status
metadata_json
```

For the Asset Library, the platform also stores:

```text
asset_category
asset_type
asset_source
project_id
deliverable_id
department_id
campaign/context links, future
tags
usage_rights
consent_status
visibility
status
notes
```

## What Google Drive Stores

Google Drive stores:

- Original files.
- Large media.
- Folder structure.
- Native Google Docs/Sheets/Slides.
- Permissions/sharing settings.
- Version history where available.
- Drive-side ownership.

## Provider Abstraction

The data model should not hard-code Google Drive as the only possible provider forever.

Use a provider abstraction such as:

```text
storage_provider
provider_file_id
provider_folder_id
provider_url
metadata_json
```

Possible future providers:

- google_drive.
- dropbox.
- onedrive.
- sharepoint.
- local.
- s3.
- google_cloud_storage.
- external_url.

## Recommended MVP Provider Priority

Recommended order:

1. External Link support.
2. Google Drive file/folder link support.
3. Google Drive picker/select existing files.
4. Google Drive upload/create folder support.
5. Dropbox or OneDrive provider support, future.
6. S3/object storage provider support, future.

## Folder Strategy

The app may create or recommend a Google Drive folder structure, but it should not require churches to perfectly follow one.

Recommended structure:

```text
ForWorship Creative
  /Projects
    /2026
      /Project Name
        /Deliverables
          /Social Posts
          /Video
          /Print
        /Final
        /Source
  /Asset Library
    /Brand Assets
    /Event Photos
    /Ministry Assets
    /Vendor Files
  /Uploads
    /Needs Review
  /Archive
```

The platform should support both:

- App-created folders.
- Existing Drive folders linked by the user.

## Asset Library Relationship

The Asset Library should become the metadata layer over Google Drive and other external file sources.

Examples:

| File Location | ForWorship Role |
|---|---|
| Google Drive project folder | Project file source. |
| Google Drive final social graphic | Deliverable-created asset record. |
| Google Drive VBS photos folder | Event/candid asset collection. |
| Google Drive brand logo folder | Brand asset library source. |
| Vendor Drive folder link | Linked/external asset source. |

## Permissions Strategy

Google Drive permissions can become complex.

MVP should keep permissions simple:

- Store Drive links and metadata.
- Do not fully mirror or manage all Google Drive permissions in MVP.
- Warn if a linked file may not be accessible.
- Allow Communications Manager or Organization Admin to manage Drive permissions manually.
- Use scoped platform permissions for metadata, comments, approvals, and project visibility.

Future versions may add:

- Permission checking.
- Permission sync helpers.
- Shared Drive selection.
- Folder permission templates.
- Access request workflows.

## Shared Drives

Google Shared Drives are preferable for church-owned files because ownership remains with the organization rather than an individual user.

MVP should support or at least plan for Shared Drive usage.

Preferred pattern:

- Church connects a Google Workspace account.
- Organization selects or creates a Shared Drive/folder for ForWorship Creative.
- Files created through the app live in that church-owned location.
- User-linked files may still point elsewhere, but app-created folders should favor the organization-owned Drive location.

## External Links

External links should be supported from the start.

Examples:

- Google Drive file.
- Google Drive folder.
- Canva design.
- Figma file.
- Dropbox folder.
- OneDrive link.
- Vendor portal.
- YouTube/Vimeo link.
- Podcast host link.
- Stock media source.

External links should still be represented as asset or attachment records with metadata.

## Upload Behavior

MVP may support one or more of the following:

### Link Existing File

User pastes a Drive URL or external URL.

The platform stores the link and metadata.

### Select Existing Drive File

User selects a file or folder through Google Picker.

The platform stores Drive IDs and metadata.

### Upload to Drive

User uploads a file through the platform, and the file is stored in the connected Google Drive folder.

The platform stores the returned Drive file ID and metadata.

The upload-to-Drive flow can come after link/select if MVP scope is tight.

## Closeout Behavior

Deliverable closeout should ensure final files, source files, and published links are linked or archived through the Asset Library.

If files live in Google Drive, closeout should capture:

- Final file links.
- Source file links.
- Folder links.
- Published/live URLs.
- File usage notes.
- Tags and metadata.
- Whether the files need to be moved into an archive folder.

## Risks and Guardrails

### Risk: Broken Links

If files are moved, deleted, or permission-restricted in Drive, links may break.

Mitigation:

- Store Drive file IDs where possible, not just URLs.
- Support link health checks later.
- Surface access warnings where possible.

### Risk: Permission Confusion

A user may see an asset record but not have Drive access.

Mitigation:

- Keep platform visibility separate from Drive visibility.
- Warn when Drive access may need to be granted.
- Let authorized users manage sharing manually in MVP.

### Risk: Personal Drive Ownership

Files in personal Drives may disappear if a staff member leaves.

Mitigation:

- Encourage Shared Drive use.
- Prefer app-created folders in organization-owned Drive locations.
- Flag personal-drive links as a potential risk later.

### Risk: Provider Lock-In

Building only for Google Drive may limit future customers.

Mitigation:

- Use provider abstraction.
- Store generic provider fields.
- Add Dropbox/OneDrive later without changing the core Asset model.

## MVP Recommendation

For MVP, include:

- External link attachments.
- Google Drive file/folder references.
- Provider abstraction fields.
- Asset metadata stored in ForWorship Creative.
- Project and Deliverable attachments linked to Google Drive files/folders.
- Basic Asset Library records for linked Drive files.
- Basic linked asset search/filtering.
- Closeout support for final Drive links and folders.

Defer:

- Full Drive permission management.
- Full file sync.
- Large file proxy/download storage.
- Drive-to-platform media migration.
- Dropbox/OneDrive provider implementation.
- Advanced link health checks.
- Automated folder governance.

## Related Docs

- `docs/product/ASSET_LIBRARY.md`
- `docs/technical/FILE_STORAGE.md`
- `docs/technical/SEARCH_STRATEGY.md`
- `docs/product/DELIVERABLE_LIFECYCLE.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-29
