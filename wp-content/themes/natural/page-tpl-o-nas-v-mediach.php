<?php
/*
Template Name:  O nas v mediach
*/
get_header();

      require('modules/model/flexible_content.php');
      ?>

      <div class="entry-content">
          <?php
            $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

            $args = array(
               'posts_per_page' => 12,
               'paged' => $paged,
               'category_name' => 'O-nas'
            );

            $custom_query = new WP_Query( $args );
            ?>

            <div class="media_posts-wrap">
                <?php
                while($custom_query->have_posts()) :
                   $custom_query->the_post();
                ?>

                <div class="posts_news">

                        <div class="posts_thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail('full'); ?>
                            </a>
                        </div>
                        <div class="posts_title">
                            <a class="blog-title" href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
                        </div>

                        <div class="posts_date">
                            <span class="post_date_media">
                              <?php echo get_post_meta(get_the_ID(), 'media', true); ?>
                            </span>
                            <?php the_time('d.m.Y'); ?>
                        </div>
                        <div class="posts_content">
                              <?php echo the_content(); ?>
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
