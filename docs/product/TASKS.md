# Tasks

## Purpose

Define how tasks support deliverable production and operational work in ForWorship Creative.

Tasks are execution steps that belong to Deliverables.

Request clarification records future Task intent before the Task system exists. Asking for clarification stores the intended requester assignment and next-workday target on the source Request/message. It does not create a Task record yet; this marker should become a canonical Task after Projects and Deliverables are implemented.

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
- Tasks are the execution layer below project briefs and deliverable briefs.
- Earlier planning allowed optional project-level tasks. The current MVP model preserves that coordination need by using coordination/admin Deliverables instead of direct Project tasks.

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

### MVP Blocker / Attention States

Blocked tasks may use plain-language blocker or attention states such as:

- Over Capacity
- Waiting on Department
- Waiting on Approval
- Vendor Needed
- Missing Information

These should remain blocker types, attention states, or blocker reasons. They should not become separate task lifecycle statuses.

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

## Assignees, Watchers, and Reviewers

Tasks support assignees in MVP.

MVP should keep task responsibility simple:

- one assigned user or clear owner where possible
- optional due date
- status
- blocker reason/type when blocked

Watchers, task reviewers, follower lists, and richer notification routing may be future enhancements if real usage proves the need.

Review responsibility should primarily stay with Deliverables and review assignments rather than becoming a separate task-review system in MVP.

## Skills, Resources, TAT, and SLA

Tasks may eventually use skills, resources, turnaround time, and SLA context through Deliverable Types, user profiles, and planning/capacity models.

MVP should support this direction lightly by preserving relevant fields and relationships, but it should not require a full resource management engine before task work is useful.

Examples of future-aware task context:

- a Deliverable Type may imply preferred skills
- a task may inherit capacity pressure from the Deliverable
- a task may be blocked because the team is over capacity
- a rush Deliverable may affect task due dates

## Dependencies

Dependencies should be supported lightly and planned for, not overbuilt in MVP.

MVP task dependency handling should include:

- Blocked status
- Blocker type
- Blocked reason
- Optional reference to the Deliverable, approval, missing information item, vendor need, or asset/input causing the blocker

Do not create a complex dependency engine in MVP.

MVP should defer:

- arbitrary task-to-task dependency graphs
- critical path calculations
- automatic rescheduling
- cross-project dependency engines
- Gantt-style dependency management

## MVP Recommendation

For MVP, include:

- Tasks attached to Deliverables only.
- Conversion of marked clarification follow-up into Tasks after Projects and Deliverables exist.
- Simple task creation.
- Assignment.
- Due date.
- Status.
- Blocked status with blocker reason/type.
- Comments.
- Completion tracking.
- Sort order or manual ordering within Deliverable.
- Light comments or discussion notes where needed.

Defer:

- Tasks attached directly to Projects.
- Arbitrary task-to-task dependencies.
- Complex subtasks.
- Recurring task engine.
- Vendor task assignment as a full account workflow.
- Time tracking/timesheets.
- Watchers and task reviewers.
- Rich task discussion threads.

## Task Discussions

Task discussions are light/future.

MVP may allow simple comments or notes on tasks if needed for implementation, but substantive production conversation should roll up through Deliverables so the project history stays coherent.

Task-level conversation should not become a separate messaging system.

## Open Questions

- Should tasks support lightweight checklists inside a task, or should all checklist items be tasks?
- Should external vendors ever see tasks directly, or only scoped deliverable/review links?
- Which Deliverable Types need default task templates in MVP?
- Should high-level strategic planning tasks exist later, and if so should they remain outside the MVP task model?
- Which task discussion behavior is useful enough for MVP without fragmenting Deliverable conversation?
- When should watchers, task reviewers, or richer task notification routing be added?

## Notes

- Tasks are execution units, not the primary planning object.
- Task implementation should use existing Inspinia tables, cards, filters, notification patterns, and activity feed patterns before custom planning interfaces.
- Tasks always preserve Project context through their Deliverable.
- Goal alignment details are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.
- Project-level coordination should be represented by a coordination/admin Deliverable.
- Administrative work should be organized through Administrative Projects and administrative Deliverables.
- Deliverable lifecycle details are documented in `/docs/product/DELIVERABLE_LIFECYCLE.md`.
- Project lifecycle details are documented in `/docs/product/PROJECT_LIFECYCLE_V2.md`.
- Dependencies and readiness details are documented in `/docs/product/DEPENDENCIES_AND_READINESS.md`.
- Skills and resources details are documented in `/docs/product/SKILLS_AND_RESOURCES.md`.
- TAT/SLA and capacity details are documented in `/docs/product/TURNAROUND_TIME_AND_CAPACITY.md` and `/docs/product/BUDGET_AND_CAPACITY.md`.

Last Updated: 2026-05-29
