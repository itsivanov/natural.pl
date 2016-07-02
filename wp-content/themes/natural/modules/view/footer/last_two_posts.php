<div class="textwidget">
    <?php
    $args = array(
      'post_type' => 'post',
      'orderby' => 'DESC',
      'posts_per_page' => 2,
      'cat' => 8
    );

    $custom_query = new WP_Query( $args );

    while($custom_query->have_posts()) :
       $custom_query->the_post();
    ?>
        <div class="last_2_post_co_novego">
            <p class="footer-bottom_title">
              <?php the_title(); ?>
            </p>
           
            <?php echo the_content(''); ?>
            
            <a href="<?php the_permalink(); ?>">(Czytaj więcej)</a>
            
        </div>

     <?php endwhile; ?>
  </div>
