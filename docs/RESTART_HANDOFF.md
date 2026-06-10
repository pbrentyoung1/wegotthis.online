# Restart Handoff

Last updated: 2026-06-03

## Working Directory

```bash
cd "/Volumes/Big Grey/websites/wegotthis.online"
```

## Current Branch

Branch:

```text
feature/phase-1-scenario-seeder
```

Remote tracking branch:

```text
origin/feature/phase-1-scenario-seeder
```

Latest pushed feature commit before this handoff:

```text
5f6dc6e test: add Phase 1 church scenario seeder
```

The branch has been pushed. A pull request still needs to be opened manually because the GitHub connector was unavailable and the `gh` CLI is not installed locally.

PR creation URL:

```text
https://github.com/pbrentyoung1/wegotthis.online/pull/new/feature/phase-1-scenario-seeder
```

## Main Branch Context

Phase 1 foundation migrations are merged and validated on `main`.

Phase 1 test scenario documentation was merged in PR #6.

The following docs exist on `main`:

- `docs/technical/MVP_SCHEMA_MAP.md`
- `docs/technical/PHASE_1_MIGRATION_PLAN.md`
- `docs/technical/PHASE_1_TEST_SCENARIO.md`
- `docs/product/REQUEST_LIFECYCLE.md`
- `docs/CURRENT_STATE.md`

`docs/CURRENT_STATE.md` was updated and pushed to `main` in commit:

```text
102a3eb docs: update current project state
```

## Current Feature Branch Scope

This branch adds only the opt-in Phase 1 church scenario seeder and matching feature tests.

Changed implementation files:

- `resources/Laravel/starterkit/database/seeders/Phase1ScenarioSeeder.php`
- `resources/Laravel/starterkit/tests/Feature/Phase1ScenarioTest.php`

No migrations were created or modified on this branch.

No Phase 2+ tables or workflows were created.

## Scenario Seeder Behavior

`Phase1ScenarioSeeder` is opt-in. `DatabaseSeeder` was not modified to call it automatically.

The seeder calls `Phase1FoundationSeeder` first so system roles and permissions exist.

It idempotently creates the Grace Community Church scenario from:

```text
docs/technical/PHASE_1_TEST_SCENARIO.md
```

Scenario data:

- Organization: Grace Community Church
- Slug: `grace-community-church`
- Timezone: `America/Chicago`
- Status: `Active`

Departments:

- Communications
- Kids Ministry
- Worship
- Production
- Administration

Login-backed staff profiles:

- Jordan Lee, Communications Manager
- Rachel Kim, Kids Pastor, Department Leader role assignment
- Marcus Bell, Production Lead, Contributor role assignment
- Elena Torres, Communications Admin, Contributor role assignment

Contact-only profiles:

- Chris Morgan, Vendor Contact, no user, no department
- Avery Brooks, External Reviewer, no user, Kids Ministry department

Contact-only email addresses are stored in `metadata_json`.

## Scenario Tests

`Phase1ScenarioTest` covers:

- scenario seeder idempotency
- login-backed staff profiles connected to users and departments
- contact-only profiles without users
- Department Leader represented as a role assignment, not `person_type`
- expected role assignments for Jordan, Rachel, Marcus, and Elena
- Chris and Avery having no active role assignments
- future VBS identity anchors without Phase 2 tables
- department lead profile anchor behavior

## Explicitly Not Built

Do not add these in the current branch:

- migrations
- requests or request forms
- request answers or request ideas
- campaigns
- projects
- deliverables
- tasks
- work participants
- conversations or messages
- assets or asset links
- reviews or change requests
- calendar or dashboard tables
- skills, profile skills, or capacity tables
- UI
- routes
- controllers
- policies

## Validation Status

Run from:

```bash
cd "/Volumes/Big Grey/websites/wegotthis.online/resources/Laravel/starterkit"
```

Last validation results on `feature/phase-1-scenario-seeder`:

```bash
php artisan migrate:fresh --seed
```

Passed.

```bash
php artisan db:seed --class=Phase1ScenarioSeeder
```

Passed.

```bash
php artisan test tests/Feature/Phase1FoundationTest.php
```

Passed: 10 tests, 17 assertions.

```bash
php artisan test tests/Feature/Phase1ScenarioTest.php
```

Passed: 7 tests, 67 assertions.

```bash
./vendor/bin/pint --dirty
```

Passed.

```bash
composer test
```

Failed only because of a known pre-existing Vite manifest issue in `Tests\Feature\ExampleTest`.

Known failure:

```text
Unable to locate file in Vite manifest: resources/js/pages/dashboard-projects.js
```

Do not fix that issue in the Phase 1 scenario seeder branch unless explicitly requested.

## Known Untracked Files

These may exist locally and should remain untracked and uncommitted unless explicitly requested:

- `docs/technical/PR3_SCHEMA_REVIEW.md`
- `docs/technical/PR4_MIGRATION_PLAN_REVIEW.md`
- `resources/Laravel/starterkit/components.d.ts`
- `resources/Laravel/starterkit/resources/js/actions/`
- `resources/Laravel/starterkit/resources/js/routes/`
- `resources/Laravel/starterkit/resources/js/wayfinder/`

## Resume Commands

After restarting, run:

```bash
cd "/Volumes/Big Grey/websites/wegotthis.online"
git fetch --all --prune
git checkout feature/phase-1-scenario-seeder
git pull --ff-only origin feature/phase-1-scenario-seeder
git status --short --branch
```

Expected status:

- On `feature/phase-1-scenario-seeder`
- No tracked changes
- Only the known untracked generated/review files may appear

## Recommended Next Steps

1. Open a PR for `feature/phase-1-scenario-seeder` into `main`.
2. Use this URL if GitHub tooling is still unavailable:

```text
https://github.com/pbrentyoung1/wegotthis.online/pull/new/feature/phase-1-scenario-seeder
```

3. Confirm the PR scope is limited to:

- `resources/Laravel/starterkit/database/seeders/Phase1ScenarioSeeder.php`
- `resources/Laravel/starterkit/tests/Feature/Phase1ScenarioTest.php`
- this handoff document, if kept on the branch

4. After review, merge the PR.
5. Pull `main` and rerun focused validation:

```bash
git checkout main
git pull --ff-only origin main
cd resources/Laravel/starterkit
php artisan migrate:fresh --seed
php artisan db:seed --class=Phase1ScenarioSeeder
php artisan test tests/Feature/Phase1FoundationTest.php
php artisan test tests/Feature/Phase1ScenarioTest.php
```

6. Plan the next development slice before creating Phase 2 code.

Likely next planning topic:

- Phase 2 request/intake foundation, or
- a VBS scenario expansion plan

Do not begin Phase 2 implementation until the next scope is explicitly defined.

## Tooling Notes

The GitHub connector failed with an MCP startup/handshake error to the ChatGPT backend.

The `gh` CLI is not installed.

Use the browser PR creation URL above if automated PR creation is still unavailable.
