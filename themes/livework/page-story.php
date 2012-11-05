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



				
<div id="bkg">
		<div id="top">
		
				
				<div class="no-bkg hat" >
					
				</div>
				
				
			<div class="no-bkg box" >
				<h3><?php wp_title(":",true, 'right'); ?> <span><?php the_field('page_title_suffix'); ?></span></h3>
				<h2><?php the_field('page_headline'); ?></h2>
				<p><?php the_content(); ?></p>
			</div>
		
		</div> <!-- /top -->
	
		
			<?php the_post_thumbnail('full'); ?>


</div> <!-- /bkg -->

<div id="hello"class="arrows">
	<a href="#"><img class="left-arrow" src="http://dominicburton.co.uk/lw-test/wp-content/uploads/2012/10/left-arrow.png" alt="go to previous page" /></a>
	<a href="index2.html"><img class="right-arrow" src="http://dominicburton.co.uk/lw-test/wp-content/uploads/2012/10/right-arrow.png" alt="go to next page" /></a>
</div>


<!-- ============================================================ -->
<!-- ! Everything bellow this line shouldn't be visible on load   -->
<!-- ============================================================ -->
	
	<div id="content">
	
	<!-- ===================================== -->
	<!-- ! The main content area starts here   2-->
	<!-- ===================================== -->
	


		<div class="inner">
	
			
			
			<!-- ======================================== -->
			<!-- ! A nice list with some of our clients   -->
			<!-- ======================================== -->
			
				<div id="more-info">
					<h2><a id = "story-section-contentlink" href="#">⬇ More on <?php wp_title("",true); ?></a></h2>
				</div>
			
			
			
			
			<!-- ================================================================================= -->
			<!-- ! Here starts the feed list (blog posts, twitter, etc.), but first, our Contact   -->
			<!-- ================================================================================= -->
			
			<div id="more">
				
				
				
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