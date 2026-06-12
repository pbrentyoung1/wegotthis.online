# PR #4 Review — Phase 1 Migration Plan

**File reviewed:** `docs/technical/PHASE_1_MIGRATION_PLAN.md`
**PR:** https://github.com/pbrentyoung1/wegotthis.online/pull/4
**Schema map source:** `docs/technical/MVP_SCHEMA_MAP.md` (merged, PR #3)
**Review date:** 2026-05-30
**Reviewer:** Susan (Claude / Cowork)

---

## Executive Summary

The Phase 1 migration plan is well-structured, correctly scoped, and faithful to the approved schema map. The 8-table scope is right. The out-of-scope exclusion list is thorough. The field lists match the schema map. The product decisions are correctly restated. The implementation prompt is a strong addition for handoff to Codex.

Two items must be resolved before migrations begin. One is a real blocker: FK delete behavior is called out in the review checklist but never specified anywhere in the plan, which means Codex will choose cascade/restrict/nullify for every relationship without guidance — a significant data integrity risk for a system holding real church production data. The other is a structural gap in the test plan: there is no online or staging checkpoint, only local validation scenarios.

Three minor edits are also needed, the most consequential being the seed permissions list, which quietly reaches into Phase 2+ resources without documenting that as an intentional decision.

---

## Critical Blockers

### Blocker 1: FK Delete Behavior Is Unspecified

The review checklist at the bottom of the document correctly flags this: "Foreign key delete behavior is intentional for every relationship." But the plan never specifies what that behavior is for any FK.

Codex will be left to choose for every relationship. Those choices will be inconsistent, difficult to audit, and potentially dangerous to data integrity if the wrong cascade behavior is applied to organization- or profile-level records.

These decisions must be documented in the plan before migrations are written:

| Relationship | FK | Recommended behavior | Notes |
|---|---|---|---|
| profiles → organizations | profiles.organization_id | RESTRICT | Do not allow org deletion while profiles exist. |
| profiles → users | profiles.user_id | SET NULL | Preserve contact/profile record if a user account is deleted. |
| profiles → departments | profiles.department_id | SET NULL | Preserve profile if department is removed. |
| departments → organizations | departments.organization_id | RESTRICT | Do not allow org deletion while departments exist. |
| departments → profiles (lead) | departments.lead_profile_id | SET NULL | Preserve department if lead is removed. |
| departments → departments (parent) | departments.parent_department_id | SET NULL | Preserve child department if parent is removed. |
| roles → organizations | roles.organization_id | RESTRICT | Do not allow org deletion while custom roles exist. System roles (org_id NULL) are unaffected. |
| role_permissions → roles | role_permissions.role_id | CASCADE | When a role is deleted, its permission mappings should be removed. |
| role_permissions → permissions | role_permissions.permission_id | RESTRICT | Do not delete permissions that are actively assigned to roles. |
| profile_role_assignments → profiles | profile_role_assignments.profile_id | RESTRICT | Preserve assignment history; do not cascade-delete. Consider soft-delete pattern. |
| profile_role_assignments → roles | profile_role_assignments.role_id | RESTRICT | Do not delete roles with active or historical assignments. |
| profile_role_assignments → profiles (assigned_by) | profile_role_assignments.assigned_by_profile_id | SET NULL | Preserve assignment record even if assigner is removed. |

These are recommendations, not final decisions. Brent should confirm or override each one. Once confirmed, they should be added to the plan before Codex begins migration work.

The consequences of getting this wrong: a cascade delete on `profiles.organization_id` could silently wipe all profile data if an organization record is ever deleted or reassigned. A restrict on `profiles.user_id` could block user account removal. These are real operational risks.

---

### Blocker 2: No Online/Staging Checkpoint in the Test Plan

The test plan section covers local validation scenarios only. The review criteria specifically requires both a local validation pass and an online/staging checkpoint.

There is no structured step in the plan for:
- Deploying Phase 1 migrations to a staging or preview environment
- Running migrations against a real PostgreSQL instance (not just local dev)
- Verifying seed data is present and correct after deployment
- Confirming there are no environment-specific failures (timezone handling, PostgreSQL version differences, JSON column behavior, etc.)

Add a staging checkpoint section to the test plan. Suggested content:

```
## Staging Checkpoint

Before treating Phase 1 as stable:

1. Run Phase 1 migrations against the staging PostgreSQL database.
2. Confirm all 8 tables are created with correct columns, indexes, and constraints.
3. Confirm seed data is present: 5 system roles, full permission set, role-permission mappings.
4. Confirm organization scoping: a profile created for org A cannot be retrieved in an org B context.
5. Confirm a login-backed profile (user_id set) and a contact profile (user_id null) both create correctly.
6. Confirm the composite unique index on (organization_id, user_id) behaves correctly: two contact profiles with null user_id in the same org are allowed; two login-backed profiles for the same user in the same org are not.
7. Confirm system roles cannot be deleted or modified through normal application paths.
8. Confirm role-permission assignments survive a migration rollback and re-run without data duplication.
9. Confirm foreign key constraints prevent the known unsafe deletions (see FK delete behavior above).
10. Confirm Laravel auth (login, registration, email verification) is unaffected by Phase 1 migrations.
```

---

## Minor Edits

### Edit 1: Seed Permissions Reach Into Phase 2+ Without a Documented Decision

The seed permissions list includes:

- `requests.submit`, `requests.triage` — Phase 2 (requests table not created in Phase 1)
- `projects.create`, `projects.view`, `projects.manage` — Phase 2
- `deliverables.create`, `deliverables.view`, `deliverables.manage` — Phase 2
- `tasks.create`, `tasks.complete` — Phase 2
- `reviews.assign`, `reviews.decide` — Phase 2

Seeding these in Phase 1 is not inherently wrong — permissions are a lookup table, and seeding the full set upfront makes role-permission mapping complete from the start. But the plan does not explain this, which makes it look like an accidental inclusion.

Add a note to the Seed Data Plan:

> "Phase 1 seeds the full MVP permission set, not just Phase 1-relevant permissions. Permissions are a stable lookup table. Seeding them now lets role-permission mappings be complete before Phase 2 work begins. Permission keys for Phase 2+ features (requests, projects, deliverables, tasks, reviews) are included now intentionally and will remain inert until those tables and policies exist."

If the team decides instead to seed only Phase 1-relevant permissions and add the rest in later phases, that is also valid — but it should be a documented decision, not an implicit one.

---

### Edit 2: Circular FK Resolution Is Described But Not Named

Step 5 in the Migration Batch Order says "Add profile/department foreign keys that require both tables." This is the right call — `profiles.department_id` and `departments.lead_profile_id` form a circular dependency that requires both tables to exist before either FK constraint can be added.

But the plan does not name which specific FKs are deferred. A developer implementing from this document will need to figure it out. Name them explicitly:

> "Step 5 adds two deferred FK constraints: `profiles.department_id` references `departments`, and `departments.lead_profile_id` references `profiles`. Both columns should be created as nullable without FK constraints in steps 3 and 4, and the constraints should be added in step 5 after both tables exist."

---

### Edit 3: PostgreSQL Nullable Uniqueness Note Is Misleading

Line 180-181:

> "Composite unique candidate: `organization_id`, `user_id` for logged-in members only. Confirm database support for nullable uniqueness before implementation."

This implies uncertainty about PostgreSQL behavior that does not exist. PostgreSQL handles nullable unique indexes correctly: NULLs are treated as distinct from each other, so multiple rows with `user_id = NULL` in the same organization are allowed. This is exactly the behavior needed for contact profiles without login.

Replace with:

> "Composite unique index on `(organization_id, user_id)`. PostgreSQL treats NULLs as distinct in unique indexes, so multiple contact-only profiles (user_id NULL) per organization are correctly allowed, while two login-backed profiles for the same user in the same organization are correctly rejected. No special handling is needed."

---

### Edit 4: `profiles.status` Capitalization Is Inconsistent

Line 170 lists: `Active, inactive, archived`

Lowercase `inactive` and `archived` while `Active` is capitalized. The schema map has the same inconsistency. Standardize to: `Active, Inactive, Archived`.

---

### Edit 5: `organizations.timezone` Has No Stated Default

The field is listed as "Required. Default organization timezone." but no default value is specified. Codex will choose one and it may not be intentional. Add a note: "Suggested default: `UTC`. Each organization may override during setup."

---

## Phase 1 Migration Readiness

**Scope:** Correct. All 8 tables are present. No Phase 2+ tables are included.

**Out-of-scope list:** Thorough and complete. Every downstream table is named.

**Field lists:** All fields match the approved schema map. No drift detected.

**Nullable fields:** All nullable fields are nullable for documented product reasons. None appear to be nullable by accident.

**Table order:** The migration batch order is correct. The circular dependency between `profiles` and `departments` is identified and the deferred-constraint approach is the right solution. Just needs to name the specific FKs (Edit 2 above).

**Seed data:** The 5 system roles match the documented MVP roles. The permission set is reasonable, but the reach into Phase 2+ permissions needs a documented rationale (Edit 1 above).

**Product decisions:** Correctly preserved. `profiles` as membership record, `organization_id` as tenant key, `Department Leader` as a role not a person_type, contacts with null `user_id` — all correctly restated.

**Implementation prompt:** Well-formed, safe, and appropriately constrained. A good handoff artifact. Minor note: the absolute file path (`/Volumes/Big Grey/websites/wegotthis.online`) is machine-specific. If this is ever run on another machine, that path will fail silently. Not a blocker, just worth noting.

---

## Final Recommendation

**Approve with edits.**

The plan is structurally ready. The scope is right, the field lists are clean, the product decisions are faithfully preserved, and the implementation prompt gives Codex clear guardrails.

Two things must be done before migration work begins:

1. **Specify FK delete behavior** for all 12 relationships listed in Blocker 1. Confirm or override the recommended behaviors and add them to the plan. This is the most important step — everything else is clarification.

2. **Add a staging checkpoint** to the test plan (suggested content in Blocker 2).

The three remaining edits (seed permission rationale, circular FK naming, PostgreSQL index note) are documentation clarity improvements that can be done in the same commit.

Once those are in, hand this to Codex.

---

*Review produced against PR #4 / `docs/technical/PHASE_1_MIGRATION_PLAN.md` as of 2026-05-30. Recommendations should be applied as PR comments or follow-up commits before implementation begins.*
