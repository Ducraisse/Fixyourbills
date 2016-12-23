<?php
function content_blocks() {
    $labels = array(
        'name'                => _x( 'Content Blocks', 'Post Type General Name', 'ain' ),
        'singular_name'       => _x( 'Content Block', 'Post Type Singular Name', 'ain' ),
        'menu_name'           => __( 'Content Blocks', 'ain' ),
        'parent_item_colon'   => __( 'Parent Content Block', 'ain' ),
        'all_items'           => __( 'All Content Blocks', 'ain' ),
        'view_item'           => __( 'View Content Block', 'ain' ),
        'add_new_item'        => __( 'Add New Content Block', 'ain' ),
        'add_new'             => __( 'Add New', 'ain' ),
        'edit_item'           => __( 'Edit Content Block', 'ain' ),
        'update_item'         => __( 'Update Content Block', 'ain' ),
        'search_items'        => __( 'Search Content Blocks', 'ain' ),
        'not_found'           => __( 'Not found', 'ain' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'ain' ),
    );
    $args = array(
        'label'               => 'content-blocks',
        'description'         => 'Content Blocks for pages',
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'revisions' ),
        'hierarchical'        => false,
        'public'              => false,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => true,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'content-blocks', $args );
}
add_action( 'init', 'content_blocks', 0 );
/**
 * Content block Shortcode
 */
function get_page_id_by_slug($slug){
    global $wpdb;
    $id = $wpdb->get_var("SELECT ID FROM $wpdb->posts WHERE post_name = '".$slug."'AND post_type = 'content-blocks'");
    return $id;
}
function build_content_block($atts, $text) {
    $atts = shortcode_atts(array(
        'slug' => '',
    ), $atts
    );
    if ( $atts['slug'] == '' || $atts['slug'] == NULL ) {
        return FALSE;
    }
    $page = get_post( get_page_id_by_slug( $atts['slug'] ) );
    return do_shortcode($page->post_content);
}
add_shortcode( 'cblock', 'build_content_block' );