# Dependencies and Readiness

## Purpose

Define how ForWorship Creative should handle dependencies, blockers, readiness checks, and transition gates without becoming a heavy project dependency engine.

This document clarifies the MVP approach: simple readiness dependencies, not full Gantt-style dependency management.

## Core Principle

MVP should support simple readiness dependencies, not a full dependency graph.

The system should help teams answer:

> Is this project, deliverable, or task ready for the next step?

It should not attempt to calculate a full critical path, automatic rescheduling model, or complex predecessor/successor network in MVP.

## Why This Matters

Some work cannot move forward until required inputs, decisions, approvals, or files are complete.

Example:

> A social post cannot be scheduled until the artwork and copy are approved.

The system should surface this plainly:

> Almost ready to schedule. Still waiting on approved artwork and final copy.

The goal is to make blockers visible early without overwhelming users with technical dependency mechanics.

## MVP Dependency Model

In MVP, dependencies should be expressed as readiness blockers or transition requirements.

The system should support:

- Missing information items.
- Required inputs.
- Required files or assets.
- Required approvals.
- Required dates.
- Required owner/assignee decisions.
- Blocked task status with reason.
- Blocked attention state with blocker type.
- Deliverable readiness checklists.
- Plain-language attention states.

The system should avoid:

- Full task-to-task dependency graphs.
- Critical path calculations.
- Gantt chart dependency logic.
- Automatic rescheduling.
- Complex cross-project dependency chains.
- Resource leveling.

## Blocked as Parent Attention State

`Blocked` is the top-level attention state when work cannot move forward.

Specific causes such as Over Capacity, Waiting on Department, Waiting on Approval, Vendor Needed, Missing Asset, Missing Information, Budget, Technical, Scheduling, or Scope Decision should be stored as blocker types or blocker reasons, not separate top-level lifecycle statuses.

This keeps dashboards simple while preserving operational detail.

When a Task moves to the Kanban status `Blocked`:

- Require a blocker type and short reason.
- Record the status change in activity.
- Alert the Task assignee, Deliverable owner, Project owner/coordinator, and other explicitly authorized internal managers.
- Surface blocked attention on the parent Deliverable and Project so the obstacle is visible and can be cleared.
- Do not automatically change the Deliverable or Project lifecycle status.

Parent blocked attention may be derived from open blocked child Tasks. Clearing or resolving the final blocking Task should remove the derived blocked signal unless another blocker remains.

Example:

```text
Attention State: Blocked
Blocker Type: Waiting on Department
Blocker Detail: Final registration link has not been provided.
```

A dashboard may show:

```text
Blocked: 6
  - 2 Waiting on Department
  - 1 Waiting on Approval
  - 1 Waiting on Vendor
  - 1 Over Capacity
  - 1 Missing Asset
```

## Top-Level Attention States

Recommended top-level attention states:

| Attention State | Meaning |
|---|---|
| On Track | Work is moving as expected. |
| Needs Attention | Something needs a decision, clarification, or follow-up, but work is not fully blocked. |
| At Risk | Timeline, capacity, budget, or dependency issues may affect completion. |
| Blocked | Work cannot move forward until something changes. |
| Rush | Timeline is shorter than normal TAT/SLA. |
| Ready for Next Step | Work is ready to move forward. |

## Blocker Types

Recommended blocker types:

| Blocker Type | Example |
|---|---|
| Waiting on Department | Need final copy, event details, registration link, approval, or assets from requester/ministry. |
| Waiting on Approval | Required stakeholder signoff is not complete. |
| Waiting on Vendor | Vendor proof, quote, delivery, installation, or invoice is pending. |
| Over Capacity | Team does not have enough available time/resources in the requested window. |
| Missing Asset | Required photo, video, logo, artwork, copy, or file is missing. |
| Missing Information | Required details are unknown. |
| Budget | Budget approval, cost estimate, or spending decision is unresolved. |
| Technical | Platform, upload, file format, integration, or system issue is preventing progress. |
| Scheduling | Shoot date, publish date, install date, send date, or service date is unresolved. |
| Scope Decision | The team needs to decide whether to reduce, expand, defer, or outsource the work. |

## Dependency Types

Dependency types explain why something may become blocked or not ready. They may map to blocker types when work cannot move forward.

### Missing Information Dependency

A missing information dependency exists when the team cannot confidently plan or produce work because important details are not known.

Examples:

- Registration link missing.
- Event date not confirmed.
- Final cost not approved.
- Speaker name unknown.
- Volunteer roles not finalized.
- Service times not confirmed.

User-facing language:

> Waiting on event details.

### Asset Dependency

An asset dependency exists when production cannot continue until a file, image, video, copy, logo, artwork, or other asset is available or approved.

Examples:

- Need approved logo.
- Need final artwork.
- Need video footage.
- Need final copy.
- Need product photo.
- Need print-ready file.

User-facing language:

> Waiting on approved artwork.

### Approval Dependency

An approval dependency exists when work cannot move forward until one or more required reviewers approve the current version.

Examples:

- Ministry approval needed.
- Brand approval needed.
- Final approval needed.
- Budget approval needed.
- Vendor proof approval needed.

User-facing language:

> Waiting on ministry approval.

### Date / Schedule Dependency

A date dependency exists when a required date must be known or selected before the next step can happen.

Examples:

- Publish date not selected.
- Send date not selected.
- Install date not selected.
- Print in-hand date missing.
- Shoot date not scheduled.

User-facing language:

> Waiting on publish date.

### Vendor Dependency

A vendor dependency exists when work depends on outside production, delivery, proofing, installation, or confirmation.

Examples:

- Vendor proof not received.
- Print turnaround not confirmed.
- Signage pickup pending.
- Installation date not confirmed.
- Outsourced editor has not returned draft.

User-facing language:

> Waiting on vendor proof.

### Capacity Dependency

A capacity dependency exists when the team does not have enough available time, staff, budget, vendor support, or production bandwidth to complete the work in the requested window.

Examples:

- Communications is fully committed to a priority project for the next three weeks.
- Video team is unavailable during the requested production window.
- Designer capacity is already committed to Easter production.
- Vendor support or outsourcing may be required.

User-facing language:

> This may need a different timeline, smaller scope, or outside support.

### Task Blocker

A task blocker exists when an individual task cannot continue until something else happens.

Tasks may use the canonical status `Blocked` and should require a short blocked reason.

Examples:

- Task: Schedule Instagram post.
- Status: Blocked.
- Blocker Type: Waiting on Approval.
- Reason: Artwork not approved yet.

## Deliverable Readiness Checklist

Deliverable Types may define readiness requirements for key transitions.

The readiness checklist should answer:

> What must be true before this deliverable can move to the next state?

Example: Social Post ready for scheduling.

Required before scheduling:

- Copy approved.
- Artwork or media approved.
- CTA/link confirmed, if applicable.
- Platform selected.
- Publish date set.
- Required approvals complete.

Example: Signage ready for vendor handoff.

Required before vendor handoff:

- Size confirmed.
- Quantity confirmed.
- Location confirmed.
- Final artwork approved.
- Budget approval complete, if required.
- In-hand date confirmed.
- Vendor selected.

Example: Video ready for editing.

Required before editing:

- Footage captured or received.
- Script/talking points approved where applicable.
- Music/licensing direction confirmed if needed.
- Version requirements known.
- Due date confirmed.

## Transition Warnings and Gates

The system should warn or prevent certain transitions when required readiness items are incomplete.

MVP should favor helpful warnings unless moving forward would break approval integrity, publication readiness, or external/vendor handoff.

Examples:

### Warning

> This deliverable is missing final copy. Move to In Review anyway?

### Soft Gate

> This social post is not ready to schedule yet. Final artwork and copy still need approval.

### Hard Gate

> This deliverable cannot be marked Approved until required review assignments are approved or waived.

Hard gates should be used sparingly.

## Ready to Schedule

A deliverable should be considered ready to schedule when all required scheduling inputs are complete.

For a social post, this may include:

- Approved copy.
- Approved art/media.
- Platform.
- Publish date/time.
- CTA/link.
- Required approvals.

For an email, this may include:

- Approved subject line.
- Approved body copy.
- Confirmed audience/list.
- Approved graphics.
- CTA/link.
- Send date/time.
- Required approvals.

For print/signage, this may include:

- Approved artwork.
- Size/specs.
- Quantity.
- Vendor or production method.
- In-hand date.
- Budget approval if required.
- Delivery/pickup/installation details.

## Project Readiness Summary

Projects should summarize readiness across deliverables.

Examples:

- 3 deliverables ready.
- 2 waiting on approval.
- 1 waiting on missing information.
- 1 blocked by vendor.
- 4 tasks blocked.

The summary should help a Communications Lead understand what needs attention without opening every deliverable.

## Attention State Examples

Dependencies and readiness should feed plain-language attention states.

Examples:

- On Track.
- Needs Attention.
- At Risk.
- Blocked.
- Rush.
- Ready for Next Step.

When blocked, the blocker type should provide the specific cause:

- Waiting on final copy.
- Waiting on approved artwork.
- Waiting on ministry approval.
- Waiting on registration link.
- Waiting on vendor proof.
- Over capacity.

Avoid technical language like:

- Dependency violation.
- Invalid predecessor state.
- Transition denied.
- Required object incomplete.

## Task Dependencies

MVP should not support arbitrary task-to-task dependencies.

Tasks should support:

- Blocked status.
- Blocked reason.
- Blocker type.
- Optional reference to what is blocking the task.
- Comments for context.

Post-MVP may support richer task dependencies if real usage proves the need.

## Cross-Project and Cross-Deliverable Dependencies

MVP should avoid complex cross-project and cross-deliverable dependencies.

However, the system may support simple references or notes such as:

- This project is waiting on campaign approval.
- This deliverable is waiting on the video deliverable.
- This project depends on vendor quote approval.

These should be treated as visible blockers, not as a full dependency graph.

## Relationship to TAT / SLA and Capacity

Dependencies affect turnaround time and capacity.

A project may appear to have enough calendar time, but still be at risk if required inputs are missing or if team capacity is already committed.

Examples:

- A video has three weeks of lead time, but no shoot date is scheduled.
- A social post is due tomorrow, but the registration link is not ready.
- A print piece has a normal turnaround window, but vendor proof approval is still pending.
- A new request has normal lead time on paper, but Communications is over capacity because of a priority project.

The triage workspace should surface dependency risk alongside TAT / SLA and capacity guidance.

## Data Concepts

Potential data concepts:

- Attention state.
- Blocker type.
- Blocker detail.
- Readiness requirement.
- Readiness requirement type.
- Readiness status.
- Missing information item.
- Blocking reason.
- Blocking reference.
- Required approval assignment.
- Required asset/input.
- Transition warning.
- Transition gate.
- Readiness checklist template by Deliverable Type.

## MVP Recommendation

For MVP, include:

- Top-level attention states.
- Blocked as parent attention state.
- Blocker types and blocker details.
- Missing information items.
- Blocked task status and blocked reason.
- Deliverable readiness checklist.
- Transition warnings for incomplete readiness.
- Hard approval gate for required approvals.
- Plain-language dependency summaries.
- Project readiness summary.

Defer:

- Arbitrary task dependency graph.
- Cross-project dependency engine.
- Critical path.
- Gantt dependency views.
- Automatic rescheduling.
- Resource leveling.
- Complex predecessor/successor rules.

## Future Expansion

Future versions may add:

- Task-to-task dependencies.
- Deliverable-to-deliverable dependencies.
- Cross-project dependencies.
- Automated date impact warnings.
- Dependency-aware calendar views.
- Critical path reporting.
- Capacity-aware scheduling suggestions.
- Template-driven dependency rules.

## Related Docs

- `docs/product/PROJECT_TASK_MODULE.md`
- `docs/product/TURNAROUND_TIME_AND_CAPACITY.md`
- `docs/product/COMMUNICATIONS_TRIAGE_WORKSPACE.md`
- `docs/product/DELIVERABLES.md`
- `docs/product/TASKS.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-29
