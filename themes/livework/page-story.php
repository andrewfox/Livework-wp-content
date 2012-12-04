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




				<div id="splash" class="main">
		
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					
					<?php the_post_thumbnail('full'); ?>
					
					<div id="introduction" class="alt">
						<div class="wrapper">
							<h4><?php the_title(); ?></h4>
							<h1><?php the_field('story_page_headline'); ?></h1>
							<div class="excerpt">
								<?php the_content(); ?>
							</div>
						</div><!-- /.wrapper -->
					</div><!-- /#introduction -->
					<?php endwhile; ?>
				</div>





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



				


				<article id="page-<?php the_ID(); ?>" class="main">
				
				
<!--INSERT FEATURED POSTS	-->	
							
							<div class="featured clearfix">
												 
							 	<div class="wrapper">
							 	
									<div class="featured_post">
										<h3 class="section-title">Quote</h3>
										<blockquote><?php the_field('featured_quote');?></blockquote>
										<p><?php the_field('featured_quote_attribution');?></p>
									</div>
				
									<?php $posts = get_field('featured_content');
				 					if( $posts ): ?>
			 						<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			 						<?php setup_postdata($post); ?>
			 						<div class="featured_post">
			 							<h3 class="section-title">
			 							<?php
			 							$theposttype = get_post_type( $post->ID );
			 							if ($theposttype == 'case_study') {
			 								echo 'Case study';
			 								$thumbnail = 'logo';
			 							} else if ($theposttype = 'people') {
			 								echo 'Liveworker';
			 								$thumbnail = 'featured';
			 							} else if ($theposttype = 'theme') {
			 								echo 'Theme';
			 								$thumbnail = 'featured';
			 							}
			 							?>
			 							</h3>
			 							<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark" class="feature-<?php echo $theposttype ?>">

		 								<?php if ($thumbnail == 'logo') { ?>
		 									<img src="<?php the_field('casestudies_logo'); ?>" alt="<?php the_title(); ?>" />
		 								<?php } else { 
		 									the_post_thumbnail('thumb-large');
		 								} ?>

		 								<?php if ($theposttype == 'people') { ?>
		 									<span><?php the_title(); ?></span>
		 								<?php } ?>

		 								</a>
			 						</div>
			 						<?php endforeach; ?>
				 					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				 				<?php endif; ?>
		
							 	</div> <!-- /.wrapper -->
							
							</div> <!-- /.feature-posts -->
							
							
							<!--END:INSERT FEATURED POSTS:END	-->

					<?php 
					 
					/*
					*  Loop through a Flexible Content field and display it's content with different views for different layouts
					*/
					 
					while(has_sub_field("story_sections")): ?>
					 
					<?php if(get_row_layout() == "story_section"): // layout: Content ?>
					 
					 <div class="story-section">
					 
					 	<div class="wrapper">

							<h2><?php the_sub_field("story_section_title"); ?></h2>
								
							<div class="story-section-content">
								<?php the_sub_field("story_section_bodytext"); ?>
							</div>
		
							<img src="<?php the_sub_field("story_section_image"); ?>" class="section-image"/>
		
							<?php $posts = get_sub_field('story_section_casestudies');
		 					if( $posts ): ?>
		 					<ul class="section-links clearfix">
		 						<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
		 						<?php setup_postdata($post); ?>
		 						<li>
		 							<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
		 								<span><?php the_title(); ?></span>
		 								<?php the_post_thumbnail('small'); ?>
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