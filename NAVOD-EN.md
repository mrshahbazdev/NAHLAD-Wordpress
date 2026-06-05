# WEB DEVELOPER GUIDE — New LeXtom.sk Website

## What's in this package

```
/index.html                      → home page (= Who We Are)
/kto-sme.html                    → section 1: Who We Are (company, manager, vision)
/odborny-personal.html           → section 2: Professional Staff
/vip-care-technology.html        → section 3: VIP Care Technology (VIP BED + ecosystem)
/distribucia-produktov.html      → section 4: Product Distribution (catalog)
/distribucia-produkt.html        → product detail (product page template)
/development.html                → section 5: Development (hub of 2 projects)
/images/                         → all images (28 files)
/NAVOD-SK.md                     → Slovak version of this guide
/NAVOD-EN.md                     → this file
```

The files `vip-care-tech-preview.html` and `iceforce-development.html` (two investment projects in the Development section) are provided separately by the client — place them in the same folder so the links from `development.html` work.

---

## Architecture

The entire site is **static HTML/CSS/JS** — no build process, no external dependencies except Google Fonts (Fraunces + Manrope), loaded via `<link>` in the head. Each page is a standalone file with embedded CSS (`<style>`) and a small JavaScript block (`<script>`). Images live in `/images/` and are referenced by relative paths.

**Design system** — all pages share the same CSS variables (`:root`), fonts and components. Color palette:
- Dark green `#14201c` / deep `#0e1714`
- Cream `#f4f1ea`
- Brass accent `#d4b483`
- Logo red `#e2231a`
- VIP Care cyan accent `#5fb8c9`

**Navigation** is identical and interlinked across every page — menu items point to the respective files. The active item has the `current` class.

**Languages** — the site is prepared for **SK/EN**. An SK/EN switch sits in the navigation. Switchable texts carry `data-sk` and `data-en` attributes; the `setLang()` function swaps them and stores the choice in `localStorage`. **Full EN content translation is completed in the final phase** — currently the navigation and key elements are translated. For complete bilingualism we recommend WPML or Polylang (see below).

---

## WordPress deployment — recommended steps

### Option A — custom page template (recommended)

The cleanest solution that doesn't touch the existing theme.

1. **Upload images** to Media → Library (all 28 files from `/images/`). Note their URLs.

2. **Child theme** — if none exists, create a child theme of the active theme so changes survive updates.

3. For each of the 6 pages create a **page template** in the child theme (e.g. `page-kto-sme.php`) containing the respective HTML file:
   - Add at the top: `<?php /* Template Name: LeXtom Who We Are */ ?>`
   - Replace `images/...` paths with real Media Library URLs, or place images in the theme folder and use `<?php echo get_stylesheet_directory_uri(); ?>/images/...`
   - Keep the CSS from `<style>` in the file (or move it to the child theme `style.css`)

4. In WordPress create 6 pages, assign each the matching template, save as draft and preview.

5. **URL linking** — update the internal menu links (`kto-sme.html` etc.) to the real WordPress page permalinks (e.g. `/kto-sme/`, `/vip-care-technology/`). A simple find-and-replace per file is enough.

6. Once approved, set the **home page**: Settings → Reading → A static page → select "Who We Are".

### Option B — custom code plugin (simpler)

1. Upload images to the Media Library, note URLs.
2. Install **WPCode** or similar.
3. For each page create a new WP page with a **blank template** (Blank / Full Width / No Header — depending on theme) to avoid duplicate navigation.
4. Insert the `<body>` content via a Custom HTML block, the CSS from `<style>` into the head (via WPCode or Additional CSS), the JS at the end.
5. Adjust image paths and internal links to real WP URLs.

**Important:** The pages have their own navigation and footer. They must therefore use a template **without** the original theme's header and footer, otherwise these appear twice.

---

## Product Distribution section — how to add products

The catalog (`distribucia-produktov.html`) is modular. It currently has 1 active product and 5 "Coming soon" tiles. A new product is added like this:
1. Copy the active product card block (`<a class="pcard live">`) and edit image, title, description.
2. Create a new product page based on the `distribucia-produkt.html` template (gallery, specs, benefits, inquiry form).
3. Link the card to the new page.

The "Price inquiry" form is currently visual (`onsubmit="return false"`). For working submission, connect it to a WordPress form plugin (Contact Form 7, WPForms) or to `mailto:info@lextom.sk`.

---

## Development section — two projects

`development.html` is a hub linking to two standalone files:
- `vip-care-tech-preview.html` (VIP Care Facility Network)
- `iceforce-development.html` (ICE FORCE, password-protected entry)

These are provided by the client. Just place them in the same folder.

---

## Multilingual (final phase)

The site is prepared for SK/EN. For full content bilingualism we recommend:
- **Polylang** or **WPML** plugin — creates language versions of pages and a switcher.
- The existing SK/EN switch in the navigation can be connected to the language plugin, or kept for quick switching of key texts via `data-sk`/`data-en`.
- SK/EN graphics (Professional Staff section) switch automatically via the `langimg` class and `data-for` attribute.

Additional languages (DE, PL and others) are added only in the final phase — they are not in the current code and should not be added prematurely.

---

## Pre-launch checklist

- [ ] All 28 images uploaded and paths updated
- [ ] 6 pages created and linked via real WP permalinks
- [ ] Home page set to "Who We Are"
- [ ] Forms connected to submission (info@lextom.sk)
- [ ] Two Development files placed
- [ ] Tested on mobile (responsive menu = hamburger)
- [ ] Redirects from old URLs (for SEO)
- [ ] Google Fonts loading (optionally host locally for GDPR)

---

## Contact

For questions about structure or design: info@lextom.sk
