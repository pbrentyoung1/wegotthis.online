# Request Lifecycle

## Purpose

Document how communications requests behave before they become projects.

Requests are the front door for ministry needs. They should help department leaders explain what needs to happen without requiring them to know the final communications strategy, deliverable mix, production workflow, or creative format.

## Current Decisions

- Requests are their own object before becoming projects.
- Not every request becomes a project.
- Deferred and rejected requests should remain searchable.
- Accepted requests may be converted into a project.
- Requests should preserve original submitted details and clarification history.
- Intake should begin with the ministry need, not deliverable selection.
- Department leaders define the need. Communications defines the plan.
- Requester deliverable ideas should be stored as suggestions, not production commitments.
- The Communications Lead or Project Owner should shape the submitted request into a creative plan before approved deliverables are created.
- The canonical Project / Deliverable / Task module behavior is documented in `docs/product/PROJECT_TASK_MODULE.md`.

## Need-First Intake Principle

Department leaders usually know what needs to happen, who needs to be reached, why it matters, and when it is needed. They may have ideas about deliverables, but they are not expected to know the best communication strategy, channel mix, production format, production schedule, or approval workflow.

The intake experience should ask:

- What are you trying to make happen?
- Why does it matter?
- Who needs to know?
- What action should people take?
- When does this happen?
- When do people need to act?
- What tone, feeling, or pastoral posture is needed?
- What details, links, assets, or constraints already exist?
- What ideas do you already have?

The system should allow requesters to say:

- I know what I need to promote, but I am not sure how.
- I have an idea, but Communications can recommend the best approach.
- I think we may need a video, social post, slide, email, print piece, or other output.
- I am not sure, please recommend.

## Ministry Brief

A submitted request should become a ministry brief for Communications.

The ministry brief should summarize:

- Ministry or department.
- Primary contact.
- Ministry need.
- Audience.
- Desired action.
- Key dates and deadlines.
- Tone or desired feeling.
- Known assets, links, or references.
- Constraints, sensitivities, or risks.
- Requester ideas or suggested channels.
- Missing information.
- Clarification history.

The ministry brief should be human-readable, not just a raw form response dump.

## Request Ideas vs Approved Deliverables

Requester ideas belong to the request. Approved deliverables belong to the project.

A requester may suggest that a project needs a video, social posts, sermon announcement, bulletin insert, newsletter blurb, signage, web page, or print piece. Those suggestions should be preserved, but they should not automatically become production deliverables.

The Communications Lead or Project Owner should review the ministry need and decide the final communication plan.

Suggested deliverable states may include:

| State | Meaning |
|---|---|
| Suggested | Proposed by the requester or system. |
| Accepted | Added to the project as a real deliverable. |
| Modified | Converted into a different deliverable, format, or scope. |
| Declined | Not needed or out of scope. |
| Later | Useful idea, but not part of the current project. |

## Communications Triage

After submission, Communications should triage the request before creating production work.

Triage should answer:

- Is this valid communications work?
- Is it a project, a simple task, campaign-supporting work, program/content stream work, or a deferred request?
- What information is missing?
- What deliverables are actually needed?
- What should be in scope?
- What should be out of scope?
- What timeline is realistic?
- Who owns the project?
- What approvals are needed?
- What vendor or external support may be needed?

Triage actions may include:

- Ask for clarification.
- Accept as project work.
- Convert to a project.
- Convert to a project with campaign or strategic context associations.
- Merge with an existing project or associate with existing strategic context.
- Defer.
- Reject.
- Archive.

## Request-to-Project Flow

The recommended flow is:

```text
Ministry Need
  -> Request
    -> Suggested Channels / Request Ideas
      -> Communications Triage
        -> Creative Plan
          -> Project
            -> Deliverables
              -> Tasks
```

## Request Statuses

## Draft

- Description: A requester has started a request but has not submitted it.
- Notes: Drafts may help departments prepare better requests.

## Submitted

- Description: The request has been submitted to Communications.
- Notes: Submitted requests are ready for review or triage.

## Needs Clarification

- Description: Communications needs more information before accepting, deferring, rejecting, or converting the request.
- Notes: Clarification history should be preserved.

## In Triage

- Description: Communications is reviewing the ministry brief and shaping the communication plan.
- Notes: This is where requester ideas become accepted, modified, declined, or later deliverable recommendations.

## Accepted

- Description: Communications has accepted the request for future project creation.
- Notes: Acceptance does not have to create a project immediately.

## Deferred

- Description: The request is valid but not currently scheduled or prioritized.
- Notes: Deferred requests should remain searchable and reconsiderable.

## Rejected

- Description: The request will not move forward in its current form.
- Notes: Rejection should preserve the reason and decision history.

## Converted to Project

- Description: The accepted request has become a project.
- Notes: The original request should remain linked to the project.

## Archived

- Description: The request is no longer active but remains searchable.
- Notes: Archived requests may include rejected, deferred, converted, or otherwise inactive request records.

## Reopen/Reconsideration Notes

- Deferred requests may be reconsidered later.
- Rejected requests may be resubmitted or duplicated into a new request if policy allows.
- Converted requests should not lose their original submitted details.
- Requester ideas should remain visible as part of the request history even after Communications modifies the final plan.

## Open Questions

- Which request fields are required before submission?
- Who can move a request from Submitted to In Triage, Accepted, Deferred, or Rejected?
- Should request templates vary by department, ministry area, request type, or project type?
- Should the creative plan exist as a separate persistent object or as structured project setup data?
- How much of the triage recommendation engine should be template-driven in MVP?

## Notes

- Request lifecycle is separate from project lifecycle.
- Draft belongs to the request lifecycle, not the project lifecycle.
- The project lifecycle begins after a request is accepted or converted into project work.
- Deliverable selection during intake should be framed as ideas, not final production commitments.
- See `docs/product/PROJECT_TASK_MODULE.md` for the canonical Project / Deliverable / Task module behavior.

Last Updated: 2026-05-29
