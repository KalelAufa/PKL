# WebTNS2L — PT Tricipta Niaga Sukses

## Structure

- **Laravel 13** company-profile website. All business data is **hardcoded PHP arrays** in controllers — no database CRUD for products, categories, or portfolios. SQLite only for sessions/cache/queue infrastructure.
- No API routes, no auth middleware on public routes, no JS framework (vanilla JS inline in Blade).

## Commands

```bash
composer setup          # full init: install, .env, key:generate, migrate, npm build
composer dev            # concurrent: php artisan serve + queue:listen + pail + vite
composer test           # config:clear then phpunit
npm run build           # vite build
npm run dev             # vite dev server
```

## Controllers & Data

| Route | Controller | Data location |
|-------|------------|---------------|
| `/` | `HomeController` | hardcoded in method |
| `/kategori?category=` | `CategoryController` | 12 products, 1 category, 4 subcategories |
| `/produk/{id}` | `ProductController` | same 12 products + specs + extra images array |
| `/portofolio` | `PortfolioController` | 6 hardcoded projects |
| `/hubungi-kami` | `ContactController` | company profile, 2 WA numbers |

**Quirks:**
- Product IDs: 1–12 (Triscent). IDs must match between `CategoryController`, `ProductController`, and `HomeController`.
- `ProductController` shares `$categoryProducts` array but enriches it with `images[]` and `specifications[]` keys per product. Some products lack `specifications` (fallback used).
- `CategoryController` data is a subset of `ProductController` data (fewer fields).
- URL param `?category=` only accepts `Triscent`; defaults to `Triscent`.

## Frontend

- **Tailwind CSS v4** with `@tailwindcss/vite` plugin — no `tailwind.config.js`, all theme in `resources/css/app.css` CSS custom properties.
- **Plus Jakarta Sans** loaded via Bunny CDN `<link>` (NOT via Vite font plugin — the `bunny()` plugin call in vite.config.js is unused for this font).
- All JS is inline `<script>` in Blade files (carousel, pagination, form → WhatsApp, scroll-reveal).
- `resources/js/app.js` is empty.
- Vite entry points: `resources/css/app.css` + `resources/js/app.js`.

## Brand Tokens

Defined in `:root` in `resources/css/app.css`:
- Primary `#002e1f`, Accent `#f1c40f`, BG `#f9f9f6`, Surface `#ffffff`, Surface Soft `#f1efe6`
- Utility classes: `.primary-btn`, `.ghost-btn`, `.tab-btn*`, `.segment*`, `.field-*`, `.section-title-xl`, `.site-container`, `.section-line`

## Key Contacts (hardcoded)

- **WA 1:** 0877 2272 5483 (`6287722725483`) — floating button, footer, product inquiry
- **WA 2:** 0821 4353 5505 (`6282143535505`) — contact page only
- **Email:** cs.triciptaniagasukses@gmail.com
- **Address:** Perum Graha Kota blok C4-5, Suko, Sidoarjo

## Contact Form

The form on `/hubungi-kami` does **not** submit to the server. It opens `wa.me` via `window.open()` with a pre-filled message. No `POST` route exists.

## Testing

No custom tests exist — only the default Laravel `ExampleTest.php` stubs. No E2E or custom test suites. Run `composer test` for the default PHPUnit setup.

## Gotchas

- `composer setup` must be run in project root (`WebTNS2L/`), not workspace root.
- PHP must be available in PATH (use Laragon's `php`).
- The `.env` uses SQLite (`DB_CONNECTION=sqlite`). Database file is `database/database.sqlite`.
- Session, cache, and queue all use `database` driver.
- No models exist beyond the default `User` model. Adding DB-driven features requires creating migrations + models + seeders.
