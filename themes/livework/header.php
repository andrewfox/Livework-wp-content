<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie6 lte7 lte8 lte9"><![endif]-->
<!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie ie7 lte7 lte8 lte9"><![endif]-->
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8 lte8 lte9"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9 lte9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php
			/*
			 * Print the <title> tag based on what is being viewed.
			 * We filter the output of wp_title() a bit -- see
			 * boilerplate_filter_wp_title() in functions.php.
			 */
			wp_title( '|', true, 'right' );
		?></title>

		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="stylesheet" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/all.css" />
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/medium.css" media="only screen and (min-width:600px)">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/large.css" media="only screen and (min-width:1100px)">
		<link rel="stylesheet" href="<?php bloginfo( 'template_directory' ); ?>/css/jquery.lightbox-0.5.css" />

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<!-- Scripts: Jquery, Modernizr, Main (custom) -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script>window.jQuery || document.write('<script src="<?php bloginfo( 'template_directory' ); ?>/js/vendor/jquery-1.8.2.min.js"><\/script>')</script>
		<script src="<?php bloginfo('template_directory'); ?>/js/vendor/modernizr-2.6.2.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/vendor/respond.min.js"></script>
		<script src="<?php bloginfo('template_directory'); ?>/js/vendor/jquery.lightbox-0.5.min.js"></script>
		<script src="<?php bloginfo( 'template_directory' ); ?>/js/main.js"></script>

		<!-- Fontscom -->
		<script type="text/javascript" src="http://fast.fonts.com/jsapi/0fd39f14-ee12-405d-90c4-2bbbdae75f52.js"></script>

		<!-- Symbolset social -->
		<link href="<?php bloginfo('template_directory'); ?>/webfonts/ss-social.css" rel="stylesheet" />
		<link href="<?php bloginfo('template_directory'); ?>/webfonts/ss-standard.css" rel="stylesheet" />

		<?php wp_head(); ?>

	</head>



	<body <?php body_class(); ?>>
		<header role="banner">
			
			<nav id="access" role="navigation">

				<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php bloginfo( 'template_directory' ); ?>/img/livework-logox2.png" alt="<?php bloginfo( 'name' ); ?>"/></a></h1>

				<?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<a id="skip" href="#content" title="<?php esc_attr_e( 'Skip to content', 'livework' ); ?>"><?php _e( 'Skip to content', 'livework' ); ?></a>

				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<button class="menu-reveal"><span>rows</span> Menu</button>
				<?php wp_nav_menu( array( 'container' => '', 'theme_location' => 'primary' ) ); ?>
				<?php wp_nav_menu( array('menu' => 'Countries', 'container' => '' )); ?>

			</nav><!-- #access -->
			
			<?php 
			// Our Story menu
			if (is_tree(7)) { 
			?>
			<nav id="menu-secondary" class="nav-our-story clearfix">
				<?php wp_nav_menu( array('menu' => 'Our Story', 'container' => '' )); ?>
			</nav>
			<?php } ?>
			
			<?php 
			// Our Client's Stories Themes menu
			if (is_tree(2500)) { 
			?>
			<nav id="menu-secondary" class="nav-sectors clearfix">
				<?php wp_nav_menu( array('menu' => 'Themes', 'container' => '' )); ?>
			</nav>
			<?php } ?> 
			
			<?php 
			// Our Client's Stories Sector menu
			if (is_tree(9)) { 
			?>
			<nav id="menu-secondary" class="nav-sectors clearfix">
				<?php wp_nav_menu( array('menu' => 'Sectors', 'container' => '' )); ?>
			</nav>
			<?php } 
			
			// Our Client's Stories Sector menu on single case study pages
			if (get_post_type( $post->ID ) == "case_study") {
				if (is_single($post)) {
					?>
					<nav id="menu-secondary" class="nav-sectors clearfix">
						<?php wp_nav_menu( array('menu' => 'Sectors', 'container' => '' )); ?>
					</nav>
					<?php 
				}
				else {
				
				}
			}
				?>
			
			


		</header>

		<section id="content" role="main">
