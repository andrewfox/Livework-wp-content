<?php
/**
 * Template Name: Page - New Story Page
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
							<h1 class="tab"><?php the_title(); ?></h1>
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
						<div class="wrapper">
							<h2 class="section-title">What we've been up to in <span><?php the_title() ?></span></h2>
						</div>
					<?php
					
		 				$posts = get_field('add_case_studies');
		 				 
		 				if( $posts ): ?>
		 						 					
			 					<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			 						<?php setup_postdata($post); ?>
										<div  <?php post_class('clearfix'); ?>>
											<div class="wrapper">
												<div class="case-studies-image">
													<?php the_post_thumbnail('thumb-large'); ?>
												</div>
												<div class="case-studies-content">
													
													<?php if ((get_post_type( $post->ID ) == "case_study")) : ?>
													<h4 class="tab">Client story</h4>
													<?php elseif (in_category(199)) : ?>
													<h4 class="tab">Point of view</h4>
													<?php else : ?>
													<h4 class="tab">News</h4>
													<?php endif; ?>
													
													<?php if( get_field('casestudies_one_liner') ): ?>
													<h2>
														<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
															<?php the_field('casestudies_one_liner'); ?> <span class="casestudy-title">with <span><?php the_title(); ?></span></span>
														</a>
													</h2>
													<?php else : ?>
													<h2>
														<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a>
													</h2>
													<?php endif; ?>
	
													<div>
				 										<?php the_excerpt() ?>
														<p class="read-more"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'livework'), the_title_attribute('echo=0') ); ?>" rel="bookmark">Read more &rarr;</a></p>

													</div>

				 								</div>
	
				 							</div> <!-- /.wrapper -->
			 							</div>
			 					<?php endforeach; ?>
		 					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		 				<?php endif; ?>
	 				</div> <!-- /.case-studies -->
		 				
	 				<!--END:INSERT SELECTED CASE STUDIES:END -->



	 			</article> <!-- /.main -->










	<?php get_footer(); ?>