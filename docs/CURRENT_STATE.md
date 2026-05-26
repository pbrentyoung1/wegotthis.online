# Current State

## Purpose

Track the actual state of the project so planning, design, and development work do not drift from reality.

## Current Decisions

- This repository is in Phase 1 scaffold and technical foundation work.
- The initial Laravel application scaffold exists at `resources/Laravel/starterkit`.
- The immediate focus is stabilizing the scaffold, local development, deployment assumptions, and canonical documentation before feature implementation.
- Figma will be used for design before application implementation begins.
- Codex and Claude Code will assist development.
- **Product name is ForWorship Creative.** Target app URL is `app.forworship.org`. Working codename `wegotthis.online` is retained until infrastructure transitions. See `/docs/decisions/BRANDING_DECISIONS.md`.
- **ForWorship is the ecosystem umbrella.** Public subdomains (`comms.forworship.org`, `creative.forworship.org`, etc.) are marketing/education entry points, not separate apps. The unified application lives at `app.forworship.org`.
- Phase 0 build readiness is complete enough to begin scaffolding. Backup/restore tooling remains blocked for production readiness. See `/docs/BUILD_READINESS_CHECKLIST.md`.

## Open Questions

- What backup tooling and restore process should be used before production?
- Which production infrastructure should replace hosting.com/cPanel staging?
- Which design artifacts are required before building the first application screens?

## Scaffold State (as of 2026-05-26)

- **Location:** `resources/Laravel/starterkit`
- **Stack:** Laravel 13, Vue 3, Inertia.js, Fortify auth, PostgreSQL, Inspinia
- **Local URL:** `http://127.0.0.1:8000/login`
- **Inertia SSR:** disabled by default for cPanel staging portability
- **Vite asset path:** `resources/js/views` (not `resources/js/pages`)
- **Tests:** 41 passing (`composer test`)
- **Frontend checks:** passing (`npm exec vue-tsc -- --noEmit`, `npm run build`)
- **Setup reference:** `resources/Laravel/starterkit/README.md`

## Key Scaffold Decisions

- The application base uses the Inspinia Vue + Inertia version adapted into the Laravel starterkit
- PostgreSQL defaults set in `.env.example`
- Fortify auth views wired to the Inspinia Vue view paths
- `/login` now submits to Fortify through Inertia instead of dummy sessionStorage auth
- The local seeded user is `test@example.com` with password `password`
- `DatabaseSeeder` is idempotent for the local seeded user
- Placeholder settings pages added so auth/settings routes and tests are stable
- Inspinia image asset paths fixed

## Notes

- Laravel, Composer, and npm dependencies belong inside `resources/Laravel/starterkit`.
- Only scaffold/default database migrations exist so far.
- No deployment pipeline exists yet.

Last updated: 2026-05-26
