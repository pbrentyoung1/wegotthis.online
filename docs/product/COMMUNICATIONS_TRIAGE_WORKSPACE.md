# Communications Triage Workspace

## Purpose

Define the Communications Triage Workspace: the screen where a Communications Lead or Project Owner turns a submitted ministry request into a practical creative plan.

This workspace is the bridge between need-first intake and project execution.

It should help Communications absorb the complexity of requests, missing details, suggested channels, timelines, approvals, files, and scope decisions without forcing department leaders to know the final production strategy.

## Design Foundation

The MVP should use Inspinia-created assets and established Inspinia layout patterns as much as possible.

The goal is not to redefine the UI system. The goal is to apply ForWorship Creative product behavior to stable, familiar structures.

Use Inspinia patterns for:

- Dashboard cards.
- Stat cards.
- Tables.
- Detail panels.
- Tabs.
- Accordions.
- Timeline/activity lists.
- Chat/conversation views.
- Messaging/inbox views.
- Comment threads.
- Notification/message badges.
- Badges.
- Alerts.
- Forms.
- Modals.
- Offcanvas or side panels where already available.
- File list patterns.
- User/avatar lists.
- Progress indicators.

Avoid custom UI unless an existing Inspinia pattern cannot support the behavior.

The product should remain calm, simple, and structurally stable. Custom interface work should be deferred unless it directly improves clarity or removes friction.

## Core Product Principle

Department leaders define the need. Communications defines the plan. The system helps both sides understand each other.

The triage workspace should help Communications move from:

> We need to promote VBS.

To:

> This should become a VBS Promotion project with a parent email, volunteer recruitment email, social post series, announcement slide, website update, bulletin/newsletter blurb, and optional short video if timing and assets allow.

## Primary Users

### Communications Lead

The primary user for triage.

Needs:

- Clear view of incoming requests.
- Fast understanding of ministry need.
- Ability to identify missing information.
- Ability to shape scope.
- Ability to choose or reject suggested channels.
- Ability to create a project and deliverables without duplicate data entry.
- Ability to communicate expectations back to the requester.

### Project Owner

May perform triage when delegated.

Needs:

- Similar tools as Communications Lead, limited to assigned scope.

### Department Leader / Requester

Not the primary user of the triage workspace, but may see a simplified follow-up or plan summary.

Needs:

- Reassurance that the request was received.
- Clear questions when more information is needed.
- Simple explanation of the communications plan.
- No exposure to unnecessary internal production complexity.

## Workspace Goals

The triage workspace should help Communications:

- Review ministry need.
- Understand audience and desired action.
- See timing and urgency.
- Review requester ideas without treating them as commitments.
- Identify missing or risky information.
- Decide whether the request becomes project work.
- Build a creative plan.
- Accept, modify, decline, or defer suggested deliverables.
- Decide whether the work belongs inside a campaign.
- Create project, deliverables, suggested tasks, and review assignments.
- Preserve the original request history.
- Communicate with the requester in context using Inspinia conversation, chat, messaging, and activity patterns.

## What This Workspace Is Not

The triage workspace is not:

- A full project management board.
- A design production screen.
- A replacement for the project workspace.
- A custom strategy-builder interface for MVP.
- A place for requesters to manage the production plan.

It is a decision and translation workspace.

## MVP Layout Recommendation

Use an Inspinia dashboard/detail page structure.

Recommended layout:

```text
Page Header
  - Request title
  - Request status badge
  - Ministry / department
  - Submitted date
  - Primary action buttons

Top Summary Row
  - Ministry Need card
  - Timing card
  - Missing Info card
  - Recommended Next Step card

Main Content
  Left / Main Column
    - Ministry Brief card
    - Suggested Channels / Requester Ideas card
    - Creative Plan Builder card
    - Approved Deliverables table
    - Missing Information card

  Right / Side Column
    - Request Metadata card
    - Requester / Stakeholders card
    - Files / Links card
    - Conversation / Clarification card
    - Activity History card

Footer / Action Area
  - Ask for clarification
  - Accept request
  - Defer
  - Decline
  - Convert to project
```

Use responsive Inspinia behavior. On smaller screens, side-column cards should stack below the main content.

## Page Header

Use a standard Inspinia page title/header pattern.

Display:

- Request title.
- Status badge: Draft, Submitted, Needs Clarification, In Triage, Accepted, Deferred, Rejected, Converted, Archived.
- Ministry or department.
- Primary contact.
- Submitted date.
- Priority or urgency badge if available.

Primary actions:

- Ask a question in the request conversation.
- Convert to Project.
- Convert to Campaign.
- Convert to Initiative.

Only show actions allowed by the current user role and request status.

## Top Summary Cards

Use Inspinia dashboard/stat cards.

### Ministry Need Card

Summarize the request in one or two sentences.

Example:

> Children’s Ministry needs to promote VBS to parents, children, volunteers, and the wider church before registration closes.

### Timing Card

Show the most important date signals:

- Event date.
- Registration deadline.
- Requested due date.
- Internal recommended planning date where available.

### Missing Info Card

Show a count and short list of missing or risky information.

Examples:

- Registration link missing.
- Volunteer role descriptions needed.
- Final cost not confirmed.
- Video participants not identified.

### Recommended Next Step Card

Show one calm recommendation.

Examples:

- Ready for triage.
- Ask requester for missing details.
- Build creative plan.
- Ready to convert to project.
- Consider merging with existing Easter campaign.

This should feel helpful, not commanding.

## Ministry Brief Card

Use an Inspinia card with grouped fields, not a custom form surface.

Display:

- Ministry need.
- Why it matters.
- Audience.
- Desired action.
- Desired tone or feeling.
- Key message.
- Key dates.
- Existing assets.
- Known constraints.
- Sensitivities or pastoral concerns.

This card should show a clean summary first, with expandable details if needed.

## Suggested Channels / Requester Ideas Card

Requester ideas should be clearly labeled as ideas, not final deliverables.

Use badges, pills, or a small table.

Examples:

| Idea | Source | Triage Decision | Notes |
|---|---|---|---|
| Video | Requester | Later | Useful if time/assets allow. |
| Social posts | Requester | Accepted | Needed for registration reminders. |
| Bulletin blurb | Requester | Accepted | Add to weekly communication. |
| Parent email | System suggestion | Accepted | Direct audience. |

Supported triage decisions:

- Suggested.
- Accepted.
- Modified.
- Declined.
- Later.

These decisions should not create production deliverables until the user confirms the creative plan or converts the request to a project.

## Creative Plan Builder Card

Use existing Inspinia card, tabs, tables, forms, and buttons. Do not invent a custom canvas for MVP.

The Creative Plan Builder should allow Communications to define:

- Project title.
- Project owner.
- Related campaign, optional.
- Scope summary.
- In-scope work.
- Out-of-scope work.
- Approved deliverables.
- Suggested tasks.
- Review assignments.
- Key dates.
- Missing information to resolve.

Recommended tabs:

1. Plan Summary
2. Deliverables
3. Timeline
4. Approvals
5. Missing Info

### Plan Summary Tab

Fields:

- Proposed project title.
- Project owner.
- Campaign, optional.
- Department/ministry.
- Audience.
- Desired action.
- Scope summary.
- Communication approach.
- Notes to requester.

### Deliverables Tab

Use an Inspinia table.

Columns:

| Deliverable | Type | Source | Status | Owner | Due Date | Approval Needed | Actions |
|---|---|---|---|---|---|---|---|

Actions:

- Add deliverable.
- Accept suggestion.
- Modify suggestion.
- Decline suggestion.
- Mark later.
- Remove from plan.

Each deliverable row may expand or open a modal/side panel for type-specific details.

### Timeline Tab

Use a table or timeline component if Inspinia provides one.

Show:

- Event date.
- Public announcement date.
- Registration deadline.
- Internal production due dates.
- Review dates.
- Publish/send/print/install dates.

The MVP can support manual dates. Automated lead-time calculation can come later.

### Approvals Tab

Use an Inspinia table or list.

Columns:

| Review Type | Required | Reviewer | Applies To | Due Date | Notes |
|---|---|---|---|---|---|

Review types may include:

- Budget.
- Resources.
- Design.
- Brand.
- Content.
- Ministry.
- Final.

Approval assignments should be suggestions during triage. They become real review assignments after conversion.

### Missing Info Tab

Use a checklist/table pattern.

Columns:

| Item | Needed From | Blocks Work? | Status | Action |
|---|---|---|---|---|

Actions:

- Ask requester.
- Mark resolved.
- Mark not needed.
- Add note.

Missing information should not always block conversion. The Communications Lead should decide whether the request can move forward with known gaps.

## Approved Deliverables Table

This may be part of the Creative Plan Builder or a separate card.

Use Inspinia table patterns.

For MVP, avoid a custom drag-and-drop strategy board.

Rows should show:

- Deliverable name.
- Type.
- Purpose.
- Owner.
- Due date.
- Publish/send/show/print/install date.
- Approval requirement.
- Source: requester idea, system suggestion, manually added.
- Status: draft plan, accepted, modified, declined, later.

## Conversation / Clarification Card

Use Inspinia chat, conversation, or messaging assets where available.

This card is for human conversation around the request, especially clarification between Communications and the requester.

It should support:

- Threaded or chronological request conversation.
- Clarification questions.
- Requester responses.
- Internal-only comments where permission allows.
- Review-visible or requester-visible comments where appropriate.
- Mentions where supported.
- Message timestamps.
- Sender identity and avatar.
- Attachments or linked files where supported by the selected Inspinia pattern.

This card should not be treated as the activity feed. It is human conversation.

Recommended MVP behavior:

- Show requester-visible clarification conversation by default.
- Allow internal notes only for authorized internal roles.
- Clearly distinguish internal notes from requester-visible messages.
- Use existing Inspinia chat/messaging components rather than creating a custom conversation UI.

## Messaging / Inbox Pattern

Where Inspinia provides messaging or inbox-style assets, use those patterns for request follow-up queues.

Potential MVP uses:

- Requests needing clarification.
- New requester responses.
- Mentions.
- Assigned triage conversations.
- Recent project/request messages.

Do not build a fully custom messaging platform in MVP. The goal is contextual communication, not a separate chat product.

## Files / Links Card

Use existing Inspinia file list or attachment pattern.

Show:

- Uploaded files.
- External links.
- Registration links.
- Previous project references.
- Theme assets.
- Photos.
- Logos.

For MVP, this can remain a simple list with file role badges.

## Activity History Card

Use an Inspinia timeline/activity pattern.

Show operational history, such as:

- Request submitted.
- Clarification requested.
- Requester responded.
- Triage started.
- Suggested channel accepted/modified/declined.
- Creative plan updated.
- Request accepted.
- Request converted to project.

This should be visible operational history, not human conversation and not the protected audit log.

## Communication Separation

Keep these concepts distinct:

| Concept | Meaning | Recommended Inspinia pattern |
|---|---|---|
| Conversation / comments | Human discussion in context. | Chat, conversation, comments, or messaging asset. |
| Clarification | Request-specific questions and answers. | Conversation thread plus missing-info checklist. |
| Messages / inbox | Queue of conversations needing attention. | Messaging or inbox asset. |
| Activity history | Visible operational history. | Timeline/activity feed asset. |
| Audit log | Protected system record. | Admin table/log view, not requester-facing. |
| Notifications | Alerts that action is needed. | Notification badges/dropdowns/toasts where appropriate. |

Do not collapse all of these into generic comments. The user experience should make it clear whether something is a conversation, an action-needed message, an activity record, or an audit event.

## Clarification Workflow

Communications should be able to ask targeted questions from triage.

The system should support:

- Ask one or more questions.
- Tie questions to missing info items.
- Notify requester.
- Preserve requester responses in the conversation and clarification history.
- Update missing information status when resolved.

Requester-facing language should be calm and helpful.

Example:

> A few details will help us shape the best communication plan.

Not:

> Required information missing.

## Convert Workflow

When Communications converts a request, first choose Project, Campaign, or Initiative, then show the appropriate setup preview.

Preview should include:

- Project title.
- Campaign, if any.
- Project owner.
- Department/ministry.
- Audience and desired action.
- Approved deliverables.
- Suggested tasks.
- Approval assignments.
- Known missing info.
- Source request link.

Actions:

- Convert now.
- Save creative plan.
- Return to triage.

Conversion should:

- Preserve the original request.
- Create the selected Project, Campaign, or Initiative.
- Create a Project as part of conversion when the selected Campaign or Initiative needs immediate operational work.
- Create approved deliverables.
- Optionally create suggested tasks.
- Optionally create suggested review assignments.
- Link all created objects back to the request.
- Set request status to Converted and link it to the selected conversion target.
- Set project status to Intake, Discovery, Approved, or Planned depending on triage decision.

Default MVP recommendation:

- If scope is still being clarified: project status = Discovery.
- If scope and ownership are clear but work has not begun: project status = Approved or Planned.

Lightweight Campaign and Initiative conversion targets are in MVP scope. Their full planning modules remain deferred; operational execution still flows through Projects -> Deliverables -> Tasks.

## Inspinia MVP UI Guidance

MVP implementation should rely on Inspinia-created assets and structural patterns.

Recommended mapping:

| Product need | Use Inspinia pattern |
|---|---|
| Triage landing page | Dashboard/list page |
| Incoming requests | Table/list with badges |
| Request detail | Detail page with cards |
| Summary metrics | Stat cards |
| Ministry brief | Card with grouped fields |
| Suggested ideas | Table, badges, pills |
| Creative plan sections | Tabs inside card |
| Deliverables | Data table |
| Timeline | Timeline/list/table |
| Approvals | Table/list |
| Missing info | Checklist/table |
| Clarification questions | Chat/conversation thread plus modal or side panel |
| Requester follow-up | Messaging/inbox pattern |
| Internal notes | Comments/thread pattern with visibility marker |
| Convert preview | Modal or review page |
| Activity history | Timeline/activity feed |
| Notifications | Notification badges/dropdowns/toasts |
| Files | File list/attachment card |

Avoid in MVP:

- Custom drag-and-drop strategy canvases.
- Custom workflow diagram builders.
- Over-designed intake visualization.
- Complex animated planning flows.
- Fully custom project board UI.
- Fully custom chat or messaging UI when Inspinia assets already exist.
- Rebuilding components Inspinia already provides.

## User-Facing Copy Guidelines

Use partner language.

| Avoid | Prefer |
|---|---|
| Required fields missing | A few details will help the team move faster. |
| Invalid request | This may need a little more clarity before we can plan it. |
| Deliverable rejected | Not part of this project. |
| You cannot do this | This action is limited to the project owner or Communications Lead. |
| Approval failed | This still needs one more approval. |
| Convert immediately | Review and create project. |

## Permissions

Recommended MVP permissions:

| Action | Roles |
|---|---|
| View submitted requests | Organization Admin, Communications Lead, limited Project Owner if assigned |
| Review request and ask questions | Organization Admin, Communications Lead, Project Owner if delegated |
| Edit ministry brief summary | Communications Lead, Project Owner if delegated |
| Add/modify creative plan | Communications Lead, Project Owner if delegated |
| Accept/decline requester ideas | Communications Lead, Project Owner if delegated |
| Ask clarification questions | Communications Lead, Project Owner if delegated |
| Add internal triage note | Organization Admin, Communications Lead, Project Owner if delegated |
| View internal triage note | Organization Admin, Communications Lead, Project Owner if delegated |
| Send requester-visible message | Organization Admin, Communications Lead, Project Owner if delegated |
| Accept/defer/reject request | Organization Admin, Communications Lead |
| Convert request to project | Organization Admin, Communications Lead, Project Owner if delegated |
| View requester-facing plan summary | Requester, Viewer, Reviewer, or Department Leader according to scope |

Requester access should remain simple and limited. Requesters should not manage the internal creative plan unless they have an internal role that allows it.

## Data Needs

The triage workspace implies these data concepts:

- Request.
- Request answers.
- Ministry brief summary.
- Request ideas / suggested channels.
- Missing information items.
- Clarification questions and responses.
- Conversation messages.
- Message visibility scope.
- Internal notes.
- Activity events.
- Notifications.
- Creative plan.
- Proposed deliverables.
- Proposed tasks.
- Proposed review assignments.
- Conversion record linking request to project.

Open implementation question:

- Should Creative Plan be a persistent database object, or structured project setup data stored on the request until conversion?

MVP recommendation:

- Store enough structured creative plan data on the request or related triage tables to support review, conversion, and history.
- Avoid over-building a separate full creative planning module until the workflow is proven.

## MVP Acceptance Criteria

The MVP triage workspace is successful when a Communications Lead can:

- Open a submitted request.
- Understand the ministry need within one minute.
- See requester ideas without treating them as required deliverables.
- Identify missing information.
- Ask clarification questions.
- Maintain conversation history using Inspinia communication patterns.
- Distinguish conversation, internal notes, activity history, and notifications.
- Build a simple creative plan.
- Accept, modify, decline, or defer suggested deliverables.
- Add approved deliverables manually.
- Preview the project setup.
- Convert the request into a project with deliverables.
- Preserve the original request and triage decisions.

The requester should be able to:

- Submit a request without knowing the final deliverable mix.
- Receive clarification questions.
- Respond in context.
- See a simple plan summary when Communications is ready to share it.
- Avoid being exposed to unnecessary production complexity.

## Related Docs

- `docs/product/PROJECT_TASK_MODULE.md`
- `docs/product/REQUEST_LIFECYCLE.md`
- `docs/product/PROJECT_MANAGEMENT.md`
- `docs/product/DELIVERABLES.md`
- `docs/product/TASKS.md`
- `docs/product/COMMUNICATIONS_SYSTEM.md`
- `docs/product/MESSAGES_AND_ACTIVITY.md`
- `docs/technical/AUTH_AND_PERMISSIONS.md`
- `docs/INSPINIA.md`

Last Updated: 2026-05-29
