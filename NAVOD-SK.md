# NÁVOD PRE WEB-DEVELOPERA — Nový web LeXtom.sk

## Čo je v tomto balíku

```
/index.html                      → domovská stránka (= Kto sme)
/kto-sme.html                    → sekcia 1: Kto sme (firma, manažér, vízia)
/odborny-personal.html           → sekcia 2: Odborný personál
/vip-care-technology.html        → sekcia 3: VIP Care Technology (VIP BED + ekosystém)
/distribucia-produktov.html      → sekcia 4: Distribúcia produktov (katalóg)
/distribucia-produkt.html        → detail produktu (vzor produktovej stránky)
/development.html                → sekcia 5: Development (rozcestník 2 projektov)
/images/                         → všetky obrázky (28 súborov)
/NAVOD-SK.md                     → tento súbor
/NAVOD-EN.md                     → anglická verzia návodu
```

Súbory `vip-care-tech-preview.html` a `iceforce-development.html` (dva investičné projekty v sekcii Development) dodá klient samostatne — treba ich umiestniť do rovnakého priečinka, aby odkazy zo stránky `development.html` fungovali.

---

## Architektúra

Celý web je **statický HTML/CSS/JS** — žiadny build proces, žiadne externé závislosti okrem Google Fonts (Fraunces + Manrope), ktoré sa načítavajú cez `<link>` v hlavičke. Každá stránka je samostatný súbor so vstavaným CSS (`<style>`) a malým JavaScriptom (`<script>`). Obrázky sú v priečinku `/images/` a sú referencované relatívnymi cestami.

**Dizajnový systém** — všetky stránky zdieľajú rovnaké CSS premenné (`:root`), fonty a komponenty. Farebná paleta:
- Tmavá zelená `#14201c` / hĺbková `#0e1714`
- Krémová `#f4f1ea`
- Mosadzný akcent `#d4b483`
- Logo červená `#e2231a`
- VIP Care cyan akcent `#5fb8c9`

**Navigácia** je na každej stránke identická a prepojená — položky menu vedú na príslušné súbory. Aktívna položka má triedu `current`.

**Jazyky** — web je pripravený na **SK/EN**. Prepínač SK/EN je v navigácii. Texty, ktoré sa prepínajú, majú atribúty `data-sk` a `data-en`; funkcia `setLang()` ich prepína a ukladá voľbu do `localStorage`. **Plné EN preklady obsahu sa dopĺňajú vo finálovej fáze** — momentálne sú preložené navigácia a kľúčové prvky. Pre kompletnú dvojjazyčnosť odporúčame WPML alebo Polylang (viď nižšie).

---

## Nasadenie na WordPress — odporúčaný postup

### Variant A — vlastná šablóna stránky (odporúčané)

Najčistejšie riešenie, ktoré nezasahuje do existujúcej témy.

1. **Nahrať obrázky** do Médiá → Knižnica (všetkých 28 súborov z `/images/`). Poznačiť si URL adresy.

2. **Child theme** — ak ešte neexistuje, vytvoriť child theme aktívnej témy, aby zmeny prežili aktualizácie.

3. Pre každú z 6 stránok vytvoriť **šablónu stránky** v child theme (napr. `page-kto-sme.php`) s obsahom príslušného HTML súboru:
   - Na začiatok doplniť: `<?php /* Template Name: LeXtom Kto sme */ ?>`
   - Cesty `images/...` nahradiť reálnymi URL z Knižnice médií, alebo obrázky umiestniť do priečinka témy a použiť `<?php echo get_stylesheet_directory_uri(); ?>/images/...`
   - CSS zo `<style>` ponechať v súbore (alebo presunúť do `style.css` child theme)

4. Vo WordPress vytvoriť 6 stránok, každej priradiť príslušnú šablónu, uložiť ako koncept a skontrolovať náhľad.

5. **Prepojenie URL** — interné odkazy v menu (`kto-sme.html` atď.) upraviť na reálne permalinky stránok vo WordPress (napr. `/kto-sme/`, `/vip-care-technology/`). Stačí find-and-replace v každom súbore.

6. Po schválení nastaviť **domovskú stránku**: Nastavenia → Čítanie → Statická stránka → vybrať „Kto sme".

### Variant B — plugin na vlastný kód (jednoduchšie)

1. Nahrať obrázky do Knižnice médií, poznačiť URL.
2. Nainštalovať plugin **WPCode** alebo podobný.
3. Pre každú stránku vytvoriť novú WP stránku s **prázdnou šablónou** (Blank / Full Width / No Header — podľa témy), aby sa nezdvojila navigácia.
4. Vložiť obsah `<body>` cez Custom HTML blok, CSS zo `<style>` do hlavičky (cez WPCode alebo Doplnkové CSS), JS na koniec.
5. Cesty obrázkov a interné odkazy upraviť na reálne WP URL.

**Dôležité:** Stránky majú vlastnú navigáciu a pätu. Preto musia byť na šablóne **bez** hlavičky a päty pôvodnej témy, inak sa zobrazia dvojito.

---

## Sekcia Distribúcia produktov — ako pridávať produkty

Katalóg (`distribucia-produktov.html`) je modulárny. Aktuálne obsahuje 1 aktívny produkt a 5 okien „Pripravujeme". Nový produkt sa pridáva takto:
1. Skopírovať blok aktívnej produktovej karty (`<a class="pcard live">`) a upraviť obrázok, názov, popis.
2. Vytvoriť novú produktovú stránku podľa vzoru `distribucia-produkt.html` (galéria, parametre, benefity, formulár dopytu).
3. Prepojiť kartu na novú stránku.

Formulár „Dopyt na cenu" je momentálne vizuálny (`onsubmit="return false"`). Pre funkčné odosielanie napojiť na WordPress formulárový plugin (Contact Form 7, WPForms) alebo na `mailto:info@lextom.sk`.

---

## Sekcia Development — dva projekty

`development.html` je rozcestník, ktorý odkazuje na dva samostatné súbory:
- `vip-care-tech-preview.html` (VIP Care Facility Network)
- `iceforce-development.html` (ICE FORCE, vstup chránený heslom)

Tieto dodá klient. Stačí ich umiestniť do rovnakého priečinka.

---

## Viacjazyčnosť (finálová fáza)

Web je pripravený na SK/EN. Pre plnú dvojjazyčnosť obsahu odporúčame:
- **Polylang** alebo **WPML** plugin — vytvorí jazykové verzie stránok a prepínač.
- Existujúci prepínač SK/EN v navigácii sa môže napojiť na jazykový plugin, alebo ponechať pre rýchle prepínanie kľúčových textov cez `data-sk`/`data-en`.
- SK/EN grafiky (sekcia Odborný personál) sa prepínajú automaticky cez triedu `langimg` a atribút `data-for`.

Ďalšie jazyky (DE, PL a iné) sa pridávajú až vo finálovej fáze — v aktuálnom kóde nie sú a nemajú sa pridávať predčasne.

---

## Kontrolný zoznam pred spustením

- [ ] Všetkých 28 obrázkov nahraných a cesty upravené
- [ ] 6 stránok vytvorených a prepojených cez reálne WP permalinky
- [ ] Domovská stránka nastavená na „Kto sme"
- [ ] Formuláre napojené na odosielanie (info@lextom.sk)
- [ ] Dva Development súbory umiestnené
- [ ] Testované na mobile (responzívne menu = hamburger)
- [ ] Presmerovania zo starých URL (kvôli SEO)
- [ ] Google Fonts sa načítavajú (príp. hostovať lokálne kvôli GDPR)

---

## Kontakt

Pri otázkach k štruktúre alebo dizajnu: info@lextom.sk
