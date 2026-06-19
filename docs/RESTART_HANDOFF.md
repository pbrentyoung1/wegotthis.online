# Restart Handoff

Last updated: 2026-06-19 (Board modal workflow + project view consolidation)

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
- Requests may convert to lightweight Project, Campaign, or Initiative containers. Full Campaign and Initiative planning modules remain deferred.

## Git State

Current branch:

```text
main
```

The authenticated Inspinia reconciliation, verified demo accounts, demo profile headshots, and request-to-archived-project MVP foundation are committed on `main`. Review `git status` before starting work.

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
- `conversations`
- `conversation_participants`
- `messages`
- `RequestStatus`
- `RequestIntakeService`
- Phase 2 scenario seeder and focused tests

Requester-facing request intake UI now exists.

Implemented behavior:

- reusable active-role permission checks on `Profile`
- My Requests list scoped to the signed-in requester and organization
- need-first request draft creation and editing
- complete-request submission through `RequestIntakeService`
- read-only submitted request detail
- authorization tests for permission, ownership, organization scope, and draft status
- Communications intake queue scoped by `requests.triage` and organization
- triage start, clarification, accept, defer, and reject actions through `RequestIntakeService`
- requester clarification update and resubmission
- requester-visible terminal decision notes
- expanded ministry brief fields for success criteria, key message, audience-action deadline, existing branding/assets/examples/links, reviewers/approvals, sensitivities, and requester ideas
- conversation-centered triage detail layout with a current-state activity sidebar and Project/Campaign/Initiative conversion choices

Clarification now preserves requester-visible questions and replies in a shared request conversation. `missing_information_json` remains as the current unresolved clarification summary.

Existing branding, asset, example, and external/Drive link references currently use the flexible `request_answers` foundation and are visible in requester and triage detail screens. This is intake context, not the future `asset_links` table or an upload system.

Projects, Deliverables, Tasks, persisted activity events, reviews, external links, scheduling, request-to-project conversion, and Photo Collection deliverable type now exist. Full Campaign/Initiative conversion targets remain deferred.

## Approved Request UX Sequence

Completed in the intake refinement:

- Request details is at the top of the triage sidebar, Activity is below it, and a compact Convert to pull-down is at the bottom.
- Major triage cards use the existing Inspinia card-toggle pattern.
- Intake queue views cover Active, In conversation, Accepted, Deferred, Rejected, and Archived.
- Last activity is visible in the queue.
- Request status and activity colors use consistent lifecycle meaning.

Remaining request UX work:

- Add per-user read tracking before adding the Unread queue view.
- Completed: Adapt Inspinia `/apps/projects/list` for the requester Requests list.
- Completed: Use one shared multi-participant request conversation on requester and triage pages.
- Add unread/read state and message inbox behavior.
- Extend unread/read state across the shared Request and Deliverable conversation foundation.
- Support in-context request detail updates without conflating them with messages.
- Replace reviewer free text with a user picker.
- Replace asset/link free text with structured, validated link rows.
- Remove requester-facing communication-ideas input.
- Replace vague constraint prompts with specific supportive questions.
- Explore a guided request wizard.
- Connect clarification intent markers to real Tasks after the clarification-task workflow is designed.

## Current Project Execution Foundation

The following foundation is implemented and covered by focused tests:

- Request-to-Project conversion preserves the source Request, requester-visible stakeholder conversation, selected request ideas, and Project Type default Deliverables.
- Project Type templates define ordered default Deliverables without coupling created Deliverables back to the template.
- Deliverables support ownership, dates, links, internal conversation, optional internal/stakeholder reviewers, numbered review rounds, revision loops, delivery, publishing/running, ending, and archive.
- Tasks belong to Deliverables and support organization-wide assignment, priority, Kanban status, blockers, time budgets, links, and derived Project visibility for assigned specialists.
- Task Ready for Review creates an actionable alert for the Deliverable manager instead of a duplicate approval Task.
- Active blocker attention and review alerts resolve when their underlying condition clears while history remains in Project activity.
- Deliverable Task time budgets roll up to Deliverables and Projects.
- Shared Quill editors store restricted Delta JSON with legacy plain-text compatibility. Conversation editors include a lightweight Unicode emoji picker.
- My Schedule uses FullCalendar with bounded, permission-aware feeds. Projects expose coordinated Overview, Board, and Calendar views over the same Deliverables and Tasks.
- Project view switching uses one shared animated pill selector so the current workspace feels like one surface with multiple views.
- The Project Board uses canonical lifecycle actions, desktop drag-and-drop, and explicit mobile move controls.
- Board cards open an in-place deliverable modal instead of switching to a separate deliverable page.
- Managers can edit core deliverable fields from that Board modal, and task rows drill into task details without leaving the Board.
- Manual production sequence ordering has been removed from the UI; future dependencies/readiness modeling should replace it.
- Project closeout requires archived Deliverables and a completed closeout checklist before final archive.
- Stakeholder-facing review and conversation views do not expose internal Tasks, team discussion, or internal activity.

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

### Photo Collection Deliverable Type

A Photo Collection deliverable type is implemented end-to-end.

**Public upload** (`/upload/{slug}`):
- No authentication required; accepts JPEG, PNG, WebP, GIF, HEIC/HEIF
- EXIF extraction on ingest (taken-at, device, dimensions, aperture, shutter, ISO)
- Rate-limited to 10 uploads per hour per IP
- Upload open/close controlled by project team via `deliverable.upload_open` flag

**Internal photo grid** (`/projects/{project}/deliverables/{deliverable}/media`):
- Lazy-loaded thumbnail grid (currently serving full-resolution — thumbnail generation is the next improvement)
- Sort by time taken, upload time, uploader, or favorites first
- Filter by uploader, tag, favorites only, approved only (auto-submit `card mb-base` toolbar)
- Download All dropdown: Originals / Crops only / Originals + Crops; crops named `{platform}-{filename}`; originals include IPTC metadata; ZIP streaming via `ZipStream`

**Photo detail panel** (slide-in, JS-driven):
- EXIF metadata display
- Favorite and Approved for use toggles (grid thumbnail syncs without page refresh)
- Caption and internal notes
- Tags: add via Enter or comma-separated input, delete individually with × button
- Delete photo (with confirmation)

**Social crop tool** (full-screen modal):
- 10 platform presets: Facebook Cover, Instagram Square, Twitter/X Header, LinkedIn Banner, YouTube Thumbnail, Pinterest Pin, TikTok Video, Story (9:16), Thumbnail (16:9), Web Banner
- Cropper.js with zoom in/out; `getData(true)` returns natural-pixel coordinates (no server-side scaling)
- `ImageCropService` using Intervention Image v4.1 (`decodePath`, `JpegEncoder`, `orient()` before crop)
- Saved crops: scissors badge on grid thumbnail, auto-tag with platform label
- Crop download and bulk crop zip via `MediaCropController`

**Primary files:**
- `app/Http/Controllers/PhotoUploadController.php`
- `app/Http/Controllers/DeliverableMediaController.php`
- `app/Http/Controllers/MediaCropController.php`
- `app/Services/ImageCropService.php`
- `app/Services/IptcMetadataWriter.php`
- `app/Models/MediaFile.php`, `app/Models/MediaFileCrop.php`
- `config/media_crops.php`
- `resources/js/pages/photo-upload.js`
- `resources/js/pages/photo-crop.js`
- `resources/views/deliverables/media.blade.php`
- `resources/views/upload/show.blade.php`
- `tests/Feature/PhotoCollectionTest.php`, `tests/Feature/MediaCropTest.php`

**Known limitation:** Cropper.js CSS must be imported in `vendor.js` (`import "cropperjs/dist/cropper.css"`) — without it, `.cropper-hidden` never hides the original `<img>`, causing double-image display in the crop tool.

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
/requests               requester-scoped My Requests list
/requests/tagged        requests involving the signed-in profile
/requests/create        new ministry request
/requests/{request}     requester-scoped request detail
/triage/requests        organization-scoped Communications intake queue
/triage/requests/{request} Communications triage detail and actions
/projects               visible Projects list
/projects/{project}     Project List workspace
/projects/{project}/board Project Deliverable board
/projects/{project}/calendar Project-scoped calendar
/projects/{project}/closeout guarded Project closeout
/projects/{project}/deliverables/{deliverable} Deliverable workspace and review
/projects/{project}/deliverables/{deliverable}/tasks/{task} Task workspace
/projects/{project}/deliverables/{deliverable}/media Photo Collection grid (internal)
/projects/{project}/deliverables/{deliverable}/media/download Zip download (originals/crops/both)
/projects/{project}/deliverables/{deliverable}/media/{file}/update PATCH media file metadata
/projects/{project}/deliverables/{deliverable}/media/{file}/favorite PATCH favorite toggle
/projects/{project}/deliverables/{deliverable}/media/{file}/crop POST save social crop
/projects/{project}/deliverables/{deliverable}/toggle-open PATCH upload open/close
/upload/{slug}          Public photo upload page (no authentication required)
/tasks                  My Tasks and actionable work alerts
/calendar               My Schedule
/project-types          Project Type template editor
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
Demo profiles use the numbered portraits in `resources/headshots/`, served from `/images/users/`.

| Email | Organization | Role |
|---|---|---|
| `demo@user.com` | Grace Community Church | Organization Admin |
| `jordan@example.test` | Grace Community Church | Communications Manager |
| `rachel@example.test` | Grace Community Church | Department Leader |
| `marcus@example.test` | Grace Community Church | Contributor |
| `elena@example.test` | Grace Community Church | Contributor |
| `chris@example.test` | Grace Community Church | Vendor Contact, no organization role |
| `avery@example.test` | Grace Community Church | External Reviewer, no organization role |

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

### Mobile / Device Testing

To test from a phone or another device on the same network:

1. Update `.env`:
   ```
   APP_URL=http://10.10.10.46:8000
   VITE_HMR_HOST=10.10.10.46
   ```
2. Run `npm run build` (avoids needing Vite's port 5173 accessible on the network)
3. Start the server with multiple workers (required for parallel asset serving):
   ```bash
   PHP_CLI_SERVER_WORKERS=8 php artisan serve --host=0.0.0.0 --port=8000 --no-reload
   ```
   The `--no-reload` flag is required for `PHP_CLI_SERVER_WORKERS` to take effect.
4. Access from phone at `http://10.10.10.46:8000`

When done, revert `.env` to `APP_URL=http://localhost:8000`, remove `VITE_HMR_HOST`, and restart the standard server.

`vite.config.js` already reads `VITE_HMR_HOST` via `loadEnv` and sets `server.origin` so the Vite hot file uses the correct IP. This config is committed and safe — it falls back to `localhost` when the env var is absent.

## Verification Status

Latest completed verification:

```bash
php artisan test
```

Passed on 2026-06-14:

```text
179 tests (1 skipped — HEIC Imagick conversion)
794 assertions
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

## Repository Hygiene

Historical Wayfinder/Inertia generated residue is ignored in the root `.gitignore`:

```text
resources/Laravel/starterkit/components.d.ts
resources/Laravel/starterkit/resources/js/actions/
resources/Laravel/starterkit/resources/js/routes/
resources/Laravel/starterkit/resources/js/wayfinder/
```

Do not treat those generated files as approved frontend architecture or remove the ignore rules without an explicit architecture decision.

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

1. Add thumbnail generation for Photo Collection grid (currently serving full-resolution images — slow with large collections).
2. Add unread/read state and inbox behavior to contextual conversations.
3. Complete basic file/upload attachment handling while preserving the existing external-link foundation.
4. Validate the complete request-to-archived-project loop across demo roles locally and in staging.
5. Implement lightweight Campaign and Initiative conversion targets without building full planning modules.
6. Connect clarification intent markers to Tasks and Calendar after the clarification-task workflow is designed.
7. Add recurrence, external calendar sync, and broader capacity planning only after the core loop is stable.

## Recommended Next Slice

The immediate next task is **Photo Collection thumbnail generation** — the grid currently serves full-resolution images which is slow with 30+ photos. Generate resized thumbnails on upload (or on-demand) and serve those in the grid, reserving full-res for the detail panel and download.

Requirements:

- use the canonical organization-scoped models and permissions
- preserve the public stakeholder conversation boundary and private internal execution boundary
- keep external links working while introducing uploads through storage abstractions
- verify behavior from requester, Communications Manager, contributor, vendor, and external reviewer perspectives
- keep full Campaign and Initiative planning modules deferred

## Do Not Do Next

- Do not merge the historical reconciliation branch directly.
- Do not recreate `UserProfile`.
- Do not add Vue, Inertia, Livewire, Bootstrap, or another frontend framework.
- Do not build a full CRM, HR profile system, vendor portal, or complex role builder.
- Do not build full Campaign or Initiative planning modules before the Project -> Deliverable -> Task execution foundation.
- Do not treat Inspinia demo screens/routes as finished product features.
- Do not begin broad visual redesign work before validating the implemented request-to-archived-project loop.

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
- `docs/product/COMMUNICATIONS_TRIAGE_WORKSPACE.md`
- `docs/technical/PHASE_2_REQUEST_INTAKE_PLAN.md`
