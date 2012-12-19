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


				<div class="splash alt <?php the_field('colour');?>">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div class="topimage"><?php the_post_thumbnail('large'); ?></div>
					<div id="introduction">
						<div class="wrapper">
							<h1 class="section-title"><?php the_title(); ?></h1>
							<h2><?php the_field('story_page_headline'); ?></h2>
							<div class="excerpt">
								<?php the_content(); ?>
							</div>
						</div><!-- /.wrapper -->
					</div><!-- /#introduction -->
					<?php endwhile; ?>
				</div>








				


				<article id="page-<?php the_ID(); ?>" class="main">



<?php 
// Featured bar
get_sidebar('featuredbar'); 
?>




					<?php 
					 
					/*
					*  Loop through a Flexible Content field and display it's content with different views for different layouts
					*/
					 
					while(has_sub_field("story_sections")): ?>
					 
					<?php if(get_row_layout() == "story_section"): // layout: Content ?>
					 
					<?php if (get_sub_field("story_section_image")) : ?>

					<div class="story-section" style="background-image: url('<?php the_sub_field("story_section_image"); ?>')">
					
					<?php else : ?>
					
					<div class="story-section">
					
					<?php endif; ?>
					 
					 	<div class="wrapper clearfix">
					 		
					 		<?php /*
if (get_sub_field("story_section_image")) : 
						 		$attachment_id = get_sub_field("story_section_image");
						 		$size = "medium"; // (thumbnail, medium, large, full or custom size)
						 		wp_get_attachment_image( $attachment_id, $size );
						 		the_sub_field("story_section_image");
						 		echo ' '.$attachment_id;
					 		endif; 
*/?>

							<h2><?php the_sub_field("story_section_title"); ?></h2>
								
							<div class="story-section-content">
								<?php the_sub_field("story_section_bodytext"); ?>
							</div>
		
							
		
							<?php $posts = get_sub_field('story_section_casestudies');
		 					if( $posts ): ?>
		 					<ul class="section-links clearfix">
		 						<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
		 						<?php setup_postdata($post); ?>
		 						<li>
		 							<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
		 								<?php the_title(); ?>
		 							</a>
		 						</li>
		 						<?php endforeach; ?>
		 					</ul>
		 					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		 				<?php endif; ?>

					 	</div>

					</div> <!-- /.story-section -->


					<?php endif; ?>

					<?php endwhile; ?>

				
				</article> <!-- /.main -->

	 			
	<?php get_footer(); ?>