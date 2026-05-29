# Conversations, Messages, Activity, and Audit

## Purpose

Define how ForWorship Creative should handle communication, direct messages, project discussions, deliverable conversations, review comments, change requests, activity history, notifications, and audit records.

The goal is to preserve project memory without recreating Slack.

## Core Principle

The project remembers what people forget.

Conversations should stay close to the work they are about.

The system should capture decisions, questions, approvals, change requests, and key discussions so they do not disappear into email, text messages, hallway conversations, disconnected chats, or someone’s memory.

## Not Slack

ForWorship Creative should not try to become a general-purpose chat platform.

Avoid:

- Endless public channels.
- Meme/chat culture as a core product behavior.
- Organization-wide chat rooms unrelated to work.
- Notification overload.
- Real-time chat as the center of the product.

Prefer:

- Project-context conversations.
- Deliverable-context conversations.
- Review conversations.
- Change request conversations.
- Direct messages that can be tied to work.
- Dashboard/inbox visibility for messages that need attention.
- Searchable project memory.

## Communication Types

The system should distinguish several communication/history types.

| Type | Purpose |
|---|---|
| Direct Message | Person-to-person or small group message, optionally tied to a Project or Deliverable. |
| Project Discussion | Conversation attached to a Project. |
| Deliverable Discussion | Conversation attached to a Deliverable. |
| Review Comment | Comment tied to a review assignment or version. |
| Change Request | Actionable requested update with requester, timestamp, status, and resolution. |
| Activity Feed | System-generated operational history. |
| Audit Log | Protected record for security, accountability, and access events. |
| Notification | Alert that someone needs to see or do something. |

Do not collapse these into one generic comments bucket.

## Direct Messages

Direct Messages should exist, but they should remain work-context focused.

A Direct Message may be:

- One-to-one.
- Small group.
- Tied to a Project.
- Tied to a Deliverable.
- Tied to a review, change request, or asset.
- General but still within the organization workspace.

## Dashboard / Inbox Behavior

Direct Messages should show on the user dashboard or inbox when they need attention.

Examples:

- New DM from Communications Manager.
- Message mentioning the user.
- Message tied to a Project the user owns.
- Message tied to a Deliverable assigned to the user.
- Message requesting a reply or decision.

A dashboard should surface message summaries without making chat the main product.

## Direct Messages Inside Projects

If a Direct Message is related to a Project, it should be attachable to that Project.

This allows a discussion to appear:

- In the recipient’s dashboard/inbox.
- In the Project’s discussion history.

Example:

```text
Direct Message:
From: Communications Manager
To: Children’s Pastor
Project: Promote VBS
Message: Can you confirm whether registration opens May 1 or May 8?
```

This message should appear in both:

- The Children’s Pastor’s inbox/dashboard.
- The Promote VBS Project discussion history.

## Direct Messages Inside Deliverables

If a Direct Message is related to a Deliverable, it should be attachable to that Deliverable and roll up to the Project.

Example:

```text
Direct Message:
From: Designer
To: Communications Manager
Deliverable: VBS Instagram Post
Message: I need the final registration link before I can schedule this.
```

This message should appear in:

- The Communications Manager’s inbox/dashboard.
- The VBS Instagram Post deliverable conversation.
- The parent Project’s communication history.

## Project Discussions

Project Discussions are conversations attached to the Project as a whole.

Use for:

- Scope clarification.
- Timeline decisions.
- Budget/resource questions.
- Stakeholder alignment.
- Capacity conversations.
- Project-level updates.
- General discussion not tied to one deliverable.

## Deliverable Discussions

Deliverable Discussions are conversations attached to a specific output.

Use for:

- Copy questions.
- Design feedback.
- File questions.
- Production notes.
- Delivery questions.
- Scheduling questions.
- Asset questions.

Deliverable discussions should roll up into Project memory.

## Review Comments

Review comments are tied to:

- Review assignment.
- Reviewer.
- Review version.
- Deliverable.
- Review stage.

Review comments may generate change requests, but not every comment is a change request.

Example:

```text
Comment: Looks good to me.
Status: Commented
No change request created.
```

```text
Comment: Please change the event date to June 12.
Status: Changes Requested
Change request created.
```

## Change Requests

Change requests are actionable and must record:

- Who requested the change.
- When it was requested.
- Which deliverable/version it applies to.
- What was requested.
- Current status.
- Resolution details.

Change requests are documented in `docs/product/APPROVALS_AND_REVIEW_WORKFLOW.md`.

## Activity Feed

The Activity Feed is system-generated operational history.

Examples:

- Project created.
- Project moved to Scheduled.
- Deliverable moved to In Review.
- Review requested.
- File attached.
- Asset linked.
- Task completed.
- Budget updated.
- Deadline changed.
- User assigned.
- Change request resolved.

Activity feeds should be readable by humans and helpful for reconstructing what happened.

## Audit Log

The Audit Log is a protected system/accountability record.

Examples:

- Magic link created.
- Magic link used.
- External reviewer accessed deliverable.
- Permission changed.
- User role changed.
- Approval waived.
- Review link revoked.
- Sensitive asset visibility changed.

Audit logs should not be treated as casual conversation.

## Notifications

Notifications are alerts, not history.

A notification may point to:

- Direct Message.
- Project discussion.
- Deliverable discussion.
- Review request.
- Change request.
- Task assignment.
- Due-soon item.
- Blocker.

Once a notification is read or dismissed, the underlying conversation/activity remains attached to the work.

## Message Visibility

Conversations need visibility scopes.

Recommended visibility scopes:

| Visibility | Purpose |
|---|---|
| Private DM | Visible only to message participants and authorized admins if policy allows. |
| Project Team | Visible to people assigned to or participating in the Project. |
| Internal Only | Visible only to Communications/internal team members. |
| Stakeholder Visible | Visible to stakeholders/reviewers. |
| External Reviewer Visible | Visible through scoped review link. |
| Requester Visible | Visible to requester/department leader. |

The UI should make visibility clear before a message is sent.

## Private DMs and Project Memory

A Direct Message that is not attached to a Project or Deliverable should remain a private/direct conversation.

A Direct Message attached to a Project or Deliverable becomes part of that work’s communication history according to its visibility scope.

The sender should understand when a message is being saved to Project memory.

Suggested UI language:

> Save this message to the Project discussion?

or:

> This message will also appear in the Project history.

## Mentions

Mentions should notify users and connect discussion to action.

Examples:

- Mention a designer in a deliverable discussion.
- Mention a department leader in a project question.
- Mention a reviewer in an approval thread.

MVP can support simple mentions later if scope allows.

## Threads

MVP should keep threading simple.

Recommended:

- Conversations can have messages.
- Messages can optionally have replies later.
- Review comments and change requests can act as focused discussion anchors.

Defer full Slack-style threaded chat unless usage proves the need.

## Attachments in Messages

Messages may include attachments or links.

Attachments should follow the Google Drive-first / external-link-first strategy.

Examples:

- Google Drive file.
- Google Drive folder.
- Asset Library item.
- Canva link.
- Figma link.
- Vendor proof link.

See `docs/technical/GOOGLE_DRIVE_INTEGRATION.md` and `docs/product/ASSET_LIBRARY.md`.

## Inbox / Dashboard

Dashboard and inbox should show communication requiring attention.

Examples:

- Unread direct messages.
- Mentions.
- Review requests.
- Change requests.
- Questions waiting on response.
- Blocked items waiting on the user.
- Approvals due soon.

The dashboard should help the user answer:

> What needs my attention?

not:

> What is every conversation happening everywhere?

## Project Memory Rollup

A Project should preserve:

- Request conversations.
- Triage notes.
- Project discussions.
- Direct messages attached to the Project.
- Deliverable discussions.
- Review comments.
- Change request history.
- Activity feed.
- Closeout notes.

This supports future reuse, accountability, onboarding, and context recovery.

## MVP Recommendation

For MVP, include:

- Project discussions.
- Deliverable discussions.
- Basic direct messages.
- Direct messages attachable to Projects or Deliverables.
- Dashboard/inbox surfacing for unread or actionable messages.
- Basic visibility scopes.
- Activity feed for major system events.
- Review comments.
- Change request records.
- Project memory rollup.

If scope is tight, prioritize:

- Project discussion.
- Deliverable discussion.
- Review/change request comments.
- Activity feed.
- Dashboard notifications.

Direct messages may be MVP or early post-MVP depending on implementation capacity, but the data model should plan for them.

## Deferred

Defer:

- Slack-style channels.
- Organization-wide chat rooms.
- Real-time typing indicators.
- Reactions/emoji-first chat culture.
- Rich thread management.
- Advanced unread state logic.
- Full chat search across all DMs.
- Voice/video calls.

## Future Expansion

Future versions may add:

- Rich inbox.
- Mentions.
- Threaded replies.
- Pinned project decisions.
- Decision logs created from conversations.
- Conversation summaries.
- AI-assisted project memory summaries.
- External reviewer discussion portal.
- Message-to-task or message-to-change-request conversion.
- Advanced notification preferences.

## Related Docs

- `docs/product/APPROVALS_AND_REVIEW_WORKFLOW.md`
- `docs/product/DEPENDENCIES_AND_READINESS.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/DELIVERABLE_LIFECYCLE.md`
- `docs/product/ASSET_LIBRARY.md`
- `docs/technical/GOOGLE_DRIVE_INTEGRATION.md`
- `docs/product/USER_MODEL_AND_PROFILES.md`
- `docs/product/COMMUNICATIONS_SYSTEM.md`
- `docs/product/MESSAGES_AND_ACTIVITY.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-29
