<?php
/**
 * Template Name: Page - Sector Meta
 * Description: Our Client's Stories Sector page: fullscreen area, list of case studies and themes
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>


				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="splash alt <?php the_field('colour'); ?>">
					<div class="topimage"><?php the_post_thumbnail('large'); ?></div>
					<div id="introduction" class="alt">
						<div class="wrapper">
							<h1><?php the_title(); ?></h1>
							<div class="excerpt">
								<?php the_content() ?>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>

				<article id="page-<?php the_ID(); ?>" class="main">

<div class="wrapper">
	<div class="clearfix">
		<div class="list-of-pages">
			<h2>Sectors</h2>
			<?php 
			// Sidebar
			 get_sidebar('list-sectors'); 
			?>
		</div>
		
		<div class="list-of-pages">
			<h2>Themes</h2>
			<?php 
			// Sidebar
			 get_sidebar('list-themes'); 
			?>
		</div>
		
		<div class="list-of-pages">
			<h2>Latest Client Stories</h2>
			<?php 
			// Sidebar
			 get_sidebar('list-clients'); 
			?>
		</div>
	</div>
</div>
<?php 
				// Featured bar
//				get_sidebar('featuredbar'); 
				?>





				<?php 
				// Featured bar
//				get_sidebar('featuredbar'); 
				?>

				<?php 
				// Sectors + clients listings
				get_sidebar('sectorslogos'); 
				?>
				
				<?php 
				// Sectors + clients listings
				get_sidebar('sectorsclients'); 
				?>




	 			</article> <!-- /.main -->










	<?php get_footer(); ?>