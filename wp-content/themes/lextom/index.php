<?php get_header(); ?>

<main id="main" style="padding-top:80px;">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <article <?php post_class(); ?> style="padding: 40px 5vw; max-width: 860px; margin: 0 auto;">
      <h1 style="font-family:'Fraunces',serif;font-size:clamp(28px,4vw,44px);margin-bottom:20px;"><?php the_title(); ?></h1>
      <div style="font-size:16px;line-height:1.8;color:var(--sage);">
        <?php the_content(); ?>
      </div>
    </article>
  <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
