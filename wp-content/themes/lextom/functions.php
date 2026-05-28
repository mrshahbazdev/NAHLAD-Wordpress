<?php
/**
 * LeXtom Theme Functions
 *
 * @package LeXtom
 * @version 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'LEXTOM_VERSION', '1.0.0' );
define( 'LEXTOM_DIR', get_template_directory() );
define( 'LEXTOM_URI', get_template_directory_uri() );

require_once LEXTOM_DIR . '/template-parts/class-lextom-nav-walker.php';

/**
 * Theme setup
 */
function lextom_setup() {
    load_theme_textdomain( 'lextom', LEXTOM_DIR . '/languages' );

    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
    add_theme_support( 'custom-logo', array(
        'height'      => 40,
        'width'       => 160,
        'flex-height' => true,
        'flex-width'  => true,
    ) );

    register_nav_menus( array(
        'primary'       => __( 'Primary Menu', 'lextom' ),
        'footer_menu_1' => __( 'Footer Menu 1', 'lextom' ),
        'footer_menu_2' => __( 'Footer Menu 2', 'lextom' ),
    ) );
}
add_action( 'after_setup_theme', 'lextom_setup' );

/**
 * Enqueue styles and scripts
 */
function lextom_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'lextom-google-fonts',
        'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;1,9..144,400&family=Manrope:wght@300;400;500;600;700&display=swap',
        array(),
        null
    );

    // Theme stylesheet
    wp_enqueue_style( 'lextom-style', get_stylesheet_uri(), array( 'lextom-google-fonts' ), LEXTOM_VERSION );

    // Main JS
    wp_enqueue_script( 'lextom-main', LEXTOM_URI . '/assets/js/main.js', array(), LEXTOM_VERSION, true );

    // Pass data to JS
    wp_localize_script( 'lextom-main', 'lextomData', array(
        'ajaxUrl'       => admin_url( 'admin-ajax.php' ),
        'watermarkUrl'  => LEXTOM_URI . '/assets/images/mapa-watermark.webp',
        'currentLang'   => lextom_get_current_lang(),
    ) );
}
add_action( 'wp_enqueue_scripts', 'lextom_scripts' );

/**
 * Get current language (Polylang compatible)
 */
function lextom_get_current_lang() {
    if ( function_exists( 'pll_current_language' ) ) {
        return pll_current_language( 'slug' );
    }
    return 'sk';
}

/**
 * Get translated page URL (Polylang compatible)
 */
function lextom_get_lang_url( $lang ) {
    if ( function_exists( 'pll_the_languages' ) ) {
        $languages = pll_the_languages( array( 'raw' => 1 ) );
        if ( isset( $languages[ $lang ] ) ) {
            return $languages[ $lang ]['url'];
        }
    }
    return add_query_arg( 'lang', $lang );
}

/**
 * Register widget areas
 */
function lextom_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Footer Column 1', 'lextom' ),
        'id'            => 'footer-1',
        'before_widget' => '<div class="fcol">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );

    register_sidebar( array(
        'name'          => __( 'Footer Column 2', 'lextom' ),
        'id'            => 'footer-2',
        'before_widget' => '<div class="fcol">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4>',
        'after_title'   => '</h4>',
    ) );
}
add_action( 'widgets_init', 'lextom_widgets_init' );

/**
 * Add Elementor support
 */
function lextom_elementor_support() {
    // Register Elementor locations for theme builder
    if ( did_action( 'elementor/loaded' ) ) {
        add_action( 'elementor/theme/register_locations', function( $elementor_theme_manager ) {
            $elementor_theme_manager->register_location( 'header' );
            $elementor_theme_manager->register_location( 'footer' );
            $elementor_theme_manager->register_location( 'single' );
            $elementor_theme_manager->register_location( 'archive' );
        } );
    }
}
add_action( 'after_setup_theme', 'lextom_elementor_support' );

/**
 * Customizer settings
 */
function lextom_customizer( $wp_customize ) {
    // Company Info Section
    $wp_customize->add_section( 'lextom_company', array(
        'title'    => __( 'Company Info', 'lextom' ),
        'priority' => 30,
    ) );

    $wp_customize->add_setting( 'lextom_company_name', array(
        'default'           => 'LeXtom s.r.o.',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'lextom_company_name', array(
        'label'   => __( 'Company Name', 'lextom' ),
        'section' => 'lextom_company',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'lextom_company_ico', array(
        'default'           => 'IČO 50251015',
        'sanitize_callback' => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'lextom_company_ico', array(
        'label'   => __( 'Company ICO', 'lextom' ),
        'section' => 'lextom_company',
        'type'    => 'text',
    ) );

    $wp_customize->add_setting( 'lextom_email', array(
        'default'           => 'info@lextom.sk',
        'sanitize_callback' => 'sanitize_email',
    ) );
    $wp_customize->add_control( 'lextom_email', array(
        'label'   => __( 'Contact Email', 'lextom' ),
        'section' => 'lextom_company',
        'type'    => 'email',
    ) );

    // Footer Logo
    $wp_customize->add_setting( 'lextom_footer_logo', array(
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lextom_footer_logo', array(
        'label'   => __( 'Footer Logo', 'lextom' ),
        'section' => 'lextom_company',
    ) ) );

    // Watermark Image
    $wp_customize->add_setting( 'lextom_watermark', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'lextom_watermark', array(
        'label'   => __( 'Background Watermark Image', 'lextom' ),
        'section' => 'lextom_company',
    ) ) );
}
add_action( 'customize_register', 'lextom_customizer' );

/**
 * Polylang string registration
 */
function lextom_register_polylang_strings() {
    if ( function_exists( 'pll_register_string' ) ) {
        pll_register_string( 'company_name', 'LeXtom s.r.o.', 'LeXtom Theme' );
        pll_register_string( 'nav_kto_sme', 'Kto sme', 'LeXtom Theme' );
        pll_register_string( 'nav_odborny_personal', 'Odborný personál', 'LeXtom Theme' );
        pll_register_string( 'nav_vip_care', 'VIP Care Technology', 'LeXtom Theme' );
        pll_register_string( 'nav_distribucia', 'Distribúcia produktov', 'LeXtom Theme' );
        pll_register_string( 'nav_development', 'Development', 'LeXtom Theme' );
        pll_register_string( 'footer_rights', 'Všetky práva vyhradené', 'LeXtom Theme' );
        pll_register_string( 'footer_privacy', 'Ochrana osobných údajov', 'LeXtom Theme' );
        pll_register_string( 'footer_cookies', 'Cookies', 'LeXtom Theme' );
        pll_register_string( 'footer_contact', 'Kontakt', 'LeXtom Theme' );
    }
}
add_action( 'init', 'lextom_register_polylang_strings' );

/**
 * Custom body classes
 */
function lextom_body_classes( $classes ) {
    $classes[] = 'lextom-theme';

    if ( function_exists( 'pll_current_language' ) ) {
        $classes[] = 'lang-' . pll_current_language( 'slug' );
    }

    return $classes;
}
add_filter( 'body_class', 'lextom_body_classes' );

/**
 * Remove default WordPress block styles if Elementor is active
 */
function lextom_dequeue_block_styles() {
    if ( did_action( 'elementor/loaded' ) ) {
        wp_dequeue_style( 'wp-block-library' );
        wp_dequeue_style( 'wp-block-library-theme' );
    }
}
add_action( 'wp_enqueue_scripts', 'lextom_dequeue_block_styles', 100 );

/* ------------------------------------------------------------------
 * Auto-create pages on theme activation
 * ----------------------------------------------------------------*/
function lextom_create_default_pages() {
    $pages = array(
        array(
            'slug'     => 'kto-sme',
            'title'    => 'Kto sme',
            'template' => 'page-kto-sme.php',
        ),
        array(
            'slug'     => 'odborny-personal',
            'title'    => 'Odborný personál',
            'template' => 'page-odborny-personal.php',
        ),
        array(
            'slug'     => 'vip-care-technology',
            'title'    => 'VIP Care Technology',
            'template' => 'page-vip-care-technology.php',
        ),
        array(
            'slug'     => 'distribucia-produktov',
            'title'    => 'Distribúcia produktov',
            'template' => 'page-distribucia-produktov.php',
        ),
        array(
            'slug'     => 'distribucia-produkt',
            'title'    => 'Prenosný sprchový a sušiaci systém',
            'template' => 'page-distribucia-produkt.php',
        ),
        array(
            'slug'     => 'development',
            'title'    => 'Development',
            'template' => 'page-development.php',
        ),
    );

    foreach ( $pages as $page_data ) {
        $existing = get_page_by_path( $page_data['slug'] );
        if ( $existing ) {
            continue;
        }

        $page_id = wp_insert_post( array(
            'post_title'   => $page_data['title'],
            'post_name'    => $page_data['slug'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ) );

        if ( $page_id && ! is_wp_error( $page_id ) ) {
            update_post_meta( $page_id, '_wp_page_template', $page_data['template'] );
        }
    }

    // Set "Kto sme" as the front page.
    $front = get_page_by_path( 'kto-sme' );
    if ( $front ) {
        update_option( 'show_on_front', 'page' );
        update_option( 'page_on_front', $front->ID );
    }

    // Create primary menu with all pages.
    $menu_name = 'LeXtom hlavné menu';
    $menu_exists = wp_get_nav_menu_object( $menu_name );
    if ( ! $menu_exists ) {
        $menu_id = wp_create_nav_menu( $menu_name );
        if ( ! is_wp_error( $menu_id ) ) {
            $menu_items = array(
                'kto-sme'               => array( 'Kto sme', 'Who We Are' ),
                'odborny-personal'      => array( 'Odborný personál', 'Professional Staff' ),
                'vip-care-technology'   => array( 'VIP Care Technology', 'VIP Care Technology' ),
                'distribucia-produktov' => array( 'Distribúcia produktov', 'Product Distribution' ),
                'development'           => array( 'Development', 'Development' ),
            );
            $order = 1;
            foreach ( $menu_items as $slug => $labels ) {
                $page_obj = get_page_by_path( $slug );
                if ( $page_obj ) {
                    wp_update_nav_menu_item( $menu_id, 0, array(
                        'menu-item-title'     => $labels[0],
                        'menu-item-object'    => 'page',
                        'menu-item-object-id' => $page_obj->ID,
                        'menu-item-type'      => 'post_type',
                        'menu-item-status'    => 'publish',
                        'menu-item-position'  => $order,
                        'menu-item-description' => $labels[1],
                    ) );
                    $order++;
                }
            }
            $locations = get_theme_mod( 'nav_menu_locations', array() );
            $locations['primary'] = $menu_id;
            set_theme_mod( 'nav_menu_locations', $locations );
        }
    }
}
add_action( 'after_switch_theme', 'lextom_create_default_pages' );
