# Tasks and Approvals

## Purpose

Define task management and approval tracking behavior.

## Current Decisions

- Task and approval tracking is a core product area.
- Tasks and approvals should eventually relate to projects.
- Proofread/signoff is a project field under consideration.
- Working decision: approvals should primarily attach to deliverables for MVP.
- Intake approval is different from deliverable approval.
- Review responsibilities are contextual assignments, not separate base permission roles.
- MVP review assignment types are Budget, Resources, Design, Brand, Content, Ministry, and Final.
- A project, deliverable, or reviewable element may have multiple review assignments.
- Required review assignments block approval until approved or explicitly waived.
- Future support may include project-level approval, asset-level approval, task-level review, and closeout approval.
- Tasks belong to a project and may optionally belong to a deliverable.
- Deliverables must belong to a project and do not stand alone.

## Open Questions

- Are tasks reusable through templates?
- Which approval actions are available through magic links?

## Notes

- Keep approval workflows simple until real church process requirements are documented.
- Deliverables are documented in `/docs/product/DELIVERABLES.md`.
- Tasks are documented in `/docs/product/TASKS.md`.
- Goal alignment details are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.

Last Updated: 2026-05-29
