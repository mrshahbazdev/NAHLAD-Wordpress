<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_Product_Detail extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_product_detail'; }
    public function get_title() { return __( 'LeXtom Product Detail', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-single-product'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        // Product Info
        $this->start_controls_section( 'section_product', array(
            'label' => __( 'Product Info', 'lextom-elementor' ),
        ) );

        $this->add_control( 'category_sk', array(
            'label'   => __( 'Category (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Zdravotnícke pomôcky',
        ) );

        $this->add_control( 'category_en', array(
            'label'   => __( 'Category (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Medical Devices',
        ) );

        $this->add_control( 'title_sk', array(
            'label' => __( 'Title (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'title_en', array(
            'label' => __( 'Title (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'tagline_sk', array(
            'label' => __( 'Tagline (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'tagline_en', array(
            'label' => __( 'Tagline (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'description_sk', array(
            'label' => __( 'Description (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::WYSIWYG,
        ) );

        $this->add_control( 'description_en', array(
            'label' => __( 'Description (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::WYSIWYG,
        ) );

        $this->end_controls_section();

        // Gallery
        $this->start_controls_section( 'section_gallery', array(
            'label' => __( 'Gallery', 'lextom-elementor' ),
        ) );

        $this->add_control( 'gallery', array(
            'label'   => __( 'Gallery Images', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::GALLERY,
        ) );

        $this->end_controls_section();

        // Quick Specs
        $this->start_controls_section( 'section_specs', array(
            'label' => __( 'Quick Specs', 'lextom-elementor' ),
        ) );

        $spec_repeater = new \Elementor\Repeater();
        $spec_repeater->add_control( 'value', array(
            'label' => __( 'Value', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );
        $spec_repeater->add_control( 'label_sk', array(
            'label' => __( 'Label (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );
        $spec_repeater->add_control( 'label_en', array(
            'label' => __( 'Label (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'specs', array(
            'label'  => __( 'Specs', 'lextom-elementor' ),
            'type'   => \Elementor\Controls_Manager::REPEATER,
            'fields' => $spec_repeater->get_controls(),
        ) );

        $this->end_controls_section();

        // CTA Buttons
        $this->start_controls_section( 'section_buttons', array(
            'label' => __( 'Buttons', 'lextom-elementor' ),
        ) );

        $this->add_control( 'btn_primary_sk', array(
            'label'   => __( 'Primary Button (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Dopyt na cenu',
        ) );

        $this->add_control( 'btn_primary_en', array(
            'label'   => __( 'Primary Button (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Price Inquiry',
        ) );

        $this->add_control( 'btn_primary_url', array(
            'label' => __( 'Primary URL', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::URL,
        ) );

        $this->add_control( 'btn_secondary_sk', array(
            'label' => __( 'Secondary Button (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'btn_secondary_en', array(
            'label' => __( 'Secondary Button (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'btn_secondary_url', array(
            'label' => __( 'Secondary URL', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::URL,
        ) );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $gallery = ! empty( $s['gallery'] ) ? $s['gallery'] : array();
        $main_img = ! empty( $gallery[0]['url'] ) ? $gallery[0]['url'] : '';
        ?>
        <div class="lextom-product">
          <div class="breadcrumb">
            <a href="<?php echo esc_url( home_url( '/distribucia-produktov/' ) ); ?>" data-sk="Distribúcia produktov" data-en="Product Distribution">Distribúcia produktov</a>
            &rsaquo;
            <span data-sk="<?php echo esc_attr( $s['title_sk'] ); ?>" data-en="<?php echo esc_attr( $s['title_en'] ); ?>"><?php echo esc_html( $s['title_sk'] ); ?></span>
          </div>

          <div class="ptop">
            <div class="gallery">
              <div class="main">
                <?php if ( $main_img ) : ?>
                  <img src="<?php echo esc_url( $main_img ); ?>" alt="" id="product-main-img">
                <?php endif; ?>
              </div>
              <?php if ( count( $gallery ) > 1 ) : ?>
                <div class="thumbs">
                  <?php foreach ( $gallery as $i => $img ) : ?>
                    <div class="t<?php echo $i === 0 ? ' active' : ''; ?>">
                      <img src="<?php echo esc_url( $img['url'] ); ?>" alt="">
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>

            <div class="pinfo">
              <div class="pcat" data-sk="<?php echo esc_attr( $s['category_sk'] ); ?>" data-en="<?php echo esc_attr( $s['category_en'] ); ?>"><?php echo esc_html( $s['category_sk'] ); ?></div>
              <h1 data-sk="<?php echo esc_attr( $s['title_sk'] ); ?>" data-en="<?php echo esc_attr( $s['title_en'] ); ?>"><?php echo esc_html( $s['title_sk'] ); ?></h1>

              <?php if ( ! empty( $s['tagline_sk'] ) ) : ?>
                <div class="tagline" data-sk="<?php echo esc_attr( $s['tagline_sk'] ); ?>" data-en="<?php echo esc_attr( $s['tagline_en'] ); ?>"><?php echo esc_html( $s['tagline_sk'] ); ?></div>
              <?php endif; ?>

              <?php if ( ! empty( $s['description_sk'] ) ) : ?>
                <div class="pdesc"><?php echo wp_kses_post( $s['description_sk'] ); ?></div>
              <?php endif; ?>

              <?php if ( ! empty( $s['specs'] ) ) : ?>
                <div class="quickspecs">
                  <?php foreach ( $s['specs'] as $spec ) : ?>
                    <div class="qs">
                      <div class="v"><?php echo esc_html( $spec['value'] ); ?></div>
                      <div class="l" data-sk="<?php echo esc_attr( $spec['label_sk'] ); ?>" data-en="<?php echo esc_attr( $spec['label_en'] ); ?>"><?php echo esc_html( $spec['label_sk'] ); ?></div>
                    </div>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>

              <div class="pcta">
                <?php if ( ! empty( $s['btn_primary_sk'] ) ) :
                    $url = ! empty( $s['btn_primary_url']['url'] ) ? $s['btn_primary_url']['url'] : '#inquiry';
                ?>
                  <a href="<?php echo esc_url( $url ); ?>" class="btn" data-sk="<?php echo esc_attr( $s['btn_primary_sk'] ); ?>" data-en="<?php echo esc_attr( $s['btn_primary_en'] ); ?>"><?php echo esc_html( $s['btn_primary_sk'] ); ?></a>
                <?php endif; ?>

                <?php if ( ! empty( $s['btn_secondary_sk'] ) ) :
                    $url2 = ! empty( $s['btn_secondary_url']['url'] ) ? $s['btn_secondary_url']['url'] : '#';
                ?>
                  <a href="<?php echo esc_url( $url2 ); ?>" class="btn btn-outline" data-sk="<?php echo esc_attr( $s['btn_secondary_sk'] ); ?>" data-en="<?php echo esc_attr( $s['btn_secondary_en'] ); ?>"><?php echo esc_html( $s['btn_secondary_sk'] ); ?></a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Product_Detail() );
