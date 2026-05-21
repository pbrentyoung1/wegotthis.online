# Permission Matrix

## Purpose

Define which roles can view, create, update, approve, close, and administer key parts of the system.

## Core Rules

- Permissions must respect tenant scope.
- Internal roles and external magic-link roles should remain distinct.
- Sensitive project, brand, archive, and budget information should not be visible by default.
- The first matrix should be minimal, understandable, and practical.

## Relationships

- Roles connect to projects, deliverables, assets, approvals, comments, reports, and settings.
- Visibility rules should affect notifications, search, comments, and archived materials.
- Permission rules should align with workflow states and external access scopes.
- Matrix decisions should inform schema planning and UI visibility.

## Open Questions

- What is the minimum viable permissions matrix?
- Which permissions are role-based versus object-based?
- Which archived materials should be restricted to managers or admins?

## Related Diagrams

- `external-access-scope-map.md`
- `approval-flow-map.md`
- `entity-relationship-diagram.md`
