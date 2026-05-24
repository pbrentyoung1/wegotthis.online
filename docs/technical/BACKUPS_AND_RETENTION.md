# Backups and Retention

## Purpose

Document backup, restore, and retention requirements for ForWorship Creative.

## Current Decisions

- Working decision: backups are a core product requirement, not an afterthought.
- Database backups and file/archive backups must be planned before production launch.
- Initial production file backups must cover local server storage until the product moves to S3-compatible object storage.
- Retention policies should protect institutional creative memory.
- Losing a church's communications archive would be catastrophic.
- Specific backup tooling is undecided.

## Backup Areas

- PostgreSQL database backups.
- Uploaded files and media library assets.
- Archive packages created during project closeout.
- Brand assets and templates.
- Configuration data such as tenant settings, roles, permissions, and integration settings.

## Restore Process

- Restore documentation should exist before launch.
- Restore testing should be part of production readiness.
- The system should support restoring database and files together so metadata and physical assets remain aligned.

## Retention Policies

- Archive retention should favor long-term preservation unless a church explicitly configures otherwise.
- Retention rules may differ for source files, final deliverables, vendor files, photos, videos, and generated previews.
- Rights, releases, and copyright restrictions may affect how long assets can be used or displayed.

## Open Questions

- Which backup tooling should be used for PostgreSQL?
- Where will local server file backups be stored during the initial single-tenant phase?
- Which S3-compatible provider will hold files and backups after the multi-tenant transition?
- How often should backups run?
- How long should database and archive backups be retained?
- Who can request or perform a restore?

## Notes

- Backup planning should happen before production deployment, not after MVP code is complete.

Last Updated: 2026-05-24
