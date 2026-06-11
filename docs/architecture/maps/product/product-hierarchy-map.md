# Product Hierarchy Map

## Purpose

Define the primary product hierarchy and show how major operational objects relate to one another.

## Core Rules

- Use the documented hierarchy as the default planning model.
- Keep campaigns optional.
- Treat projects as the primary operational container.
- Treat deliverables as the primary production and approval unit.
- Treat tasks as execution units attached to projects or deliverables.

## Relationships

- Campaigns may contain many projects.
- Projects may exist without a campaign.
- Projects may contain many deliverables.
- Tasks may attach directly to a project or a deliverable.
- Requests precede projects and may convert into them.
- Clarification messages may record future Task intent before conversion, but Task records remain part of the Project -> Deliverable -> Task implementation.

## Open Questions

- Which objects must exist in the first scaffold?
- How should the hierarchy appear in navigation and dashboards?
- Which supporting objects need to be shown in the first version of the map?

## Related Diagrams

- `project-lifecycle-map.md`
- `deliverable-lifecycle-map.md`
- `entity-relationship-diagram.md`
