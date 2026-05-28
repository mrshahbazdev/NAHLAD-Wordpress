<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_Manager_Section extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_manager'; }
    public function get_title() { return __( 'LeXtom Manager Section', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-person'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        $this->start_controls_section( 'section_content', array(
            'label' => __( 'Content', 'lextom-elementor' ),
        ) );

        $this->add_control( 'photo', array(
            'label' => __( 'Photo', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ) );

        $this->add_control( 'name', array(
            'label'   => __( 'Name', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'PaedDr. Tomáš Hvostík, PhD.',
        ) );

        $this->add_control( 'role_sk', array(
            'label'   => __( 'Role (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Konateľ · LeXtom s.r.o.',
        ) );

        $this->add_control( 'role_en', array(
            'label'   => __( 'Role (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'CEO · LeXtom s.r.o.',
        ) );

        $this->add_control( 'label_sk', array(
            'label'   => __( 'Section Label (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Manažment',
        ) );

        $this->add_control( 'label_en', array(
            'label'   => __( 'Section Label (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Management',
        ) );

        $this->add_control( 'heading_sk', array(
            'label'   => __( 'Heading (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Manažér, tvorca riešení a iniciátor inovačných projektov',
        ) );

        $this->add_control( 'heading_en', array(
            'label'   => __( 'Heading (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Manager, solution creator and innovation project initiator',
        ) );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control( 'paragraph_sk', array(
            'label' => __( 'Paragraph (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::WYSIWYG,
        ) );
        $repeater->add_control( 'paragraph_en', array(
            'label' => __( 'Paragraph (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::WYSIWYG,
        ) );

        $this->add_control( 'paragraphs', array(
            'label'  => __( 'Paragraphs', 'lextom-elementor' ),
            'type'   => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ) );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <section class="lextom-manager" id="manazer">
          <div class="wrap">
            <div class="photo reveal">
              <?php if ( ! empty( $s['photo']['url'] ) ) : ?>
                <img src="<?php echo esc_url( $s['photo']['url'] ); ?>" alt="<?php echo esc_attr( $s['name'] ); ?>">
              <?php endif; ?>
              <div class="badge">
                <div class="nm"><?php echo esc_html( $s['name'] ); ?></div>
                <div class="rl" data-sk="<?php echo esc_attr( $s['role_sk'] ); ?>" data-en="<?php echo esc_attr( $s['role_en'] ); ?>"><?php echo esc_html( $s['role_sk'] ); ?></div>
              </div>
            </div>
            <div class="text">
              <div class="sec-label reveal" data-sk="<?php echo esc_attr( $s['label_sk'] ); ?>" data-en="<?php echo esc_attr( $s['label_en'] ); ?>"><?php echo esc_html( $s['label_sk'] ); ?></div>
              <h2 class="reveal" data-sk="<?php echo esc_attr( $s['heading_sk'] ); ?>" data-en="<?php echo esc_attr( $s['heading_en'] ); ?>"><?php echo esc_html( $s['heading_sk'] ); ?></h2>
              <?php if ( ! empty( $s['paragraphs'] ) ) : ?>
                <?php foreach ( $s['paragraphs'] as $i => $para ) :
                    $delay = $i > 0 ? ' d' . min( $i, 2 ) : '';
                ?>
                  <div class="reveal<?php echo esc_attr( $delay ); ?>">
                    <?php echo wp_kses_post( $para['paragraph_sk'] ); ?>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Manager_Section() );
