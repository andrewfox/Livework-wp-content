<?php
/**
 * Template Name: Page - Story Page
 * Description: Our Story: fullscreen area, plus extras
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				 	<h3><?php wp_title(":",true, 'right'); ?> <span><?php the_field('page_title_suffix'); ?></span></h3>
 					<h2><?php the_field('page_headline'); ?></h2>
 					<div class="entry-content">
 						<?php the_content(); ?>
 					</div>
				</article><!-- #post-## -->
				
<?php endwhile; ?>


				<?php 
				 
				/*
				*  Loop through a Flexible Content field and display it's content with different views for different layouts
				*/
				 
				while(has_sub_field("story_sections")): ?>
				 
					<?php if(get_row_layout() == "story_section"): // layout: Content ?>
				 
						<div class="story-section">
							
							<hr>
						
							<h2><?php the_sub_field("section_title"); ?></h2>
						
							<div class="story-section-content">
								<?php the_sub_field("section_bodytext"); ?>
							</div>

							<img src="<?php the_sub_field("section_image"); ?>"/>

						</div>
				 
					<?php endif; ?>
				 
				<?php endwhile; ?>


<?php get_sidebar(); ?>
<?php get_footer(); ?>