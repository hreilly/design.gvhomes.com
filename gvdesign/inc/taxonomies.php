<?php
/**
 * gvdesign taxonomies
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package gvdesign
 */

/**
 * Custom Taxonomies
 *
 */

function wptp_add_appliances_taxonomy() {
    $labels = array(
        'name'              => 'Appliances',
        'singular_name'     => 'Appliance',
        'search_items'      => 'Search Appliances',
        'all_items'         => 'All Appliances',
        'parent_item'       => 'Parent Appliance',
        'parent_item_colon' => 'Parent Appliance:',
        'edit_item'         => 'Edit Appliance',
        'update_item'       => 'Update Appliance',
        'add_new_item'      => 'Add New Appliance',
        'new_item_name'     => 'New Appliance Name',
        'menu_name'         => 'Appliances',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'appliances', 'options', $args );
}
add_action( 'init', 'wptp_add_appliances_taxonomy' );

function wptp_add_backsplashes_taxonomy() {
    $labels = array(
        'name'              => 'Backsplashes',
        'singular_name'     => 'Backsplash',
        'search_items'      => 'Search Backsplashes',
        'all_items'         => 'All Backsplashes',
        'parent_item'       => 'Parent Backsplash',
        'parent_item_colon' => 'Parent Backsplash:',
        'edit_item'         => 'Edit Backsplash',
        'update_item'       => 'Update Backsplash',
        'add_new_item'      => 'Add New Backsplash',
        'new_item_name'     => 'New Backsplash Name',
        'menu_name'         => 'Backsplashes',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'backsplashes', 'options', $args );
}
add_action( 'init', 'wptp_add_backsplashes_taxonomy' );

function wptp_add_cabinet_finishes_taxonomy() {
    $labels = array(
        'name'              => 'Cabinet Finishes',
        'singular_name'     => 'Cabinet Finish',
        'search_items'      => 'Search Cabinet Finishes',
        'all_items'         => 'All Cabinet Finishes',
        'parent_item'       => 'Parent Cabinet Finish',
        'parent_item_colon' => 'Parent Cabinet Finish:',
        'edit_item'         => 'Edit Cabinet Finish',
        'update_item'       => 'Update Cabinet Finish',
        'add_new_item'      => 'Add New Cabinet Finish',
        'new_item_name'     => 'New Cabinet Finish Name',
        'menu_name'         => 'Cabinet Finishes',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'cabinet-finishes', 'options', $args );
}
add_action( 'init', 'wptp_add_cabinet_finishes_taxonomy' );

function wptp_add_cabinet_styles_taxonomy() {
    $labels = array(
        'name'              => 'Cabinet Styles',
        'singular_name'     => 'Cabinet Style',
        'search_items'      => 'Search Cabinet Styles',
        'all_items'         => 'All Cabinet Styles',
        'parent_item'       => 'Parent Cabinet Style',
        'parent_item_colon' => 'Parent Cabinet Style:',
        'edit_item'         => 'Edit Cabinet Style',
        'update_item'       => 'Update Cabinet Style',
        'add_new_item'      => 'Add New Cabinet Style',
        'new_item_name'     => 'New Cabinet Style Name',
        'menu_name'         => 'Cabinet Styles',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'cabinet-styles', 'options', $args );
}
add_action( 'init', 'wptp_add_cabinet_styles_taxonomy' );

function wptp_add_carpets_taxonomy() {
    $labels = array(
        'name'              => 'Carpets',
        'singular_name'     => 'Carpet',
        'search_items'      => 'Search Carpets',
        'all_items'         => 'All Carpets',
        'parent_item'       => 'Parent Carpet',
        'parent_item_colon' => 'Parent Carpet:',
        'edit_item'         => 'Edit Carpet',
        'update_item'       => 'Update Carpet',
        'add_new_item'      => 'Add New Carpet',
        'new_item_name'     => 'New Carpet Name',
        'menu_name'         => 'Carpets',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'carpets', 'options', $args );
}
add_action( 'init', 'wptp_add_carpets_taxonomy' );

function wptp_add_counters_taxonomy() {
    $labels = array(
        'name'              => 'Counters',
        'singular_name'     => 'Counter',
        'search_items'      => 'Search Counters',
        'all_items'         => 'All Counters',
        'parent_item'       => 'Parent Counters',
        'parent_item_colon' => 'Parent Counters:',
        'edit_item'         => 'Edit Counter',
        'update_item'       => 'Update Counter',
        'add_new_item'      => 'Add New Counter',
        'new_item_name'     => 'New Counter Name',
        'menu_name'         => 'Counters',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'counters', 'options', $args );
}
add_action( 'init', 'wptp_add_counters_taxonomy' );

function wptp_add_designer_features_taxonomy() {
    $labels = array(
        'name'              => 'Designer Features',
        'singular_name'     => 'Designer Feature',
        'search_items'      => 'Search Designer Features',
        'all_items'         => 'All Designer Features',
        'parent_item'       => 'Parent Designer Features',
        'parent_item_colon' => 'Parent Designer Features:',
        'edit_item'         => 'Edit Designer Feature',
        'update_item'       => 'Update Designer Feature',
        'add_new_item'      => 'Add New Designer Feature',
        'new_item_name'     => 'New Designer Feature Name',
        'menu_name'         => 'Designer Features',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'designer-features', 'options', $args );
}
add_action( 'init', 'wptp_add_designer_features_taxonomy' );

function wptp_add_fixtures_taxonomy() {
    $labels = array(
        'name'              => 'Fixtures',
        'singular_name'     => 'Fixture',
        'search_items'      => 'Search Fixtures',
        'all_items'         => 'All Fixtures',
        'parent_item'       => 'Parent Fixture',
        'parent_item_colon' => 'Parent Fixture:',
        'edit_item'         => 'Edit Fixture',
        'update_item'       => 'Update Fixture',
        'add_new_item'      => 'Add New Fixture',
        'new_item_name'     => 'New Fixture Name',
        'menu_name'         => 'Fixtures',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'fixtures', 'options', $args );
}
add_action( 'init', 'wptp_add_fixtures_taxonomy' );

function wptp_add_floor_tile_taxonomy() {
    $labels = array(
        'name'              => 'Floor Tile',
        'singular_name'     => 'Floor Tile',
        'search_items'      => 'Search Floor Tile',
        'all_items'         => 'All Floor Tile',
        'parent_item'       => 'Parent Floor Tile',
        'parent_item_colon' => 'Parent Floor Tile:',
        'edit_item'         => 'Edit Floor Tile',
        'update_item'       => 'Update Floor Tile',
        'add_new_item'      => 'Add New Floor Tile',
        'new_item_name'     => 'New Floor Tile Name',
        'menu_name'         => 'Floor Tile',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'floor-tile', 'options', $args );
}
add_action( 'init', 'wptp_add_floor_tile_taxonomy' );

function wptp_add_front_doors_taxonomy() {
    $labels = array(
        'name'              => 'Front Doors',
        'singular_name'     => 'Front Door',
        'search_items'      => 'Search Front Doors',
        'all_items'         => 'All Front Doors',
        'parent_item'       => 'Parent Front Door',
        'parent_item_colon' => 'Parent Front Door:',
        'edit_item'         => 'Edit Front Door',
        'update_item'       => 'Update Front Door',
        'add_new_item'      => 'Add New Front Door',
        'new_item_name'     => 'New Front Door Name',
        'menu_name'         => 'Front Doors',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'front-doors', 'options', $args );
}
add_action( 'init', 'wptp_add_front_doors_taxonomy' );

function wptp_add_garage_doors_taxonomy() {
    $labels = array(
        'name'              => 'Garage Doors',
        'singular_name'     => 'Garage Door',
        'search_items'      => 'Search Garage Doors',
        'all_items'         => 'All Garage Doors',
        'parent_item'       => 'Parent Garage Door',
        'parent_item_colon' => 'Parent Garage Door:',
        'edit_item'         => 'Edit Garage Door',
        'update_item'       => 'Update Garage Door',
        'add_new_item'      => 'Add New Garage Door',
        'new_item_name'     => 'New Garage Door Name',
        'menu_name'         => 'Garage Doors',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'garage-doors', 'options', $args );
}
add_action( 'init', 'wptp_add_garage_doors_taxonomy' );

function wptp_add_hardware_taxonomy() {
    $labels = array(
        'name'              => 'Hardware',
        'singular_name'     => 'Hardware',
        'search_items'      => 'Search Hardware',
        'all_items'         => 'All Hardware',
        'parent_item'       => 'Parent Hardware',
        'parent_item_colon' => 'Parent Hardware:',
        'edit_item'         => 'Edit Hardware',
        'update_item'       => 'Update Hardware',
        'add_new_item'      => 'Add New Hardware',
        'new_item_name'     => 'New Hardware Name',
        'menu_name'         => 'Hardware',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'hardware', 'options', $args );
}
add_action( 'init', 'wptp_add_hardware_taxonomy' );

function wptp_add_lighting_taxonomy() {
    $labels = array(
        'name'              => 'Lighting',
        'singular_name'     => 'Lighting',
        'search_items'      => 'Search Lighting',
        'all_items'         => 'All Lighting',
        'parent_item'       => 'Parent Lighting',
        'parent_item_colon' => 'Parent Lighting:',
        'edit_item'         => 'Edit Lighting',
        'update_item'       => 'Update Lighting',
        'add_new_item'      => 'Add New Lighting',
        'new_item_name'     => 'New Lighting Name',
        'menu_name'         => 'Lighting',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'lighting', 'options', $args );
}
add_action( 'init', 'wptp_add_lighting_taxonomy' );

function wptp_add_masonry_taxonomy() {
    $labels = array(
        'name'              => 'Masonry',
        'singular_name'     => 'Masonry',
        'search_items'      => 'Search Masonry',
        'all_items'         => 'All Masonry',
        'parent_item'       => 'Parent Masonry',
        'parent_item_colon' => 'Parent Masonry:',
        'edit_item'         => 'Edit Masonry',
        'update_item'       => 'Update Masonry',
        'add_new_item'      => 'Add New Masonry',
        'new_item_name'     => 'New Masonry Name',
        'menu_name'         => 'Masonry',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'masonry', 'options', $args );
}
add_action( 'init', 'wptp_add_masonry_taxonomy' );

function wptp_add_paint_taxonomy() {
    $labels = array(
        'name'              => 'Paint',
        'singular_name'     => 'Paint',
        'search_items'      => 'Search Paint',
        'all_items'         => 'All Paint',
        'parent_item'       => 'Parent Paint',
        'parent_item_colon' => 'Parent Paint:',
        'edit_item'         => 'Edit Paint',
        'update_item'       => 'Update Paint',
        'add_new_item'      => 'Add New Paint',
        'new_item_name'     => 'New Paint Name',
        'menu_name'         => 'Paint',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'paint', 'options', $args );
}
add_action( 'init', 'wptp_add_paint_taxonomy' );

function wptp_add_roofing_taxonomy() {
    $labels = array(
        'name'              => 'Roofing',
        'singular_name'     => 'Roofing',
        'search_items'      => 'Search Roofing',
        'all_items'         => 'All Roofing',
        'parent_item'       => 'Parent Roofing',
        'parent_item_colon' => 'Parent Roofing:',
        'edit_item'         => 'Edit Roofing',
        'update_item'       => 'Update Roofing',
        'add_new_item'      => 'Add New Roofing',
        'new_item_name'     => 'New Roofing Name',
        'menu_name'         => 'Roofing',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'roofing', 'options', $args );
}
add_action( 'init', 'wptp_add_roofing_taxonomy' );

function wptp_add_wall_tile_taxonomy() {
    $labels = array(
        'name'              => 'Wall Tile',
        'singular_name'     => 'Wall Tile',
        'search_items'      => 'Search Wall Tile',
        'all_items'         => 'All Wall Tile',
        'parent_item'       => 'Parent Wall Tile',
        'parent_item_colon' => 'Parent Wall Tile:',
        'edit_item'         => 'Edit Wall Tile',
        'update_item'       => 'Update Wall Tile',
        'add_new_item'      => 'Add New Wall Tile',
        'new_item_name'     => 'New Wall Tile Name',
        'menu_name'         => 'Wall Tile',
    );
 
    $args = array(
        'labels'             => $labels,
        'hierarchical'       => false,
		'query_var'          => true,
		'show_ui'            => true,
		'show_in_rest'       => true,
		'rewrite'            => true,
    );
 
    register_taxonomy( 'wall-tile', 'options', $args );
}
add_action( 'init', 'wptp_add_wall_tile_taxonomy' );

?>