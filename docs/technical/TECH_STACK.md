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
- Tailwind and/or Bootstrap depending on final Inspinia seed
- hosting.com reseller account for initial hosting
- cPanel and SSH access available
- Transactional email with Postmark preferred unless cost or hosting constraints change the decision
- File storage abstraction with S3-compatible production storage likely
- Cloudflare R2 is a likely storage candidate
- GitHub as source of truth
- Codex and Claude Code for assisted development
- Figma for design
- Future optional connectors may include Planning Center and other external services, but no SDKs or packages have been selected.

## Open Questions

- Which Inspinia seed aligns best with the chosen stack?
- Should the application use Tailwind, Bootstrap, or both?
- Which testing stack should be standard?
- Should future integrations rely on framework HTTP clients, official SDKs, or custom service classes?
- What exact queue, cache, backup, and storage tooling should be used?
- Is Postmark final after cost and hosting constraints are reviewed?

## Notes

- Do not add dependencies until implementation starts.
- Do not install Planning Center SDKs or build API clients until integration work is explicitly scoped.
- Integration services should be modular and isolated from core business logic.
- Search, notifications, backups, storage, and tenant scoping are documented in `/docs/technical`.

Last Updated: 2026-05-20
