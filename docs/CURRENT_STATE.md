# Current State

## Purpose

Track the actual state of the project so planning, design, and development work do not drift from reality.

## Current Decisions

- This repository has moved from planning-only into an implemented request-to-archived-project MVP foundation.
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
- The opt-in Grace scenario provides verified demo accounts for Organization Admin, Communications Manager, Department Leader, Contributor, Vendor Contact, and External Reviewer perspectives; all local demo accounts use password `password`.
- Phase 1 focused tests cover idempotent seed data, profile uniqueness behavior, circular profile/department foreign keys, active role assignment uniqueness, and documented FK delete behavior.
- Fortify authentication is connected to the ForWorship-branded Blade views. Login, logout, password reset, email verification, password confirmation, and two-factor challenge flows are implemented. **Registration is disabled — user accounts are created by invitation only.** The `sign-up.blade.php` view is retained for the future invitation-acceptance flow.
- Authenticated users can edit their login name, email, and canonical organization profile fields through the Inspinia account-settings screen.
- Verified internal users with an active organization profile can view and filter a read-only, organization-scoped People directory.
- Profiles expose reusable organization-scoped permission checks based on active role assignments.
- Users with `requests.submit` can create, save, edit, view, and submit their own ministry requests through the Inspinia Blade UI.
- Users with `requests.triage` can review an organization-scoped intake queue, ask for clarification, and make intake decisions.
- The triage detail workspace is conversation-centered: Communications reviews the brief, asks questions in context, sees a current-state activity sidebar, and chooses a future conversion target.
- The triage workspace now places Request details at the top of the sidebar, keeps Activity beneath it, places a compact Convert to pull-down at the bottom, and makes major workspace cards collapsible.
- The intake queue now uses workflow-oriented views for Active, In conversation, Accepted, Deferred, Rejected, and Archived requests, and shows Last activity. Unread remains pending because it requires per-user read tracking.
- Request lifecycle colors now carry consistent meaning across request lists, queue badges, and triage activity.
- The requester-scoped My Requests screen now uses an Inspinia `/apps/projects/list`-informed table with status, important date, Last activity, and contextual actions.
- Requester and triage detail pages now use one shared multi-participant conversation component backed by organization-scoped conversations, participants, and messages.
- Shared request conversations support one-level replies to specific questions and comments using the Inspinia project-details comment pattern.
- Approved Project conversation boundary: the requester-visible Request conversation becomes the stakeholder-visible Project conversation after conversion; adding a stakeholder adds their avatar/name and conversation participation. Internal Project, Deliverable, and Task execution conversations remain private to assigned insiders.
- Requesters can update and resubmit requests marked Needs Clarification. Clarification questions and requester-visible replies are preserved in the request conversation.
- The requester intake form captures the documented ministry brief: need, purpose, audience, action, tone, success criteria, key message, event/action/support dates, structured branding/assets/examples links, organization-scoped reviewers, sensitivities, and supportive planning considerations.
- Existing asset and branding references use validated label/URL rows and reviewers use an organization-scoped profile picker. Full uploads remain part of the later asset-linking milestone.
- Selected request reviewers are synchronized into the shared requester-visible conversation, appear by avatar and name in its participant header, and can open and reply to the request conversation without receiving broader request permissions.
- Additional ministry brief details render for structured reviewer-only answers, and requesters can update active requests after submission without resetting the request's workflow status.
- Asking for clarification records future Task intent assigned to the requester with a next-weekday target and shows that marker in the conversation. It intentionally does not create a Task record yet; clarification intent will connect to the implemented Task and Calendar foundations after the full clarification-task workflow is designed. Rush-specific deadlines remain pending until rush classification exists.
- Active Submitted, In Triage, or Accepted requests can now convert into Planning Projects. Conversion records acceptance, preserves and links the source Request, assigns the Communications converter as Project owner/coordinator, adds the requester as Stakeholder, carries request conversation participants into Project membership, and creates selected request ideas as Proposed Deliverables.
- Project details now follow the concise Inspinia project-details pattern: a compact summary and team panel with Deliverables, future Tasks, real Activity, and stakeholder Conversation tabs.
- Communications Managers and Organization Admins can manage simple Project Type templates with ordered default Deliverables. Conversion previews those defaults alongside request ideas, and selected defaults become independent Proposed Deliverable copies.
- The Projects list and Inspinia project-details-informed Project workspace are implemented. The requester-visible Request conversation continues on the Project workspace as the stakeholder-visible conversation.
- Request intake UI access and record visibility are permission-, organization-, and requester-scoped.
- The system still must avoid building future-scope objects outside the documented MVP critical path.
- The approved Phase 2 request/intake foundation is defined in `/docs/technical/PHASE_2_REQUEST_INTAKE_PLAN.md`.
- Canonical implementation guidance now uses Laravel 13, `organization_id`, the implemented Phase 1 role vocabulary, and Projects -> Deliverables -> Tasks as the MVP operational spine.
- The approved MVP frontend architecture is the checked-in Inspinia Blade, Tailwind 4, Preline, and JavaScript implementation. No additional frontend framework is approved for MVP.
- The approved Phase 2 request/intake foundation has been implemented.
- Phase 2 implementation currently includes only:
  - `requests`
  - `request_answers`
  - `request_ideas`
  - `conversations`
  - `conversation_participants`
  - `messages`
  - request intake models and Phase 1 relationships
  - future Task intent markers for clarification follow-up
  - `projects`
  - `project_members`
  - `deliverable_types`
  - `deliverables`
  - active Request -> Project conversion that records acceptance and creates selected proposed Deliverables
  - centralized request statuses
  - a request intake domain write service for organization scope and lifecycle transitions
  - an opt-in Grace Community Church VBS request scenario seeder
  - focused request intake feature tests
  - requester-facing My Requests, draft intake form, and request detail screens
  - reusable permission-based request lifecycle authorization
  - Communications intake queue and triage detail/action screens
  - requester clarification update and resubmission flow
  - expanded documented ministry brief fields using request answers, key dates, and request ideas
  - Deliverable create, view, and edit screens
  - Proposed → Planning lifecycle transition (requires owner + due date)
  - Planning → In Production transition through an explicit Start Production action; first review submission cannot skip active production
  - Explicit Approved → Delivery → Published / Running → Ended → Archived transitions; Published / Running requires a final link or delivery note and Archive records `archived_at`
  - Internal deliverable team conversation (Project Team visibility)
  - `DeliverableStatus` backed enum with `badgeClasses()` and `dotClass()`
  - `ProjectActivityEvent` model with persistent activity event storage
  - `DeliverableManagementService` with create/update/moveToPlanningStatus/addConversationMessage
  - Deliverables on project detail are now clickable links
  - Project activity tab now reads from stored `project_activity_events`
  - Optional internal reviewer + stakeholder reviewer assignments
  - Numbered Deliverable review rounds with independent internal/stakeholder decisions, Needs Approval alerts, approve/request-changes actions, Revision/resubmission loops, and preserved review notes
  - Stakeholder reviewer workspace exposes the review brief, links, and decision controls without exposing internal Tasks, team discussion, or internal activity
  - `publish_date` date column on deliverables
  - Tasks attached to Deliverables with create, view, edit, assignment, Kanban status, priority, due date, and completion; lists order by Urgent, High, then Normal priority
  - Task time budgets that calculate Deliverable and Project time-budget rollups
  - Files & links on Tasks for external files, folders, working assets, and references
  - Organization-wide Task assignment with derived internal Project visibility for assigned specialists outside the permanent Project team
  - Focused blocker-details modal when a Task moves to Blocked
  - Ready for Review creates a Needs Approval alert linked to the original Task; leaving that status resolves the alert and resubmission creates a fresh alert
  - Active blocked alerts disappear when the blocker clears while blocked/unblocked history remains in activity
  - Project managers can explicitly update Project lifecycle status from the Project workspace
  - My Tasks separates Needs clarification and regular Work Tasks; Needs Approval appears as an actionable alert rather than a duplicate Task
  - My Tasks view with open assigned work and actionable blocked/unblocked alerts; Done and Canceled Tasks leave the view while remaining in Project and Deliverable history
  - Blocked Task attention rolls up to the parent Deliverable and Project without changing lifecycle status, and prior attention state is restored when the final blocker clears
  - Task creation, updates, blockers, unblock events, and completion roll into Project/Deliverable activity
  - Shared Quill rich-text editing for request narrative responses, Deliverable and Task descriptions, conversations, review notes, and closeout notes; content is stored as structured Delta JSON, rendered through a restricted safe renderer, and remains compatible with legacy plain text
  - Request and Deliverable conversation editors include a lightweight emoji picker that inserts Unicode emoji at the active Quill cursor without adding source-code editing or another editor dependency
  - Unified FullCalendar My Schedule with bounded date-range JSON feeds and focused My Work, Projects, Production, Publishing, and Reviews views
  - Sortable Project Schedule with explicit Deliverable and Task sequence plus inline Project, Deliverable, publish, and Task date adjustments
  - Guarded Project closeout workflow that requires archived Deliverables, verifies final links/approvals/reusable context, preserves formatted closeout notes, and records the final archive timestamp

## ForWorship Theme and Branding Applied

The Inspinia starterkit has been visually aligned to the ForWorship brand.

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

- When should Projects, Deliverables, and Tasks be promoted into implementation after request intake?
- When should optional Campaigns be promoted from future scope?
- What staging validation should be completed before treating Phase 1 as stable outside local development?

## MVP Critical Path

The active critical path is:

1. ~~Add Project and Deliverable editing/lifecycle management~~ Done — Deliverable Management Foundation implemented.
2. ~~Implement Tasks beneath Deliverables with time budgets, links, Kanban status, blocked rollups, and alerts~~ Done — Task Management Foundation implemented.
3. ~~Add deliverable-centered reviews, approvals, and change requests~~ Done — Deliverable Review Foundation implemented.
4. Expand contextual conversations with unread state and complete basic file/external-link attachment support.
5. Validate the complete request-to-archived-project loop, then implement lightweight Campaign and Initiative conversion targets without building full planning modules.

Do not import the historical Inertia/Vue implementation or its duplicate `UserProfile`, role, or permission structures. Recover useful behavior by adapting it to the canonical organization-scoped models and Inspinia Blade frontend.

## Notes

- `php artisan migrate:fresh --seed` passes in `resources/Laravel/starterkit`.
- The full Laravel test suite passes.
- The starterkit Vite production build passes.
- No Campaigns, Initiatives, skills model, recurrence, external calendar sync, uploads, unread inbox, or full capacity model has been implemented yet.
- Persisted project activity events are implemented via the `project_activity_events` table.
- No deployment pipeline exists yet.

Last updated: 2026-06-12 (request-to-archived-project MVP foundation)
