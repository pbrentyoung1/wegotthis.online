# Asset Library

## Purpose

Define the Asset Library model for ForWorship Creative.

The Asset Library should be a lightweight digital asset management system, not merely a file attachment drawer.

The goal is to help churches preserve, find, reuse, govern, and understand media and creative assets across projects, deliverables, events, ministries, campaigns, and brand systems.

## Core Principle

Projects manage work.

Assets preserve institutional memory.

Google Drive stores the files.

ForWorship Creative stores the meaning.

The Asset Library should help answer:

> What is this asset, where did it come from, what can it be used for, where has it been used, and how can we find it again?

## Asset Library Direction

ForWorship Creative should pursue Option B:

> A true lightweight media asset management system, beginning with practical MVP support and expanding over time.

MVP should keep asset handling simple, but the data model should support future growth into a more complete asset library.

## MVP Storage Strategy

For MVP, ForWorship Creative should use a Google Drive-first, Trello-style attachment model.

That means:

- Google Drive stores the actual files where possible.
- ForWorship Creative stores metadata, relationships, workflow context, approvals, usage rights, consent status, visibility, tags, and project history.
- External links are supported immediately.
- The system should store provider references instead of duplicating every large file.
- The storage model should remain provider-abstracted for future Dropbox, OneDrive, SharePoint, S3, or other storage providers.

See `docs/technical/GOOGLE_DRIVE_INTEGRATION.md` for the technical integration strategy.

## Asset Categories

The platform should support several kinds of assets.

### Deliverable-Created Assets

Assets created for or connected to a Deliverable.

Examples:

- Final social graphic.
- Caption/copy file.
- Print-ready PDF.
- Source design file.
- Edited podcast audio.
- Exported video.
- Final sermon slide.
- Newsletter header.
- Approved landing page copy.

These assets should connect to the Deliverable, Project, Department, and strategic context where relevant.

### Event / Candid Assets

Assets added because of an event, gathering, service, ministry moment, or activity.

Examples:

- Sunday candid photos.
- VBS photos.
- Baptism photos.
- Youth camp photos.
- Mission trip photos.
- Volunteer appreciation photos.
- Ministry event videos.

These may be uploaded by:

- Staff.
- Volunteers.
- Lay Ministers.
- Parents.
- Photographers.
- Contractors.
- Communications team members.

Event/candid assets may not begin as part of a Deliverable, but they may later be used in Deliverables, Campaigns, Projects, or Brand/Storytelling efforts.

### Brand Assets

Official approved brand resources.

Examples:

- Logos.
- Logo variations.
- Brand marks.
- Color files.
- Font guidance.
- Graphic templates.
- Canva templates.
- Figma components.
- Ministry-specific logos.
- Campus logos.
- Style guide PDFs.
- Approved boilerplate copy.

Brand assets should carry stronger governance, approval, version, and usage rules than general event photos.

### Linked / External Assets

Links to assets stored outside the platform.

Examples:

- Vendor-provided VBS files.
- Dropbox folder.
- Google Drive folder.
- Canva design link.
- Figma file link.
- YouTube/Vimeo link.
- Podcast hosting link.
- Stock media source.
- Print vendor proof link.

Linked assets should preserve useful metadata even if the file itself is not stored in the platform.

The system should capture what the link is, who owns it, what it relates to, and whether the church has access or usage rights.

## Asset Types

Asset type describes the nature of the asset.

Recommended MVP/future types:

- Photo.
- Video.
- Audio.
- Design File.
- Print File.
- PDF.
- Document.
- Copy/Text.
- Logo.
- Template.
- Brand Guide.
- External Link.
- Folder Link.
- Google Drive File.
- Google Drive Folder.
- Stock Asset.
- Vendor File.
- Other.

## Asset Source

Asset source describes where the asset came from.

Examples:

- Created for Deliverable.
- Uploaded from Event.
- Uploaded by User.
- Submitted by Parent.
- Submitted by Volunteer.
- Submitted by Vendor.
- Imported from Drive.
- Linked from External Source.
- Brand Library.
- Stock Library.

## Asset Relationships

Assets may relate to multiple parts of the system.

Potential relationships:

- Organization.
- Department.
- Project.
- Deliverable.
- Campaign.
- Initiative.
- Program / Content Stream.
- Event.
- Sermon Series.
- Season.
- Ministry Area.
- Person/profile, where appropriate.
- Vendor/company, where appropriate.

MVP should prioritize simple relationships:

- Asset belongs to Organization.
- Asset may attach to Project.
- Asset may attach to Deliverable.
- Asset may attach to Department.
- Asset may use tags.
- Asset may be marked as Brand Asset.
- Asset may be linked/external.
- Asset may be a Google Drive file or folder reference.

Future versions may support richer many-to-many asset relationships.

## Asset Metadata

Metadata is the heart of the Asset Library.

Potential fields:

```text
assets
- id
- organization_id
- title
- description
- asset_category
- asset_type
- asset_source
- storage_provider
- provider_file_id, nullable
- provider_folder_id, nullable
- provider_url, nullable
- file_id / storage_path, nullable
- external_url, nullable
- web_view_link, nullable
- thumbnail_url, nullable
- mime_type, nullable
- file_size, nullable
- metadata_json, nullable
- project_id, nullable
- deliverable_id, nullable
- department_id, nullable
- uploaded_by_profile_id
- created_by_profile_id, nullable
- photographer_profile_id, nullable
- vendor_company_id, nullable
- event_date, nullable
- upload_date
- usage_rights
- consent_status
- visibility
- status
- tags
- notes
```

## Event / Candid Metadata

Event/candid assets may need:

- Event name.
- Event date.
- Location.
- Ministry/department.
- Photographer/uploader.
- People shown, if tagged and appropriate.
- Consent/release status.
- Usage notes.
- Sensitive/minor content flag.
- Album/grouping.
- Quality rating or favorite flag, future.

## Brand Asset Metadata

Brand assets may need:

- Brand category.
- Approved status.
- Version.
- Usage guidance.
- Do/don’t notes.
- Related ministry/campus.
- Source file.
- Final/export file.
- Template link.
- Owner.
- Last reviewed date.

## Linked Asset Metadata

Linked/external assets should capture:

- URL.
- Source platform.
- Owner/contact.
- Access notes.
- Expiration date, if any.
- Permission/usage notes.
- Related project/deliverable/event/brand context.
- Whether the file should be downloaded or archived later.

## Google Drive Asset Metadata

Google Drive assets should capture:

- Drive file ID.
- Drive folder ID, if applicable.
- Web view link.
- File/folder name.
- MIME type.
- Thumbnail URL, if available.
- Created/modified time where available.
- Owner/display owner where available.
- Permission/access notes.
- Whether the file lives in a Shared Drive or personal Drive, if detectable.

## Usage Rights and Consent

Asset records should support usage rights and consent metadata.

This is especially important for:

- Photos of children.
- Parent-submitted photos.
- Volunteer-submitted media.
- Stock media.
- Vendor-provided files.
- Licensed music.
- Video footage.

Possible usage rights values:

- Approved for internal use.
- Approved for public use.
- Approved for social media.
- Approved for print.
- Limited use.
- Unknown.
- Do not use.
- Expired.

Consent status values may include:

- Confirmed.
- Not required.
- Unknown.
- Restricted.
- Do not use.

MVP can keep this light but should not ignore the issue.

## Visibility and Access

Not every asset should be visible to every person.

Examples:

- Brand assets may be visible widely.
- Internal working files may be visible only to Communications.
- Parent-submitted photos may require review before use.
- Sensitive photos may be restricted.
- Vendor links may be visible only to project team members.
- Source files may be restricted while final files are broadly visible.

Recommended visibility values:

- Internal Only.
- Project Team.
- Department Visible.
- Organization Visible.
- Public/Approved for Use.
- Restricted.

## Asset Lifecycle

A simple asset lifecycle may include:

```text
Uploaded / Linked
  -> Needs Review
    -> Approved for Use
      -> In Use
        -> Archived
```

Not every asset needs all stages.

Brand assets may use:

```text
Draft
  -> Approved
    -> Current
      -> Deprecated
        -> Archived
```

MVP should keep lifecycle light and focus on status, visibility, and usage rights.

## Asset Use Tracking

The system should eventually track where assets are used.

Examples:

- Used in Project.
- Used in Deliverable.
- Used in Campaign.
- Used on Website.
- Used in Social Post.
- Used in Print Piece.
- Used in Email.

This helps answer:

> Where has this photo been used?

or:

> Which logo file is the approved current version?

MVP can begin by linking assets to Projects and Deliverables.

Future versions can add richer use tracking.

## Upload Sources

Assets may enter the system through:

- Direct upload by Communications.
- Direct upload by staff.
- Upload by volunteer or Lay Minister.
- Parent/community upload form, future.
- Vendor upload/link.
- External URL/link.
- Google Drive file/folder link.
- Google Drive picker/select existing file, future.
- Google Drive upload/create folder, future.
- Canva/Figma link.
- Closeout archive from deliverable.

## Parent / Community Submissions

Parent or community-submitted assets should not automatically become approved assets.

They should enter a review state first.

The system should capture:

- Submitter name.
- Submitter contact.
- Relationship to event/ministry.
- Consent/usage affirmation, if applicable.
- Event/context.
- Upload date.
- Review status.

MVP may defer public submission forms, but the data model should support future intake.

## Relationship to Deliverable Closeout

Deliverable closeout should push final assets into the Asset Library.

Examples:

- Final design files.
- Exported social assets.
- Final copy.
- Print-ready files.
- Source files.
- Published links.
- Approved video/audio.

Closeout should capture enough metadata so future users can find and reuse the work.

If files live in Google Drive, closeout should capture final file links, source file links, folder links, and published/live URLs rather than requiring large file duplication.

## Search and Discovery

Asset search should eventually support:

- Title.
- Description.
- Tags.
- Department.
- Project.
- Deliverable.
- Event.
- Date.
- Asset type.
- People/photographer.
- Usage rights.
- Brand status.
- Ministry area.
- External source.
- Storage provider.

MVP can begin with basic search/filtering.

## Storage Strategy

The platform should keep storage abstracted.

MVP should support external links and Google Drive references first to avoid managing terabytes of media directly.

Related storage principles:

- Do not hard-code local-only assumptions.
- Support external links where files remain outside the platform.
- Preserve metadata even when asset is externally hosted.
- Prefer Google Shared Drives for church-owned files when possible.
- Store Drive file IDs where possible, not just URLs.
- Support future migration or expansion to cloud/object storage.

See `docs/technical/FILE_STORAGE.md` and `docs/technical/GOOGLE_DRIVE_INTEGRATION.md` for technical storage decisions.

## MVP Recommendation

For MVP, include:

- Asset Library as a lightweight DAM concept.
- Google Drive-first / external-link-first storage strategy.
- Asset records with title, type, category, source, status, visibility, tags, and notes.
- Provider abstraction fields.
- External URL support.
- Google Drive file/folder reference support.
- Assets attached to Project and/or Deliverable.
- Brand asset flag/category.
- Event/candid asset category.
- Linked/external asset support.
- Basic usage rights and consent status fields.
- Basic search/filtering.
- Asset archive from Deliverable closeout.

If scope must be reduced, prioritize:

- Deliverable-created assets.
- Linked/external assets.
- Google Drive file/folder references.
- Brand assets.
- Basic event/candid uploads.

## Deferred

Defer:

- Public parent/community upload portal.
- AI image tagging.
- Face recognition.
- Advanced duplicate detection.
- Full rights management workflow.
- Advanced album/gallery management.
- Detailed usage analytics.
- Automated Drive/Canva/Figma sync.
- Google Drive permission management.
- Dropbox/OneDrive provider implementation.
- Version comparison.
- Full DAM permission engine.

## Future Expansion

Future versions may add:

- Public/parent upload forms.
- Moderated event galleries.
- Photo albums.
- AI-assisted tagging.
- Consent/release workflows.
- Google Drive picker/upload.
- Google Drive permission helpers.
- Dropbox/OneDrive integrations.
- Canva/Figma integration.
- Asset usage reports.
- Brand asset governance dashboards.
- Approved/current/deprecated brand asset workflows.
- Duplicate detection.
- Advanced rights and license tracking.

## Related Docs

- `docs/product/DELIVERABLE_LIFECYCLE.md`
- `docs/product/DELIVERABLES.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/BRAND_MANAGEMENT.md`
- `docs/product/DEPARTMENTS_AND_TEAMS.md`
- `docs/product/USER_MODEL_AND_PROFILES.md`
- `docs/technical/GOOGLE_DRIVE_INTEGRATION.md`
- `docs/technical/FILE_STORAGE.md`
- `docs/technical/SEARCH_STRATEGY.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-29
