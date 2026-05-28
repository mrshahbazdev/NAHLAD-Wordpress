<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_CTA_Section extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_cta'; }
    public function get_title() { return __( 'LeXtom CTA Section', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-call-to-action'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        $this->start_controls_section( 'section_content', array(
            'label' => __( 'Content', 'lextom-elementor' ),
        ) );

        $this->add_control( 'heading_sk', array(
            'label'   => __( 'Heading (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Kontaktujte nás',
        ) );

        $this->add_control( 'heading_en', array(
            'label'   => __( 'Heading (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Contact Us',
        ) );

        $this->add_control( 'text_sk', array(
            'label' => __( 'Text (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'text_en', array(
            'label' => __( 'Text (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'button_text_sk', array(
            'label'   => __( 'Button Text (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Napíšte nám',
        ) );

        $this->add_control( 'button_text_en', array(
            'label'   => __( 'Button Text (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Write to us',
        ) );

        $this->add_control( 'button_url', array(
            'label'   => __( 'Button URL', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::URL,
            'default' => array( 'url' => 'mailto:info@lextom.sk' ),
        ) );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $url = ! empty( $s['button_url']['url'] ) ? $s['button_url']['url'] : '#';
        ?>
        <section class="lextom-cta">
          <div class="wrap-narrow">
            <h2 class="reveal" data-sk="<?php echo esc_attr( $s['heading_sk'] ); ?>" data-en="<?php echo esc_attr( $s['heading_en'] ); ?>"><?php echo esc_html( $s['heading_sk'] ); ?></h2>

            <?php if ( ! empty( $s['text_sk'] ) ) : ?>
              <p class="reveal" data-sk="<?php echo esc_attr( $s['text_sk'] ); ?>" data-en="<?php echo esc_attr( $s['text_en'] ); ?>"><?php echo esc_html( $s['text_sk'] ); ?></p>
            <?php endif; ?>

            <a href="<?php echo esc_url( $url ); ?>" class="btn reveal" data-sk="<?php echo esc_attr( $s['button_text_sk'] ); ?>" data-en="<?php echo esc_attr( $s['button_text_en'] ); ?>">
              <?php echo esc_html( $s['button_text_sk'] ); ?> &rarr;
            </a>
          </div>
        </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_CTA_Section() );
