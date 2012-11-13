<?php
/**
 * Template Name: Page - Sector Page
 * Description: Our Client's Stories Sector page: fullscreen area, list of case studies and themes
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
				<h3><?php the_title(); ?>: <span><?php the_field('page_title_suffix'); ?></span></h3>
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
	
	
	<!-- ===================================== -->
	<!-- ! The main content area starts here   2-->
	<!-- ===================================== -->
	


		<div class="inner">
	
			
			
			<!-- ======================================== -->
			<!-- ! A nice list with some of our clients   -->
			<!-- ======================================== -->
			
				<div id="more-info">
					<h2><a id = "more-infolink" href="#"><span class="ss-standard">arrow</span> More on <?php the_title(); ?></a></h2>
					<h1><?php the_field('page_title_suffix'); ?></h1>
				</div>
			
			
			
			
			<!-- ================================================================================= -->
			<!-- ! Here starts the feed list (blog posts, twitter, etc.), but first, our Contact   -->
			<!-- ================================================================================= -->
			
			<div id="more">
				
				<div id="content">
								
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


	<!-- 				START add case studies-->
	 				
	 				<?php
	 				 
	 				$posts = get_field('insert_case_study');
	 				 
	 				if( $posts ): ?>
	 					<ul>
	 					<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
	 						<?php setup_postdata($post); ?>
	 					    <li>
	 					    	<h2><?php the_title(); ?></a>
	 					    	<p><?php the_excerpt(); ?></p>
	 					    	 <?php the_post_thumbnail('small'); ?>
	 					    	 
	 					    	<!--<span>Post Object Custom Field: <?php the_field('extra_field'); ?></span>-->
	 					    </li>
	 					<?php endforeach; ?>
	 					</ul>
	 					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
	 				<?php endif; ?>
	 				

	<!-- 				END add case studies-->

	 			
	 			</div>

		</div><!-- #content -->
	</div><!-- #primary -->
	<?php get_footer(); ?>