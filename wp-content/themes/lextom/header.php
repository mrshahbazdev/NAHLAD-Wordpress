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
            'contact'               => array( 'sk' => 'Kontakt', 'en' => 'Contact' ),
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
            'show_flags'   => 1,
            'hide_current' => 0,
            'display_names_as' => 'slug',
        ) );
        ?>
      <?php else : ?>
        <button class="<?php echo lextom_get_current_lang() === 'sk' ? 'active' : ''; ?>" data-lang="sk" onclick="setLang('sk')">
          <img class="flag-icon" src="<?php echo esc_url( LEXTOM_URI . '/assets/images/sk.png' ); ?>" alt="SK">
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
