# WA Broadcast Bot (CLI)

CLI-based WhatsApp broadcasting bot using Baileys (WhiskeySockets) for structured product catalog campaigns.

## Requirements

- Node.js v18+
- WhatsApp account with active WhatsApp Web access

## Installation

```bash
npm install
```

## Login (QR Code)

```bash
npm start
```

Saat pertama kali menjalankan bot, QR code akan muncul di terminal:

- QR code muncul di terminal
- Scan dengan WhatsApp di HP Anda
- Login otomatis selesai

Session tersimpan di `sessions/auth_info_baileys/` untuk login otomatis selanjutnya.

## Add Products

Create a new product folder in `campaigns/`:

```
campaigns/
  Category/
    Subcategory/
      Product-Slug/
        product.json
        templates/
          template-a.txt
        images/
          image-a.jpg
```

Minimum requirements:

- `product.json`
- At least 1 template
- At least 1 image file

## Prepare Target Files

Place `.xlsx` or `.csv` in the `targets/` folder. The parser auto-detects name/number headers.

Example headers:

- `nama`, `name`, `full_name`
- `nomor`, `no_hp`, `phone`, `whatsapp`

Sample target file:

- `targets/sample.xlsx`

## Run Campaign

```bash
npm start
```

Follow the interactive CLI steps to select category, product, and target file.

## Resume Campaign

Choose **Resume Campaign** from the menu and select a log file under `logs/`.

## Configuration

Edit `.env` for:

- rate limits
- cooldowns
- typing simulation
- blacklist enable/disable

## Troubleshooting

- **QR not showing**: ensure terminal supports QR output and you are connected to the internet.
- **Disconnected**: the bot auto-reconnects unless logged out. Re-scan QR if logged out.
- **Media send fails**: replace placeholder images with real `.jpg` or `.png` files.

## Notes

Sample campaign data uses placeholder images. Replace them before running real campaigns.
