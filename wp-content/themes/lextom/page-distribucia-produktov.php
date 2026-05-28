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

<header class="lextom-hero">
  <div class="hero-inner">
    <div class="eyebrow" data-sk="Distribúcia produktov" data-en="Product Distribution">Distribúcia produktov</div>
    <h1 class="hero-title" data-sk="Distribúcia inovatívnych produktov" data-en="Distribution of innovative products">Distribúcia <em>inovatívnych produktov</em></h1>
    <p class="hero-sub" data-sk="Moderné technologické riešenia pre zdravotníctvo, sociálne zariadenia a segment profesionálnej starostlivosti — s vysokou pridanou hodnotou a dôrazom na efektivitu, komfort a optimalizáciu nákladov." data-en="Modern technological solutions for healthcare, social facilities and the professional care segment — with high added value focusing on efficiency, comfort and cost optimization.">Moderné technologické riešenia pre zdravotníctvo, sociálne zariadenia a segment profesionálnej starostlivosti — s vysokou pridanou hodnotou a dôrazom na efektivitu, komfort a optimalizáciu nákladov.</p>
  </div>
</header>

<!-- INTRO -->
<section class="lextom-company">
  <div class="wrap">
    <div class="sec-label reveal" data-sk="O distribúcii" data-en="About Distribution">O distribúcii</div>
    <p class="reveal d1" data-sk="Zameriavame sa na výber inovatívnych produktov s vysokou pridanou hodnotou, ktoré prinášajú efektívnejšiu starostlivosť, vyšší komfort pacientov a optimalizáciu prevádzkových nákladov." data-en="We focus on selecting innovative products with high added value that bring more efficient care, greater patient comfort and operational cost optimization.">Zameriavame sa na výber inovatívnych produktov s vysokou pridanou hodnotou, ktoré prinášajú <strong>efektívnejšiu starostlivosť, vyšší komfort pacientov a optimalizáciu prevádzkových nákladov.</strong> Produkty distribuujeme vo viacerých modeloch spolupráce:</p>
    <div class="steps" style="grid-template-columns:repeat(3,1fr);">
      <div class="step reveal"><div class="n">◈</div><p data-sk="V exkluzívnej spolupráci s výrobcami" data-en="In exclusive cooperation with manufacturers">V exkluzívnej spolupráci s výrobcami</p></div>
      <div class="step reveal d1"><div class="n">⬡</div><p data-sk="Ako autorizovaný distribučný partner" data-en="As an authorized distribution partner">Ako autorizovaný distribučný partner</p></div>
      <div class="step reveal d2"><div class="n">◉</div><p data-sk="Ako zariadenia vyvíjané a vyrábané priamo pre našu spoločnosť" data-en="As devices developed and manufactured directly for our company">Ako zariadenia vyvíjané a vyrábané priamo pre našu spoločnosť</p></div>
    </div>
  </div>
</section>

<!-- KATALÓG -->
<section class="lextom-catalog" style="background:var(--forest-deep);">
  <div class="wrap">
    <div class="cat-head reveal">
      <h2 class="sec-h" data-sk="Katalóg produktov" data-en="Product Catalog">Katalóg produktov</h2>
      <div style="font-size:13px;color:var(--muted);margin-top:8px;" data-sk="Informačný katalóg bez online predaja. Každý produkt má vlastnú stránku s detailom, galériou a formulárom dopytu ceny." data-en="Information catalog without online sales. Each product has its own page with details, gallery and price inquiry form.">Informačný katalóg bez online predaja. Každý produkt má vlastnú stránku s detailom, galériou a formulárom dopytu ceny.</div>
    </div>

    <div class="pgrid">
      <a href="<?php echo esc_url( home_url( '/distribucia-produkt/' ) ); ?>" class="pcard live reveal">
        <div class="pimg"><img src="<?php echo esc_url( $img . 'produkt1-hero.jpg' ); ?>" alt="Prenosný sprchový a sušiaci systém"></div>
        <div class="pbody">
          <h3 data-sk="Prenosný sprchový a sušiaci systém" data-en="Portable Shower and Drying System">Prenosný sprchový a sušiaci systém</h3>
          <p data-sk="Bezvodá mobilná hygiena pre imobilných pacientov — sprchovanie a sušenie kdekoľvek, bez napojenia na vodu a elektrinu." data-en="Waterless mobile hygiene for immobile patients — showering and drying anywhere, without water or electricity connection.">Bezvodá mobilná hygiena pre imobilných pacientov — sprchovanie a sušenie kdekoľvek, bez napojenia na vodu a elektrinu.</p>
        </div>
      </a>

      <div class="pcard coming-soon reveal d1">
        <div class="pimg" style="display:flex;align-items:center;justify-content:center;background:var(--forest);min-height:180px;"><span style="font-size:14px;color:var(--muted);" data-sk="Pripravujeme" data-en="Coming soon">Pripravujeme</span></div>
        <div class="pbody"><h3 data-sk="Pripravujeme ďalší produkt" data-en="Preparing next product">Pripravujeme ďalší produkt</h3><p data-sk="Detailný popis, parametre a galéria budú doplnené čoskoro." data-en="Detailed description, parameters and gallery will be added soon.">Detailný popis, parametre a galéria budú doplnené čoskoro.</p></div>
      </div>
      <div class="pcard coming-soon reveal d2">
        <div class="pimg" style="display:flex;align-items:center;justify-content:center;background:var(--forest);min-height:180px;"><span style="font-size:14px;color:var(--muted);">Pripravujeme</span></div>
        <div class="pbody"><h3>Pripravujeme ďalší produkt</h3><p>Detailný popis, parametre a galéria budú doplnené čoskoro.</p></div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>
