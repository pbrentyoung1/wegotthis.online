# Calendars and Scheduling

## Purpose

Define the calendar and scheduling model for ForWorship Creative.

The system needs to support project timelines, deliverable deadlines, production work, publishing dates, event dates, capacity windows, and review timing without creating multiple disconnected calendar systems.

## Core Principle

Use one calendar engine with multiple filtered views.

The product should not create separate calendar systems for projects, production, publishing, events, and capacity. Instead, calendar items should share a common scheduling model and be filtered by context, type, role, and user need.

## FullCalendar Implementation Target

INSPINIA uses the free version of FullCalendar.

The MVP calendar data model and API should be ready to feed FullCalendar-compatible event objects.

FullCalendar should receive normalized, lightweight event objects from the backend, regardless of whether the source is a Project, Deliverable, Review Assignment, Capacity Note, Unavailable Window, or lightweight Event.

The backend should translate source records into a common calendar event shape.

## Recommended MVP Decision

For MVP, use a unified calendar model that can show different views:

- Project Calendar.
- Production Calendar.
- Publishing Calendar.
- Review Calendar.
- Capacity Calendar, light/future.
- Event Calendar, light/future.

These are views over shared date-based records, not separate engines.

## Implemented MVP Foundation

- My Schedule uses the INSPINIA FullCalendar pattern.
- Calendar data is normalized from existing Project, Deliverable, Task, and Deliverable Review records.
- The JSON endpoint requires a bounded date range and respects Project visibility.
- Available filters are My Work, Projects, Production, Publishing, and Reviews.
- Project Schedule provides a separate sortable production sequence for Deliverables and Tasks.
- Project owners and managers can adjust Project, Deliverable, publish, and Task dates from Project Schedule.
- A separate materialized calendar-items table, recurrence, drag-to-reschedule, and external calendar sync remain deferred.

## Calendar API Principle

Calendar views should use bounded date-range queries.

The app should never load every calendar-related record in the organization.

Example request:

```text
GET /calendar?start=2026-06-01&end=2026-06-30&view=publishing
```

The backend should return only items overlapping the requested date range and matching the current user’s permissions and selected filters.

## FullCalendar Event Shape

The API should return events compatible with FullCalendar’s event object shape.

Recommended normalized shape:

```json
{
  "id": "deliverable:123:publish_at",
  "title": "VBS Instagram Post publishes",
  "start": "2026-06-12T09:00:00",
  "end": null,
  "allDay": false,
  "url": null,
  "className": ["calendar-item", "calendar-item-publishing"],
  "extendedProps": {
    "organization_id": 1,
    "calendar_type": "publishing",
    "event_type": "publish_date",
    "source_type": "deliverable",
    "source_id": 123,
    "source_date_field": "publish_at",
    "project_id": 44,
    "deliverable_id": 123,
    "department_id": 8,
    "status": "approved",
    "attention_state": "on_track",
    "blocker_type": null,
    "visibility": "project_team",
    "detail_url": "/deliverables/123"
  }
}
```

Notes:

- `id` should be stable and unique for the calendar occurrence.
- `title`, `start`, `end`, and `allDay` should map cleanly to FullCalendar.
- Additional app-specific data should live under `extendedProps`.
- The UI should lazy-load full details when a calendar item is clicked.
- Do not return entire Project or Deliverable payloads in calendar responses.

## Source Records vs Calendar Occurrences

For MVP, core dates may live on source records.

Examples:

```text
projects.start_date
projects.stop_date
deliverables.due_at
deliverables.publish_at
review_assignments.due_at
tasks.due_at
```

The calendar API can query source records, normalize them, and return FullCalendar-compatible event objects.

If performance or complexity requires it later, introduce a generated/indexed `calendar_occurrences` table.

## Optional Future Calendar Occurrences Table

A future `calendar_occurrences` table may include:

```text
calendar_occurrences
- id
- organization_id
- source_type
- source_id
- source_date_field
- calendar_type
- event_type
- title
- start_at
- end_at
- all_day
- timezone
- project_id, nullable
- deliverable_id, nullable
- department_id, nullable
- assigned_profile_id, nullable
- status
- attention_state
- blocker_type
- visibility
- metadata_json
```

This table should not be required for MVP unless calendar source queries become too heavy.

Reasons to introduce it later:

- Performance.
- Complex filtering.
- Caching.
- Recurring dates.
- External calendar sync.
- Easier FullCalendar feeds.

## Performance Guardrails

To prevent calendar views from creating unnecessary database load:

- Query by visible date range only.
- Filter by `organization_id` first.
- Filter by calendar view/type.
- Respect user permissions before returning results.
- Use indexes on date fields used by calendar queries.
- Return lightweight normalized event objects.
- Lazy-load full details on click.
- Cache common month views later if needed.
- Consider `calendar_occurrences` only when source queries become too complex.

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

## Lightweight Events

The platform may need lightweight Event records for real-world dates that many Projects or Deliverables reference.

Examples:

- VBS.
- Easter services.
- Christmas Eve services.
- Fall kickoff.
- Conference.
- Camp.

This is not a full church event management system.

Recommended lightweight Event fields:

```text
events
- id
- organization_id
- department_id, nullable
- title
- description, nullable
- start_at
- end_at
- all_day
- location, nullable
- notes, nullable
- status
```

Projects and Deliverables may reference an Event when helpful.

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

Use FullCalendar free version through the INSPINIA calendar implementation unless a future architecture decision changes this.

Use existing INSPINIA calendar, project, kanban, and dashboard patterns before creating custom calendar UI.

Approved references are documented in `docs/INSPINIA.md`.

Calendar views should remain calm and filtered by user need.

Avoid turning the calendar into a wall of every possible date.

## MVP Recommendation

For MVP, include:

- FullCalendar-compatible API event shape.
- Unified calendar/date model.
- Bounded date-range calendar endpoint.
- Project start and stop dates.
- Deliverable due dates.
- Deliverable publish/send/install dates where applicable.
- Review due dates.
- Lightweight Events if needed.
- Basic filtered calendar views.
- Calendar items surfaced in dashboards.
- Due-soon and overdue notifications.
- Light capacity/unavailable window notes if feasible.

If scope is tight, prioritize:

- Project start/stop dates.
- Deliverable due dates.
- Publish/send dates.
- Review due dates.
- FullCalendar-compatible API output.
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
- Recurring event engine.

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
- `calendar_occurrences` table for performance/caching if needed.

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
