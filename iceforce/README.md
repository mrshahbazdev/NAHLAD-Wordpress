# ICE FORCE — Next Generation Soldiers
## Investorská podstránka pre lextom.sk

**Verzia:** 1.0 (2026) · **Vlastník:** Lextom s.r.o. · **Status:** dôverné

---

## Čo tento balík obsahuje

Kompletnú dvojjazyčnú (SK / EN) investorskú podstránku pripravenú na nasadenie
na nový web Lextom. Stránka je **chránená heslom** (prístupový kód) a obsahuje
plné investičné rozhranie s ekonomikou, exit modelom, modulárnou architektúrou,
prepojením na Human Performance Program, integrovanými slidmi z prezentácie
a samotnou prezentáciou na stiahnutie.

### Štruktúra balíka

```
iceforce-development/
├── index.html                    # hlavná stránka
├── README.md                     # tento súbor
├── docs/
│   ├── INSTALL_SK.md            # podrobný návod na nasadenie (SK)
│   ├── INSTALL_EN.md            # installation guide (EN)
│   └── CONTENT_NOTES.md         # poznámky k obsahu a úpravám
└── assets/
    ├── css/styles.css           # všetky štýly
    ├── js/
    │   ├── main.js              # logika (gate, jazyk, scroll, lightbox)
    │   └── translations.js      # všetky preklady SK + EN
    ├── img/                     # 14 obrázkov (logo, fotky, slidy)
    ├── ICE_FORCE_deck.pdf       # kompletná prezentácia 29 slidov
    └── ICE_FORCE_deck.pptx      # editovateľná verzia
```

---

## Prístupový kód

**Kód:** `ICEFORCE2026`

- Kód NIE je nikde na stránke zobrazený. Developer ho odovzdáva zvlášť pozvaným
  investorom.
- Kód je definovaný v `assets/js/main.js` na riadku `const CODE = "ICEFORCE2026";`
  — môže sa kedykoľvek meniť.
- Akceptuje sa veľkými aj malými písmenami (case-insensitive).
- Po úspešnom vstupe sa stav zapamätá v `sessionStorage` — používateľ nemusí
  zadávať kód znovu pri navigácii v rámci jednej session.

> **Pozn. o bezpečnosti:** kontrola hesla je na strane prehliadača (JavaScript),
> takže ide o **vstupnú zábranu, nie o silné zabezpečenie**. Pre vyššiu úroveň
> ochrany odporúčame doplniť server-side ochranu (HTTP Basic Auth na úrovni
> Apache/nginx, alebo WordPress plugin „Password Protected Page"). Návod je
> v `docs/INSTALL_SK.md`.

---

## Rýchly štart pre developera (3 kroky)

### Krok 1 — Skontroluj balík lokálne
```bash
# rozbaľ ZIP, otvor index.html v prehliadači (alebo cez lokálny server)
cd iceforce-development
python3 -m http.server 8080   # alebo `npx serve`
# otvor http://localhost:8080
```
Mal by si vidieť heslo-bránu. Zadaj `ICEFORCE2026` → otvorí sa stránka.

### Krok 2 — Nasaď na hosting
**Najjednoduchší spôsob (statický):**
- Nahraj celý priečinok `iceforce-development/` na hosting napr. cez FTP/SFTP
  do `lextom.sk/development/`.
- Stránka bude dostupná na **https://lextom.sk/development/**.

**WordPress (rovnako ako vaša existujúca /development pre VIP Care Tech):**
- Vytvor novú stránku v WP admine s názvom napr. „ICE Force".
- Nastav šablónu na **prázdnu / canvas** (bez hlavičky a päty WP témy).
- Použi plugin **WPCode** alebo **Elementor HTML widget** a vlož obsah
  `index.html`. CSS a JS súbory nahraj zvlášť do `wp-content/uploads/iceforce/`
  a v HTML uprav cesty (viď `docs/INSTALL_SK.md`, krok 4).

### Krok 3 — Otestuj
1. Otvor stránku v inkognite (čistá session).
2. Zadaj kód → mal by si vstúpiť.
3. Klikni „Otvoriť prezentáciu" → musí sa otvoriť PDF.
4. Klikni „Stiahnuť PPTX" → mal by sa stiahnuť súbor.
5. Prepni SK ↔ EN — všetky texty sa preložia.
6. Klikni na embedované slidy v sekciách → otvoria sa v lightboxe.
7. Otestuj na mobile (responzívnosť).

Hotovo. **Stránku nezdieľaj verejne — je dôverná.**

---

## Čo pred ostrým nasadením skontrolovať

- [ ] V `index.html` v sekcii `<footer>` doplniť skutočný kontaktný e-mail / tel.,
      ak má byť verejný (teraz tam je len Lextom + lextom.sk).
- [ ] Zapnutý `<meta name="robots" content="noindex, nofollow"/>` — stránku
      Google nebude indexovať. Neodstraňuj.
- [ ] HTTPS na hostingu (Let's Encrypt, ak ešte nie je).
- [ ] (Voliteľné) Pridať server-side ochranu (viď `docs/INSTALL_SK.md`).
- [ ] (Voliteľné) Pridať Google Analytics ID — viď `docs/CONTENT_NOTES.md`.

---

## Údržba

Hlavné body, kde sa môže obsah meniť:

| Čo chceš upraviť | Súbor | Kde |
|---|---|---|
| Texty (SK/EN) | `assets/js/translations.js` | hľadaj kľúč podľa `data-t="..."` v HTML |
| Prístupový kód | `assets/js/main.js` | riadok 5: `const CODE = "..."` |
| Čísla v KPI / scenároch | `index.html` | tvrdo zapísané, nájdi triedu `.kpi` alebo `.inv-box` |
| Obrázky / slidy | `assets/img/` | nahraď súbory rovnakými názvami |
| Farby / štýl | `assets/css/styles.css` | premenné `:root { --ice: ... }` na začiatku |
| Pridať/odobrať jazyk | `assets/js/translations.js` + `index.html` (tlačidlá) | nový kľúč v `window.T` |
| Prezentácia (PDF/PPTX) | `assets/ICE_FORCE_deck.{pdf,pptx}` | nahraď súbor |

Podrobnejšie v `docs/CONTENT_NOTES.md`.

---

## Dôvernosť

Tento balík, vrátane všetkých zdrojových súborov, obrázkov a prezentácie,
je **výhradným majetkom Lextom s.r.o.** Kopírovanie, šírenie alebo zverejnenie
celého obsahu alebo jeho častí bez písomného súhlasu Lextom s.r.o. je
**zakázané**. Materiál je určený výhradne pre interné použitie a pre vopred
schválených kvalifikovaných investorov pod NDA.

© 2026 Lextom s.r.o. Všetky práva vyhradené.
