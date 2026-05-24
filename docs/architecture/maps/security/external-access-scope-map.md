# External Access Scope Map

## Purpose

Show the canonical limits of External Reviewer access through scoped, time-bound magic links.

## Core Rules

- Magic links do not grant general tenant access.
- External access should be narrow, revocable, action-bound, and time-bound.
- External Reviewer access should expose only the specific project, deliverable, approval, or later vendor-handoff context required for the action.
- Link usage should create communication, activity, audit, approval, and notification records where appropriate.

## Relationships

- External access scopes connect to tenants, projects, deliverables, approvals, comments, files, and notification flows.
- Scope rules should align with the permission matrix.
- Link actions should influence approval history, communication history, and audit logging.
- Notification delivery should respect external visibility boundaries.

## Open Questions

- Which External Reviewer scenarios should allow selected file upload in MVP?
- Should some links expose project summary context while others expose only a deliverable or approval request?
- Which file, comment, and activity events should be visible externally?

## Related Diagrams

- `permission-matrix.md`
- `approval-flow-map.md`
- `notification-trigger-map.md`
- `activity-audit-relationship-diagram.md`

Last Updated: 2026-05-21
