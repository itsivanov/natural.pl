<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
				<div class="entry-content">

				<?php if ( have_posts() ) : ?>
					<header class="archive-header">
						<p class="rubric-title-upp"><?php printf( __( 'Category Archives: %s', 'twentythirteen' ), single_cat_title( '', false ) ); ?></p>

						<?php if ( category_description() ) : ?>
						<div class="archive-meta"><?php echo category_description(); ?></div>
						<?php endif; ?>
					</header><!-- .archive-header -->

					<?php while ( have_posts() )
					{
							the_post();
							get_template_part( 'content', get_post_format() );
					}

					twentythirteen_paging_nav();

							else :
								get_template_part( 'content', 'none' );
							endif;
					?>

			</div>
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
	get_sidebar();
	get_footer();
?>
