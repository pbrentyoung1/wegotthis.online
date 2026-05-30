# Decision: Do Not Add a Content Stream Entity

## Status

Accepted.

## Date

2026-05-30

## Context

Recurring church communications work may include:

- Weekly podcast.
- Sermon clips.
- Weekly newsletter.
- Daily devotionals.
- Blog posts.
- Sermon series support.
- Announcements.
- Ongoing social media rhythms.

A possible `Content Stream` object was considered as a first-class model for recurring publishing rhythms.

## Decision

Do not add a separate `Content Stream` entity at this time.

Recurring content should be handled through the existing strategic hierarchy:

```text
Initiative
  -> Campaign
    -> Project
      -> Deliverable
        -> Task
```

If recurring content needs a container, create a Campaign or Initiative that describes the purpose of the recurring work.

Example:

```text
Campaign: Content Streams
Project: Weekly Podcast Episode 42
Deliverables:
- Edited audio
- Show notes
- Social post
- Newsletter blurb
```

Or:

```text
Campaign: Series Support
Project: Sermon Series Week 1
Deliverables:
- Sermon slides
- Notes PDF
- Social clips
- Email mention
```

## Rationale

The system should stay simple and aligned around purpose.

Adding a `Content Stream` object would create another hierarchy layer and increase cognitive noise.

The existing hierarchy is flexible enough to organize recurring content without introducing another concept.

The guiding principle is:

> Work should align to a purpose, not exist simply because content is being produced.

Recurring work can still be organized through Campaigns, Initiatives, Projects, Project Templates, Deliverable Types, and Tags.

## Implications

- No `content_streams` table in MVP.
- No Content Stream UI in MVP.
- No separate Content Stream permissions or dashboards.
- Recurring content should use Campaigns, Initiatives, Templates, and Tags.
- A Campaign may be named `Content Streams` if an organization wants a broad recurring-content container.
- Project Templates can still support recurring work such as podcast episodes, sermon clips, newsletters, and social rhythms.

## Future Reconsideration

A separate Content Stream entity may be reconsidered only if real usage proves that Campaigns, Initiatives, Templates, and Tags are insufficient.

Evidence might include:

- Recurring publishing workflows become hard to report on.
- Editorial calendar needs exceed the Campaign/Project model.
- Recurring content ownership differs significantly from campaign ownership.
- Templates and tags cannot support recurring series organization.

Until then, avoid adding the extra model.

## Related Docs

- `docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`
- `docs/product/CAMPAIGNS.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/DELIVERABLES.md`
- `docs/product/TEMPLATES.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-30
