<?php
/*
Template Name: Więcej przepisów
*/

get_header();

    ?>

    <div class="entry-content">
    <?php
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

    $args = array(
       'posts_per_page' => 4,
       'paged' => $paged,
       'post_type' => 'recipes',
    );

    $custom_query = new WP_Query( $args );

    echo '<div class="post_4-wrapper post_4-wrapper-marg">';
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
                  <?php the_time('d. F Y'); ?>
              </div>

              <div class="posts_content">
                    <?php echo the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="more-link">CZYTAJ WIĘCEJ &gt;</a>
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
    </div>


<?php get_footer(); ?>
