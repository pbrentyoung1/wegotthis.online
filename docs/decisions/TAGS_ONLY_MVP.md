# Decision: Tags Only for Flexible Classification

## Status

Accepted.

## Date

2026-05-30

## Context

The product needs flexible classification across Projects, Deliverables, Assets, Campaigns, Departments, Events, Seasons, Sermon Series, Vendors, and recurring work.

Possible classification tools considered:

- Categories.
- Tags.
- Custom fields.
- Additional relationship models.

## Decision

Use Tags as the primary flexible classification mechanism in MVP.

Do not add separate Category or Custom Field systems in MVP unless a specific model already exists for a clear product reason.

## Rationale

Tags provide enough flexibility without adding another layer of product complexity.

The goal is to keep the system simple, searchable, and adaptable while avoiding a taxonomy-heavy structure that creates cognitive noise.

The system already has purpose-aligned objects:

```text
Initiative
  -> Campaign
    -> Project
      -> Deliverable
        -> Task
```

Tags should add lightweight classification, not replace strategic structure.

## Examples

Tags may include:

- Advent.
- Lent.
- VBS.
- Easter.
- Sermon Series.
- Podcast.
- Newsletter.
- Social Media.
- Baptism.
- Students.
- Children.
- Outreach.
- Campus North.
- Volunteer Recruitment.
- Testimony.
- Vendor.
- Print.
- Video.
- Photography.

## Taggable Objects

MVP/future taggable objects may include:

- Projects.
- Deliverables.
- Assets.
- Campaigns.
- Initiatives.
- Vendors/contacts, future.
- Departments, future if useful.

Tasks should generally inherit context from Deliverables and should not need heavy tagging in MVP.

## Tag Governance

Tags should remain flexible, but they should not become uncontrolled clutter.

Recommended guardrails:

- Organization-level tag list.
- Tag autocomplete.
- Ability for authorized users to merge duplicate tags later.
- Prefer existing tags before creating new ones.
- Avoid using tags to represent things that already have first-class fields, such as Department, Project status, Deliverable type, User role, or Skill.

## What Tags Should Not Replace

Tags should not replace:

- Department.
- Deliverable Type.
- Project lifecycle status.
- Deliverable lifecycle status.
- User roles.
- Skills.
- Budget fields.
- Capacity fields.
- Approval status.
- Asset usage rights.
- Consent status.

If something drives workflow, permission, reporting, or lifecycle behavior, it probably should not be only a tag.

## MVP Recommendation

For MVP, include:

- Tags table.
- Taggable/polymorphic relationship or equivalent join model.
- Tags available on Projects, Deliverables, Assets, Campaigns, and Initiatives where practical.
- Tag autocomplete.
- Basic tag filtering and search.

Defer:

- Custom fields.
- Complex category hierarchies.
- Tag permission rules.
- Tag analytics.
- Advanced tag governance.
- Tag merge UI.

## Future Expansion

Future versions may add:

- Tag merge/cleanup tools.
- Suggested tags.
- Tag groups.
- Tag usage reports.
- Admin-managed tag governance.
- AI-assisted tagging for assets.

## Related Docs

- `docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`
- `docs/product/CAMPAIGNS.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/DELIVERABLES.md`
- `docs/product/ASSET_LIBRARY.md`
- `docs/decisions/NO_CONTENT_STREAM_ENTITY.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-30
