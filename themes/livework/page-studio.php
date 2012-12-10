<?php
/**
 * Template Name: Page - Studio Page
 * Description: Studio
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="page-<?php the_ID(); ?>" class="main">
					
					<div class="wrapper">
						<?php the_post_thumbnail('medium'); ?>
						<h1 class="page-title"><?php the_title(); ?></h1>
						
						<p class="studio-address"><?php the_field('studio_address'); ?></p>
						<p class="studio-telephone"><?php the_field('studio_telephone'); ?></p>
						<p class="studio-fax"><?php the_field('studio_fax'); ?></p>
						<p class="studio-email"><?php the_field('studio_email'); ?></p>
						<p class="studio-twitter"><?php the_field('studio_twitter'); ?></p>
						<p class="studio-facebook"><?php the_field('studio_facebook'); ?></p>
						<div class="studio-find-us"><?php the_field('studio_how_to_find_us'); ?>
					
					</div>
						
						
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
							<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
						</div><!-- .entry-content -->

					</div>

				</article><!-- #page-## -->

<?php endwhile; ?>

<?php wp_reset_postdata(); ?>


	<div class="latest-mini clearfix">
	
						 	<div class="wrapper">
	
								<h2><strong>Latest</strong> from <?php the_title(); ?></h2>
	
								<ul>
									<?php
									// The Query
									$studiocat = the_title();
									$args = array( 
														'category_nicename'=> $studiocat,
														'posts_per_page' => 8, 
														
														);
									$loop = new WP_Query( $args );
									while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<li>
										<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
										<?php 
										if(has_post_thumbnail()) :
											the_post_thumbnail('thumb-large'); 
										endif;?>
											<span><?php the_title();?> <span class="entry-date"><?php the_time('j/m/Y') ?></span></span>
										</a>
									</li>
									<?php endwhile;
									
									// Reset Post Data
									wp_reset_postdata(); ?>
									
								</ul>
	
							</div> <!-- /.wrapper -->
	
						</div> <!-- /.latest-mini -->
	

<?php get_sidebar(); ?>

<?php get_footer(); ?>