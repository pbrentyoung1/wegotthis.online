# Tasks

## Purpose

Define how tasks support project coordination and deliverable production.

## Current Decisions

- Working decision: tasks can attach to projects or deliverables.
- Project-level tasks are for coordination.
- Deliverable-level tasks are for production.
- Tasks should not normally attach directly to campaigns except possibly for high-level planning tasks later.

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

- Which task statuses are needed for MVP?
- Should tasks support checklists?
- Should external vendors be assigned tasks in MVP or only receive scoped links?

## Notes

- Tasks are execution units, not the primary planning object.

Last Updated: 2026-05-20
