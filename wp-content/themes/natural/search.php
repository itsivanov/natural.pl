<?php
/**
 * The template for displaying Search Results pages
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

			<header class="page-header">
				<p class="rubric-title-upp"><?php printf( __( 'Search Results for: %s', 'twentythirteen' ), get_search_query() ); ?></p>
			</header>

			<?php
			while ( have_posts() )
			{
					the_post();
					get_template_part( 'content', get_post_format() );
			}
			?>

		<?php
			else :
				get_template_part( 'content', 'none' );
			endif;
		?>

			</div><!-- #content -->
		</div><!-- #content -->
	</div><!-- #primary -->

<?php
	get_sidebar();
	get_footer();
?>
