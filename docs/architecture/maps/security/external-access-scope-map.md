# External Access Scope Map

## Purpose

Show the limits of stakeholder and vendor access through scoped, time-bound magic links.

## Core Rules

- External access should be narrow, revocable, and time-bound.
- External reviewers should only see the context required for their action.
- External access should not reveal tenant-wide information.
- Link usage should be logged.

## Relationships

- External access scopes connect to deliverables, projects, approvals, comments, and files.
- Scope rules should align with the permission matrix.
- Link actions should influence approval history, communication history, and audit logging.
- Notification delivery should respect external visibility boundaries.

## Open Questions

- Which actions should be available to stakeholders versus vendors?
- Should some links expose project context while others expose only a deliverable?
- Which file and comment events should be visible externally?

## Related Diagrams

- `permission-matrix.md`
- `approval-flow-map.md`
- `activity-audit-relationship-diagram.md`
