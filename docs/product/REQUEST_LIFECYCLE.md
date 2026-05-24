# Request Lifecycle

## Purpose

Document how communications requests behave before they become projects.

## Current Decisions

- Working decision: requests are their own object before becoming projects.
- Not every request becomes a project.
- Deferred and rejected requests should remain searchable.
- Accepted requests may be converted into a project.
- Requests should preserve original submitted details and clarification history.

## Request Statuses

## Draft

- Description: A requester has started a request but has not submitted it.
- Notes: Drafts may help departments prepare better requests.

## Submitted

- Description: The request has been submitted to Communications.
- Notes: Submitted requests are ready for review or triage.

## Needs Clarification

- Description: Communications needs more information before accepting, deferring, or rejecting the request.
- Notes: Clarification history should be preserved.

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
- Notes: Archived requests may include rejected, deferred, or completed request records.

## Reopen/Reconsideration Notes

- Deferred requests may be reconsidered later.
- Rejected requests may be resubmitted or duplicated into a new request if policy allows.
- Converted requests should not lose their original submitted details.

## Open Questions

- Which request fields are required before submission?
- Who can move a request from Submitted to Accepted, Deferred, or Rejected?
- Should request templates vary by department or project type?

## Notes

- Request lifecycle is separate from project lifecycle.

Last Updated: 2026-05-24
