<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_Strategic_Quote extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_quote'; }
    public function get_title() { return __( 'LeXtom Strategic Quote', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-blockquote'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        $this->start_controls_section( 'section_content', array(
            'label' => __( 'Content', 'lextom-elementor' ),
        ) );

        $this->add_control( 'label_sk', array(
            'label'   => __( 'Label (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Strategická poznámka',
        ) );

        $this->add_control( 'label_en', array(
            'label'   => __( 'Label (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Strategic Note',
        ) );

        $this->add_control( 'preface_sk', array(
            'label' => __( 'Preface (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'preface_en', array(
            'label' => __( 'Preface (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'quote_sk', array(
            'label'       => __( 'Quote (SK) — use <em> for accent', 'lextom-elementor' ),
            'type'        => \Elementor\Controls_Manager::TEXTAREA,
            'default'     => 'Text citácie s <em>akcentom</em>.',
        ) );

        $this->add_control( 'quote_en', array(
            'label'   => __( 'Quote (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="lextom-quote">
          <div class="wrap-narrow">
            <?php if ( ! empty( $s['label_sk'] ) ) : ?>
              <div class="sec-label reveal" style="justify-content:center;" data-sk="<?php echo esc_attr( $s['label_sk'] ); ?>" data-en="<?php echo esc_attr( $s['label_en'] ); ?>"><?php echo esc_html( $s['label_sk'] ); ?></div>
            <?php endif; ?>

            <div class="mark reveal">&ldquo;</div>

            <?php if ( ! empty( $s['preface_sk'] ) ) : ?>
              <p class="pre reveal" data-sk="<?php echo esc_attr( $s['preface_sk'] ); ?>" data-en="<?php echo esc_attr( $s['preface_en'] ); ?>"><?php echo esc_html( $s['preface_sk'] ); ?></p>
            <?php endif; ?>

            <div class="quote-text reveal"><?php echo wp_kses( $s['quote_sk'], array( 'em' => array() ) ); ?></div>
          </div>
        </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Strategic_Quote() );
