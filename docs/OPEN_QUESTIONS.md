# Open Questions

## Purpose

Maintain a central list of unresolved questions that block Phase 0 completion or Laravel scaffolding.

## Current Decisions

- Open questions should be captured instead of answered prematurely.
- Decisions should move from this file into the relevant decision log when resolved.
- Questions that do not block implementation belong in a decision log, checklist, or backlog instead of this file.

## Open Questions

- What exact backup and restore tooling should be standardized before production?
- What final production infrastructure should replace hosting.com/cPanel staging?
- What final production PostgreSQL version and provider should be used?
- When should ForWorship Creative migrate from hosting.com/cPanel staging to a newer production server or managed infrastructure?
- What long-running queue worker strategy should be used after the move to newer infrastructure?
- Which External Reviewer scenarios should allow selected file upload in MVP?
- Which email provider should be used if the Postmark preference changes?
- What exact local server path and disk quota should be used on hosting.com/cPanel?
- What final storage provider/path should be used for scalable production file storage?
- Which remaining Phase 0 blockers should be resolved before Laravel scaffolding begins?

## Resolved or Working Decisions

- Tenancy model: single PostgreSQL database with tenant-scoped records using `tenant_id`.
- Product hierarchy: Campaigns -> Projects -> Deliverables -> Tasks.
- Campaign/parent container concept: Campaign is optional above projects.
- Deliverable vs project boundary: Projects are operational containers; deliverables are production and approval units.
- Approval target: MVP approvals primarily attach to deliverables.
- External reviewer access: secure, time-bound magic links.
- Vendor access model: vendor-scoped External Reviewer access through secure links.
- Magic-link scope model: links are tenant-bound, scope-bound, action-bound, time-bound, and revocable.
- Communication channel: transactional email plus in-app notifications, with Postmark preferred early.
- Request lifecycle: requests are separate objects and may be draft, submitted, needs clarification, accepted, deferred, rejected, converted to project, or archived.
- Search MVP approach: PostgreSQL full-text search with intentional metadata indexing.
- Backups and retention: core product requirement before production.
- Audit log: meaningful activity and audit logging must be designed in early.
- Mobile/responsive priority: Inspinia is admin foundation, but stakeholder, approval, intake, and status flows should be mobile-first.
- Photo/copyright/release metadata: rights, release, and usage metadata should exist from the beginning.
- Communications system: project communication history is part of the MVP direction.
- Communication concepts: notifications, messages/comments, activity logs, and audit logs are related but distinct.
- Phase 0 readiness gate: only implementation-blocking questions stay in this file; other questions move to the roadmap, checklist, or decision logs.
- Task status model: canonical MVP task statuses are finalized and documented in `docs/product/TASKS.md`.
- Approval and review state model: canonical MVP approval/review states are finalized and documented in `docs/product/DELIVERABLES.md`.
- MVP permissions matrix: base role matrix is documented in `docs/technical/AUTH_AND_PERMISSIONS.md`.
- Review assignment model: budget, resources, design, brand, content, ministry, and final review are contextual assignments, not base roles.
- File storage direction: use local server storage for the initial single-tenant build, then transition to S3-compatible object storage when the product moves to multi-tenant hosting.
- Hosting posture: current hosting.com/cPanel environment is acceptable for early staging/proof, but not final serious production infrastructure.
- PostgreSQL posture: PostgreSQL 13 is acceptable for early staging/proof if needed; PostgreSQL 15/16+ is preferred for future production.

## Notes

- Add date and context when a question is significant.
- Link to resolved decisions when possible.
- Resolved items may still need implementation detail before coding.

Last Updated: 2026-05-24
