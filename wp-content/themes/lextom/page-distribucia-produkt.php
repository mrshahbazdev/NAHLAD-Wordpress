<?php
/**
 * Template Name: LeXtom — Produkt Detail
 * Template Post Type: page
 *
 * @package LeXtom
 */

get_header();
$img = LEXTOM_URI . '/assets/images/';
?>

<div class="breadcrumb">
  <a href="<?php echo esc_url( home_url( '/distribucia-produktov/' ) ); ?>" data-sk="Distribúcia produktov" data-en="Product Distribution">Distribúcia produktov</a>
  &nbsp;/&nbsp;
  <span data-sk="Prenosný sprchový a sušiaci systém" data-en="Portable Shower and Drying System">Prenosný sprchový a sušiaci systém</span>
</div>

<!-- PRODUKT TOP -->
<div class="ptop">
  <div class="gallery">
    <div class="main"><img id="mainimg" src="<?php echo esc_url( $img . 'produkt1-hero.jpg' ); ?>" alt="Prenosný sprchový a sušiaci systém"></div>
    <div class="thumbs">
      <div class="t active" data-full="<?php echo esc_url( $img . 'produkt1-hero.jpg' ); ?>"><img src="<?php echo esc_url( $img . 'produkt1-hero.jpg' ); ?>" alt="Zariadenie"></div>
      <div class="t" data-full="<?php echo esc_url( $img . 'produkt1-g1.jpg' ); ?>"><img src="<?php echo esc_url( $img . 'produkt1-g1.jpg' ); ?>" alt="Sprchovanie tela"></div>
      <div class="t" data-full="<?php echo esc_url( $img . 'produkt1-g2.jpg' ); ?>"><img src="<?php echo esc_url( $img . 'produkt1-g2.jpg' ); ?>" alt="Čistenie tváre"></div>
      <div class="t" data-full="<?php echo esc_url( $img . 'produkt1-g3.jpg' ); ?>"><img src="<?php echo esc_url( $img . 'produkt1-g3.jpg' ); ?>" alt="Umývanie vlasov"></div>
    </div>
  </div>
  <div class="pinfo">
    <div class="pcat" data-sk="Hygiena a starostlivosť" data-en="Hygiene and Care">Hygiena a starostlivosť</div>
    <h1 data-sk="Prenosný sprchový a sušiaci systém" data-en="Portable Shower and Drying System">Prenosný sprchový a sušiaci systém</h1>
    <div class="tagline" data-sk="Bezvodá mobilná hygiena — sprchovanie a sušenie kdekoľvek." data-en="Waterless mobile hygiene — showering and drying anywhere.">Bezvodá mobilná hygiena — sprchovanie a sušenie kdekoľvek.</div>
    <p class="pdesc" data-sk="Integrované prenosné zariadenie pre kompletnú hygienu pacienta bez potreby kúpeľne, externého prívodu vody či elektriny." data-en="Integrated portable device for complete patient hygiene without the need for a bathroom, external water supply or electricity.">Integrované prenosné zariadenie pre kompletnú hygienu pacienta bez potreby kúpeľne, externého prívodu vody či elektriny. Umožňuje šetrné sprchovanie aj sušenie priamo na lôžku alebo v kresle — ideálne pre imobilných a čiastočne mobilných klientov. Mikro-rozprašovacia technológia zabezpečuje dôkladné, no úsporné čistenie pri minimálnej spotrebe vody.</p>
    <div class="quickspecs">
      <div class="qs"><div class="v">4,95<span style="font-size:14px">kg</span></div><div class="l" data-sk="Hmotnosť" data-en="Weight">Hmotnosť</div></div>
      <div class="qs"><div class="v">1,7<span style="font-size:14px">L</span></div><div class="l" data-sk="Nádrž na vodu" data-en="Water tank">Nádrž na vodu</div></div>
      <div class="qs"><div class="v">7500<span style="font-size:13px">mAh</span></div><div class="l" data-sk="Batéria" data-en="Battery">Batéria</div></div>
    </div>
    <div class="pcta">
      <a href="#dopyt" class="btn btn-primary" data-sk="Dopyt na cenu →" data-en="Price inquiry →">Dopyt na cenu →</a>
      <a href="mailto:info@lextom.sk" class="btn btn-ghost" data-sk="Konzultácia" data-en="Consultation">Konzultácia</a>
    </div>
  </div>
</div>

<!-- BENEFITY -->
<section class="lextom-benefits" style="background:var(--forest);">
  <div class="wrap">
    <div class="sec-label reveal" data-sk="Výhody a benefity" data-en="Advantages and Benefits">Výhody a benefity</div>
    <h2 class="sec-h reveal" data-sk="Prečo toto zariadenie" data-en="Why this device">Prečo toto zariadenie</h2>
    <div class="ben-grid">
      <div class="ben reveal"><span class="bico">◇</span><h3 data-sk="Bez kúpeľne a bez vody zo siete" data-en="No bathroom, no water mains">Bez kúpeľne a bez vody zo siete</h3><p data-sk="Žiadny externý prívod vody ani elektriny. Hygiena kdekoľvek — na lôžku, v izbe, v teréne." data-en="No external water or electricity supply. Hygiene anywhere — on a bed, in a room, in the field.">Žiadny externý prívod vody ani elektriny. Hygiena kdekoľvek — na lôžku, v izbe, v teréne.</p></div>
      <div class="ben reveal d1"><span class="bico">⌁</span><h3 data-sk="Mobilita na jednu ruku" data-en="One-hand mobility">Mobilita na jednu ruku</h3><p data-sk="Kompaktné integrované telo s hmotnosťou 4,95 kg sa ľahko prenáša a obsluhuje." data-en="Compact integrated body weighing 4.95 kg is easy to carry and operate.">Kompaktné integrované telo s hmotnosťou 4,95 kg sa ľahko prenáša a obsluhuje.</p></div>
      <div class="ben reveal d2"><span class="bico">◷</span><h3 data-sk="Rýchla hygiena za minúty" data-en="Fast hygiene in minutes">Rýchla hygiena za minúty</h3><p data-sk="Kompletné ošetrenie v priebehu minút — výrazná úspora času personálu." data-en="Complete treatment in minutes — significant time savings for staff.">Kompletné ošetrenie v priebehu minút — výrazná úspora času personálu.</p></div>
      <div class="ben reveal"><span class="bico">⬡</span><h3 data-sk="Mikro-rozprašovanie" data-en="Micro-spraying">Mikro-rozprašovanie</h3><p data-sk="Jemná mikro-vodná technológia šetrne čistí pokožku aj vlasy." data-en="Gentle micro-water technology gently cleanses skin and hair.">Jemná mikro-vodná technológia šetrne čistí pokožku aj vlasy s minimálnou spotrebou vody.</p></div>
      <div class="ben reveal d1"><span class="bico">♨</span><h3 data-sk="Sprchovanie aj sušenie" data-en="Showering and drying">Sprchovanie aj sušenie</h3><p data-sk="Umývanie a sušenie v jednom zariadení." data-en="Washing and drying in one device.">Umývanie a sušenie v jednom zariadení — bez mokrých podláh a rizika pošmyknutia.</p></div>
      <div class="ben reveal d2"><span class="bico">♺</span><h3 data-sk="Úspora vody" data-en="Water saving">Úspora vody</h3><p data-sk="Jedna nádrž stačí na kompletnú očistu — výrazne nižšia spotreba." data-en="One tank is enough for complete cleaning — significantly lower consumption.">Jedna nádrž stačí na kompletnú očistu — výrazne nižšia spotreba oproti klasickému kúpaniu.</p></div>
    </div>
  </div>
</section>

<!-- PARAMETRE -->
<section class="lextom-params" style="background:var(--forest-deep);">
  <div class="wrap">
    <div class="sec-label reveal" data-sk="Technické parametre" data-en="Technical Parameters">Technické parametre</div>
    <h2 class="sec-h reveal" data-sk="Špecifikácia" data-en="Specification">Špecifikácia</h2>
    <div class="ptable reveal d1">
      <div class="row"><div class="k" data-sk="Hmotnosť zariadenia" data-en="Device weight">Hmotnosť zariadenia</div><div class="v">4,95 kg (integrovaný dizajn)</div></div>
      <div class="row"><div class="k" data-sk="Kapacita nádrže na vodu" data-en="Water tank capacity">Kapacita nádrže na vodu</div><div class="v">1,7 L</div></div>
      <div class="row"><div class="k" data-sk="Batéria" data-en="Battery">Batéria</div><div class="v">Vstavaná nabíjateľná, 7500 mAh</div></div>
      <div class="row"><div class="k" data-sk="Napájanie" data-en="Power supply">Napájanie</div><div class="v" data-sk="Bezdrôtové — bez potreby pripojenia do siete pri použití" data-en="Wireless — no need for mains connection during use">Bezdrôtové — bez potreby pripojenia do siete pri použití</div></div>
      <div class="row"><div class="k" data-sk="Spotreba vody" data-en="Water consumption">Spotreba vody</div><div class="v" data-sk="Mikro-rozprašovanie — výrazná úspora oproti klasickému kúpaniu" data-en="Micro-spraying — significant savings compared to traditional bathing">Mikro-rozprašovanie — výrazná úspora oproti klasickému kúpaniu</div></div>
      <div class="row"><div class="k" data-sk="Funkcie" data-en="Functions">Funkcie</div><div class="v" data-sk="Sprchovanie, sušenie, ošetrenie pokožky aj vlasov" data-en="Showering, drying, skin and hair treatment">Sprchovanie, sušenie, ošetrenie pokožky aj vlasov</div></div>
      <div class="row"><div class="k" data-sk="Príslušenstvo" data-en="Accessories">Príslušenstvo</div><div class="v" data-sk="Vymeniteľné čistiace hlavice (telo, krátke vlasy, dlhé vlasy)" data-en="Replaceable cleaning heads (body, short hair, long hair)">Vymeniteľné čistiace hlavice (telo, krátke vlasy, dlhé vlasy)</div></div>
      <div class="row"><div class="k" data-sk="Dizajn" data-en="Design">Dizajn</div><div class="v" data-sk="Mikro-rozprašovací, anti-drip; prenosný na jednu ruku" data-en="Micro-spray, anti-drip; portable with one hand">Mikro-rozprašovací, anti-drip; prenosný na jednu ruku</div></div>
    </div>
  </div>
</section>

<!-- FORMULÁR DOPYTU -->
<section class="lextom-cta" id="dopyt">
  <div class="wrap-narrow">
    <h2 class="reveal" data-sk="Máte záujem o tento produkt?" data-en="Interested in this product?">Máte záujem o tento produkt?</h2>
    <p class="reveal d1" data-sk="Kontaktujte nás pre individuálnu cenovú ponuku alebo obchodné podmienky." data-en="Contact us for an individual price offer or business terms.">Kontaktujte nás pre individuálnu cenovú ponuku alebo obchodné podmienky. Pre B2B partnerov, zdravotnícke a sociálne zariadenia ponúkame riešenia na mieru.</p>
    <a href="mailto:info@lextom.sk" class="btn reveal d2" data-sk="Kontaktujte nás →" data-en="Contact us →">Kontaktujte nás →</a>
  </div>
</section>

<script>
(function(){
  var thumbs = document.querySelectorAll('.ptop .thumbs .t');
  var mainImg = document.getElementById('mainimg');
  if (!thumbs.length || !mainImg) return;
  thumbs.forEach(function(t){
    t.addEventListener('click', function(){
      thumbs.forEach(function(x){ x.classList.remove('active'); });
      t.classList.add('active');
      var src = t.getAttribute('data-full');
      if (src) mainImg.src = src;
    });
  });
})();
</script>

<?php get_footer(); ?>
