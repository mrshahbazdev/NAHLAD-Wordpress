<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_Company_Section extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_company'; }
    public function get_title() { return __( 'LeXtom Company Section', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-text'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        $this->start_controls_section( 'section_content', array(
            'label' => __( 'Content', 'lextom-elementor' ),
        ) );

        $this->add_control( 'section_id', array(
            'label'   => __( 'Section ID', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'firma',
        ) );

        $this->add_control( 'label_sk', array(
            'label'   => __( 'Label (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Kto sme',
        ) );

        $this->add_control( 'label_en', array(
            'label'   => __( 'Label (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Who We Are',
        ) );

        $this->add_control( 'heading_sk', array(
            'label'   => __( 'Heading (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'LeXtom s.r.o. — spoločnosť prepájajúca sociálny dopad, inovácie a praktické riešenia',
        ) );

        $this->add_control( 'heading_en', array(
            'label'   => __( 'Heading (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'LeXtom s.r.o. — a company connecting social impact, innovation and practical solutions',
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
        <section class="lextom-company" id="<?php echo esc_attr( $s['section_id'] ); ?>">
          <div class="wrap">
            <div class="sec-label reveal" data-sk="<?php echo esc_attr( $s['label_sk'] ); ?>" data-en="<?php echo esc_attr( $s['label_en'] ); ?>"><?php echo esc_html( $s['label_sk'] ); ?></div>
            <h2 class="reveal" data-sk="<?php echo esc_attr( $s['heading_sk'] ); ?>" data-en="<?php echo esc_attr( $s['heading_en'] ); ?>"><?php echo esc_html( $s['heading_sk'] ); ?></h2>
            <?php if ( ! empty( $s['paragraphs'] ) ) : ?>
              <?php foreach ( $s['paragraphs'] as $i => $para ) :
                  $delay = $i > 0 ? ' d' . min( $i, 2 ) : '';
              ?>
                <div class="reveal<?php echo esc_attr( $delay ); ?>" data-sk="<?php echo esc_attr( wp_strip_all_tags( $para['paragraph_sk'] ) ); ?>" data-en="<?php echo esc_attr( wp_strip_all_tags( $para['paragraph_en'] ) ); ?>">
                  <?php echo wp_kses_post( $para['paragraph_sk'] ); ?>
                </div>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Company_Section() );
