# Deliverables

## Purpose

Define deliverables as the specific outputs produced inside projects.

## Current Decisions

- Working decision: deliverables are the primary production and approval units.
- Deliverables must belong to a project.
- Deliverables do not stand alone.
- Projects may have many deliverables.
- Deliverables may have their own due dates, statuses, approvals, files/assets, and tasks.
- Deliverable briefs should inherit relevant project and strategic context while becoming more specific about channel, audience, content, specifications, timing, approvals, and production tasks.
- Most approvals should attach to deliverables in MVP.
- Canonical deliverable lifecycle for MVP:
  - Planned
  - In Progress
  - In Review
  - Waiting for Approval
  - Changes Requested
  - Approved
  - Scheduled
  - Published
  - Archived

## Lifecycle Notes

- Deliverables may have their own status independent of project status.
- Approval logic primarily belongs to deliverables.
- Waiting for Approval is reserved for deliverables or other reviewable elements, not for the project itself.
- Changes Requested belongs to deliverable review loops.
- Project Revision is the project-level phase that reflects one or more deliverables needing changes.
- Deliverables should not force the whole project backward unless a Project Owner or Communications Lead chooses to move the project state.

## Review and Approval Status Model

- Planned: the deliverable or element is expected but work has not started.
- In Progress: production work is underway.
- In Review: the item is being checked internally for quality, content, brand, or readiness.
- Waiting for Approval: the item is ready for a named reviewer or External Reviewer to approve or request changes.
- Changes Requested: a reviewer has requested changes.
- Approved: the current version is approved for scheduling, publication, production, or handoff.
- Canceled: the approval path is no longer needed.
- Expired: an external approval link or approval window has expired.
- Superseded: a newer version or approval request replaced this one.

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
- Parent project
- Channel
- Size/specs
- Budget/cost if relevant
- Publish/scheduled date
- Closeout requirements

## Approval Notes

- MVP should focus on deliverable approval.
- Future support may include project-level approval, asset-level approval, task-level review, and closeout approval.
- Intake approval is different from deliverable approval.
- Deliverable approval requests, approval notes, reviewer feedback, requested changes, and approval completion should be captured in project or deliverable communication history.
- Approval notifications should link back to the relevant deliverable context.
- External Reviewer access to deliverables should use narrow, time-bound magic links rather than general workspace accounts.
- Approval status applies to a specific deliverable or element version where versioning matters.
- A deliverable may have multiple review assignments, such as Budget, Resources, Design, Brand, Content, Ministry, and Final.
- Waiting for Approval means at least one required review assignment is awaiting a decision.
- A deliverable becomes Approved only when all required review assignments are approved or explicitly waived by an authorized internal role.
- Optional review assignments can add context without blocking approval.

## Open Questions

- What deliverable types are required for the first pilot?
- Is the canonical MVP deliverable lifecycle sufficient for the first pilot?
- Should deliverable comments support internal-only and review-visible visibility?

## Notes

- Deliverables sit between projects and tasks in the operational model: Projects -> Deliverables -> Tasks.
- Campaigns, initiatives, programs/content streams, sermon series, seasons, ministry areas, topics, and tags are strategic context, not replacements for the required parent project.
- A deliverable may support multiple strategic contexts through its project context, tags, or future relationships, but it still belongs operationally to one project in MVP.
- Communications system details are documented in `/docs/product/COMMUNICATIONS_SYSTEM.md`.
- Goal alignment details are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.
- External access boundaries are documented in `/docs/architecture/maps/security/external-access-scope-map.md`.

Last Updated: 2026-05-29
