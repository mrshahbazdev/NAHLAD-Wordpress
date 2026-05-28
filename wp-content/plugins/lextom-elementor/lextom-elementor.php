<?php
/**
 * Plugin Name: LeXtom Elementor Widgets
 * Plugin URI: https://lextom.sk
 * Description: Custom Elementor widgets for the LeXtom website — Hero, Company, Manager, Vision, Process, Benefits, Product Catalog, and more. All sections editable via Elementor with SK/EN bilingual support.
 * Version: 1.0.0
 * Author: LeXtom s.r.o.
 * Author URI: https://lextom.sk
 * Text Domain: lextom-elementor
 * Requires Plugins: elementor
 * Elementor tested up to: 3.28
 * Elementor Pro tested up to: 3.28
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'LEXTOM_EL_VERSION', '1.0.0' );
define( 'LEXTOM_EL_DIR', plugin_dir_path( __FILE__ ) );
define( 'LEXTOM_EL_URL', plugin_dir_url( __FILE__ ) );

/**
 * Main plugin class
 */
final class Lextom_Elementor {

    private static $instance = null;

    public static function instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        add_action( 'plugins_loaded', array( $this, 'init' ) );
    }

    public function init() {
        if ( ! did_action( 'elementor/loaded' ) ) {
            add_action( 'admin_notices', array( $this, 'admin_notice_missing_elementor' ) );
            return;
        }

        add_action( 'elementor/widgets/register', array( $this, 'register_widgets' ) );
        add_action( 'elementor/elements/categories_registered', array( $this, 'add_category' ) );
        add_action( 'elementor/frontend/after_enqueue_styles', array( $this, 'enqueue_styles' ) );
        add_action( 'elementor/editor/after_enqueue_styles', array( $this, 'enqueue_styles' ) );
    }

    public function admin_notice_missing_elementor() {
        echo '<div class="notice notice-warning"><p>';
        echo esc_html__( 'LeXtom Elementor Widgets requires Elementor to be installed and activated.', 'lextom-elementor' );
        echo '</p></div>';
    }

    public function add_category( $elements_manager ) {
        $elements_manager->add_category( 'lextom', array(
            'title' => __( 'LeXtom', 'lextom-elementor' ),
            'icon'  => 'eicon-globe',
        ) );
    }

    public function register_widgets( $widgets_manager ) {
        $widgets = array(
            'hero',
            'company-section',
            'manager-section',
            'vision-section',
            'infographic',
            'why-us',
            'process-steps',
            'benefits-grid',
            'split-section',
            'strategic-quote',
            'cta-section',
            'product-catalog',
            'product-detail',
            'development-hub',
        );

        foreach ( $widgets as $widget ) {
            $file = LEXTOM_EL_DIR . 'widgets/class-widget-' . $widget . '.php';
            if ( file_exists( $file ) ) {
                require_once $file;
            }
        }
    }

    public function enqueue_styles() {
        wp_enqueue_style(
            'lextom-elementor-widgets',
            LEXTOM_EL_URL . 'assets/css/widgets.css',
            array(),
            LEXTOM_EL_VERSION
        );
    }
}

Lextom_Elementor::instance();
