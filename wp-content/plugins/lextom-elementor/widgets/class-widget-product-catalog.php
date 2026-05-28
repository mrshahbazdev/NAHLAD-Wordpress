<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_Product_Catalog extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_catalog'; }
    public function get_title() { return __( 'LeXtom Product Catalog', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-products'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        $this->start_controls_section( 'section_intro', array(
            'label' => __( 'Introduction', 'lextom-elementor' ),
        ) );

        $this->add_control( 'label_sk', array(
            'label'   => __( 'Label (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Distribúcia produktov',
        ) );

        $this->add_control( 'label_en', array(
            'label'   => __( 'Label (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Product Distribution',
        ) );

        $this->add_control( 'intro_sk', array(
            'label' => __( 'Intro Text (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::WYSIWYG,
        ) );

        $this->add_control( 'intro_en', array(
            'label' => __( 'Intro Text (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::WYSIWYG,
        ) );

        $this->end_controls_section();

        // Distribution modes
        $this->start_controls_section( 'section_modes', array(
            'label' => __( 'Distribution Modes', 'lextom-elementor' ),
        ) );

        $mode_repeater = new \Elementor\Repeater();
        $mode_repeater->add_control( 'icon', array(
            'label'   => __( 'Icon', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '📦',
        ) );
        $mode_repeater->add_control( 'text_sk', array(
            'label' => __( 'Text (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );
        $mode_repeater->add_control( 'text_en', array(
            'label' => __( 'Text (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'modes', array(
            'label'  => __( 'Modes', 'lextom-elementor' ),
            'type'   => \Elementor\Controls_Manager::REPEATER,
            'fields' => $mode_repeater->get_controls(),
        ) );

        $this->end_controls_section();

        // Products
        $this->start_controls_section( 'section_products', array(
            'label' => __( 'Products', 'lextom-elementor' ),
        ) );

        $this->add_control( 'catalog_heading_sk', array(
            'label'   => __( 'Catalog Heading (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Katalóg produktov',
        ) );

        $this->add_control( 'catalog_heading_en', array(
            'label'   => __( 'Catalog Heading (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Product Catalog',
        ) );

        $prod_repeater = new \Elementor\Repeater();
        $prod_repeater->add_control( 'image', array(
            'label' => __( 'Image', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ) );
        $prod_repeater->add_control( 'title_sk', array(
            'label' => __( 'Title (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );
        $prod_repeater->add_control( 'title_en', array(
            'label' => __( 'Title (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );
        $prod_repeater->add_control( 'desc_sk', array(
            'label' => __( 'Description (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );
        $prod_repeater->add_control( 'desc_en', array(
            'label' => __( 'Description (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );
        $prod_repeater->add_control( 'link', array(
            'label' => __( 'Link URL', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::URL,
        ) );
        $prod_repeater->add_control( 'is_coming_soon', array(
            'label'   => __( 'Coming Soon?', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::SWITCHER,
            'default' => '',
        ) );

        $this->add_control( 'products', array(
            'label'  => __( 'Products', 'lextom-elementor' ),
            'type'   => \Elementor\Controls_Manager::REPEATER,
            'fields' => $prod_repeater->get_controls(),
        ) );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <div class="lextom-catalog">
          <?php if ( ! empty( $s['intro_sk'] ) ) : ?>
            <section class="intro">
              <div class="wrap">
                <div class="sec-label reveal" data-sk="<?php echo esc_attr( $s['label_sk'] ); ?>" data-en="<?php echo esc_attr( $s['label_en'] ); ?>"><?php echo esc_html( $s['label_sk'] ); ?></div>
                <div class="reveal"><?php echo wp_kses_post( $s['intro_sk'] ); ?></div>

                <?php if ( ! empty( $s['modes'] ) ) : ?>
                  <div class="modes reveal">
                    <?php foreach ( $s['modes'] as $mode ) : ?>
                      <div class="mode">
                        <span class="mi"><?php echo esc_html( $mode['icon'] ); ?></span>
                        <p data-sk="<?php echo esc_attr( $mode['text_sk'] ); ?>" data-en="<?php echo esc_attr( $mode['text_en'] ); ?>"><?php echo esc_html( $mode['text_sk'] ); ?></p>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </div>
            </section>
          <?php endif; ?>

          <section class="catalog">
            <div class="wrap">
              <div class="cat-head reveal">
                <h2 class="sec-h" data-sk="<?php echo esc_attr( $s['catalog_heading_sk'] ); ?>" data-en="<?php echo esc_attr( $s['catalog_heading_en'] ); ?>"><?php echo esc_html( $s['catalog_heading_sk'] ); ?></h2>
              </div>

              <div class="pgrid">
                <?php if ( ! empty( $s['products'] ) ) : ?>
                  <?php foreach ( $s['products'] as $prod ) :
                      $coming = $prod['is_coming_soon'] === 'yes';
                      $url = ! empty( $prod['link']['url'] ) ? $prod['link']['url'] : '#';
                      $tag = $coming ? 'div' : 'a';
                  ?>
                    <<?php echo $tag; ?> class="pcard<?php echo $coming ? ' coming-soon' : ' live'; ?> reveal"
                      <?php if ( ! $coming ) : ?>href="<?php echo esc_url( $url ); ?>"<?php endif; ?>>
                      <div class="pimg">
                        <?php if ( ! empty( $prod['image']['url'] ) ) : ?>
                          <img src="<?php echo esc_url( $prod['image']['url'] ); ?>" alt="<?php echo esc_attr( $prod['title_sk'] ); ?>">
                        <?php elseif ( $coming ) : ?>
                          <div style="width:100%;height:100%;display:flex;align-items:center;justify-content:center;font-size:14px;color:var(--muted);" data-sk="Pripravujeme" data-en="Coming soon">Pripravujeme</div>
                        <?php endif; ?>
                      </div>
                      <div class="pbody">
                        <h3 data-sk="<?php echo esc_attr( $prod['title_sk'] ); ?>" data-en="<?php echo esc_attr( $prod['title_en'] ); ?>"><?php echo esc_html( $prod['title_sk'] ); ?></h3>
                        <p data-sk="<?php echo esc_attr( $prod['desc_sk'] ); ?>" data-en="<?php echo esc_attr( $prod['desc_en'] ); ?>"><?php echo esc_html( $prod['desc_sk'] ); ?></p>
                      </div>
                    </<?php echo $tag; ?>>
                  <?php endforeach; ?>
                <?php endif; ?>
              </div>
            </div>
          </section>
        </div>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Product_Catalog() );
