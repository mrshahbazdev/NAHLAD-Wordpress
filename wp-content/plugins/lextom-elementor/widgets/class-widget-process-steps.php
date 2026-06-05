<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_Process_Steps extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_process'; }
    public function get_title() { return __( 'LeXtom Process Steps', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-number-field'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        $this->start_controls_section( 'section_content', array(
            'label' => __( 'Content', 'lextom-elementor' ),
        ) );

        $this->add_control( 'label_sk', array(
            'label'   => __( 'Label (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Proces',
        ) );

        $this->add_control( 'label_en', array(
            'label'   => __( 'Label (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Process',
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
        $repeater->add_control( 'title_sk', array(
            'label' => __( 'Title (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );
        $repeater->add_control( 'title_en', array(
            'label' => __( 'Title (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );
        $repeater->add_control( 'description_sk', array(
            'label' => __( 'Description (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );
        $repeater->add_control( 'description_en', array(
            'label' => __( 'Description (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );
        $repeater->add_control( 'tags', array(
            'label'       => __( 'Tags (comma separated)', 'lextom-elementor' ),
            'type'        => \Elementor\Controls_Manager::TEXT,
            'description' => __( 'Comma-separated tags', 'lextom-elementor' ),
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
        <section class="lextom-process">
          <div class="wrap">
            <div class="sec-label reveal" data-sk="<?php echo esc_attr( $s['label_sk'] ); ?>" data-en="<?php echo esc_attr( $s['label_en'] ); ?>"><?php echo esc_html( $s['label_sk'] ); ?></div>

            <?php if ( ! empty( $s['heading_sk'] ) ) : ?>
              <h2 class="sec-h reveal" data-sk="<?php echo esc_attr( $s['heading_sk'] ); ?>" data-en="<?php echo esc_attr( $s['heading_en'] ); ?>"><?php echo wp_kses( $s['heading_sk'], array( 'em' => array() ) ); ?></h2>
            <?php endif; ?>

            <div class="proc-grid">
              <?php if ( ! empty( $s['steps'] ) ) : ?>
                <?php foreach ( $s['steps'] as $i => $step ) : ?>
                  <div class="proc reveal">
                    <div class="pn"><?php echo esc_html( str_pad( $i + 1, 2, '0', STR_PAD_LEFT ) ); ?></div>
                    <div>
                      <h3 data-sk="<?php echo esc_attr( $step['title_sk'] ); ?>" data-en="<?php echo esc_attr( $step['title_en'] ); ?>"><?php echo esc_html( $step['title_sk'] ); ?></h3>
                      <?php if ( ! empty( $step['description_sk'] ) ) : ?>
                        <p class="intro" data-sk="<?php echo esc_attr( $step['description_sk'] ); ?>" data-en="<?php echo esc_attr( $step['description_en'] ); ?>"><?php echo esc_html( $step['description_sk'] ); ?></p>
                      <?php endif; ?>
                      <?php if ( ! empty( $step['tags'] ) ) : ?>
                        <div class="tags">
                          <?php foreach ( explode( ',', $step['tags'] ) as $tag ) : ?>
                            <span><?php echo esc_html( trim( $tag ) ); ?></span>
                          <?php endforeach; ?>
                        </div>
                      <?php endif; ?>
                    </div>
                  </div>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </div>
        </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Process_Steps() );
