# Current State

## Purpose

Track the actual state of the project so planning, design, and development work do not drift from reality.

## Current Decisions

- This repository has moved from planning-only into early Phase 1 implementation.
- The Laravel starterkit exists at `resources/Laravel/starterkit`.
- Phase 1 foundation migrations have been merged into `main`.
- The opt-in Grace Community Church Phase 1 scenario seeder and matching feature tests have been merged into `main`.
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
- The approved Phase 2 request/intake foundation is defined in `/docs/technical/PHASE_2_REQUEST_INTAKE_PLAN.md`.
- Canonical implementation guidance now uses Laravel 13, `organization_id`, the implemented Phase 1 role vocabulary, and Projects -> Deliverables -> Tasks as the MVP operational spine.
- The approved MVP frontend architecture is the checked-in Inspinia Blade, Tailwind 4, Preline, and JavaScript implementation. No additional frontend framework is approved for MVP.
- The approved Phase 2 request/intake foundation has been implemented.
- Phase 2 implementation currently includes only:
  - `requests`
  - `request_answers`
  - `request_ideas`
  - request intake models and Phase 1 relationships
  - centralized request statuses
  - a request intake domain write service for organization scope and lifecycle transitions
  - an opt-in Grace Community Church VBS request scenario seeder
  - focused request intake feature tests

## Open Questions

- Which design artifacts are required before building the first application screens?
- Which existing Inspinia patterns should be adapted for request submission, request queue, and triage screens?
- When should Projects, Deliverables, and Tasks be promoted into implementation after request intake?
- When should optional Campaigns be promoted from future scope?
- What staging validation should be completed before treating Phase 1 as stable outside local development?

## Notes

- `php artisan migrate:fresh --seed` passes in `resources/Laravel/starterkit`.
- `php artisan test tests/Feature/Phase1FoundationTest.php` passes.
- `php artisan test tests/Feature/Phase1ScenarioTest.php` passes.
- `php artisan test tests/Feature/Phase2RequestIntakeTest.php` passes.
- The full `composer test` command still has a known pre-existing failure in `Tests\Feature\ExampleTest` because the existing `/` view cannot locate `resources/js/pages/dashboard-projects.js` in the Vite manifest.
- No request intake UI, Campaigns, Projects, Deliverables, Tasks, conversations, assets, reviews, calendar/dashboard, skills, capacity model, policies, controllers, routes, or UI workflows have been implemented yet.
- No deployment pipeline exists yet.

Last updated: 2026-06-10
