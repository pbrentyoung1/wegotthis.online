# Planning Center Integration

## Purpose

Document the future optional integration strategy for Planning Center Online (PCO).

## Integration Philosophy

- Planning Center integration should be optional.
- wegotthis.online must remain fully functional without Planning Center.
- Do not tightly couple core business logic to PCO.
- PCO should function as a connector layer, not the primary system architecture.
- Churches should retain control over what data syncs.

## Potential Integration Areas

- People
- Groups
- Services
- Calendar
- Registrations
- Events
- Volunteer teams
- Messaging/workflows
- Media attachment references

## API Notes

- Planning Center provides a REST API using JSON:API conventions.
- OAuth support may be needed for multi-church SaaS support.
- Personal Access Tokens may be sufficient for early single-church integrations.
- API docs:
  - https://developer.planning.center/docs
  - https://api.planningcenteronline.com/docs/overview/getting-started

## Architecture Considerations

- Abstract integrations behind service layers.
- Avoid hard dependencies on external APIs.
- Store external IDs separately from internal IDs.
- Support sync logs and retry queues.
- Design for eventual webhook support.
- Prepare for rate limiting and partial sync failures.

## Possible Future Use Cases

- Import events into projects
- Sync volunteer teams
- Pull sermon series metadata
- Sync people/group information
- Create communication workflows from PCO events
- Associate projects with Planning Center calendar items
- Auto-generate media requests from planned services/events

## Open Questions

- What data should remain source-of-truth inside PCO?
- What should become native to wegotthis.online?
- How should permissions map between systems?
- How should churches configure sync behavior?
- Will integrations be real-time or scheduled?

## Last Updated

2026-05-20
