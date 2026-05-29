# Project Lifecycle

## Purpose

Document the canonical lifecycle statuses for communications projects.

## Current Decisions

- Working direction: projects should move through explicit statuses from request intake through archive.
- Working direction: projects should not move directly from Published to Archived. Closeout should happen first.
- Strategic Context is distinct from Operational Work.
- Operational Work is Projects -> Deliverables -> Tasks.
- Projects are the primary operational container.
- Campaigns and initiatives are optional strategic context, not required operational parents.
- Programs / Content Streams are recurring operational rhythms, distinct from campaigns.
- Deliverables are the specific outputs being produced and may have their own status and approvals.
- Deliverables must belong to projects.
- Tasks are execution units that may attach to projects or deliverables.

## Hierarchy Context

- Request lifecycle is separate from project lifecycle.
- A request may be accepted and converted into a project.
- A project may support a campaign, initiative, program/content stream, sermon series, season, ministry area, topic, or tag, but it does not have to.
- A project should preserve one primary operational home in MVP.
- A project may contain many deliverables.
- Deliverables may move through their own planned, production, review, approval, scheduling, publication, and archive states.
- Project statuses should not force every deliverable through the same status at the same time.
- Most approvals attach to deliverables, not directly to the project.
- Waiting for Approval is not a canonical project status; it belongs to deliverables or other reviewable elements.
- Project status changes, review events, requested changes, closeout reminders, and system-generated events should appear in the project communication/activity feed where useful.

## Intake

- Description: A request has been received or converted into project consideration.
- Entry criteria: A requester submits work and Communications begins evaluating it as project work.
- Exit criteria: Communications has enough information to evaluate next steps.
- Responsible roles: Communications Lead, Organization Admin, Project Owner where delegated.
- Notes/open questions: Which fields are required before submission?

## Discovery

- Description: Communications clarifies scope, audience, timeline, assets, stakeholders, budget, and approvals.
- Entry criteria: Intake request needs review, clarification, or triage.
- Exit criteria: Scope is clear enough to approve, reject, defer, or convert into active work.
- Responsible roles: Communications Lead, Organization Admin, Project Owner, requesting ministry contact.
- Notes/open questions: Should Discovery be required for every project?

## Approved

- Description: The project is accepted and ready to schedule or begin.
- Entry criteria: Required information, stakeholder ownership, and basic timeline are confirmed.
- Exit criteria: Planning begins, work begins, or project is scheduled.
- Responsible roles: Communications Lead, Organization Admin.
- Notes/open questions: Should budget approval be required before this status?

## Planned

- Description: The project is accepted, scoped, and planned, but active production has not started.
- Entry criteria: Project is approved and the team has a workable plan, timeline, ownership, and expected deliverables.
- Exit criteria: Work begins.
- Responsible roles: Communications Lead, Project Owner.
- Notes/open questions: Should Planned be skipped for small same-day work?

## Active

- Description: Production or coordination work is underway.
- Entry criteria: Project is approved or planned and assigned.
- Exit criteria: Work is ready for review or waiting on a significant revision loop.
- Responsible roles: Project Owner, Contributor, Communications Lead, assigned internal team members.
- Notes/open questions: How should blocked work be represented?

## In Review

- Description: Deliverables or project outputs are being reviewed.
- Entry criteria: One or more deliverables are submitted for review.
- Exit criteria: Work is approved, sent to Revision, or escalated into element-level Waiting for Approval.
- Responsible roles: Reviewer, Communications Lead, Project Owner, Organization Admin, External Reviewer where explicitly shared.
- Notes/open questions: Which reviews are brand reviews versus content reviews?

## Revision

- Description: Work needs changes before approval or scheduling.
- Entry criteria: Review produces requested changes.
- Exit criteria: Revised work is resubmitted for review.
- Responsible roles: Contributor, Project Owner, Communications Lead, assigned reviewer feedback owners.
- Notes/open questions: How many revision rounds should be tracked?

## Scheduled

- Description: Approved work is scheduled for publication, production, print, delivery, or execution.
- Entry criteria: Required approvals are complete and publication or delivery timing is set.
- Exit criteria: Work is published, delivered, printed, posted, displayed, or otherwise released.
- Responsible roles: Project Owner, Communications Lead, Contributor, External Reviewer where vendor-scoped fulfillment support is allowed.
- Notes/open questions: Does every deliverable need its own scheduled date?

## Published

- Description: Work has been published, delivered, printed, installed, posted, or otherwise released.
- Entry criteria: Scheduled work is completed.
- Exit criteria: Final closeout begins.
- Responsible roles: Project Owner, Communications Lead, Contributor.
- Notes/open questions: Should a project with multiple deliverables stay Published until all are released?

## Closeout

- Description: Final assets, source files, exports, approvals, budget details, timeline, notes, and reusable context are verified and archived.
- Entry criteria: Work has been published or delivered.
- Exit criteria: Required closeout checklist items are complete.
- Responsible roles: Project Owner, Communications Lead, Organization Admin, assigned team members.
- Notes/open questions: Who is allowed to close a project?

## Archived

- Description: Project is closed and preserved for search, reporting, reuse, and institutional memory.
- Entry criteria: Closeout is complete.
- Exit criteria: Reopened only if future rules allow it.
- Responsible roles: Communications Lead, Organization Admin.
- Notes/open questions: Should archived projects be editable?

## Open Questions

- Are these statuses global or configurable per church?
- Are statuses shared by all project types?
- Which deliverable statuses are required for MVP?
- How should project status summarize multiple deliverables with different statuses?
- Which project lifecycle events should create notifications versus only feed entries?

## Notes

- Lifecycle design should support dashboards, stakeholder visibility, reporting, and closeout.
- Draft belongs to the request lifecycle, not the project lifecycle.
- Completed is not a canonical project status because it hides the required closeout step.
- Waiting for Approval belongs to deliverables or reviewable elements, not projects.
- Deliverables are documented in `/docs/product/DELIVERABLES.md`.
- Requests are documented in `/docs/product/REQUEST_LIFECYCLE.md`.
- Project communication history is documented in `/docs/product/COMMUNICATIONS_SYSTEM.md`.
- Goal alignment details are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.

Last Updated: 2026-05-29
