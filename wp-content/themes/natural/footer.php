<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

		</div><!-- #main -->

			<footer id="colophon" class="site-footer" role="contentinfo">
					<div class="page-wrapper">

						<a href="#logoTop" class="ancLinks">Powrót <br> na górę</a>

						<div class="footer_left">
							<button class="footer-menu_mob"></button>
								<?php
								if ( is_active_sidebar( 'footer_left' ) ) {
										dynamic_sidebar( 'footer_left' );
								}
								?>
						</div>

						<div class="footer_center">
								<div class="footer_center_top">
									<?php
									if ( is_active_sidebar( 'footer_center_top' ) ) {
											dynamic_sidebar( 'footer_center_top' );
									}
									?>
								</div>

								<div class="footer_center_bottom">

										<?php
										if ( is_active_sidebar( 'footer_center_bottom' ) ) {
												dynamic_sidebar( 'footer_center_bottom' );
										}

										// Last 2 post category co novego
										require_once('modules/view/footer/last_two_posts.php');
										?>

								</div>
						</div>

						<div class="footer_right">
								<?php
								if ( is_active_sidebar( 'footer_right' ) ) {
										dynamic_sidebar( 'footer_right' );
								}
								?>
						</div>

					</div>
			</footer><!-- #colophon -->

			<!-- Text under footer -->
			<div class="footer_bottom">
				<div class="page-wrapper">
					<?php
					if ( is_active_sidebar( 'text_under_footer' ) ) {
							dynamic_sidebar( 'text_under_footer' );
					}
					?>
				</div>
			</div>

		</div>
	</div>


	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery-1.8.2.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/select2.min.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/iscroll.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/maps.js"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/es5-shims.min.js" charset="utf-8"></script>
	<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/share.js" charset="utf-8"></script>

	<?php wp_footer(); ?>


</body>
</html>
