<?php
/**
 * Template Name: Page - Contact us
 * Description: Contact us
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
	
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article id="page-<?php the_ID(); ?>" class="main clearfix">
		
		<div class="wrapper">
			<h1 class="page-title"><?php the_title(); ?></h1>
			<?php the_post_thumbnail('large'); ?>
			<div class="entry-content">
		<?php the_content(); ?>
		</div><!-- .entry-content -->
		
		</div>
<?php endwhile; ?>
		
								<div class="wrapper">
			
				<?php query_posts(array('showposts' => 4, 'post_parent' => 15, 'post_type' => 'page', 'order' => 'asc', )); while (have_posts()) { the_post(); ?>
				
						
						<h2><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php the_post_thumbnail('thumb-large');  ?>
						<p class="studio-address"><?php the_field('studio_address'); ?></p>
						<p class="studio-telephone"><?php the_field('studio_telephone'); ?></p>
						<p class="studio-fax"><?php the_field('studio_fax'); ?></p>
						<p class="studio-email"><?php the_field('studio_email'); ?></p>
						<p class="studio-twitter"><?php the_field('studio_twitter'); ?></p>
						<p class="studio-facebook"><?php the_field('studio_facebook'); ?></p>
					


				<?php } ?>
		</div>
	</div>
		
</article><!-- #page-## -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>