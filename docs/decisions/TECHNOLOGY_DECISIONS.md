# Technology Decisions

## Purpose

Record technical stack and architecture decisions.

## Current Decisions

- Laravel 12 is the intended backend framework.
- Vue 3 and Inertia.js are the intended frontend application approach.
- PostgreSQL should be used from day one.
- Working decision: use a single PostgreSQL database with tenant-scoped records using `tenant_id`.
- Working decision: use PostgreSQL full-text search for MVP.
- Working decision: use transactional email with Postmark preferred unless cost or hosting constraints change the decision.
- Working decision: abstract file storage from day one, with S3-compatible production storage likely.
- Inspinia is the intended UI/admin foundation.
- Inspinia is an admin foundation, but stakeholder, approval, intake, and status flows must be designed mobile-first.
- `resources/Laravel/starterkit` is the planned application base.
- `resources/Laravel/inspinia` is the planned reference implementation for common patterns.
- Tailwind and/or Bootstrap will depend on how the chosen starterkit and reference implementation are actually structured.
- GitHub will be the source of truth.
- Initial hosting is expected to use a hosting.com reseller account with cPanel and SSH access available.

## Open Questions

- What deployment strategy is appropriate for cPanel/SSH hosting?
- What queue, storage, and cache services should be used initially?
- What exact backup tooling should be used?
- What final production storage provider should be used?
- Is Postmark final after cost and hosting constraints are reviewed?

## Notes

- Do not scaffold Laravel until explicitly instructed.
- Revisit stack decisions before implementation begins.
- Do not add SDKs or packages until the relevant implementation work is explicitly scoped.
- INSPINIA implementation guidance is documented in `/docs/INSPINIA.md`.

Last Updated: 2026-05-21
