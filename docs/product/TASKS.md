# Tasks

## Purpose

Define how tasks support project coordination and deliverable production.

## Current Decisions

- Working decision: tasks belong to a project and may optionally belong to a deliverable.
- Project-level tasks are for coordination.
- Deliverable-level tasks are for production.
- Tasks should not attach directly to campaigns in MVP.
- Campaigns, initiatives, programs/content streams, sermon series, seasons, ministry areas, topics, and tags provide strategic context rather than task ownership.
- Tasks do not define the canonical project or deliverable lifecycle by themselves.
- Deliverable status and project status should remain separate from task completion state.
- Canonical MVP task statuses are Not Started, In Progress, Blocked, Ready for Review, Done, Deferred, and Canceled.
- Tasks are the execution layer below project briefs and deliverable briefs.

## Task Status Model

### Not Started

- The task exists but work has not begun.

### In Progress

- Someone is actively working on it.

### Blocked

- Work cannot continue until something else happens.

### Ready for Review

- The task output is complete enough for review.

### Done

- The task is complete and accepted.

### Deferred

- The task is intentionally postponed but may return later.
- Deferred means "not now."

### Canceled

- The task is no longer needed and is not expected to resume.
- Canceled means "not happening."

## Project-Level Tasks

- Used for coordination, planning, stakeholder follow-up, budget confirmation, schedule confirmation, or project-wide work.
- Example: Confirm service times.

## Deliverable-Level Tasks

- Used for production steps tied to a specific output.
- Example: Write copy, design postcard, proofread, send to printer.

## Fields Under Consideration

- Title
- Description
- Assigned user
- Due date
- Status
- Comments
- Related project
- Related deliverable, when applicable

## Open Questions

- Should tasks support checklists?
- Should external vendors be assigned tasks in MVP or only receive scoped links?
- Should high-level strategic planning tasks exist later, and if so should they remain outside the MVP task model?

## Notes

- Tasks are execution units, not the primary planning object.
- Tasks always preserve project context. Deliverable context is optional.
- Task implementation should use existing Inspinia tables, cards, filters, notification patterns, and activity feed patterns before custom planning interfaces.
- Deliverable lifecycle details are documented in `/docs/product/DELIVERABLES.md`.
- Project lifecycle details are documented in `/docs/product/PROJECT_LIFECYCLE.md`.
- Goal alignment details are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.

Last Updated: 2026-05-29
