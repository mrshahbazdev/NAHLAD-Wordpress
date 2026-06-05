<?php
/**
 * Custom Nav Walker for LeXtom navigation
 *
 * @package LeXtom
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

class Lextom_Nav_Walker extends Walker_Nav_Menu {

    /**
     * Start element output.
     */
    public function start_el( &$output, $item, $depth = 0, $args = null, $id = 0 ) {
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_string = '';

        if ( in_array( 'current-menu-item', $classes, true ) || in_array( 'current_page_item', $classes, true ) ) {
            $class_string = ' class="current"';
        }

        $atts = array();
        $atts['href'] = ! empty( $item->url ) ? $item->url : '';

        // Add data-sk and data-en attributes if set in menu item description
        $title_sk = $item->title;
        $title_en = $item->title;

        if ( ! empty( $item->description ) ) {
            $title_en = $item->description;
        }

        $atts['data-sk'] = $title_sk;
        $atts['data-en'] = $title_en;

        $attributes = '';
        foreach ( $atts as $attr => $value ) {
            if ( ! empty( $value ) ) {
                $attributes .= ' ' . $attr . '="' . esc_attr( $value ) . '"';
            }
        }

        $output .= '<a' . $class_string . $attributes . '>';
        $output .= esc_html( $item->title );
        $output .= '</a>';
    }

    /**
     * End element — no closing tag needed since we use <a> directly.
     */
    public function end_el( &$output, $item, $depth = 0, $args = null ) {
        // No wrapper element to close
    }

    /**
     * Skip <ul> wrappers
     */
    public function start_lvl( &$output, $depth = 0, $args = null ) {
        // No wrapping element
    }

    public function end_lvl( &$output, $depth = 0, $args = null ) {
        // No wrapping element
    }
}
