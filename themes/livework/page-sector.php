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

							
							<!--INSERT FEATURED POSTS	-->	
							
							<div class="featured clearfix">
												 
							 	<div class="wrapper">
							 	
									<div class="featured_post">
										<h3 class="section-title">Quote</h3>
										<blockquote><?php the_field('sector_page_quote');?></blockquote>
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
							
							<!--INSERT ALL LOGOS FOR SECTOR	-->	
							
							<div class="logos-list">
							
								<div class="wrapper">
								
									<h3 class="section-title">Some of our <?php the_title(); ?> clients</h3>
									
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
									if( get_field('casestudies_logo') ): ?>
										<img src="<?php the_field('casestudies_logo'); ?>" alt="<?php the_title(); ?>" /><?php
									endif;
									?>
									</a>
		
									<?php } else { ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_field('casestudies_one_liner'); ?> with <?php the_title(); ?>" rel="bookmark">
									<?php 
									if( get_field('casestudies_logo') ): ?>
										<img src="<?php the_field('casestudies_logo'); ?>" alt="<?php the_field('casestudies_one_liner'); ?> with <?php the_title(); ?>" /><?php
									endif;
									?>
									</a>
								
									<?php } ?>
								</li>
								
								
								<?php endwhile; ?>
								<?php wp_reset_postdata() ?>
												
							</ul>
							<!--END:INSERT ALL LOGOS FOR SECTOR:END	-->
					
						</div> <!-- /.wrapper -->
					
					</div> <!-- /.logos-list -->




					<!--INSERT SELECTED CASE STUDIES -->
				
					<div class="case-studies">
					<?php
					
		 				$posts = get_field('add_case_studies');
		 				 
		 				if( $posts ): ?>
		 					
			 					<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			 						<?php setup_postdata($post); ?>
										<div  <?php post_class('clearfix'); ?>>
											<div class="wrapper">
												<?php the_post_thumbnail('thumb-large'); ?>
												<div>
													<?php if( get_field('casestudies_one_liner') ): ?>
													<h2><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_field('casestudies_one_liner'); ?> <span>with <span><?php the_title(); ?></span></span></a></h2>
													<?php else : ?>
													<h2><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
													<?php endif; ?>

													<div>
				 									<?php the_excerpt() ?>
													</div>
				 								</div>

				 							</div>
			 							</div>
			 					<?php endforeach; ?>
		 					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		 				<?php endif; ?>
	 				</div> <!-- /.case-studies -->

	 				<!--END:INSERT SELECTED CASE STUDIES:END -->



	 			</article> <!-- /.main -->










	<?php get_footer(); ?>