# Restart Handoff

Last updated: 2026-06-10 (session 2)

## Purpose

This is the current operational handoff for ForWorship Creative.

Read this document, `README.md`, `docs/CURRENT_STATE.md`, and the relevant files in `docs/ai/` before making implementation changes.

Do not treat missing code on `main` as proof that work was never completed. Review the reconciliation history below before rebuilding anything.

## Working Directory

```bash
cd "/Volumes/Big Grey/websites/wegotthis.online"
```

## Product And Stack Decisions

- Product: ForWorship Creative
- Target application URL: `app.forworship.org`
- Current working domain/codename: `wegotthis.online`
- Application base: `resources/Laravel/starterkit`
- UI reference library: `resources/Laravel/inspinia`
- Backend: Laravel 13 and PostgreSQL
- Approved MVP frontend: checked-in Inspinia Blade, Tailwind 4, Preline, and JavaScript
- JavaScript package manager: npm; use and commit `package-lock.json`, and do not recreate `yarn.lock`
- Do not add Vue, Inertia, Livewire, Bootstrap, or another frontend framework without an explicit architecture decision.
- Canonical tenancy model: organization-owned records use `organization_id`.
- Canonical operational spine: Requests -> Projects -> Deliverables -> Tasks.
- Campaigns remain deferred/optional strategic context.

## Git State

Current branch:

```text
main
```

Current committed `main` and `origin/main`:

```text
f96b0ed Merge Inspinia-first MVP frontend correction
```

The authentication, profile settings, People directory, CSS-loading fix, ForWorship theme/branding, auth page branding, UI demo pages, favicon deployment, Quill.js integration, and invite-only registration described below currently exist as **uncommitted tracked and untracked work in the working tree**.

Before starting another feature:

1. Review the working tree carefully.
2. Preserve the intended reconciliation files.
3. Do not stage known unrelated untracked residue.
4. Commit/push the reconciliation as a coherent change before beginning a broad new slice.

## Why Reconciliation Was Required

Earlier authentication and user-management work existed on diverged historical branches but was never merged into the current `main`.

Relevant historical branches:

```text
reconcile-main-origin-20260530
safety/local-main-diverged-20260530
```

Relevant historical commits:

```text
1cd2a16 chore: stabilize laravel inertia scaffold
78c14f7 feat: add user management directory
```

Those commits included useful behavior, but they also used:

- Inertia and Vue
- Bootstrap
- a duplicate `UserProfile` model/schema
- role and permission structures that conflict with the canonical organization-scoped Phase 1 schema
- user-directory queries without the required organization scoping

Do not merge those commits or branches directly.

Recover useful behavior by adapting it to current canonical models and the approved Inspinia Blade frontend.

## Canonical Implemented Foundation

### Phase 1 Data Foundation

Committed on `main`:

- `organizations`
- Laravel `users`
- `profiles`
- `departments`
- `roles`
- `permissions`
- `role_permissions`
- `profile_role_assignments`

Canonical identity rules:

- A `User` is a login identity.
- A `Profile` is an organization-scoped person/contact record.
- Contact-only profiles do not require users.
- Roles and permissions are distinct from person/contact type.
- Department Leader is a role assignment, not a person type.
- External Reviewer is a person/contact type and future scoped-access context, not a base login role.

### Phase 2 Request Foundation

Committed on `main`:

- `requests`
- `request_answers`
- `request_ideas`
- `RequestStatus`
- `RequestIntakeService`
- Phase 2 scenario seeder and focused tests

No request intake UI exists yet.

No Projects, Deliverables, Tasks, conversations, reviews, assets, or request-to-project conversion exists yet.

## Current Reconciled Application Work

The following currently exists in the working tree and has been verified.

### Authentication

Fortify is connected to ForWorship-branded Blade views.

Implemented flows:

- login
- logout
- password reset request
- password reset
- email verification
- password confirmation
- two-factor challenge
- protected dashboard

**Registration is disabled. User accounts are invite-only.** `Features::registration()` is commented out in `config/fortify.php`. The sign-in page does not show a "Create an account" link. The `/auth/sign-up` route redirects to login. The `sign-up.blade.php` view is retained for the future invitation-acceptance flow.

Primary files:

- `app/Actions/Fortify/`
- `app/Providers/FortifyServiceProvider.php`
- `config/fortify.php`
- `database/migrations/2026_06_10_184351_add_two_factor_columns_to_users_table.php`
- `resources/views/auth/`
- `resources/views/auth/partials/logo.blade.php`
- `tests/Feature/AuthenticationTest.php`

### Profile And Account Settings

Authenticated, verified users can edit:

- login name
- login email
- profile display name
- title
- phone
- bio

Changing email clears email verification.

Users cannot self-change organization, department, person type, or roles through this screen.

Primary files:

- `app/Http/Controllers/Settings/ProfileController.php`
- `app/Http/Requests/Settings/ProfileUpdateRequest.php`
- `resources/views/settings/profile.blade.php`
- `tests/Feature/ProfileSettingsTest.php`

### People Directory

Implemented as a read-only organization-scoped directory.

Behavior:

- requires authentication and verified email
- requires an active organization profile
- shows only profiles in the signed-in user's organization
- includes login-backed staff and contact-only profiles
- supports search, department filter, and person-type filter
- exposes no invite, edit, role-change, block, or delete actions

Primary files:

- `app/Http/Controllers/PeopleDirectoryController.php`
- `resources/views/people/index.blade.php`
- `tests/Feature/PeopleDirectoryTest.php`

### ForWorship Theme and Logo

The Inspinia starterkit visual system has been aligned to the ForWorship brand.

Primary files:

- `resources/css/config/_theme-forworship.css` — full ForWorship Inspinia skin (colors, fonts, radius, shadows, sidebar and topbar variants, h1-h3 heading font)
- `resources/css/config/_font.css` — Fraunces Google Fonts import added
- `resources/css/app.css` — ForWorship theme imported after `_theme-flat.css`; Quill snow CSS also imported here
- `resources/views/shared/base.blade.php` — `data-skin="forworship" data-menu-color="light" data-topbar-color="light" data-theme="light"` set as defaults on `html`
- `resources/views/shared/vertical.blade.php` — same
- `resources/views/shared/partials/sidenav.blade.php` — ForWorship horizontal logo inlined as SVG; "Base UI" UI demo nav section added
- `resources/views/shared/partials/topbar.blade.php` — ForWorship horizontal logo inlined as SVG
- `resources/views/shared/partials/title-meta.blade.php` — full favicon tag set, ForWorship metadata

Logo assets (in `resources/`, source files only — not served from Laravel `public/`):

- `resources/fw_logo_horiz_dark.svg` — full horizontal wordmark; used in sidenav and topbar
- `resources/fw_logo_vert_dark.svg` — full vertical wordmark; used on auth pages

Logo implementation pattern — **always inline SVG with `fill="currentColor"`**:

- Light mode span: `class="flex dark:hidden overflow-hidden text-[#1c1c1e]"`
- Dark mode span: `class="hidden dark:flex overflow-hidden text-[#f7f4ee]"`
- App shell (sidenav/topbar): horizontal logo, `h-7`/`h-6`
- Auth pages: vertical logo via `@include("auth.partials.logo")`, `h-20`
- Collapsed sidebar (`logo-sm`): horizontal SVG with `viewBox="0 0 155 159"` — crops to mark only

### Favicon

Full favicon set deployed to `public/`. Source files also in `resources/favicon/` (do not delete).

Files in `public/`: `favicon.svg`, `favicon.ico`, `favicon-96x96.png`, `apple-touch-icon.png`, `web-app-manifest-192x192.png`, `web-app-manifest-512x512.png`, `site.webmanifest`.

Note: SVG favicons do not render on HTTP (browser shows security indicator). Expected on localhost. Will display on HTTPS in production.

### UI Demo Pages

Five UI demo pages live under `resources/views/ui/` and are accessible from the "UI Demo" accordion in the sidebar. These authenticated, verified-user routes are design vocabulary references, not product features.

| Route | Contents |
|---|---|
| `/ui/typography` | Headings, type system, inline text, lists, blockquotes |
| `/ui/colors` | Full color palette: brand, semantic, neutral |
| `/ui/buttons` | Button variants, sizes, states, icon buttons, groups |
| `/ui/forms` | Inputs, flatpickr dates, Quill rich text, checkboxes, radios, validation |
| `/ui/cards` | Card variants, action tools, colored, tinted, content cards |

The forms page loads `resources/js/pages/form-quilljs.js` via `@vite` in its `@section("scripts")`. Follow the same per-page script pattern for any future pages that need page-specific JS.

### Third-Party JavaScript

| Package | How Loaded | Activated |
|---|---|---|
| Flatpickr | Bundled in `app.js` | `data-provider="flatpickr"` on text inputs |
| Quill.js | Per-page `@vite(["resources/js/pages/form-quilljs.js"])` | Explicit element IDs |
| Choices.js | Bundled in `app.js` | `data-choices` attribute |

### Inspinia CSS Loading Fix

The starterkit previously imported all CSS through `resources/js/vendor.js`.

In Vite development mode, that caused a flash of unstyled content because CSS was injected after JavaScript loaded.

Current fix:

- `resources/css/app.css` is a direct Vite entry.
- CSS is linked in the document head before JavaScript.
- the duplicate Vite client script was removed by using one combined `@vite` call.
- `vendor.js` no longer imports `app.css`.

Primary files:

- `resources/views/shared/partials/head-css.blade.php`
- `resources/js/vendor.js`
- `vite.config.js`

## Current Routes

Primary working application routes:

```text
/                       protected dashboard
/login                  Fortify login
/forgot-password        password reset request
/email/verify           email verification notice
/two-factor-challenge   two-factor challenge
/settings/profile       account/profile settings
/people                 organization-scoped People directory
```

UI demo routes (reference only, not product features):

```text
/ui/typography
/ui/colors
/ui/buttons
/ui/forms
/ui/cards
```

`/register` is not a working route — Fortify registration is disabled. User accounts are invite-only.

The starterkit still contains many Inspinia demo routes and screens. They are references, not completed ForWorship Creative product features.

Do not count demo routes as MVP implementation.

## Local Testing

Application directory:

```bash
cd "/Volumes/Big Grey/websites/wegotthis.online/resources/Laravel/starterkit"
```

Configured local database:

```text
PostgreSQL
database: forworship_creative
host: 127.0.0.1
port: 5432
```

Seed the complete local demo scenario:

```bash
php artisan db:seed --class=Phase2RequestIntakeScenarioSeeder
```

All demo accounts are email-verified and use the local-only password `password`.

| Email | Organization | Role |
|---|---|---|
| `demo@user.com` | Grace Community Church | Organization Admin |
| `jordan@example.test` | Grace Community Church | Communications Manager |
| `rachel@example.test` | Grace Community Church | Department Leader |
| `marcus@example.test` | Grace Community Church | Contributor |
| `elena@example.test` | Grace Community Church | Contributor |

Start local servers:

```bash
php artisan serve --host=127.0.0.1 --port=8000
npm run dev -- --host 127.0.0.1
```

Local login:

```text
http://127.0.0.1:8000/login
```

Current servers may already be running in active terminal sessions. Check before starting duplicates.

## Verification Status

Latest completed verification:

```bash
php artisan test
```

Passed:

```text
45 tests
193 assertions
```

```bash
npm run build
```

Passed for `resources/Laravel/starterkit`.

```bash
cd docs-site && npm run build
```

Passed after the current-state reconciliation.

```bash
git diff --check
```

Passed.

Expected Vite build warnings:

- several existing Inspinia image URLs remain runtime-resolved
- the existing main application JavaScript chunk is larger than Vite's default warning threshold

These warnings are not current blockers.

### Known npm Audit Findings

`npm audit` currently reports:

- Quill `2.0.3`: low-severity HTML-export XSS advisory. No patched stable Quill release currently exists, and npm only offers a forced downgrade to `2.0.2`.

The critical `shell-quote` advisory was resolved by upgrading the development-only `concurrently` dependency to `10.0.3`.

Quill is retained because the checked-in Inspinia `form/text-editors` reference uses it. Current ForWorship code only initializes editors and does not call Quill HTML-export APIs. For future product fields:

- persist Quill Delta data rather than exported HTML
- validate the allowed Delta operations and attributes
- sanitize any generated HTML server-side before rendering
- do not call `getSemanticHTML()` with untrusted content

Do not run `npm audit fix --force`; it downgrades Quill without resolving the absence of an upstream patched stable release.

## Known Untracked Residue

The following predate or are unrelated to the current reconciliation and must not be staged blindly:

```text
docs/technical/PR3_SCHEMA_REVIEW.md
docs/technical/PR4_MIGRATION_PLAN_REVIEW.md
resources/Laravel/starterkit/components.d.ts
resources/Laravel/starterkit/resources/js/actions/
resources/Laravel/starterkit/resources/js/routes/
resources/Laravel/starterkit/resources/js/wayfinder/
```

The generated JavaScript directories are residue from the historical Wayfinder/Inertia implementation.

Do not treat them as approved frontend architecture.

## MVP Critical Path

The MVP must prove this loop:

```text
Department Leader submits a request
  -> Communications Manager clarifies and approves intake
    -> Project is created
      -> Deliverables are defined
        -> Tasks are assigned
          -> Work is discussed in context
            -> Deliverable is reviewed
              -> Changes are requested or approved
                -> Project is closed
```

Active sequence:

1. Finish Phase 1 identity administration:
   - authorized role and permission visibility
   - carefully scoped management only after authorization behavior is explicit
2. Build the Phase 2 request intake UI using the existing request domain service.
3. Build the Communications triage queue and request detail/decision UI.
4. Implement Projects -> Deliverables -> Tasks and request-to-project conversion.
5. Add contextual conversations and activity history.
6. Add deliverable-centered reviews, approvals, and change requests.
7. Add basic file/external-link attachments and simple dashboard/date visibility.
8. Validate the complete loop locally and in staging.

## Recommended Next Slice

The next coherent slice is **authorized role and permission visibility**, not broad role mutation.

Requirements:

- use canonical `roles`, `permissions`, `role_permissions`, and `profile_role_assignments`
- remain organization-scoped
- distinguish global system-role definitions from organization assignments
- expose role/permission data only to users authorized by current seeded permissions
- add reusable authorization helpers or policies before management actions
- do not import historical Inertia/Vue screens
- do not introduce new roles or permissions without updating canonical docs

After this slice, move directly to request intake and triage UI.

## Do Not Do Next

- Do not merge the historical reconciliation branch directly.
- Do not recreate `UserProfile`.
- Do not add Vue, Inertia, Livewire, Bootstrap, or another frontend framework.
- Do not build a full CRM, HR profile system, vendor portal, or complex role builder.
- Do not add Campaigns before Projects -> Deliverables -> Tasks.
- Do not treat Inspinia demo screens/routes as finished product features.
- Do not begin broad visual redesign work before the request-to-approved-deliverable loop exists.
- Do not stage every untracked file with `git add .`.

## Resume Checklist

```bash
cd "/Volumes/Big Grey/websites/wegotthis.online"
git status --short --branch
git log -5 --oneline --decorate
sed -n '1,260p' docs/RESTART_HANDOFF.md
sed -n '1,220p' docs/CURRENT_STATE.md
```

Then review the current reconciliation diff before editing:

```bash
git diff --check
git diff --stat
```

Before implementing the next slice, read:

- `docs/INSPINIA.md`
- `docs/technical/AUTH_AND_PERMISSIONS.md`
- `docs/product/ROLES_AND_PERMISSIONS_MODEL.md`
- `docs/product/MVP_PHASES_AND_PRIORITIES.md`
- `docs/technical/PHASE_2_REQUEST_INTAKE_PLAN.md`
