# Deployment

## Purpose

Document hosting, deployment, release, and environment direction.

## Current Decisions

- Use the current hosting.com/cPanel environment for early staging and proof-of-stack.
- The current hosting.com/cPanel environment is not the final serious production infrastructure decision.
- Move to a newer server or managed infrastructure before serious production use.
- cPanel and SSH access are available.
- GitHub will be the source of truth.
- A lightweight PHP diagnostic site exists in `host-diagnostics/` to validate the target hosting stack before Laravel is scaffolded.

## Infrastructure Posture

- Current host: early staging and proof-of-stack on hosting.com/cPanel.
- Future host: newer production server or managed infrastructure before serious production use.
- Avoid lock-in to cPanel-specific behavior, old PostgreSQL behavior, or host-specific paths.
- Keep the application portable through Laravel abstractions for storage, queues, scheduling, environment configuration, and database access.
- Document assumptions when the current host requires a workaround.

## Host Diagnostics

- Deploy `host-diagnostics/` to a temporary subdomain such as `diagnostics.forworship.org` or `staging.forworship.org`.
- Point the subdomain document root to `host-diagnostics/public` when possible.
- Copy `host-diagnostics/config/diagnostics.example.php` to `host-diagnostics/config/diagnostics.local.php` on the server and fill in temporary PostgreSQL connection settings.
- Set `ACCESS_KEY` in the local config or otherwise protect/remove the diagnostic page because it exposes server capability information.
- Use the dashboard to review PHP version, required PHP extensions, PostgreSQL connectivity, filesystem writes, document root behavior, environment access, Composer/Node hints, cron ping behavior, queue-worker constraints, HTTPS, and server limits.
- Deployed diagnostic results have been reviewed and support early staging/proof on the current host.

## Current Host Signals

- SSH on `worship@mi3-sr7` reports PHP CLI 8.4.21.
- Composer 2.6.5 is available through cPanel, with PHP 8.4 deprecation notices.
- Node and npm are not installed in the normal tested shell, but cPanel's Node.js application feature successfully ran a temporary app at `forworship.org/node` with Node.js 20.20.2 and npm 10.8.2.
- The activated cPanel Node environment resolves `node` to `/home/worship/nodevenv/node-test/20/bin/node` and `npm` to `/home/worship/nodevenv/node-test/20/bin/npm`.
- `psql` 9.6.22 is available, and `pdo_pgsql` plus `pgsql` are enabled for PHP.
- Deployed diagnostics at `diagnostics.forworship.org` confirm PHP 8.4.21, required extensions, PostgreSQL PDO connectivity, filesystem writes, public script path, environment access, HTTPS, and strong PHP limits.
- Web PHP shell path does not expose Composer, Node, or npm even though Composer is available in SSH and Node/npm are available through the cPanel Node app environment.
- Cron web-hit ping has run successfully. Manual ping returned `OK 2026-05-24T21:58:33+00:00`, and scheduled cPanel cron updated the timestamp to `2026-05-24T22:05:02+00:00`; Laravel scheduler CLI behavior and long-running queue worker support remain unverified.

## PostgreSQL Posture

- PostgreSQL 9.6 is confirmed on the current host and is acceptable only as a short-term proof-of-stack signal.
- PostgreSQL 9.6 should not be considered acceptable for long-term production.
- PostgreSQL 13 is acceptable for early staging/proof if that is the available upgrade path.
- PostgreSQL 15/16+ is preferred for future production.
- Keep migrations and database usage conservative while the project remains on the current host.
- Avoid depending on old PostgreSQL behavior or host-specific constraints.
- Plan for eventual migration to a newer server or managed PostgreSQL environment.

## Queue And Scheduler Posture

- Do not assume long-running queue workers are available on cPanel/reseller hosting.
- Early staging may use cron-driven Laravel scheduler commands and `queue:work --stop-when-empty` if needed.
- Revisit the long-running worker strategy when moving to newer production infrastructure.

## Storage Posture

- Local server storage is acceptable for initial single-tenant proof/staging.
- File storage must remain abstracted through Laravel storage APIs.
- S3-compatible storage, such as Cloudflare R2, remains the preferred future direction for scalable production.

## Open Questions

- What is the exact deployment process from GitHub to hosting.com?
- Should frontend assets be built locally/CI, or should deployment use cPanel's Node.js app environment and activation commands?
- How will Laravel scheduler CLI commands, queue jobs, and storage links be handled on this hosting plan?
- Can the production app subdomain document root be pointed directly to Laravel's `public` directory?
- When should ForWorship Creative migrate from hosting.com/cPanel staging to a newer production server or managed infrastructure?

## Notes

- Deployment planning should happen before Laravel scaffolding if hosting constraints may affect setup.

Last Updated: 2026-05-24
