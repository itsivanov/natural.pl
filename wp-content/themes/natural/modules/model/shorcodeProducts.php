<?php
function products($atts, $content = null){
      global $post;
      $parent_page = '';
      $parent_page .= get_the_title();

      $array_products = get_post_meta($post->ID, 'product-select', true);

      if(!empty($array_products)) :

      $id_product = array();

      if(!empty($array_products))
      {
            for ($i = 0; $i < count($array_products); $i++)
            {
                $post = get_post($array_products[$i]);
                $id_product[] = $post->ID;
            }
      }

      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

      $args = array(
        'posts_per_page' => 4,
        'paged' => $paged,
        'post_type' => 'product',
        'post__in' => $id_product,
        'post_status' => 'publish',
        'orderby'=> 'post__in'
      );
      $custom_query = new WP_Query( $args );
      ?>

      <div class="products">
          <?php
          while($custom_query->have_posts()) :
             $custom_query->the_post();
          ?>
              <div class="products_unit">
                  <div class="img_product">
                      <?php the_post_thumbnail('full'); ?>
                  </div>
                  <div class="info_product">
                      <p class="info_product--title"><?php the_title(); ?></p>
                      <p class="info_product--rubric"><?php echo $parent_page; ?></p>
                      <p class="info_product--description"><?php echo the_content(); ?></p>
                      <p class="info_product--btn">
                          <?php $dodal = get_post_meta(get_the_ID(), 'Link cart', true); ?>
                          <a href="<?php echo (!empty($dodal)) ? $dodal : '#' ?>" class="info_product--cart">Dodaj do koszyka</a>

                          <?php $porownal = get_post_meta(get_the_ID(), 'Link Compare', true); ?>
                          <a href="<?php echo (!empty($porownal)) ? $porownal : '#' ?>" class="info_product--compare">Porównaj</a>
                      </p>
                  </div>
              </div>
           <?php endwhile; ?>
       </div>

      <?php
      if (function_exists("pagination")) {
           pagination($custom_query->max_num_pages);
       }

      endif;

  }
  add_shortcode( 'products', 'products');
