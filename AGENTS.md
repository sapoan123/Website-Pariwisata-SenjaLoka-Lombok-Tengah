# AGENTS.md — Laravel 12 (Sistem Booking Destinasi Wisata)

## Dev commands

```powershell
composer dev              # runs concurrently: artisan serve, queue:listen, pail, vite
php artisan test          # runs PHPUnit with phpunit.xml
./vendor/bin/pint         # format code (Laravel Pint, no local config — uses framework defaults)
./vendor/bin/pint --test  # dry-run lint check
npm run build             # Vite build (Tailwind v4)
npm run dev               # Vite dev/HMR
```

Single test: `php artisan test --filter=TestName`

## Architecture

- **Laravel 12** — `bootstrap/app.php` (post-Laravel-11 pattern).
- **Routes** — `routes/web.php` (semua route web). Tidak ada API routes atau broadcasting.
- **Auth** — Custom auth (bukan Laravel Breeze/Jetstream). Role-based: `User::isAdmin()` cek kolom `role` ('admin'/'user').
- **Models** — `User`, `Destination`, `Booking`, `Gallery`, `Testimonial`
- **Controllers** — `AuthController`, `DestinationController`, `BookingController`, `GalleryController`, `TestimonialController`

## Routes overview

| Route | Method | Description |
|---|---|---|
| `/` | GET | Homepage (6 destinations, 8 galleries, 6 testimonials) |
| `/login`, `/register` | GET/POST | User auth |
| `/admin/login`, `/admin/register` | GET/POST | Admin auth |
| `/dashboard` | GET | User dashboard (auth) |
| `/destinations/submit` | GET/POST | User submit destinasi (auth) |
| `/admin/dashboard` | GET | Admin dashboard (admin) |
| `/admin/bookings` | GET | Admin lihat bookings (admin) |
| `/admin/destinations` | CRUD | Admin kelola destinasi + approve/reject |
| `/admin/galleries` | CRUD | Admin kelola gallery |
| `/admin/testimonials` | CRUD | Admin kelola testimoni + approve |
| `/booking` | POST | User submit booking |
| `/testimonial` | POST | User submit testimoni |

## Workflow

1. **User** daftar/login → submit destinasi (pending approval) → booking → testimoni
2. **Admin** login via `/admin/login` → approve/reject destinasi & testimoni → konfirmasi booking

## Database migrations

- `users` — kolom `role` (default 'user')
- `bookings` — relasi ke user & destination, punya `status`
- `destinations` — image, title, slug, description, location, price, rating, reviews, category, status, submitted_by
- `galleries` — image, title, description
- `testimonials` — rating, content, status, relasi ke user

## Frontend

- **Tailwind CSS v4** — CSS-first config via `@import "tailwindcss"` di `resources/css/app.css`
- **Blade views** — `home`, `auth/*`, `dashboard/`, `destinations/`, `admin/*`
- No Bootstrap, no CKEditor, no SweetAlert2 di project ini

## Testing (PHPUnit)

- `tests/Unit/` — plain PHPUnit (no Laravel bootstrap).
- `tests/Feature/` — bootstrapped via `Tests\TestCase`.
- DB config for tests is **commented out** in `phpunit.xml`. Tests fall through to whatever `.env` `DB_CONNECTION` is set to (currently MySQL). Uncomment SQLite `:memory:` in `phpunit.xml` for isolated test runs.

## Style & tooling

- **No CI, no pre-commit hooks, no phpstan config at root.**
- `pestphp/pest-plugin` allowed in `composer.json` — but tests are PHPUnit-only.
- No `lang/` directory, no events/jobs/notifications/mailables.
