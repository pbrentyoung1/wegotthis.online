# Database

## Purpose

Document database direction, data modeling notes, and schema questions.

## Current Decisions

- PostgreSQL should be used from day one.
- Projects should connect to related records such as media assets, tasks, approvals, messages, files, vendors, deliverables, and timelines.
- Working direction: database planning should support request intake, project lifecycle, media usage tracking, closeout, brand management, and department reporting.
- Working decision: use a single PostgreSQL database with tenant-scoped records using `tenant_id`.
- Working hierarchy: Campaigns -> Projects -> Deliverables -> Tasks.
- Campaigns are optional parent containers for large initiatives.
- Projects are the primary operational container.
- Deliverables are the specific outputs being produced.
- Tasks are the individual actions required to complete projects or deliverables.

## Conceptual Relationships

- Tenants have many users, departments, campaigns, projects, requests, assets, templates, and brand assets.
- Campaigns have many projects.
- Projects may belong to campaigns.
- Projects have many deliverables.
- Projects may have project-level tasks.
- Deliverables have many tasks, approvals, files/assets, statuses, and due dates.
- Approvals primarily belong to deliverables.
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
- campaigns
- projects
- project_statuses
- project_requests
- request_statuses
- deliverables
- deliverable_statuses
- stakeholders
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

## Open Questions

- What is the initial schema?
- Which entities need status histories or audit logs?
- What project feed event types are required for MVP?
- Which closeout entities are needed in MVP versus post-MVP?
- Should project statuses be configurable per church?
- Which deliverable statuses are required for MVP?
- How should department utilization reporting be modeled without overbuilding analytics?
- Which search fields are required for first release?
- Should email replies be captured as comments or separate inbound message records?

## Notes

- Avoid MySQL-first assumptions in future setup instructions.
- This file documents conceptual entities only. Do not create schemas or migrations until implementation is explicitly requested.
- Asset metadata should remain searchable even when physical files live in different storage systems.
- Use `tenant_id` scoping consistently for tenant-owned data.
- Most production tasks should attach to deliverables. General coordination tasks may attach directly to projects.
- Tasks should not normally attach directly to campaigns except possibly for high-level planning tasks later.
- Notifications, comments, activity logs, and audit logs should be modeled as related but distinct concepts.

Last Updated: 2026-05-20
