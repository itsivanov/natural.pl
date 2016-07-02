<?php
function my_custom_post_recipes() {
   $labels = array(
       'name'               => _x( 'Recipes', 'post type general name' ),
       'singular_name'      => _x( 'Recipes', 'post type singular name' ),
       'add_new'            => _x( 'Add new', 'recipes' ),
       'add_new_item'       => __( 'Add new recipe' ),
       'edit_item'          => __( 'Edit recipe' ),
       'new_item'           => __( 'New recipe' ),
       'all_items'          => __( 'All recipes' ),
       'view_item'          => __( 'Read recipe' ),
       'search_items'       => __( 'Search recipe' ),
       'not_found'          => __( 'Product not found' ),
       'not_found_in_trash' => __( 'Product not found in trash' ),
       'parent_item_colon'  => '',
       'menu_name'          => 'Recipes'
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
   register_post_type( 'recipes', $args );
}
add_action( 'init', 'my_custom_post_recipes' );
