# API Strategy

## Purpose

Define how the application should expose or consume APIs over time.

## Current Decisions

- Laravel and the checked-in Inspinia Blade implementation are the current MVP application direction.
- No public API has been committed yet.
- Future integrations such as Planning Center, Google Docs, Dropbox, and OneDrive should be implemented through modular connector services.
- Core product behavior should not depend on external APIs.
- Working direction: future internal APIs may support notifications, magic links, approvals, file processing jobs, and external integrations.
- Planning Center, Google Docs, Dropbox, OneDrive, and similar connectors remain optional and post-MVP.

## Open Questions

- Are external integrations needed for social media, calendars, documents, or file storage?
- Should internal endpoints be designed as JSON APIs where helpful?
- Will vendors or church websites need API access later?
- Should integrations use OAuth, personal access tokens, or both depending on tenant needs?
- Which integrations require webhook endpoints?

## Notes

- Avoid premature API complexity before product workflows are clear.
- Keep integration APIs isolated behind service layers so churches without Planning Center remain fully supported.
- Keep document and storage connectors separate from the native file storage model; connectors should augment project context, not replace local storage in the initial build.
- Plan for sync logs, retries, rate limits, and partial failures before building API clients.
- Magic link review and approval endpoints must be scoped, revocable, and expiration-aware.
- File processing should be queue-oriented for thumbnails, previews, and future archive package generation.
- Notification APIs should support transactional email and in-app notification creation without coupling workflows to one provider.

Last Updated: 2026-05-24
