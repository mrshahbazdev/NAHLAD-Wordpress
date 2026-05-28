<?php
$current_lang = lextom_get_current_lang();
$company_name = get_theme_mod( 'lextom_company_name', 'LeXtom s.r.o.' );
$company_ico  = get_theme_mod( 'lextom_company_ico', 'IČO 50251015' );
$email        = get_theme_mod( 'lextom_email', 'info@lextom.sk' );
$footer_logo  = get_theme_mod( 'lextom_footer_logo', LEXTOM_URI . '/assets/images/lextom-logo.png' );

$footer_desc = ( $current_lang === 'en' )
    ? 'Innovations, technologies and solutions with a human dimension.'
    : 'Inovácie, technológie a riešenia s ľudským rozmerom.';

$rights_text = ( $current_lang === 'en' )
    ? 'All rights reserved'
    : 'Všetky práva vyhradené';

$privacy_text = ( $current_lang === 'en' )
    ? 'Privacy Policy'
    : 'Ochrana osobných údajov';
?>

<footer class="lextom-footer">
  <div class="fwrap">
    <div class="fcol">
      <img class="flogo" src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php echo esc_attr( $company_name ); ?>">
      <p data-sk="Inovácie, technológie a riešenia s ľudským rozmerom."
         data-en="Innovations, technologies and solutions with a human dimension.">
        <?php echo esc_html( $footer_desc ); ?>
      </p>
    </div>

    <div class="fcol">
      <h4 data-sk="Sekcie" data-en="Sections"><?php echo ( $current_lang === 'en' ) ? 'Sections' : 'Sekcie'; ?></h4>
      <?php
      if ( has_nav_menu( 'footer_menu_1' ) ) {
          wp_nav_menu( array(
              'theme_location' => 'footer_menu_1',
              'container'      => false,
              'items_wrap'     => '%3$s',
              'depth'          => 1,
          ) );
      } else {
          $footer_links = array(
              'kto-sme'               => array( 'sk' => 'Kto sme', 'en' => 'Who We Are' ),
              'odborny-personal'      => array( 'sk' => 'Odborný personál', 'en' => 'Professional Staff' ),
              'vip-care-technology'   => array( 'sk' => 'VIP Care Technology', 'en' => 'VIP Care Technology' ),
              'distribucia-produktov' => array( 'sk' => 'Distribúcia produktov', 'en' => 'Product Distribution' ),
              'development'           => array( 'sk' => 'Development', 'en' => 'Development' ),
          );
          foreach ( $footer_links as $slug => $labels ) :
              $label = isset( $labels[ $current_lang ] ) ? $labels[ $current_lang ] : $labels['sk'];
          ?>
              <a href="<?php echo esc_url( home_url( '/' . $slug . '/' ) ); ?>"
                 data-sk="<?php echo esc_attr( $labels['sk'] ); ?>"
                 data-en="<?php echo esc_attr( $labels['en'] ); ?>">
                  <?php echo esc_html( $label ); ?>
              </a>
          <?php endforeach;
      }
      ?>
    </div>

    <div class="fcol">
      <h4 data-sk="Kontakt" data-en="Contact"><?php echo ( $current_lang === 'en' ) ? 'Contact' : 'Kontakt'; ?></h4>
      <a href="mailto:<?php echo esc_attr( $email ); ?>"><?php echo esc_html( $email ); ?></a>
      <p style="margin-top:10px;font-size:12px;color:var(--muted);"><?php echo esc_html( $company_name ); ?><br><?php echo esc_html( $company_ico ); ?></p>
    </div>
  </div>

  <div class="fbottom">
    <span>&copy; <?php echo date( 'Y' ); ?> <?php echo esc_html( $company_name ); ?>
      <span data-sk="Všetky práva vyhradené" data-en="All rights reserved">· <?php echo esc_html( $rights_text ); ?></span>
    </span>
    <span>
      <a href="<?php echo esc_url( home_url( '/privacy-policy/' ) ); ?>"
         data-sk="Ochrana osobných údajov" data-en="Privacy Policy">
        <?php echo esc_html( $privacy_text ); ?>
      </a>
    </span>
  </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>
