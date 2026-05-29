# Deliverables

## Purpose

Define deliverables as the specific outputs produced inside projects.

Deliverables are the primary production and approval units in ForWorship Creative.

## Current Decisions

- Deliverables are the primary production and approval units.
- Deliverables must belong to a project.
- Deliverables do not stand alone.
- Projects may have many deliverables.
- Deliverables may have their own due dates, lifecycle stages, approvals, files/assets, briefs, readiness checks, budgets, and tasks.
- Deliverable briefs should inherit relevant project and strategic context while becoming more specific about channel, audience, content, specifications, timing, approvals, and production tasks.
- Most approvals should attach to deliverables in MVP.
- The canonical deliverable lifecycle is documented in `docs/product/DELIVERABLE_LIFECYCLE.md`.

## Canonical Deliverable Lifecycle

The canonical lifecycle is:

```text
Proposed
  -> Planning
    -> In Production
      -> Ready for Review
        -> In Review
          -> Revision, if needed
            -> Ready for Review
          -> Approved
            -> Delivery
              -> Published / Running
                -> Ended
                  -> Archived
```

## Lifecycle Notes

- Deliverables may have their own lifecycle stage independent of project status.
- Approval logic primarily belongs to deliverables.
- Proposed means the deliverable idea exists but has not yet been approved for planning.
- Planning means the deliverable brief, timeline, tasks, approval route, budget/vendor needs, and readiness requirements are being shaped.
- In Production means production work is underway.
- Ready for Review means production work is complete enough to submit for review.
- In Review means stakeholders are reviewing, asking questions, approving, or requesting changes.
- Revision means changes were requested and the deliverable is being revised.
- Approved means required signoffs are complete or waived and the deliverable is ready to deliver.
- Delivery means approved work is being scheduled, uploaded, sent, installed, printed, handed off, or otherwise released.
- Published / Running means the deliverable is live, active, visible, sent, installed, distributed, or in use.
- Ended means the deliverable is no longer active and needs closeout.
- Archived means the deliverable is complete, documented, preserved, and searchable for future reuse.
- Deliverables should not force the whole project backward unless a Project Owner or Communications Lead chooses to move the project state.

## Status vs Readiness

Lifecycle status describes where the deliverable is.

Readiness and attention states explain what is holding it back.

Examples:

```text
Status: Planning
Attention: Waiting on budget approval
```

```text
Status: Delivery
Attention: Waiting on vendor proof
```

```text
Status: In Review
Attention: Waiting on ministry approval
```

Do not turn every readiness issue into a lifecycle status.

Readiness and dependency details are documented in `docs/product/DEPENDENCIES_AND_READINESS.md`.

## Deliverable Brief

Every deliverable should have a deliverable brief appropriate to its type.

A deliverable brief answers:

- What exactly is being made?
- Who is it for?
- What desired action should this output create?
- What key message, tone, or context should guide the work?
- What specs, dimensions, channel requirements, or file formats are needed?
- What source assets, copy, links, or references are approved?
- When is it due?
- When will it publish, print, show, install, send, or otherwise release?
- Who reviews it?
- Who approves it?
- Where do final files go?

## Deliverable Types

Deliverable Types should carry type-specific fields, readiness checks, TAT/SLA expectations, file requirements, approval needs, and task templates.

Examples:

- Social Post.
- Email.
- Video.
- Signage.
- Bulletin Insert.
- Sermon Slide.
- Podcast Audio.
- Show Notes.
- Website Update.
- Print Piece.
- Newsletter Blurb.

Key principle:

> Project Templates define the lineup. Deliverable Types define the production details.

## Fields Under Consideration

Core fields:

- Project ID.
- Title.
- Deliverable Type.
- Purpose.
- Deliverable brief.
- Audience.
- Desired action.
- Key message.
- Due date.
- Lifecycle status.
- Owner.
- Related assets/files.
- Tasks.
- Approval requirements.
- Publish/send/show/print/install/delivery date.
- End date, if applicable.
- Closeout requirements.

Type-specific fields may include:

- Channel/platform.
- Size/specs.
- File format.
- Runtime/length.
- Quantity.
- Vendor.
- Budget/cost.
- Installation location.
- Hashtags.
- CTA/link.
- Email audience/list.
- Print in-hand date.
- Review version.
- Final file location.
- Source file location.

## Approval Notes

- MVP should focus on deliverable approval.
- Intake approval is different from deliverable approval.
- Proposed deliverables are approved into Planning by a Project Owner, Communications Lead, or authorized internal role.
- Deliverable approval happens primarily during In Review.
- A deliverable may have multiple review assignments, such as Budget, Resources, Design, Brand, Content, Ministry, and Final.
- A deliverable becomes Approved only when all required review assignments are approved or explicitly waived by an authorized internal role.
- Optional review assignments can add context without blocking approval.
- Approval status applies to a specific deliverable or element version where versioning matters.
- Deliverable approval requests, approval notes, reviewer feedback, requested changes, and approval completion should be captured in project or deliverable communication history.
- Approval notifications should link back to the relevant deliverable context.
- External Reviewer access to deliverables should use narrow, time-bound magic links rather than general workspace accounts.

## Closeout Notes

- Published / Running is not the final state.
- Ended exists so deliverables can be closed out after they are no longer active.
- Ended may generate archive, documentation, vendor/payment, review, file storage, and reuse tasks.
- Archived means the deliverable is complete, documented, preserved, and searchable for future reuse.

## Open Questions

- What deliverable types are required for the first pilot?
- Which deliverable types need readiness checklist templates in MVP?
- Which deliverable types need TAT/SLA defaults in MVP?
- Should deliverable comments support internal-only and review-visible visibility?
- Which deliverable closeout requirements should be required vs recommended?

## Notes

- Deliverables sit between projects and tasks in the operational model: Projects -> Deliverables -> Tasks.
- Campaigns, initiatives, programs/content streams, sermon series, seasons, ministry areas, topics, and tags are strategic context, not replacements for the required parent project.
- A deliverable may support multiple strategic contexts through its project context, tags, or future relationships, but it still belongs operationally to one project in MVP.
- Communications system details are documented in `/docs/product/COMMUNICATIONS_SYSTEM.md`.
- Goal alignment details are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.
- External access boundaries are documented in `/docs/architecture/maps/security/external-access-scope-map.md`.

Last Updated: 2026-05-29
