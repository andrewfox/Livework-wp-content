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
													<?php if ( in_category(10) && has_post_thumbnail() ) : // if is highlight and has featured image (post thumbnail) ?>
																		<?php $domsxe = simplexml_load_string(get_the_post_thumbnail());
																			$thumbnailsrc = $domsxe->attributes()->src; ?>
																		<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> style="background-image: url('<?php echo $thumbnailsrc ?>')">	
																		<?php else : ?>
																		<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
																		<?php endif; ?>
													
													
													
																			<div class="wrapper clearfix">
													
																				<?php if ((get_post_type( $post->ID ) == "case_study")) : ?>
																				<h4 class="section-title">Client story</h4>
																				<?php elseif (in_category(191)) : ?>
																				<h4 class="section-title">Theme/Article</h4>
																				<?php else : ?>
																				<h4 class="section-title">News</h4>
																				<?php endif; ?>
																				
																				<?php if ((get_post_type( $post->ID ) == "case_study")) : // if case study ?>
													
																					<?php if( get_field('casestudies_one_liner') ): // with one liner intro ?>
													
																				<h2><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_field('casestudies_one_liner'); ?> <span class="casestudy-title">with <span><?php the_title(); ?></span></span></a></h2>
													
																					<?php else : // with no one liner ?>
													
																				<h2><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
													
																					<?php endif; ?>
													
																				<?php else : // regular blog/article ?>
													
																				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?> <span class="entry-date"><?php the_time('j/m/Y') ?></span></a></h2>
													
																				<?php endif; ?>
													
													
																				<?php if ( has_post_thumbnail()) : ?>
																					<?php if ( in_category(10) ) : // don't show if highlight cat ?>
																					<?php else : ?>
																				<div class="post-image blog-image"><?php the_post_thumbnail('large');?></div>
																					<?php endif; ?>
																				<?php endif; ?>
													
													
													
																				<div class="entry-content">
																					<?php the_excerpt(); ?>
																					<p class="read-more"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">Read more &rarr;</a></p>
																				</div>
													
													
													
																				<div class="entry-data">
																					<?php
																					$authorid = get_the_author_meta('ID');
																					$args = array( 
																						'author'=> $authorid,
																						'post_type' => 'people', 
																						'posts_per_page' => 1, 
																					);
																					$loop = new WP_Query( $args );
																					while ( $loop->have_posts() ) : $loop->the_post(); 
																					?>
																					<a href="<?php the_permalink() ?>" rel="bookmark" title="Find out more about <?php the_title(); ?>">
																						<?php the_post_thumbnail('thumbnail'); ?>
																						<span>By <?php the_title(); ?></span>
																					</a>
																					<?php endwhile; ?>
																					<?php wp_reset_query();?>
																				</div>
													
													
													
																			</div><!-- /.wrapper -->
													
																		</div><!-- /.post -->
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