# Multi-Tenancy

## Purpose

Capture tenant strategy and related architecture questions.

## Current Decisions

- Build with multi-tenancy in mind from the beginning, even if the first version serves one church.
- Working decision: use a single PostgreSQL database with tenant-scoped records using `tenant_id`.
- This is the MVP and likely long-term tenancy model.
- Do not use schema-per-tenant or database-per-tenant for MVP.
- A single database with `tenant_id` keeps hosting, backups, reporting, migrations, and development simpler.
- The app may later support subdomains such as `churchname.wegotthis.online`, but subdomains are not required for MVP.
- Initial app URL can be `app.wegotthis.online`, with tenant selected after login or inferred from user membership.
- Future integrations should be configurable per church or tenant.
- Planning Center credentials and sync settings should not be global unless the product remains single-tenant.

## Open Questions

- Should departments or campuses be modeled inside a tenant?
- How should per-tenant integration credentials be stored, rotated, and revoked?
- Can tenants independently enable or disable Planning Center and other connectors?
- Are custom tenant subdomains or custom domains required later?

## Notes

- Tenancy affects schema, permissions, routing, storage, and deployment.
- Tenancy will also affect external IDs, sync logs, webhook routing, and integration credential management.
- Churches must be able to use wegotthis.online without Planning Center or any other third-party integration.
- Schema-per-tenant and database-per-tenant are deferred because they add operational complexity before the product needs it.
- Tenant scoping should be treated as a core architectural concern in models, queries, permissions, files, notifications, search, and audit logs.

Last Updated: 2026-05-20
