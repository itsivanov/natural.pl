<?php
/**
 * The template for displaying Tag pages
 *
 * Used to display archive-type pages for posts in a tag.
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
					<p class="rubric-title-upp">
						<?php printf( __( 'Tag Archives: %s', 'twentythirteen' ), single_tag_title( '', false ) ); ?>
					</p>

					<?php if ( tag_description() ) : // Show an optional tag description ?>
					<div class="archive-meta"><?php echo tag_description(); ?></div>
					<?php endif; ?>
				</header><!-- .archive-header -->

				<?php
				while ( have_posts() )
				{
					the_post();
					get_template_part( 'content', get_post_format() );
				}

				twentythirteen_paging_nav();
				?>

		<?php
			else :
					get_template_part( 'content', 'none' );
	 		endif;
		?>

			</div><!-- #content -->
		</div>
	</div><!-- #primary -->


	<!-- Tags -->
	<div class="tags">
			<?php
			if ( is_active_sidebar( 'tags' ) ) {
					dynamic_sidebar( 'tags' );
			}
			?>
	</div>


<?php
get_sidebar();
get_footer();
?>
