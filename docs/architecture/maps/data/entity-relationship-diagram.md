# Entity Relationship Diagram

## Purpose

Outline the primary domain entities and their high-level relationships before schema work begins.

## Core Rules

- Reflect the documented hierarchy and tenant model.
- Keep conceptual relationships ahead of implementation detail.
- Avoid serious schema work until workflow and permissions decisions are stable.
- Keep the diagram aligned with documented product language.

## Relationships

- Tenants relate to users, memberships, departments, projects, requests, assets, and templates.
- Projects relate to campaigns, deliverables, tasks, comments, approvals, budgets, and activity.
- Deliverables relate to approvals, assets, statuses, and scheduled dates.
- Assets, notifications, audit records, and magic links connect back to work context.

## Open Questions

- Which entities are required for the first scaffold?
- Which relationships need histories or status logs?
- Which entities should be deferred until after MVP core workflows are stable?

## Related Diagrams

- `product-hierarchy-map.md`
- `permission-matrix.md`
- `activity-audit-relationship-diagram.md`
