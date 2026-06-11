# Current State

## Purpose

Track the actual state of the project so planning, design, and development work do not drift from reality.

## Current Decisions

- This repository has moved from planning-only into Phase 1 foundation completion and early Phase 2 implementation.
- The Laravel starterkit exists at `resources/Laravel/starterkit`.
- Phase 1 foundation migrations have been merged into `main`.
- The opt-in Grace Community Church Phase 1 scenario seeder and matching feature tests have been merged into `main`.
- The immediate focus is completing the Lean MVP request-to-approved-deliverable loop without rebuilding completed foundation work.
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
- Fortify authentication is connected to the ForWorship-branded Blade views. Login, logout, password reset, email verification, password confirmation, and two-factor challenge flows are implemented. **Registration is disabled — user accounts are created by invitation only.** The `sign-up.blade.php` view is retained for the future invitation-acceptance flow.
- Authenticated users can edit their login name, email, and canonical organization profile fields through the Inspinia account-settings screen.
- Verified internal users with an active organization profile can view and filter a read-only, organization-scoped People directory.
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

## ForWorship Theme and Branding Applied

The Inspinia starterkit has been visually aligned to the ForWorship brand. This work is in the uncommitted working tree along with the auth/profile/people work described above.

### Theme and App Shell

- `resources/css/config/_theme-forworship.css` — full ForWorship Inspinia skin: color tokens, Fraunces/IBM Plex Sans font assignments, border radius, shadows, sidebar and topbar variants, h1-h3 heading font override
- `resources/css/config/_font.css` — Fraunces variable font Google Fonts import
- `resources/css/app.css` — ForWorship theme imported; Quill snow CSS also imported here
- `resources/views/shared/base.blade.php` and `vertical.blade.php` — `data-skin="forworship"` set as default on the `html` element
- `resources/views/shared/partials/sidenav.blade.php` — ForWorship horizontal logo inlined as SVG (`fw_logo_horiz_dark.svg`); collapsed sidebar shows mark only via cropped viewBox. Sidebar includes "Base UI" UI demo nav section.
- `resources/views/shared/partials/topbar.blade.php` — same logo treatment

### Auth Pages

All auth pages use a shared logo partial and consistent ForWorship branding:

- `resources/views/auth/partials/logo.blade.php` — shared vertical logo partial (light/dark, `h-20`, `fill="currentColor"`, `viewBox="0 0 410.77 239.43"`)
- All seven auth views include this partial via `@include("auth.partials.logo")`
- Copyright footers updated to "ForWorship Creative" on all auth pages
- Registration is disabled in `config/fortify.php` (`Features::registration()` commented out)

### Favicon

Full favicon set deployed to `public/`:

- `favicon.svg` (light/dark media query), `favicon.ico`, `favicon-96x96.png`, `apple-touch-icon.png`, `web-app-manifest-192x192.png`, `web-app-manifest-512x512.png`, `site.webmanifest`
- Source files in `resources/favicon/` (do not delete)
- `resources/views/shared/partials/title-meta.blade.php` updated with full recommended tag set

### UI Demo Pages

Five authenticated demo pages exist under `resources/views/ui/` and are linked from the sidebar "UI Demo" menu:

| Route | File | Contents |
|---|---|---|
| `/ui/typography` | `ui/typography.blade.php` | Headings, ForWorship type system, inline text, lists, blockquotes |
| `/ui/colors` | `ui/colors.blade.php` | Full color palette: brand, semantic, neutral tokens |
| `/ui/buttons` | `ui/buttons.blade.php` | All button variants, sizes, states, icon buttons, groups |
| `/ui/forms` | `ui/forms.blade.php` | Inputs, flatpickr dates, Quill rich text, selects, checkboxes/radios, validation, composed form |
| `/ui/cards` | `ui/cards.blade.php` | Card variants, action cards, colored, tinted, content cards |

### Third-Party JS in Use

| Package | Loaded Via | Activated By |
|---|---|---|
| Flatpickr | `app.js` (already bundled) | `data-provider="flatpickr"` on `type="text"` inputs |
| Quill.js | `resources/js/pages/form-quilljs.js` (explicit `@vite`) | Element IDs (`#bio-editor`, `#notes-editor`, `#description-editor`) |
| Choices.js | `app.js` (already bundled) | `data-choices` attribute |

Logo assets (in `resources/`, source files — not served from Laravel `public/`):

- `fw_logo_horiz_dark.svg` — full horizontal wordmark, primary asset for app shell
- `fw_logo_vert_dark.svg` — full vertical wordmark, used on auth pages

Logo implementation: inline SVG with `fill="currentColor"` — adapts to light/dark via CSS without separate image files.

## Open Questions

- Which existing Inspinia patterns should be adapted for request submission, request queue, and triage screens?
- When should Projects, Deliverables, and Tasks be promoted into implementation after request intake?
- When should optional Campaigns be promoted from future scope?
- What staging validation should be completed before treating Phase 1 as stable outside local development?

## MVP Critical Path

The active critical path is:

1. Finish reconciling Phase 1 identity administration:
   - authorized role and permission visibility/management
2. Build the Phase 2 request intake UI on the implemented request domain service.
3. Implement Projects -> Deliverables -> Tasks and request-to-project conversion.
4. Add contextual conversations and activity history.
5. Add deliverable-centered reviews, approvals, and change requests.
6. Add basic file/external-link attachment support and simple dashboard/date visibility.
7. Validate the complete request-to-approved-deliverable loop locally and in staging.

Do not import the historical Inertia/Vue implementation or its duplicate `UserProfile`, role, or permission structures. Recover useful behavior by adapting it to the canonical organization-scoped models and Inspinia Blade frontend.

## Notes

- `php artisan migrate:fresh --seed` passes in `resources/Laravel/starterkit`.
- The full Laravel test suite passes.
- The starterkit Vite production build passes.
- No request intake UI, Campaigns, Projects, Deliverables, Tasks, conversations, assets, reviews, calendar workflow, skills, capacity model, or request-to-project conversion has been implemented yet.
- No deployment pipeline exists yet.

Last updated: 2026-06-10 (session 2)
