# Deliverables

## Purpose

Define deliverables as the specific outputs produced inside projects.

## Current Decisions

- Working decision: deliverables are the primary production and approval units.
- Projects may have many deliverables.
- Deliverables may have their own due dates, statuses, approvals, files/assets, and tasks.
- Most approvals should attach to deliverables in MVP.

## Fields Under Consideration

- Title
- Description
- Type
- Due date
- Status
- Approval status
- Assigned owner
- Related assets
- Tasks
- Channel
- Size/specs
- Budget/cost if relevant
- Publish/scheduled date
- Closeout requirements

## Approval Notes

- MVP should focus on deliverable approval.
- Future support may include project-level approval, asset-level approval, task-level review, and closeout approval.
- Intake approval is different from deliverable approval.
- Deliverable approval requests, approval notes, stakeholder feedback, requested changes, and approval completion should be captured in project or deliverable communication history.
- Approval notifications should link back to the relevant deliverable context.

## Open Questions

- What deliverable types are required for the first pilot?
- Which deliverable statuses are needed for MVP?
- Can one deliverable have multiple approval rounds?
- Should deliverable comments support internal-only and stakeholder-visible visibility?

## Notes

- Deliverables sit between projects and tasks in the hierarchy: Campaigns -> Projects -> Deliverables -> Tasks.
- Communications system details are documented in `/docs/product/COMMUNICATIONS_SYSTEM.md`.

Last Updated: 2026-05-20
