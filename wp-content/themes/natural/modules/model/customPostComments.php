<?php
function my_custom_post_comments() {
   $labels = array(
       'name'               => _x( 'Comments', 'post type general name' ),
       'singular_name'      => _x( 'Comment', 'post type singular name' ),
       'add_new'            => _x( 'Add Comment', 'book' ),
       'add_new_item'       => __( 'Add new Comment' ),
       'edit_item'          => __( 'Edit Comment' ),
       'new_item'           => __( 'New Comment' ),
       'all_items'          => __( 'All Comments' ),
       'view_item'          => __( 'Read Comment' ),
       'search_items'       => __( 'Search Comment' ),
       'not_found'          => __( 'Comment not found' ),
       'not_found_in_trash' => __( 'Comment not found in trash' ),
       'parent_item_colon'  => '',
       'menu_name'          => 'Comments'
   );
   $args = array(
       'labels'        => $labels,
       'description'   => 'Holds our products and product specific data',
       'public'        => true,
       'menu_position' => 5,
       'supports'      => array( 'title', 'editor', 'thumbnail'	  ),
       'has_archive'   => true,

   );
   register_post_type( 'comments', $args );
}
add_action( 'init', 'my_custom_post_comments' );
