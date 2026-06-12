# Budget and Capacity

## Purpose

Define the lightweight MVP approach for budgeting money, time, resources, and capacity in ForWorship Creative.

The goal is to help Communications and department leaders count the cost before committing work to the schedule.

This is not intended to become accounting software, payroll, timesheets, or a full resource management engine in MVP.

## Core Principle

Budgeting should help the team practice good stewardship of time, money, people, attention, and outside resources.

The system should help answer:

> Do we have the time, resources, and budget to do this well in the requested window?

And if not:

> Should we move the date, reduce scope, outsource, use a vendor, split the work, or wait for a better window?

## Count the Cost

Before a Project is Scheduled, the system should help Communications count the cost.

This includes:

- Internal time.
- Staff/resource capacity.
- Financial budget.
- Vendor or outsource needs.
- Priority conflicts.
- Time out of office or unavailable production windows.
- Existing scheduled work.
- Rush impact.

The system should not shame requesters for not knowing the team’s workload. Department leaders often cannot see other priority projects, vacations, major campaigns, or production bottlenecks.

The system should make capacity visible enough to support wise scheduling.

## Financial Budget

Financial budget should remain light in MVP.

### Project-level budget fields

Recommended fields:

| Field | Purpose |
|---|---|
| Estimated Budget | Rough expected cost. |
| Approved Budget | Amount approved by department, leadership, or Communications. |
| Actual Budget | Actual cost, if known. |
| Budget Notes | Context, assumptions, exceptions, tradeoffs. |

### Optional budget line items

Budget line items should be optional.

Recommended fields:

| Field | Purpose |
|---|---|
| Description | What this cost is for. |
| Category | Printing, video, ads, photography, vendor, signage, misc. |
| Estimated Cost | Expected cost. |
| Actual Cost | Final cost, if known. |
| Vendor | Related vendor or contractor, if applicable. |
| Notes | Context, quote notes, rush fees, payment notes. |

Example:

```text
Project: Promote VBS

Estimated Budget: $1,500
Approved Budget: $1,500
Actual Budget: $1,320

Line Items:
- Print vendor: estimated $450, actual $520
- Video contractor: estimated $800, actual $800
- Facebook ads: estimated $250, actual $0, deferred
```

## Time / Capacity Budget

Time budget is essential for scheduling.

A Project may have enough financial budget but not enough internal production capacity.

### Project-level time fields

Recommended fields:

| Field | Purpose |
|---|---|
| Estimated Hours | Total expected internal work. |
| Scheduled Hours | Hours committed in the work window. |
| Actual Hours | Optional/light closeout note, if useful. |
| Capacity Reviewed | Confirms availability was reviewed before scheduling. |
| Capacity Notes | Context about constraints, conflicts, or assumptions. |

### Optional time line items

Recommended fields:

| Field | Purpose |
|---|---|
| Role or Person | Designer, writer, video editor, producer, Communications Lead, etc. |
| Estimated Hours | Expected time needed. |
| Scheduled Window | When the work is expected to happen. |
| Actual Hours | Optional/light closeout note. |
| Notes | Revision assumptions, meeting time, vendor coordination, etc. |

Example:

```text
Designer capacity this week: 40 hours
Already scheduled: 34 hours
New project estimate: 12 hours
Result: Over capacity by 6 hours
```

The system should surface this as guidance, not punishment.

### Time-budget rollups

Tasks should store a lightweight planned time budget in minutes.

```text
Task time budgets
  -> sum into the Deliverable time budget
    -> Deliverable time budgets sum into the Project time budget
```

Time budgets should support planning questions such as:

- How much work is expected for this Deliverable?
- How much assigned work is planned for a person during a window?
- Does the current Project scope fit the available capacity?

Time budgeting is distinct from time reporting. MVP should not require contributors to run timers, submit timesheets, or report actual time. Actual time may remain an optional future closeout input if real usage proves it valuable.

Example language:

> This project may need a later window, smaller scope, or outside support because design capacity is tight that week.

## MVP Capacity Model

MVP capacity should be simple.

Include:

- Estimated hours by Project.
- Optional estimated hours by role/person.
- Project start date.
- Project stop date.
- Capacity reviewed flag.
- Capacity notes.
- Manual unavailable windows or capacity notes.
- Simple over-capacity warning.
- Vendor/outsource recommendation.

Avoid in MVP:

- Timesheets.
- Payroll-style tracking.
- Forced daily hour allocation.
- Automatic resource leveling.
- Detailed utilization scoring.
- Full workforce forecasting.
- Surveillance-style productivity reporting.

## Department Head Capacity Forecast

Eventually, department leaders should be able to see general capacity guidance before submitting or scheduling work.

This should help them choose better timing without requiring them to know every project on the Communications calendar.

The dashboard might show general forecast windows such as:

| Window | Capacity Signal | Guidance |
|---|---|---|
| Next 2 weeks | Very limited | Priority work already scheduled. Consider later date or smaller scope. |
| Weeks 3-4 | Tight | Some capacity available for light requests. |
| Weeks 5-6 | Better | Good window for new projects. |
| After 6 weeks | Open | Good planning window for larger work. |

This should be general guidance, not an exposure of every internal project, staff schedule, vacation, or sensitive priority.

Requester-facing language should be simple:

> The next two weeks are already heavily committed. If your timing is flexible, weeks 5-6 may give the team a better window to do this well.

## Scheduling Guidance

When a requester provides a desired date, the system should compare:

- Requested date.
- Project template expectations.
- Deliverable type TAT/SLA expectations.
- Project start/stop window.
- Current capacity notes.
- Priority work already scheduled.
- Required review/vendor time.
- Known out-of-office or unavailable windows.

The system may suggest:

- The requested timing looks workable.
- This timing is tight.
- This appears rushed.
- This conflicts with current capacity.
- A later window may be better.
- Vendor or outsource support may be needed.
- A smaller scope may fit the requested date.

## Priority and Unavailable Windows

Capacity guidance should account for priority work and unavailable time.

Examples:

- Easter production priority through March 31.
- Christmas services priority window.
- Staff out of office.
- Video team unavailable next week.
- Designer already scheduled at capacity.
- Vendor turnaround extended.
- Conference or legally binding launch date.

MVP can support these as manual capacity notes or unavailable windows.

Post-MVP can add richer scheduling and forecasting.

## Project Scheduling Gate

A Project should not move to Scheduled until budget and time/resource capacity have been reviewed.

The Scheduling gate should require or confirm:

- Estimated financial budget or budget note.
- Budget approval status, if applicable.
- Estimated internal hours or capacity note.
- Capacity reviewed flag.
- Start date.
- Stop date.
- Deliverable lineup.
- Vendor/outsource recommendation, if applicable.
- Rush review, if applicable.

This does not mean every project needs a complex estimate. Small projects can use light notes.

Example:

```text
Budget: Internal time only
Estimated Hours: 3
Capacity Reviewed: Yes
Notes: Fits current week because designer has open capacity.
```

## Relationship to Rush Work

Rush work is often a capacity problem, not just a deadline problem.

A rush review should ask:

- Is this a hard or soft deadline?
- What happens if we miss it?
- Who set the timeline, and based on what?
- What can we cut?
- What is the exact definition of done?
- Who is available immediately?
- Will this require overtime?
- Is there budget for vendors or outsourcing?
- Are there bottlenecks that cannot be accelerated?
- If we had double the budget, could this be done faster?

If the answer is no, the timeline may be structurally impossible.

See `docs/product/PROJECT_LIFECYCLE_V2.md` and `docs/product/TURNAROUND_TIME_AND_CAPACITY.md` for rush review details.

## Reporting Philosophy

Budget and capacity reporting should support planning, stewardship, and expectation-setting.

It should not feel like surveillance.

Good reporting:

- Helps departments plan earlier.
- Shows where capacity is tight.
- Helps Communications protect priority work.
- Helps leaders see true cost of work.
- Supports budget planning and vendor decisions.

Bad reporting:

- Shames contributors.
- Turns volunteers into productivity metrics.
- Creates false precision.
- Exposes sensitive work inappropriately.
- Encourages micromanagement.

## Data Concepts

Potential data concepts:

- Project estimated budget.
- Project approved budget.
- Project actual budget.
- Budget line items.
- Estimated hours.
- Scheduled hours.
- Actual hours, optional.
- Time line items by role/person.
- Capacity reviewed flag.
- Capacity notes.
- Priority windows.
- Unavailable windows.
- Capacity forecast buckets.
- Vendor/outsource recommendation.
- Rush review record.

## MVP Recommendation

For MVP, include:

- Project-level estimated budget.
- Project-level approved budget.
- Project-level actual budget.
- Budget notes.
- Optional budget line items.
- Project estimated hours.
- Task time-budget minutes with Deliverable and Project time-budget rollups.
- Optional estimated hours by role/person.
- Capacity reviewed flag.
- Capacity notes.
- Manual priority/unavailable window notes.
- Simple over-capacity warning.
- Vendor/outsource recommendation.

Defer:

- Full resource management engine.
- Forced time tracking.
- Detailed utilization dashboards.
- Payroll/timesheet features.
- Automated resource leveling.
- Complex calendar optimization.
- Accounting/payables workflow.

## Future Expansion

Future versions may add:

- Department-facing capacity forecast dashboard.
- Scheduling suggestions by capacity window.
- Role-based capacity rules.
- Out-of-office integration.
- Calendar integration.
- Vendor capacity tracking.
- More detailed cost reporting.
- Department utilization reports.
- Project template hour estimates.
- Deliverable type hour estimates.
- Capacity-aware scheduling recommendations.

## Related Docs

- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/TURNAROUND_TIME_AND_CAPACITY.md`
- `docs/product/DEPENDENCIES_AND_READINESS.md`
- `docs/product/PHASE_FEATURE_MATRIX.md`
- `docs/product/PROJECT_TASK_MODULE.md`
- `docs/product/COMMUNICATIONS_TRIAGE_WORKSPACE.md`

Last Updated: 2026-05-29
