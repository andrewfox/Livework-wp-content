<?php
/**
 * Template Name: Page - Sector Meta
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




					<div class="wrapper">
											
											<ul class="sectors-list">
											<?php
											$sectors = get_terms( 'sectors', 'orderby=count&hide_empty=0' ); 
											foreach ($sectors as $sector) { 
												if ($sector->count > 0) { ?>
												<li><a href="<?php bloginfo('url'); ?>/our-clients-stories/<?php echo $sector->slug ?>"><?php echo $sector->name ?></a></li>
												<?php } ?>
											<?php } ?>
											</ul>
					
					
					
					</div><!-- /.wrapper -->




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