<?php
/*
Template Name: Opinie klientow
*/

get_header();

      require('modules/model/flexible_content.php');

      // < Comments
      $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

      $args = array(
         'posts_per_page' => 3,
         'paged' => $paged,
         'post_type' => 'comments',
         'order' => 'DESC',
         'post_status' => 'publish'
      );

      $custom_query = new WP_Query( $args ); ?>

          <div class="review">
           <p class="rubric-title-upp">opinie naszych klientów</p>

          <?php while($custom_query->have_posts()) :
             $custom_query->the_post();
          ?>
          <div class="review--unit">

              <?php the_post_thumbnail('full'); ?>
              <div class="review--unit-desc">
                <p class="review--unit_name"><?php echo the_title(); ?></p>
                <p class="review--unit_date"><?php the_time('d F Y'); ?></p>
                <?php echo the_content(); ?>
              </div>

          </div>

           <?php endwhile; ?>
          </div>
       </div>

       <?php
       if (function_exists("pagination")) {
            pagination($custom_query->max_num_pages);
       }
       ?>
  <!-- > -->


<?php get_footer(); ?>
