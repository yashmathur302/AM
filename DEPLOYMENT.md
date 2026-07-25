# Deploying to shared hosting

This app targets standard cPanel-style shared hosting: PHP-FPM, MySQL, no
SSH long-running processes, cron for scheduled tasks.

## One-time server setup

1. Create a MySQL database and user in the hosting control panel, then set
   `DB_*` in `.env` to match.
2. Point the domain's document root at this project's `public/` folder. If
   the host only allows the domain root to be `public_html` and you cannot
   change the document root, upload the app outside `public_html` and copy
   the contents of `public/` into `public_html`, editing the two `require`
   paths in `public_html/index.php` to point at `../vendor/autoload.php`
   and `../bootstrap/app.php` in the app's real location.
3. Copy `.env.example` to `.env` and fill in real values (`APP_KEY`,
   `DB_*`, `MAIL_*`, `SEO_*`, `ADMIN_EMAIL`/`ADMIN_PASSWORD`). Never commit
   `.env`.
4. Add one cron job (most hosts: cPanel → Cron Jobs), every minute:
   ```
   * * * * * cd /home/USER/path-to-app && php artisan schedule:run >> /dev/null 2>&1
   ```
   This drains the queued contact-form emails (`queue:work --stop-when-empty`,
   registered in `routes/console.php`) since shared hosting cannot run a
   persistent queue worker.

## Every deploy

Node/npm is almost never available on shared hosting, so **build assets on
your machine (or CI) and upload the built files** — do not expect to run
`npm run build` on the server.

```bash
composer install --no-dev --optimize-autoloader
npm install
npm run build            # produces public/build/*
```

Upload the whole project (excluding `.env`, `node_modules/`, `.git/`) to the
server, or `git pull` on the server if it has git available, then run:

```bash
php artisan migrate --force
php artisan db:seed --class=PageSeeder --force   # only needed once, or after adding new static pages
php artisan storage:link                          # if the host disallows symlinks, copy
                                                    # storage/app/public/* into public/storage/ instead
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

If you change `.env`, run `php artisan config:clear` before re-caching, or
stale cached config will be served.

## HTTPS

Once a certificate is installed (most hosts offer free AutoSSL/Let's
Encrypt), uncomment the HTTPS redirect block at the top of `public/.htaccess`
and set `APP_URL=https://yourdomain.com` in `.env`. `AppServiceProvider`
forces HTTPS URL generation automatically when `APP_ENV=production`.

If the host puts a CDN or load balancer in front of the app (e.g.
Cloudflare), set `TRUSTED_PROXIES` in `.env` (comma-separated IPs, or `*`
only if you understand the risk) so `X-Forwarded-Proto` is honoured and
HTTPS detection/redirects work correctly.

## First admin login

`AdminUserSeeder` creates/promotes the admin user from `ADMIN_EMAIL` /
`ADMIN_PASSWORD` in `.env` — set a strong, unique password before seeding
in production, then remove or change those two lines from `.env` afterwards
so the credentials aren't sitting in a config file.
