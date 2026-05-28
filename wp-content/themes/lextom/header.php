<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$watermark_url = get_theme_mod( 'lextom_watermark', LEXTOM_URI . '/assets/images/mapa-watermark.webp' );
if ( $watermark_url ) : ?>
<div class="watermark" style="background-image:url('<?php echo esc_url( $watermark_url ); ?>')"></div>
<?php endif; ?>

<nav class="lextom-nav" id="nav">
  <div class="nav-logo">
    <?php if ( has_custom_logo() ) : ?>
      <?php the_custom_logo(); ?>
    <?php else : ?>
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php echo esc_url( LEXTOM_URI . '/assets/images/lextom-logo.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>">
      </a>
    <?php endif; ?>
  </div>

  <div class="nav-links" id="navlinks">
    <?php
    if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array(
            'theme_location' => 'primary',
            'container'      => false,
            'items_wrap'     => '%3$s',
            'depth'          => 1,
            'walker'         => new Lextom_Nav_Walker(),
        ) );
    } else {
        // Fallback navigation
        $current_lang = lextom_get_current_lang();
        $nav_items = array(
            'kto-sme'               => array( 'sk' => 'Kto sme', 'en' => 'Who We Are' ),
            'odborny-personal'      => array( 'sk' => 'Odborný personál', 'en' => 'Professional Staff' ),
            'vip-care-technology'   => array( 'sk' => 'VIP Care Technology', 'en' => 'VIP Care Technology' ),
            'distribucia-produktov' => array( 'sk' => 'Distribúcia produktov', 'en' => 'Product Distribution' ),
            'development'           => array( 'sk' => 'Development', 'en' => 'Development' ),
        );

        foreach ( $nav_items as $slug => $labels ) :
            $label = isset( $labels[ $current_lang ] ) ? $labels[ $current_lang ] : $labels['sk'];
            $is_current = is_page( $slug ) ? ' current' : '';
        ?>
            <a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>"
               class="<?php echo esc_attr( $is_current ); ?>"
               data-sk="<?php echo esc_attr( $labels['sk'] ); ?>"
               data-en="<?php echo esc_attr( $labels['en'] ); ?>">
                <?php echo esc_html( $label ); ?>
            </a>
        <?php endforeach;
    }
    ?>

    <div class="lang">
      <?php if ( function_exists( 'pll_the_languages' ) ) : ?>
        <?php
        pll_the_languages( array(
            'show_names'   => 1,
            'show_flags'   => 0,
            'hide_current' => 0,
            'display_names_as' => 'slug',
        ) );
        ?>
      <?php else : ?>
        <button class="<?php echo lextom_get_current_lang() === 'sk' ? 'active' : ''; ?>" data-lang="sk" onclick="setLang('sk')">
          <svg class="flag-icon" viewBox="0 0 640 480"><path fill="#ee1c25" d="M0 0h640v480H0z"/><path fill="#0b4ea2" d="M0 0h640v320H0z"/><path fill="#fff" d="M0 0h640v160H0z"/><path fill="#fff" d="M233 370.8c-43-20.7-104.6-61.2-104.6-143.2S146.2 91 193.6 62c16-9.8 30.6-16 39.4-19.8a9 9 0 0 1 7 0c8.8 3.8 23.3 10 39.4 19.8 47.4 29 104.6 67.8 104.6 165.6S276 350 233 370.8z"/><path fill="#ee1c25" d="M233 360c-39.5-19.5-98-57.5-98-132.4S190 91 233 66c43-25 98-3.8 98 61.6S272.5 340.5 233 360z"/><path fill="#0b4ea2" d="M233 238.4c-18.9 0-53.8 22-53.8 22l-.1-38.4c17.9-10.3 35.8-15.7 53.9-15.7s36 5.4 53.8 15.7v38.4s-34.9-22-53.8-22z"/><path fill="#fff" d="M233 132c-11 0-20 9-20 20v50h-26v30h26v26h40v-26h26v-30h-26v-50c0-11-9-20-20-20z"/></svg>
          SK
        </button>
        <button class="<?php echo lextom_get_current_lang() === 'en' ? 'active' : ''; ?>" data-lang="en" onclick="setLang('en')">
          <svg class="flag-icon" viewBox="0 0 640 480"><path fill="#012169" d="M0 0h640v480H0z"/><path fill="#FFF" d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 302 82 480H0v-60l239-178L0 64V0z"/><path fill="#C8102E" d="m424 281 216 159v40L369 281zm-184 20 6 35L54 480H0zM640 0v3L391 191l2-44L590 0zM0 0l239 176h-60L0 42z"/><path fill="#FFF" d="M241 0v480h160V0zM0 160v160h640V160z"/><path fill="#C8102E" d="M0 193v96h640v-96zM273 0v480h96V0z"/></svg>
          EN
        </button>
      <?php endif; ?>
    </div>
  </div>

  <button class="nav-toggle" id="navtoggle" aria-label="Menu">&#9776;</button>
</nav>
