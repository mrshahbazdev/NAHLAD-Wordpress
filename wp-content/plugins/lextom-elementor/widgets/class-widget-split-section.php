<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class Lextom_Widget_Split_Section extends \Elementor\Widget_Base {

    public function get_name() { return 'lextom_split'; }
    public function get_title() { return __( 'LeXtom Split Section', 'lextom-elementor' ); }
    public function get_icon() { return 'eicon-image-before-after'; }
    public function get_categories() { return array( 'lextom' ); }

    protected function register_controls() {
        $this->start_controls_section( 'section_content', array(
            'label' => __( 'Content', 'lextom-elementor' ),
        ) );

        $this->add_control( 'layout', array(
            'label'   => __( 'Layout', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => 'image-left',
            'options' => array(
                'image-left'  => __( 'Image Left', 'lextom-elementor' ),
                'image-right' => __( 'Image Right', 'lextom-elementor' ),
            ),
        ) );

        $this->add_control( 'image', array(
            'label' => __( 'Image', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ) );

        $this->add_control( 'label_sk', array(
            'label' => __( 'Label (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'label_en', array(
            'label' => __( 'Label (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'heading_sk', array(
            'label' => __( 'Heading (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'heading_en', array(
            'label' => __( 'Heading (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXTAREA,
        ) );

        $this->add_control( 'content_sk', array(
            'label' => __( 'Content (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::WYSIWYG,
        ) );

        $this->add_control( 'content_en', array(
            'label' => __( 'Content (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::WYSIWYG,
        ) );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control( 'item_sk', array(
            'label' => __( 'Item (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );
        $repeater->add_control( 'item_en', array(
            'label' => __( 'Item (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'list_items', array(
            'label'  => __( 'List Items', 'lextom-elementor' ),
            'type'   => \Elementor\Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
        ) );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();
        $reverse = $s['layout'] === 'image-right';
        ?>
        <section class="lextom-split">
          <div class="wrap" <?php echo $reverse ? 'style="direction:rtl;"' : ''; ?>>
            <div class="ph reveal" <?php echo $reverse ? 'style="direction:ltr;"' : ''; ?>>
              <?php if ( ! empty( $s['image']['url'] ) ) : ?>
                <img src="<?php echo esc_url( $s['image']['url'] ); ?>" alt="">
              <?php endif; ?>
            </div>
            <div class="text-col reveal" <?php echo $reverse ? 'style="direction:ltr;"' : ''; ?>>
              <?php if ( ! empty( $s['label_sk'] ) ) : ?>
                <div class="sec-label" data-sk="<?php echo esc_attr( $s['label_sk'] ); ?>" data-en="<?php echo esc_attr( $s['label_en'] ); ?>"><?php echo esc_html( $s['label_sk'] ); ?></div>
              <?php endif; ?>

              <?php if ( ! empty( $s['heading_sk'] ) ) : ?>
                <h2 class="sec-h" data-sk="<?php echo esc_attr( $s['heading_sk'] ); ?>" data-en="<?php echo esc_attr( $s['heading_en'] ); ?>"><?php echo wp_kses( $s['heading_sk'], array( 'em' => array() ) ); ?></h2>
              <?php endif; ?>

              <?php if ( ! empty( $s['content_sk'] ) ) : ?>
                <?php echo wp_kses_post( $s['content_sk'] ); ?>
              <?php endif; ?>

              <?php if ( ! empty( $s['list_items'] ) ) : ?>
                <ul>
                  <?php foreach ( $s['list_items'] as $item ) : ?>
                    <li data-sk="<?php echo esc_attr( $item['item_sk'] ); ?>" data-en="<?php echo esc_attr( $item['item_en'] ); ?>"><?php echo esc_html( $item['item_sk'] ); ?></li>
                  <?php endforeach; ?>
                </ul>
              <?php endif; ?>
            </div>
          </div>
        </section>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Split_Section() );
