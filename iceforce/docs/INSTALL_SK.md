# Inštalačný návod — ICE FORCE podstránka

Verzia 1.0 · pre developera · slovensky

---

## Obsah

1. [Pred začiatkom](#pred-zaciatkom)
2. [Lokálny test](#lokalny-test)
3. [Nasadenie — statický hosting](#nasadenie-staticky-hosting)
4. [Nasadenie — WordPress](#nasadenie-wordpress)
5. [Server-side ochrana heslom (voliteľné)](#server-side-ochrana)
6. [Riešenie problémov](#riesenie-problemov)

---

## 1. Pred začiatkom <a name="pred-zaciatkom"></a>

**Čo potrebuješ:**
- FTP / SFTP prístup na `lextom.sk` alebo prístup do WordPress admina
- Cieľová URL: `https://lextom.sk/development/` (alebo iná podstránka podľa dohody)
- Tento balík (rozbalený ZIP)

**Veľkosť balíka:** ~32 MB (najmä prezentácia PPTX 26 MB + PDF 5 MB).
Pre stránku samotnú (HTML + CSS + JS + obrázky) je to ~3 MB.

---

## 2. Lokálny test <a name="lokalny-test"></a>

Pred nasadením stránku otestuj lokálne:

**Možnosť A — Python (najjednoduchšie):**
```bash
cd iceforce-development
python3 -m http.server 8080
# otvor http://localhost:8080 v prehliadači
```

**Možnosť B — Node.js:**
```bash
cd iceforce-development
npx serve
# otvor URL ktorá sa vypíše
```

**Možnosť C — VS Code Live Server:**
- Otvor priečinok v VS Code
- Inštaluj rozšírenie „Live Server"
- Klikni pravým na `index.html` → „Open with Live Server"

**Test:**
1. Mala by sa zobraziť heslo-brána s logom Lextom
2. Zadaj `ICEFORCE2026` → vstúpi sa
3. Skontroluj všetky sekcie (Koncept, HPP, Moduly, Investícia, Exit, Galéria)
4. Prepni SK → EN → SK
5. Klikni „Otvoriť prezentáciu" → musí sa otvoriť PDF
6. Klikni na slide v sekcii → otvorí sa v lightboxe
7. Skontroluj mobile zobrazenie (Chrome DevTools → mobile view)

> **Pozor:** ak otváraš `index.html` priamo cez `file://` (dvojklik), niektoré
> prehliadače obmedzia načítavanie skriptov z lokálnych ciest. Použi vyššie
> uvedený lokálny server (Python / Node / Live Server).

---

## 3. Nasadenie na statický hosting <a name="nasadenie-staticky-hosting"></a>

Ak má Lextom.sk klasický webhosting (nie WordPress), je to triviálne:

```bash
# cez SFTP nahraj celý priečinok iceforce-development/ na server
sftp uzivatel@lextom.sk
> cd /var/www/lextom.sk/public_html/
> put -r iceforce-development development
```

Stránka bude dostupná na `https://lextom.sk/development/`.

**Apache `.htaccess` (voliteľné, do priečinka `development/`):**
```apache
# noindex a cache pre asety
Header set X-Robots-Tag "noindex, nofollow"
<IfModule mod_expires.c>
  ExpiresActive On
  ExpiresByType image/jpeg "access plus 1 month"
  ExpiresByType image/png "access plus 1 month"
  ExpiresByType text/css "access plus 1 week"
  ExpiresByType application/javascript "access plus 1 week"
</IfModule>
# Zakázať prezeranie priečinkov
Options -Indexes
```

**Nginx (do server bloku):**
```nginx
location /development/ {
    add_header X-Robots-Tag "noindex, nofollow";
    autoindex off;
}
```

---

## 4. Nasadenie na WordPress <a name="nasadenie-wordpress"></a>

Lextom.sk beží na WordPress (podľa našej predchádzajúcej práce). Postup je rovnaký
ako pri existujúcej `/development` podstránke pre VIP Care.

### 4.1 Príprava
- Prihlás sa do WP admina
- Inštaluj (ak ešte nie sú) tieto pluginy:
  - **WPCode** (Insert Headers and Footers) — zadarmo, na vkladanie vlastného kódu
  - **alebo** používaš už existujúci **Elementor** — stačí HTML widget

### 4.2 Nahratie assetov na server

Cez FTP/SFTP vytvor v WP priečinok pre asety:
```
wp-content/uploads/iceforce/
├── assets/
│   ├── css/styles.css
│   ├── js/main.js
│   ├── js/translations.js
│   ├── img/  (všetky obrázky)
│   └── ICE_FORCE_deck.pdf
│   └── ICE_FORCE_deck.pptx
```

### 4.3 Vytvor novú WP stránku
- WP admin → Stránky → Pridať novú
- Názov: **ICE Force** (alebo *Development*)
- URL slug: `development` → výsledok `lextom.sk/development`
- **Šablóna stránky:** vyber „Prázdna / Canvas / Full width without header"
  (názov sa líši podľa témy; ide o šablónu BEZ hlavičky a päty témy)

### 4.4 Vlož obsah
- V editore stránky prepni na „Custom HTML" blok (alebo Elementor → HTML widget)
- Skopíruj **celý obsah** súboru `index.html` (od `<!DOCTYPE html>` po `</html>`)
- **POZOR:** v skopírovanom HTML uprav cesty k súborom z relatívnych na WP cesty:

  Pôvodné:
  ```html
  <link rel="stylesheet" href="assets/css/styles.css">
  <img src="assets/img/lextom_logo.png">
  <a href="assets/ICE_FORCE_deck.pdf">
  <script src="assets/js/translations.js"></script>
  ```

  Nahraď na:
  ```html
  <link rel="stylesheet" href="/wp-content/uploads/iceforce/assets/css/styles.css">
  <img src="/wp-content/uploads/iceforce/assets/img/lextom_logo.png">
  <a href="/wp-content/uploads/iceforce/assets/ICE_FORCE_deck.pdf">
  <script src="/wp-content/uploads/iceforce/assets/js/translations.js"></script>
  ```

  **Tip:** v textovom editore použi *Find & Replace*:
  - `href="assets/` → `href="/wp-content/uploads/iceforce/assets/`
  - `src="assets/` → `src="/wp-content/uploads/iceforce/assets/`
  - `url(assets/` → `url(/wp-content/uploads/iceforce/assets/`

### 4.5 Publikuj a otestuj
- Klikni „Publikovať" v WP
- Otvor `lextom.sk/development` v inkognite
- Skontroluj že sa zobrazuje gate a po zadaní kódu funguje celá stránka

---

## 5. Server-side ochrana heslom (voliteľné) <a name="server-side-ochrana"></a>

JavaScript heslo-brána je vstupná zábrana — ktokoľvek so znalosťou DevTools sa
môže technicky dostať za ňu. Ak chceš silnejšiu ochranu, pridaj **server-side
heslo na úrovni HTTP**.

### 5.1 Apache HTTP Basic Auth
```bash
# na serveri vytvor .htpasswd súbor
htpasswd -c /var/www/lextom.sk/.htpasswd_iceforce investor
# zadá heslo (môže byť rovnaké aj iné ako JS kód)
```

V `/development/.htaccess` pridaj:
```apache
AuthType Basic
AuthName "ICE FORCE - Confidential"
AuthUserFile /var/www/lextom.sk/.htpasswd_iceforce
Require valid-user
```

### 5.2 WordPress plugin
- **„Password Protected"** plugin (zadarmo) — ochrana celej stránky/podstránky
- Nastavenia → Password Protected → zapnúť pre URL `/development`

---

## 6. Riešenie problémov <a name="riesenie-problemov"></a>

**Stránka sa zobrazí ale obrázky chýbajú**
→ skontroluj cesty v `<img src="...">` a `url(...)` v CSS. Pri WordPress musia
   začínať `/wp-content/uploads/iceforce/...`.

**Heslo-brána je v pohode ale po zadaní kódu sa nič nedeje**
→ JS súbory sa pravdepodobne nenačítali. Otvor DevTools (F12) → Console — uvidíš
   404 alebo CORS chybu. Skontroluj cestu k `main.js` a `translations.js`.

**Prepínanie SK/EN nefunguje**
→ `translations.js` sa nenačítal pred `main.js`. V HTML musí byť poradie:
   ```html
   <script src="assets/js/translations.js"></script>
   <script src="assets/js/main.js"></script>
   ```

**Prezentácia (PDF/PPTX) sa neotvára**
→ Skontroluj že `ICE_FORCE_deck.pdf` a `.pptx` sú v `assets/` a cesty v HTML
   sú správne. PPTX sa otvára cez `<a download>` — niektoré prehliadače môžu
   blokovať priame sťahovanie.

**Mobile menu (burger) sa neotvorí**
→ JS pravdepodobne nezbehol. Otvor DevTools → Console.

**Stránka indexuje Google**
→ Skontroluj `<meta name="robots" content="noindex, nofollow"/>` v `<head>`.
   Pre istotu pridaj aj do `robots.txt`:
   ```
   User-agent: *
   Disallow: /development/
   ```

---

## Kontakt pre vývoj

V prípade problémov alebo úprav kontaktuj Lextom s.r.o.

**Dôverné · © 2026 Lextom s.r.o.**
