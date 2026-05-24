# Tech Stack

## Purpose

Document current technology direction and unresolved stack choices.

## Current Decisions

- Laravel 12
- Vue 3
- Inertia.js
- PostgreSQL
- Single PostgreSQL database with tenant-scoped records using `tenant_id`
- PostgreSQL full-text search for MVP
- Inspinia
- Inspinia as admin UI foundation, with mobile-first design for stakeholder, approval, intake, and status flows
- `resources/Laravel/starterkit` as the planned application base
- `resources/Laravel/inspinia` as the planned reference implementation for common patterns
- Tailwind and/or Bootstrap depending on how the chosen starterkit and reference implementation are actually structured
- hosting.com reseller account for initial hosting
- cPanel and SSH access available
- Transactional email with Postmark preferred unless cost or hosting constraints change the decision
- File storage abstraction with local server storage for the initial single-tenant build
- S3-compatible object storage deferred until the multi-tenant transition
- GitHub as source of truth
- Codex and Claude Code for assisted development
- Figma for design
- Future optional connectors may include Planning Center, Google Docs, Dropbox, OneDrive, and other external services, but no SDKs or packages have been selected.

## Open Questions

- Should the application use Tailwind, Bootstrap, or both?
- Which testing stack should be standard?
- Should future integrations rely on framework HTTP clients, official SDKs, or custom service classes?
- What exact queue, cache, and backup tooling should be used?
- Is Postmark final after cost and hosting constraints are reviewed?

## Notes

- Do not add dependencies until implementation starts.
- Do not install Planning Center SDKs or build API clients until integration work is explicitly scoped.
- Integration services should be modular and isolated from core business logic.
- Search, notifications, backups, storage, and tenant scoping are documented in `/docs/technical`.
- INSPINIA implementation guidance is documented in `/docs/INSPINIA.md`.

Last Updated: 2026-05-24
