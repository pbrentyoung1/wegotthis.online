# Roles and Permissions Model

## Purpose

Define the distinction between person/contact type, roles, permissions, and scoped work assignments in ForWorship Creative.

This document prevents the product from mixing identity, authority, skill, and assignment into one overloaded concept.

## Core Principle

Roles have permissions.

Roles are not the same thing as permissions.

Person/contact type describes a person’s relationship to the organization.

Roles describe what a person is allowed to do within a system scope.

Permissions are the specific capabilities granted by a role.

Assignments describe what work a person is responsible for.

Skills describe what work a person is capable of doing.

## Roles as Focus and Routing

The primary product purpose of roles is simplification, routing, and reducing noise.

Roles are not mainly intended to make the product feel restrictive. Security matters, but it is the guardrail underneath the experience, not the personality of the workflow.

Roles should help each person see what is necessary for them and avoid distraction from unrelated projects, deliverables, messages, assets, approvals, and tasks.

A helpful mental model:

> Roles are drawers and cupboards that organize work, not security checkpoints that make people feel blocked.

Good role behavior:

- Shows users the work that matters to them.
- Routes requests, reviews, messages, and approvals to the right people.
- Reduces dashboard clutter.
- Helps department leaders see their department’s work.
- Helps contributors see assigned work.
- Helps reviewers see review requests.
- Helps Communications Managers see the whole production system.
- Keeps sensitive/internal information appropriately scoped.

Bad role behavior:

- Makes users feel policed.
- Forces people through confusing permission walls.
- Exposes unrelated clutter.
- Hides needed context from people doing the work.
- Requires normal users to understand permission mechanics.

## Layered Model

The product should distinguish these layers:

| Layer | Question Answered | Examples |
|---|---|---|
| Person / Contact Type | What is this person’s relationship to the organization? | Staff, Volunteer, Lay Minister, Contractor, Vendor Contact. |
| System Role | What default work areas and actions fit this person across the organization/workspace? | Organization Admin, Communications Manager. |
| Scoped Role | What is this person responsible for on this specific Campaign, Project, Deliverable, or Task? | Project Owner, Deliverable Owner, Reviewer, Contributor. |
| Permission | What specific action is allowed? | Create Project, Approve Deliverable, Manage Skills. |
| Skill | What work can this person do? | Video Editing, Audio Mixing, Graphic Design. |
| Assignment | What work is this person responsible for? | Edit podcast audio, design social post, review landing page. |

Do not collapse these concepts.

## Person / Contact Type

Person/contact type is relationship context, not authorization by itself.

Examples:

- Staff.
- Volunteer.
- Lay Minister.
- Contractor.
- Vendor Contact.
- Department Leader.
- External Reviewer.
- General Contact.

A Contractor is not automatically a Contributor.

A Volunteer is not automatically limited to one role.

A Staff person is not automatically allowed to approve everything.

A person’s type may influence default access expectations, but permissions should come from roles and scoped assignments.

## Roles Have Permissions

A role is a named bundle of permissions.

Example:

```text
Role: Communications Manager
Permissions:
- Review intake
- Create Project
- Schedule Project
- Manage Deliverables
- Manage Review Assignments
- Waive Approvals
- Manage User Skills
- View Capacity Guidance
```

The system should check permissions, not merely role names, when deciding whether an action is allowed.

The user interface should usually present roles and assignments in plain language rather than exposing raw permission mechanics.

## Permission Examples

Potential permissions include:

- Submit Request.
- Review Intake.
- Create Campaign.
- Edit Campaign.
- Create Project.
- Edit Project.
- Schedule Project.
- Archive Project.
- Create Deliverable.
- Edit Deliverable.
- Assign Deliverable Owner.
- Move Deliverable Lifecycle Stage.
- Create Task.
- Edit Task.
- Complete Task.
- Assign Task.
- Review Deliverable.
- Approve Deliverable.
- Request Changes.
- Waive Approval.
- Manage Review Assignments.
- View Internal Comments.
- Create Internal Comments.
- Send Direct Messages.
- Attach Drive Files.
- Manage Asset Metadata.
- Manage Brand Assets.
- Manage User Skills.
- Manage Departments.
- Manage Users.
- Manage Vendors/Contacts.
- View Capacity Guidance.
- Manage Capacity Notes.
- View Audit Log.
- Manage Organization Settings.

## System Roles

System roles operate at the organization/workspace level.

Recommended MVP system roles:

| System Role | Purpose |
|---|---|
| Organization Admin | Manages organization settings, users, departments, roles, permissions, and high-level configuration. |
| Communications Manager | Owns Communications workflow, intake, triage, scheduling, capacity, approvals, deliverables, assets, and skill assignment. |
| Department Leader | Owns ministry/department requests, review participation, and department-facing visibility. |
| Contributor | Can participate in assigned work across scoped Projects/Deliverables/Tasks. |
| Viewer | Read-only access to permitted areas. |

System roles should be kept minimal in MVP.

Avoid creating separate system roles for every possible relationship type.

## Scoped Roles

Scoped roles apply to a specific object.

The same person may have different scoped roles on different objects.

Examples:

```text
Person: Jordan
System Role: Contributor
Project Role on Promote VBS: Project Owner
Deliverable Role on VBS Promo Video: Reviewer
```

```text
Person: Maria
Person Type: Lay Minister
System Role: Department Leader
Project Role on Recruit Volunteers: Stakeholder
Deliverable Role on Volunteer Email: Reviewer
```

```text
Person: BrightLine Audio
Person Type: Contractor
System Role: Contributor or limited Vendor access
Deliverable Role on Podcast Episode Audio: Deliverable Contributor
```

## Campaign Roles

Potential Campaign-scoped roles:

| Campaign Role | Purpose |
|---|---|
| Campaign Owner | Accountable for campaign goals, outcomes, and alignment. |
| Campaign Stakeholder | Has visibility and may participate in decisions. |
| Campaign Contributor | Supports campaign planning or execution. |
| Campaign Viewer | Read-only scoped visibility. |

MVP may keep Campaign roles light and rely on Project roles unless Campaign-level permissions are required.

## Project Roles

Potential Project-scoped roles:

| Project Role | Purpose |
|---|---|
| Project Owner | Accountable for moving the Project forward. |
| Project Manager / Coordinator | Helps coordinate timeline, people, blockers, and communication. |
| Project Contributor | Participates in assigned deliverables or coordination work. |
| Project Stakeholder | Needs visibility, input, or signoff. |
| Project Reviewer | Reviews assigned deliverables within the Project. |
| Project Viewer | Read-only scoped visibility. |

The Project Owner is accountable for the overall body of work, but does not automatically own every deliverable.

Project Stakeholders participate in the Project's stakeholder-visible conversation. Their avatar and name should appear with the conversation participants. They do not receive access to internal Project, Deliverable, or Task execution conversations unless separately assigned an internal work role.

## Deliverable Roles

Potential Deliverable-scoped roles:

| Deliverable Role | Purpose |
|---|---|
| Deliverable Owner | Accountable for producing or coordinating the deliverable. |
| Deliverable Contributor | Completes work on the deliverable. |
| Reviewer | Reviews assigned stage/type/version. |
| Approver | Has authority to approve assigned review. |
| Stakeholder | Has input or visibility. |
| Viewer | Read-only scoped visibility. |

Approvals should be granted through Review Assignments and permissions, not assumed from title alone.

## Task Roles

Tasks belong to Deliverables.

Potential Task-scoped roles:

| Task Role | Purpose |
|---|---|
| Task Assignee | Responsible for completing the task. |
| Task Reviewer | Reviews task output if needed. |
| Task Watcher | Receives updates but is not responsible for completion. |

MVP can start with Task Assignee only and add watchers/reviewers later if needed.

## Roles vs Assignment

A person may have permission to do work but not be assigned to a specific task.

A person may be assigned to work only if their scoped role and permissions allow access.

Example:

```text
Role: Contributor
Permission: Complete assigned tasks
Assignment: Edit Podcast Audio
```

Assignment alone should not override permissions.

## Roles vs Skills

Skills are capability, not authority.

Example:

A user may have the skill `Color Correction`, but that does not mean they can approve a video, manage a project, or view all video files.

Skills help with assignment fit.

Roles and permissions control access and actions.

## Roles vs Person Type

Person type is relationship context.

Example:

```text
Person Type: Contractor
System Role: Contributor
Scoped Role: Deliverable Contributor
Permissions: View assigned deliverable, comment, upload file, complete assigned tasks
```

```text
Person Type: Staff
System Role: Communications Manager
Scoped Role: Project Owner
Permissions: Schedule project, manage deliverables, waive approval, manage skills
```

```text
Person Type: Volunteer
System Role: Contributor
Scoped Role: Task Assignee
Permissions: View assigned deliverable, complete assigned task, comment where allowed
```

## External Reviewers

External Reviewers may not be full system users.

They may receive scoped, time-bound, revocable access through magic links.

External review access should be treated as a scoped access grant, not a broad system role.

External Reviewers may:

- View a specific deliverable/version.
- Comment on a specific review.
- Approve or request changes if granted.
- Upload/attach a file only if explicitly allowed.

They should not:

- Browse unrelated Projects.
- View internal comments.
- See unrelated assets.
- Manage users, roles, skills, departments, or system settings.

## MVP Permission Strategy

Use role-based access control with scoped assignments.

MVP should include:

- System roles.
- Object-scoped roles for Projects and Deliverables.
- Task assignees.
- Review assignments.
- Permissions checked by capability.
- Person/contact type stored separately from roles.
- Skills stored separately from permissions.
- Role-based dashboards and filtered work views.

Avoid in MVP:

- Overly complex custom role builder.
- Dozens of system roles.
- Permission logic based only on person/contact type.
- Vendor/contractor as a catch-all role.
- Skill-based authorization.
- Permission checkboxes in normal user workflows.
- Security language that makes the product feel like a checkpoint system.

## Database Planning Notes

Potential tables:

```text
roles
permissions
role_permissions
model_role_assignments
users/profiles/contact records
profile_skills
project_members
campaign_members, future/light
deliverable_members
task_assignments
review_assignments
external_access_grants / magic_links
```

`model_role_assignments` may be polymorphic or separate join tables by object type depending on implementation preference.

## Open Questions

- Which Project roles are required for MVP?
- Which Deliverable roles are required for MVP?
- Should Campaign roles be implemented in MVP or deferred?
- Should Task Watchers exist in MVP or later?
- Should vendors/contractors receive login accounts or mostly scoped magic links in MVP?
- Which roles can see internal comments?
- Which roles can waive approvals?
- Which roles can manage user skills?
- Which dashboard views should each role see by default?

## Related Docs

- `docs/product/USER_MODEL_AND_PROFILES.md`
- `docs/product/SKILLS_AND_RESOURCES.md`
- `docs/product/APPROVALS_AND_REVIEW_WORKFLOW.md`
- `docs/product/CONVERSATIONS_MESSAGES_ACTIVITY.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/DELIVERABLES.md`
- `docs/product/TASKS.md`
- `docs/technical/AUTH_AND_PERMISSIONS.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-30
