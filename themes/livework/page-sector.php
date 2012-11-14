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



				
				<div id="splash">
				
					<div id="top">

						<div class="no-bkg hat" ></div>

						<div class="no-bkg box" >
							<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
							<h3><?php the_title(); ?>: <span><?php the_field('page_title_suffix'); ?></span></h3>
							<h2><?php the_field('page_headline'); ?></h2>
							<div class="entry-content">
								<?php the_content(); ?>
							</div>
							<?php endwhile; ?>
						</div>

					</div> <!-- /#top -->

					<?php the_post_thumbnail('large'); ?>

				</div> <!-- /#splash -->



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
					<h2><a id = "more-infolink" href="#"><span class="ss-icon">down</span> More on <?php the_title(); ?></a></h2>
					<h1><?php the_title(); ?>: <span><?php the_field('page_title_suffix'); ?></span></h1>
				</div>


				<article id="page-<?php the_ID(); ?>" class="main">
				
					<div id="case-studies">
					<?php
					
										 				$posts = get_field('add_case_studies');
										 				 
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
	 			</article> <!-- /.main -->
	 			
	 			
	 			
	 		
	 			
	 			
	 			
	 			

	 			
	<?php get_footer(); ?>