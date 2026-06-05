<?php
/**
 * LeXtom Hero Widget
 *
 * @package LeXtom_Elementor
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Lextom_Widget_Hero extends \Elementor\Widget_Base {

    public function get_name() {
        return 'lextom_hero';
    }

    public function get_title() {
        return __( 'LeXtom Hero', 'lextom-elementor' );
    }

    public function get_icon() {
        return 'eicon-banner';
    }

    public function get_categories() {
        return array( 'lextom' );
    }

    protected function register_controls() {

        // Content
        $this->start_controls_section( 'section_content', array(
            'label' => __( 'Content', 'lextom-elementor' ),
        ) );

        $this->add_control( 'hero_style', array(
            'label'   => __( 'Style', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => 'center',
            'options' => array(
                'center'    => __( 'Center (Home)', 'lextom-elementor' ),
                'left'      => __( 'Left Aligned', 'lextom-elementor' ),
                'ecosystem' => __( 'VIP Care Ecosystem', 'lextom-elementor' ),
                'pattern'   => __( 'Pattern Background', 'lextom-elementor' ),
            ),
        ) );

        $this->add_control( 'hero_height', array(
            'label'   => __( 'Height', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::SELECT,
            'default' => 'normal',
            'options' => array(
                'normal' => __( 'Normal (62vh)', 'lextom-elementor' ),
                'tall'   => __( 'Tall (78vh)', 'lextom-elementor' ),
                'full'   => __( 'Full Screen', 'lextom-elementor' ),
            ),
        ) );

        $this->add_control( 'eyebrow_sk', array(
            'label'   => __( 'Eyebrow (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'LeXtom s.r.o. · Slovensko · od 2016',
        ) );

        $this->add_control( 'eyebrow_en', array(
            'label'   => __( 'Eyebrow (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'LeXtom s.r.o. · Slovakia · since 2016',
        ) );

        $this->add_control( 'title_line1_sk', array(
            'label'   => __( 'Title Line 1 (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Inovácie a technológie',
        ) );

        $this->add_control( 'title_line1_en', array(
            'label'   => __( 'Title Line 1 (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Innovation and technology',
        ) );

        $this->add_control( 'title_accent_sk', array(
            'label'   => __( 'Title Accent (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 's ľudským rozmerom.',
        ) );

        $this->add_control( 'title_accent_en', array(
            'label'   => __( 'Title Accent (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'with a human dimension.',
        ) );

        $this->add_control( 'subtitle_sk', array(
            'label'   => __( 'Subtitle (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'Prepájame sociálne služby, zdravotníctvo, šport, vzdelávanie a moderné technológie do funkčných celkov s reálnym dopadom.',
        ) );

        $this->add_control( 'subtitle_en', array(
            'label'   => __( 'Subtitle (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXTAREA,
            'default' => 'We connect social services, healthcare, sport, education and modern technology into functional systems with real impact.',
        ) );

        $this->add_control( 'background_image', array(
            'label' => __( 'Background Image', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::MEDIA,
        ) );

        $this->add_control( 'crest_image', array(
            'label'     => __( 'Crest Image (VIP Care)', 'lextom-elementor' ),
            'type'      => \Elementor\Controls_Manager::MEDIA,
            'condition' => array( 'hero_style' => 'ecosystem' ),
        ) );

        $this->add_control( 'ecosystem_badge_sk', array(
            'label'     => __( 'Badge Text (SK)', 'lextom-elementor' ),
            'type'      => \Elementor\Controls_Manager::TEXT,
            'default'   => 'VIP Care Technology Ecosystem',
            'condition' => array( 'hero_style' => 'ecosystem' ),
        ) );

        $this->add_control( 'ecosystem_badge_en', array(
            'label'     => __( 'Badge Text (EN)', 'lextom-elementor' ),
            'type'      => \Elementor\Controls_Manager::TEXT,
            'default'   => 'VIP Care Technology Ecosystem',
            'condition' => array( 'hero_style' => 'ecosystem' ),
        ) );

        $this->add_control( 'tagline_sk', array(
            'label' => __( 'Tagline (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'tagline_en', array(
            'label' => __( 'Tagline (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'scroll_label_sk', array(
            'label'   => __( 'Scroll Label (SK)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Kto sme',
        ) );

        $this->add_control( 'scroll_label_en', array(
            'label'   => __( 'Scroll Label (EN)', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => 'Who We Are',
        ) );

        $this->add_control( 'scroll_target', array(
            'label'   => __( 'Scroll Target ID', 'lextom-elementor' ),
            'type'    => \Elementor\Controls_Manager::TEXT,
            'default' => '#firma',
        ) );

        // Tags repeater (for left-aligned hero)
        $repeater = new \Elementor\Repeater();
        $repeater->add_control( 'tag_sk', array(
            'label' => __( 'Tag (SK)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );
        $repeater->add_control( 'tag_en', array(
            'label' => __( 'Tag (EN)', 'lextom-elementor' ),
            'type'  => \Elementor\Controls_Manager::TEXT,
        ) );

        $this->add_control( 'tags', array(
            'label'     => __( 'Tags', 'lextom-elementor' ),
            'type'      => \Elementor\Controls_Manager::REPEATER,
            'fields'    => $repeater->get_controls(),
            'condition' => array( 'hero_style' => 'left' ),
        ) );

        $this->end_controls_section();
    }

    protected function render() {
        $s = $this->get_settings_for_display();

        $style_class = 'lextom-hero';
        if ( $s['hero_style'] === 'left' ) {
            $style_class .= ' lextom-hero--left';
        } elseif ( $s['hero_style'] === 'ecosystem' ) {
            $style_class .= ' lextom-hero--ecosystem';
        }

        if ( $s['hero_height'] === 'tall' ) {
            $style_class .= ' lextom-hero--tall';
        } elseif ( $s['hero_height'] === 'full' ) {
            $style_class .= ' lextom-hero--full';
        }
        ?>
        <header class="<?php echo esc_attr( $style_class ); ?>">

          <?php if ( $s['hero_style'] === 'ecosystem' && ! empty( $s['crest_image']['url'] ) ) : ?>
            <div class="hero-crestbg"><img src="<?php echo esc_url( $s['crest_image']['url'] ); ?>" alt=""></div>
          <?php endif; ?>

          <?php if ( ! empty( $s['background_image']['url'] ) && $s['hero_style'] !== 'ecosystem' ) : ?>
            <div class="hero-bg"><img src="<?php echo esc_url( $s['background_image']['url'] ); ?>" alt=""></div>
          <?php endif; ?>

          <div class="hero-inner">

            <?php if ( $s['hero_style'] === 'ecosystem' && ! empty( $s['ecosystem_badge_sk'] ) ) : ?>
              <div class="ecosystem-badge" data-sk="<?php echo esc_attr( $s['ecosystem_badge_sk'] ); ?>" data-en="<?php echo esc_attr( $s['ecosystem_badge_en'] ); ?>">
                <span class="pulse"></span>
                <?php echo esc_html( $s['ecosystem_badge_sk'] ); ?>
              </div>
            <?php endif; ?>

            <?php if ( ! empty( $s['eyebrow_sk'] ) ) : ?>
              <div class="eyebrow" data-sk="<?php echo esc_attr( $s['eyebrow_sk'] ); ?>" data-en="<?php echo esc_attr( $s['eyebrow_en'] ); ?>">
                <?php echo esc_html( $s['eyebrow_sk'] ); ?>
              </div>
            <?php endif; ?>

            <h1 class="hero-title">
              <span class="word" style="animation-delay:.4s" data-sk="<?php echo esc_attr( $s['title_line1_sk'] ); ?>" data-en="<?php echo esc_attr( $s['title_line1_en'] ); ?>"><?php echo esc_html( $s['title_line1_sk'] ); ?></span>
              <span class="word accent" style="animation-delay:.55s" data-sk="<?php echo esc_attr( $s['title_accent_sk'] ); ?>" data-en="<?php echo esc_attr( $s['title_accent_en'] ); ?>"><?php echo esc_html( $s['title_accent_sk'] ); ?></span>
            </h1>

            <?php if ( ! empty( $s['tagline_sk'] ) ) : ?>
              <div class="hero-tag" data-sk="<?php echo esc_attr( $s['tagline_sk'] ); ?>" data-en="<?php echo esc_attr( $s['tagline_en'] ); ?>">
                <?php echo esc_html( $s['tagline_sk'] ); ?>
              </div>
            <?php endif; ?>

            <p class="hero-sub" data-sk="<?php echo esc_attr( $s['subtitle_sk'] ); ?>" data-en="<?php echo esc_attr( $s['subtitle_en'] ); ?>">
              <?php echo esc_html( $s['subtitle_sk'] ); ?>
            </p>

            <?php if ( ! empty( $s['tags'] ) ) : ?>
              <div class="hero-list">
                <?php foreach ( $s['tags'] as $tag ) : ?>
                  <span data-sk="<?php echo esc_attr( $tag['tag_sk'] ); ?>" data-en="<?php echo esc_attr( $tag['tag_en'] ); ?>"><?php echo esc_html( $tag['tag_sk'] ); ?></span>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

            <?php if ( ! empty( $s['scroll_label_sk'] ) && $s['hero_style'] === 'center' ) : ?>
              <div class="hero-scroll">
                <a href="<?php echo esc_attr( $s['scroll_target'] ); ?>">
                  <span data-sk="<?php echo esc_attr( $s['scroll_label_sk'] ); ?>" data-en="<?php echo esc_attr( $s['scroll_label_en'] ); ?>"><?php echo esc_html( $s['scroll_label_sk'] ); ?></span>
                  <span class="ln"></span>
                </a>
              </div>
            <?php endif; ?>

          </div>
        </header>
        <?php
    }
}

\Elementor\Plugin::instance()->widgets_manager->register( new Lextom_Widget_Hero() );
