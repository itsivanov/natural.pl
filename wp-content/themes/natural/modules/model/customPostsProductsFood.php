<?php
function my_custom_post_product_food() {
   $labels = array(
       'name'               => _x( 'Products (food)', 'post type general name' ),
       'singular_name'      => _x( 'Products (food)', 'post type singular name' ),
       'add_new'            => _x( 'Add new', 'products (food)' ),
       'add_new_item'       => __( 'Add new product (food)' ),
       'edit_item'          => __( 'Edit product (food)' ),
       'new_item'           => __( 'New product (food)' ),
       'all_items'          => __( 'All products (food)' ),
       'view_item'          => __( 'Read product (food)' ),
       'search_items'       => __( 'Search product (food)' ),
       'not_found'          => __( 'Product not found' ),
       'not_found_in_trash' => __( 'Product not found in trash' ),
       'parent_item_colon'  => '',
       'menu_name'          => 'Products (food)'
   );
   $args = array(
       'labels'        => $labels,
       'description'   => 'Holds our products and product specific data',
       'public'        => true,
       'menu_position' => 5,
       'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
       'has_archive'   => true,
       'taxonomies' => array('category')

   );
   register_post_type( 'products (food)', $args );
}
add_action( 'init', 'my_custom_post_product_food' );
