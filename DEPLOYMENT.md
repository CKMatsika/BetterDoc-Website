# Deploying BetterDoc-Website to Laravel Cloud

## 1. Push to its own GitHub repository
Keep this marketing site in a **separate Git repository** from the BetterDoc DMS core repository:
```shell
git remote add origin https://github.com/<your-org>/betterdoc-website.git
git push -u origin main
```
Ensure `.env` and `database/*.sqlite*` stay uncommitted (both are excluded in `.gitignore`).

## 2. Create the Laravel Cloud application
- Connect your `betterdoc-website` GitHub repository in Laravel Cloud (`cloud.laravel.com`).
- Select **PHP 8.4** and enable Node for Vite builds.
- Provision a managed **PostgreSQL** or **MySQL** database and connect it to the environment.
- Optionally enable a managed **Queue worker** (`QUEUE_CONNECTION=database`) so contact form `LeadReceived` emails queue cleanly.

## 3. Configure environment variables
Copy keys from `.env.example` into your Laravel Cloud environment variables:
- `APP_NAME="BetterDoc DMS"`, `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL=https://your-marketing-domain.com`
- `SESSION_DRIVER=database`, `SESSION_ENCRYPT=true`, `SESSION_SECURE_COOKIE=true`
- `CACHE_STORE=database`, `QUEUE_CONNECTION=database`
- **Portal CTA Links (optional):**
  - `SITE_PORTAL_URL=https://app.your-domain.com/login` (renders a **Sign in** button in the header)
  - `SITE_SIGNUP_URL=https://app.your-domain.com/register` (renders a **Create Organisation** button in the header)
- **Mail / Notifications:** Configure SMTP (`MAIL_*`) or attach Resend in Laravel Cloud (install `resend/resend-php` if using `cloud resend:attach`), and set `LEAD_NOTIFICATION_EMAIL`.
- **Admin Seeding:** Set `ADMIN_EMAIL` and a strong `ADMIN_PASSWORD` (plus `ADMIN_2FA_ENABLED=true` and `ADMIN_2FA_SECRET` if desired), then run `php artisan db:seed --force` once via remote command.

## 4. Build & Deploy commands (Laravel Cloud)
- **Build command:**
```shell
composer install --no-dev --optimize-autoloader
npm ci
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```
- **Deploy command:**
```shell
php artisan migrate --force
```
*(Do not add `php artisan storage:link`, `php artisan queue:restart`, or `php artisan optimize:clear` to deploy hooks on Laravel Cloud; filesystem changes during deploy hooks are non-persistent and Cloud manages workers automatically.)*

## 5. Custom domain & Security
- Add your custom domain in Laravel Cloud and update DNS records (`HTTPS` + `Strict-Transport-Security` + `trustProxies('*')` are preconfigured).
- The `/admin` leads console includes `noindex,nofollow`, IP rate limiting, and CSV formula-injection neutralization.
