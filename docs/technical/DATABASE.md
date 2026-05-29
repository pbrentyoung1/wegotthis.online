# Database

## Purpose

Document database direction, data modeling notes, and schema questions.

## Current Decisions

- PostgreSQL should be used from day one.
- Projects should connect to related records such as media assets, tasks, approvals, messages, files, vendors, deliverables, and timelines.
- Working direction: database planning should support request intake, project lifecycle, media usage tracking, closeout, brand management, and department reporting.
- Working decision: use a single PostgreSQL database with tenant-scoped records using `tenant_id`.
- Current hosting.com/cPanel PostgreSQL is acceptable for early staging/proof only.
- PostgreSQL 9.6 should not be considered acceptable for long-term production.
- PostgreSQL 13 is acceptable for early staging/proof if that is the available upgrade path.
- PostgreSQL 15/16+ is preferred for future production.
- Migrations and database usage should remain conservative while the project is on the current host.
- Strategic Context is distinct from Operational Work.
- Strategic Context includes initiatives, campaigns, programs/content streams, sermon series, seasons, ministry areas, topics, and tags.
- Operational Work is Projects -> Deliverables -> Tasks.
- Campaigns are optional strategic context for time-bound efforts.
- Initiatives are optional strategic context for broader goals.
- Programs / Content Streams are recurring operational rhythms, distinct from campaigns.
- Projects are the primary operational container.
- Projects require title, owner, objective, start date, and stop date.
- Deliverables are the specific outputs being produced.
- Deliverables must belong to a project and do not stand alone.
- Tasks are the individual actions required to complete projects or deliverables.
- Canonical project lifecycle is Intake -> Discovery -> Approved -> Planned -> Active -> In Review -> Revision -> Scheduled -> Published -> Closeout -> Archived.
- Canonical deliverable lifecycle is Planned -> In Progress -> In Review -> Waiting for Approval -> Changes Requested -> Approved -> Scheduled -> Published -> Archived.
- Canonical MVP task statuses are Not Started, In Progress, Blocked, Ready for Review, Done, Deferred, and Canceled.

## Conceptual Relationships

- Tenants have many users, departments, initiatives, campaigns, programs/content streams, projects, requests, assets, templates, and brand assets.
- Initiatives, campaigns, programs/content streams, sermon series, seasons, ministry areas, topics, and tags provide strategic context.
- Projects may associate with strategic context without requiring a campaign parent.
- Projects should preserve one primary operational home in MVP.
- Projects have many deliverables.
- Projects may have project-level tasks.
- Deliverables have many tasks, approvals, files/assets, statuses, and due dates.
- Approvals primarily belong to deliverables.
- Reviewer assignments attach contextual review responsibility to a project, deliverable, or reviewable element.
- Review assignment types for MVP are Budget, Resources, Design, Brand, Content, Ministry, and Final.
- Required reviewer assignments must be approved or explicitly waived before the reviewed item clears approval.
- Requests may convert into projects.
- Projects have many comments/messages, visible activity entries, and related audit records.
- Deliverables may have comments, approval notes, requested changes, and notification events.
- Notifications should reference the relevant request, project, deliverable, task, approval, comment, or magic link context where appropriate.
- Audit logs are protected records and should remain conceptually separate from visible project activity.

## Conceptual Entities Under Consideration

- tenants
- tenant_memberships
- users
- departments
- initiatives
- campaigns
- programs_content_streams
- sermon_series
- seasons
- ministry_areas
- topics
- tags
- strategic_context_relationships
- projects
- project_statuses
- project_requests
- request_statuses
- deliverables
- deliverable_statuses
- project_contacts
- reviewer_assignments
- approvals
- comments
- comment_threads
- project_feed_events
- budgets
- time_entries
- magic_links
- notifications
- notification_preferences
- notification_digests
- activity_logs
- audit_logs
- assets
- asset_usages
- asset_versions
- asset_rights
- release_permissions
- archive_packages
- brand_assets
- brand_guidelines
- ministry_brand_profiles
- templates
- template_deliverables
- template_tasks
- project_closeout_checklists
- backup_policies
- task_statuses
- approval_statuses
- review_assignment_types

## Open Questions

- What is the initial schema?
- Which strategic context entities should be first-class tables in MVP versus represented by tags/templates initially?
- Which entities need status histories or audit logs?
- What project feed event types are required for MVP?
- Which closeout entities are needed in MVP versus post-MVP?
- Should project statuses be configurable per church?
- Which deliverable statuses are required for MVP?
- Which task statuses are required for MVP?
- How should department utilization reporting be modeled without overbuilding analytics?
- Which search fields are required for first release?
- Should email replies be captured as comments or separate inbound message records?

## Notes

- Avoid MySQL-first assumptions in future setup instructions.
- Avoid depending on host-specific constraints or old PostgreSQL behavior.
- Plan for eventual migration to a newer server or managed PostgreSQL environment before serious production use.
- This file documents conceptual entities only. Do not create schemas or migrations until implementation is explicitly requested.
- Asset metadata should remain searchable even when physical files live in different storage systems.
- Use `tenant_id` scoping consistently for tenant-owned data.
- Most production tasks should attach to deliverables. General coordination tasks may attach directly to projects.
- Tasks belong to a project and may optionally belong to a deliverable.
- Tasks should not attach directly to campaigns in MVP.
- Campaigns, initiatives, programs/content streams, sermon series, seasons, ministry areas, topics, and tags should not replace project ownership for operational work.
- Notifications, comments, activity logs, and audit logs should be modeled as related but distinct concepts.
- Department Leader, stakeholder, and vendor are real-world identities or relationships that may map onto canonical roles; they should not become separate base permission-role tables by default.
- Task status enums should follow the canonical MVP list and avoid extra workflow labels until explicitly approved.
- Waiting for Approval should be modeled for deliverables or reviewable elements, not as a project status.
- Goal alignment details are documented in `/docs/product/STRATEGIC_CONTEXT_AND_GOAL_ALIGNMENT.md`.

Last Updated: 2026-05-29
