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


				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="splash alt <?php the_field('colour'); ?>">
					<div class="topimage"><?php the_post_thumbnail('large'); ?></div>
					<div id="introduction" class="alt">
						<div class="wrapper">
							<h1><?php the_title(); ?></h1>
							<div class="excerpt">
								<?php the_content() ?>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>

				<article id="page-<?php the_ID(); ?>" class="main">




<?php 
// Featured bar
get_sidebar('featuredbar'); 
?>




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
													<h2><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_field('casestudies_one_liner'); ?> <span class="casestudy-title">with <span><?php the_title(); ?></span></span></a></h2>
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




					<!--INSERT ALL LOGOS FOR SECTOR	-->	
					
					<div class="logos-list clearfix">
					
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




	 			</article> <!-- /.main -->










	<?php get_footer(); ?>