# Deliverable Lifecycle

## Purpose

Define the canonical lifecycle for Deliverables in ForWorship Creative.

Deliverables are the primary production and approval units. This lifecycle describes how a deliverable moves from proposed idea to planned work, production, review, approval, delivery, active use, closeout, and archive.

## Core Principle

A deliverable status should tell the system and the user:

- What stage the deliverable is in.
- What data is required at that stage.
- Who owns the next action.
- What work can happen next.
- What gates or readiness checks apply.

The lifecycle should support real communications production without making users manage unnecessary complexity.

## Canonical Lifecycle

```text
Proposed
  -> Planning
    -> In Production
      -> Ready for Review
        -> In Review
          -> Revision, if needed
            -> Ready for Review
          -> Approved
            -> Delivery
              -> Published / Running
                -> Ended
                  -> Archived
```

## Lifecycle Stages

## Proposed

### Purpose

Capture the idea and enough information to decide whether this deliverable should exist.

A deliverable may be proposed by a requester, the system, a Communications Lead, or a Project Owner.

### Required data before exit

- Project association.
- Deliverable title or working name.
- Deliverable type.
- Purpose.
- Audience.
- Desired action.
- Requested date or timing need.
- Source of proposal: requester, system suggestion, Communications Lead, Project Owner.
- Basic notes/context.
- Decision owner.

### Possible decisions

- Approve for planning.
- Modify scope.
- Combine with another deliverable.
- Defer.
- Decline.
- Mark as later.

### Exit gate

The proposal must be reviewed by an authorized Project Owner, Communications Lead, or Organization Admin before it becomes planned production work.

## Planning

### Purpose

Turn the approved deliverable idea into a workable production plan.

This is where the deliverable brief, timeline, tasks, approval route, budget, vendor needs, and readiness requirements are shaped.

### Required data before exit

- Deliverable brief.
- Owner or assignee.
- Due date.
- Publish/send/show/print/install/delivery date, if applicable.
- Required tasks or intentional task exceptions.
- Timeline.
- Budget, if applicable.
- Required assets.
- Required approvals.
- Required reviewers/stakeholders.
- Vendor needs, if applicable.
- TAT/SLA expectation.
- Dependencies/readiness checklist.
- File/spec requirements.
- Definition of done.

### Typical generated tasks

- Confirm specs.
- Confirm copy source.
- Confirm art/assets.
- Assign designer, writer, editor, or producer.
- Confirm vendor.
- Confirm approval route.
- Confirm delivery date.
- Build production task list.

### Exit gate

The deliverable can move to In Production when the brief is complete enough, an owner is assigned, the timeline is known, key dependencies are identified, and required production tasks are created or intentionally skipped.

## In Production

### Purpose

Production work is underway.

Contributors create the deliverable, complete tasks, manage files, track budget where relevant, and resolve blockers.

### Required data before exit

- Assigned owner/contributors.
- Active task list.
- Budget/cost tracking, if applicable.
- Schedule/deadline.
- Required files/assets.
- Internal comments.
- Blockers resolved or documented.
- Draft/proof/review files submitted.

### Typical tasks

- Write copy.
- Design artwork.
- Edit video.
- Prepare proof.
- Build webpage.
- Export file.
- Upload draft.
- Confirm specs.
- Internal QA.
- Submit for review.

### Exit gate

The deliverable can move to Ready for Review when required production tasks are complete, required files are submitted, and the deliverable owner believes the work is ready to be reviewed.

## Ready for Review

### Purpose

Production work is complete enough to be packaged and submitted for review.

Ready for Review is a handoff state between production and active review.

### Required data before exit

- Review file/version submitted.
- Review notes.
- Reviewer list.
- Required approval assignments.
- Review due date.
- Change request instructions.
- Visibility scope for reviewers.
- External review links, if needed.

### Typical generated tasks/events

- Notify reviewers.
- Generate external review link where needed.
- Create or activate review assignments.
- Record submitted version.
- Mark current version as the review version.

### Exit gate

The deliverable moves to In Review when required reviewers are notified, the review package is available, review assignments are active, and external review links are generated where needed.

## In Review

### Purpose

Stakeholders review, ask questions, approve, or request changes.

This stage may include conversations, questions, signoffs, and one or more revision rounds.

### Required data before exit

- Current review version.
- Reviewers/stakeholders.
- Approval status per reviewer.
- Review comments.
- Questions/conversations.
- Revision round number.
- Review deadline.
- Required signoffs.

### Possible outcomes

- Approved.
- Changes requested.
- Questions asked.
- Review extended.
- Approval waived by authorized internal role.
- Review canceled or superseded.

### Exit gate

The deliverable can move to Approved only when all required stakeholder signoffs are complete or explicitly waived by an authorized internal role.

If changes are requested, the deliverable moves to Revision.

## Revision

### Purpose

Changes were requested and the deliverable is being revised.

Revision is a separate lifecycle state because revision rounds matter and should be visible.

### Required data before exit

- Requested changes.
- Change owner.
- Revision round number.
- Due date for revised version.
- Updated files/version.
- Open questions, if any.

### Exit gate

The deliverable moves to Ready for Review when revision tasks are complete, the updated version is submitted, and requested changes have been addressed or responded to.

### Loop

```text
In Review
  -> Revision
    -> Ready for Review
      -> In Review
```

## Approved

### Purpose

The deliverable has required signoffs and is ready to deliver.

Approved does not mean delivered.

### Required data before exit

- Approved version.
- Approval record.
- Required signoffs complete or waived.
- Delivery method known.
- Delivery owner.
- Delivery date/time.
- Final files ready or identified.

### Typical generated tasks

- Schedule post.
- Upload video.
- Send email.
- Send print file to vendor.
- Load slides.
- Publish webpage.
- Export final files.
- Notify requester.
- Handoff to vendor.

### Exit gate

The deliverable moves to Delivery when delivery tasks are created or confirmed.

## Delivery

### Purpose

Approved work is being scheduled, uploaded, sent, installed, printed, handed off, or otherwise released.

This is where approved work becomes active work in the world.

### Required data before exit

- Delivery task list.
- Delivery platform/vendor/location.
- Scheduled date/time.
- Delivery confirmation requirements.
- Final files.
- Owner responsible for delivery.

### Examples by deliverable type

| Deliverable Type | Delivery Action |
|---|---|
| Social Post | Scheduled or posted. |
| Video | Uploaded or scheduled. |
| Email | Scheduled or sent. |
| Signage | Sent to vendor, delivered, or installed. |
| Sermon Slide | Loaded into ProPresenter or service media system. |
| Website Update | Published. |
| Podcast Episode | Uploaded to host and published. |
| Bulletin Insert | Sent to printer or included in bulletin. |

### Exit gate

The deliverable moves to Published / Running when it has been released, scheduled, installed, sent, printed, uploaded, or otherwise made active.

## Published / Running

### Purpose

The deliverable is live, active, visible, or in use.

Not every deliverable is literally published. Some are sent, installed, loaded, delivered, distributed, or running.

### Type-specific labels

| Deliverable Type | User-facing Label |
|---|---|
| Social Post | Published. |
| Email | Sent. |
| Video | Published. |
| Website Update | Published. |
| Signage | Installed. |
| Print Piece | Delivered or Distributed. |
| Ad | Running. |
| Podcast Episode | Published. |
| Sermon Slide | Loaded or In Use. |

### Required data before exit

- Actual publish/send/install/delivery date.
- Live URL or reference, if applicable.
- Confirmation.
- Performance tracking fields, if relevant.
- Run window, if applicable.
- End date, if applicable.

### Exit gate

The deliverable moves to Ended when its run window is complete, the event is over, the post/campaign/ad is no longer active, signage has been removed, or the deliverable has served its active purpose.

## Ended

### Purpose

The deliverable is no longer active and needs closeout.

Ended prevents Published / Running from becoming the final resting place for work that still needs documentation, file archive, vendor payment, notes, or review.

### Required data before exit

- End date.
- Final status.
- Closeout checklist.
- Archive requirements.
- Vendor payment status, if applicable.
- Performance notes, if applicable.
- Lessons learned / review notes.
- Final file location.
- Source file location.
- Reuse notes.

### Typical generated tasks

- Archive final files.
- Archive source files.
- Document notes.
- Record performance or outcome.
- Pay vendor.
- Confirm invoice.
- Remove signage.
- Save final screenshots or links.
- Add tags for reuse.
- Mark file usage.
- Close related tasks.
- Notify project owner if closeout is incomplete.

### Exit gate

The deliverable moves to Archived when archive, documentation, payment/vendor, notes, and closeout requirements are complete or intentionally waived by an authorized internal role.

## Archived

### Purpose

The deliverable is complete, documented, preserved, and searchable for future reuse.

### Required data

- Final files archived.
- Source files archived, if applicable.
- Final approval record preserved.
- Delivery/publish record preserved.
- Notes added.
- Tags/context added.
- Vendor/payment records complete if relevant.
- Related project/campaign/context preserved.

### Behavior

Archived deliverables should be mostly read-only, except for authorized archive edits.

## Lifecycle Summary

| Stage | Main Question | Required Before Exit |
|---|---|---|
| Proposed | Should this deliverable exist? | Owner/Communications approval and basic brief data. |
| Planning | How will we make it? | Brief, owner, tasks, timeline, budget/vendor needs, approvals. |
| In Production | Are we making it? | Production tasks complete and draft/proof files submitted. |
| Ready for Review | Is it packaged for review? | Review version, reviewers, notes, due date. |
| In Review | Is it approved or does it need changes? | Required signoffs or change requests. |
| Revision | What needs to change? | Revision tasks complete and updated version submitted. |
| Approved | Is it ready to deliver? | Final approval record, approved version, delivery plan. |
| Delivery | Are we releasing it? | Delivery tasks complete or scheduled/sent/uploaded/installed. |
| Published / Running | Is it active? | Active window complete or deliverable no longer in use. |
| Ended | Is it ready to close out? | Archive, notes, vendor/payment, and documentation tasks complete. |
| Archived | Is it preserved? | Final searchable record complete. |

## Status vs Readiness

Lifecycle status describes where the deliverable is.

Readiness and attention states explain what is holding it back.

Examples:

```text
Status: Planning
Attention: Waiting on budget approval
```

```text
Status: Delivery
Attention: Waiting on vendor proof
```

```text
Status: In Review
Attention: Waiting on ministry approval
```

Do not turn every readiness issue into a lifecycle status.

## Approval Notes

Approvals happen primarily during In Review and must be complete or waived before Approved.

A deliverable may have multiple required or optional review assignments, such as:

- Budget.
- Resources.
- Design.
- Brand.
- Content.
- Ministry.
- Final.

A deliverable becomes Approved only when all required review assignments are approved or explicitly waived by an authorized internal role.

## Project Relationship

Deliverable lifecycle is independent from Project lifecycle.

Deliverables should not force the whole Project backward automatically unless a Project Owner or Communications Lead chooses to change the Project status.

Project status may summarize deliverable states, but deliverable status remains its own production state.

## Related Docs

- `docs/product/DELIVERABLES.md`
- `docs/product/PROJECT_TASK_MODULE.md`
- `docs/product/DEPENDENCIES_AND_READINESS.md`
- `docs/product/TURNAROUND_TIME_AND_CAPACITY.md`
- `docs/product/TASKS.md`
- `docs/product/COMMUNICATIONS_SYSTEM.md`

Last Updated: 2026-05-29
