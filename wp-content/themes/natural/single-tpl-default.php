<?php while ( have_posts() ) : the_post(); ?>

    <div class="entry-summary">
        <p class="rubric-title-upp search_title"><?php echo the_title(); ?></p>

        <div class="single_default_content">
        <?php the_content(); ?>
        </div>
    </div>

<?php endwhile; ?>
