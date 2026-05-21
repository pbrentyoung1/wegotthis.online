# Project Lifecycle

## Purpose

Document the proposed lifecycle statuses for communications projects.

## Current Decisions

- Working direction: projects should move through explicit statuses from request intake through archive.
- Working direction: projects should not move directly from Published to Archived. Closeout should happen first.
- Working hierarchy: Campaigns -> Projects -> Deliverables -> Tasks.
- Projects are the primary operational container.
- Campaigns are optional parent containers.
- Deliverables are the specific outputs being produced and may have their own status and approvals.
- Tasks are execution units that may attach to projects or deliverables.

## Hierarchy Context

- Request lifecycle is separate from project lifecycle.
- A request may be accepted and converted into a project.
- A project may belong to a campaign, but it does not have to.
- A project may contain many deliverables.
- Deliverables may move through their own production, review, approval, scheduled, and completed states.
- Project statuses should not force every deliverable through the same status at the same time.
- Most approvals attach to deliverables, not directly to the project.
- Project status changes, review events, requested changes, closeout reminders, and system-generated events should appear in the project communication/activity feed where useful.

## Intake

- Description: A request has been submitted or started.
- Entry criteria: A department or user creates a request.
- Exit criteria: Communications has enough information to evaluate next steps.
- Responsible roles: User, Department Leader, Manager.
- Notes/open questions: Which fields are required before submission?

## Discovery

- Description: Communications clarifies scope, audience, timeline, assets, stakeholders, budget, and approvals.
- Entry criteria: Intake request needs review, clarification, or triage.
- Exit criteria: Scope is clear enough to approve, reject, defer, or convert into active work.
- Responsible roles: Manager, Admin, requesting stakeholder.
- Notes/open questions: Should Discovery be required for every project?

## Approved

- Description: The project is accepted and ready to schedule or begin.
- Entry criteria: Required information, stakeholder ownership, and basic timeline are confirmed.
- Exit criteria: Work begins or project is scheduled.
- Responsible roles: Manager, Admin.
- Notes/open questions: Should budget approval be required before this status?

## Active

- Description: Production or coordination work is underway.
- Entry criteria: Project is approved and assigned.
- Exit criteria: Work is ready for review.
- Responsible roles: Manager, User, assigned team members, vendors where applicable.
- Notes/open questions: How should blocked work be represented?

## Review

- Description: Deliverables are ready for stakeholder, manager, brand, or proofing review.
- Entry criteria: A draft or deliverable is submitted for review.
- Exit criteria: Work is approved, rejected, or sent to Revision.
- Responsible roles: Manager, Stakeholder, Department Leader, Admin.
- Notes/open questions: Which reviews are brand reviews versus content reviews?

## Revision

- Description: Work needs changes before approval or scheduling.
- Entry criteria: Review produces requested changes.
- Exit criteria: Revised work is resubmitted for review.
- Responsible roles: Assigned team members, Manager, Stakeholder.
- Notes/open questions: How many revision rounds should be tracked?

## Scheduled

- Description: Work is approved and scheduled for publication, production, or delivery.
- Entry criteria: Required approvals are complete and publication or delivery timing is set.
- Exit criteria: Work is published, delivered, produced, or completed.
- Responsible roles: Manager, User, Vendor.
- Notes/open questions: Does every deliverable need its own scheduled date?

## Published

- Description: Work has been published, delivered, printed, installed, posted, or otherwise released.
- Entry criteria: Scheduled work is completed.
- Exit criteria: Final closeout begins.
- Responsible roles: Manager, User, Vendor.
- Notes/open questions: Should a project with multiple deliverables stay Published until all are released?

## Closeout

- Description: Final assets, source files, exports, approvals, budget details, timeline, notes, and reusable context are verified and archived.
- Entry criteria: Work has been published or delivered.
- Exit criteria: Required closeout checklist items are complete.
- Responsible roles: Manager, Admin, assigned team members.
- Notes/open questions: Who is allowed to close a project?

## Archived

- Description: Project is closed and preserved for search, reporting, reuse, and institutional memory.
- Entry criteria: Closeout is complete.
- Exit criteria: Reopened only if future rules allow it.
- Responsible roles: Manager, Admin.
- Notes/open questions: Should archived projects be editable?

## Open Questions

- Are these statuses global or configurable per church?
- Are statuses shared by all project types?
- Which deliverable statuses are required for MVP?
- How should project status summarize multiple deliverables with different statuses?
- Which project lifecycle events should create notifications versus only feed entries?

## Notes

- Lifecycle design should support dashboards, stakeholder visibility, reporting, and closeout.
- Deliverables are documented in `/docs/product/DELIVERABLES.md`.
- Requests are documented in `/docs/product/REQUEST_LIFECYCLE.md`.
- Project communication history is documented in `/docs/product/COMMUNICATIONS_SYSTEM.md`.

Last Updated: 2026-05-20
