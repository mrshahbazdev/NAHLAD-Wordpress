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
        <button class="<?php echo lextom_get_current_lang() === 'sk' ? 'active' : ''; ?>" data-lang="sk" onclick="setLang('sk')">SK</button>
        <button class="<?php echo lextom_get_current_lang() === 'en' ? 'active' : ''; ?>" data-lang="en" onclick="setLang('en')">EN</button>
      <?php endif; ?>
    </div>
  </div>

  <button class="nav-toggle" id="navtoggle" aria-label="Menu">&#9776;</button>
</nav>
