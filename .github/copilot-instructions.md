# Copilot Instructions for RH-Manager

The RH-Manager repository is a Laravel 10 application managed via Docker (Laravel Sail), MySQL, and Vite for frontend asset bundling. These notes highlight critical patterns, workflows, and integration points to accelerate AI-driven code assistance.

## 1. Architecture Overview

- **Backend (Laravel)**
  - Source: `app/` directory, service providers in `app/Providers`
  - Models: `app/Models` (e.g., `User.php`, `UserDetail.php`, `Department.php`)
  - Controllers: `app/Http/Controllers`
  - Auth: Custom Fortify logic in `app/Actions/Fortify` overrides
- **Routes**
  - HTTP routes: `routes/web.php`
  - API routes: `routes/api.php`
- **Frontend (Vite)**
  - Config: `vite.config.js` bundles `resources/js` and `resources/css`
- **Database**
  - Migrations: `database/migrations`
  - Seeders: `database/seeders`
  - Factories: `database/factories/UserFactory.php`
- **Testing**
  - PHPUnit config: `phpunit.xml`
  - Unit tests: `tests/Unit`
  - Feature tests: `tests/Feature`

## 2. Local Setup & Development Workflow

1. Copy environment file:
   ```bash
   cp .env.example .env
   ```
2. Install PHP dependencies:
   ```bash
   composer install
   ```
3. Install JS dependencies:
   ```bash
   npm install
   ```
4. Start Docker (Laravel Sail):
   ```bash
   ./vendor/bin/sail up -d
   ```
5. Run migrations & seeders:
   ```bash
   ./vendor/bin/sail artisan migrate --seed
   ```
6. Start Vite dev server (assets):
   ```bash
   npm run dev
   ```
7. Execute tests:
   ```bash
   ./vendor/bin/sail test
   ```

## 3. Key Conventions & Patterns

- **Eloquent Relationships**: define `hasOne()` and `belongsTo()` in models (e.g., `User::detail()`, `User::department()`).
- **Fortify Overrides**: look at `app/Actions/Fortify/CreateNewUser.php` (or similar) for custom registration flows.
- **Blade Layouts**: global layout parts in `layouts/header.php`, `layouts/sidebar.php`, `layouts/footer.php` under `/layouts`.
- **Middleware Pipeline**: inspect `app/Http/Kernel.php` for middleware ordering.

## 4. External Integrations

- **Mail**: Mailpit is configured in `docker-compose.yml` (port 8025). Use `MAIL_MAILER=smtp`, `MAIL_HOST=mailpit` in `.env`.
- **Database**: MySQL service healthchecks in `docker-compose.yml` ensure readiness before migrations.
- **Debugging**: Xdebug toggle via `.env` (`SAIL_XDEBUG_MODE`). Use `sail artisan tinker` for REPL access.

## 5. Troubleshooting & Tips

- Asset paths served from `/public`—check `public/assets` if builds fail.
- Fix CSRF issues by verifying `XSRF-TOKEN` cookie in dev proxy (`VITE_PORT`).
- For failing tests, inspect `tests/_output` logs and ensure database state resets (`RefreshDatabase` trait).

---

*Please review and provide feedback on any unclear or missing sections so we can refine these instructions.*