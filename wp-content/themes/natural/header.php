<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) & !(IE 8)]><!-->
<html id="logoTop" <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/png">

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" type="image/png">
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/fonts.css" />
		<!--<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/fonts-secondary.css" />-->
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.fancybox.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/select2.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/jquery.bxslider.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/owl.carousel.css" />

		<!--[if lt IE 9]>
		<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
		<![endif]-->

		<?php wp_head(); ?>

</head>

<body  <?php body_class(); ?> >
	<input id="hidden_id_posts" type="hidden" value="<?php echo get_the_ID(); ?>" />

		<div class="min_menu-cont">
		   	<div class="min_menu-img"></div>
	  		<div class="min_menu-wrapper">
	  			<div class="min_menu-header"></div>
	  		</div>

	    </div>

	<div id="page" class="hfeed site">
			<div class="wrapper">
					<header id="header">
							<div class="page-wrapper">
									<!-- Logo -->
									<div class="logo">
											<a href="/">
													<?php
													if ( is_active_sidebar( 'logo' ) )
															dynamic_sidebar( 'logo' );
													?>
											</a>
									</div>

									<!-- Menu -->
									<div class="header-menu">
									<?php wp_nav_menu( array('menu' => 'Main menu', 'menu_class' => 'main_manu' )); ?>
									</div>

									<!-- Search -->
									<div class="header-search-cart">
										<div class="header-search">
											<?php get_search_form(); ?>
											<button class="btn-search"></button>
										</div>
										<!-- Button e-shop -->
										<a id="e-shop" href="#">E-Shop</a>
									</div>

									<!-- Mobile menu -->


							</div>
					</header>

					<!-- < Additionaly menu -->
					<?php require_once('modules/view/header/additionaly_menu.php'); ?>

			</div>

			<div id="main" class="site-main">

				<?php if($_SERVER['REQUEST_URI'] == '/') : ?>

						<div style="background: url(<?php echo get_template_directory_uri(); ?>/images/background-image.jpg)" class="background_home">
							<div class="page-wrapper">
									<?php
									if ( is_active_sidebar( 'text_home_front' ) )
											dynamic_sidebar( 'text_home_front' );
									?>
							</div>
						</div>

						<div class="under_background_title">
							<div class="page-wrapper">
									<?php
									if ( is_active_sidebar( 'text_home' ) )
											dynamic_sidebar( 'text_home' );
									?>
							</div>
						</div>

				<?php else :

						if(!is_page(142)) : ?>
								<div class="breadcrumbs">
										<?php require_once('modules/view/header/view_breadcrumbs.php'); ?>
								</div>
						<?php endif;

				endif; ?>
