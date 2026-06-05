# Installation Guide — ICE FORCE Subpage

Version 1.0 · for developer · English

---

## What this package contains

A bilingual (SK / EN) password-protected investor subpage for `lextom.sk`.
Includes the full investment narrative, economics, exit model, modular
architecture, Human Performance Program section, embedded presentation
slides and the full deck (PDF + PPTX) for download.

## Quick start (3 steps)

### 1. Local test
```bash
cd iceforce-development
python3 -m http.server 8080
# open http://localhost:8080
```
Password gate appears → enter `ICEFORCE2026` → site unlocks.

### 2. Deploy

**Static hosting:** upload the whole `iceforce-development/` folder to
your server (e.g. `/var/www/lextom.sk/development/`). Site available at
`https://lextom.sk/development/`.

**WordPress:**
1. Upload `assets/` to `wp-content/uploads/iceforce/`
2. Create new WP page with slug `development`, choose **blank / canvas** template
3. Insert HTML from `index.html` via **WPCode** or Elementor HTML widget
4. Find & replace paths:
   - `href="assets/` → `href="/wp-content/uploads/iceforce/assets/`
   - `src="assets/` → `src="/wp-content/uploads/iceforce/assets/`
5. Publish

### 3. Test
- Enter password `ICEFORCE2026`
- Switch SK ↔ EN
- Click "Open the deck" — PDF must open
- Test mobile responsiveness

## Access code

Code: **`ICEFORCE2026`**

Defined in `assets/js/main.js` line 5. Can be changed anytime.

> Note: this is a **client-side gate**, not strong security. For stronger
> protection add server-side HTTP Basic Auth or use a WordPress password
> protection plugin.

## File structure

```
iceforce-development/
├── index.html                    # main page
├── README.md                     # overview (Slovak)
├── docs/                         # installation guides
└── assets/
    ├── css/styles.css
    ├── js/main.js
    ├── js/translations.js        # SK + EN strings
    ├── img/                      # 14 images
    ├── ICE_FORCE_deck.pdf        # 29-slide deck
    └── ICE_FORCE_deck.pptx       # editable deck
```

## What to edit later

| To change... | Edit... |
|---|---|
| Texts (SK/EN) | `assets/js/translations.js` |
| Access code | `assets/js/main.js` line 5 |
| Hardcoded numbers | `index.html` (KPIs, scenarios) |
| Images | replace files in `assets/img/` keeping same names |
| Colors | CSS variables in `assets/css/styles.css` (top) |
| Deck file | replace `assets/ICE_FORCE_deck.pdf` / `.pptx` |

## Troubleshooting

**Images missing** → check paths, especially when deploying to WordPress.

**Password gate accepts code but nothing happens** → JS files failed to load.
Open DevTools (F12) → Console.

**Language switch not working** → `translations.js` must load BEFORE `main.js`.

**Page indexed by Google** → `<meta name="robots" content="noindex,nofollow">` is
already in `<head>`. Also add `Disallow: /development/` to `robots.txt`.

---

**Confidential · © 2026 Lextom s.r.o.**
