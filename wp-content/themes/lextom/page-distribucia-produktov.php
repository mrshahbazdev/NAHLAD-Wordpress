<?php
/**
 * Template Name: LeXtom — Distribúcia produktov
 * Template Post Type: page
 *
 * @package LeXtom
 */

get_header();
$img = LEXTOM_URI . '/assets/images/';
?>

<!-- HERO (with showroom watermark background) -->
<header class="lextom-hero lextom-hero--left" style="position:relative;">
  <div class="hero-bg">
    <img src="<?php echo esc_url( $img . 'vipcare-showroom.jpg' ); ?>" alt="VIP Care Showroom" style="opacity:.12;filter:grayscale(1);">
    <div style="position:absolute;inset:0;background:linear-gradient(100deg,rgba(14,23,20,0.96) 0%,rgba(14,23,20,0.82) 45%,rgba(14,23,20,0.5) 100%);"></div>
  </div>
  <div class="hero-inner">
    <div class="eyebrow" data-sk="Inovatívna distribúcia produktov" data-en="Innovative Product Distribution">Inovatívna distribúcia produktov</div>
    <h1 class="hero-title">
      <span class="word" style="animation-delay:.4s" data-sk="Distribúcia produktov" data-en="Product Distribution">Distribúcia produktov</span>
      <span class="word accent" style="animation-delay:.55s" data-sk="novej generácie." data-en="of the new generation.">novej generácie.</span>
    </h1>
    <p class="hero-sub" data-sk="Prinášame na slovenský a európsky trh inovatívne produkty, ktoré menia spôsob, akým sa staráme o ľudí. Každý produkt v našom portfóliu prechádza dôkladným výberom." data-en="We bring innovative products to the Slovak and European market that change the way we care for people. Every product in our portfolio goes through a thorough selection.">Prinášame na slovenský a európsky trh inovatívne produkty, ktoré menia spôsob, akým sa staráme o ľudí. Každý produkt v našom portfóliu prechádza dôkladným výberom.</p>
    <a href="#katalog" class="btn reveal" data-sk="Pozrieť produkty →" data-en="View products →">Pozrieť produkty →</a>
  </div>
</header>

<!-- TARGET SEGMENTS -->
<section class="lextom-segments">
  <div class="wrap">
    <div class="sec-label center reveal" data-sk="Cieľové segmenty" data-en="Target Segments">Cieľové segmenty</div>
    <h2 class="sec-h reveal" data-sk="Pre koho sú naše produkty" data-en="Who are our products for">Pre koho sú naše produkty</h2>
    <div class="seg-row reveal d1">
      <span data-sk="Nemocnice" data-en="Hospitals">Nemocnice</span>
      <span data-sk="Zariadenia pre seniorov" data-en="Senior care facilities">Zariadenia pre seniorov</span>
      <span data-sk="Sociálne zariadenia" data-en="Social care facilities">Sociálne zariadenia</span>
      <span data-sk="Rehabilitačné centrá" data-en="Rehabilitation centers">Rehabilitačné centrá</span>
      <span data-sk="Domáca starostlivosť" data-en="Home care">Domáca starostlivosť</span>
      <span data-sk="Investori" data-en="Investors">Investori</span>
    </div>
  </div>
</section>

<!-- PRODUCT CATALOG -->
<section class="lextom-catalog" id="katalog">
  <div class="wrap">
    <div class="cat-head">
      <div>
        <div class="sec-label reveal" data-sk="Katalóg produktov" data-en="Product Catalog">Katalóg produktov</div>
        <h2 data-sk="Produkty v našom portfóliu" data-en="Products in our portfolio">Produkty v našom portfóliu</h2>
      </div>
      <div class="note reveal" data-sk="Postupne rozširujeme ponuku. Sledujte túto stránku pre nové produkty." data-en="We are gradually expanding our offer. Follow this page for new products.">Postupne rozširujeme ponuku. Sledujte túto stránku pre nové produkty.</div>
    </div>
    <div class="pgrid">
      <!-- PRODUCT 1 — VIP BED (Live) -->
      <a href="<?php echo esc_url( home_url('/produkt/vip-bed/') ); ?>" class="pcard live reveal">
        <div class="pimg"><img src="<?php echo esc_url( $img . 'produkt1-hero.jpg' ); ?>" alt="VIP BED"><span class="tag new" data-sk="Nové" data-en="New">Nové</span></div>
        <div class="pbody">
          <div class="pcat" data-sk="Inteligentná starostlivosť" data-en="Intelligent Care">Inteligentná starostlivosť</div>
          <h3>VIP BED</h3>
          <p data-sk="Autonómna platforma starostlivosti — automatizovaná hygiena, polohovanie, monitoring a zero-gravity technológia." data-en="Autonomous care platform — automated hygiene, positioning, monitoring and zero-gravity technology.">Autonómna platforma starostlivosti — automatizovaná hygiena, polohovanie, monitoring a zero-gravity technológia.</p>
          <div class="go" data-sk="Detail produktu →" data-en="Product detail →">Detail produktu →</div>
        </div>
      </a>

      <!-- PRODUCT 2 — Coming Soon -->
      <div class="pcard soon-card reveal d1">
        <div class="pimg"><div class="ph-empty"><span class="ic">&#x1F4E6;</span><span data-sk="Čoskoro" data-en="Coming soon">Čoskoro</span></div><span class="tag soon" data-sk="Pripravujeme" data-en="Coming soon">Pripravujeme</span></div>
        <div class="pbody">
          <div class="pcat" data-sk="Nový produkt" data-en="New Product">Nový produkt</div>
          <h3 data-sk="Produkt #2" data-en="Product #2">Produkt #2</h3>
          <p data-sk="Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti." data-en="Information will be added. We are preparing more innovative solutions for the care sector.">Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti.</p>
          <div class="gosoon" data-sk="Čoskoro dostupné" data-en="Available soon">Čoskoro dostupné</div>
        </div>
      </div>

      <!-- PRODUCT 3 — Coming Soon -->
      <div class="pcard soon-card reveal d2">
        <div class="pimg"><div class="ph-empty"><span class="ic">&#x1F4E6;</span><span data-sk="Čoskoro" data-en="Coming soon">Čoskoro</span></div><span class="tag soon" data-sk="Pripravujeme" data-en="Coming soon">Pripravujeme</span></div>
        <div class="pbody">
          <div class="pcat" data-sk="Nový produkt" data-en="New Product">Nový produkt</div>
          <h3 data-sk="Produkt #3" data-en="Product #3">Produkt #3</h3>
          <p data-sk="Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti." data-en="Information will be added. We are preparing more innovative solutions for the care sector.">Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti.</p>
          <div class="gosoon" data-sk="Čoskoro dostupné" data-en="Available soon">Čoskoro dostupné</div>
        </div>
      </div>

      <!-- PRODUCT 4 — Coming Soon -->
      <div class="pcard soon-card reveal">
        <div class="pimg"><div class="ph-empty"><span class="ic">&#x1F4E6;</span><span data-sk="Čoskoro" data-en="Coming soon">Čoskoro</span></div><span class="tag soon" data-sk="Pripravujeme" data-en="Coming soon">Pripravujeme</span></div>
        <div class="pbody">
          <div class="pcat" data-sk="Nový produkt" data-en="New Product">Nový produkt</div>
          <h3 data-sk="Produkt #4" data-en="Product #4">Produkt #4</h3>
          <p data-sk="Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti." data-en="Information will be added. We are preparing more innovative solutions for the care sector.">Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti.</p>
          <div class="gosoon" data-sk="Čoskoro dostupné" data-en="Available soon">Čoskoro dostupné</div>
        </div>
      </div>

      <!-- PRODUCT 5 — Coming Soon -->
      <div class="pcard soon-card reveal d1">
        <div class="pimg"><div class="ph-empty"><span class="ic">&#x1F4E6;</span><span data-sk="Čoskoro" data-en="Coming soon">Čoskoro</span></div><span class="tag soon" data-sk="Pripravujeme" data-en="Coming soon">Pripravujeme</span></div>
        <div class="pbody">
          <div class="pcat" data-sk="Nový produkt" data-en="New Product">Nový produkt</div>
          <h3 data-sk="Produkt #5" data-en="Product #5">Produkt #5</h3>
          <p data-sk="Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti." data-en="Information will be added. We are preparing more innovative solutions for the care sector.">Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti.</p>
          <div class="gosoon" data-sk="Čoskoro dostupné" data-en="Available soon">Čoskoro dostupné</div>
        </div>
      </div>

      <!-- PRODUCT 6 — Coming Soon -->
      <div class="pcard soon-card reveal d2">
        <div class="pimg"><div class="ph-empty"><span class="ic">&#x1F4E6;</span><span data-sk="Čoskoro" data-en="Coming soon">Čoskoro</span></div><span class="tag soon" data-sk="Pripravujeme" data-en="Coming soon">Pripravujeme</span></div>
        <div class="pbody">
          <div class="pcat" data-sk="Nový produkt" data-en="New Product">Nový produkt</div>
          <h3 data-sk="Produkt #6" data-en="Product #6">Produkt #6</h3>
          <p data-sk="Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti." data-en="Information will be added. We are preparing more innovative solutions for the care sector.">Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti.</p>
          <div class="gosoon" data-sk="Čoskoro dostupné" data-en="Available soon">Čoskoro dostupné</div>
        </div>
      </div>

      <!-- PRODUCT 7 — Coming Soon -->
      <div class="pcard soon-card reveal">
        <div class="pimg"><div class="ph-empty"><span class="ic">&#x1F4E6;</span><span data-sk="Čoskoro" data-en="Coming soon">Čoskoro</span></div><span class="tag soon" data-sk="Pripravujeme" data-en="Coming soon">Pripravujeme</span></div>
        <div class="pbody">
          <div class="pcat" data-sk="Nový produkt" data-en="New Product">Nový produkt</div>
          <h3 data-sk="Produkt #7" data-en="Product #7">Produkt #7</h3>
          <p data-sk="Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti." data-en="Information will be added. We are preparing more innovative solutions for the care sector.">Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti.</p>
          <div class="gosoon" data-sk="Čoskoro dostupné" data-en="Available soon">Čoskoro dostupné</div>
        </div>
      </div>

      <!-- PRODUCT 8 — Coming Soon -->
      <div class="pcard soon-card reveal d1">
        <div class="pimg"><div class="ph-empty"><span class="ic">&#x1F4E6;</span><span data-sk="Čoskoro" data-en="Coming soon">Čoskoro</span></div><span class="tag soon" data-sk="Pripravujeme" data-en="Coming soon">Pripravujeme</span></div>
        <div class="pbody">
          <div class="pcat" data-sk="Nový produkt" data-en="New Product">Nový produkt</div>
          <h3 data-sk="Produkt #8" data-en="Product #8">Produkt #8</h3>
          <p data-sk="Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti." data-en="Information will be added. We are preparing more innovative solutions for the care sector.">Informácie budú doplnené. Pripravujeme ďalšie inovatívne riešenia pre oblasť starostlivosti.</p>
          <div class="gosoon" data-sk="Čoskoro dostupné" data-en="Available soon">Čoskoro dostupné</div>
        </div>
      </div>
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

<!-- CTA -->
<section class="lextom-cta">
  <div class="wrap-narrow">
    <h2 class="reveal" data-sk="Hľadáte riešenie pre vašu organizáciu?" data-en="Looking for a solution for your organization?">Hľadáte riešenie pre <em>vašu organizáciu?</em></h2>
    <p class="reveal d1" data-sk="Kontaktujte nás a radi vám pomôžeme vybrať správny produkt pre vaše zariadenie, nemocnicu alebo projekt." data-en="Contact us and we will be happy to help you choose the right product for your facility, hospital or project.">Kontaktujte nás a radi vám pomôžeme vybrať správny produkt pre vaše zariadenie, nemocnicu alebo projekt.</p>
    <a href="mailto:info@lextom.sk" class="btn reveal d2" data-sk="Kontaktujte nás →" data-en="Contact us →">Kontaktujte nás →</a>
  </div>
</section>

<?php get_footer(); ?>
