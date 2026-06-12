# PR #3 Review — MVP Schema Map

**File reviewed:** `docs/technical/MVP_SCHEMA_MAP.md`
**PR:** https://github.com/pbrentyoung1/wegotthis.online/pull/3
**Review date:** 2026-05-30
**Reviewer:** Susan (Claude / Cowork)

---

## 1. Executive Summary

**Directionally sound. Ready to guide Phase 1 migration planning with minor edits.**

This schema map is well-reasoned, clearly documented, and consistent with the majority of documented product decisions. The canonical work hierarchy is honored, tasks correctly belong to deliverables, roles and permissions are properly separated, conversations are attached to work objects, and the review/approval model is properly structured around deliverables and assignments — not a single boolean field. The deferred section is disciplined and appropriate.

**Top 3 risks before migrations begin:**

1. **No explicit membership layer.** The `profiles` table serves as both the identity context record and the org membership record, but there is no `memberships` table and no explicit decision capturing this as an intentional design choice. This creates ambiguity in the access model and could cause a structural rewrite later if a cleaner membership boundary is needed.

2. **Review decisions are embedded, not event-sourced.** Decisions (`decided_by_profile_id`, `decided_at`, `decision_notes`) are inline fields on `review_assignments`. This means only the most recent decision is preserved. Multi-round reviews where a reviewer approves in round 1 and requests changes in round 2 lose the earlier decision. For a system that must document who requested what and when, this is a meaningful limitation.

3. **No `campaign_id` stub on `projects`.** The product hierarchy is Initiative → Campaign → Project. Campaigns are correctly deferred, but when they are added, every `projects` row will need a nullable `campaign_id` FK. A nullable stub now costs nothing and prevents a future migration on a potentially large table.

---

## 2. Critical Issues

These must be resolved or explicitly documented as decisions before migrations begin.

**Issue 1: No membership table or documented decision**

There is no `memberships` table. The `profiles` table uses `organization_id` + `user_id` (nullable) to connect a user to an organization, but a profile is not a membership. Profile governs identity context, display, and work role. Membership governs: is this user allowed access to this organization at all, when did they join, what is their account status, when were they removed?

Options:
- Add a `memberships` table (org_id, user_id, status, invited_at, joined_at, removed_at) as the access gate, and keep profiles for contextual/display data.
- Explicitly document that profiles serve double duty as the membership record in MVP, and that separation may come later.

The second option is acceptable for MVP but must be a documented decision, not an oversight.

**Issue 2: Review decisions are not event-sourced**

`review_assignments` embeds `decided_by_profile_id`, `decided_at`, `decision_notes`. When a reviewer decides on round 1, then the deliverable goes through revision and a round 2 review begins, the assignment record changes. The round 1 decision is gone.

The `review_round` field exists, but overwriting the same assignment row across rounds still loses history.

Options:
- Add a `review_decisions` child table (review_assignment_id, round, decision, notes, decided_by, decided_at) and use that for decision history. Keep the inline fields as denormalized convenience cache if needed.
- Accept the limitation for MVP and document it explicitly, with a note that a `review_decisions` table is the planned future solution.

For a system whose product principle is "Preserve decisions and history instead of overwriting them," the inline approach is misaligned.

**Issue 3: No `campaign_id` FK stub on `projects`**

The project table has `project_type: Campaign Support` but no `campaign_id` field. When campaigns are introduced post-MVP, adding this FK to a production table with real data is a riskier migration. A nullable `campaign_id` now is a zero-cost future hook.

**Issue 4: `deliverables` has no `source_request_idea_id`**

The conversion path from request idea to deliverable is tracked on `request_ideas.converted_deliverable_id` (pointing forward). But the deliverable itself has no record of which request idea created it. The path is only traversable in one direction. Adding `source_request_idea_id` (nullable) to `deliverables` makes the loop bidirectionally traceable and simplifies queries like "which request prompted this deliverable."

---

## 3. MVP Overbuild Risks

| Entity | Assessment | Recommendation |
|---|---|---|
| `dashboard_widgets` + `profile_dashboard_widgets` | Two tables for what may be hardcoded Phase 1 views. Real dashboard personalization is a post-MVP feature. | Keep in schema map as future hook. Do NOT create in first migration phase. |
| `calendar_items` | The schema itself notes "MVP may query source records directly first." Materialized calendar rows are Phase 2+. | Keep in schema map as future hook. Skip in Phase 1 migrations. |
| `conversation_participants.participant_role` | Sender, recipient, participant, watcher adds granularity that project/deliverable team membership already provides. For MVP, being on the project team is sufficient context. | Keep `conversation_participants` table. Simplify or defer the `participant_role` enum to a single nullable field in Phase 1. |
| `profile_role_assignments` scope flexibility | Campaign, Deliverable, and Task scope are well ahead of MVP needs. But the table is correct to include and cheap to have now. | Keep. The scope flexibility is the right call even if only org-level scope is used in Phase 1. |
| `request_answers` | Adds flexibility for future adaptive briefs. Could be seen as overbuild if intake fields stay hardcoded. | Keep. The `question_key` + `answer_type` approach is the right future hook and is not expensive to add now. |
| `deliverable_types.required_fields_json`, `readiness_template_json`, `task_template_json` | These are already marked "Future-ready" in the schema map. Fine as nullable nulls. | Keep as nullable. Correct approach. |

---

## 4. Future Expansion Risks

**Adaptive intake/briefs**
`request_answers` is a good hook. The gap: there is no `question_definitions` or `intake_templates` table that defines which questions are asked for which request types. MVP can hardcode these. But when adaptive briefs are built, a template system will need to be defined. The current schema does not block this; it just has a blind spot on the question-definition side.

**Deliverable-specific workflows**
`deliverable_types` has `required_fields_json`, `readiness_template_json`, and `task_template_json` as future-ready hooks. Good. A future gap: there is no mechanism for deliverable types to require specific review stages. A "Video" type may need a "Technical Readiness" review that an "Email" type does not. The current `review_assignments` model handles this via the `review_type` field, but it is per-assignment, not templated by type. This is a post-MVP concern but worth noting.

**External reviewers and magic links**
`person_type: External Reviewer` exists in profiles. The magic link mechanism is correctly deferred. However, the document does not note what will be needed when magic links are introduced. At minimum, a future `external_review_tokens` table will be needed with: token hash, deliverable_id, profile_id, access scope, expires_at, used_at, revoked_at. Without this note, the addition of magic links may feel like a schema surprise rather than a planned addition.

**Review rounds and approval history**
As noted in Section 2. The inline decision fields on `review_assignments` are the biggest future expansion risk in the schema. A `review_decisions` child table is the clean solution.

**Google Drive / provider abstraction**
The `storage_provider` enum on both `assets` and `attachments` is well-structured. The `provider_file_id`, `provider_folder_id`, `provider_url` pattern is clean and will accommodate future providers without a migration. Good.

**Calendar / scheduling model**
`calendar_items` with `starts_at` / `ends_at` is correct for FullCalendar compatibility. The future gap: there is no recurrence model. A recurring event series will require `recurrence_rule` (RRULE) or a parent `calendar_event_series_id`. This is post-MVP and correctly deferred, but should be noted so the `starts_at` / `ends_at` only design is not assumed to be permanent.

**Scoped roles**
`profile_role_assignments.scope_type` supports Campaign, Project, Deliverable, Task scope. The future risk is authorization layer complexity: when checking permissions for a deliverable action, the system must check org-level, project-level, and deliverable-level assignments. The walk-up hierarchy should be documented in the permissions architecture before complex scoped roles are implemented.

**Dashboard widgets**
`dashboard_widgets.default_roles_json` stores roles as JSON. This is workable while dashboard features are being defined, but a separate `dashboard_widget_roles` pivot table would be cleaner long-term. Accept the JSON approach for now but note it as technical debt when dashboard personalization becomes a real feature.

---

## 5. Relationship Review

**Organization, User, Profile, Membership**

The `profiles` table conflates two concerns: (1) who belongs to this organization, and (2) what is this person's context within the organization. This works for MVP but is ambiguous. The nullable `user_id` on profiles correctly handles contacts without login (external reviewers, vendor contacts). The `person_type` field carries the membership classification. The gap is: there is no lifecycle for org membership itself (invited, joined, suspended, removed). This should be a documented decision.

**Initiative, Campaign, Project, Deliverable, Task**

Campaigns and Initiatives are correctly deferred. The hierarchy from Project → Deliverable → Task is correctly modeled. The only gap is the missing `campaign_id` stub on `projects` (see Section 2).

**Request to Project conversion**

`requests.converted_project_id` captures the forward link. `request_ideas.converted_deliverable_id` captures the idea-to-deliverable link. Both are correct. The gap: the deliverable side has no backward reference (`source_request_idea_id`), and there is no conversion event record (who converted it, when, what was the request state at conversion). For audit purposes, this is a meaningful gap. `activity_events` will capture the conversion event operationally, but the structural link is one-directional.

**Conversations and Messages**

The `conversation_type: Direct Message` and `message_type: direct_message` suggest that user-to-user direct messaging is modeled. If DMs are not in MVP scope, these types should be removed now to avoid building toward an unplanned feature. If DMs are in scope (even lightweight), the `subject_type / subject_id` being nullable handles them correctly. This is an open question that should be resolved before migrations.

The `messages.author_profile_id` being nullable for external reviewer or system contexts is correct. Good.

**Review rounds, assignments, decisions, change requests**

The `change_requests.revision_round` and `review_assignments.review_round` need to stay in sync but there is no enforcement mechanism. These will diverge under real-world conditions unless the application layer manages them carefully. A note or a plan for how round numbers are managed would reduce implementation risk.

The `change_requests` table correctly requires `requested_by_profile_id` (nullable for external contexts) and `requested_at`. Good alignment with the "document who requested the change and when" product decision.

**Assets, Attachments, Tags**

Two tables: `assets` (library items) and `attachments` (lightweight work-object links). The distinction is correct. However, naming is problematic: "attachments" implies binary file uploads, but the intent is Trello-style reference links. The recommended name is `asset_links`. See Section 7.

The promotion path from `attachment` → `asset` is implied by the nullable `attachments.asset_id` FK, but the process is not documented anywhere in the schema map. A note on how this promotion is intended to work (manually by Communications Manager, automatically when a file reaches a threshold) would reduce implementation ambiguity.

**Notifications / Activity / Audit**

The three-way separation of `notifications` (action alerts), `activity_events` (visible operational history), and `audit_logs` (protected accountability records) is well-designed and consistent with the documented product philosophy. This is one of the strongest parts of the schema.

The `notifications` table does not have a `channel` or `sent_via` field (in-app, email, etc.). For MVP with in-app-only notifications this is fine, but when transactional email is added (which is an MVP requirement per CLAUDE.md), tracking delivery channel and delivery status will be needed. Consider adding a nullable `channel` field now.

---

## 6. Missing Entities or Fields

Listed in priority order. Only things that matter for Lean MVP or necessary future hooks.

**High priority (before Phase 1 migrations)**

1. **Decision on membership model.** Either add a `memberships` table or document that `profiles` serves this purpose in MVP.

2. **`campaign_id` nullable FK on `projects`.** Zero cost now, avoids a painful FK migration later.

3. **`source_request_idea_id` nullable on `deliverables`.** Makes the conversion loop bidirectionally traceable.

4. **Decision on Direct Message scope.** Remove `Direct Message` and `direct_message` types from conversations/messages if DMs are not in MVP scope.

**Medium priority (before review milestone)**

5. **`review_decisions` child table plan.** Even if not built in Phase 1, the schema map should note this as the intended future table to replace inline decision fields.

6. **`notifications.channel` field.** Nullable. Prepares for transactional email without a migration.

7. **`external_review_tokens` note.** Not a table yet, but the schema map should document that this table will be needed when magic links are added.

**Lower priority (post-MVP planning)**

8. **`attachments.promotion_path` note.** Document how an attachment becomes an asset. Not a schema field, but a process note.

9. **`closeout_started_at` on `projects`.** There is `completed_at` and `archived_at` but no timestamp for when the Closeout lifecycle stage began. The Closeout stage is explicitly in the lifecycle — a `closeout_started_at` field would make it trackable.

---

## 7. Naming and Concept Clarity

**`person_type` vs `profile_type`**
The field is named `person_type` in the schema map. The term `person_type` is clearer (it describes the kind of person, not the profile record). Keep `person_type`. The values — Staff, Volunteer, Lay Minister, Contractor, Vendor Contact, Department Leader, External Reviewer, General Contact — are sensible. One issue: "Department Leader" is also an MVP system role name. Having it as both a person_type and a role name creates conceptual overlap. A Department Leader is a role a person holds, not a distinct type of person. Consider removing "Department Leader" from `person_type` values and letting that designation come through the roles system.

**`stakeholder/vendor/contractor/volunteer/Lay Minister`**
"Lay Minister" is appropriately church-specific. "Vendor Contact" (person_type) and "Contributor" (project_role, deliverable_role) are clear. "Stakeholder" as a `project_role` value is correct and distinct from the person types. No conflicts here beyond the Department Leader overlap noted above.

**`calendar_items` vs `schedule_items`**
`calendar_items` is the right name. It aligns with FullCalendar's vocabulary (events, items, sources). Keep it.

**`review_decisions` vs `approval_decisions`**
The concept is currently embedded in `review_assignments`. If a separate table is added, call it `review_decisions` — this is broader than "approval" since a decision can be approval, changes requested, or waived.

**`attachments` vs `assets` vs `asset_links`**
This is the most important naming issue in the document. The table called `attachments` stores reference links in the Trello model — not binary file uploads. Naming it `attachments` implies uploaded binaries. The correct name is `asset_links`. Rename `attachments` → `asset_links` before migrations are written.

**`inbox_items` vs `notifications`**
The `notifications` table is the inbox. This is fine for MVP. If a future distinction between "push notification" (delivery event) and "inbox item" (persistent in-tray record) is needed, the table may need to be split. For now, `notifications` covering both is acceptable and simpler.

**`activity_events` vs `audit_logs`**
Correctly separated and clearly named. `activity_events` for visible project history. `audit_logs` for protected accountability records. Keep both names.

**`permission_role` pivot table**
Laravel convention produces `permission_role` (alphabetical). For documentation clarity, `role_permissions` is more readable. The table name in migrations can follow Laravel convention; the schema map documentation can use `role_permissions` for readability. Minor issue.

---

## 8. Phase 1 Migration Recommendation

Phase 1 should establish the identity, membership, and permission foundation. Nothing else should run until this foundation is stable and tested.

**Recommended Phase 1 tables:**

- `organizations`
- `users` (Laravel default fields + any MVP additions)
- `profiles`
- `departments`
- `roles`
- `permissions`
- `role_permissions` (the `permission_role` pivot)
- `profile_role_assignments`

**Relationships to establish in Phase 1:**

- `profiles.organization_id` → `organizations.id`
- `profiles.user_id` → `users.id` (nullable)
- `profiles.department_id` → `departments.id` (nullable)
- `departments.organization_id` → `organizations.id`
- `departments.parent_department_id` → `departments.id` (nullable, self-referential)
- `departments.lead_profile_id` → `profiles.id` (nullable)
- `roles.organization_id` → `organizations.id` (nullable)
- `role_permissions.role_id` → `roles.id`
- `role_permissions.permission_id` → `permissions.id`
- `profile_role_assignments.organization_id` → `organizations.id`
- `profile_role_assignments.profile_id` → `profiles.id`
- `profile_role_assignments.role_id` → `roles.id`
- `profile_role_assignments.assigned_by_profile_id` → `profiles.id` (nullable)

**Fields to include now:**
All fields listed in the schema map for these tables.

**Fields to defer from Phase 1:**
- `organizations.settings_json` — include the column but leave empty; don't build settings UI in Phase 1
- `profiles.metadata_json` — same
- `departments.parent_department_id` — include the column, defer hierarchy UI
- `roles.scope_type` — include; Phase 1 only uses organization scope but the column should exist

**Seed data needed for Phase 1:**
- One seed organization (the pilot church or a dev/staging org)
- Five system roles: Organization Admin, Communications Manager, Department Leader, Contributor, Viewer (with `is_system: true`)
- Core permission set at minimum: `organizations.manage`, `users.invite`, `projects.create`, `projects.view`, `projects.manage`, `deliverables.create`, `deliverables.view`, `deliverables.manage`, `requests.submit`, `requests.triage`, `tasks.create`, `tasks.complete`, `reviews.assign`, `reviews.decide`
- Default role-permission mappings for all five system roles
- One seed admin user and profile

**Risks to test locally before proceeding to Phase 2:**
- Can a single user have profiles in multiple organizations? (Test multi-profile flow)
- Does profile deletion / deactivation correctly cascade or preserve assignment history?
- Does `profile_role_assignments` correctly scope to organization and prevent cross-org assignment bleed?
- Is `is_system: true` on roles enforced so system roles cannot be deleted or modified?
- Does the nullable `user_id` on profiles correctly represent contacts who have no login?
- Does `roles.organization_id` nullable correctly represent system/global roles vs org-specific custom roles?

---

## 9. Specific Edits to MVP_SCHEMA_MAP.md

**Edit 1**
- Section: Schema Principles
- Issue: No principle about the membership model
- Recommended edit: Add bullet — "Treat `profiles` as the MVP membership record for organization access. A profile with a non-null `user_id` represents a logged-in member. A profile with a null `user_id` represents a contact or external party. A formal `memberships` table may be introduced post-MVP if access lifecycle tracking requires separation."

**Edit 2**
- Section: Foundation Tables / profiles
- Issue: `person_type` value "Department Leader" duplicates the role name and conflates person type with role
- Recommended edit: Remove "Department Leader" from `person_type` values. Department Leader is a role, not a person type. Updated values: Staff, Volunteer, Lay Minister, Contractor, Vendor Contact, External Reviewer, General Contact.

**Edit 3**
- Section: Project Tables / projects
- Issue: No `campaign_id` stub for future Campaign association
- Recommended edit: Add field to `projects` table — `campaign_id | Nullable. FK stub for future Campaign association.`

**Edit 4**
- Section: Deliverable Tables / deliverables
- Issue: No backward reference to the request idea that generated the deliverable
- Recommended edit: Add field to `deliverables` table — `source_request_idea_id | Nullable. FK to request_ideas if converted from an idea.`

**Edit 5**
- Section: Files, Links, and Asset Tables
- Issue: Table named `attachments` implies binary uploads; actual purpose is Trello-style reference links
- Recommended edit: Rename `attachments` table to `asset_links`. Update all references in the document including the Core Relationship Map (which currently says "Assets / File Links") and the taggables `taggable_type` list.

**Edit 6**
- Section: Review and Approval Tables / review_assignments
- Issue: Inline decision fields cannot preserve per-round decision history
- Recommended edit: Add a note below the `review_assignments` field table — "Note: `decided_by_profile_id`, `decided_at`, and `decision_notes` represent the most recent decision only. A future `review_decisions` child table (review_assignment_id, round, decision, notes, decided_by, decided_at) will be needed to preserve full per-round decision history. This is the planned expansion path."

**Edit 7**
- Section: Notification Tables / notifications
- Issue: No `channel` field for future email/SMS delivery tracking
- Recommended edit: Add field — `channel | Nullable. in_app, email, sms. Defaults to in_app for MVP.`

**Edit 8**
- Section: Explicitly Deferred From Lean MVP
- Issue: No mention of what magic links will require when promoted
- Recommended edit: Update the magic link deferral note — "Magic-link external review unless promoted into the current milestone. When promoted, an `external_review_tokens` table will be needed (token_hash, deliverable_id, profile_id, access_scope, expires_at, used_at, revoked_at)."

**Edit 9**
- Section: Conversation, Message, Activity, and Audit Tables / conversations
- Issue: `Direct Message` conversation type implies DM feature scope that may not be in MVP
- Recommended edit: Either remove "Direct Message" from `conversation_type` values, or add a note — "Direct Message type is included for schema completeness. DM functionality is deferred from Phase 1 unless explicitly promoted."

**Edit 10**
- Section: Projects / projects
- Issue: No `closeout_started_at` timestamp despite Closeout being an explicit lifecycle stage
- Recommended edit: Add field — `closeout_started_at | Nullable. Set when project enters Closeout lifecycle stage.`

**Edit 11**
- Section: MVP Build Order
- Issue: Calendar/dashboard are listed as step 13 but should be explicitly marked as Phase 2+
- Recommended edit: Add a note to item 13 — "Calendar and dashboard tables should be considered Phase 2 unless Phase 1 feedback requires them. MVP may query source records directly for calendar views."

---

## 10. Final Recommendation

**Approve with minor edits.**

The schema map is architecturally sound, well-scoped, and ready to guide Phase 1 migration planning. It correctly implements the documented product decisions, avoids the major overbuild temptations, and leaves the right hooks for future features.

The edits in Section 9 should be applied before Phase 1 migrations are written. None of them require redesigning the schema — they are naming fixes, FK stubs, clarifying notes, and one field addition.

The two structural conversations that should happen before migration planning begins:

1. **Membership model.** Document whether `profiles` is the MVP membership record or whether a `memberships` table will be added before Phase 2.

2. **Review decision history.** Acknowledge the inline-decision limitation and document `review_decisions` as the planned expansion path, so the Phase 1 implementation does not accidentally over-rely on the inline fields in ways that would require a destructive migration later.

Neither of these requires blocking the PR. They can be addressed as follow-up commits or PR comments before migration work begins.

---

*This review was produced against `docs/technical/MVP_SCHEMA_MAP.md` as of 2026-05-30 (PR #3). It does not propose any migration files or application code. All recommendations should be treated as PR comments or follow-up commits before being considered final.*
