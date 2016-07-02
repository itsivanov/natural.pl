<?php
/**
 * The template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

get_header(); ?>

<input id="hidden_title_posts" type="hidden" value="<?php echo get_the_title(); ?>" />

	<div id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
 			<div class="single-wrap">

					<?php
					$array_post_type = array('recipes', 'product');

					if(in_array(get_post_type(), $array_post_type))
							require('single-tpl-' . get_post_type() . '.php');
					else
							require('single-tpl-default.php');
					?>

		</div>
	</div>

<?php
get_sidebar();
get_footer();
?>
