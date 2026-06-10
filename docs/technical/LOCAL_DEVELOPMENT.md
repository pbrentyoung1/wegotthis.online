# Local Development

## Purpose

Document how contributors should run the project locally once implementation begins.

## Current Decisions

- No application has been scaffolded yet.
- No Laravel dependencies are required for the repository in its current state.
- Local development should be validated before Laravel scaffolding begins.
- Node.js 22.18.0 and npm 11.12.1 are currently available on Brent's local machine.
- PHP 8.5.6, Composer 2.9.8, PostgreSQL 16.14, Node.js 22.18.0, npm 11.12.1, and Git 2.50.1 are currently available on Brent's local machine.
- PHP `pdo_pgsql` and `pgsql` extensions are installed locally.
- Use `npm run check:local` to run the lightweight local readiness check. The check auto-loads `/opt/homebrew` paths when Homebrew is installed there.
- Preferred local runtime target should match or exceed hosting where practical:
  - PHP 8.4 preferred for parity with hosting. The checked-in Laravel 13 base requires PHP 8.2 or newer. Local PHP is currently newer at 8.5.6 and should be watched for dependency compatibility.
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

Use one of these approaches before scaffolding Laravel:

1. Laravel Herd for PHP and Composer, plus a local PostgreSQL install or managed local PostgreSQL app.
2. Docker-based PostgreSQL with local PHP/Composer installed separately.
3. Full Docker/Sail-style setup after Laravel exists, if native PHP setup proves noisy.

The local toolchain is now ready for Laravel scaffolding from a runtime perspective. Before scaffolding, keep in mind that local PHP 8.5.6 is newer than the confirmed host PHP 8.4.21, so Composer constraints and dependency compatibility should be checked carefully.

If admin access is available, install Homebrew first and then install the missing tools:

```bash
/bin/bash -c "$(curl -fsSL https://raw.githubusercontent.com/Homebrew/install/HEAD/install.sh)"
brew install php composer postgresql@16
brew services start postgresql@16
npm run check:local
```

If another machine needs setup and admin access is not available, use Laravel Herd for PHP/Composer and either a user-installable PostgreSQL app or a remote development database. Re-run `npm run check:local` after setup.

## Open Questions

- Should local PHP be pinned to 8.4 for closer hosting parity, or is PHP 8.5 acceptable for pre-scaffold work?
- Should frontend assets be built with local Node 22.x even though the host cPanel Node app currently provides Node 20.20.2?
- Should local development remain on PostgreSQL 16 to match the preferred future production direction, even while early staging may use older PostgreSQL?

## Notes

- Add Laravel-specific commands only after the application exists.
- Do not commit local `.env` files, database credentials, or Composer auth files.

Last Updated: 2026-05-24
