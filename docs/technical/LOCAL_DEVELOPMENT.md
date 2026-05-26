# Local Development

## Purpose

Document how contributors should run the project locally once implementation begins.

## Current Decisions

- The initial Laravel application scaffold lives in `resources/Laravel/starterkit`.
- Laravel dependencies are installed from inside `resources/Laravel/starterkit`.
- Local development was validated before Laravel scaffolding began.
- Node.js 22.18.0 and npm 11.12.1 are currently available on Brent's local machine.
- PHP 8.5.6, Composer 2.9.8, PostgreSQL 16.14, Node.js 22.18.0, npm 11.12.1, and Git 2.50.1 are currently available on Brent's local machine.
- PHP `pdo_pgsql` and `pgsql` extensions are installed locally.
- Use `npm run check:local` to run the lightweight local readiness check. The check auto-loads `/opt/homebrew` paths when Homebrew is installed there.
- Preferred local runtime target should match or exceed hosting where practical:
  - PHP 8.4 preferred for parity with hosting; the scaffold targets Laravel 13 and must remain compatible with host PHP 8.4. Local PHP is currently newer at 8.5.6 and should be watched for Laravel dependency compatibility.
  - Node.js 22.x for the docs site and modern frontend tooling.
  - PostgreSQL locally, with current hosting.com/cPanel PostgreSQL used only for early staging/proof. PostgreSQL 15/16+ is preferred for future production.

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

Current local result on 2026-05-24:

| Tool | Status | Notes |
|---|---|---|
| PHP | Pass | `PHP 8.5.6` |
| Composer | Pass | `Composer 2.9.8` |
| Node.js | Pass | `v22.18.0` |
| npm | Pass | `11.12.1` |
| PostgreSQL CLI | Pass | `psql 16.14` |
| PostgreSQL server tools | Pass | `postgres 16.14` |
| PHP PostgreSQL extensions | Pass | `pdo_pgsql` and `pgsql` installed |
| Git | Pass | `2.50.1` |

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

The local toolchain is ready for Laravel development from a runtime perspective. Keep in mind that local PHP 8.5.6 is newer than the confirmed host PHP 8.4.21, so Composer constraints and dependency compatibility should be checked carefully.

If admin access is available, install Homebrew first and then install the missing tools:

```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
brew install php composer postgresql@16
brew services start postgresql@16
npm run check:local
```

If another machine needs setup and admin access is not available, use Laravel Herd for PHP/Composer and either a user-installable PostgreSQL app or a remote development database. Re-run `npm run check:local` after setup.

## Open Questions

- Should local PHP be pinned to 8.4 for closer hosting parity, or is PHP 8.5 acceptable during early scaffold work?
- Should frontend assets be built with local Node 22.x even though the host cPanel Node app currently provides Node 20.20.2?
- Should local development remain on PostgreSQL 16 to match the preferred future production direction, even while early staging may use older PostgreSQL?

## Notes

- Laravel-specific commands should be run from `resources/Laravel/starterkit`.
- Do not commit local `.env` files, database credentials, or Composer auth files.
- Start the local Laravel app with `php artisan serve --host=127.0.0.1 --port=8000`.
- Start Vite with `npm run dev -- --host 127.0.0.1`.
- The local login URL is `http://127.0.0.1:8000/login`.
- The seeded local test account is `test@example.com` / `password`.
- If the test user already exists, `php artisan migrate --seed` should update it instead of failing on a duplicate email.

Last Updated: 2026-05-26
