# Media Library

## Purpose

Define how media assets are organized, described, found, and reused.

## Current Decisions

- Media library concepts include branding assets, photos, print assets, project files, artwork, tags, version, notes, status, uploader, time added, where asset has been used, people in image, and relevance/context.
- Media assets should eventually relate back to projects when appropriate.
- Media assets should include rights, release, and usage metadata from the beginning.
- MVP metadata under consideration includes source/photographer, copyright/license notes, usage permission status, contains minors, approved for public use, approved channels, expiration/restriction notes, people tagged if known, department/ministry context, and event/project/campaign relationship.
- Media Library search should be supported by strong metadata and PostgreSQL full-text search in MVP.

## Open Questions

- What asset types are required for MVP?
- What metadata is required versus optional?
- How should usage history be tracked?
- Which rights/release fields are required before an asset can be marked approved for public use?
- How should permissions limit access to sensitive photos, minors, source files, and restricted assets?

## Notes

- Plan for long-term findability and reuse, not just file upload.
- Rights and release metadata is especially important for churches using photos of minors, congregants, ministry events, and externally sourced media.
- Search strategy is documented in `/docs/technical/SEARCH_STRATEGY.md`.

Last Updated: 2026-05-24
