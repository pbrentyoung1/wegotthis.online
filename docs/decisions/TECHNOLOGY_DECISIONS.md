# Technology Decisions

## Purpose

Record technical stack and architecture decisions.

## Current Decisions

- Laravel 13 is the approved backend framework because it is the checked-in application base.
- Vue 3 and Inertia.js remain an intended frontend direction, but adding them requires a separate reviewed implementation decision.
- PostgreSQL should be used from day one.
- Working decision: use a single PostgreSQL database with organization-scoped MVP records using `organization_id`.
- Working decision: use PostgreSQL full-text search for MVP.
- Working decision: use transactional email with Postmark preferred unless cost or hosting constraints change the decision.
- Working decision: use local server storage for the initial single-tenant proof/staging build, abstract storage from day one, and transition to S3-compatible storage when the product moves to scalable production/multi-tenant hosting.
- Working decision: use the current hosting.com/cPanel environment for early staging and proof-of-stack only.
- Working decision: move to a newer server or managed infrastructure before serious production use.
- PostgreSQL 13 is acceptable for early staging/proof if that is the available upgrade path; PostgreSQL 15/16+ is preferred for future production.
- Do not depend on host-specific constraints, cPanel-specific behavior, or old PostgreSQL behavior.
- Inspinia is the intended UI/admin foundation.
- Inspinia is an admin foundation, but stakeholder, approval, intake, and status flows must be designed mobile-first.
- `resources/Laravel/starterkit` is the planned application base.
- `resources/Laravel/inspinia` is the planned reference implementation for common patterns.
- Tailwind and/or Bootstrap will depend on how the chosen starterkit and reference implementation are actually structured.
- GitHub will be the source of truth.
- Initial early staging/proof hosting uses the current hosting.com/cPanel environment with SSH access available.

## Open Questions

- What deployment strategy is appropriate for cPanel/SSH hosting?
- What queue, storage, and cache services should be used initially?
- What exact backup tooling should be used?
- Which S3-compatible storage provider should be used at the multi-tenant transition?
- Which newer production server or managed infrastructure should replace hosting.com/cPanel staging?
- Is Postmark final after cost and hosting constraints are reviewed?

## Notes

- Do not replace or re-scaffold the checked-in Laravel base unless explicitly instructed.
- Revisit frontend stack decisions before product UI implementation begins.
- Do not add SDKs or packages until the relevant implementation work is explicitly scoped.
- INSPINIA implementation guidance is documented in `/docs/INSPINIA.md`.

Last Updated: 2026-06-10
