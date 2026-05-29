# Strategic Context and Goal Alignment

## Purpose

Define how ForWorship Creative connects ministry goals to communication strategy and production execution.

The platform is not merely project management. It exists to connect strategic ministry context to project briefs, deliverable briefs, and tasks so communications work has clear purpose without adding unnecessary workflow overhead.

## Current Decisions

- Canonical model: Strategic Context is distinct from Operational Work.
- Strategic Context includes initiatives, campaigns, programs/content streams, sermon series, seasons, ministry areas, topics, and tags.
- Operational Work includes projects, deliverables, and tasks.
- Projects are the primary operational container.
- Deliverables must belong to a project.
- Deliverables do not stand alone.
- Tasks belong to a project and may optionally belong to a deliverable.
- Campaigns are optional strategic context, not required project parents.
- Initiatives are optional strategic context, not required project parents.
- Programs / Content Streams are recurring operational rhythms, distinct from campaigns.
- A project or deliverable may support multiple strategic contexts over time, but MVP should preserve one primary operational home.
- The MVP should not force every project into a campaign.

## Strategic Chain

Context should flow downward while becoming more specific:

```text
Strategic Context
  -> Project Brief
    -> Deliverable Brief
      -> Tasks
```

## Brief Hierarchy

- Initiative Brief
- Campaign Brief
- Program / Content Stream Brief
- Project Brief
- Deliverable Brief

Higher-level briefs provide context and goals. Lower-level briefs translate those goals into specific audience, channel, timing, content, production, and approval decisions.

## Strategic Context

### Initiatives

Initiatives describe broad ministry or organizational goals. They may influence many campaigns, programs, content streams, projects, and deliverables.

### Campaigns

Campaigns are time-bound strategic efforts, often tied to a ministry push, season, event, or church-wide emphasis.

Examples:

- Series Support
- VBS Promotion
- Easter Services
- Summer Camps
- Capital campaign communications

### Programs / Content Streams

Programs / Content Streams are recurring rhythms of work. They are not campaigns by default, even when individual items within them support a campaign.

Examples:

- Weekly Podcast
- Weekly Sermon Clips
- Recurring email newsletter
- Regular social content rhythm

### Other Context

Sermon series, seasons, ministry areas, topics, and tags help explain why work exists, where it belongs strategically, and how it should be found later.

## Primary Home vs Strategic Association

Operational ownership and strategic association are separate concepts.

A project or deliverable should have one primary operational home in MVP, while preserving the ability to associate it with broader strategic contexts.

Examples:

- A podcast episode may belong operationally to Weekly Podcast while supporting an Advent campaign.
- A sermon clip may belong operationally to Weekly Sermon Clips while supporting a sermon series campaign.

## MVP Guidance

- Preserve one primary operational home.
- Allow strategic associations through tags, documented relationships, or future expansion.
- Do not require every project to belong to a campaign.
- Keep the first implementation simple enough to build with existing Inspinia dashboards, cards, tables, tabs, activity feeds, messaging assets, notification components, and file lists.
- Avoid custom workflow canvases, strategy boards, drag-and-drop planning tools, and bespoke planning interfaces unless a later documented decision requires them.

## Open Questions

- Which strategic association fields are required in MVP versus later?
- Should Programs / Content Streams be modeled as first-class records in MVP or represented by tags/templates initially?
- Which brief fields are required for each strategic context type?
- How should reporting show projects that support multiple strategic contexts?

## Notes

- Campaign details are documented in `/docs/product/CAMPAIGNS.md`.
- Project details are documented in `/docs/product/PROJECT_MANAGEMENT.md`.
- Deliverable details are documented in `/docs/product/DELIVERABLES.md`.
- Task details are documented in `/docs/product/TASKS.md`.
- Inspinia implementation guidance is documented in `/docs/INSPINIA.md`.

Last Updated: 2026-05-29
