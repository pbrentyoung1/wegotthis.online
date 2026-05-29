# Tasks

## Purpose

Define how tasks support deliverable production and operational work in ForWorship Creative.

Tasks are execution steps that belong to Deliverables.

## Current Decisions

- Tasks belong to Deliverables.
- Projects contain Deliverables, and Deliverables contain Tasks.
- Tasks should not float directly under Projects in MVP.
- Project-level coordination work should be represented by a coordination/admin Deliverable.
- Administrative, recurring, monthly, weekly, daily, or yearly work should be held inside an Administrative Project with administrative Deliverables.
- Tasks should not attach directly to Campaigns, Initiatives, Programs / Content Streams, or other strategic context objects.
- Tasks do not define the canonical Project or Deliverable lifecycle by themselves.
- Deliverable lifecycle status and Task completion state should remain separate.
- Canonical MVP task statuses are Not Started, In Progress, Blocked, Ready for Review, Done, Deferred, and Canceled.

## Canonical Hierarchy

```text
Project
  -> Deliverable
    -> Task
```

A Task rolls up to a Project through its Deliverable.

## Why Tasks Belong to Deliverables

Tasks make the most sense when attached to the specific output they help complete.

Examples:

| Deliverable | Tasks |
|---|---|
| Social Post | Draft caption, design graphic, confirm CTA, schedule post. |
| Video | Draft talking points, schedule shoot, edit first cut, add captions, export final. |
| Signage | Confirm size, design proof, approve final art, send to vendor, confirm install. |
| Email | Draft copy, design header, confirm list, proofread, schedule send. |
| Podcast Episode | Outline episode, record audio, edit, write show notes, upload episode. |

This avoids orphan tasks and keeps work connected to its production context.

## Coordination / Admin Deliverables

Some work feels project-level, but should still live inside a Deliverable.

For coordination work, create a coordination Deliverable.

Example:

```text
Project: Promote VBS

Deliverable: Project Coordination
Tasks:
  - Confirm stakeholder list
  - Confirm budget
  - Schedule kickoff
  - Confirm final deliverable lineup
```

For recurring administrative work, create an Administrative Project with administrative Deliverables.

Example:

```text
Project: Monthly Communications Admin - June

Deliverable: Social Calendar Maintenance
Tasks:
  - Review scheduled posts
  - Update content calendar
  - Confirm missing assets

Deliverable: Website Maintenance
Tasks:
  - Check broken links
  - Update event pages
  - Review homepage announcements

Deliverable: Newsletter Production
Tasks:
  - Gather ministry updates
  - Draft newsletter
  - Schedule send
```

## Task Status Model

## Not Started

- The task exists but work has not begun.

## In Progress

- Someone is actively working on it.

## Blocked

- Work cannot continue until something else happens.
- Blocked tasks should require a blocker type or short blocked reason.
- See `docs/product/DEPENDENCIES_AND_READINESS.md` for blocker types.

## Ready for Review

- The task output is complete enough for review.
- This does not necessarily mean the Deliverable is ready for review unless required Deliverable readiness checks are complete.

## Done

- The task is complete and accepted.

## Deferred

- The task is intentionally postponed but may return later.
- Deferred means "not now."

## Canceled

- The task is no longer needed and is not expected to resume.
- Canceled means "not happening."

## Task vs Deliverable Lifecycle

Tasks support the Deliverable lifecycle, but do not define it.

A Deliverable may move through:

```text
Proposed
  -> Planning
    -> In Production
      -> Ready for Review
        -> In Review
          -> Revision
          -> Approved
            -> Delivery
              -> Published / Running
                -> Ended
                  -> Archived
```

Tasks provide the execution steps that help the Deliverable move from one stage to the next.

Example:

```text
Deliverable: Instagram Post
Lifecycle Status: In Production

Tasks:
- Draft caption: Done
- Design graphic: In Progress
- Confirm CTA link: Blocked
- Schedule post: Not Started
```

The Deliverable may still be In Production even if several tasks are complete.

## Fields Under Consideration

Core fields:

- Deliverable ID.
- Title.
- Description.
- Assigned user.
- Due date.
- Status.
- Priority.
- Blocker type, if Blocked.
- Blocked reason, if Blocked.
- Comments.
- Sort order.
- Completed by.
- Completed at.

Derived fields:

- Project, through Deliverable.
- Strategic context, through Project and related tags/associations.

## MVP Recommendation

For MVP, include:

- Tasks attached to Deliverables only.
- Simple task creation.
- Assignment.
- Due date.
- Status.
- Blocked status with blocker reason/type.
- Comments.
- Completion tracking.
- Sort order or manual ordering within Deliverable.

Defer:

- Tasks attached directly to Projects.
- Arbitrary task-to-task dependencies.
- Complex subtasks.
- Recurring task engine.
- Vendor task assignment as a full account workflow.
- Time tracking/timesheets.

## Open Questions

- Should tasks support lightweight checklists inside a task, or should all checklist items be tasks?
- Should external vendors ever see tasks directly, or only scoped deliverable/review links?
- Which Deliverable Types need default task templates in MVP?

## Notes

- Tasks are execution units, not the primary planning object.
- Project-level coordination should be represented by a coordination/admin Deliverable.
- Administrative work should be organized through Administrative Projects and administrative Deliverables.
- Deliverable lifecycle details are documented in `/docs/product/DELIVERABLE_LIFECYCLE.md`.
- Project lifecycle details are documented in `/docs/product/PROJECT_LIFECYCLE_V2.md`.

Last Updated: 2026-05-29
