<?php
/*
Plugin Name: Product Catalog
Plugin URI: http://thenistagroup.com
Description: a plugin to showing the only products
Version: 1.0
Author: Silasak Lawong
Author URI: http://thenistagroup.com

*/

function my_custom_post_product() {
    $labels = array(
        'name'               => _x( 'Products', 'post type general name' ),
        'singular_name'      => _x( 'Product', 'post type singular name' ),
        'add_new'            => _x( 'Add New', 'book' ),
        'add_new_item'       => __( 'Add New Product' ),
        'edit_item'          => __( 'Edit Product' ),
        'new_item'           => __( 'New Product' ),
        'all_items'          => __( 'All Products' ),
        'view_item'          => __( 'View Product' ),
        'search_items'       => __( 'Search Products' ),
        'not_found'          => __( 'No products found' ),
        'not_found_in_trash' => __( 'No products found in the Trash' ), 
        'parent_item_colon'  => '',
        'menu_name'          => 'Products'
    );
    $args = array(
        'labels'        => $labels,
        'description'   => 'Holds our products and product specific data',
        'public'        => true,
        'menu_position' => 5,
        'supports'      => array( 'title', 'thumbnail'),
        'has_archive'   => true,
        'menu_icon' => plugin_dir_url( __FILE__ )  . 'img/product_ico.png'
    );
    register_post_type( 'product', $args ); 
}

add_action( 'init', 'my_custom_post_product' );

function my_taxonomies_product() {
    $labels = array(
        'name'              => _x( 'Product Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Product Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Product Categories' ),
        'all_items'         => __( 'All Product Categories' ),
        'parent_item'       => __( 'Parent Product Category' ),
        'parent_item_colon' => __( 'Parent Product Category:' ),
        'edit_item'         => __( 'Edit Product Category' ), 
        'update_item'       => __( 'Update Product Category' ),
        'add_new_item'      => __( 'Add New Product Category' ),
        'new_item_name'     => __( 'New Product Category' ),
        'menu_name'         => __( 'Product Categories' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'product_category', 'product', $args );
}
add_action( 'init', 'my_taxonomies_product', 0 );

function my_taxonomies_water() {
    $labels = array(
        'name'              => _x( 'Water Temperature', 'taxonomy general name' ),
        'singular_name'     => _x( 'Water Temperature', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Water Temperature' ),
        'all_items'         => __( 'All Water Temperature' ),
        'parent_item'       => __( 'Parent Water Temperature' ),
        'parent_item_colon' => __( 'Parent Water Temperature:' ),
        'edit_item'         => __( 'Edit Water Temperature' ), 
        'update_item'       => __( 'Update Water Temperature' ),
        'add_new_item'      => __( 'Add New Water Temperature' ),
        'new_item_name'     => __( 'New Water Temperature' ),
        'menu_name'         => __( 'Water Temperatures' ),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy( 'water_temperature', 'product', $args );
}
add_action( 'init', 'my_taxonomies_water', 0 );

require_once( plugin_dir_path( __FILE__ ) . 'product_gallery.php' );



function run_product_gallery() {

    $plugin = new Product_gallery();
    $plugin->run();

}

run_product_gallery();

require_once( plugin_dir_path( __FILE__ ) . 'product_content.php' );



function run_product_content() {

    $plugin = new Product_content();
    $plugin->run();

}

run_product_content();

require_once( plugin_dir_path( __FILE__ ) . 'product_spec.php' );



function run_product_spec() {

    $plugin = new Product_spec();
    $plugin->run();

}

run_product_spec();


