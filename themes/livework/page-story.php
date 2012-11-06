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




				<div id="intro">
				
					<div id="top">

						<div class="no-bkg hat" ></div>

						<div class="no-bkg box" >
							<h3><?php the_title(); ?>: <span><?php the_field('page_title_suffix'); ?></span></h3>
							<h2><?php the_field('page_headline'); ?></h2>
							<p><?php the_content(); ?></p>
						</div>

					</div> <!-- /top -->

					<?php the_post_thumbnail('full'); ?>

				</div> <!-- /#intro -->



				<div id="hello" class="arrows">
				
				<?php
				$posts3 = get_field('previous_page');
				 
				if( $posts3 ): ?>
					<?php foreach( $posts3 as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>
					    	<a href="<?php the_permalink(); ?>"><img class="left-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/left-arrow.png" alt="go to previous page" /></a>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
				
				<?php
				$posts2 = get_field('next_page');
				 
				if( $posts2 ): ?>
					<?php foreach( $posts2 as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>
					    	<a href="<?php the_permalink(); ?>"><img class="right-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/right-arrow.png" alt="go to next page" /></a>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
				
				</div>







			
				<div id="more-info">
					<h2><a id = "more-infolink" href="#"><span class="ss-standard">arrow</span> More on <?php the_title(); ?></a></h2>
					<h1><?php the_field('page_title_suffix'); ?></h1>
				</div>


				<article id="page-<?php the_ID(); ?>" class="main">
				

					<?php 
					 
					/*
					*  Loop through a Flexible Content field and display it's content with different views for different layouts
					*/
					 
					while(has_sub_field("story_sections")): ?>
					 
						<?php if(get_row_layout() == "story_section"): // layout: Content ?>
					 
								 
							<div class="story-section">
							
													
								<h2><?php the_sub_field("section_title"); ?></h2>
							
								<div class="story-section-content">
								
									<?php the_sub_field("section_bodytext"); ?>
									<?php the_sub_field("section_layout"); ?>
	
								</div>
	
								<img src="<?php the_sub_field("section_image"); ?>"/>
	
								<?php
								
									
									 				 
					 				$posts = get_sub_field('add_mini_case_study');
					 				 
					 				if( $posts ): ?>
					 					<ul>
					 					<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
					 						<?php setup_postdata($post); ?>
					 					    <li>
					 					    	<h2><?php the_title(); ?></a>
					 					    	 <?php the_post_thumbnail('small'); ?>
					 					    	 
					 					    </li>
					 					<?php endforeach; ?>
					 					</ul>
					 					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					 				<?php endif; ?>
	
	
							</div>
					 
						<?php endif; ?>
					 
					<?php endwhile; ?>

	 			
	 			</article> <!-- /.main -->

	 			
	<?php get_footer(); ?>