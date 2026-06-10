# Phase 2 Request Intake Planning

## Purpose

Define the reviewed implementation boundary for the first Phase 2 slice: the request/intake foundation.

This document is the approved implementation boundary for the Phase 2 request/intake foundation.

Implementation status:

- Approved on 2026-06-10.
- Implemented in the current application codebase.
- The implementation remains limited to the boundary defined here.

## Source Of Truth

Primary sources:

- `docs/technical/MVP_SCHEMA_MAP.md`
- `docs/product/REQUEST_LIFECYCLE.md`
- `docs/technical/AUTH_AND_PERMISSIONS.md`
- `docs/product/MVP_PHASES_AND_PRIORITIES.md`

Phase 1 foundation:

- `docs/technical/PHASE_1_MIGRATION_PLAN.md`
- `docs/technical/PHASE_1_TEST_SCENARIO.md`

## Goal

Establish a durable, organization-scoped ministry request record that preserves the original brief, flexible answers, requester ideas, and triage state before Projects are implemented.

The slice must prove:

```text
Department Leader creates and submits a request
  -> Communications Manager receives it for triage
    -> clarification or a terminal triage decision can be recorded
      -> the original request and answers remain understandable
```

Project conversion is represented only as future readiness in this slice. No Project is created.

## Explicit Scope

Plan the implementation of:

1. `requests`
2. `request_answers`
3. `request_ideas`
4. Eloquent models and Phase 1 relationship additions required by these tables
5. A small request-intake domain write service or validator that enforces organization scope and lifecycle transitions
6. Focused seed scenario additions for one realistic Grace Community Church request
7. Focused feature tests for organization scope, lifecycle constraints, answer preservation, idea decisions, and foreign-key behavior

## Explicitly Out Of Scope

Do not create:

- request form UI
- controllers, routes, API endpoints, policies, or notifications
- Projects or project conversion logic
- Campaigns
- Deliverables or Tasks
- conversations, messages, activity events, or audit logs
- attachments, assets, or file uploads
- adaptive form builders or request templates
- automatic triage recommendations

## Canonical Decisions

- `organization_id` is required on every Phase 2 request/intake table.
- `requester_profile_id` is required and references a profile in the same organization.
- `assigned_manager_profile_id` is nullable and represents the Communications Manager currently responsible for triage.
- Department Leader is a role assignment, not a `person_type`.
- Requests are separate from Projects.
- Requester ideas remain suggestions and do not become Deliverables in this slice.
- Original answers preserve the question key, displayed label, answer type, value, structured JSON when needed, and order.
- Submission requires a title, requester profile, and ministry need. Department remains recommended but nullable.
- `request_id + question_key` is unique for this slice. Repeating question groups remain deferred.
- Campaigns remain deferred.
- No UI stack decision is required for this data-foundation slice.

## Request Lifecycle

Canonical statuses:

- Draft
- Submitted
- Needs Clarification
- In Triage
- Accepted
- Deferred
- Rejected
- Converted
- Archived

Implementation rules:

- New requests default to Draft.
- Submission requires `submitted_at`.
- Accepted, Deferred, and Rejected decisions preserve `decision_at`, `decision_by_profile_id`, and `decision_notes`.
- Converted remains a valid future-facing status, but this slice must not create or require a Project.
- Archived requests preserve all request answers and ideas.
- Status values should be centralized in application code when implementation begins.

Allowed transitions:

| From | To | Authority |
|---|---|---|
| Draft | Submitted, Archived | Requester; Organization Admin |
| Submitted | Needs Clarification, In Triage, Deferred, Rejected, Archived | Communications Manager; Organization Admin |
| Needs Clarification | Submitted | Requester; Organization Admin |
| Needs Clarification | In Triage, Deferred, Rejected, Archived | Communications Manager; Organization Admin |
| In Triage | Needs Clarification, Accepted, Deferred, Rejected, Archived | Communications Manager; Organization Admin |
| Accepted | Converted, Deferred, Archived | Communications Manager; Organization Admin |
| Deferred | In Triage, Rejected, Archived | Communications Manager; Organization Admin |
| Rejected | Archived | Communications Manager; Organization Admin |
| Converted | Archived | Communications Manager; Organization Admin |
| Archived | None | Duplicate or create a new request instead of reopening in this slice. |

## Table Plan

### requests

Required direction:

| Field | Direction |
|---|---|
| id | Primary key. |
| organization_id | Required FK to organizations; restrict delete. |
| department_id | Nullable FK to departments; set null on delete. |
| requester_profile_id | Required FK to profiles; restrict delete. |
| assigned_manager_profile_id | Nullable FK to profiles; set null on delete. |
| title | Required. |
| status | Required; default Draft. |
| ministry_need | Required before submission. |
| why_it_matters | Nullable. |
| audience | Nullable. |
| desired_action | Nullable. |
| desired_tone | Nullable. |
| key_dates_json | Nullable JSON. |
| known_constraints | Nullable. |
| missing_information_json | Nullable JSON. |
| triage_summary | Nullable. |
| submitted_at | Nullable. |
| decision_at | Nullable. |
| decision_by_profile_id | Nullable FK to profiles; set null on delete. |
| decision_notes | Nullable. |
| archived_at | Nullable. |
| created_at / updated_at | Standard timestamps. |

Do not add `converted_project_id` until Projects exist. The future Project migration should add the conversion relationship in a reviewed batch.

Suggested indexes:

- `organization_id`
- `department_id`
- `requester_profile_id`
- `assigned_manager_profile_id`
- `status`
- `submitted_at`
- `decision_at`

### request_answers

Required direction:

| Field | Direction |
|---|---|
| id | Primary key. |
| organization_id | Required FK to organizations; restrict delete. |
| request_id | Required FK to requests; cascade delete only if the parent request is hard-deleted. |
| question_key | Required stable key. |
| question_label | Required historical display label. |
| answer_type | Required. |
| answer_value | Nullable text. |
| answer_json | Nullable JSON. |
| sort_order | Nullable integer. |
| created_at / updated_at | Standard timestamps. |

Use a unique constraint on `request_id` and `question_key` for this slice. Repeating question groups require a later reviewed model.

### request_ideas

Required direction:

| Field | Direction |
|---|---|
| id | Primary key. |
| organization_id | Required FK to organizations; restrict delete. |
| request_id | Required FK to requests; cascade delete only if the parent request is hard-deleted. |
| suggested_by_profile_id | Nullable FK to profiles; set null on delete. |
| title | Required. |
| idea_type | Required. |
| source | Required: Requester, System, Communications Manager. |
| triage_decision | Required; default Suggested. |
| decision_notes | Nullable. |
| created_at / updated_at | Standard timestamps. |

Do not add `converted_deliverable_id` until Deliverables exist.

## Organization Scope Integrity

Foreign keys alone do not prove that related profiles and departments belong to the same organization as the request.

Implementation must route request, answer, and idea writes through a small domain write service or validator that rejects:

- a requester profile from another organization
- an assigned manager profile from another organization
- a department from another organization
- an answer or idea whose `organization_id` differs from its request

Do not introduce a general tenancy package, controller layer, or UI in this slice.

## Scenario Extension

The opt-in Grace Community Church request scenario includes:

- Requester: Rachel Kim
- Department: Kids Ministry
- Assigned manager: Jordan Lee
- Working title: VBS Promotion Support
- Initial state: Submitted
- Need: help families understand VBS and register
- Request ideas: social posts, service slide, outside banner

The scenario must not create a Campaign, Project, Deliverable, Task, conversation, attachment, or review.

## Required Tests

Focused tests should prove:

1. The request scenario seeder is idempotent.
2. A Department Leader role assignment can submit a request while the profile remains `person_type = Staff`.
3. Submitted request details, flexible answers, and requester ideas are preserved.
4. Request answers preserve historical question labels.
5. Request ideas remain suggestions and do not create Deliverables.
6. Cross-organization requester, manager, department, answer, and idea relationships are rejected.
7. Deleting an assigned manager or department sets the request reference to null.
8. Deleting a requester with an existing request is restricted.
9. Hard-deleting a request cascades only its answers and ideas.
10. No Project, Campaign, Deliverable, Task, conversation, asset, or review table is created.

## Resolved Review Gates

- Required submission fields: title, requester profile, and ministry need.
- Allowed transitions and authority: defined in this plan.
- Answer uniqueness: `request_id + question_key` for this slice.
- Organization-scope enforcement: small domain write service or validator, covered by focused tests.
- Scenario state: Submitted.

## Acceptance Criteria

This plan was approved for implementation because:

- the table boundary is explicit
- foreign-key delete behavior is explicit
- organization-scope integrity rules are explicit
- lifecycle transition rules are explicit
- no Project or Campaign implementation is required
- focused tests are defined

Last Updated: 2026-06-10
