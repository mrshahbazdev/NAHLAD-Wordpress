<?php
/**
 * Template Name: Elementor Canvas (No Header/Footer)
 * Template Post Type: page
 *
 * Blank canvas template — only Elementor content rendered.
 * Use this when you want to build the entire page (incl. nav & footer) in Elementor.
 *
 * @package LeXtom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<?php wp_head(); ?>
</head>
<body <?php body_class( 'elementor-canvas' ); ?>>
<?php wp_body_open(); ?>

<?php while ( have_posts() ) : the_post(); ?>
  <?php the_content(); ?>
<?php endwhile; ?>

<?php wp_footer(); ?>
</body>
</html>
