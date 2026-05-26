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
| 2026-05-24 | Technical | Laravel 13 scaffold is live in `resources/Laravel/starterkit`. Stack: Laravel 13, Vue 3, Inertia.js, Fortify, PostgreSQL, Inspinia, Bootstrap Vue Next. Inertia SSR disabled for cPanel portability. 41 tests passing, audits clean. | Accepted | `docs/CURRENT_STATE.md`, `docs/technical/TECH_STACK.md` |

Last updated: 2026-05-24
