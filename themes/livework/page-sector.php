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
	
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php the_post_thumbnail('large'); ?>
					<div id="introduction" >
						<div class="wrapper">
							<h4><a href="<?php echo get_page_link(9); ?>">Our Client's Stories</a></h4>
							<h1><?php the_title(); ?></h1>
							<div class="excerpt">
								<?php the_content() ?>
							</div>
						</div>
					</div>
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
					<p><?php the_field('sector_page_quote');?></p>
					
					
					
					<div class="logos-list">
					
						<div class="wrapper">
						
							<!--INSERT ALL LOGOS FOR SECTOR	-->	
							<ul class="logos">
							
							<?php $thissector = $post->post_name ?>
							
							<?php 
							
							$args = array(
							    'post_type'=> 'case_study',
							    'taxonomy' => 'sectors',
							    'term' => $thissector,
						
							    );              
							
							$the_query = new WP_Query( $args );
							while ( $the_query->have_posts() ) : $the_query->the_post(); 
						
							
							?>
								<li>
									<?php if ( in_category('logo-only-case-study') ) { ?>
									<?php 
									if( get_field('casestudies_logo') ):
										?><img src="<?php the_field('casestudies_logo'); ?>" alt="" /><?php
									endif;
									?>
									</a>
		
									<?php } else { ?>
									<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
									<?php 
									if( get_field('casestudies_logo') ):
										?><img src="<?php the_field('casestudies_logo'); ?>" alt="" /><?php
									endif;
									?>
									</a>
								
									<?php } ?>
								</li>
								
								
								<?php endwhile; ?>
								<?php wp_reset_postdata() ?>
												
							</ul>
							<!--END:INSERT ALL LOGOS FOR SECTOR:END	-->
					
						</div>
					
					</div>
					
					<!--INSERT SELECTED CASE STUDIES -->
				
					<div class="case-studies">
					<?php
					
		 				$posts = get_field('add_case_studies');
		 				 
		 				if( $posts ): ?>
		 					
<!--			 					<ul class="section-links clearfix">-->
			 					<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			 						<?php setup_postdata($post); ?>
<!--			 						<li class="sector-page">-->
										<div class="post">
											<div class="wrapper">
				 							<h2><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
				 								<?php the_field('casestudies_one_liner'); ?> with <span><?php the_title(); ?></span></h2>
				 							<div class="excerpt">
				 								
				 							</div>
				 								<?php the_post_thumbnail('medium'); ?>
				 								</a>
				 								<div>
				 									<?php the_excerpt() ?>
				 								</div>
				 							</div>
			 							</div>
			 					<?php endforeach; ?>
			 				</div>
		 					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		 				<?php endif; ?>
	 				</div>
	 				
	 				<!--END:INSERT SELECTED CASE STUDIES:END -->
	 			</article> <!-- /.main -->
	 			
	 			
	 			
	 		
	 			
	 			
	 			
	 			

	 			
	<?php get_footer(); ?>