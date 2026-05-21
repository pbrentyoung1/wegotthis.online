# Activity Audit Relationship Diagram

## Purpose

Clarify how visible activity history, protected audit records, comments, and notifications relate without being conflated.

## Core Rules

- Keep activity logs, audit logs, comments, and notifications conceptually distinct.
- Activity history should be useful and readable.
- Audit records should preserve protected change history.
- Notification records should not become the project communication system.

## Relationships

- Comments attach to work context as human conversation.
- Activity history records meaningful visible events tied to work context.
- Audit records capture protected state changes and sensitive traceability.
- Notifications reference source events but remain outbound alerts.

## Open Questions

- Which events belong in visible activity versus protected audit history?
- Which events should create both an activity entry and a notification?
- What level of detail is necessary for MVP audit coverage?

## Related Diagrams

- `notification-trigger-map.md`
- `external-access-scope-map.md`
- `entity-relationship-diagram.md`
