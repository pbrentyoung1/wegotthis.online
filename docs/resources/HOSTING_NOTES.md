# Hosting Notes

## Purpose

Collect hosting.com, cPanel, SSH, deployment, and environment notes.

## Current Decisions

- Use the current hosting.com/cPanel environment for early staging and proof-of-stack.
- The current host is not the final serious production infrastructure decision.
- Move to a newer server or managed infrastructure before serious production use.
- cPanel and SSH access are available.
- Use `host-diagnostics/` as the first lightweight test site for the Phase 1 task: Validate hosting.com technical stack.

## Infrastructure Posture

- Current host: early staging and proof-of-stack on hosting.com/cPanel.
- Future host: newer production server or managed infrastructure before serious production use.
- Avoid lock-in to cPanel-specific behavior, old PostgreSQL behavior, or host-specific paths.
- Keep the app portable through Laravel abstractions and conservative database usage.
- Document assumptions while using the current host.

## Open Questions

- What deployment process is practical from GitHub?
- Can cron run PHP CLI commands reliably enough for Laravel scheduler and database queue checks?
- Can long-running workers run on this hosting plan, or should queues use a cron-driven `queue:work --stop-when-empty` pattern?

## Manual SSH Findings

Captured from `worship@mi3-sr7` in `~/public_html` on 2026-05-24:

| Check | Result | Notes |
|---|---|---|
| PHP CLI | PHP 8.4.21 | Meets Laravel 12 PHP requirement; PHP 8.4 preferred/confirmed for CLI. |
| Required PHP extensions | Strong | Many required extensions are present, including `bcmath`, `ctype`, `curl`, `dom`, `fileinfo`, `gd`, `intl`, `json`, `mbstring`, `openssl`, `PDO`, `tokenizer`, `xml`, and `zip`. |
| PostgreSQL PHP extensions | Enabled | `pdo_pgsql` and `pgsql` are enabled. Actual PostgreSQL connection is confirmed in the deployed diagnostic findings below. |
| Composer | Composer 2.6.5 | Available, but emits PHP 8.4 `E_STRICT` deprecation notices from the cPanel Composer phar. |
| Node/npm in normal SSH shell | Not installed | `node` and `npm` returned `command not found` from `~/public_html`. |
| cPanel Node.js app | Node.js 20.20.2 and npm 10.8.2 confirmed | Temporary app at `forworship.org/node` works through cPanel's Node.js application feature. Activated environment uses `/home/worship/nodevenv/node-test/20/bin/node` and `/home/worship/nodevenv/node-test/20/bin/npm`. |
| PostgreSQL client | `psql` 9.6.22 | CLI client exists, but this does not confirm server/database availability or PHP driver support. |

## Deployed Diagnostic Findings

Captured from `https://diagnostics.forworship.org` on 2026-05-24:

| Check | Result | Notes |
|---|---|---|
| Access protection | Pass | `ACCESS_KEY` protection is enabled. |
| PHP web runtime | Pass | PHP 8.4.21 through LiteSpeed, using `/opt/alt/php84/etc/php.ini`. |
| Required PHP extensions | Pass | Required extensions are installed, including `pdo_pgsql` and `pgsql`; `gd` is available for image handling. |
| PostgreSQL PDO connection | Pass | Connection succeeded. Server reports PostgreSQL 9.6.22. |
| Filesystem write test | Pass | Diagnostic created, read, and deleted a file in `host-diagnostics/storage/test-write`. |
| Public path | Pass with note | Script runs from `/home/worship/public_html/host-diagnostics/public/index.php`. `DOCUMENT_ROOT` reports `/home/worship/public_html/host-diagnostics`, so Laravel deployment should verify subdomain document root behavior carefully. |
| Environment access | Pass | `getenv()` is readable; `$_ENV` is empty; `$_SERVER` is available. |
| HTTPS | Pass | `diagnostics.forworship.org` is served over port 443. |
| Composer from web PHP | Yellow | `shell_exec` works, but `composer` is not in the web PHP shell path. Composer is available from SSH. |
| Node/npm from web PHP | Yellow | `node` and `npm` are not in the web PHP shell path. cPanel Node app environment provides Node.js 20.20.2 and npm 10.8.2. |
| Cron ping | Pass | Manual ping returned `OK 2026-05-24T21:58:33+00:00`; scheduled cPanel cron updated the timestamp to `2026-05-24T22:05:02+00:00`. |
| Queue worker | Yellow | Long-running Laravel workers still need manual hosting policy validation. |
| Server limits | Strong | `memory_limit` 768M, upload/post max 128M, max execution 300 seconds, max file uploads 20. |

## Version And Portability Guidance

- PostgreSQL 9.6 is confirmed on the current host and is acceptable only as a short-term proof-of-stack signal.
- PostgreSQL 9.6 should not be considered acceptable for long-term production.
- PostgreSQL 13 is acceptable for early staging/proof if that is the available upgrade path.
- PostgreSQL 15/16+ is preferred for future production.
- Keep migrations and database usage conservative while on the current host.
- Do not depend on host-specific constraints or old PostgreSQL behavior.
- Local server storage is acceptable for initial single-tenant proof/staging, but file storage should remain abstracted.
- S3-compatible storage such as Cloudflare R2 remains the preferred future direction for scalable production.
- Do not assume long-running queue workers are available on cPanel/reseller hosting.
- Early staging may use cron-driven Laravel scheduler and queue work with `--stop-when-empty` if needed.

## Notes

- Verify hosting constraints before finalizing application setup.
- The diagnostic site should be deployed to `diagnostics.forworship.org` or `staging.forworship.org`, protected with `ACCESS_KEY`, and removed or protected after testing.
- Core Laravel 12 + PostgreSQL runtime requirements are now confirmed by the deployed diagnostic. HTTP-triggered cPanel cron is confirmed. Laravel scheduler/queue command strategy and exact GitHub-to-host deployment process remain open.
- Node.js and npm are available through cPanel application setup, but normal SSH does not expose them globally. Deployment should account for cPanel's activation/virtual environment commands or use local/CI asset builds.

Last Updated: 2026-05-24
