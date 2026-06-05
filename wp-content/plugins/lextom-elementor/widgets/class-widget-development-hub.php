<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_Development_Hub extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_dev_hub'; }
    public function get_title() { return __( 'LeXtom Development Hub', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-apps'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        $this->start_controls_section( 'section_intro', array(
            'label' => __( 'Introduction', 'lextom-elementor' ),
        ) );

        $this->add_control( 'label_sk', array(
            'label'   => __( 'Label (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Development',
        ) );

        $this->add_control( 'label_en', array(
            'label'   => __( 'Label (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Development',
        ) );

        $this->add_control( 'heading_sk', array(
            'label' => __( 'Heading (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'heading_en', array(
            'label' => __( 'Heading (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'intro_sk', array(
            'label' => __( 'Intro (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::WYSIWYG,
        ) );

        $this->add_control( 'intro_en', array(
            'label' => __( 'Intro (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::WYSIWYG,
        ) );

        $this->end_controls_section();

        // Project cards
        $this->start_controls_section( 'section_projects', array(
            'label' => __( 'Projects', 'lextom-elementor' ),
        ) );

        $repeater = new \Elementor\Repeater();
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
        $repeater->add_control( 'link', array(
            'label' => __( 'Link', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::URL,
        ) );
        $repeater->add_control( 'badge', array(
            'label' => __( 'Badge Text', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );
        $repeater->add_control( 'accent_color', array(
            'label'   => __( 'Accent Color', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::COLOR,
            'default' => '#5fb8c9',
        ) );

        $this->add_control( 'projects', array(
            'label'  => __( 'Projects', 'lextom-elementor' ),
            'type'   => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ) );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        ?>
        <div class="lextom-devhub">
          <section class="intro">
            <div class="wrap">
              <div class="sec-label reveal" data-sk="<?php echo esc_attr( $s['label_sk'] ); ?>" data-en="<?php echo esc_attr( $s['label_en'] ); ?>"><?php echo esc_html( $s['label_sk'] ); ?></div>

              <?php if ( ! empty( $s['heading_sk'] ) ) : ?>
                <h2 class="sec-h reveal" data-sk="<?php echo esc_attr( $s['heading_sk'] ); ?>" data-en="<?php echo esc_attr( $s['heading_en'] ); ?>"><?php echo wp_kses( $s['heading_sk'], array( 'em' => array() ) ); ?></h2>
              <?php endif; ?>

              <?php if ( ! empty( $s['intro_sk'] ) ) : ?>
                <div class="reveal"><?php echo wp_kses_post( $s['intro_sk'] ); ?></div>
              <?php endif; ?>
            </div>
          </section>

          <?php if ( ! empty( $s['projects'] ) ) : ?>
            <section>
              <div class="wrap">
                <div class="project-cards">
                  <?php foreach ( $s['projects'] as $proj ) :
                      $url = ! empty( $proj['link']['url'] ) ? $proj['link']['url'] : '#';
                      $color = ! empty( $proj['accent_color'] ) ? $proj['accent_color'] : '#5fb8c9';
                  ?>
                    <a href="<?php echo esc_url( $url ); ?>" class="project-card reveal" style="border-top: 3px solid <?php echo esc_attr( $color ); ?>;">
                      <div class="card-body">
                        <?php if ( ! empty( $proj['badge'] ) ) : ?>
                          <div class="eyebrow" style="color:<?php echo esc_attr( $color ); ?>;margin-bottom:14px;"><?php echo esc_html( $proj['badge'] ); ?></div>
                        <?php endif; ?>
                        <h3 data-sk="<?php echo esc_attr( $proj['title_sk'] ); ?>" data-en="<?php echo esc_attr( $proj['title_en'] ); ?>"><?php echo esc_html( $proj['title_sk'] ); ?></h3>
                        <p data-sk="<?php echo esc_attr( $proj['desc_sk'] ); ?>" data-en="<?php echo esc_attr( $proj['desc_en'] ); ?>"><?php echo esc_html( $proj['desc_sk'] ); ?></p>
                      </div>
                    </a>
                  <?php endforeach; ?>
                </div>
              </div>
            </section>
          <?php endif; ?>
        </div>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Development_Hub() );
