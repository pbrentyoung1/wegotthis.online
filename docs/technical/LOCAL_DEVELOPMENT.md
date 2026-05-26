# Local Development

## Purpose

Document how contributors should run the project locally once implementation begins.

## Current Decisions

- The initial Laravel application scaffold lives in `resources/Laravel/starterkit`.
- Laravel dependencies are installed from inside `resources/Laravel/starterkit`.
- Local development was validated before Laravel scaffolding began.
- Keep local development aligned with the confirmed staging/runtime floor wherever practical so auth, profile, and workflow work does not drift from the server.
- Host-confirmed runtime baseline is PHP 8.4.21 and Node.js 20.20.2 through cPanel's Node.js application environment.
- Brent's current local machine has newer tool versions available, so parity must be checked intentionally rather than assumed.
- PHP `pdo_pgsql` and `pgsql` extensions are installed locally.
- Use `npm run check:local` to run the lightweight local readiness check. The check auto-loads `/opt/homebrew` paths when Homebrew is installed there.
- Preferred local runtime target should prioritize hosting parity first:
  - PHP 8.4.x is the compatibility target because the confirmed host CLI/web runtime is PHP 8.4.21. Composer dependency resolution should stay pinned to PHP 8.4.21 even on newer local machines.
  - Node.js 20.20.2 is the preferred local target for parity with the confirmed cPanel Node.js app environment. Any local Node newer than that should still be treated as a compatibility risk until the app is verified under the 20.20.x line.
  - PostgreSQL locally may remain newer, but schema and query usage must stay conservative while early staging may still involve older host PostgreSQL.

## Local Readiness Check

Run from the repository root:

```bash
npm run check:local
```

The check reports:

- `php -v`
- `composer --version`
- `node -v`
- `npm -v`
- `psql --version`
- `postgres --version`
- PHP `pdo_pgsql` and `pgsql` extensions when PHP is available
- Git availability
- parity warnings when local PHP drifts from host PHP 8.4.x or local Node drifts from the host-compatible Node 20.20.x target

Current baseline expectations:

| Tool | Status | Notes |
|---|---|---|
| PHP | Pass, parity target | Host-compatible target is `PHP 8.4.21` |
| Composer | Pass | Available locally and on host |
| Node.js | Pass, parity target | Host-compatible target is `v20.20.2` |
| npm | Pass | Host cPanel Node app confirmed `10.8.2`; newer local npm is acceptable if builds remain Node 20 compatible |
| PostgreSQL CLI | Pass | Local `psql` is required even though host PostgreSQL is older |
| PostgreSQL server tools | Pass | Local `postgres` is required for local development |
| PHP PostgreSQL extensions | Pass | `pdo_pgsql` and `pgsql` installed |
| Git | Pass | Required |

Attempted setup on 2026-05-24:

- Official Homebrew installer was attempted in non-interactive mode.
- It stopped because it requires sudo/admin access on this Mac.
- A sudo-free fetch into the existing `/opt/homebrew` directory did not complete and was stopped.
- Homebrew was then installed manually with admin access, and PHP, Composer, and PostgreSQL were installed successfully.

## Recommended Local Setup Path

Use one of these approaches for additional local machines:

1. Laravel Herd for PHP and Composer, plus a local PostgreSQL install or managed local PostgreSQL app.
2. Docker-based PostgreSQL with local PHP/Composer installed separately.
3. Full Docker/Sail-style setup after Laravel exists, if native PHP setup proves noisy.

The local toolchain is ready for Laravel development, but parity matters more than "latest". Use the host-confirmed PHP and Node baselines when making decisions about dependencies, language features, and frontend tooling behavior.

If admin access is available, install Homebrew first and then install the missing tools:

```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
brew install php composer postgresql@16
brew services start postgresql@16
npm run check:local
```

If local PHP is newer than 8.4, keep Composer resolution pinned to the host baseline through `resources/Laravel/starterkit/composer.json` and verify application work against PHP 8.4-compatible behavior.

If another machine needs setup and admin access is not available, use Laravel Herd for PHP/Composer and either a user-installable PostgreSQL app or a remote development database. Re-run `npm run check:local` after setup.

## Open Questions

- Should this machine install PHP 8.4 alongside newer PHP so local CLI execution can match hosting exactly?
- Should Node 20.20.2 be installed locally alongside newer Node versions so app asset builds can be rechecked on the exact host-compatible line?
- Should local development remain on PostgreSQL 16 to match the preferred future production direction, even while early staging may use older PostgreSQL?

## Notes

- Laravel-specific commands should be run from `resources/Laravel/starterkit`.
- Do not commit local `.env` files, database credentials, or Composer auth files.
- Run `composer install` and dependency resolution with the existing Composer platform pin so packages stay compatible with PHP 8.4.21.
- Start the local Laravel app with `php artisan serve --host=127.0.0.1 --port=8000`.
- Start Vite with `npm run dev -- --host 127.0.0.1`.
- The local login URL is `http://127.0.0.1:8000/login`.
- The seeded local test account is `test@example.com` / `password`.
- If the test user already exists, `php artisan migrate --seed` should update it instead of failing on a duplicate email.

Last Updated: 2026-05-26
