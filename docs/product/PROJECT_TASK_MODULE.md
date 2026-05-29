# Project / Deliverable / Task Module

## Purpose

Define how ForWorship Creative handles project intake, creative planning, deliverables, tasks, approvals, and project work in a way that supports detailed communications operations without overwhelming users.

This document is the canonical product behavior reference for the Project / Deliverable / Task module.

## Core Principle

Projects are the operational container. Deliverables are the production and approval units. Tasks are the execution steps.

The system should help church teams move from ministry need to creative plan to completed work without forcing requesters, designers, reviewers, vendors, or ministry leaders to understand the full internal machinery.

## Partner, Not Boss

ForWorship Creative should feel like a calm partner, not a demanding boss.

The system should make work visible, clarify next steps, preserve important context, and reduce interruptions without making users feel policed, nagged, or buried in process.

The system should:

- Suggest next steps instead of forcing unnecessary workflow transitions.
- Keep default screens focused on what needs attention now.
- Hide complexity until it is useful.
- Notify only when action is needed.
- Use warm, plain-language guidance.
- Avoid turning task management into a second job.
- Let Communications Leads retain judgment and flexibility.
- Support real church workflows, including messy timelines, changing details, late approvals, vendor handoffs, and urgent requests.

The system should not:

- Require every project to follow an overly rigid sequence.
- Force all deliverables to move in lockstep.
- Notify users about every minor change.
- Require excessive metadata before work can begin.
- Treat users like they are failing when work changes.
- Prioritize process purity over helping the team move forward.

## Complexity Absorption Principle

ForWorship Creative may track complex relationships, dependencies, approvals, intake data, files, status changes, comments, and activity behind the scenes, but the user experience should remain calm and simple.

The system should absorb complexity rather than expose it.

Users should not have to understand the full data model, project hierarchy, approval structure, or dependency graph in order to participate well. Each user should see the information relevant to their role, their current responsibility, and the next helpful action.

The system should:

- Show summaries before details.
- Surface exceptions before full history.
- Use plain-language attention states instead of technical workflow language.
- Make deeper operational details available without making them unavoidable.
- Convert intake information into suggested project structure.
- Let users create tasks quickly, then enrich details only when needed.
- Treat tracking as institutional memory, not surveillance.
- Keep notifications tied to action, not mere activity.
- Preserve detailed history in the background for accountability, reuse, reporting, and closeout.

Key product sentence:

> The system should carry the complexity so the user can carry the work.

## Need-First Intake Principle

The intake experience should begin with the ministry need, not with deliverable selection.

Department leaders usually know what needs to happen, who needs to be reached, why it matters, and when it is needed. They may have ideas about deliverables, but they are not expected to know the best communication strategy, channel mix, production format, or creative workflow.

The system should capture the requester’s goal, audience, desired action, timing, context, constraints, and suggested ideas. The Communications Lead or Project Owner should then shape those inputs into a creative plan with approved deliverables, tasks, timelines, approvals, and assignments.

Requester deliverable ideas should be stored as suggestions, not production commitments.

### Product implications

- Intake should ask “What are you trying to make happen?” before asking “What do you need made?”
- Deliverable selection should be optional and framed as ideas.
- Requesters should be able to choose “I’m not sure, please recommend.”
- The system may suggest possible deliverables based on the ministry need, audience, dates, and desired action.
- The Communications Lead should approve, modify, defer, or decline suggested deliverables before they become project deliverables.
- The creative brief for designers should be generated after Communications has shaped the plan.
- The requester should see a simple communication plan, not the full production structure.

Key product sentence:

> Department leaders define the need. Communications defines the plan. The system helps both sides understand each other.

## Guided Intake and Creative Brief Principle

Project intake is not merely a submission form. It is a guided conversation that helps department leaders clarify the ministry need, audience, desired action, timing, context, constraints, assets, approvals, and suggested communication ideas before work reaches the communications team.

The system should help requesters think through the project without requiring them to understand communications strategy, design production, video workflow, print scheduling, approval dependencies, or vendor handoff needs.

The system should translate requester input into a clear ministry brief for the Communications Lead. After triage and planning, the system should translate the approved communication plan into clear creative briefs for designers, contributors, reviewers, and vendors.

### Product implications

- Intake should begin with plain-language project questions.
- Deliverable ideas should be captured separately from approved deliverables.
- Different deliverable types should have different required details, lead times, approval needs, file needs, and suggested tasks.
- The requester should be allowed to submit with some missing information unless the missing information prevents triage.
- Missing information should be summarized clearly for Communications.
- Intake should generate a human-readable ministry brief, not just store raw form answers.
- Communications should shape the final creative plan before production deliverables are created.
- When a request is accepted, the system should be able to create a project, approved deliverables, and suggested tasks from the triaged plan.
- The system should help the department leader clarify the request while protecting the creative team from vague, incomplete, or scattered information.

Key product sentence:

> Intake should capture the WHAT clearly enough for Communications to design the HOW.

## Request-to-Project Flow

The recommended flow is:

```text
Ministry Need
  -> Request
    -> Suggested Channels / Request Ideas
      -> Communications Triage
        -> Project
          -> Deliverables
            -> Tasks
```

The app should not treat requester ideas as final deliverables. For example, a Children’s Pastor may request help to “Promote VBS” and mention that a video might be helpful. That idea should be preserved, but the Communications Lead should decide whether the final plan includes a video, social post series, sermon announcement, bulletin insert, newsletter blurb, signage, landing page update, parent email, volunteer recruitment email, or other outputs.

## Ministry Brief

The request intake flow should produce a ministry brief for Communications.

A ministry brief answers:

- What are we trying to make happen?
- Why does it matter?
- Who needs to know?
- What action do we want people to take?
- When does this happen?
- When do people need to act?
- What tone, feeling, or pastoral posture is needed?
- What assets or links already exist?
- What constraints, risks, approvals, or missing details should Communications know?
- What ideas does the requester already have?

## Creative Plan

The Communications Lead or Project Owner turns the ministry brief into a creative plan.

A creative plan answers:

- Should this become a project, campaign, simple task, deferred item, or declined request?
- What deliverables are needed?
- What channels will be used?
- What is in scope and out of scope?
- What timeline is realistic?
- Who owns the project?
- Who owns each deliverable?
- What tasks should be generated?
- What approvals are needed?
- What vendor or external support is needed?
- What information is still missing?

## Deliverable Brief

A deliverable brief is created for each approved deliverable.

A deliverable brief answers:

- What exactly is being made?
- Who is it for?
- What is the desired action?
- What specs, dimensions, channel requirements, or file formats are needed?
- What source assets, copy, links, or references are approved?
- When is it due?
- When will it publish, print, show, install, send, or otherwise release?
- Who reviews it?
- Who approves it?
- Where do final files go?

## Requester Ideas vs Approved Deliverables

Requester ideas belong to the request. Approved deliverables belong to the project.

| Concept | Owner | Meaning |
|---|---|---|
| Ministry need | Department leader | What needs to happen |
| Request ideas / suggested channels | Department leader or system | Possible ways to communicate the need |
| Creative plan | Communications Lead or Project Owner | The approved communication strategy |
| Deliverables | Communications Lead or Project Owner | Specific outputs to produce |
| Tasks | Project Owner, Contributor, Communications Lead | Execution steps |

Suggested deliverable states may include:

| State | Meaning |
|---|---|
| Suggested | Proposed by requester or system |
| Accepted | Added to the project as a real deliverable |
| Modified | Converted into a different deliverable or scope |
| Declined | Not needed or out of scope |
| Later | Useful idea, but not for the current project |

## Object Boundaries

### Campaign

Campaigns are optional parent containers for large initiatives such as Easter, Christmas, VBS, capital campaigns, sermon arcs, or church-wide efforts.

Campaigns answer:

> What larger initiative does this work belong to?

Campaigns should not be where normal production task work happens in MVP.

### Project

Projects are the primary operational container.

Projects answer:

> What are we trying to accomplish, for whom, by when, and who is responsible?

Projects may contain:

- Ministry brief context.
- Creative plan decisions.
- Department or ministry ownership.
- Audience and desired action.
- Timeline and priority.
- Stakeholders.
- Deliverables.
- Project-level coordination tasks.
- Comments and activity.
- Files and assets.
- Closeout and archive context.

### Deliverable

Deliverables are specific outputs being produced.

Deliverables answer:

> What exactly needs to be made, reviewed, approved, scheduled, published, delivered, printed, installed, or archived?

Deliverables are the primary production and approval units.

### Task

Tasks are individual execution steps.

Tasks answer:

> What specific thing needs to be done, by whom, and by when?

Tasks support the project and deliverable lifecycle. They do not define the lifecycle by themselves.

## Project-Level Tasks vs Deliverable-Level Tasks

Project-level tasks are for coordination, planning, stakeholder follow-up, schedule confirmation, budget confirmation, closeout, and other project-wide work.

Deliverable-level tasks are for production steps tied to a specific output.

Rule of thumb:

> If completing the task produces or changes one output, attach it to the deliverable. If completing the task clarifies, coordinates, or affects the whole body of work, attach it to the project.

Tasks should not normally attach directly to campaigns in MVP.

## Status Behavior

### Project status

Project status should be controlled by authorized internal users. The system may suggest status changes, but should not force unnecessary workflow moves.

Examples:

- If the first deliverable moves to In Progress, the system may suggest moving the project to Active.
- If one or more deliverables are submitted for review, the system may suggest moving the project to In Review.
- If required deliverables are approved and scheduled, the system may suggest moving the project to Scheduled.
- If all deliverables are published, the system may suggest moving the project to Published.
- After publication, the system may suggest Closeout.
- After closeout, the system may suggest Archived.

A deliverable needing changes should not automatically force the whole project backward unless the Communications Lead or Project Owner chooses to move the project.

### Deliverable status

Deliverable status may be more workflow-driven because deliverables are the production and approval units.

A deliverable should become Approved only when all required review assignments are approved or explicitly waived by an authorized internal role.

### Task status

Tasks should remain lightweight.

Task status changes should:

- Record useful activity.
- Notify only when action is needed.
- Preserve completed, deferred, and canceled work for history.
- Avoid forcing project or deliverable status changes automatically.

Blocked tasks should require a short reason.

Ready for Review should notify the relevant reviewer, Project Owner, or Communications Lead according to assignment.

Done should record completed_by and completed_at.

## Attention States

User-facing screens should favor plain-language attention states over technical workflow language where helpful.

Examples:

- Needs attention.
- Waiting on event details.
- Waiting on ministry approval.
- Waiting on final copy.
- Waiting on vendor proof.
- Ready for review.
- Ready to schedule.
- Ready for closeout.

The system may calculate these from tasks, dependencies, statuses, approvals, and missing information, but users should see the meaning before they see the machinery.

## Project Workspace UX

The project workspace should act as mission control without overwhelming the user.

Default project view should show:

- What this project is.
- Who owns it.
- What is due next.
- What is blocked.
- What needs review.
- What changed recently.
- What the next helpful action is.

Deeper details should be available through sections, tabs, drawers, or expandable panels.

Recommended sections:

- Project summary.
- Ministry brief.
- Creative plan.
- Deliverables.
- Project-level tasks.
- Files and assets.
- Comments.
- Activity.
- Closeout.

## Deliverable Detail UX

The deliverable detail screen should focus on production and approval.

Recommended sections:

- Deliverable title, type, owner, status, due date, and publish/scheduled date.
- Brief/specs.
- Tasks.
- Files and current review version.
- Review assignments.
- Comments.
- Activity.

Primary actions should be contextual, such as:

- Add task.
- Upload file.
- Submit for review.
- Request approval.
- Approve.
- Request changes.
- Schedule.
- Mark published.

## Task UX

Task creation should be extremely fast.

Minimum task creation should require only:

- Task title.
- Optional assignee.
- Optional due date.

Additional details should be added only when useful.

Recommended task views:

- My Tasks.
- Project Tasks.
- Deliverable Tasks.
- Blocked.
- Ready for Review.
- Due Soon.
- Recently Completed.

Deferred, canceled, and done tasks should remain preserved but hidden or collapsed by default in active work views.

## Mobile vs Desktop Behavior

Mobile is participation. Desktop is production.

Mobile should prioritize:

- Reviewing assigned items.
- Approving or requesting changes.
- Commenting.
- Uploading simple files or photos.
- Seeing next steps.
- Responding to requests for missing information.

Desktop should prioritize:

- Planning projects.
- Shaping deliverables.
- Managing timelines.
- Reviewing files in context.
- Creating tasks.
- Managing approvals.
- Closeout and archive work.

## Notifications

Notifications should be rare, relevant, and action-oriented.

Notify when:

- A user is assigned something.
- A user is mentioned.
- Something is blocked and needs help.
- Something is ready for review.
- An approval decision is needed.
- A relevant deadline is approaching.
- A scoped external review link is used, expired, or revoked where internal awareness is useful.

Do not notify by default for every minor edit, file upload, task status change, or activity feed entry.

## Tracking Philosophy

Tracking exists to serve memory, clarity, planning, accountability, reuse, and closeout.

Tracking should not feel like surveillance.

Reports and activity should help teams understand workload, blockers, timelines, and ministry demand without shaming contributors or turning volunteers into data points.

## MVP Scope

MVP should include:

- Guided need-first intake.
- Ministry brief generation.
- Request ideas / suggested channels.
- Communications triage.
- Convert request to project.
- Create approved deliverables.
- Create suggested or manual tasks.
- Project workspace.
- Deliverable detail screen.
- Simple task list views.
- Deliverable-centered approvals.
- Scoped external review links.
- Comments, activity feed, and basic files.
- Closeout checklist.

Post-MVP may include:

- AI-assisted brief refinement.
- Smart deliverable suggestions.
- Lead-time calculations.
- Auto-generated task plans.
- Conditional approval routing.
- Department-specific templates.
- Church-specific custom questions.
- Advanced dependency management.
- Full kanban boards.
- Project templates with automated deliverables and tasks.
- Advanced reporting and utilization.

## Related Docs

- `docs/product/REQUEST_LIFECYCLE.md`
- `docs/product/PROJECT_MANAGEMENT.md`
- `docs/product/PROJECT_LIFECYCLE.md`
- `docs/product/DELIVERABLES.md`
- `docs/product/TASKS.md`
- `docs/product/COMMUNICATIONS_SYSTEM.md`
- `docs/product/MESSAGES_AND_ACTIVITY.md`
- `docs/technical/AUTH_AND_PERMISSIONS.md`
- `docs/BUILD_READINESS_CHECKLIST.md`

Last Updated: 2026-05-29
