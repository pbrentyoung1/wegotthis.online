# Search and Discovery

## Purpose

Define how ForWorship Creative helps users find Projects, Deliverables, Assets, messages, contacts, vendors, Campaigns, and institutional memory.

Search should support discovery, reuse, and context recovery without creating unnecessary clutter.

## Core Principle

Search is not primarily a security system.

Search is a companion feature that helps people find what exists, avoid duplicate work, recover context, and connect with the right person when they need help.

The system should streamline information rather than hide everything behind confusing permission walls.

If a user searches for something and receives no result because the item was filtered out, they may reasonably assume the item does not exist. That harms trust and creates duplicate work.

The search experience should distinguish between:

- No matching result exists.
- A matching result exists and can be opened.
- A matching result exists and the user may need to ask the owner or Communications for help.

## Search Philosophy

Search is part of project memory.

The product should help answer:

- Did we do something like this before?
- Where are the final files?
- Who owns this project?
- Was this approved?
- Which Drive folder has the source files?
- What assets came from last year’s VBS?
- Who requested that change?
- Where is the current brand logo?

Search should feel like asking a helpful teammate:

> I found something that may be what you need. Here is who owns it and where to go next.

## Discovery-Aware Access

Search results should not simply disappear because the user does not have full context or direct edit access.

Instead, results may appear in one of several practical states.

| State | Meaning |
|---|---|
| Open | User can open and use the result. |
| Limited Context | User can see enough to know the item exists and who/what it relates to. |
| Ask Owner / Ask Communications | User can contact the owner or Communications for help. |
| Hidden | Rare. Only for items where even showing existence would be inappropriate. |

Most work in this product is normal communications work, not highly sensitive security material. The default posture should be helpful discovery.

## Limited Context Pattern

When a user does not have full access, search may show safe, practical context such as:

- Title.
- Object type.
- Department or ministry.
- Owner/contact person.
- General status.
- Date/year.
- Tags.
- Helpful next step.

Example:

```text
VBS 2025 Promo Video
Deliverable
Children’s Ministry
Owner: Communications Team
Next step: Ask Communications for access or reuse guidance
```

Avoid exposing unnecessary private detail such as:

- Internal notes.
- Private messages.
- Budget details that do not help the searcher.
- Draft discussions that are not useful outside the work team.
- Sensitive child/minor details.

## Ask Owner / Ask Communications Behavior

When a result exists but the user needs help, the UI may offer:

- Ask Communications.
- Message owner.
- Contact project owner.
- Request access.
- View summary.

MVP may keep this simple with an “Ask Communications” or “Message owner” pattern.

Future versions may add a more formal access request workflow if real usage proves it is needed.

## Rare Hidden Results

Some items may still need to remain hidden from broad discovery.

Examples may include:

- Personnel-sensitive items.
- Pastoral care or confidential ministry projects.
- Legal/safety/policy-sensitive work.
- Restricted child/minor media.
- Crisis communications.
- Private executive work.

These are exceptions, not the primary model.

Possible values:

- Discoverable.
- Limited Context.
- Hidden.

## MVP Search Scope

MVP search should include:

- Projects.
- Deliverables.
- Assets.
- Campaigns.
- Tags.
- Departments.
- Contacts/vendors.
- Review/change request metadata, if feasible.
- Messages/discussions, limited/future if scope allows.

If scope is tight, prioritize:

- Projects.
- Deliverables.
- Assets.
- Tags.
- Contacts/vendors.

## Search Filters

Recommended filters:

- Object type.
- Department.
- Campaign.
- Project.
- Deliverable type.
- Asset type.
- Status.
- Date/year.
- Tag.
- Owner.
- Result state.

## Search Results

Search results should be grouped or labeled by object type.

Example sections:

- Projects.
- Deliverables.
- Assets.
- Campaigns.
- Contacts/Vendors.
- Messages/Discussions, future.

Each result should show enough context to be useful without overwhelming the user.

## Search Should Respect Role Philosophy

Roles are drawers and cupboards that organize work.

Search should support discovery without turning the entire workspace into a cluttered warehouse.

Default search can prioritize results most relevant to the user while still allowing broader discovery where appropriate.

Recommended behavior:

- Rank directly relevant/openable results higher.
- Include limited-context results lower or in a separate section.
- Allow filters for “Open” and “Ask Owner.”
- Keep language helpful, not restrictive.

## Technical Recommendation

Use PostgreSQL search first for MVP.

Do not add a dedicated search service unless usage requires it.

MVP may use:

- Indexed columns.
- PostgreSQL full-text search.
- Trigram search later if needed.
- Basic tag filtering.
- Metadata search for assets.

Future versions may add:

- Meilisearch.
- Typesense.
- Algolia.
- Elasticsearch/OpenSearch.
- AI-assisted search.

## Search Index Strategy

A future search index may normalize searchable content across object types.

Potential table:

```text
search_index
- id
- organization_id
- source_type
- source_id
- title
- summary
- searchable_text
- department_id, nullable
- campaign_id, nullable
- project_id, nullable
- deliverable_id, nullable
- asset_id, nullable
- owner_profile_id, nullable
- tags
- status
- result_state_hint
- search_visibility
- updated_at
```

MVP can query source tables directly if simpler.

A search index table may be useful later for:

- Performance.
- Cross-object search.
- Search weighting.
- AI summaries.
- External search service sync.

## Result State in Search Results

Search should calculate or store a result state for each result.

Example response:

```json
{
  "title": "VBS 2025 Promo Video",
  "type": "deliverable",
  "source_id": 123,
  "result_state": "limited_context",
  "can_open": false,
  "can_message_owner": true,
  "owner_name": "Communications Team",
  "summary": "Deliverable in Children’s Ministry project",
  "detail_url": null
}
```

## Asset Search

Asset search is especially important.

Users should be able to find:

- Event photos.
- Brand assets.
- Final deliverable files.
- Google Drive folders.
- Vendor files.
- Source files.
- Approved/public-use assets.
- Restricted/do-not-use assets, where permitted.

Asset search should use:

- Title.
- Description.
- Tags.
- Asset type.
- Asset category.
- Source.
- Department.
- Project.
- Deliverable.
- Event/date.
- Usage rights.
- Consent status.
- Storage provider.

## Message and Discussion Search

Message/discussion search may become powerful but should remain focused.

MVP may defer full message search.

If implemented, it should distinguish:

- Project discussions.
- Deliverable discussions.
- Review comments.
- Change requests.
- Direct messages.
- Internal comments.

Private DMs should not be broadly discoverable.

Internal comments should not appear in broad limited-context results unless they are intentionally surfaced.

## Search Result Language

Use helpful, clear language.

Examples:

- “This may be what you’re looking for.”
- “Ask Communications for access or reuse guidance.”
- “Message the project owner.”
- “You can view a summary.”
- “This file exists in the Asset Library.”

Avoid language that feels punitive or technical.

## MVP Recommendation

For MVP, include:

- PostgreSQL-first search.
- Basic search across Projects, Deliverables, Assets, Tags, and Contacts/Vendors.
- Discovery-aware search results.
- Limited-context result state.
- Ask Communications/message owner pattern.
- Rare hidden flag for exceptional sensitive records.
- Basic filters by object type, department, tag, date, and status.

Defer:

- Dedicated search service.
- AI-assisted search.
- Full message/DM search.
- Search inside file contents.
- Search inside Google Drive documents.
- Advanced ranking.
- Saved searches.
- Formal access request workflows.

## Future Expansion

Future versions may add:

- Search index table.
- Dedicated search engine.
- AI-assisted search and summaries.
- Search inside files/transcripts.
- Google Drive metadata search.
- Search suggestions.
- Saved searches.
- Duplicate asset detection.
- Related/similar asset discovery.
- Formal access request workflow if needed.

## Related Docs

- `docs/product/ASSET_LIBRARY.md`
- `docs/product/ROLES_AND_PERMISSIONS_MODEL.md`
- `docs/product/CONVERSATIONS_MESSAGES_ACTIVITY.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/DELIVERABLES.md`
- `docs/decisions/TAGS_ONLY_MVP.md`
- `docs/technical/SEARCH_STRATEGY.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-30
