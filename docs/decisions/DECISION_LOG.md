# Decision Log

## Purpose

Record major product, technical, branding, and workflow decisions with context.

## Current Decisions

- Use this file as the index for decision history.
- Detailed decisions may live in specialized files in `/docs/decisions`.

## Open Questions

- What decision record format should be used once implementation begins?
- Should decisions be numbered?

## Notes

| Date | Area | Decision | Status | Link |
| --- | --- | --- | --- | --- |
| 2026-05-20 | Repository | Create documentation-first foundation before app scaffolding. | Accepted | TBD |
| 2026-05-21 | Brand | Treat the product as "we got this" in software form: calm, capable, warm, supportive, and conversational. | Accepted | `/docs/branding/BRAND_FOUNDATION.md` |
| 2026-05-21 | UX | Evaluate major UX decisions by whether they make users feel supported or managed. | Accepted | `/docs/product/SYSTEM_PHILOSOPHY.md` |
| 2026-05-21 | Typography | Use IBM Plex Serif for editorial brand voice, IBM Plex Sans for operational UI, and Caveat as a sparing human accent. | Accepted | `/docs/branding/TYPOGRAPHY.md` |
| 2026-05-24 | Brand / Naming | Product name is ForWorship Creative. Target app URL is `app.forworship.org`. Working codename `wegotthis.online` is retained until the domain transitions. "We got this." is preserved as the product promise. ForWorship is the ecosystem umbrella; public subdomains serve as marketing/education entry points, not separate apps. | Accepted | `/docs/decisions/BRANDING_DECISIONS.md` |
| 2026-06-10 | Technical | Treat Laravel 13 as the approved backend framework because it is the checked-in application base. | Accepted | `/docs/decisions/TECHNOLOGY_DECISIONS.md` |
| 2026-06-10 | Data | Use `organization_id` as the concrete MVP tenant key on organization-owned records. | Accepted | `/docs/technical/MVP_SCHEMA_MAP.md` |
| 2026-06-10 | Roles | Preserve the implemented Phase 1 system roles: Organization Admin, Communications Manager, Department Leader, Contributor, and Viewer. Model ownership, review, stakeholder, admin delegate, vendor, and external access context separately. | Accepted | `/docs/technical/AUTH_AND_PERMISSIONS.md` |
| 2026-06-10 | Scope | Use Projects -> Deliverables -> Tasks as the MVP operational spine. Keep optional Campaigns deferred until explicitly promoted. | Accepted | `/docs/MVP_SCOPE.md` |
| 2026-06-10 | Frontend | Use the checked-in Inspinia Blade, Tailwind 4, Preline, and JavaScript implementation directly for MVP. Do not add another frontend framework without a proven gap and explicit approval. | Accepted | `/docs/technical/FRONTEND_ARCHITECTURE.md` |
| 2026-06-11 | Conversations | Continue the requester-visible Request conversation as the stakeholder-visible Project conversation. Adding a Project Stakeholder adds them to that conversation and displays their avatar/name. Keep Project, Deliverable, and Task execution conversations private to assigned insiders. | Accepted | `/docs/product/CONVERSATIONS_MESSAGES_ACTIVITY.md` |
| 2026-06-11 | Tasks | Do not build Tasks before Projects and Deliverables. Clarification follow-up stores future Task intent, requester assignment, and a next-weekday target on the source Request/message for later conversion into a canonical Deliverable Task. | Accepted | `/docs/product/TASKS.md` |
| 2026-06-11 | Conversion | Implement Project conversion first: converting an active Request records acceptance and creates a Planning Project, Project membership, and selected Proposed Deliverables while preserving the source Request and stakeholder conversation. Keep Campaign and Initiative conversion deferred to a later slice. | Accepted | `/docs/product/COMMUNICATIONS_TRIAGE_WORKSPACE.md` |
| 2026-06-11 | Templates | Project Types provide adjustable default Deliverables during Request conversion. Generated Projects and Deliverables are independent copies; later template edits do not modify existing work. Task templates and workflow automation remain deferred. | Accepted | `/docs/product/TEMPLATES.md` |

Last updated: 2026-06-11
