<?php
/*
Template Name:  Co nowego
*/
      get_header();

      $strings = array('string_1', 'string_2', 'string_3', 'string_4');
      foreach($strings as $items)
      {
        $$items = get_post_meta(get_the_ID(), $items, true);
      }
      ?>

      <div class="entry-content">

          <!-- < New 4 posts -->
          <div class="title_for_new_posts">
              <?php the_title(); ?>
          </div>
          <div class="page-wrapper new_4_posts">
            <?php
            $args = array(
                        'posts_per_page' => 4,
                        'cat' => 32
                        );
            $lastposts = get_posts( $args );
            $num = 1;
            foreach( $lastposts as $post ){ setup_postdata($post);
            ?>

              <div class="new_post_<?php echo $num; ?>">
                  <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                      <?php the_post_thumbnail(); ?>
                  <?php endif; ?>
                  <!-- get_permalink( 146 ) -->
                  <a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a>
                  <?php the_content(''); ?>
                  <a href="<?php echo get_permalink(); ?>" class="more-link">CZYTAJ WIĘCEJ &gt;</a>
              </div>

            <?php
            $num++;
            }
            wp_reset_postdata();
            ?>
          </div>
          <!-- > -->


          <h2 class="title_for_new_posts">
              <?php echo $string_1; ?>
          </h2>
          <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

            $args = array(
               'posts_per_page' => 4,
               'paged' => $paged,
               'category__in' => array(42, 43, 44, 45, 46)
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
            echo do_shortcode('[ULWPQSF id=700]');
            ?>
            <h3 class="filter-title"><?php echo $string_2; ?></h3>

            <?php
            // Select post per page under filter
            $select_post_per_page = array(4, 8, 12, 16, 20);
            ?>

            <select id="select_post_per_page">
            <?php foreach($select_post_per_page as $item) : ?>
                <option value="<?php echo $item; ?>"><?php echo $item; ?></option>
            <?php endforeach; ?>

            </select>
            <span class="select-title"><?php echo $string_3; ?></span>


            <div class="post_4-wrapper post_4-wrapper-marg">
                <?php while($custom_query->have_posts()) :
                   $custom_query->the_post();
                ?>

                    <div class="posts_news">
                        <div class="posts_thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full'); ?>
                            </a>
                        </div>
                        <div class="posts_title">
                            <a class="blog-title" href="<?php the_permalink(); ?>" rel="bookmark">
                                <?php the_title(); ?>
                            </a>
                        </div>

                        <div class="posts_date">
                            <?php the_time('d. F Y'); ?>
                        </div>

                        <div class="posts_content">
                              <?php echo the_content(); ?>
                        </div>
                    </div>

               <?php endwhile; ?>

            </div>
            </div>

            <!-- Tags -->
            <div class="tags">
                <div class="title_tags rubric-title-upp">
                    <?php echo $string_4; ?>
                </div>
                <?php if ( is_active_sidebar( 'tags' ) ) {?>
                    <?php dynamic_sidebar( 'tags' ); ?>
                <?php } ?>
            </div>

      </div>


<?php get_footer(); ?>
