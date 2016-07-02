<?php
/*
Template Name:  Zdrova kuchnia
*/
      get_header();

      $strings = array('string_1', 'string_2', 'string_3', 'string_4');
      foreach($strings as $items)
      {
        $$items = get_post_meta(get_the_ID(), $items, true);
      }
      ?>

      <!-- < New 4 posts -->
        <div class="title_for_new_posts">
            <?php echo $string_1; ?>
        </div>
        <div class="page-wrapper new_4_posts">
          <?php
          $args = array(
                      'post_type' => 'productsfood',
                      'posts_per_page' => 4,
                      );
          $lastposts = get_posts( $args );
          $num = 1;
          foreach( $lastposts as $post ){ setup_postdata($post);
          ?>

            <div class="new_post_<?php echo $num; ?>">
                <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                    <?php the_post_thumbnail(); ?>
                <?php endif; ?>

                <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                <?php the_content(''); ?>
                <a href="<?php echo get_permalink(); ?>" class="more-link">CZYTAJ WIĘCEJ &gt;</a>
            </div>

          <?php
          $num++;
          }
          wp_reset_postdata();
          ?>

          <a class="read-more content_button_kuchnia" href="<?php echo get_permalink(769); ?>"><?php echo $string_2; ?></a>
        </div>
      <!-- > -->


      <!-- < Middle block -->
      <?php require('modules/model/flexible_content.php'); ?>
      <!-- > -->


      <div class="entry-content">

        <!-- < News and filter -->
        <?php
          $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

          $args = array(
             'post_type' => 'recipes',
             'posts_per_page' => 8,
             'paged' => $paged,
          );

          $custom_query = new WP_Query( $args );

          // Filter by category for posts
          require_once ABSPATH .'/wp-admin/includes/template.php';

          $args = array(
            'descendants_and_self' => 0,
            'selected_cats'        => false,
            'popular_cats'         => false,
            'taxonomy'             => 'category',
            'checked_ontop'        => true,
            'echo'                 => true,
          );

          // Filter
          echo do_shortcode('[ULWPQSF id=556]');
          ?>

          <h3 class="filter-title"><?php echo $string_3; ?></h3>

          <?php
          // Select post per page under filter
          $select_post_per_page = array(8, 12, 16, 20);
          ?>

          <select id="select_post_per_page">
              <?php foreach($select_post_per_page as $item) : ?>
                  <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
              <?php endforeach; ?>
          </select>

          <span class="select-title"><?php echo $string_4; ?></span>

          <div class="post_4-wrapper post_4-wrapper-marg">

              <?php while($custom_query->have_posts()) :
                 $custom_query->the_post();
              ?>

              <div class="posts_line_4">
                  <div class="posts_thumbnail">
                      <a href="<?php the_permalink(); ?>">
                          <?php the_post_thumbnail('full'); ?>
                      </a>
                  </div>
                  <div class="posts_title">
                      <a class="blog-title" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                  </div>
                  <div class="posts_content">
                        <?php //echo the_content(); ?>
                        <a href="<?php the_permalink(); ?>" class="more-link">ZOBACH &gt;</a>
                  </div>
              </div>

               <?php endwhile; ?>

          </div>
          </div>

          <?php
          // Aagination
          if (function_exists("pagination")) {
              pagination($custom_query->max_num_pages);
          }
          ?>
         <!-- > -->

      </div>


<?php get_footer(); ?>
