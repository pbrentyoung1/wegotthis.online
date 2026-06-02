# MVP Schema Map

## Purpose

This document defines the canonical Lean MVP schema map for wegotthis.online before migrations are written.

It is not a migration file.
It is not a final database specification.
It is the shared architecture map that should guide the first implementation pass.

The goal is to help Codex, Claude, ChatGPT, and Brent work from the same understanding before tables, relationships, models, and migrations are created.

## Product Summary

wegotthis.online is a communications operations platform for churches.

It helps ministry leaders request work clearly, helps communications teams plan and produce that work calmly, and keeps the conversation, files, approvals, status, and project memory in one place.

The MVP must prove one complete loop:

```text
Department Leader submits a request
  -> Communications Manager clarifies and approves intake
    -> Project is created
      -> Deliverables are defined
        -> Tasks are assigned
          -> Work is discussed in context
            -> Files/Drive links are attached
              -> Deliverable goes through review
                -> Changes are requested or approved
                  -> Deliverable is published/delivered
                    -> Project is closed and archived
```

If the schema supports this loop cleanly, the MVP has a real backbone.

## Scope

This schema map covers the Lean MVP data model.

It includes:

- organization and user foundation
- departments and lightweight people/profile context
- roles, permissions, and scoped work assignments
- requests and request ideas
- projects
- deliverables
- tasks
- conversations, messages, activity, and audit records
- reviews, approvals, and change requests
- assets, file links, and Google Drive references
- tags and flexible classification
- lightweight calendar/date visibility
- lightweight dashboard/widget readiness

It excludes implementation details such as Laravel migrations, model class names, controller design, seed data, UI components, queue jobs, policies, and route definitions.

## Naming Decision

Use `organizations` as the MVP tenant boundary in user-facing and product-facing language.

Use `organization_id` on organization-owned records.

Older planning docs may refer to `tenant_id`. For MVP schema design, `organization_id` is the concrete field name unless a later technical decision explicitly restores `tenant_id`.

## Schema Principles

- Build the request-to-approved-deliverable loop first.
- Keep the operational spine clear: Project -> Deliverable -> Task.
- Tasks belong to Deliverables in MVP.
- Project-level coordination work should be represented by coordination/admin Deliverables.
- Administrative recurring work should live inside Administrative Projects with administrative Deliverables.
- Preserve decisions and history instead of overwriting them.
- Model approvals as review assignments and decisions, not one boolean field.
- Model files as references and metadata, not as a replacement for Google Drive.
- Model conversations close to the work they are about.
- Use tags for flexible classification in MVP.
- Treat `profiles` as the MVP membership record for organization access. A profile with a non-null `user_id` represents a logged-in member. A profile with a null `user_id` represents a contact or external party. A formal `memberships` table may be introduced post-MVP if access lifecycle tracking requires separation.
- Do not create a full Content Stream entity in MVP.
- Do not create a complex dependency engine in MVP.
- Do not create a full Google Drive clone or whole-Drive index.
- Keep future expansion possible without building future modules now.

## Lean MVP Entity Groups

| Group | Purpose |
|---|---|
| Organization Foundation | Workspaces, users, departments, roles, permissions. |
| Intake | Requests, request answers, suggested channels, clarification. |
| Operational Work | Projects, deliverables, tasks, statuses, blockers. |
| Communication Memory | Conversations, messages, activity, audit records, notifications. |
| Review and Approval | Review assignments, decisions, change requests, versions. |
| Files and Assets | Linked files, Drive references, asset metadata, usage context. |
| Classification | Tags and taggables for flexible MVP context. |
| Calendar and Dashboard | Date visibility, dashboard widgets, saved work summaries. |

## Ownership, Admin Delegation, Stakeholders, Visibility, and Capacity

Ownership, stakeholder visibility, admin delegation, participation, review responsibility, and task assignment are separate concepts.

### One Owner Per Work Object

Each Campaign, Project, and Deliverable has exactly one owner.

Ownership should not be shared.

Recommended ownership fields:

- `campaigns.owner_profile_id`
- `projects.owner_profile_id`
- `deliverables.owner_profile_id`

Tasks are execution units, so Lean MVP should use:

- `tasks.assigned_to_profile_id`

Use `profile_id` rather than `user_id` because profiles are the organization-context person record.

### Ownership Authority

Ownership grants operational authority inside the owned work object.

Default ownership behavior:

- Campaign Owner can create Projects within that Campaign.
- Project Owner can create Deliverables within that Project.
- Deliverable Owner can create and assign Tasks within that Deliverable.
- Task Assignee is responsible for completing the assigned work.

A person may own a parent object and also own a child object, but only if explicitly assigned.

### Ownership Does Not Cascade

Ownership does not automatically cascade down the hierarchy.

A Campaign Owner does not automatically become the owner of child Projects.

A Project Owner does not automatically become the owner of child Deliverables.

A Deliverable Owner does not automatically become the assignee of child Tasks.

This preserves clear accountability at every level.

### Visibility May Cascade

Visibility may cascade downward through the hierarchy.

For example:

- A Campaign Owner may have visibility into child Projects and stakeholder-visible child Deliverables.
- A Project Owner may have visibility into child Deliverables and relevant Tasks.
- A Deliverable Owner may have visibility into Tasks under that Deliverable.

Cascaded visibility does not create ownership.

Cascaded visibility may be derived from hierarchy and participant role. It does not require creating participant records for every child object.

### Stakeholders

Stakeholders are analogous to clients.

Stakeholders are participants with visibility, comment, review, and sign-off responsibilities.

Stakeholders may:

- view relevant Campaign, Project, or Deliverable details
- view stakeholder-facing assets
- view stakeholder-facing conversations
- receive review requests
- approve or request changes when assigned as reviewers or approvers
- see sign-off status
- see shared delivery dates or milestones when appropriate

Stakeholders do not automatically:

- own work
- create Projects
- create Deliverables
- create or assign Tasks
- see internal production conversations
- see rough internal assets
- see source files unless shared
- see capacity notes
- see assignment debates
- see internal vendor coordination unless shared
- perform destructive actions

Stakeholders can be owners of child work only if explicitly assigned as the owner of that child work.

### Internal vs Stakeholder-Facing Visibility

The schema should distinguish between internal production work and stakeholder/client-facing work.

Recommended visibility values:

- Internal
- Stakeholder Visible
- Public

Visibility should be considered for:

- conversations
- messages
- assets
- asset_links
- activity_events

Owners and assignees generally need access to internal work needed to produce the deliverable.

Stakeholders generally need access only to stakeholder-visible or public-facing assets, review conversations, sign-off requests, and shared deliverable details.

### Admin Delegation

Admin is a delegated participant role.

An Admin is a person who can update or manage work on behalf of the owner without becoming the owner.

There is still exactly one owner.

Admin does not mean co-owner.

Admin authority is delegated authority.

Different owners or supervisors may delegate different activities to their admins.

Example:

If the Communications Director owns the VBS Campaign, the Communications Director's Admin may be added as an Admin participant.

An Admin may be delegated to:

- update details
- update dates
- update status
- attach files or links
- add notes
- manage logistics
- coordinate review flow
- create child work if delegated
- assign tasks if delegated
- manage participants if delegated

Admin does not automatically:

- become the owner
- share ownership
- change ownership
- approve final work
- override stakeholder sign-off
- approve on behalf of a stakeholder
- delete major work objects
- perform destructive actions

Admin visibility should include the operational views needed to manage work on behalf of the owner, scoped to the Campaign, Project, Deliverable, or Task where the Admin is assigned.

Admin visibility may include:

- details
- calendar visibility
- Kanban board visibility
- relevant tasks and due dates
- relevant conversations
- review status
- blockers
- linked assets/files

Admin visibility does not automatically grant approval, sign-off, ownership transfer, or destructive permissions.

Future delegated permissions may allow an owner or supervisor to define exactly what an Admin can do on their behalf.

### Future work_participants Table

Future work should support a flexible `work_participants` table.

Suggested future table:

`work_participants`

- `id`
- `organization_id`
- `work_type`
- `work_id`
- `profile_id`
- `participant_role`
- `responsibility_note`
- `delegated_by_profile_id` nullable
- `delegated_permissions_json` nullable
- `assigned_by_profile_id`
- `assigned_at`
- `status`
- `created_at`
- `updated_at`

Possible `work_type` values:

- Campaign
- Project
- Deliverable
- Task

Possible `participant_role` values:

- Stakeholder
- Admin
- Contributor
- Reviewer
- Approver
- Vendor
- Observer
- Coordinator

Owner should not be a `participant_role` in the default model because ownership is represented by the direct `owner_profile_id` field.

If owner is ever mirrored into `work_participants` for query convenience, `owner_profile_id` remains authoritative.

Participant records should not replace ownership fields.

Ownership fields provide clear accountability.

Participant records provide visibility, involvement, review/sign-off, delegated admin support, and future capacity context.

### Future delegated_permissions_json Example

`delegated_permissions_json` is a future hook, not a Lean MVP requirement.

In early MVP, Admin may be treated as a simple participant role with conservative default permissions.

Later, supervisors or owners may define exactly which activities their admins can perform on their behalf.

Example:

```json
{
  "can_view_details": true,
  "can_view_calendar": true,
  "can_view_kanban": true,
  "can_view_tasks": true,
  "can_view_conversations": true,
  "can_update_details": true,
  "can_update_dates": true,
  "can_update_status": true,
  "can_attach_files": true,
  "can_manage_participants": false,
  "can_create_child_work": true,
  "can_assign_tasks": false,
  "can_submit_for_review": true,
  "can_approve": false,
  "can_change_owner": false,
  "can_delete": false
}
```

### Roles vs Participants

System and scoped roles answer:

"What is this person generally allowed to do?"

Participant records answer:

"How is this person involved in this specific Campaign, Project, Deliverable, or Task?"

Do not overload roles/permissions to model every stakeholder, admin, contributor, or reviewer relationship.

### Capacity

The schema should allow future capacity views based on:

- Campaigns owned by a profile
- Projects owned by a profile
- Deliverables owned by a profile
- Tasks assigned to a profile
- Review assignments
- Participant roles
- Admin delegation
- Profile skills
- Deliverable type skill/resource requirements
- Due dates
- Blocker states

Lean MVP should not build a full capacity engine, but it should avoid blocking this future path.

Future skills should attach to profiles, not users:

- `skills`
- `profile_skills`

## Ownership and Visibility Example: VBS

Campaign: VBS

- Owner: Communications Director
- Admin: Communications Director's Admin
- Stakeholders:
  - Kids Pastor
  - VBS Director

The Communications Director owns the VBS Campaign.

The Communications Director has visibility into child Projects and stakeholder-visible child Deliverables, but does not automatically own those Projects or Deliverables.

The Communications Director's Admin may help manage the Campaign on behalf of the Communications Director within delegated boundaries.

Projects inside the VBS Campaign:

- Production Project, owner: Production Lead
- Promotion Project, owner: Communications Manager
- Recruitment Project, owner: Volunteer Coordinator
- Administration Project, owner: Admin Coordinator

The Communications Director may be a stakeholder or visibility participant in these Projects but is not the Project Owner unless explicitly assigned.

Promotion Project Deliverables:

- Social Post 1
- Social Post 2
- Bulletin Insert
- Web Page Assets
- Service Slide
- Outside Banner
- Lobby Signage

Each Deliverable has exactly one owner.

Tasks inside each Deliverable are assigned to the person or people doing the work. Lean MVP may begin with one assigned profile per task.

Stakeholders see client-facing or review-facing work.

Owners and assignees see the internal work needed to produce the deliverable.

## Core Relationship Map

```text
Organization
  -> Users
  -> Departments
  -> Roles / Permissions
  -> Requests
    -> Request Ideas
    -> Conversations
    -> Project, when converted
  -> Projects
    -> Deliverables
      -> Tasks
      -> Review Assignments
      -> Change Requests
      -> Assets / Asset Links
      -> Conversations
    -> Conversations
    -> Activity Events
    -> Assets / Asset Links
    -> Tags
  -> Asset Library
  -> Calendar Sources
  -> Dashboard Widgets
```

## Foundation Tables

### organizations

Represents the church or workspace.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| name | Organization name. |
| slug | Stable URL-safe identifier. |
| status | Active, paused, archived. |
| timezone | Default organization timezone. Suggested default: UTC. Each organization may override during setup. |
| settings_json | Lightweight configuration for MVP. |
| created_at / updated_at | Standard timestamps. |

### users

Represents login identity.

Use Laravel's existing user foundation where practical.

Suggested MVP additions or related fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| name | Display name. |
| email | Login email. |
| email_verified_at | Existing auth field. |
| password | Existing auth field. |
| remember_token | Existing auth field. |
| created_at / updated_at | Standard timestamps. |

### profiles

Represents work/person context for a user or contact.

This prevents login identity from being overloaded with ministry, role, skill, and contact information.
For MVP, this also serves as the organization membership/access record. A later `memberships` table may separate account access lifecycle from work/person context if needed.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| user_id | Nullable for contacts without login. |
| department_id | Nullable. |
| display_name | Person-facing name. |
| title | Staff title, ministry title, or working title. |
| person_type | Staff, Volunteer, Lay Minister, Contractor, Vendor Contact, External Reviewer, General Contact. |
| phone | Nullable. |
| avatar_url | Nullable. |
| bio | Nullable. |
| status | Active, Inactive, Archived. |
| metadata_json | Flexible profile context. |
| created_at / updated_at | Standard timestamps. |

### departments

Represents ministries, teams, or organizational departments.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| name | Department/ministry name. |
| slug | Stable identifier. |
| parent_department_id | Nullable for hierarchy. |
| lead_profile_id | Nullable. |
| status | Active, archived. |
| notes | Nullable. |
| created_at / updated_at | Standard timestamps. |

## Roles, Permissions, and Assignments

### roles

Named role bundles.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Nullable for platform/global defaults, required for organization-specific roles. |
| name | Organization Admin, Communications Manager, Department Leader, Contributor, Viewer. |
| slug | Stable identifier. |
| scope_type | System, campaign, project, deliverable, task. |
| description | Nullable. |
| is_system | Whether this is protected seed/default role. |
| created_at / updated_at | Standard timestamps. |

### permissions

Atomic capability list.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| key | Stable permission key, such as `projects.create`. |
| name | Human-readable label. |
| description | Nullable. |
| created_at / updated_at | Standard timestamps. |

### permission_role

Many-to-many role permission mapping.

Suggested fields:

| Field | Notes |
|---|---|
| role_id | Required. |
| permission_id | Required. |

### profile_role_assignments

Assigns a profile to a role at system or object scope.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| profile_id | Required. |
| role_id | Required. |
| scope_type | Organization, Campaign, Project, Deliverable, Task. |
| scope_id | Nullable for organization-wide role. |
| assigned_by_profile_id | Nullable. |
| assigned_at | Required. |
| ended_at | Nullable. |
| created_at / updated_at | Standard timestamps. |

## Intake Tables

### requests

The ministry need before it becomes operational work.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| department_id | Nullable but recommended. |
| requester_profile_id | Required. |
| assigned_manager_profile_id | Nullable. |
| title | Working request title. |
| status | Draft, Submitted, Needs Clarification, In Triage, Accepted, Deferred, Rejected, Converted, Archived. |
| ministry_need | What needs to happen. |
| why_it_matters | Nullable. |
| audience | Nullable. |
| desired_action | Nullable. |
| desired_tone | Nullable. |
| key_dates_json | Flexible date answers. |
| known_constraints | Nullable. |
| missing_information_json | Lightweight missing information list. |
| triage_summary | Nullable. |
| accepted_at | Nullable. |
| converted_project_id | Nullable. |
| archived_at | Nullable. |
| created_at / updated_at | Standard timestamps. |

### request_answers

Flexible intake answers for future adaptive briefs.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| request_id | Required. |
| question_key | Stable key. |
| question_label | Label shown when answered. |
| answer_type | Text, date, choice, multi_choice, file_link, url, boolean, json. |
| answer_value_text | Nullable. |
| answer_value_json | Nullable. |
| sort_order | Nullable. |
| created_at / updated_at | Standard timestamps. |

### request_ideas

Requester or system-suggested channels/deliverables before they become approved Deliverables.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| request_id | Required. |
| suggested_by_profile_id | Nullable for system suggestions. |
| title | Idea title. |
| idea_type | Video, Social Post, Email, Signage, Website, Print, Other. |
| source | Requester, system, Communications Manager. |
| triage_decision | Suggested, Accepted, Modified, Declined, Later. |
| decision_notes | Nullable. |
| converted_deliverable_id | Nullable. |
| created_at / updated_at | Standard timestamps. |

## Project Tables

### projects

Primary operational container.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| campaign_id | Nullable. FK stub for future Campaign association. |
| department_id | Nullable but recommended. |
| source_request_id | Nullable. |
| owner_profile_id | Required before Scheduled. |
| title | Required. |
| slug | Stable identifier. |
| project_type | Standard, Administrative, Campaign Support, Event, Other. |
| lifecycle_status | Proposed, Planning, Scheduled, Active, Paused, Completed, Closeout, Archived. |
| attention_state | On Track, Needs Attention, At Risk, Blocked, Rush, Ready for Next Step. |
| blocker_type | Nullable. |
| blocker_reason | Nullable. |
| objective | Required before Scheduled. |
| scope_summary | Nullable. |
| in_scope | Nullable. |
| out_of_scope | Nullable. |
| audience | Nullable. |
| desired_action | Nullable. |
| start_date | Required before Scheduled. |
| stop_date | Required before Scheduled. |
| priority | Nullable. |
| capacity_notes | Nullable. |
| budget_notes | Nullable. |
| metadata_json | Flexible MVP extension point. |
| closeout_started_at | Nullable. Set when project enters Closeout lifecycle stage. |
| completed_at | Nullable. |
| archived_at | Nullable. |
| created_at / updated_at | Standard timestamps. |

### project_members

Scoped project participation.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| project_id | Required. |
| profile_id | Required. |
| project_role | Coordinator, Admin, Contributor, Stakeholder, Reviewer, Approver, Vendor, Observer. Ownership is represented by `projects.owner_profile_id`. |
| created_at / updated_at | Standard timestamps. |

## Deliverable Tables

### deliverable_types

MVP can seed a small set while keeping future admin-managed types possible.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Nullable for defaults, required for custom types. |
| name | Social Post, Email, Video, Signage, etc. |
| slug | Stable identifier. |
| description | Nullable. |
| default_tat_days | Nullable. |
| required_fields_json | Future-ready. |
| readiness_template_json | Future-ready. |
| task_template_json | Future-ready. |
| is_active | Boolean. |
| created_at / updated_at | Standard timestamps. |

### deliverables

Specific outputs produced inside a Project.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| project_id | Required. |
| source_request_idea_id | Nullable. FK to request_ideas if converted from an idea. |
| deliverable_type_id | Nullable but recommended. |
| owner_profile_id | Nullable before planning is complete. |
| title | Required. |
| description | Nullable. |
| lifecycle_status | Proposed, Planning, In Production, Ready for Review, In Review, Revision, Approved, Delivery, Published / Running, Ended, Archived. |
| attention_state | On Track, Needs Attention, At Risk, Blocked, Rush, Ready for Next Step. |
| blocker_type | Nullable. |
| blocker_reason | Nullable. |
| purpose | Nullable. |
| audience | Nullable. |
| desired_action | Nullable. |
| key_message | Nullable. |
| due_date | Nullable. |
| publish_at | Nullable. |
| end_at | Nullable. |
| current_version_label | Nullable. |
| current_review_round | Default 0. |
| specs_json | Flexible channel/type-specific specs. |
| readiness_json | Lightweight readiness checklist state. |
| metadata_json | Flexible MVP extension point. |
| archived_at | Nullable. |
| created_at / updated_at | Standard timestamps. |

### deliverable_members

Scoped deliverable participation.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| deliverable_id | Required. |
| profile_id | Required. |
| deliverable_role | Admin, Contributor, Reviewer, Approver, Stakeholder, Vendor, Observer, Coordinator. Ownership is represented by `deliverables.owner_profile_id`. |
| created_at / updated_at | Standard timestamps. |

## Task Tables

### tasks

Execution steps under Deliverables.

Tasks do not float directly under Projects in MVP.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| deliverable_id | Required. |
| assigned_to_profile_id | Nullable. |
| title | Required. |
| description | Nullable. |
| status | Not Started, In Progress, Blocked, Ready for Review, Done, Deferred, Canceled. |
| priority | Nullable. |
| due_date | Nullable. |
| blocker_type | Nullable: Over Capacity, Waiting on Department, Waiting on Approval, Vendor Needed, Missing Information, Missing Asset, Budget, Technical, Scheduling, Scope Decision. |
| blocker_reason | Nullable. |
| blocker_reference_type | Nullable future hook. |
| blocker_reference_id | Nullable future hook. |
| sort_order | Nullable. |
| completed_by_profile_id | Nullable. |
| completed_at | Nullable. |
| metadata_json | Flexible MVP extension point. |
| created_at / updated_at | Standard timestamps. |

## Conversation, Message, Activity, and Audit Tables

### conversations

Container for work-context discussion.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| conversation_type | Direct Message, Campaign Discussion, Project Discussion, Deliverable Discussion, Task Discussion, Review Conversation. |
| subject_type | Nullable polymorphic target. |
| subject_id | Nullable polymorphic target. |
| title | Nullable. |
| visibility | Internal, project team, stakeholder visible, external reviewer visible. |
| status | Open, closed, archived. |
| created_by_profile_id | Required. |
| created_at / updated_at | Standard timestamps. |

Direct Message type is included for schema completeness. DM functionality is deferred from Phase 1 unless explicitly promoted.

### conversation_participants

Profiles participating in a conversation.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| conversation_id | Required. |
| profile_id | Required. |
| participant_role | Sender, recipient, participant, watcher. |
| last_read_at | Nullable. |
| created_at / updated_at | Standard timestamps. |

### messages

Human-written conversation entries.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| conversation_id | Required. |
| author_profile_id | Nullable for external reviewer or system contexts. |
| body | Required. |
| message_type | Comment, direct_message, review_comment, system_note. |
| visibility | Internal, project team, stakeholder visible, external reviewer visible. |
| parent_message_id | Nullable for replies. |
| metadata_json | Nullable. |
| created_at / updated_at | Standard timestamps. |

### activity_events

Visible operational history.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| subject_type | Project, Deliverable, Task, Request, Review Assignment, Asset, etc. |
| subject_id | Required. |
| project_id | Nullable rollup target. |
| deliverable_id | Nullable rollup target. |
| actor_profile_id | Nullable for system events. |
| event_type | Status changed, file attached, task completed, approval granted, etc. |
| summary | Human-readable event summary. |
| metadata_json | Before/after values and context. |
| created_at | Timestamp. |

### audit_logs

Protected accountability record.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| actor_profile_id | Nullable. |
| action | Stable audit action key. |
| subject_type | Audited object type. |
| subject_id | Audited object id. |
| ip_address | Nullable. |
| user_agent | Nullable. |
| metadata_json | Protected context. |
| created_at | Timestamp. |

## Review and Approval Tables

### review_assignments

Review responsibility for a Deliverable or reviewable element.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| deliverable_id | Required for MVP. |
| reviewer_profile_id | Nullable for role/external assignments. |
| reviewer_role_id | Nullable. |
| review_type | Proofreading, Brand/Design, Technical Readiness, Communications Manager, Ministry Review, Content Approval, Budget Approval, Legal/Safety/Policy, Final Approval. |
| review_stage | Internal Quality Review, Stakeholder Review, Final Approval. |
| status | Pending, Approved, Changes Requested, Commented, Waived, Canceled, Superseded. |
| required | Boolean. |
| sequence | Nullable. |
| version_label | Nullable. |
| review_round | Default 1. |
| due_date | Nullable. |
| notes | Nullable. |
| decided_by_profile_id | Nullable. |
| decided_at | Nullable. |
| decision_notes | Nullable. |
| waived_by_profile_id | Nullable. |
| waived_at | Nullable. |
| waiver_reason | Nullable. |
| created_at / updated_at | Standard timestamps. |

Note: `decided_by_profile_id`, `decided_at`, and `decision_notes` represent the most recent decision only. A future `review_decisions` child table (`review_assignment_id`, `round`, `decision`, `notes`, `decided_by_profile_id`, `decided_at`) will be needed to preserve full per-round decision history. This is the planned expansion path.

### change_requests

Actionable requested updates tied to Deliverables and review context.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| deliverable_id | Required. |
| review_assignment_id | Nullable. |
| requested_by_profile_id | Nullable for external reviewer contexts. |
| requested_at | Required. |
| version_label | Nullable. |
| revision_round | Nullable. |
| summary | Required. |
| detail | Nullable. |
| priority | Nullable. |
| visibility | Internal, project team, stakeholder visible, external reviewer visible. |
| status | Open, In Progress, Resolved, Declined, Superseded. |
| resolved_by_profile_id | Nullable. |
| resolved_at | Nullable. |
| resolution_notes | Nullable. |
| created_at / updated_at | Standard timestamps. |

## Files, Links, and Asset Tables

### assets

ForWorship metadata layer for intentionally linked files and reusable assets.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| project_id | Nullable. |
| deliverable_id | Nullable. |
| department_id | Nullable. |
| title | Required. |
| description | Nullable. |
| asset_category | Deliverable Created, Event/Candid, Brand, Linked/External. |
| asset_type | Photo, Video, Audio, Design File, Print File, PDF, Document, Copy/Text, Logo, Template, Brand Guide, External Link, Folder Link, Google Drive File, Google Drive Folder, Other. |
| asset_source | Created for Deliverable, Uploaded from Event, Uploaded by User, Submitted by Vendor, Imported from Drive, Linked from External Source, Brand Library, Stock Library. |
| storage_provider | external_url, google_drive, local, s3, dropbox, onedrive, sharepoint. |
| provider_file_id | Nullable. |
| provider_folder_id | Nullable. |
| provider_url | Nullable. |
| web_view_link | Nullable. |
| thumbnail_url | Nullable. |
| file_name | Nullable. |
| mime_type | Nullable. |
| file_size | Nullable. |
| uploaded_by_profile_id | Nullable. |
| linked_by_profile_id | Nullable. |
| usage_rights | Unknown, Approved, Restricted, Expired. |
| consent_status | Unknown, Not Needed, Requested, Granted, Denied, Expired. |
| visibility | Internal, project team, stakeholder visible, public approved. |
| status | Draft, Active, Approved, Archived. |
| metadata_json | Provider and asset metadata. |
| created_at / updated_at | Standard timestamps. |

### asset_links

Trello-style links/files attached to work objects. These are references, not a binary upload system.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| linkable_type | Request, Project, Deliverable, Task, Message, Review Assignment, Change Request. |
| linkable_id | Required. |
| asset_id | Nullable if promoted into Asset Library. |
| storage_provider | external_url, google_drive, local, etc. |
| provider_file_id | Nullable. |
| provider_folder_id | Nullable. |
| provider_url | Nullable. |
| display_name | Required. |
| mime_type | Nullable. |
| metadata_json | Nullable. |
| linked_by_profile_id | Nullable. |
| created_at / updated_at | Standard timestamps. |

An `asset_link` may later be promoted into the Asset Library by setting `asset_id` when Communications decides the reference should become a reusable managed asset.

## Tags and Classification

### tags

Flexible classification for MVP.

Tags are preferred over first-class Content Stream or deep strategic context entities in Lean MVP.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| name | Required. |
| slug | Required. |
| tag_type | General, Ministry Area, Campaign, Season, Sermon Series, Topic, Program Label, Asset, Skill, Other. |
| color | Nullable. |
| created_at / updated_at | Standard timestamps. |

### taggables

Polymorphic tag relationship.

Suggested fields:

| Field | Notes |
|---|---|
| tag_id | Required. |
| taggable_type | Project, Deliverable, Request, Asset, Asset Link, Profile, Department. |
| taggable_id | Required. |

## Calendar and Dashboard Tables

### calendar_items

Optional normalized date visibility layer.

MVP may query source records directly first, but schema design should preserve a path to FullCalendar-compatible API output.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| source_type | Project, Deliverable, Review Assignment, Task, Capacity Note, Event. |
| source_id | Required. |
| title | Required. |
| starts_at | Required. |
| ends_at | Nullable. |
| all_day | Boolean. |
| calendar_type | Project, Deliverable, Review, Task, Capacity, Event. |
| color | Nullable. |
| metadata_json | FullCalendar-compatible extended props. |
| created_at / updated_at | Standard timestamps. |

### dashboard_widgets

Stable widget definitions.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| key | Stable widget key. |
| name | Display name. |
| description | Nullable. |
| default_roles_json | Roles that see it by default. |
| is_active | Boolean. |
| created_at / updated_at | Standard timestamps. |

### profile_dashboard_widgets

Optional per-profile widget preferences.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| profile_id | Required. |
| dashboard_widget_id | Required. |
| sort_order | Nullable. |
| settings_json | Nullable. |
| hidden | Boolean. |
| created_at / updated_at | Standard timestamps. |

## Notification Tables

### notifications

Action-oriented alerts.

Suggested fields:

| Field | Notes |
|---|---|
| id | Primary key. |
| organization_id | Required. |
| recipient_profile_id | Required. |
| actor_profile_id | Nullable. |
| notification_type | Assignment, Mention, Review Needed, Changes Requested, Blocked, Due Soon, Status Update. |
| channel | Nullable. in_app, email, sms. Defaults to in_app for MVP. |
| subject_type | Nullable. |
| subject_id | Nullable. |
| title | Required. |
| body | Nullable. |
| action_url | Nullable. |
| read_at | Nullable. |
| dismissed_at | Nullable. |
| metadata_json | Nullable. |
| created_at / updated_at | Standard timestamps. |

## Status Values

### Request Statuses

- Draft
- Submitted
- Needs Clarification
- In Triage
- Accepted
- Deferred
- Rejected
- Converted
- Archived

### Project Lifecycle Statuses

- Proposed
- Planning
- Scheduled
- Active
- Paused
- Completed
- Closeout
- Archived

### Deliverable Lifecycle Statuses

- Proposed
- Planning
- In Production
- Ready for Review
- In Review
- Revision
- Approved
- Delivery
- Published / Running
- Ended
- Archived

### Task Statuses

- Not Started
- In Progress
- Blocked
- Ready for Review
- Done
- Deferred
- Canceled

### Review Assignment Statuses

- Pending
- Approved
- Changes Requested
- Commented
- Waived
- Canceled
- Superseded

### Change Request Statuses

- Open
- In Progress
- Resolved
- Declined
- Superseded

### Common Attention / Blocker Types

- Over Capacity
- Waiting on Department
- Waiting on Approval
- Vendor Needed
- Missing Information
- Missing Asset
- Budget
- Technical
- Scheduling
- Scope Decision

## MVP Build Order

Recommended first implementation order:

1. Organization, users, profiles, departments.
2. Roles, permissions, and scoped assignments.
3. Requests, request answers, and request ideas.
4. Projects and project members.
5. Deliverable types, deliverables, and deliverable members.
6. Tasks.
7. Conversations, participants, and messages.
8. Review assignments and change requests.
9. Assets and asset links.
10. Tags and taggables.
11. Activity events and audit logs.
12. Notifications.
13. Calendar/dashboard support. Calendar and dashboard tables should be considered Phase 2 unless Phase 1 feedback requires them. MVP may query source records directly for calendar views.

## Explicitly Deferred From Lean MVP

Do not build these in the first schema pass unless a later decision promotes them:

- Full Content Stream entity.
- Full Initiative module.
- Full Campaign planning module.
- Complex task dependency graph.
- Critical path calculation.
- Automatic rescheduling.
- Full recurrence engine.
- Full Google Drive clone.
- Whole-Drive indexing.
- Drive permission mirroring.
- Full digital asset management automation.
- Advanced dashboard builder.
- Advanced analytics.
- Slack, Discord, Teams, SMS, or Planning Center integrations.
- Magic-link external review unless promoted into the current milestone. When promoted, an `external_review_tokens` table will be needed (`token_hash`, `deliverable_id`, `profile_id`, `access_scope`, `expires_at`, `used_at`, `revoked_at`).

## Implementation Guardrails

- Do not create migrations directly from this document without review.
- Keep status values centralized.
- Prefer explicit foreign keys for core relationships.
- Use polymorphic relationships only where the product genuinely needs cross-object attachment or conversation behavior.
- Keep `metadata_json` fields as extension points, not dumping grounds for required business data.
- Keep all organization-owned records scoped by `organization_id`.
- Preserve created/updated timestamps on all records.
- Preserve decision timestamps and actor fields for review, approval, change request, archive, and audit-sensitive actions.
- Keep comments/messages, activity events, audit logs, and notifications separate.

## Questions Before Migration Work

- Should `organizations` or `tenants` be the final table name?
- Which request fields are required before submission?
- Which deliverable types are seeded for the first pilot?
- Which review types are required in Lean MVP?
- Should `calendar_items` be materialized, or should the calendar API normalize source records directly at first?
- Which tags should be seeded as defaults?
- Which metadata fields must be promoted from `metadata_json` into first-class columns before migration work begins?
- Should magic links be included in the first schema pass or deferred to the review milestone?

## Related Docs

- `docs/product/MVP_PHASES_AND_PRIORITIES.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/DELIVERABLE_LIFECYCLE.md`
- `docs/product/TASKS.md`
- `docs/product/APPROVALS_AND_REVIEW_WORKFLOW.md`
- `docs/product/CONVERSATIONS_MESSAGES_ACTIVITY.md`
- `docs/product/ASSET_LIBRARY.md`
- `docs/product/CALENDARS_AND_SCHEDULING.md`
- `docs/product/ROLES_AND_PERMISSIONS_MODEL.md`
- `docs/product/SEARCH_AND_DISCOVERY.md`
- `docs/technical/GOOGLE_DRIVE_INTEGRATION.md`
- `docs/technical/DATABASE.md`

Last Updated: 2026-05-30
