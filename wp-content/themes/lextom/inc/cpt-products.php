<?php
/**
 * Custom Post Type: Produkty
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 1. Register Custom Post Type & Taxonomy
function lextom_register_products_cpt() {
    $labels = array(
        'name'                  => _x( 'Produkty', 'Post Type General Name', 'lextom' ),
        'singular_name'         => _x( 'Produkt', 'Post Type Singular Name', 'lextom' ),
        'menu_name'             => __( 'Produkty', 'lextom' ),
        'name_admin_bar'        => __( 'Produkt', 'lextom' ),
        'archives'              => __( 'Archív produktov', 'lextom' ),
        'attributes'            => __( 'Atribúty produktu', 'lextom' ),
        'parent_item_colon'     => __( 'Nadradený produkt:', 'lextom' ),
        'all_items'             => __( 'Všetky produkty', 'lextom' ),
        'add_new_item'          => __( 'Pridať nový produkt', 'lextom' ),
        'add_new'               => __( 'Pridať nový', 'lextom' ),
        'new_item'              => __( 'Nový produkt', 'lextom' ),
        'edit_item'             => __( 'Upraviť produkt', 'lextom' ),
        'update_item'           => __( 'Aktualizovať produkt', 'lextom' ),
        'view_item'             => __( 'Zobraziť produkt', 'lextom' ),
        'view_items'            => __( 'Zobraziť produkty', 'lextom' ),
        'search_items'          => __( 'Hľadať produkt', 'lextom' ),
        'not_found'             => __( 'Nenájdené', 'lextom' ),
        'not_found_in_trash'    => __( 'Nenájdené v koši', 'lextom' ),
        'featured_image'        => __( 'Obrázok produktu', 'lextom' ),
        'set_featured_image'    => __( 'Nastaviť obrázok produktu', 'lextom' ),
        'remove_featured_image' => __( 'Odstrániť obrázok produktu', 'lextom' ),
        'use_featured_image'    => __( 'Použiť ako obrázok produktu', 'lextom' ),
        'insert_into_item'      => __( 'Vložiť do produktu', 'lextom' ),
        'uploaded_to_this_item' => __( 'Nahrané k tomuto produktu', 'lextom' ),
        'items_list'            => __( 'Zoznam produktov', 'lextom' ),
        'items_list_navigation' => __( 'Navigácia zoznamu produktov', 'lextom' ),
        'filter_items_list'     => __( 'Filtrovať zoznam produktov', 'lextom' ),
    );
    $args = array(
        'label'                 => __( 'Produkt', 'lextom' ),
        'description'           => __( 'Produkty LeXtom', 'lextom' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'lextom_product_cat' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 20,
        'menu_icon'             => 'dashicons-cart',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => false,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
        'show_in_rest'          => true, // Enable Gutenberg if needed
    );
    register_post_type( 'lextom_product', $args );

    $tax_labels = array(
        'name'                       => _x( 'Kategórie produktov', 'Taxonomy General Name', 'lextom' ),
        'singular_name'              => _x( 'Kategória produktu', 'Taxonomy Singular Name', 'lextom' ),
        'menu_name'                  => __( 'Kategórie', 'lextom' ),
        'all_items'                  => __( 'Všetky kategórie', 'lextom' ),
        'parent_item'                => __( 'Nadradená kategória', 'lextom' ),
        'parent_item_colon'          => __( 'Nadradená kategória:', 'lextom' ),
        'new_item_name'              => __( 'Nová kategória', 'lextom' ),
        'add_new_item'               => __( 'Pridať kategóriu', 'lextom' ),
        'edit_item'                  => __( 'Upraviť kategóriu', 'lextom' ),
        'update_item'                => __( 'Aktualizovať kategóriu', 'lextom' ),
        'view_item'                  => __( 'Zobraziť kategóriu', 'lextom' ),
        'separate_items_with_commas' => __( 'Oddeľte kategórie čiarkou', 'lextom' ),
        'add_or_remove_items'        => __( 'Pridať alebo odstrániť kategórie', 'lextom' ),
        'choose_from_most_used'      => __( 'Vybrať z najpoužívanejších', 'lextom' ),
        'popular_items'              => __( 'Populárne kategórie', 'lextom' ),
        'search_items'               => __( 'Hľadať kategórie', 'lextom' ),
        'not_found'                  => __( 'Nenájdené', 'lextom' ),
        'no_terms'                   => __( 'Žiadne kategórie', 'lextom' ),
        'items_list'                 => __( 'Zoznam kategórií', 'lextom' ),
        'items_list_navigation'      => __( 'Navigácia zoznamu', 'lextom' ),
    );
    $tax_args = array(
        'labels'                     => $tax_labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => false,
        'show_in_rest'               => true,
    );
    register_taxonomy( 'lextom_product_cat', array( 'lextom_product' ), $tax_args );
}
add_action( 'init', 'lextom_register_products_cpt', 0 );


// 2. Add Custom Meta Boxes for Extra Fields
function lextom_add_product_meta_boxes() {
    add_meta_box(
        'lextom_product_details',
        __( 'Detaily produktu', 'lextom' ),
        'lextom_product_details_callback',
        'lextom_product',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'lextom_add_product_meta_boxes' );

function lextom_product_details_callback( $post ) {
    wp_nonce_field( 'lextom_save_product_details', 'lextom_product_meta_nonce' );

    $tag = get_post_meta( $post->ID, '_lextom_product_tag', true );
    $tagline = get_post_meta( $post->ID, '_lextom_product_tagline', true );
    $is_coming_soon = get_post_meta( $post->ID, '_lextom_product_coming_soon', true );
    
    $spec1_val = get_post_meta( $post->ID, '_lextom_product_spec1_val', true );
    $spec1_lbl = get_post_meta( $post->ID, '_lextom_product_spec1_lbl', true );
    $spec2_val = get_post_meta( $post->ID, '_lextom_product_spec2_val', true );
    $spec2_lbl = get_post_meta( $post->ID, '_lextom_product_spec2_lbl', true );
    $spec3_val = get_post_meta( $post->ID, '_lextom_product_spec3_val', true );
    $spec3_lbl = get_post_meta( $post->ID, '_lextom_product_spec3_lbl', true );
    ?>
    <style>
        .lextom-meta-row { margin-bottom: 15px; }
        .lextom-meta-row label { display: inline-block; width: 150px; font-weight: bold; }
        .lextom-meta-row input[type="text"] { width: 60%; }
        .lextom-specs-grid { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 15px; margin-top: 10px; }
        .lextom-specs-grid > div { border: 1px solid #ddd; padding: 10px; background: #f9f9f9; }
        .lextom-specs-grid label { width: 100%; display: block; margin-bottom: 5px; }
        .lextom-specs-grid input { width: 100%; }
    </style>
    <div class="lextom-meta-row">
        <label for="lextom_product_coming_soon">
            <input type="checkbox" id="lextom_product_coming_soon" name="lextom_product_coming_soon" value="1" <?php checked( $is_coming_soon, '1' ); ?> />
            <?php _e( 'Pripravujeme (Zobrazí sa ako nedostupný box)', 'lextom' ); ?>
        </label>
    </div>
    <div class="lextom-meta-row">
        <label for="lextom_product_tag"><?php _e( 'Štítok (Tag)', 'lextom' ); ?></label>
        <input type="text" id="lextom_product_tag" name="lextom_product_tag" value="<?php echo esc_attr( $tag ); ?>" placeholder="Napr. Novinka" />
    </div>
    <div class="lextom-meta-row">
        <label for="lextom_product_tagline"><?php _e( 'Podtitulok', 'lextom' ); ?></label>
        <input type="text" id="lextom_product_tagline" name="lextom_product_tagline" value="<?php echo esc_attr( $tagline ); ?>" placeholder="Italický podtitulok na detaile produktu" />
    </div>
    
    <hr>
    <h4><?php _e( 'Rýchle špecifikácie (Zobrazia sa na detaile)', 'lextom' ); ?></h4>
    <div class="lextom-specs-grid">
        <div>
            <strong>Špecifikácia 1</strong>
            <label>Hodnota (napr. 0L): <input type="text" name="lextom_product_spec1_val" value="<?php echo esc_attr( $spec1_val ); ?>"></label>
            <label>Popis (napr. Spotreba vody): <input type="text" name="lextom_product_spec1_lbl" value="<?php echo esc_attr( $spec1_lbl ); ?>"></label>
        </div>
        <div>
            <strong>Špecifikácia 2</strong>
            <label>Hodnota: <input type="text" name="lextom_product_spec2_val" value="<?php echo esc_attr( $spec2_val ); ?>"></label>
            <label>Popis: <input type="text" name="lextom_product_spec2_lbl" value="<?php echo esc_attr( $spec2_lbl ); ?>"></label>
        </div>
        <div>
            <strong>Špecifikácia 3</strong>
            <label>Hodnota: <input type="text" name="lextom_product_spec3_val" value="<?php echo esc_attr( $spec3_val ); ?>"></label>
            <label>Popis: <input type="text" name="lextom_product_spec3_lbl" value="<?php echo esc_attr( $spec3_lbl ); ?>"></label>
        </div>
    </div>
    <?php
}

function lextom_save_product_meta( $post_id ) {
    if ( ! isset( $_POST['lextom_product_meta_nonce'] ) ) {
        return;
    }
    if ( ! wp_verify_nonce( $_POST['lextom_product_meta_nonce'], 'lextom_save_product_details' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $is_coming_soon = isset( $_POST['lextom_product_coming_soon'] ) ? '1' : '0';
    update_post_meta( $post_id, '_lextom_product_coming_soon', $is_coming_soon );

    $fields = array(
        '_lextom_product_tag' => 'lextom_product_tag',
        '_lextom_product_tagline' => 'lextom_product_tagline',
        '_lextom_product_spec1_val' => 'lextom_product_spec1_val',
        '_lextom_product_spec1_lbl' => 'lextom_product_spec1_lbl',
        '_lextom_product_spec2_val' => 'lextom_product_spec2_val',
        '_lextom_product_spec2_lbl' => 'lextom_product_spec2_lbl',
        '_lextom_product_spec3_val' => 'lextom_product_spec3_val',
        '_lextom_product_spec3_lbl' => 'lextom_product_spec3_lbl',
    );

    foreach ( $fields as $meta_key => $post_field ) {
        if ( isset( $_POST[ $post_field ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( $_POST[ $post_field ] ) );
        }
    }
}
add_action( 'save_post_lextom_product', 'lextom_save_product_meta' );

// 3. Add Gallery Meta Box
function lextom_add_gallery_meta_box() {
    add_meta_box(
        'lextom_product_gallery',
        __( 'Gal�ria (Gallery)', 'lextom' ),
        'lextom_product_gallery_callback',
        'lextom_product',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'lextom_add_gallery_meta_box' );

function lextom_product_gallery_callback( $post ) {
    wp_nonce_field( 'lextom_save_product_gallery', 'lextom_product_gallery_nonce' );
    $gallery_ids = get_post_meta( $post->ID, '_lextom_product_gallery', true );
    ?>
    <div id="lextom_gallery_container">
        <input type="hidden" id="lextom_product_gallery" name="lextom_product_gallery" value="<?php echo esc_attr( $gallery_ids ); ?>" />
        <div id="lextom_gallery_preview" style="display:flex; gap:10px; flex-wrap:wrap; margin-bottom:15px;">
            <?php
            if ( $gallery_ids ) {
                $ids = explode( ',', $gallery_ids );
                foreach ( $ids as $id ) {
                    $url = wp_get_attachment_image_url( $id, 'thumbnail' );
                    if ( $url ) {
                        echo '<div class="g-img" style="position:relative;"><img src="' . esc_url($url) . '" style="width:80px;height:80px;object-fit:cover;" /><button type="button" class="g-remove" data-id="'.esc_attr($id).'" style="position:absolute;top:0;right:0;background:red;color:white;border:none;cursor:pointer;">X</button></div>';
                    }
                }
            }
            ?>
        </div>
        <button type="button" class="button" id="lextom_gallery_add"><?php _e( 'Pridat obr�zky', 'lextom' ); ?></button>
        <button type="button" class="button" id="lextom_gallery_clear"><?php _e( 'Vymazat v�etko', 'lextom' ); ?></button>
    </div>
    <script>
    jQuery(document).ready(function($){
        var frame;
        $('#lextom_gallery_add').on('click', function(e) {
            e.preventDefault();
            if ( frame ) { frame.open(); return; }
            frame = wp.media({
                title: 'Vyberte obr�zky pre gal�riu',
                button: { text: 'Pridat do gal�rie' },
                multiple: true
            });
            frame.on('select', function() {
                var attachments = frame.state().get('selection').map(function(a) {
                    a = a.toJSON();
                    return { id: a.id, url: a.sizes && a.sizes.thumbnail ? a.sizes.thumbnail.url : a.url };
                });
                var currentIds = $('#lextom_product_gallery').val();
                var idsArray = currentIds ? currentIds.split(',') : [];
                
                attachments.forEach(function(att) {
                    if(idsArray.indexOf(att.id.toString()) === -1) {
                        idsArray.push(att.id);
                        $('#lextom_gallery_preview').append('<div class="g-img" style="position:relative;"><img src="' + att.url + '" style="width:80px;height:80px;object-fit:cover;" /><button type="button" class="g-remove" data-id="'+att.id+'" style="position:absolute;top:0;right:0;background:red;color:white;border:none;cursor:pointer;">X</button></div>');
                    }
                });
                $('#lextom_product_gallery').val(idsArray.join(','));
            });
            frame.open();
        });
        
        $('#lextom_gallery_preview').on('click', '.g-remove', function() {
            var idToRemove = $(this).data('id').toString();
            var currentIds = $('#lextom_product_gallery').val();
            var idsArray = currentIds ? currentIds.split(',') : [];
            idsArray = idsArray.filter(function(id){ return id !== idToRemove; });
            $('#lextom_product_gallery').val(idsArray.join(','));
            $(this).parent('.g-img').remove();
        });
        
        $('#lextom_gallery_clear').on('click', function() {
            $('#lextom_product_gallery').val('');
            $('#lextom_gallery_preview').empty();
        });
    });
    </script>
    <?php
}

function lextom_save_product_gallery( $post_id ) {
    if ( ! isset( $_POST['lextom_product_gallery_nonce'] ) || ! wp_verify_nonce( $_POST['lextom_product_gallery_nonce'], 'lextom_save_product_gallery' ) ) return;
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if ( ! current_user_can( 'edit_post', $post_id ) ) return;
    
    if ( isset( $_POST['lextom_product_gallery'] ) ) {
        update_post_meta( $post_id, '_lextom_product_gallery', sanitize_text_field( $_POST['lextom_product_gallery'] ) );
    }
}
add_action( 'save_post_lextom_product', 'lextom_save_product_gallery' );

function lextom_enqueue_media_uploader( $hook ) {
    if ( in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {
        wp_enqueue_media();
    }
}
add_action( 'admin_enqueue_scripts', 'lextom_enqueue_media_uploader' );
