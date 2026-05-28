<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_Vision_Section extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_vision'; }
    public function get_title() { return __( 'LeXtom Vision Section', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-blockquote'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        $this->start_controls_section( 'section_content', array(
            'label' => __( 'Content', 'lextom-elementor' ),
        ) );

        $this->add_control( 'label_sk', array(
            'label'   => __( 'Label (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Vízia',
        ) );

        $this->add_control( 'label_en', array(
            'label'   => __( 'Label (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Vision',
        ) );

        $this->add_control( 'quote_sk', array(
            'label'   => __( 'Quote (SK) — use <em> for brass accent', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Svet, v ktorom technológie <em>slúžia ľuďom</em>, nie naopak.',
        ) );

        $this->add_control( 'quote_en', array(
            'label'   => __( 'Quote (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'A world where technology <em>serves people</em>, not the other way around.',
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
        <section class="lextom-vision" id="vizia">
          <div class="wrap">
            <div class="sec-label reveal" data-sk="<?php echo esc_attr( $s['label_sk'] ); ?>" data-en="<?php echo esc_attr( $s['label_en'] ); ?>"><?php echo esc_html( $s['label_sk'] ); ?></div>
            <div class="bigq reveal"><?php echo wp_kses( $s['quote_sk'], array( 'em' => array() ) ); ?></div>
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
        </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Vision_Section() );
