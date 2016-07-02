<?php
/*
Template Name:  Nasze suplementy
*/
get_header();

      require('modules/model/flexible_content.php');
      ?>

      <div class="entry-content">
          <?php
          $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

          $args = array(
             'posts_per_page' => 9,
             'paged' => $paged,
             'post_type' => 'product',
          );

          $custom_query = new WP_Query( $args );

          while($custom_query->have_posts()) :
             $custom_query->the_post();
          ?>

          <div class="posts_news suplementy_unit">

              <div class="posts_thumbnail">
                  <a href="<?php the_permalink(); ?>">
                      <?php the_post_thumbnail('full'); ?>
                  </a>
              </div>
              <div class="posts_title">
                  <a class="blog-title" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
              </div>
              <div class="posts_content">

                    <?php
                    mb_internal_encoding("UTF-8");
                    $string = get_post_meta(get_the_ID(), 'left_block', true);
                    echo mb_substr($string,0, 200) . '...';
                    ?>

                    <a href="<?php echo get_the_permalink(); ?>" class="more-link">CZYTAJ WIĘCEJ &gt;</a>
              </div>

          </div>

           <?php endwhile; ?>
          </div>

          <?php
          if (function_exists("pagination")) {
              pagination($custom_query->max_num_pages);
          }
         ?>
      </div>


<?php get_footer(); ?>
