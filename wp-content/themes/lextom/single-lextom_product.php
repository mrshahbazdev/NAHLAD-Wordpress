<?php
/**
 * Single Product Template
 *
 * @package LeXtom
 */

get_header();

$tag = get_post_meta( get_the_ID(), '_lextom_product_tag', true );
$tagline = get_post_meta( get_the_ID(), '_lextom_product_tagline', true );

$spec1_val = get_post_meta( get_the_ID(), '_lextom_product_spec1_val', true );
$spec1_lbl = get_post_meta( get_the_ID(), '_lextom_product_spec1_lbl', true );
$spec2_val = get_post_meta( get_the_ID(), '_lextom_product_spec2_val', true );
$spec2_lbl = get_post_meta( get_the_ID(), '_lextom_product_spec2_lbl', true );
$spec3_val = get_post_meta( get_the_ID(), '_lextom_product_spec3_val', true );
$spec3_lbl = get_post_meta( get_the_ID(), '_lextom_product_spec3_lbl', true );

$terms = get_the_terms( get_the_ID(), 'lextom_product_cat' );
$cat_name = $terms && ! is_wp_error( $terms ) ? $terms[0]->name : '';
?>

<!-- BREADCRUMB -->
<div class="breadcrumb reveal">
  <a href="<?php echo esc_url( home_url('/distribucia-produktov/') ); ?>" data-sk="← Späť na produkty" data-en="← Back to products">← Späť na produkty</a>
</div>

<!-- PRODUKT TOP -->
<section class="ptop" style="padding-top: 30px;">
  <div class="gallery reveal d1">
    <div class="main">
        <?php if ( has_post_thumbnail() ) {
            $main_img_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
            echo '<img id="mainimg" src="' . esc_url( $main_img_url ) . '" alt="">';
        } else {
            $main_img_url = LEXTOM_URI . '/assets/images/placeholder.jpg';
            echo '<img id="mainimg" src="' . esc_url( $main_img_url ) . '" alt="">';
        } ?>
    </div>
    
    <?php
    $gallery_meta = get_post_meta( get_the_ID(), '_lextom_product_gallery', true );
    if ( $gallery_meta ) {
        $gallery_ids = explode( ',', $gallery_meta );
        if ( count( $gallery_ids ) > 0 ) {
            echo '<div class="thumbs">';
            
            // First thumbnail is the main image
            echo '<div class="t active" onclick="document.getElementById(\'mainimg\').src=this.querySelector(\'img\').dataset.large; document.querySelectorAll(\'.t\').forEach(el=>el.classList.remove(\'active\')); this.classList.add(\'active\');">';
            echo '<img src="' . esc_url( $main_img_url ) . '" data-large="' . esc_url( $main_img_url ) . '" alt="">';
            echo '</div>';
            
            // Loop through gallery images
            foreach ( $gallery_ids as $id ) {
                $thumb_url = wp_get_attachment_image_url( $id, 'large' ); // Use large so it looks good when clicked to main
                $thumb_small = wp_get_attachment_image_url( $id, 'thumbnail' );
                if ( $thumb_url ) {
                    echo '<div class="t" onclick="document.getElementById(\'mainimg\').src=\''.esc_url($thumb_url).'\'; document.querySelectorAll(\'.t\').forEach(el=>el.classList.remove(\'active\')); this.classList.add(\'active\');">';
                    echo '<img src="' . esc_url( $thumb_small ) . '" alt="">';
                    echo '</div>';
                }
            }
            
            echo '</div>';
        }
    }
    ?>
  </div>
  <div class="pinfo reveal d2">
    <?php if ( $cat_name ) : ?>
        <div class="pcat"><?php echo esc_html( $cat_name ); ?></div>
    <?php endif; ?>
    <h1><?php the_title(); ?></h1>
    <?php if ( $tagline ) : ?>
        <div class="tagline"><?php echo esc_html( $tagline ); ?></div>
    <?php endif; ?>
    <div class="pdesc">
        <?php the_content(); ?>
    </div>
    
    <?php if ( $spec1_val || $spec2_val || $spec3_val ) : ?>
    <div class="quickspecs">
      <?php if ( $spec1_val ) : ?>
      <div class="qs"><div class="v"><?php echo esc_html($spec1_val); ?></div><div class="l"><?php echo esc_html($spec1_lbl); ?></div></div>
      <?php endif; ?>
      <?php if ( $spec2_val ) : ?>
      <div class="qs"><div class="v"><?php echo esc_html($spec2_val); ?></div><div class="l"><?php echo esc_html($spec2_lbl); ?></div></div>
      <?php endif; ?>
      <?php if ( $spec3_val ) : ?>
      <div class="qs"><div class="v"><?php echo esc_html($spec3_val); ?></div><div class="l"><?php echo esc_html($spec3_lbl); ?></div></div>
      <?php endif; ?>
    </div>
    <?php endif; ?>

    <div class="pcta">
      <a href="#dopyt" class="btn btn-primary" data-sk="Dopyt na cenu →" data-en="Price inquiry →">Dopyt na cenu →</a>
      <a href="mailto:<?php echo esc_attr( get_theme_mod('lextom_email', 'info@lextom.sk') ); ?>" class="btn btn-ghost" data-sk="Konzultácia" data-en="Consultation">Konzultácia</a>
    </div>
  </div>
</section>



<!-- BENEFITY -->
<section class="benefits">
  <div class="wrap">
    <div class="sec-label reveal" data-sk="Výhody a benefity" data-en="Advantages and benefits">Výhody a benefity</div>
    <h2 class="sec-h reveal" data-sk="Prečo toto zariadenie" data-en="Why this device">Prečo toto zariadenie</h2>
    <div class="bgrid">
      <div class="ben reveal">
        <span class="bi">◇</span>
        <h3 data-sk="Bez kúpeľne a bez vody zo siete" data-en="Without a bathroom and mains water">Bez kúpeľne a bez vody zo siete</h3>
        <p data-sk="Žiadny externý prívod vody ani elektriny. Hygiena kdekoľvek — na lôžku, v izbe, v teréne." data-en="No external water or electricity supply. Hygiene anywhere — in bed, in the room, in the field.">Žiadny externý prívod vody ani elektriny. Hygiena kdekoľvek — na lôžku, v izbe, v teréne.</p>
      </div>
      <div class="ben reveal d1">
        <span class="bi">⌚</span>
        <h3 data-sk="Mobilita na jednu ruku" data-en="One-handed mobility">Mobilita na jednu ruku</h3>
        <p data-sk="Kompaktné integrované telo s hmotnosťou 4,95 kg sa ľahko prenáša a obsluhuje." data-en="Compact integrated body weighing 4.95 kg is easy to carry and operate.">Kompaktné integrované telo s hmotnosťou 4,95 kg sa ľahko prenáša a obsluhuje.</p>
      </div>
      <div class="ben reveal d2">
        <span class="bi">◷</span>
        <h3 data-sk="Rýchla hygiena za minúty" data-en="Fast hygiene in minutes">Rýchla hygiena za minúty</h3>
        <p data-sk="Kompletné ošetrenie v priebehu minút — výrazná úspora času personálu." data-en="Complete treatment within minutes — significant time savings for staff.">Kompletné ošetrenie v priebehu minút — výrazná úspora času personálu.</p>
      </div>
      <div class="ben reveal">
        <span class="bi">⬡</span>
        <h3 data-sk="Mikro-rozprašovanie" data-en="Micro-spraying">Mikro-rozprašovanie</h3>
        <p data-sk="Jemná mikro-vodná technológia šetrne čistí pokožku aj vlasy s minimálnou spotrebou vody." data-en="Gentle micro-water technology gently cleans skin and hair with minimum water consumption.">Jemná mikro-vodná technológia šetrne čistí pokožku aj vlasy s minimálnou spotrebou vody.</p>
      </div>
      <div class="ben reveal d1">
        <span class="bi">♨</span>
        <h3 data-sk="Sprchovanie aj sušenie" data-en="Showering and drying">Sprchovanie aj sušenie</h3>
        <p data-sk="Umývanie a sušenie v jednom zariadení — bez mokrých podláh a rizika pošmyknutia." data-en="Washing and drying in one device — without wet floors and the risk of slipping.">Umývanie a sušenie v jednom zariadení — bez mokrých podláh a rizika pošmyknutia.</p>
      </div>
      <div class="ben reveal d2">
        <span class="bi">♺</span>
        <h3 data-sk="Úspora vody" data-en="Water saving">Úspora vody</h3>
        <p data-sk="Jedna nádrž stačí na kompletnú očistu — výrazne nižšia spotreba oproti klasickému kúpaniu." data-en="One tank is enough for complete cleaning — significantly lower consumption compared to classic bathing.">Jedna nádrž stačí na kompletnú očistu — výrazne nižšia spotreba oproti klasickému kúpaniu.</p>
      </div>
    </div>
  </div>
</section>

<!-- PARAMETRE -->
<section class="params">
  <div class="wrap">
    <div class="sec-label reveal" data-sk="Technické parametre" data-en="Technical parameters">Technické parametre</div>
    <h2 class="sec-h reveal" data-sk="Špecifikácia" data-en="Specification">Špecifikácia</h2>
    <div class="ptable reveal d1">
      <div class="row"><div class="k" data-sk="Hmotnosť zariadenia" data-en="Device weight">Hmotnosť zariadenia</div><div class="v" data-sk="4,95 kg (integrovaný dizajn)" data-en="4.95 kg (integrated design)">4,95 kg (integrovaný dizajn)</div></div>
      <div class="row"><div class="k" data-sk="Kapacita nádrže na vodu" data-en="Water tank capacity">Kapacita nádrže na vodu</div><div class="v">1,7 L</div></div>
      <div class="row"><div class="k" data-sk="Batéria" data-en="Battery">Batéria</div><div class="v" data-sk="Vstavaná nabíjateľná, 7500 mAh" data-en="Built-in rechargeable, 7500 mAh">Vstavaná nabíjateľná, 7500 mAh</div></div>
      <div class="row"><div class="k" data-sk="Napájanie" data-en="Power supply">Napájanie</div><div class="v" data-sk="Bezdrôtové — bez potreby pripojenia do siete pri použití" data-en="Wireless — no need for mains connection during use">Bezdrôtové — bez potreby pripojenia do siete pri použití</div></div>
      <div class="row"><div class="k" data-sk="Spotreba vody" data-en="Water consumption">Spotreba vody</div><div class="v" data-sk="Mikro-rozprašovanie — výrazná úspora oproti klasickému kúpaniu" data-en="Micro-spraying — significant savings compared to classic bathing">Mikro-rozprašovanie — výrazná úspora oproti klasickému kúpaniu</div></div>
      <div class="row"><div class="k" data-sk="Funkcie" data-en="Functions">Funkcie</div><div class="v" data-sk="Sprchovanie, sušenie, ošetrenie pokožky aj vlasov" data-en="Showering, drying, skin and hair treatment">Sprchovanie, sušenie, ošetrenie pokožky aj vlasov</div></div>
      <div class="row"><div class="k" data-sk="Príslušenstvo" data-en="Accessories">Príslušenstvo</div><div class="v" data-sk="Vymeniteľné čistiace hlavice (telo, krátke vlasy, dlhé vlasy)" data-en="Interchangeable cleaning heads (body, short hair, long hair)">Vymeniteľné čistiace hlavice (telo, krátke vlasy, dlhé vlasy)</div></div>
      <div class="row"><div class="k" data-sk="Dizajn" data-en="Design">Dizajn</div><div class="v" data-sk="Mikro-rozprašovací, anti-drip; prenosný na jednu ruku" data-en="Micro-spraying, anti-drip; one-handed portable">Mikro-rozprašovací, anti-drip; prenosný na jednu ruku</div></div>
    </div>
  </div>
</section>

<!-- VYUŽITIE -->
<section class="usage">
  <div class="wrap">
    <div class="sec-label reveal" data-sk="Možnosti využitia" data-en="Use cases">Možnosti využitia</div>
    <h2 class="sec-h reveal" data-sk="Kde sa zariadenie uplatní" data-en="Where the device can be used">Kde sa zariadenie uplatní</h2>
    <div class="ucols">
      <div class="ucol reveal">
        <h3 data-sk="Prostredie" data-en="Environment">Prostredie</h3>
        <ul>
          <li data-sk="Zariadenia sociálnych služieb a domovy seniorov" data-en="Social service facilities and nursing homes">Zariadenia sociálnych služieb a domovy seniorov</li>
          <li data-sk="Nemocnice a lôžkové oddelenia" data-en="Hospitals and inpatient wards">Nemocnice a lôžkové oddelenia</li>
          <li data-sk="Rehabilitačné a doliečovacie centrá" data-en="Rehabilitation and aftercare centers">Rehabilitačné a doliečovacie centrá</li>
          <li data-sk="Domáca starostlivosť o blízkych" data-en="Home care for loved ones">Domáca starostlivosť o blízkych</li>
        </ul>
      </div>
      <div class="ucol reveal d1">
        <h3 data-sk="Pre koho" data-en="For whom">Pre koho</h3>
        <ul>
          <li data-sk="Imobilní a ležiaci pacienti" data-en="Immobile and bedridden patients">Imobilní a ležiaci pacienti</li>
          <li data-sk="Seniori s obmedzenou pohyblivosťou" data-en="Seniors with limited mobility">Seniori s obmedzenou pohyblivosťou</li>
          <li data-sk="Osoby po operáciách a úrazoch" data-en="Persons after surgery and injuries">Osoby po operáciách a úrazoch</li>
          <li data-sk="Opatrovatelia a zdravotnícky personál" data-en="Caregivers and medical staff">Opatrovatelia a zdravotnícky personál</li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- DOKUMENTÁCIA -->
<section class="docs">
  <div class="wrap">
    <div class="sec-label reveal" style="justify-content:center" data-sk="Dokumentácia a certifikácie" data-en="Documentation & Certification">Dokumentácia a certifikácie</div>
    <h2 class="sec-h reveal" data-sk="Dokumentácia na vyžiadanie" data-en="Documentation on request">Dokumentácia na vyžiadanie</h2>
    <p class="note reveal d1" data-sk="Kompletná technická dokumentácia, návod na použitie a certifikáty poskytujeme na vyžiadanie pri obchodnom dopyte. V prípade záujmu o detailné podklady nás kontaktujte prostredníctvom formulára nižšie." data-en="Complete technical documentation, user manuals and certificates are provided upon request during business inquiry. If you are interested in detailed materials, please contact us via the form below.">Kompletná technická dokumentácia, návod na použitie a certifikáty poskytujeme na vyžiadanie pri obchodnom dopyte. V prípade záujmu o detailné podklady nás kontaktujte prostredníctvom formulára nižšie.</p>
  </div>
</section>

<!-- FORMULÁR DOPYTU -->
<section class="inquiry" id="dopyt">
  <div class="wrap">
    <div class="inq-grid">
      <div class="inq-intro reveal">
        <div class="sec-label" data-sk="Dopyt na cenu" data-en="Price inquiry">Dopyt na cenu</div>
        <h2 data-sk="Máte záujem o tento produkt?" data-en="Are you interested in this product?">Máte záujem o tento produkt?</h2>
        <p data-sk="Vyplňte formulár a pripravíme vám individuálnu cenovú ponuku alebo obchodné podmienky. Pre B2B partnerov, zdravotnícke a sociálne zariadenia ponúkame riešenia na mieru." data-en="Fill out the form and we will prepare an individual price quote or business terms. We offer tailor-made solutions for B2B partners, medical and social facilities.">Vyplňte formulár a pripravíme vám individuálnu cenovú ponuku alebo obchodné podmienky. Pre B2B partnerov, zdravotnícke a sociálne zariadenia ponúkame riešenia na mieru.</p>
        <div class="contact">
            <span data-sk="Alebo nás kontaktujte priamo:" data-en="Or contact us directly:">Alebo nás kontaktujte priamo:</span><br>
            <a href="mailto:<?php echo esc_attr( get_theme_mod('lextom_email', 'info@lextom.sk') ); ?>"><?php echo esc_html( get_theme_mod('lextom_email', 'info@lextom.sk') ); ?></a>
        </div>
      </div>
      <form class="form reveal d1" onsubmit="return false">
        <div class="two">
          <div class="fr"><label data-sk="Meno a priezvisko" data-en="First and Last Name">Meno a priezvisko</label><input type="text" placeholder="Vaše meno"></div>
          <div class="fr"><label data-sk="Organizácia" data-en="Organization">Organizácia</label><input type="text" placeholder="Názov zariadenia / firmy"></div>
        </div>
        <div class="two">
          <div class="fr"><label>E-mail</label><input type="email" placeholder="vas@email.sk"></div>
          <div class="fr"><label data-sk="Telefón" data-en="Phone">Telefón</label><input type="tel" placeholder="+421"></div>
        </div>
        <div class="fr"><label data-sk="Počet kusov / záujem" data-en="Quantity / Interest">Počet kusov / záujem</label><input type="text" placeholder="Napr. 5 ks pre oddelenie"></div>
        <div class="fr"><label data-sk="Správa" data-en="Message">Správa</label><textarea placeholder="Vaše požiadavky alebo otázky k produktu..."></textarea></div>
        <button type="submit" data-sk="Odoslať dopyt" data-en="Send inquiry">Odoslať dopyt</button>
        <p class="priv" data-sk="Odoslaním formulára súhlasíte so spracovaním údajov za účelom vypracovania ponuky. Vaše údaje nezdieľame s tretími stranami." data-en="By submitting the form, you agree to the processing of data for the purpose of preparing an offer. We do not share your data with third parties.">Odoslaním formulára súhlasíte so spracovaním údajov za účelom vypracovania ponuky. Vaše údaje nezdieľame s tretími stranami.</p>
      </form>
    </div>
  </div>
</section>

<?php get_footer(); ?>
