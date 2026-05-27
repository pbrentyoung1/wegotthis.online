# Next Session Handoff

Date: 2026-05-27

Last committed state: `78c14f7 feat: add user management directory`

## Current State

The Laravel starterkit now has the first real user-management surface committed.

Implemented routes:

- `/users/contacts`
- `/users/profile/{user}`
- `/users/roles`
- `/users/roles/{role:slug}`
- `/users/permissions`
- `/settings/profile`
- `/settings/password`
- `/settings/two-factor`

Key implementation files:

- `resources/Laravel/starterkit/routes/users.php`
- `resources/Laravel/starterkit/app/Http/Controllers/Users/`
- `resources/Laravel/starterkit/app/Models/UserProfile.php`
- `resources/Laravel/starterkit/app/Models/Role.php`
- `resources/Laravel/starterkit/app/Models/Permission.php`
- `resources/Laravel/starterkit/database/seeders/UserDirectorySeeder.php`
- `resources/Laravel/starterkit/resources/js/views/admin/users/`
- `resources/Laravel/starterkit/resources/js/views/admin/settings/`

The user/profile pages were aligned toward local Inspinia references. Prefer continuing to adapt existing Inspinia page patterns instead of redesigning from scratch unless the workflow truly requires a different layout.

## Verification Already Completed

After the committed work:

- `composer test` passed: 45 tests, 199 assertions.
- `npm run build` passed.
- The existing Vite large `app` chunk warning remains and is not currently blocking.
- Local Mailpit was configured for email testing.

Useful local services:

- Laravel app: `http://127.0.0.1:8000`
- Vite: `http://127.0.0.1:5173`
- Mailpit UI: `http://127.0.0.1:8025`
- Mailpit SMTP: `127.0.0.1:1025`

Local `.env` mail settings were changed but not committed:

- `MAIL_MAILER=smtp`
- `MAIL_HOST=127.0.0.1`
- `MAIL_PORT=1025`
- `MAIL_FROM_ADDRESS=notifications@forworship.test`

## Product Decisions Captured

Profile page:

- `Recent Messages` is intended to become a mixed feed of system-generated notifications and person/team messages.
- `My Tasks` should eventually support table/list, Kanban, and calendar views.
- `Clients` from the Inspinia reference was replaced with `Projects`.
- `Follow` was removed; `Message` should remain.

Design approach:

- Use Inspinia patterns as the default source for application pages.
- Avoid bespoke redesign unless required by the real workflow.
- Keep the user-management UI close to Inspinia so future work can focus on functionality.

Continuity:

- Agent instructions now require documenting actions, decisions, and verification so work can resume after disconnects.

## Recommended Next Module

Build **Projects** next.

Reason: Projects should become the backbone for tasks, messages/activity, approvals, files, calendar entries, roles, and intake requests. Building Projects first gives future modules a real context.

Recommended first slice:

1. Add project data model:
   - `projects` table
   - project owner relationship to `users`
   - optional many-to-many project members using users
   - status, priority, start date, due date, summary, department/category
2. Add factories and seeders:
   - plausible church communications projects
   - varied statuses and priorities
   - assign owners and members from existing seeded users
3. Add routes/controllers:
   - `/projects`
   - `/projects/{project:slug}` or `/projects/{project}`
4. Add UI:
   - use an existing Inspinia project/list/card pattern if available
   - index page with search/filter/pagination
   - detail page with overview plus placeholder sections for tasks, messages/activity, files, and timeline
5. Add feature tests:
   - project index renders for authenticated users
   - project detail renders
   - seeded owner/member data is available in Inertia props

Likely follow-up sequence after Projects:

1. Tasks
2. Messages/Activity
3. Calendar
4. Files/Media
5. Intake/Requests

## First Commands Next Session

From repo root:

```bash
git status --short
git log -1 --oneline
cd resources/Laravel/starterkit
php artisan migrate:status
composer test
npm run build
```

If the app server is not running:

```bash
cd resources/Laravel/starterkit
php artisan serve --host=127.0.0.1 --port=8000
```

If Vite is not running:

```bash
cd resources/Laravel/starterkit
npm run dev -- --host 127.0.0.1
```

## Important Cautions

- Do not revert user work or uncommitted files if the tree is dirty next session.
- Do not commit `.env`.
- Do not commit `public/build`.
- The committed headshot source images and public headshot copies are intentional.
- Keep database/load handling conservative: pagination, eager loading, narrow Inertia props, and no RBAC package unless explicitly needed.
