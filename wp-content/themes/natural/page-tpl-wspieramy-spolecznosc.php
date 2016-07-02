<?php
/*
Template Name:  Wspieramy spolecznosc
*/

get_header();

    ?>

    <div class="entry-content">
        <?php
        $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;

        $args = array(
           'posts_per_page' => 1,
           'paged' => $paged,
           'category_name' => 'Wspieramy-spolecznosc'
        );

        $custom_query = new WP_Query( $args );

        while($custom_query->have_posts()) :
           $custom_query->the_post();
        ?>

        <div class="posts_containers">

                <div class="posts_content2">
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
