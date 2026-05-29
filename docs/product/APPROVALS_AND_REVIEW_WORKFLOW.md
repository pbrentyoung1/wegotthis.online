# Approvals and Review Workflow

## Purpose

Define how ForWorship Creative handles deliverable review, internal quality control, stakeholder approval, revision rounds, change requests, and review-related conversation history.

Approvals should protect quality, preserve accountability, and keep the conversation around a deliverable attached to the project record.

## Core Principle

Deliverables should pass through an internal quality gate before they are sent to stakeholders for approval.

The goal is to avoid sending work for ministry or stakeholder signoff when it still has basic typos, brand/design issues, missing files, broken links, formatting problems, or preventable quality concerns.

The system should help Communications send work that is ready for meaningful stakeholder review.

## Change Request Accountability Principle

Every requested change or update must preserve who requested it, when it was requested, what version or deliverable it applies to, what was requested, and whether it has been resolved.

Change requests are part of project memory and should not live only in email, hallway conversations, text messages, or disconnected chat threads.

## Two-Stage Approval Model

MVP should support a simple two-stage review model:

```text
Internal Quality Review
  -> Stakeholder Review
    -> Approved
```

The deliverable lifecycle status may remain `In Review`, while review assignments underneath the status determine whether the work is in internal quality review, stakeholder review, or final approval.

Do not create a separate lifecycle status for every approval type in MVP.

## Internal Quality Review

### Purpose

Internal Quality Review is the Communications-side review that happens before stakeholder review.

It may include:

- Proofreading.
- Brand/design review.
- Technical readiness.
- Message clarity.
- File/spec review.
- Link check.
- Communications Manager approval.

### Goal

Internal Quality Review ensures the work is ready to show to stakeholders.

Stakeholders should not be asked to review basic quality issues the Communications team already knows how to catch.

### Exit gate

Stakeholder Review should not begin until required Internal Quality Review assignments are approved or waived by an authorized internal role.

## Stakeholder Review

### Purpose

Stakeholder Review is where ministry leaders, department owners, executive leaders, or other authorized stakeholders review the deliverable for accuracy, usefulness, alignment, and final signoff.

Stakeholder Review may include:

- Ministry accuracy.
- Message approval.
- Strategic alignment.
- Content approval.
- Budget/resource approval where relevant.
- Final go/no-go approval.

### Exit gate

A deliverable may move to `Approved` only when all required stakeholder review assignments are approved or explicitly waived by an authorized internal role.

## Review Assignments

Each deliverable can have one or more Review Assignments.

Recommended fields:

| Field | Purpose |
|---|---|
| Review Type | Proofreading, Brand/Design, Ministry, Final, etc. |
| Review Stage | Internal Quality Review, Stakeholder Review, Final Approval. |
| Reviewer | Person, role, or external reviewer. |
| Required | Required or optional. |
| Sequence | Order of review where needed. |
| Status | Pending, Approved, Changes Requested, Waived, Canceled, Superseded. |
| Due Date | Review deadline. |
| Version | File/version being reviewed. |
| Notes | Context for the reviewer. |

## Recommended MVP Review Types

| Review Type | Typical Stage | Purpose |
|---|---|---|
| Proofreading | Internal Quality Review | Typos, grammar, basic copy accuracy. |
| Brand/Design | Internal Quality Review | Visual quality and brand alignment. |
| Technical Readiness | Internal Quality Review | Specs, links, uploads, file format, platform readiness. |
| Communications Manager | Internal Quality Review | Overall quality gate before stakeholder review. |
| Ministry Review | Stakeholder Review | Ministry accuracy and usefulness. |
| Content Approval | Stakeholder Review or Internal Quality Review | Message/content approval. |
| Budget Approval | Stakeholder Review or Internal Quality Review | Cost or spending approval. |
| Legal/Safety/Policy | Stakeholder Review or Internal Quality Review | Sensitive content, liability, permission, safety, or policy concerns. |
| Final Approval | Final Approval | Final permission to deliver. |

## Review Assignment Statuses

Recommended statuses:

| Status | Meaning |
|---|---|
| Pending | Waiting for reviewer action. |
| Approved | Reviewer approved the submitted version. |
| Changes Requested | Reviewer requested changes. |
| Commented | Reviewer commented without approving or requesting changes. |
| Waived | Required review was waived by an authorized internal role. |
| Canceled | Review is no longer needed. |
| Superseded | A newer version or review request replaced this one. |

## Change Requests

A change request is a specific request to revise, update, correct, or alter a deliverable.

A change request may come from:

- Internal Quality Review.
- Stakeholder Review.
- Final Approval.
- Project Owner.
- Communications Lead.
- External Reviewer through a scoped review link.

### Required change request data

Every change request should record:

| Field | Purpose |
|---|---|
| Requested By | Person or external reviewer who requested the change. |
| Requested At | Date/time the change was requested. |
| Deliverable | Deliverable the change applies to. |
| Version | File/content/version being reviewed when the request was made. |
| Review Assignment | Related review assignment, if applicable. |
| Revision Round | Review/revision round number. |
| Change Summary | Short description of requested change. |
| Change Detail | Full notes, comments, or requested update. |
| Priority | Optional urgency/importance. |
| Visibility | Internal, project team, stakeholder-visible, external reviewer-visible. |
| Status | Open, In Progress, Resolved, Declined, Superseded. |
| Resolved By | Person who resolved or closed the request. |
| Resolved At | Date/time resolution occurred. |
| Resolution Notes | What changed, why it was declined, or how it was addressed. |

### Change request behavior

When changes are requested:

- The related review assignment should move to Changes Requested.
- The deliverable should move to `Revision` unless the request is only a non-blocking comment.
- The change request should remain attached to the deliverable.
- The change request should roll up to the project history.
- The system should preserve the requested-by and requested-at details.
- Resolution should be recorded before the next review round is completed.

### Update requests after approval

If someone requests an update after approval or delivery, the system should still capture who requested it and when.

Depending on timing and scope, the update may:

- Create a new change request.
- Reopen the deliverable into Revision.
- Create a new deliverable version.
- Create a new task.
- Create a new project if the update is substantial.
- Be declined, deferred, or marked as a future/later item.

The system should preserve the decision and reason.

## Revision Loop

If changes are requested, the deliverable should move to `Revision` in the Deliverable lifecycle.

Recommended loop:

```text
Ready for Review
  -> In Review
    -> Revision
      -> Ready for Review
        -> In Review
```

The system should track revision round number, requested changes, requested-by, requested-at, updated version, and reviewer response.

## Version-Specific Approval

Approval should apply to the reviewed version.

If a new version replaces the reviewed file or content, previous review assignments may become superseded depending on the change and review rules.

MVP can keep versioning light, but the data model should not imply that an approval applies forever regardless of changes.

## Waiving Reviews

Authorized internal roles may waive a required review when appropriate.

Waiving a review should record:

- Who waived it.
- Date/time.
- Reason.
- Which review assignment was waived.
- Which deliverable/version it applied to.

This preserves accountability while allowing real-world flexibility.

## Sequential vs Parallel Review

MVP should support simple ordering through Review Stage and Sequence.

Recommended MVP behavior:

- Internal Quality Review happens before Stakeholder Review.
- Review assignments within a stage may happen in parallel unless sequence is specified.
- Final Approval may happen after required stakeholder reviews, if needed.

Post-MVP may add richer conditional routing and milestone-specific workflows.

## Future Milestone Approvals

Some deliverables may eventually require approval at multiple milestones.

Examples:

### Landing Page

- Wireframe approval.
- Copy approval.
- Design approval.
- Build/QA approval.
- Final launch approval.

### Video

- Script approval.
- Rough cut review.
- Final cut approval.
- Publish approval.

### Print / Signage

- Concept approval.
- Proof approval.
- Vendor proof approval.
- Install approval.

Future versions may allow Deliverable Type templates to define milestone-based approval workflows.

MVP should document this future path but avoid overbuilding it.

## Conversation Around the Deliverable

The conversation around a deliverable should stay with the deliverable and roll up into the project record.

This is part of the system’s institutional memory.

Review comments, clarification questions, internal notes, stakeholder questions, requested changes, update requests, and approval decisions should not be lost in email, text messages, disconnected chats, or verbal history.

### MVP expectation

MVP should capture basic deliverable comments and review notes where possible.

At minimum, the system should preserve:

- Review notes.
- Requested changes.
- Reviewer comments.
- Internal quality comments.
- Stakeholder questions.
- Approval decisions.
- Waiver notes.
- Change request history.
- Requested-by and requested-at details for changes or updates.

### Future expectation

Future phases may add richer messaging, threaded conversations, inline comments, mentions, unread states, inbox views, and external review conversations.

## Conversation Visibility

Not every conversation should be visible to every user.

Recommended visibility scopes:

| Visibility | Purpose |
|---|---|
| Internal Only | Communications team notes, quality comments, internal concerns. |
| Project Team | Contributors and project owner collaboration. |
| Stakeholder Visible | Review comments and questions visible to stakeholders. |
| External Reviewer Visible | Scoped review conversation through magic link. |
| Requester Visible | Clarification and requester-facing project communication. |

The system should clearly distinguish internal notes from stakeholder-visible comments.

## Conversation vs Activity vs Audit

Keep these concepts distinct:

| Concept | Meaning |
|---|---|
| Conversation | Human discussion, questions, comments, and responses. |
| Review Comments | Conversation tied to a review assignment or version. |
| Change Requests | Actionable requested updates with requester, timestamp, status, and resolution. |
| Activity Feed | Operational history: status changes, uploads, assignment changes, approvals. |
| Audit Log | Protected system record for security, accountability, and external access. |
| Notifications | Alerts that someone needs to act. |

Do not collapse these into one generic comments bucket.

## Relationship to Project Memory

Deliverable conversations should roll up to the Project so the Project contains the full communication history of the work.

A Project should preserve:

- Request conversations.
- Triage notes.
- Project-level conversations.
- Deliverable conversations.
- Review conversations.
- Change request history.
- Approval history.
- Activity history.
- Closeout notes.

This supports future reuse, accountability, onboarding, and context recovery.

## MVP Recommendation

For MVP, include:

- Review assignments on deliverables.
- Review stage: Internal Quality Review, Stakeholder Review, Final Approval.
- Review type.
- Required/optional flag.
- Reviewer.
- Review status.
- Review due date.
- Basic review comments/notes.
- Changes Requested behavior.
- Change request record with requested-by and requested-at.
- Change request status and resolution notes.
- Waived review behavior with reason.
- Basic conversation visibility distinction.
- Project rollup of review/activity/change history.

Defer:

- Complex conditional approval workflows.
- Full milestone-based approval builder.
- Inline annotation tools.
- Rich external review portal.
- Full messaging inbox.
- Realtime chat.
- Advanced unread state management.
- Advanced version comparison.

## Related Docs

- `docs/product/DELIVERABLE_LIFECYCLE.md`
- `docs/product/DELIVERABLES.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/COMMUNICATIONS_SYSTEM.md`
- `docs/product/MESSAGES_AND_ACTIVITY.md`
- `docs/product/COMMUNICATIONS_TRIAGE_WORKSPACE.md`
- `docs/product/DEPENDENCIES_AND_READINESS.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-29
