<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_Benefits_Grid extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_benefits'; }
    public function get_title() { return __( 'LeXtom Benefits Grid', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-gallery-grid'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        $this->start_controls_section( 'section_content', array(
            'label' => __( 'Content', 'lextom-elementor' ),
        ) );

        $this->add_control( 'label_sk', array(
            'label'   => __( 'Label (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Výhody',
        ) );

        $this->add_control( 'label_en', array(
            'label'   => __( 'Label (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Benefits',
        ) );

        $this->add_control( 'heading_sk', array(
            'label' => __( 'Heading (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'heading_en', array(
            'label' => __( 'Heading (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control( 'icon', array(
            'label'   => __( 'Icon (emoji or text)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '🏥',
        ) );
        $repeater->add_control( 'title_sk', array(
            'label' => __( 'Title (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );
        $repeater->add_control( 'title_en', array(
            'label' => __( 'Title (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );
        $repeater->add_control( 'desc_sk', array(
            'label' => __( 'Description (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );
        $repeater->add_control( 'desc_en', array(
            'label' => __( 'Description (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'benefits', array(
            'label'  => __( 'Benefit Cards', 'lextom-elementor' ),
            'type'   => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ) );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="lextom-benefits">
          <div class="wrap">
            <div class="sec-label reveal" data-sk="<?php echo esc_attr( $s['label_sk'] ); ?>" data-en="<?php echo esc_attr( $s['label_en'] ); ?>"><?php echo esc_html( $s['label_sk'] ); ?></div>

            <?php if ( ! empty( $s['heading_sk'] ) ) : ?>
              <h2 class="sec-h reveal" data-sk="<?php echo esc_attr( $s['heading_sk'] ); ?>" data-en="<?php echo esc_attr( $s['heading_en'] ); ?>"><?php echo wp_kses( $s['heading_sk'], array( 'em' => array() ) ); ?></h2>
            <?php endif; ?>

            <div class="ben-grid">
              <?php if ( ! empty( $s['benefits'] ) ) : ?>
                <?php foreach ( $s['benefits'] as $ben ) : ?>
                  <div class="ben reveal">
                    <span class="bico"><?php echo esc_html( $ben['icon'] ); ?></span>
                    <h3 data-sk="<?php echo esc_attr( $ben['title_sk'] ); ?>" data-en="<?php echo esc_attr( $ben['title_en'] ); ?>"><?php echo esc_html( $ben['title_sk'] ); ?></h3>
                    <p data-sk="<?php echo esc_attr( $ben['desc_sk'] ); ?>" data-en="<?php echo esc_attr( $ben['desc_en'] ); ?>"><?php echo esc_html( $ben['desc_sk'] ); ?></p>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Benefits_Grid() );
