# ForWorship Creative Laravel Scaffold

Initial Laravel 13, Vue 3, Inertia, PostgreSQL, Fortify, and Inspinia application base.

## Local Setup

```bash
cd resources/Laravel/starterkit
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run build
composer test
```

For Brent's current local PostgreSQL setup, `.env` uses:

```dotenv
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=forworship_creative
DB_USERNAME=pbrentyoung
DB_PASSWORD=
DB_SSLMODE=prefer
```

Do not commit `.env`, database credentials, `vendor/`, `node_modules/`, or built local artifacts.

## Local Development

Run the app with two terminals from this directory:

```bash
php artisan serve --host=127.0.0.1 --port=8000
npm run dev -- --host 127.0.0.1
```

Open `http://127.0.0.1:8000/login`.

Seeded local credentials:

```text
Email: test@example.com
Password: password
```

## Notes

- SSR is disabled by default with `INERTIA_SSR_ENABLED=false` for cPanel staging portability.
- The `/login` screen posts to Laravel Fortify through Inertia.
- The database seeder is idempotent for the local `test@example.com` user.
- The initial settings Vue pages are placeholders to keep scaffold routes and tests stable.
- Run Laravel commands from this directory, not the repository root.
