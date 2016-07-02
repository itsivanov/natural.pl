<?php
function my_custom_post_product() {
   $labels = array(
       'name'               => _x( 'Products', 'post type general name' ),
       'singular_name'      => _x( 'Product', 'post type singular name' ),
       'add_new'            => _x( 'Add new', 'book' ),
       'add_new_item'       => __( 'Add new porduct' ),
       'edit_item'          => __( 'Edit product' ),
       'new_item'           => __( 'New product' ),
       'all_items'          => __( 'All product' ),
       'view_item'          => __( 'Read product' ),
       'search_items'       => __( 'Search product' ),
       'not_found'          => __( 'Product not found' ),
       'not_found_in_trash' => __( 'Product not found in trash' ),
       'parent_item_colon'  => '',
       'menu_name'          => 'Products'
   );
   $args = array(
       'labels'        => $labels,
       'description'   => 'Holds our products and product specific data',
       'public'        => true,
       'menu_position' => 5,
       'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
       'has_archive'   => true,

   );
   register_post_type( 'product', $args );
}
add_action( 'init', 'my_custom_post_product' );
