# Dashboard Widgets

## Purpose

Define the dashboard widget model for ForWorship Creative.

The dashboard should help each person see what matters to them without overwhelming them with every project, task, metric, alert, and conversation in the organization.

Dashboard widgets should begin simple and role-aware, with a path to become richer as the product matures and API integrations are added.

## Core Principle

The dashboard should begin with encouragement and orientation before action.

The top section should not immediately confront users with stress, overdue work, or problem metrics.

The dashboard should feel like a partner opening the right drawer, not a boss dumping the whole binder on the desk.

## Dashboard Philosophy

The dashboard should answer:

> What matters to me right now?

Not:

> What is everything happening everywhere?

Role-aware dashboards should reduce clutter and route attention.

Roles should function as drawers and cupboards that organize work, not security checkpoints that make people feel blocked.

## Top Inspirational Section

Reserve the top section for something inspirational, conversational, communal, or spiritually grounding.

Possible content:

- Scripture.
- Devotional prompt.
- Prayer prompt.
- Recent ministry image.
- Ministry win.
- Team encouragement.
- Seasonal focus.
- Short welcome/greeting.
- Community update.

Avoid putting these at the very top:

- Overdue counts.
- Blocker warnings.
- Capacity warnings.
- Revenue widgets.
- Stress-heavy charts.
- Red alert cards.

The top section should feel like:

> Take a breath. This work matters. We’ve got this.

Leave the top section as a design placeholder until the exact content pattern is chosen.

## Inspinia Dashboard References

Use the Inspinia Tailwind dashboard and widgets pages as structural references:

- `https://webapplayers.com/inspinia/tailwind/index.html`
- `https://webapplayers.com/inspinia/tailwind/widgets.html`

Avoid using dashboard widgets that do not fit the product, such as generic revenue, sales, or client widgets.

Adapt layout and component structure, but translate the emotional tone into the ForWorship Creative brand.

## Dashboard Layout Direction

Recommended dashboard structure:

```text
Top Inspirational / Communal Section

Quick Widget Cards
- My Tasks
- Messages
- Approvals
- Needs Help Moving Forward
- Due Soon
- My Projects
- This Week

Main Work Sections
- Latest Project Updates
- Discussions
- Blocked Work / Needs Help Moving Forward
- This Week Calendar Snapshot
- Recent Assets / Images

Future Analytics / Integration Sections
- Social Media
- Website Analytics
- Click Campaign Analytics
- Scheduled Posts
- YouTube Analytics
- Service Stats
- Planning Center Metrics
- Slack / Discord notification summaries, future
```

## Quick Widget Cards

The second section of cards should be practical and role-aware.

Initial candidate widgets:

| Widget | Purpose |
|---|---|
| My Tasks | Assigned tasks that need action. |
| Messages | Direct messages and project/deliverable discussions needing attention. |
| Approvals | Reviews or approvals assigned to the user. |
| Needs Help Moving Forward | Blockers or stuck work the user can help resolve. |
| Due Soon | Upcoming deadlines and review dates. |
| My Projects | Projects owned by or relevant to the user. |
| This Week | Compact calendar snapshot. |
| Recent Assets | Recently added files/images/assets relevant to the user. |

Do not use generic widgets like Clients or Revenue unless a future version has a clear church communications use case.

## Blockers / Needs Help Moving Forward

A blocker widget should be included.

User-facing language may use:

> Needs Help Moving Forward

rather than only:

> Blockers

This keeps the tone helpful rather than punitive.

The blocker widget can show:

- Count of blocked items.
- Items waiting on the user.
- Items waiting on the user’s department.
- High-priority stuck work.
- Link to a filtered blocker view.

Role-aware examples:

- Communications Manager sees blockers across active communications work.
- Department Leader sees blockers involving their department or assigned reviews.
- Contributor sees blockers on assigned deliverables/tasks.
- Viewer sees only scoped, non-internal blockers if permitted.

## This Week Calendar Widget

A compact `This Week` widget may show:

- Project start/stop dates.
- Deliverable due dates.
- Review deadlines.
- Publish/send/install dates.
- Lightweight event dates.

This should be a snapshot, not a full wall calendar.

The full calendar remains a separate view powered by FullCalendar.

See `docs/product/CALENDARS_AND_SCHEDULING.md`.

## Latest Project Updates and Discussions

A main dashboard section should show recent activity and conversation relevant to the user.

May include:

- Project updates.
- Deliverable status changes.
- New discussion messages.
- Review requests.
- Change requests.
- Asset uploads.
- Recent decisions.

This section should not become an everything feed. It should be filtered by role, assignment, department, and relevance.

## Widget Customization

As a progressive enhancement, users should be able to rearrange dashboard widgets.

MVP may support:

- Default dashboard layout by system role.
- User-specific widget order.
- Simple show/hide later if feasible.

Avoid building a complex dashboard-builder in MVP.

Potential preference storage:

```text
dashboard_preferences
- user_id
- organization_id
- widget_key
- sort_order
- is_visible
```

Or:

```text
user_preferences.dashboard_layout_json
```

Recommended approach:

> Role-aware by default, lightly customizable by the user.

## Widget Data Model

Widgets should be defined by stable keys so they can be expanded without redesigning the dashboard.

Potential widget definition fields:

```text
widget_key
widget_name
description
default_roles
data_source_type
integration_provider, nullable
is_core
is_enabled
sort_order
```

For MVP, these may be configuration constants rather than database records.

Future versions may store widget configuration in the database.

## Integration-Ready Widgets

Widgets should be designed so future API integrations can feed them.

Potential future integrations:

- Planning Center.
- Google Calendar.
- Outlook Calendar.
- Slack.
- Discord.
- Social media analytics.
- Website analytics.
- Click/campaign analytics.
- YouTube analytics.
- Email marketing analytics.
- Service attendance/visitor stats.
- Giving/campaign metrics if appropriate.

Future widgets may include:

| Widget | Possible Integration |
|---|---|
| Upcoming Church Events | Planning Center, Google Calendar, Outlook Calendar. |
| External Conversation Alerts | Slack, Discord. |
| Scheduled Posts | Social scheduling provider. |
| Social Performance | Meta, Instagram, TikTok, X, LinkedIn, etc. |
| Website Traffic | Google Analytics / website analytics. |
| Campaign Clicks | Email/click tracking provider. |
| YouTube Performance | YouTube Analytics. |
| Recent Service Stats | Planning Center or church management system. |
| New Images | Google Drive / Asset Library. |
| Email Performance | Email platform integration. |

## Slack and Discord Integration Boundary

Slack and Discord may be useful future integrations for notification handoff, alerts, and external discussion awareness.

They should not replace project memory inside ForWorship Creative.

Potential future uses:

- Send project notifications to a Slack or Discord channel.
- Surface unread/mentioned external conversations in dashboard widgets.
- Link a Slack/Discord thread to a Project or Deliverable.
- Post review/change request alerts to a configured channel.

Avoid:

- Recreating full Slack or Discord inside ForWorship.
- Treating external chat as the official project memory by default.
- Importing entire Slack/Discord histories in MVP.
- Creating noisy duplicate notifications.

Project decisions, approvals, change requests, and official closeout notes should remain in ForWorship Creative.

## Integration Guardrail

Do not build all integrations into MVP.

The MVP dashboard should be useful with native platform data first:

- Tasks.
- Messages.
- Approvals.
- Blockers.
- Projects.
- Deliverables.
- Calendar dates.
- Recent assets.

API integrations should enhance the dashboard later, not be required for the dashboard to work.

## Role-Aware Defaults

### Organization Admin

May see:

- Organization health.
- User/invite status.
- Integration status.
- Department overview.
- High-level blockers.
- Recent activity.

### Communications Manager

May see:

- Intake queue.
- Needs scheduling.
- Blockers.
- Approvals waiting.
- Capacity concerns.
- My tasks.
- Messages.
- Latest project updates.
- This Week.
- Recent assets.

### Department Leader

May see:

- My requests.
- My department projects.
- Approvals waiting on me.
- Needs help from my department.
- Messages.
- This Week.
- General capacity guidance.

### Contributor

May see:

- My tasks.
- Assigned deliverables.
- Messages.
- Due soon.
- Needs help moving forward.
- Relevant assets.
- This Week.

### Viewer

May see:

- Relevant project status.
- Approved updates.
- This Week.
- Limited recent activity.

## Notification Layers

Dashboard widgets are one of three notification layers:

1. SweetAlert-style immediate feedback.
2. Topbar activity bell for alerts and recent activity.
3. Dashboard widgets/inbox for deeper follow-up.

See `docs/INSPINIA.md` and `docs/product/CONVERSATIONS_MESSAGES_ACTIVITY.md`.

## MVP Recommendation

For MVP, include:

- Calm top inspirational/communal placeholder.
- Role-aware default dashboard layout.
- Quick cards for My Tasks, Messages, Approvals, Needs Help Moving Forward, Due Soon, My Projects, and This Week if feasible.
- Latest Project Updates and Discussions section.
- Basic Blocked Work / Needs Help Moving Forward section.
- Recent Assets / Images if feasible.
- Widget keys/configuration constants.
- Simple user widget ordering if not too much work.

Defer:

- Complex dashboard builder.
- Full analytics dashboard.
- API-fed analytics widgets.
- Custom widget creation.
- Drag/drop dashboard editor if it slows MVP.
- Revenue/client widgets that do not fit the product.
- Slack/Discord integrations.

## Future Expansion

Future versions may add:

- Widget marketplace/library.
- API-fed widgets.
- Planning Center dashboard cards.
- Google/Outlook calendar widgets.
- Slack/Discord notification widgets.
- Social analytics widgets.
- Website analytics widgets.
- YouTube analytics widgets.
- Scheduled post widgets.
- Email/click analytics widgets.
- Service stats widgets.
- Drag/drop widget layout.
- Per-role dashboard templates.
- Admin-configured dashboard presets.

## Related Docs

- `docs/INSPINIA.md`
- `docs/product/ROLES_AND_PERMISSIONS_MODEL.md`
- `docs/product/CALENDARS_AND_SCHEDULING.md`
- `docs/product/CONVERSATIONS_MESSAGES_ACTIVITY.md`
- `docs/product/BUDGET_AND_CAPACITY.md`
- `docs/product/ASSET_LIBRARY.md`
- `docs/product/PROJECT_LIFECYCLE_V2.md`
- `docs/PHASE_FEATURE_MATRIX.md`

Last Updated: 2026-05-30
