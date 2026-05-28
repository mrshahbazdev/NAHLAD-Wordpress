<?php
/**
 * Template Name: Elementor Full Width
 * Template Post Type: page
 *
 * Full-width page template for Elementor.
 * No theme header/footer wrapping the content — just the Elementor canvas.
 * The navigation and footer are rendered by the theme so it matches the design.
 *
 * @package LeXtom
 */

get_header();
?>

<main id="main" class="elementor-full-width">
  <?php while ( have_posts() ) : the_post(); ?>
    <?php the_content(); ?>
  <?php endwhile; ?>
</main>

<?php get_footer(); ?>
