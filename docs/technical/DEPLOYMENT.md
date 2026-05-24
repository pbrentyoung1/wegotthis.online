# Deployment

## Purpose

Document hosting, deployment, release, and environment direction.

## Current Decisions

- The project is expected to be hosted initially on a hosting.com reseller account.
- cPanel and SSH access are available.
- GitHub will be the source of truth.
- A lightweight PHP diagnostic site exists in `host-diagnostics/` to validate the target hosting stack before Laravel is scaffolded.

## Host Diagnostics

- Deploy `host-diagnostics/` to a temporary subdomain such as `diagnostics.forworship.org` or `staging.forworship.org`.
- Point the subdomain document root to `host-diagnostics/public` when possible.
- Copy `host-diagnostics/config/diagnostics.example.php` to `host-diagnostics/config/diagnostics.local.php` on the server and fill in temporary PostgreSQL connection settings.
- Set `ACCESS_KEY` in the local config or otherwise protect/remove the diagnostic page because it exposes server capability information.
- Use the dashboard to review PHP version, required PHP extensions, PostgreSQL connectivity, filesystem writes, document root behavior, environment access, Composer/Node hints, cron ping behavior, queue-worker constraints, HTTPS, and server limits.
- Hosting validation is not complete until the diagnostic site is deployed and the red/yellow/green results are reviewed.

## Current Host Signals

- SSH on `worship@mi3-sr7` reports PHP CLI 8.4.21.
- Composer 2.6.5 is available through cPanel, with PHP 8.4 deprecation notices.
- Node and npm are not installed in the normal tested shell, but cPanel's Node.js application feature successfully ran a temporary app at `forworship.org/node` with Node.js 20.20.2 and npm 10.8.2.
- The activated cPanel Node environment resolves `node` to `/home/worship/nodevenv/node-test/20/bin/node` and `npm` to `/home/worship/nodevenv/node-test/20/bin/npm`.
- `psql` 9.6.22 is available, and `pdo_pgsql` plus `pgsql` are enabled for PHP.
- Deployed diagnostics at `diagnostics.forworship.org` confirm PHP 8.4.21, required extensions, PostgreSQL PDO connectivity, filesystem writes, public script path, environment access, HTTPS, and strong PHP limits.
- Web PHP shell path does not expose Composer, Node, or npm even though Composer is available in SSH and Node/npm are available through the cPanel Node app environment.
- Cron web-hit ping has run successfully. Manual ping returned `OK 2026-05-24T21:58:33+00:00`, and scheduled cPanel cron updated the timestamp to `2026-05-24T22:05:02+00:00`; Laravel scheduler CLI behavior and long-running queue worker support remain unverified.

## Open Questions

- What is the exact deployment process from GitHub to hosting.com?
- Should frontend assets be built locally/CI, or should deployment use cPanel's Node.js app environment and activation commands?
- How will Laravel scheduler CLI commands, queue jobs, and storage links be handled on this hosting plan?
- Can the production app subdomain document root be pointed directly to Laravel's `public` directory?

## Notes

- Deployment planning should happen before Laravel scaffolding if hosting constraints may affect setup.

Last updated: 2026-05-24
