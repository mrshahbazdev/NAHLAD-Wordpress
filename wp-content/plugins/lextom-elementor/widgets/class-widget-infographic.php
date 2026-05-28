<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_Infographic extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_infographic'; }
    public function get_title() { return __( 'LeXtom Infographic', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-image'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        $this->start_controls_section( 'section_content', array(
            'label' => __( 'Content', 'lextom-elementor' ),
        ) );

        $this->add_control( 'label_sk', array(
            'label'   => __( 'Label (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Ekosystém',
        ) );

        $this->add_control( 'label_en', array(
            'label'   => __( 'Label (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Ecosystem',
        ) );

        $this->add_control( 'image', array(
            'label' => __( 'Infographic Image', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ) );

        $this->add_control( 'caption_sk', array(
            'label'   => __( 'Caption (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Vizualizácia ekosystému LeXtom s.r.o.',
        ) );

        $this->add_control( 'caption_en', array(
            'label'   => __( 'Caption (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'LeXtom s.r.o. ecosystem visualization',
        ) );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="lextom-infographic">
          <div class="wrap">
            <?php if ( ! empty( $s['label_sk'] ) ) : ?>
              <div class="sec-label reveal" data-sk="<?php echo esc_attr( $s['label_sk'] ); ?>" data-en="<?php echo esc_attr( $s['label_en'] ); ?>"><?php echo esc_html( $s['label_sk'] ); ?></div>
            <?php endif; ?>
            <div class="frame reveal">
              <?php if ( ! empty( $s['image']['url'] ) ) : ?>
                <img src="<?php echo esc_url( $s['image']['url'] ); ?>" alt="<?php echo esc_attr( $s['caption_sk'] ); ?>">
              <?php endif; ?>
            </div>
            <?php if ( ! empty( $s['caption_sk'] ) ) : ?>
              <div class="cap reveal" data-sk="<?php echo esc_attr( $s['caption_sk'] ); ?>" data-en="<?php echo esc_attr( $s['caption_en'] ); ?>"><?php echo esc_html( $s['caption_sk'] ); ?></div>
            <?php endif; ?>
          </div>
        </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Infographic() );
