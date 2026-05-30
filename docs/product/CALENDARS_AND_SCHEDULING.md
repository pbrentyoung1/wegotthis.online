# Calendars and Scheduling

## Purpose

Define the calendar and scheduling model for ForWorship Creative.

The system needs to support project timelines, deliverable deadlines, production work, publishing dates, event dates, capacity windows, and review timing without creating multiple disconnected calendar systems.

## Core Principle

Use one calendar engine with multiple filtered views.

The product should not create separate calendar systems for projects, production, publishing, events, and capacity. Instead, calendar items should share a common scheduling model and be filtered by context, type, role, and user need.

## Recommended MVP Decision

For MVP, use a unified calendar model that can show different views:

- Project Calendar.
- Production Calendar.
- Publishing Calendar.
- Review Calendar.
- Capacity Calendar, light/future.
- Event Calendar, light/future.

These are views over shared date-based records, not separate engines.

## Calendar Views

### Project Calendar

Shows high-level Project timing.

May include:

- Project start date.
- Project stop date.
- Project planning window.
- Project scheduled date.
- Major project milestones.
- Closeout deadlines.

Use for:

- Communications planning.
- Department visibility.
- Leadership overview.
- Workload forecasting.

### Production Calendar

Shows production work and deadlines.

May include:

- Deliverable due dates.
- Shoot dates.
- Editing windows.
- Design deadlines.
- Print/vendor handoff dates.
- Install dates.
- Internal production milestones.

Use for:

- Communications team planning.
- Contributor assignments.
- Vendor scheduling.
- Capacity awareness.

### Publishing Calendar

Shows outward-facing release dates.

May include:

- Social post publish dates.
- Email send dates.
- Podcast release dates.
- Video publish dates.
- Website launch dates.
- Print distribution dates.
- Announcement dates.

Use for:

- Channel planning.
- Content coordination.
- Ministry visibility.
- Avoiding communication collisions.

### Review Calendar

Shows review and approval deadlines.

May include:

- Internal quality review due dates.
- Stakeholder review due dates.
- Final approval deadlines.
- Change request due dates.
- Vendor proof review deadlines.

Use for:

- Keeping approvals moving.
- Dashboard/inbox reminders.
- Topbar activity bell alerts.
- Preventing silent review delays.

### Capacity Calendar

Shows general capacity and unavailable windows.

MVP can keep this light.

May include:

- Priority production windows.
- Staff out-of-office windows.
- Known limited-capacity periods.
- Major church production seasons.
- Resource unavailable windows.
- Vendor lead-time notes.

Requester-facing capacity guidance should be general and respectful.

Example:

> The next two weeks are heavily committed. If your timing is flexible, weeks 5-6 may give the team a better window to do this well.

### Event Calendar

Shows ministry or church events relevant to communications work.

May include:

- VBS.
- Camps.
- Conferences.
- Worship nights.
- Sermon series dates.
- Outreach events.
- Holiday services.

MVP may link event dates to Projects without building a full church event management system.

## Scheduled Item Types

A unified scheduling model may support item types such as:

- Project Start.
- Project Stop.
- Project Milestone.
- Deliverable Due.
- Production Window.
- Review Due.
- Approval Due.
- Publish Date.
- Send Date.
- Shoot Date.
- Install Date.
- Vendor Handoff.
- Vendor Due.
- Event Date.
- Closeout Due.
- Capacity Note.
- Unavailable Window.

## Relationship to Projects

Projects require start and stop dates.

Project dates support:

- Scheduling commitment.
- Capacity planning.
- Department visibility.
- Project lifecycle management.

A Project should not move to Scheduled until its timing, scope, budget/resource needs, and capacity have been reviewed.

See `docs/product/PROJECT_LIFECYCLE_V2.md` and `docs/product/BUDGET_AND_CAPACITY.md`.

## Relationship to Deliverables

Deliverables may have several date fields depending on type:

- Due date.
- Review due date.
- Delivery date.
- Publish/send/install date.
- End date.
- Closeout/archive date.

Deliverable Types may define which dates matter.

Example:

```text
Social Post
- Production due date
- Review due date
- Publish date/time
- End date, optional
```

```text
Signage
- Design due date
- Vendor handoff date
- In-hand date
- Install date
- Remove/end date
```

```text
Video
- Shoot date
- Rough cut due date
- Review due date
- Final export date
- Publish date
```

## Relationship to Tasks

Tasks belong to Deliverables.

Task due dates can appear in personal work views and contributor dashboards.

MVP should avoid turning the calendar into a full task-dependency engine.

## Relationship to Capacity

Scheduling should account for capacity.

Capacity includes:

- Staff time.
- Volunteer availability.
- Contractor/vendor availability.
- Skills.
- Equipment.
- Studio/location availability.
- Priority project windows.
- Unavailable windows.

MVP should support light capacity notes and over-capacity warnings without building full resource leveling.

## Relationship to Rush Work

Calendar and scheduling views should support rush detection.

A request may be flagged as Rush when requested dates fall inside the normal TAT/SLA window for the project or deliverable type.

Rush review questions are documented in `docs/product/PROJECT_LIFECYCLE_V2.md` and `docs/product/TURNAROUND_TIME_AND_CAPACITY.md`.

## Relationship to Notifications

Calendar dates may trigger notifications through:

- SweetAlert-style immediate warnings.
- Topbar activity bell alerts.
- Dashboard/inbox items.
- Email notifications, if enabled.

Examples:

- Review due soon.
- Deliverable publish date approaching.
- Project starts tomorrow.
- Approval overdue.
- Capacity conflict detected.
- Vendor handoff due today.

See `docs/product/CONVERSATIONS_MESSAGES_ACTIVITY.md` and `docs/INSPINIA.md`.

## Calendar UI

Use existing INSPINIA calendar, project, kanban, and dashboard patterns before creating custom calendar UI.

Approved references are documented in `docs/INSPINIA.md`.

Calendar views should remain calm and filtered by user need.

Avoid turning the calendar into a wall of every possible date.

## MVP Recommendation

For MVP, include:

- Unified calendar/date model.
- Project start and stop dates.
- Deliverable due dates.
- Deliverable publish/send/install dates where applicable.
- Review due dates.
- Basic filtered calendar views.
- Calendar items surfaced in dashboards.
- Due-soon and overdue notifications.
- Light capacity/unavailable window notes if feasible.

If scope is tight, prioritize:

- Project start/stop dates.
- Deliverable due dates.
- Publish/send dates.
- Review due dates.
- Dashboard reminders.

## Deferred

Defer:

- Full resource calendar.
- Full church event management system.
- Automated resource leveling.
- Advanced scheduling optimization.
- Drag-and-drop rescheduling with dependency recalculation.
- Complex calendar subscription/sync.
- Full Google Calendar integration.
- Detailed hour-by-hour production calendar.

## Future Expansion

Future versions may add:

- Google Calendar integration.
- Outlook calendar integration.
- Capacity-aware scheduling suggestions.
- Resource calendars.
- Studio/equipment booking.
- Vendor availability.
- Calendar subscriptions.
- Drag-and-drop scheduling.
- Conflict detection.
- Department-facing scheduling suggestions.

## Related Docs

- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/product/DELIVERABLE_LIFECYCLE.md`
- `docs/product/BUDGET_AND_CAPACITY.md`
- `docs/product/TURNAROUND_TIME_AND_CAPACITY.md`
- `docs/product/DEPENDENCIES_AND_READINESS.md`
- `docs/product/CONVERSATIONS_MESSAGES_ACTIVITY.md`
- `docs/INSPINIA.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-30
