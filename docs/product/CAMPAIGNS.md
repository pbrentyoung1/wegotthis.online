# Campaigns

## Purpose

Define campaigns as optional strategic context for related communications work.

## Current Decisions

- Campaigns are optional strategic context, not required operational parent containers.
- Strategic Context is distinct from Operational Work.
- Operational Work is Projects -> Deliverables -> Tasks.
- Projects are the primary operational container.
- Deliverables must belong to a project.
- Simple work can start directly as a project without a campaign.
- Projects may support one or more campaigns, but they do not have to.
- Programs / Content Streams are recurring operational rhythms and should not be modeled as campaigns by default.
- Weekly Podcast and Weekly Sermon Clips are Programs / Content Streams, even when an episode or clip supports a campaign or sermon series.

## Use Cases

- Easter
- Christmas
- Sermon arcs
- Capital campaigns
- Major church-wide initiatives
- Multi-department promotion efforts
- VBS Promotion
- Summer Camps
- Series Support

## Campaign Value

- Visibility across related projects.
- Coordination across teams and departments.
- Reporting by large initiative.
- Asset grouping across many projects.
- Shared context for timelines and messaging.
- Strategic goals that can flow into project briefs and deliverable briefs.

## Not Campaigns By Default

- Weekly Podcast
- Weekly Sermon Clips
- Recurring newsletters
- Ongoing social media rhythms

These are Programs / Content Streams unless a specific time-bound strategic push turns part of the work into campaign support.

## Open Questions

- Are campaigns MVP or early post-MVP?
- What campaign fields are required?
- Should campaigns have high-level planning tasks later?
- Should Programs / Content Streams be first-class records in MVP or represented through templates/tags initially?

## Notes

- Campaigns should help organize strategic efforts without forcing every project into a parent container.
- A project may have a primary operational home while also supporting campaign context through tags or future relationships.
- Goal alignment details are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.

Last Updated: 2026-05-29
