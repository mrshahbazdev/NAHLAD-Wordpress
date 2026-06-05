# Poznámky k obsahu — ICE FORCE

Praktické pokyny ako upravovať konkrétne časti stránky.

---

## 1. Texty (SK/EN)

Všetky texty stránky sú v jedinom súbore: **`assets/js/translations.js`**

Štruktúra:
```js
window.T = {
  "sk": {
    "hero_h1a": "Budujeme",
    "hero_h1b": "vojaka novej generácie",
    ...
  },
  "en": {
    "hero_h1a": "Building the",
    "hero_h1b": "next-generation soldier",
    ...
  }
};
```

V HTML sú prvky označené atribútom `data-t="kľúč"`:
```html
<h1><span data-t="hero_h1a">Budujeme</span></h1>
```

**Ako upraviť text:**
1. Nájdi v HTML element s `data-t="..."`
2. Otvor `translations.js`
3. V oboch jazykoch (`"sk"` aj `"en"`) zmeň hodnotu pre daný kľúč

---

## 2. Prístupový kód

Súbor: **`assets/js/main.js`**, riadok 5:
```js
const CODE = "ICEFORCE2026";
```

Zmeň na ľubovoľný reťazec. Akceptuje sa veľkými aj malými písmenami.

---

## 3. Tvrdé čísla (KPI, scenáre, ceny)

**Pozor — tieto sú písané priamo v `index.html`**, nie cez preklad.
Mení sa to manuálne v HTML.

### 3.1 Hero štatistiky
```html
<div class="hero-stats">
  <div class="st"><div class="n">+40<span>/</span>−40</div>...</div>
  <div class="st"><div class="n">4 000<span> m</span></div>...</div>
  <div class="st"><div class="n">1,73<span>×</span></div>...</div>
  <div class="st"><div class="n">6 <span data-t="hs4y">rokov</span></div>...</div>
</div>
```

### 3.2 Investor KPIs (sekcia Investícia)
```html
<div class="kpi"><div class="v">54 M €</div>...</div>
<div class="kpi"><div class="v">9,3 M €</div>...</div>
<div class="kpi"><div class="v">6,2 M €</div>...</div>
<div class="kpi"><div class="v">500</div>...</div>
```

### 3.3 Exit scenáre (3 boxy)
```html
<div class="inv-box">
  <div class="profit">+15,6 M €</div>
  <div class="meta">MOIC <b>1,29×</b> · IRR <b>5,0 %</b></div>
</div>
```

### 3.4 Cenová tabuľka modulov
```html
<tr><td class="nm">FROST</td><td>500 m²</td><td>5,0 M €</td>...</tr>
<tr><td class="nm">BLIZZARD</td><td>1 500 m²</td><td>15,0 M €</td>...</tr>
<tr class="proto"><td class="nm">GLACIER...</td><td>3 000 m²</td><td>30,0 M €</td>...</tr>
<tr><td class="nm">VANGUARD</td><td>6 000 m²</td><td>60,0 M €</td>...</tr>
```

---

## 4. Obrázky

Všetky v `assets/img/`. Pri náhrade zachovaj:
- Rovnaký názov súboru (alebo zmeň aj cestu v HTML)
- Rovnaký pomer strán (16:9 pre slidy a galériu)
- Optimalizovaná veľkosť (cca 1400 px šírka, JPEG kvalita 85)

| Súbor | Použitie |
|---|---|
| `lextom_logo.png` | Logo v navigácii a päte |
| `building_wide.jpg` | Hero pozadie |
| `building_aerial.jpg` | Deck CTA pozadie + galéria |
| `scene_vr.jpg` | Galéria (CQB scéna) |
| `slide_matrix_environment.jpg` | Embed v sekcii Koncept |
| `slide_scenarios.jpg` | Embed v sekcii Koncept |
| `slide_hpp.jpg` | Embed v sekcii HPP |
| `slide_modules.jpg` | Galéria |
| `slide_pricing_modules.jpg` | Rezerva (nepoužité v HTML) |
| `slide_energy.jpg` | Embed v sekcii Moduly |
| `slide_investor_case.jpg` | Embed v sekcii Investícia |
| `slide_roi_chart.jpg` | Embed v sekcii Exit |
| `slide_stabilizacny_plan.jpg` | Galéria |
| `slide_exit_scenarios.jpg` | Rezerva |

---

## 5. Farby a štýl

CSS premenné v `assets/css/styles.css`, riadky 4–10:
```css
:root{
  --ink:#080d14;     /* hlavné pozadie */
  --ice:#7dd3fc;     /* ľadová modrá akcent */
  --ice-dk:#38bdf8;  /* tmavšia akcentová */
  --white:#eaf2f9;   /* primárny text */
  --mut:#93a4b8;     /* sekundárny text */
  --amber:#f5a623;   /* upozornenia, GLACIER prototyp */
  --green:#3dd68c;   /* pozitívne ukazovatele */
  --red:#e5484d;     /* dôvernosť, kritické */
}
```

Zmena ktorejkoľvek z týchto farieb sa prejaví v celej stránke.

---

## 6. Prezentácia (PDF / PPTX)

Súbory:
- `assets/ICE_FORCE_deck.pdf` — 29 slidov pre online prehliadanie
- `assets/ICE_FORCE_deck.pptx` — editovateľná verzia na stiahnutie

Pri náhrade zachovaj rovnaké názvy súborov, alebo uprav cesty v HTML
(hľadaj `ICE_FORCE_deck` v `index.html`).

---

## 7. Pridanie ďalšieho jazyka

Aj keď táto verzia má len SK/EN, štruktúra je pripravená na ľubovoľný počet jazykov.

1. V `translations.js` pridaj nový kľúč:
   ```js
   window.T = {
     "sk": { ... },
     "en": { ... },
     "de": { /* všetky kľúče preložené do nemčiny */ }
   };
   ```

2. V `index.html` pridaj tlačidlo do gate aj nav-lang:
   ```html
   <button onclick="setLang('de')" data-l="de">DE</button>
   ```

3. (Ak RTL jazyk ako arabčina) v `main.js` v funkcii `applyLang` pridaj:
   ```js
   document.documentElement.setAttribute('dir', l === 'ar' ? 'rtl' : 'ltr');
   ```

---

## 8. Analytika (voliteľné)

Pridaj Google Analytics / Plausible / iný do `<head>` v `index.html`,
PRED `<link rel="stylesheet">`:

```html
<!-- Plausible (privacy-friendly) -->
<script defer data-domain="lextom.sk" src="https://plausible.io/js/script.js"></script>
```

Pre Google Analytics potrebuješ Cookie Consent banner — Lextom by mal mať GDPR
notice tak či tak. Pre dôvernú investorskú stránku odporúčame Plausible
(neukladá cookies a nepotrebuje banner).

---

## 9. Zoznam kontrolných bodov pred ostrým nasadením

- [ ] Stránka otestovaná lokálne (gate, oba jazyky, všetky linky)
- [ ] Súbory nahraté na hosting správne cesty
- [ ] HTTPS aktívne (Let's Encrypt)
- [ ] `noindex` meta zapnutá
- [ ] (Voliteľné) Server-side ochrana (Basic Auth alebo WP plugin)
- [ ] (Voliteľné) `robots.txt` aktualizované
- [ ] Otestované na: desktop Chrome/Safari/Firefox, mobile iOS/Android
- [ ] PDF prezentácia sa otvára, PPTX sa sťahuje
- [ ] Kontaktné údaje v päte aktuálne (alebo nech ostanú generické)

---

**Dôverné · © 2026 Lextom s.r.o.**
