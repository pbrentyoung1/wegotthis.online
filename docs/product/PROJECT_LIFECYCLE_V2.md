# Project Lifecycle V2

## Purpose

Define the canonical Project lifecycle for ForWorship Creative.

Projects are the primary operational container. They manage scope, objective, ownership, start/stop dates, budget, resources, capacity, strategic context, and the overall body of work.

Deliverables manage production, review, approval, delivery, publishing/running, ending, and archive.

## Core Principle

Project lifecycle should summarize and manage the overall effort without duplicating the Deliverable lifecycle.

A Project answers:

> Are we committed to this body of work, do we have the plan and resources to do it, is work underway, and is the overall project complete?

## Canonical Project Lifecycle

```text
Proposed
  -> Planning
    -> Scheduled
      -> Active
        -> Paused, if needed
          -> Active
        -> Completed
          -> Closeout
            -> Archived
```

## Status vs Attention State

Project lifecycle status describes where the Project is in its operational journey.

Attention states explain current health or risk.

Recommended attention states:

- On Track.
- Needs Attention.
- At Risk.
- Blocked.
- Rush.
- Ready for Next Step.

`Blocked` is the top-level attention state when work cannot move forward. Specific causes such as Waiting on Department, Waiting on Approval, Waiting on Vendor, Over Capacity, Missing Asset, Missing Information, Budget, Technical, Scheduling, or Scope Decision should be stored as blocker types or blocker reasons.

See `docs/product/DEPENDENCIES_AND_READINESS.md` for the canonical readiness and blocker model.

## Lifecycle Stages

## Proposed

### Purpose

Capture a potential Project that has not yet been fully accepted, scoped, or planned.

A Project may be proposed from:

- A submitted request.
- Communications triage.
- A campaign or strategic context.
- A program/content stream.
- An internal Communications need.
- A leadership priority.

### Required data before exit

- Working title.
- Department/ministry.
- Request/source context, if applicable.
- Proposed objective.
- Requested timing or deadline.
- Project owner or decision owner.
- Basic strategic context, if known.
- Proposed project template, if used.
- Initial priority or urgency signal.

### Exit options

- Move to Planning.
- Ask for clarification.
- Merge with an existing Project.
- Attach to a Campaign, Program / Content Stream, Initiative, or other strategic context.
- Defer.
- Decline.
- Archive.

## Planning

### Purpose

Define the Project well enough to decide whether and how the team will commit to the work.

Planning is where Communications determines the project objective, scope, deliverable lineup, timing, budget, resources, capacity, TAT/SLA fit, approval path, risks, and vendor/outsource needs.

### Required data before exit

A Project should not move to Scheduled until the following are complete or intentionally waived by an authorized internal role:

- Project objective defined.
- Project owner assigned.
- Department/ministry confirmed.
- Start date set.
- Stop date set.
- Scope summary defined.
- In-scope and out-of-scope notes captured where useful.
- Deliverable lineup approved or sufficiently defined.
- Required deliverables have owners or owner placeholders.
- TAT/SLA checked.
- Capacity checked.
- Budget/resource needs identified.
- Vendor or outsource needs identified, if applicable.
- Rush status resolved, if applicable.
- Major blockers identified.
- Stakeholders/reviewers identified.
- Approval path identified.
- Project priority confirmed.

### Planning questions

Planning should help Communications answer:

- What are we trying to accomplish?
- Who is this for?
- What action or outcome are we trying to create?
- What deliverables are needed?
- What is not included?
- When does work need to begin?
- When does this work need to stop?
- What is the real deadline, event date, publish date, or launch date?
- Is the requested timeline normal, tight, or rushed?
- Does the team have capacity?
- Does this require vendor or outsourced support?
- What is the budget or cost exposure?
- Who needs to review or approve work?
- What could block the work?

## Scheduled

### Purpose

Scheduled means the organization has committed the Project to the work plan.

The Project is approved, resourced well enough to proceed, placed into the work window, and ready to become active when the start date arrives or when work begins.

Scheduled is the most important Project-level gate because it separates possible work from committed work.

### Required state

A Scheduled Project should have:

- Approved objective.
- Project owner.
- Start date.
- Stop date.
- Approved or accepted deliverable lineup.
- Capacity reviewed.
- Budget/resource needs noted.
- Vendor/outsource decision noted, if applicable.
- Rush decision documented, if applicable.
- Major blockers documented.
- Stakeholders/reviewers identified.
- Priority confirmed.
- Project ready to begin or already queued to begin.

### Ready to Schedule checklist

The system should summarize scheduling readiness in plain language.

Example ready state:

```text
Ready to Schedule:
- Project owner assigned
- Start/stop dates set
- Deliverables approved
- Capacity reviewed
- Budget/resource needs noted
```

Example not-ready state:

```text
Not ready to schedule:
- Waiting on volunteer signup link
- Video deliverable has no owner
- Requested timeline is rushed and needs approval
```

## Active

### Purpose

Work is underway across one or more deliverables or project-level tasks.

The Project may become Active when:

- The start date arrives.
- A Project Owner manually starts work.
- A deliverable or project-level task begins.

### Active tracking

Active Projects should track:

- Deliverable progress.
- Project-level tasks.
- Budget used or cost notes, if applicable.
- Resource/capacity notes.
- Blockers.
- Timeline risk.
- Scope changes.
- Vendor status.
- Stakeholder communication.
- Activity history.

### Project summaries

The Project should summarize deliverable states rather than duplicate them.

Example:

```text
Project: Recruit Volunteers
Status: Active
Attention: At Risk

Deliverables:
- Volunteer Promo Video: In Review
- Social Posts: In Production
- Email: Approved
- Announcement Slide: Published / Running
```

## Paused

### Purpose

Work is intentionally stopped.

A Project may be paused because of:

- Waiting on leadership decision.
- Budget hold.
- Department delay.
- Capacity conflict.
- Strategic priority change.
- Event change.
- Vendor issue.

### Required data

- Pause reason.
- Pause date.
- Person who paused it.
- What must happen before work resumes.
- Review/resume date, if known.

### Exit options

- Resume to Active.
- Return to Planning.
- Defer.
- Decline/cancel.
- Move to Closeout if work ended without completion.

## Completed

### Purpose

The Project’s planned body of work is substantially complete.

Completed does not mean archived.

A Project can move to Completed when:

- Required deliverables have reached their intended state.
- Remaining deliverables are intentionally deferred, canceled, or marked later.
- Project-level production tasks are complete or waived.
- Stakeholders understand that production work is finished.

### Required data before exit

- Required deliverables completed, ended, archived, or intentionally waived/deferred/canceled.
- Open project-level tasks resolved or intentionally deferred/canceled.
- Final budget/resource notes captured where needed.
- Vendor work complete or remaining vendor items moved to Closeout.
- Completion date recorded.

## Closeout

### Purpose

Complete archive, documentation, review, vendor/payment, and institutional memory tasks.

Closeout is where the team preserves the value of the work for future reuse.

### Typical closeout tasks

- Archive final files.
- Archive source files.
- Confirm deliverable closeout is complete.
- Record notes and lessons learned.
- Record performance/outcome notes where available.
- Confirm vendor invoices/payments.
- Document scope changes.
- Add tags and strategic context for future search.
- Confirm final links/screenshots where useful.
- Close remaining tasks.

### Required data before exit

- Final files and source files archived where applicable.
- Deliverable closeout complete or intentionally waived.
- Vendor/payment status complete where applicable.
- Final notes added.
- Related strategic context preserved.
- Project archive checklist complete or waived by authorized role.

## Archived

### Purpose

The Project is preserved, searchable, and mostly read-only.

Archived Projects should retain:

- Project brief.
- Strategic context.
- Timeline.
- Deliverables.
- Final files and links.
- Approval history.
- Conversations/activity as allowed.
- Budget/resource notes.
- Vendor records where relevant.
- Closeout notes.

## Scheduling Gate

The Planning -> Scheduled transition is the primary project commitment gate.

The system should not treat a Project as Scheduled simply because someone requested it.

Scheduled means Communications has reviewed the work and can say:

> We understand the goal, the scope, the dates, the capacity, the resources, and the deliverables. We are committing this into the work plan.

## Rush Review

If a Project appears rushed based on TAT/SLA rules, the Planning -> Scheduled gate should require a rush review.

Rush review should ask:

### Deadline reality

- Is this a hard or soft deadline?
- Is the date tied to a corporate strategy, legally binding launch, conference, major event, or external commitment?
- What happens if we miss this date?
- Who set this timeline, and based on what?

### Scope and trade-offs

- What can we cut to make this date?
- What is the exact definition of done?
- What must be ready on Day 1?
- What can move to a later phase?
- Are stakeholders willing to accept a smaller or lower-polish version?

### Resources and capacity

- Who is available to work on this immediately?
- Will this require moving people off other critical work?
- Will this require overtime?
- Is there budget for overtime, vendors, or outsourcing?
- Are there built-in bottlenecks that cannot be accelerated?

### Reality check

- If we had double the budget, could this be done faster?
- If not, what structural limitation makes the requested timeline impossible?

Rush acceptance should record:

- Who approved rush handling.
- Why it was accepted.
- What scope changed.
- What other work may be affected.
- Whether vendor or outsourced help is needed.

## Budget and Resource Planning

Budgeting time and resources is Project-level work.

### Planning should capture

- Estimated internal time.
- Estimated staff/resource needs.
- Estimated budget.
- Vendor or outsourced support needs.
- Priority level.
- Capacity fit.
- Known risks.

### Active should track

- Budget used.
- Time/resource notes.
- Vendor costs.
- Deliverable progress.
- Blockers.
- Timeline risk.
- Scope changes.
- Capacity conflicts.

### Closeout should capture

- Final cost.
- Vendor payments.
- Actual time/resource notes, if available.
- Lessons learned.
- Scope changes.
- Reuse notes.

## Project vs Deliverable Lifecycle

Project lifecycle manages:

- Acceptance.
- Planning.
- Scheduling.
- Budgeting.
- Resourcing.
- Capacity.
- Active work.
- Completion.
- Closeout.
- Archive.

Deliverable lifecycle manages:

- Proposal.
- Production planning.
- Production.
- Review.
- Revision.
- Approval.
- Delivery.
- Publication/running.
- Ending.
- Archive.

See `docs/product/DELIVERABLE_LIFECYCLE.md` for the canonical Deliverable lifecycle.

## MVP Recommendation

For MVP, include:

- Project lifecycle status.
- Project start date and stop date.
- Project owner.
- Scope summary.
- Deliverable lineup.
- Capacity reviewed flag or note.
- Budget/resource notes.
- Vendor/outsource recommendation.
- Rush review fields where applicable.
- Blocked attention state and blocker types.
- Closeout checklist.

Defer:

- Advanced capacity forecasting.
- Full resource management engine.
- Automated scheduling optimization.
- Gantt charts.
- Complex cross-project dependency planning.
- Detailed timesheet-style tracking.

## Related Docs

- `docs/product/PROJECT_TASK_MODULE.md`
- `docs/product/DELIVERABLE_LIFECYCLE.md`
- `docs/product/DEPENDENCIES_AND_READINESS.md`
- `docs/product/TURNAROUND_TIME_AND_CAPACITY.md`
- `docs/product/COMMUNICATIONS_TRIAGE_WORKSPACE.md`
- `docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-29
