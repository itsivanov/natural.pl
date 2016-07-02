<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ( is_single() ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php else : ?>
		<h1 class="entry-title">
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		</h1>
		<?php endif; // is_single() ?>


		<div class="entry-meta">
			<?php
			twentythirteen_entry_meta();
			edit_post_link( __( 'Edit', 'twentythirteen' ), '<span class="edit-link">', '</span>' );
			?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>

					<?php $my_excerpt = get_the_excerpt();
					if (!empty($my_excerpt)):?>
					<div class="entry-summary">
							<p class="rubric-title-upp search_title"><?php echo the_title(); ?></p>
							<?php the_excerpt(); ?>
					</div><!-- .entry-summary -->

					<!-- < Url for comments or posts -->
					<?php
					if (!preg_match("/comments/", get_the_permalink()))
						  $link = '';
					else
							$link = '87';
					?>
					<a href="<?php echo get_the_permalink($link); ?>" class="more-1">CZYTAJ WIĘCEJ &gt;</a>
					<!-- > -->

					<?php endif;?>

		<?php else : ?>
		<div class="entry-content">

				<?php if(preg_match("/category/", $_SERVER['REQUEST_URI'])
							|| preg_match("/tag/", $_SERVER['REQUEST_URI'])) : ?>

						<div class="entry-summary">
								<p class="rubric-title-upp search_title"><?php echo the_title(); ?></p>
								<?php the_excerpt(); ?>
						</div>
						<a href="<?php echo get_the_permalink($link); ?>" class="more-1">CZYTAJ WIĘCEJ &gt;</a>

				<?php
				else :
							/* translators: %s: Name of current post */
							the_content( sprintf(
								__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'twentythirteen' ),
								the_title( '<span class="screen-reader-text">', '</span>', false )
							) );

							wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) );

				endif;
				?>

		</div><!-- .entry-content -->

	<?php endif; ?>

	<footer class="entry-meta">

		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() )
		{
			get_template_part( 'author-bio' );
		}
		?>

	</footer>

</article><!-- #post -->
