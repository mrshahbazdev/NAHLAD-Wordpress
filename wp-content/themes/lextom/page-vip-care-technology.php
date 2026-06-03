<?php
/**
 * Template Name: LeXtom — VIP Care Technology
 * Template Post Type: page
 *
 * @package LeXtom
 */

get_header();
$img = LEXTOM_URI . '/assets/images/';
?>

<!-- HERO -->
<header class="lextom-hero lextom-hero--ecosystem lextom-hero--tall">
  <div class="hero-crestbg"><img src="<?php echo esc_url( $img . 'vipcare-crest.webp' ); ?>" alt="VIP Care Technology"></div>
  <div class="hero-inner">
    <div class="ecosystem-badge"><span class="pulse"></span>VIP Care Technology Solution</div>
    <h1 class="hero-title" data-sk="Inteligentná platforma starostlivosti pre moderné zdravotníctvo" data-en="Intelligent care platform for modern healthcare">Inteligentná <span class="accent">platforma starostlivosti</span> pre moderné zdravotníctvo</h1>
    <p class="hero-sub" data-sk="AI-asistovaná starostlivosť, automatizovaná hygiena, monitoring pacienta a eko-inteligentná infraštruktúra — prepojený ekosystém novej generácie." data-en="AI-assisted care, automated hygiene, patient monitoring and eco-intelligent infrastructure — a connected next-generation ecosystem.">AI-asistovaná starostlivosť, automatizovaná hygiena, monitoring pacienta a eko-inteligentná infraštruktúra — prepojený ekosystém novej generácie.</p>
    <div class="hero-pills">
      <span>AI-assisted care</span><span>Automated hygiene</span><span>Patient monitoring</span><span>Eco intelligent healthcare</span>
    </div>
    <div class="modules">
      <a href="#vipbed"><div class="mod active"><span class="dot"></span>VIP BED</div></a>
      <a href="#ecosystem"><div class="mod locked">VIP RING</div></a>
      <a href="#ecosystem"><div class="mod locked">VIP HUB</div></a>
      <a href="#ecosystem"><div class="mod locked">VIP BOT</div></a>
      <a href="#ecosystem"><div class="mod locked">VIP ROOM</div></a>
      <a href="#ecosystem"><div class="mod locked">VIP SPACE</div></a>
      <a href="#ecosystem"><div class="mod locked">ECO &amp; AI INFRASTRUCTURE</div></a>
    </div>
  </div>
</header>

<!-- MARKET PROBLÉM -->
<section class="lextom-market">
  <div class="wrap">
    <div class="sec-label reveal" data-sk="Výzva trhu" data-en="Market Challenge">Výzva trhu</div>
    <h2 class="sec-h reveal" data-sk="Starnúca populácia. Rastúci tlak." data-en="Aging population. Growing pressure.">Starnúca populácia. <em>Rastúci tlak.</em></h2>
    <p class="lead reveal d1" data-sk="Zdravotnícke a sociálne systémy v celej Európe čelia bezprecedentným výzvam. Slovensko patrí k najrýchlejšie starnúcim krajinám EÚ — a súčasný systém nie je pripravený na budúci dopyt." data-en="Healthcare and social systems across Europe face unprecedented challenges. Slovakia is one of the fastest aging countries in the EU — and the current system is not prepared for future demand.">Zdravotnícke a sociálne systémy v celej Európe čelia bezprecedentným výzvam. Slovensko patrí k najrýchlejšie starnúcim krajinám EÚ — a súčasný systém nie je pripravený na budúci dopyt.</p>
    <div class="stats">
      <div class="stat reveal"><div class="num">1 018 725</div><div class="lbl" data-sk="seniorov na Slovensku (65+)" data-en="seniors in Slovakia (65+)">seniorov na Slovensku (65+)</div></div>
      <div class="stat reveal d1"><div class="num">€363B</div><div class="lbl" data-sk="hodnota EU trhu dlhodobej starostlivosti do 2030" data-en="EU long-term care market value by 2030">hodnota EU trhu dlhodobej starostlivosti do 2030</div></div>
      <div class="stat reveal d2"><div class="num">~9 000</div><div class="lbl" data-sk="seniorov čaká na miesto v zariadení" data-en="seniors waiting for a place in a facility">seniorov čaká na miesto v zariadení</div></div>
      <div class="stat reveal"><div class="num">50 %</div><div class="lbl" data-sk="potenciálne zníženie záťaže personálu" data-en="potential staff burden reduction">potenciálne zníženie záťaže personálu</div></div>
    </div>
    <!-- Language-specific market images -->
    <div class="frame reveal">
      <img src="<?php echo esc_url( $img . 'vipcare-market-sk.jpg' ); ?>" alt="Výzva trhu" style="width:100%;display:block">
    </div>
    <div class="pains">
      <div class="pain reveal"><span class="pico">◷</span><h4 data-sk="Nedostatok personálu" data-en="Staff shortage">Nedostatok personálu</h4><p data-sk="Tisíce voľných pracovných miest naprieč Slovenskom." data-en="Thousands of vacancies across Slovakia.">Tisíce voľných pracovných miest naprieč Slovenskom.</p></div>
      <div class="pain reveal d1"><span class="pico">↗</span><h4 data-sk="Rastúce náklady" data-en="Rising costs">Rastúce náklady</h4><p data-sk="Prevádzkové náklady rastú každý rok rýchlejšie." data-en="Operating costs grow faster every year.">Prevádzkové náklady rastú každý rok rýchlejšie.</p></div>
      <div class="pain reveal d2"><span class="pico">◍</span><h4 data-sk="Vyhorenie opatrovateľov" data-en="Caregiver burnout">Vyhorenie opatrovateľov</h4><p data-sk="Vysoký stres vedie k fluktuácii a nižšej kvalite." data-en="High stress leads to turnover and lower quality.">Vysoký stres vedie k fluktuácii a nižšej kvalite.</p></div>
      <div class="pain reveal"><span class="pico">⊗</span><h4 data-sk="Preležaniny" data-en="Pressure ulcers">Preležaniny</h4><p data-sk="Hlavná príčina komplikácií a dodatočných nákladov." data-en="Main cause of complications and additional costs.">Hlavná príčina komplikácií a dodatočných nákladov.</p></div>
      <div class="pain reveal d1"><span class="pico">⚕</span><h4 data-sk="Hygienické riziká" data-en="Hygiene risks">Hygienické riziká</h4><p data-sk="Infekcie a nedostatočná hygiena zvyšujú riziká." data-en="Infections and inadequate hygiene increase risks.">Infekcie a nedostatočná hygiena zvyšujú riziká.</p></div>
      <div class="pain reveal d2"><span class="pico">▽</span><h4 data-sk="Nepripravený systém" data-en="Unprepared system">Nepripravený systém</h4><p data-sk="Do 2030 bude na Slovensku o 194 000 seniorov viac." data-en="By 2030, Slovakia will have 194,000 more seniors.">Do 2030 bude na Slovensku o 194 000 seniorov viac.</p></div>
    </div>
  </div>
</section>

<!-- KNOW MORE BUTTON -->
<div style="text-align:center;position:relative;z-index:1;padding:0 5vw 20px;">
  <button class="btn-know-more" id="btnKnowMore" data-sk="Zistiť viac" data-en="Know More">
    <span data-sk="Zistiť viac" data-en="Know More">Zistiť viac</span>
    <span class="arrow">▼</span>
  </button>
</div>

<!-- EXPANDABLE CONTENT -->
<div class="expandable-content" id="expandableContent">

<!-- VIP BED CORE -->
<section class="lextom-core" id="vipbed">
  <div class="wrap">
    <div class="sec-label reveal" data-sk="Hlavný produkt" data-en="Main Product">Hlavný produkt</div>
    <div class="core-head">
      <div class="text">
        <div class="core-logo reveal">
          <img src="<?php echo esc_url( $img . 'vipbed-logo.webp' ); ?>" alt="VIP BED">
          <div class="tx"><div class="t">VIP BED</div><div class="s">Intelligent Care Technology</div></div>
        </div>
        <h2 class="reveal" data-sk="Nie polohovacia posteľ. Autonómna platforma starostlivosti." data-en="Not an adjustable bed. An autonomous care platform.">Nie polohovacia posteľ. <br>Autonómna platforma starostlivosti.</h2>
        <div class="pos reveal d1" data-sk="Komplexná integrácia funkcií zlúčená do jediného lôžka." data-en="Complete integration of functions combined into a single bed.">Komplexná integrácia funkcií zlúčená do jediného lôžka.</div>
        <p class="reveal d2" data-sk="VIP BED prekonáva konvenčné medicínske lôžko. Spája modernú technológiu so súcitom a rešpektom k dôstojnosti pacienta." data-en="VIP BED surpasses conventional medical beds. It combines modern technology with compassion and respect for patient dignity.">VIP BED prekonáva konvenčné medicínske lôžko. Spája modernú technológiu so súcitom a rešpektom k dôstojnosti pacienta — adresuje reálne potreby opatrovateľov a personálu pri súčasnom dôraze na pohodu pacientov a ich rodín.</p>
      </div>
      <div class="ph reveal d1"><img src="<?php echo esc_url( $img . 'vipcare-bed-hero.jpg' ); ?>" alt="VIP BED"></div>
    </div>
    <div class="abcd">
      <div class="feat reveal">
        <div class="ab">A</div>
        <h3 data-sk="Inteligentná automatizácia" data-en="Intelligent Automation">Inteligentná automatizácia</h3>
        <ul>
          <li data-sk="Automatizovaný monitoring stavu" data-en="Automated status monitoring">Automatizovaný monitoring stavu</li>
          <li data-sk="Automatické čistenie" data-en="Automatic cleaning">Automatické čistenie</li>
          <li data-sk="Odvod a drenáž" data-en="Drainage and discharge">Odvod a drenáž</li>
          <li data-sk="Automatické sušenie" data-en="Automatic drying">Automatické sušenie</li>
          <li data-sk="Automatické polohovanie pacienta" data-en="Automatic patient positioning">Automatické polohovanie pacienta</li>
        </ul>
      </div>
      <div class="feat reveal d1">
        <div class="ab">B</div>
        <h3 data-sk="Hygienický systém" data-en="Hygiene System">Hygienický systém</h3>
        <ul>
          <li data-sk="Automatizovaný odvod odpadu" data-en="Automated waste discharge">Automatizovaný odvod odpadu</li>
          <li data-sk="Kúpanie priamo na lôžku" data-en="Bathing directly on the bed">Kúpanie priamo na lôžku</li>
          <li data-sk="Napojenie na kanalizáciu" data-en="Sewer connection">Napojenie na kanalizáciu</li>
          <li data-sk="Automatické sušenie a ventilácia" data-en="Automatic drying and ventilation">Automatické sušenie a ventilácia</li>
        </ul>
      </div>
      <div class="feat reveal">
        <div class="ab">C</div>
        <h3 data-sk="Komfort pacienta" data-en="Patient Comfort">Komfort pacienta</h3>
        <ul>
          <li data-sk="Anti-dekubitný systém" data-en="Anti-decubitus system">Anti-dekubitný systém</li>
          <li data-sk="Grafénové vykurovanie" data-en="Graphene heating">Grafénové vykurovanie</li>
          <li data-sk="Ventilácia a masáž" data-en="Ventilation and massage">Ventilácia a masáž</li>
          <li data-sk="Laterálna rotácia (zero-gravity)" data-en="Lateral rotation (zero-gravity)">Laterálna rotácia (zero-gravity)</li>
          <li data-sk="Polohovanie nôh pre cirkuláciu" data-en="Leg positioning for circulation">Polohovanie nôh pre cirkuláciu</li>
        </ul>
      </div>
      <div class="feat reveal d1">
        <div class="ab">D</div>
        <h3 data-sk="Efektivita opatrovateľa" data-en="Caregiver Efficiency">Efektivita opatrovateľa</h3>
        <ul>
          <li data-sk="Menej zdvíhania" data-en="Less lifting">Menej zdvíhania</li>
          <li data-sk="Znížená záťaž personálu" data-en="Reduced staff burden">Znížená záťaž personálu</li>
          <li data-sk="Rýchlejšie intervencie" data-en="Faster interventions">Rýchlejšie intervencie</li>
          <li data-sk="Bezpečnejšia manipulácia" data-en="Safer handling">Bezpečnejšia manipulácia</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- OSOBNÝ PRÍBEH (Blog-style) -->
<section class="lextom-story--blog">
  <div class="wrap">
    <div class="story-article reveal">
      <div class="byline" data-sk="Príbeh, ktorý dal vzniknúť VIP Care Technology" data-en="The story behind VIP Care Technology">Príbeh, ktorý dal vzniknúť VIP Care Technology</div>
      <h2 data-sk="Začalo sa to pri posteli mojej mamy" data-en="It started at my mother's bedside">Začalo sa to pri <em>posteli mojej mamy</em></h2>
      <div class="story-img"><img src="<?php echo esc_url( $img . 'vipcare-showroom.jpg' ); ?>" alt="VIP Care showroom"></div>
      <p class="lead" data-sk="Niektoré nápady sa nerodia v zasadačkách. Rodia sa v noci, pri lôžku človeka, ktorého milujete." data-en="Some ideas are not born in boardrooms. They are born at night, at the bedside of someone you love.">Niektoré nápady sa nerodia v zasadačkách. Rodia sa v noci, pri lôžku človeka, ktorého milujete.</p>
      <p>Počas dlhého, niekoľkomesačného obdobia — predtým, než sme mamu umiestnili do zariadenia — som sa o ňu staral doma, vlastnými rukami. Poznám tú únavu aj bezmocnosť: zdvíhanie, polohovanie, hygiena, bdenie v noci, strach z preležanín. A jednu otázku, ktorá ma neopúšťala: <strong>prečo to musí byť také ťažké a prečo neexistuje niečo, čo by tej starostlivosti vrátilo dôstojnosť?</strong></p>
      <p>Z tej otázky vznikol nápad — a keď som technológiu, akú som si predstavoval, nenašiel, začali sme ju stavať. Hľadali sme partnerov, testovali, skladali znova. No technológia bola len začiatok. Narazil som na múr vyšší než akýkoľvek technický problém — <strong>na systém a jeho pravidlá.</strong></p>
      <p>Mama má dnes 84 rokov a je v zariadení pre seniorov — a ja stále premýšľam, ako jej dať starostlivosť inú, lepšiu. <strong>Nerobíme produkt pre trh. Robíme to, čo by sme chceli mať pre vlastných rodičov.</strong></p>
      <div class="quote">
        <blockquote>Všetko, čo budujeme, je odpoveďou na jedinú otázku, ktorú si kladiem dodnes — <em>ako dať tým, ktorých milujeme, starostlivosť, akú si zaslúžia?</em></blockquote>
        <div class="sig">— PaedDr. Tomáš Hvostík, PhD., zakladateľ LeXtom s.r.o.</div>
      </div>
    </div>
  </div>
</section>

<!-- TECHNOLOGY VISUAL -->
<section class="lextom-techvis">
  <div class="wrap">
    <div class="sec-label center reveal" data-sk="Technológia v praxi" data-en="Technology in Practice">Technológia v praxi</div>
    <h2 class="sec-h reveal" data-sk="Starostlivosť, ktorá vyzerá ako budúcnosť" data-en="Care that looks like the future">Starostlivosť, ktorá vyzerá ako budúcnosť</h2>
    <div class="big reveal d1"><img src="<?php echo esc_url( $img . 'vipcare-bed-night.jpg' ); ?>" alt="VIP BED v praxi"></div>
    <div class="grid3">
      <div class="gi reveal"><img src="<?php echo esc_url( $img . 'vipcare-bed-top.jpg' ); ?>" alt="Zero-gravity"><div class="cap" data-sk="Zero-gravity polohovanie a automatická rotácia" data-en="Zero-gravity positioning and automatic rotation">Zero-gravity polohovanie a automatická rotácia</div></div>
      <div class="gi reveal d1"><img src="<?php echo esc_url( $img . 'vipcare-bed-wash.jpg' ); ?>" alt="Kúpanie"><div class="cap" data-sk="Hygienický systém — kúpanie priamo na lôžku" data-en="Hygiene system — bathing directly on the bed">Hygienický systém — kúpanie priamo na lôžku</div></div>
      <div class="gi reveal d2"><img src="<?php echo esc_url( $img . 'vipcare-bed-nurses.jpg' ); ?>" alt="AI monitoring"><div class="cap" data-sk="AI monitoring a ovládanie cez dotykový panel" data-en="AI monitoring and control via touchscreen panel">AI monitoring a ovládanie cez dotykový panel</div></div>
      <div class="gi reveal"><img src="<?php echo esc_url( $img . 'vipcare-bed-care2.jpg' ); ?>" alt="Opatrovatelia"><div class="cap" data-sk="Efektivita opatrovateľov — bezpečnejšia manipulácia" data-en="Caregiver efficiency — safer handling">Efektivita opatrovateľov — bezpečnejšia manipulácia</div></div>
      <div class="gi reveal d1"><img src="<?php echo esc_url( $img . 'vipcare-bed-care2.jpg' ); ?>" alt="Starostlivosť"><div class="cap" data-sk="Dôstojná starostlivosť v domácom aj inštitucionálnom prostredí" data-en="Dignified care in both home and institutional settings">Dôstojná starostlivosť v domácom aj inštitucionálnom prostredí</div></div>
      <div class="gi reveal d2"><img src="<?php echo esc_url( $img . 'vipcare-bed-config.jpg' ); ?>" alt="Konfigurácie"><div class="cap" data-sk="Prispôsobiteľné polohovanie v rôznych konfiguráciách" data-en="Customizable positioning in various configurations">Prispôsobiteľné polohovanie v rôznych konfiguráciách</div></div>
    </div>
  </div>
</section>

<!-- ROI (inside expandable) -->
<section class="lextom-roi">
  <div class="wrap">
    <div class="sec-label reveal" data-sk="Ekonomický prínos" data-en="Economic Benefit">Ekonomický prínos</div>
    <h2 class="sec-h reveal" data-sk="Návratnosť, ktorá dáva zmysel" data-en="Return on investment that makes sense">Návratnosť, ktorá dáva zmysel</h2>
    <div class="roi-grid">
      <div class="roi-big reveal">
        <div class="v">8–12</div>
        <div class="l" data-sk="mesiacov návratnosť investície" data-en="months return on investment">mesiacov návratnosť investície</div>
      </div>
      <ul class="roi-list reveal d1">
        <li data-sk="Nižšie personálne náklady — automatizácia rutinných úkonov" data-en="Lower staff costs — automation of routine tasks"><strong>Nižšie personálne náklady</strong> — automatizácia rutinných úkonov</li>
        <li data-sk="Menej komplikácií — prevencia preležanín a infekcií" data-en="Fewer complications — prevention of pressure ulcers and infections"><strong>Menej komplikácií</strong> — prevencia preležanín a infekcií</li>
        <li data-sk="Vyššia spokojnosť pacientov a ich rodín" data-en="Higher patient and family satisfaction"><strong>Vyššia spokojnosť pacientov</strong> a ich rodín</li>
        <li data-sk="Dlhodobé riešenie — záruka 24 mesiacov + doživotný servis" data-en="Long-term solution — 24-month warranty + lifetime service"><strong>Dlhodobé riešenie</strong> — záruka 24 mesiacov + doživotný servis</li>
        <li data-sk="Buyback program — spätný odkup za férových podmienok" data-en="Buyback program — repurchase under fair conditions"><strong>Buyback program</strong> — spätný odkup za férových podmienok</li>
      </ul>
    </div>
    <div class="roi-extra">
      <div class="e reveal"><div class="ev">30–40 %</div><div class="el" data-sk="nižšie celkové náklady" data-en="lower overall costs">nižšie celkové náklady</div></div>
      <div class="e reveal d1"><div class="ev">50 %</div><div class="el" data-sk="menej administratívy a manuálnej práce" data-en="less administration and manual work">menej administratívy a manuálnej práce</div></div>
      <div class="e reveal d2"><div class="ev">24 mes.</div><div class="el" data-sk="záruka + doživotný servis" data-en="warranty + lifetime service">záruka + doživotný servis</div></div>
    </div>
  </div>
</section>

<!-- FUTURE ECOSYSTEM (new text) -->
<section class="lextom-future" id="ecosystem">
  <div class="wrap">
    <div class="sec-label reveal" data-sk="Ekosystém budúcnosti" data-en="Future Ecosystem">Ekosystém budúcnosti</div>
    <h2 class="sec-h reveal" data-sk="VIP BED je prvým prvkom prepojeného systému" data-en="VIP BED is the first element of a connected system">VIP BED je prvým prvkom <em>prepojeného systému</em></h2>
    <div class="lang-sk">
      <p class="intro-line reveal d1">VIP Care Technology predstavuje dlhodobú víziu modernej starostlivosti založenej na prepojení inteligentných technológií, automatizácie a dátovej podpory pre rozhodovanie.</p>
      <p class="intro-line reveal d1">VIP BED je prvé dostupné riešenie v rámci pripravovaného ekosystému, ktorého cieľom je postupne vytvárať nové štandardy v oblasti zdravotnej, sociálnej a domácej starostlivosti.</p>
      <p class="intro-line reveal d1">Každý ďalší modul bude navrhnutý tak, aby rozšíril schopnosti systému a priniesol väčšiu bezpečnosť, efektivitu a komfort pre pacientov, personál a poskytovateľov služieb.</p>
      <p class="intro-line reveal d2"><strong>Budujeme technologickú platformu pripravenú na potreby budúcnosti.</strong></p>
    </div>
    <div class="lang-en">
      <p class="intro-line reveal d1">VIP Care Technology represents a long-term vision of modern care based on the connection of intelligent technologies, automation and data support for decision-making.</p>
      <p class="intro-line reveal d1">VIP BED is the first available solution within the prepared ecosystem, the aim of which is to gradually create new standards in the field of health, social and home care.</p>
      <p class="intro-line reveal d1">Each subsequent module will be designed to expand the capabilities of the system and bring greater safety, efficiency and comfort for patients, staff and service providers.</p>
      <p class="intro-line reveal d2"><strong>We are building a technology platform ready for the needs of the future.</strong></p>
    </div>
    <div class="frame reveal" style="margin:30px 0 40px;border:0.5px solid var(--line);border-radius:8px;overflow:hidden;">
      <img src="<?php echo esc_url( $img . 'vipcare-showroom.jpg' ); ?>" alt="VIP Care Technology ecosystem" style="width:100%;display:block;">
    </div>
    <div class="modlist reveal d1">
      <div class="modrow live"><div class="mname">VIP BED</div><div class="mdesc" data-sk="Autonómna platforma starostlivosti — aktuálne dostupné jadro ekosystému." data-en="Autonomous care platform — currently available core of the ecosystem.">Autonómna platforma starostlivosti — aktuálne dostupné jadro ekosystému.</div><div class="mstate" data-sk="Dostupné" data-en="Available">Dostupné</div></div>
      <div class="modrow"><div class="mname">VIP RING</div><div class="mdesc" data-sk="Biometrická vrstva — kontinuálne snímanie vitálnych funkcií." data-en="Biometric layer — continuous vital sign monitoring.">Biometrická vrstva — kontinuálne snímanie vitálnych funkcií.</div><div class="mstate" data-sk="V príprave" data-en="In preparation">V príprave</div></div>
      <div class="modrow"><div class="mname">VIP HUB</div><div class="mdesc" data-sk="Dátové a rozhodovacie jadro s prediktívnou analytikou starostlivosti." data-en="Data and decision core with predictive care analytics.">Dátové a rozhodovacie jadro s prediktívnou analytikou starostlivosti.</div><div class="mstate" data-sk="V príprave" data-en="In preparation">V príprave</div></div>
      <div class="modrow"><div class="mname">VIP BOT</div><div class="mdesc" data-sk="Autonómna asistencia pri každodenných úkonoch starostlivosti." data-en="Autonomous assistance in everyday care tasks.">Autonómna asistencia pri každodenných úkonoch starostlivosti.</div><div class="mstate" data-sk="V príprave" data-en="In preparation">V príprave</div></div>
      <div class="modrow"><div class="mname">VIP ROOM</div><div class="mdesc" data-sk="Inteligentné prostredie izby integrované s celou platformou." data-en="Intelligent room environment integrated with the entire platform.">Inteligentné prostredie izby integrované s celou platformou.</div><div class="mstate" data-sk="V príprave" data-en="In preparation">V príprave</div></div>
      <div class="modrow"><div class="mname">VIP SPACE</div><div class="mdesc" data-sk="Suverénna cloudová infraštruktúra pre bezpečnú správu dát." data-en="Sovereign cloud infrastructure for secure data management.">Suverénna cloudová infraštruktúra pre bezpečnú správu dát.</div><div class="mstate" data-sk="V príprave" data-en="In preparation">V príprave</div></div>
      <div class="modrow"><div class="mname">ECO &amp; AI Infrastructure</div><div class="mdesc" data-sk="Energeticky efektívna a ekologická infraštruktúra celého systému." data-en="Energy-efficient and ecological infrastructure for the entire system.">Energeticky efektívna a ekologická infraštruktúra celého systému.</div><div class="mstate" data-sk="V príprave" data-en="In preparation">V príprave</div></div>
    </div>
  </div>
</section>

<!-- WARRANTY (inside expandable) -->
<section class="lextom-warranty">
  <div class="wrap">
    <div class="sec-label reveal" data-sk="Záruka a podpora" data-en="Warranty and Support">Záruka a podpora</div>
    <h2 class="sec-h reveal" data-sk="Istota na celý životný cyklus" data-en="Assurance for the entire lifecycle">Istota na celý životný cyklus</h2>
    <div class="grid">
      <div class="wcard reveal"><div class="wn">01</div><h3 data-sk="Záručný servis" data-en="Warranty service">Záručný servis</h3><p data-sk="Autorizovaný partner priamo u klienta, 24 mesiacov od kúpy." data-en="Authorized partner directly at the client, 24 months from purchase.">Autorizovaný partner priamo u klienta, 24 mesiacov od kúpy. Bezplatné opravy a výmena dielov pri výrobnej chybe.</p></div>
      <div class="wcard reveal d1"><div class="wn">02</div><h3 data-sk="Pozáručný servis" data-en="Post-warranty service">Pozáručný servis</h3><p data-sk="Doživotný servis zariadenia — technická podpora a možnosť platených opráv aj po záruke." data-en="Lifetime device service — technical support and paid repairs even after warranty.">Doživotný servis zariadenia — technická podpora a možnosť platených opráv aj po záruke cez autorizovaného partnera.</p></div>
      <div class="wcard reveal d2"><div class="wn">03</div><h3 data-sk="Buyback program" data-en="Buyback program">Buyback program</h3><p data-sk="Ak VIP BED už nie je potrebný, ponúkame spätný odkup za férových podmienok." data-en="If VIP BED is no longer needed, we offer a buyback under fair conditions.">Ak VIP BED už nie je potrebný, ponúkame spätný odkup za férových podmienok. Etické, ekologické a ekonomicky logické riešenie.</p></div>
    </div>
  </div>
</section>

<!-- CERTIFICATES & PARTNERSHIP -->
<section class="lextom-certificates">
  <div class="wrap">
    <div class="sec-label reveal" data-sk="Certifikáty a partnerstvá" data-en="Certificates & Partnerships">Certifikáty a partnerstvá</div>
    <div class="lang-sk">
      <h2 class="sec-h reveal">Overená kvalita a <em>autorizované partnerstvo</em></h2>
      <p class="reveal d1" style="font-size:15px;line-height:1.8;color:var(--sage);max-width:760px;margin-bottom:30px">Ak výrobca poskytne certifikáty a partnerské dohody, budú zverejnené priamo na tejto stránke ako dôkaz kvality a autorizovanej spolupráce.</p>
    </div>
    <div class="lang-en">
      <h2 class="sec-h reveal">Verified quality and <em>authorized partnership</em></h2>
      <p class="reveal d1" style="font-size:15px;line-height:1.8;color:var(--sage);max-width:760px;margin-bottom:30px">When the manufacturer provides certificates and partnership agreements, they will be published directly on this page as proof of quality and authorized cooperation.</p>
    </div>
    <div class="cert-grid">
      <div class="cert-card reveal">
        <span class="cert-icon">&#x1F4DC;</span>
        <h3 data-sk="Certifikáty produktov" data-en="Product Certificates">Certifikáty produktov</h3>
        <p data-sk="CE certifikácia, bezpečnostné certifikáty a zdravotnícke schválenia." data-en="CE certification, safety certificates and medical approvals.">CE certifikácia, bezpečnostné certifikáty a zdravotnícke schválenia.</p>
        <div class="cert-placeholder" data-sk="Dokumenty budú doplnené po poskytnutí výrobcom" data-en="Documents will be added once provided by manufacturer">Dokumenty budú doplnené po poskytnutí výrobcom</div>
      </div>
      <div class="cert-card reveal d1">
        <span class="cert-icon">&#x1F91D;</span>
        <h3 data-sk="Partnerská dohoda s výrobcom" data-en="Manufacturer Partnership Agreement">Partnerská dohoda s výrobcom</h3>
        <p data-sk="Autorizovaná distribučná zmluva potvrdzujúca oprávnenosť distribúcie a servisnej podpory." data-en="Authorized distribution agreement confirming distribution and service support authorization.">Autorizovaná distribučná zmluva potvrdzujúca oprávnenosť distribúcie a servisnej podpory.</p>
        <div class="cert-placeholder" data-sk="Dokument bude zverejnený po podpise" data-en="Document will be published after signing">Dokument bude zverejnený po podpise</div>
      </div>
      <div class="cert-card reveal d2">
        <span class="cert-icon">&#x1F3C5;</span>
        <h3 data-sk="Ďalšie certifikáty" data-en="Additional Certificates">Ďalšie certifikáty</h3>
        <p data-sk="ISO certifikáty, ocenenia a ďalšie dokumenty súvisiace s produktmi." data-en="ISO certificates, awards and other documents related to products.">ISO certifikáty, ocenenia a ďalšie dokumenty súvisiace s produktmi.</p>
        <div class="cert-placeholder" data-sk="Pripravujeme" data-en="In preparation">Pripravujeme</div>
      </div>
    </div>
  </div>
</section>

</div><!-- /.expandable-content -->

<!-- CTA -->
<section class="lextom-cta">
  <div class="wrap-narrow">
    <h2 class="reveal" data-sk="Pripravení posunúť starostlivosť na novú úroveň?" data-en="Ready to take care to the next level?">Pripravení posunúť starostlivosť na <em>novú úroveň?</em></h2>
    <p class="reveal d1" data-sk="Radi vám predstavíme VIP BED a celý ekosystém VIP Care Technology pre vaše zariadenie, nemocnicu alebo investičný zámer." data-en="We will be happy to present VIP BED and the entire VIP Care Technology ecosystem for your facility, hospital or investment purpose.">Radi vám predstavíme VIP BED a celý ekosystém VIP Care Technology pre vaše zariadenie, nemocnicu alebo investičný zámer.</p>
    <a href="mailto:info@lextom.sk" class="btn reveal d2" data-sk="Kontaktujte nás →" data-en="Contact us →">Kontaktujte nás →</a>
  </div>
</section>

<?php get_footer(); ?>
