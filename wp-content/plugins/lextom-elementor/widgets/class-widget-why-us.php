<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_Why_Us extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_why_us'; }
    public function get_title() { return __( 'LeXtom Why Us', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-info-circle'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        $this->start_controls_section( 'section_content', array(
            'label' => __( 'Content', 'lextom-elementor' ),
        ) );

        $this->add_control( 'label_sk', array(
            'label'   => __( 'Label (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Prečo my',
        ) );

        $this->add_control( 'label_en', array(
            'label'   => __( 'Label (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Why Us',
        ) );

        $this->add_control( 'heading_sk', array(
            'label' => __( 'Heading (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'heading_en', array(
            'label' => __( 'Heading (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'description_sk', array(
            'label' => __( 'Description (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::WYSIWYG,
        ) );

        $this->add_control( 'description_en', array(
            'label' => __( 'Description (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::WYSIWYG,
        ) );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control( 'step_sk', array(
            'label' => __( 'Step Text (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );
        $repeater->add_control( 'step_en', array(
            'label' => __( 'Step Text (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'steps', array(
            'label'  => __( 'Steps', 'lextom-elementor' ),
            'type'   => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ) );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="lextom-why-us">
          <div class="wrap">
            <div class="sec-label reveal" data-sk="<?php echo esc_attr( $s['label_sk'] ); ?>" data-en="<?php echo esc_attr( $s['label_en'] ); ?>"><?php echo esc_html( $s['label_sk'] ); ?></div>

            <?php if ( ! empty( $s['heading_sk'] ) ) : ?>
              <h2 class="sec-h reveal" data-sk="<?php echo esc_attr( $s['heading_sk'] ); ?>" data-en="<?php echo esc_attr( $s['heading_en'] ); ?>"><?php echo esc_html( $s['heading_sk'] ); ?></h2>
            <?php endif; ?>

            <?php if ( ! empty( $s['description_sk'] ) ) : ?>
              <div class="reveal"><?php echo wp_kses_post( $s['description_sk'] ); ?></div>
            <?php endif; ?>

            <?php if ( ! empty( $s['steps'] ) ) : ?>
              <div class="steps reveal">
                <?php foreach ( $s['steps'] as $i => $step ) : ?>
                  <div class="step">
                    <div class="n"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></div>
                    <p data-sk="<?php echo esc_attr( $step['step_sk'] ); ?>" data-en="<?php echo esc_attr( $step['step_en'] ); ?>"><?php echo esc_html( $step['step_sk'] ); ?></p>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>
          </div>
        </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Why_Us() );
