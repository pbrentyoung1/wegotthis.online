# Current State

## Purpose

Track the actual state of the project so planning, design, and development work do not drift from reality.

## Current Decisions

- This repository is in foundational setup.
- The project is not yet a Laravel application.
- The immediate focus is documentation, decision capture, and repository organization.
- Figma will be used for design before application implementation begins.
- Codex and Claude Code will assist development.
- **Product name is ForWorship Creative.** Target app URL is `app.forworship.org`. Working codename `wegotthis.online` is retained until infrastructure transitions. See `/docs/decisions/BRANDING_DECISIONS.md`.
- **ForWorship is the ecosystem umbrella.** Public subdomains (`comms.forworship.org`, `creative.forworship.org`, etc.) are marketing/education entry points, not separate apps. The unified application lives at `app.forworship.org`.
- Phase 0 build readiness is largely complete. Remaining blockers before Laravel scaffolding: hosting/deployment constraints and backup requirements. Approval states, review assignments, the MVP permissions matrix, and phased file storage direction are now documented. See `/docs/BUILD_READINESS_CHECKLIST.md`.

## Open Questions

- When should Laravel be scaffolded?
- Which environment should be used first for local development?
- Which design artifacts are required before building the first application screens?

## Notes

- No dependencies have been installed.
- No database schema exists yet.
- No deployment pipeline exists yet.

Last updated: 2026-05-24
