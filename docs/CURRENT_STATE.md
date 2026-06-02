# Current State

## Purpose

Track the actual state of the project so planning, design, and development work do not drift from reality.

## Current Decisions

- This repository has moved from planning-only into early Phase 1 implementation.
- The Laravel starterkit exists at `resources/Laravel/starterkit`.
- Phase 1 foundation migrations have been merged into `main`.
- The immediate focus is the identity, organization, profile, department, role, and permission foundation.
- Figma will be used for design before application implementation begins.
- Codex and Claude Code will assist development.
- **Product name is ForWorship Creative.** Target app URL is `app.forworship.org`. Working codename `wegotthis.online` is retained until infrastructure transitions. See `/docs/decisions/BRANDING_DECISIONS.md`.
- **ForWorship is the ecosystem umbrella.** Public subdomains (`comms.forworship.org`, `creative.forworship.org`, etc.) are marketing/education entry points, not separate apps. The unified application lives at `app.forworship.org`.
- Phase 0 build readiness is complete enough to begin Phase 1 implementation. Approval states, review assignments, the MVP permissions matrix, ownership/visibility rules, and phased file storage direction are documented. See `/docs/BUILD_READINESS_CHECKLIST.md`.
- Phase 1 implementation currently includes only:
  - `organizations`
  - Laravel `users`
  - `profiles`
  - `departments`
  - `roles`
  - `permissions`
  - `role_permissions`
  - `profile_role_assignments`
- Phase 1 seed data exists for the demo organization, system roles, MVP permission keys, role-permission mappings, and a demo admin profile.
- Phase 1 focused tests cover idempotent seed data, profile uniqueness behavior, circular profile/department foreign keys, active role assignment uniqueness, and documented FK delete behavior.
- The system still must avoid building future-scope objects until the next implementation plan is approved.

## Open Questions

- Which design artifacts are required before building the first application screens?
- What is the next approved implementation slice after Phase 1 foundation?
- When should request intake, triage, Campaigns, Projects, Deliverables, and Tasks be promoted into implementation?
- What staging validation should be completed before treating Phase 1 as stable outside local development?

## Notes

- `php artisan migrate:fresh --seed` passes in `resources/Laravel/starterkit`.
- `php artisan test tests/Feature/Phase1FoundationTest.php` passes.
- The full `composer test` command still has a known pre-existing failure in `Tests\Feature\ExampleTest` because the existing `/` view cannot locate `resources/js/pages/dashboard-projects.js` in the Vite manifest.
- No request intake forms, Campaigns, Projects, Deliverables, Tasks, conversations, assets, reviews, calendar/dashboard, skills, capacity model, policies, controllers, routes, or UI workflows have been implemented yet.
- No deployment pipeline exists yet.

Last updated: 2026-06-02
