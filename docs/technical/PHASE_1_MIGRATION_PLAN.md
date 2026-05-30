# Phase 1 Migration Planning

## Purpose

This document translates the approved MVP schema map into a Phase 1 migration plan.

It is not implementation code.
It does not create migrations, models, seeders, factories, policies, routes, controllers, or UI.

Use this document as the review checkpoint before Laravel migration work begins.

## Source Of Truth

Primary source:

- `docs/technical/MVP_SCHEMA_MAP.md`

Supporting docs:

- `docs/product/MVP_PHASES_AND_PRIORITIES.md`
- `docs/product/USER_MODEL_AND_PROFILES.md`
- `docs/product/DEPARTMENTS_AND_TEAMS.md`
- `docs/product/ROLES_AND_PERMISSIONS_MODEL.md`
- `docs/technical/AUTH_AND_PERMISSIONS.md`
- `docs/technical/MULTI_TENANCY.md`
- `docs/technical/DATABASE.md`

## Phase 1 Goal

Phase 1 establishes the identity, organization, people, departments, roles, and permission foundation.

Nothing downstream should be built until this layer is stable because requests, projects, deliverables, tasks, reviews, files, notifications, and activity all depend on correct organization scoping and profile-based authorization.

## Explicit Phase 1 Scope

Create the migration plan for these tables:

1. `organizations`
2. Laravel `users`
3. `profiles`
4. `departments`
5. `roles`
6. `permissions`
7. `role_permissions`
8. `profile_role_assignments`

The Laravel `users` table may already exist in the starter kit. If so, Phase 1 should preserve Laravel's auth assumptions and only add fields or related tables when necessary.

## Out Of Scope For Phase 1

Do not create these tables in the first Phase 1 migration batch:

- `requests`
- `request_answers`
- `request_ideas`
- `projects`
- `project_members`
- `deliverable_types`
- `deliverables`
- `deliverable_members`
- `tasks`
- `conversations`
- `conversation_participants`
- `messages`
- `activity_events`
- `audit_logs`
- `review_assignments`
- `change_requests`
- `assets`
- `asset_links`
- `tags`
- `taggables`
- `calendar_items`
- `dashboard_widgets`
- `profile_dashboard_widgets`
- `notifications`

Do not create post-MVP tables such as `memberships`, `campaigns`, `initiatives`, `review_decisions`, or `external_review_tokens` unless a later reviewed decision promotes them.

## Key Product Decisions To Preserve

- `organizations` is the MVP tenant boundary.
- Use `organization_id`, not `tenant_id`, for this schema pass.
- `profiles` serves as the MVP organization membership/access record.
- A profile with a non-null `user_id` represents a logged-in organization member.
- A profile with a null `user_id` represents a contact or external party.
- A future `memberships` table may separate account access lifecycle from profile context after MVP.
- Roles and permissions are separate from person type.
- Department Leader is a role, not a `person_type`.
- Phase 1 should support contacts without login while preserving assignment history.
- All organization-owned records must be scoped by `organization_id`.

## Migration Batch Order

Recommended order:

1. Confirm or preserve Laravel auth tables.
2. Create `organizations`.
3. Create `profiles`.
4. Create `departments`.
5. Add profile/department foreign keys that require both tables.
6. Create `roles`.
7. Create `permissions`.
8. Create `role_permissions`.
9. Create `profile_role_assignments`.
10. Add indexes and unique constraints.
11. Add seed data for MVP system roles and permissions.

If circular foreign keys create migration-order friction, prefer creating nullable columns first and adding constraints in a follow-up migration within the same reviewed batch.

## Table Plan

### organizations

Purpose: church/workspace boundary.

Fields from schema map:

| Field | Phase 1 Direction |
|---|---|
| id | Primary key. |
| name | Required. |
| slug | Required and unique. |
| status | Required. Default active. |
| timezone | Required. Default organization timezone. |
| settings_json | Nullable JSON. Include now, no settings UI. |
| created_at / updated_at | Standard timestamps. |

Suggested indexes:

- Unique `slug`.
- Index `status`.

### users

Purpose: login identity.

Use Laravel starter kit defaults where practical:

| Field | Phase 1 Direction |
|---|---|
| id | Existing primary key. |
| name | Existing display name. |
| email | Existing login email, unique. |
| email_verified_at | Existing auth field. |
| password | Existing auth field. |
| remember_token | Existing auth field. |
| created_at / updated_at | Standard timestamps. |

Do not overload `users` with organization, department, ministry, role, or permissions context.

### profiles

Purpose: organization-scoped person/work context and MVP membership record.

Fields from schema map:

| Field | Phase 1 Direction |
|---|---|
| id | Primary key. |
| organization_id | Required FK to `organizations`. |
| user_id | Nullable FK to `users`. Null means contact/external party without login. |
| department_id | Nullable FK to `departments`. |
| display_name | Required. |
| title | Nullable. |
| person_type | Required enum/string: Staff, Volunteer, Lay Minister, Contractor, Vendor Contact, External Reviewer, General Contact. |
| phone | Nullable. |
| avatar_url | Nullable. |
| bio | Nullable. |
| status | Required: Active, inactive, archived. |
| metadata_json | Nullable JSON. Include now, no UI dependency. |
| created_at / updated_at | Standard timestamps. |

Suggested indexes:

- Index `organization_id`.
- Index `user_id`.
- Index `department_id`.
- Index `status`.
- Composite unique candidate: `organization_id`, `user_id` for logged-in members only. Confirm database support for nullable uniqueness before implementation.

Open implementation note:

- Decide whether a user may have more than one profile in the same organization. The product model currently assumes one login-backed profile per organization, plus many contact profiles without login.

### departments

Purpose: ministries, teams, or organizational departments.

Fields from schema map:

| Field | Phase 1 Direction |
|---|---|
| id | Primary key. |
| organization_id | Required FK to `organizations`. |
| name | Required. |
| slug | Required. |
| parent_department_id | Nullable self-reference. Include now, defer hierarchy UI. |
| lead_profile_id | Nullable FK to `profiles`. |
| status | Required: Active, archived. |
| notes | Nullable. |
| created_at / updated_at | Standard timestamps. |

Suggested indexes:

- Composite unique `organization_id`, `slug`.
- Index `parent_department_id`.
- Index `lead_profile_id`.
- Index `status`.

### roles

Purpose: named permission bundles.

Fields from schema map:

| Field | Phase 1 Direction |
|---|---|
| id | Primary key. |
| organization_id | Nullable FK to `organizations`. Null means platform/global default role. |
| name | Required. |
| slug | Required. |
| scope_type | Required. Include now; Phase 1 should use Organization scope. |
| description | Nullable. |
| is_system | Boolean. Protected seed/default role marker. |
| created_at / updated_at | Standard timestamps. |

Suggested indexes:

- Composite unique `organization_id`, `slug`.
- Index `scope_type`.
- Index `is_system`.

### permissions

Purpose: atomic capabilities.

Fields from schema map:

| Field | Phase 1 Direction |
|---|---|
| id | Primary key. |
| key | Required and unique. |
| name | Required. |
| description | Nullable. |
| created_at / updated_at | Standard timestamps. |

Suggested indexes:

- Unique `key`.

### role_permissions

Purpose: many-to-many role permission mapping.

Documentation name: `role_permissions`.

Laravel migration name may use a conventional pivot if the team prefers, but the product-facing schema language should remain `role_permissions` for clarity.

Fields:

| Field | Phase 1 Direction |
|---|---|
| role_id | Required FK to `roles`. |
| permission_id | Required FK to `permissions`. |

Suggested constraints:

- Composite primary or unique key on `role_id`, `permission_id`.

### profile_role_assignments

Purpose: assign a profile to a role at organization or object scope.

Fields from schema map:

| Field | Phase 1 Direction |
|---|---|
| id | Primary key. |
| organization_id | Required FK to `organizations`. |
| profile_id | Required FK to `profiles`. |
| role_id | Required FK to `roles`. |
| scope_type | Required: Organization, Campaign, Project, Deliverable, Task. Phase 1 should only create Organization assignments. |
| scope_id | Nullable for organization-wide role. |
| assigned_by_profile_id | Nullable FK to `profiles`. |
| assigned_at | Required. |
| ended_at | Nullable. |
| created_at / updated_at | Standard timestamps. |

Suggested indexes:

- Index `organization_id`.
- Index `profile_id`.
- Index `role_id`.
- Composite index `scope_type`, `scope_id`.
- Index `assigned_by_profile_id`.
- Index `ended_at`.

Authorization guardrail:

- Phase 1 permission checks should start with organization-level assignments only. The table is future-ready for deeper scopes, but deeper permission walk-up should not be built until a later implementation plan defines it.

## Seed Data Plan

Seed these system roles:

- Organization Admin
- Communications Manager
- Department Leader
- Contributor
- Viewer

Seed these initial permission keys:

- `organizations.manage`
- `users.invite`
- `profiles.manage`
- `departments.manage`
- `roles.manage`
- `permissions.manage`
- `requests.submit`
- `requests.triage`
- `projects.create`
- `projects.view`
- `projects.manage`
- `deliverables.create`
- `deliverables.view`
- `deliverables.manage`
- `tasks.create`
- `tasks.complete`
- `reviews.assign`
- `reviews.decide`

Seed role-permission mappings conservatively. The Organization Admin should receive all Phase 1 permissions. Other roles should receive only the permissions needed for their expected MVP behavior.

Seed one development organization, one admin user, and one admin profile only if the environment and deployment workflow support safe local/dev seeding. Do not seed real production people without a separate decision.

## Test Plan Before Phase 2

Phase 1 should include tests for:

- An organization can be created with a unique slug.
- A user can have a login-backed profile in an organization.
- A profile can exist without a user for contacts/external parties.
- Profiles cannot bleed across organization boundaries.
- Departments belong to one organization.
- Department slugs are unique inside an organization.
- A department can have a nullable lead profile.
- Roles can be global or organization-specific.
- Permissions are unique by key.
- Roles can receive permissions through `role_permissions`.
- Profiles can receive organization-scoped role assignments.
- Ended role assignments are not treated as active.
- System roles are protected from accidental deletion or unsafe modification.

## Review Checklist Before Code

Before migrations are written, confirm:

- `organization_id` remains the MVP tenant key.
- `profiles` remains the MVP membership/access record.
- No separate `memberships` table is being added in Phase 1.
- `Department Leader` is a role, not a `person_type`.
- Phase 1 uses organization-scoped role assignments only.
- No request/project/deliverable/task/review/file/calendar/dashboard tables are created yet.
- Seed permissions are sufficient for the first implementation slice.
- Foreign key delete behavior is intentional for every relationship.
- Any nullable FK is nullable for a product reason, not convenience.

## Phase 1 Implementation Prompt

Use this prompt only after this planning document is reviewed:

```text
You are working in /Volumes/Big Grey/websites/wegotthis.online.

Goal:
Implement Phase 1 database migrations and seed planning for the approved MVP foundation only.

Primary docs:
- docs/technical/MVP_SCHEMA_MAP.md
- docs/technical/PHASE_1_MIGRATION_PLAN.md
- docs/product/ROLES_AND_PERMISSIONS_MODEL.md
- docs/product/USER_MODEL_AND_PROFILES.md
- docs/product/DEPARTMENTS_AND_TEAMS.md
- docs/technical/AUTH_AND_PERMISSIONS.md
- docs/technical/MULTI_TENANCY.md

Rules:
- Work on a new branch.
- Do not modify resources/ unless the change is directly required by Laravel migration/seeder work.
- Do not build UI.
- Do not create controllers or routes.
- Do not create request, project, deliverable, task, review, asset, notification, calendar, or dashboard tables.
- Do not create a memberships table.
- Use organizations as the tenant boundary and organization_id as the tenant key.
- Preserve Laravel starter kit auth assumptions.

Implement only:
- organizations
- profiles
- departments
- roles
- permissions
- role_permissions
- profile_role_assignments
- conservative Phase 1 seed data if appropriate
- focused tests for organization scoping, profiles, departments, roles, permissions, and assignments

Before editing, inspect the existing Laravel starter kit migrations, models, factories, seeders, and tests.
After editing, run the relevant Laravel tests and report verification.
```

## Stop Point

Stop after this document is reviewed and approved.

Do not begin Phase 1 migration implementation until Brent explicitly confirms.

Last Updated: 2026-05-30
