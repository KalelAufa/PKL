# WA Broadcast Bot — Agent Guide

## Quick start

```bash
npm install
# copy .env.example → .env if missing, then edit
npm start
```

Entrypoint: `index.js` → `src/cli/menu.js` (interactive inquirer menu).

## Architecture

```
index.js                    # bootstrap: dotenv, dirs, data files, startMenu
src/
  cli/                      # terminal UI (inquirer, display, selector)
  core/                     # WhatsApp socket, session, reconnect, broadcast engine
  campaign/                 # campaign lifecycle: create, log, resume, progress
  catalog/                  # product scanner, loader, template renderer
  targets/                  # Excel/CSV parser, phone validator, dedup
  utils/                    # file IO, formatting, winston logger (silent)
```

- `@whiskeysockets/baileys` — WhatsApp Web API over WebSocket
- CommonJS modules, no build step, no typecheck, no linter

## Key files

| File | Purpose |
|---|---|
| `.env` | All rate limits, delays, feature toggles |
| `data/sent-history.json` | Numbers ever sent (global dedup across campaigns) |
| `data/blacklist.json` | Blocked numbers |
| `sessions/auth_info_baileys/` | WhatsApp auth state (auto-created) |
| `logs/` | Campaign log JSON files (resumable) |
| `campaigns/` | Product hierarchy: `Category/Subcategory/Slug/{product.json,templates/,images/}` |
| `targets/` | `.xlsx` / `.csv` target files |

## Important conventions

- **sent-history filter** only applies during **resume**, not new campaigns. New campaigns send to everyone in the target file.
- **`getRemainingTargets`** excludes **all** processed results (success + failure) during resume, not only successes.
- Winston logger in `src/utils/logger.js` is `silent: true`. It does not produce console or file output. Campaign logs persist separately via JSON files in `logs/`.
- Baileys logger passed to `makeWASocket` is a no-op stub (`level:"silent"`, all methods empty). The `child()` method returns itself, not global scope.

## Adding a product

Create under `campaigns/`:

```
Category/
  Subcategory/
    product-slug/
      product.json          # id, name, price, broadcast config, variables
      templates/            # .txt files with {{variable}} placeholders
      images/               # .jpg / .jpeg / .png files
```

Minimum: 1 template + 1 image, otherwise the product is skipped by `catalogScanner`.

## Template variables

Available in `{{variable}}` syntax:

`nama`, `produk`, `harga_asli`, `harga_diskon`, `deskripsi`, `cta_text`, `cta_link`, `stok`, `garansi`, `lokasi`, `tanggal`, `waktu`

Defined in `src/catalog/templateEngine.js:buildVariableMap`.

## Resume flow

1. User picks a log file from `logs/`
2. `parseTargets(file, {resume:true})` loads **all** valid targets (minus blacklist)
3. `getRemainingTargets(campaign, targets)` filters out numbers already in `campaign.results`

Failed numbers from the original run are **not** retried.

## Test / verify

No test framework configured. Only way to verify is `npm start` and manual CLI walkthrough.

## Known quirks

- `parseTargets` stats `valid` = `deduped.length` (post-dedup, post-filter). If valid=0 and invalid=0, all numbers were filtered by blacklist or sent-history.
- Numbers are normalized to `628xx@s.whatsapp.net` JID format. Accepts `08xx`, `8xx`, `62xx`, `+62xx`.
- Delay config falls back to env `DEFAULT_DELAY_MIN/MAX` if not in `product.json`.
- `AUTO_RESUME` and `SAVE_HISTORY` in `.env` are declared but **not used** anywhere in code.
