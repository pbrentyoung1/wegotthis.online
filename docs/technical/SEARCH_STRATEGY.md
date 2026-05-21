# Search Strategy

## Purpose

Document the MVP search approach and future search options.

## Current Decisions

- Working decision: use PostgreSQL full-text search for MVP.
- Search should be supported by intentional metadata indexing from the beginning.
- The Media Library depends on strong search and metadata.

## MVP Searchable Data

- Project names
- Campaign names
- Deliverable names
- Asset names
- Tags
- Departments
- People in image, if tracked
- Status
- Usage history
- Brand asset names
- Request content
- Comments/activity where appropriate

## Future Options

- Meilisearch
- Typesense
- AI tagging
- Duplicate detection
- Advanced semantic search
- Image recognition or face/people metadata, where appropriate and permission-safe

## Open Questions

- Which search fields are required for first release?
- Which comments or activity records should be searchable?
- How should permissions filter search results?
- When would PostgreSQL search no longer be enough?

## Notes

- Future search tools should not be added until PostgreSQL search and metadata prove insufficient.

Last Updated: 2026-05-20
