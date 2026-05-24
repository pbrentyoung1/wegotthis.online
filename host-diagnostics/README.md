# ForWorship Creative Host Diagnostics

## Purpose

This is a lightweight, deployable diagnostic site for testing whether the target hosting.com/cPanel environment can support the planned ForWorship Creative stack:

- Laravel 12
- PHP 8.3 or newer, with PHP 8.4 preferred if available
- PostgreSQL
- Vue/Inertia assets built locally, in CI, or on the host if Node/npm are available

This is not the real application. Do not use it for production app logic, real user workflows, or credential storage beyond temporary hosting validation.

## Deployment

Suggested diagnostic subdomains:

- `diagnostics.forworship.org`
- `staging.forworship.org`

Upload `host-diagnostics/` to the hosting account and point the subdomain document root to:

```text
host-diagnostics/public
```

If cPanel cannot point directly to the `public` directory, the diagnostic page will show a yellow document-root warning. That result matters because the future Laravel application should also serve from its `public` directory.

## Local Config

Copy the committed example config:

```bash
cp host-diagnostics/config/diagnostics.example.php host-diagnostics/config/diagnostics.local.php
```

Edit `host-diagnostics/config/diagnostics.local.php` on the server:

```php
<?php

return [
    'ACCESS_KEY' => 'choose-a-temporary-access-key',

    'DB_HOST' => 'localhost',
    'DB_PORT' => '5432',
    'DB_DATABASE' => 'database_name',
    'DB_USERNAME' => 'database_user',
    'DB_PASSWORD' => 'database_password',
    'DB_SSLMODE' => 'prefer',
];
```

Do not commit `diagnostics.local.php`. It is ignored by Git.

## Access Key Protection

If `ACCESS_KEY` is set, access the diagnostics with:

```text
https://diagnostics.forworship.org/?key=VALUE
```

If `ACCESS_KEY` is not set, the page will still run but will show a prominent public diagnostics warning.

## Included Checks

- PHP version and Laravel 12 minimum readiness
- Required PHP extensions
- PostgreSQL connectivity through PDO
- Filesystem write/read/delete behavior
- Public document root alignment
- Environment variable readability
- Composer availability hint
- Node/npm availability hint
- Cron ping timestamp
- Queue worker hosting reality check
- HTTPS/SSL detection
- Safe server limits and PHP configuration values

The page intentionally does not display passwords, cookies, sessions, full request headers, or application secrets.

## Cron Test

The optional cron endpoint is:

```text
https://diagnostics.forworship.org/cron-ping.php
```

It writes a timestamp file under `host-diagnostics/storage/cron-ping.json`. The main diagnostic page shows the most recent ping.

Example cPanel cron using HTTP:

```bash
curl -fsS https://diagnostics.forworship.org/cron-ping.php >/dev/null 2>&1
```

Example cPanel cron using PHP CLI:

```bash
php /home/ACCOUNT/path/to/host-diagnostics/public/cron-ping.php >/dev/null 2>&1
```

## Manual SSH Commands

Run these from SSH on the hosting account when available:

```bash
php -v
php -m
composer --version
node -v
npm -v
psql --version
```

After Laravel is scaffolded, test scheduler and queue assumptions with:

```bash
php artisan schedule:run
php artisan queue:work --stop-when-empty
```

Long-running queue workers may not be allowed on reseller/shared hosting. The MVP may need a database queue with cron-driven `queue:work --stop-when-empty`.

## Status Meanings

- Green: detected and acceptable for the planned stack.
- Yellow: unknown, optional, or needs manual confirmation.
- Red: missing or failed, and should be resolved before relying on this host for the Laravel application.

## Required Before Laravel Scaffolding

Before Laravel scaffolding begins, hosting validation should confirm:

- PHP 8.3+ is available for the target subdomain or application runtime.
- Required Laravel PHP extensions are installed.
- PostgreSQL is available and reachable from PHP.
- The host can write to storage/cache-style directories.
- The subdomain can point to a `public` document root.
- SSH, Composer, Node/npm, cron, queue, and deployment constraints are understood.

This diagnostic site only creates the validation tool. Hosting validation is complete only after it is deployed and the red/yellow/green results are reviewed.

## Cleanup

This diagnostic page exposes server capability information. Remove it or protect it after testing.
