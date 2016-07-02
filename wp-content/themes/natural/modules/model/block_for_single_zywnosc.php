<?php  function przepizy() {

    $args = array(
       'posts_per_page' => 4,
       'post_type' => 'recipes',
    );

    $custom_query = new WP_Query( $args ); ?>

    <div class="entry-content">
      <div class="post_4-wrapper">

          <div class="title_for_powiazane_setykyly">
              Przepizy
              <a href="<?php the_permalink(811); ?>">Więcej przepisów</a>
          </div>

          <div class="post-wrappers">
        <?php  while($custom_query->have_posts()) :
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
                  <?php /*
                  <div class="posts_date">
                      <?php the_time('d. F Y'); ?>
                  </div>
                  */ ?>
                  <div class="posts_content">
                        <?php //echo the_content(); ?>
                        <a href="<?php the_permalink(); ?>" class="more-link">CZYTAJ WIĘCEJ &gt;</a>
                  </div>

          </div>

           <?php endwhile; ?>
           </div>

      </div>
    </div>

<?php } ?>



<?php function powiazaneSetykyly() { ?>

  <div class="title_for_powiazane_setykyly">
      Powiązane artykuły
      <a href="<?php the_permalink(769); ?>">Więcej artykułów</a>
  </div>

  <div class="page-wrapper new_4_posts post-wrappers">
      <?php

      $args = array(
         'posts_per_page' => 4,
         'post_type' => 'productsfood',
      );

      $custom_query = new WP_Query( $args );
      $num = 1;

      while($custom_query->have_posts()) :
         $custom_query->the_post();
      ?>

      <div class="new_post_<?php echo $num; ?>">

          <?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
              <?php the_post_thumbnail(); ?>
          <?php endif; ?>
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <?php the_content(); ?>

      </div>

       <?php $num++; endwhile; ?>
  </div>

<?php } ?>
