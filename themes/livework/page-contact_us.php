<?php
/**
 * Template Name: Page - Contact us
 * Description: Contact us
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>




	
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php the_post_thumbnail('large'); ?>
						<div class="wrapper">
							
								<?php query_posts(array('showposts' => 20, 'post_parent' => 15, 'post_type' => 'page')); while (have_posts()) { the_post(); ?>
								
					
				
									<div class="wrapper">
										
										<h1 class="page-title"><?php the_title(); ?></h1>
										
										<p class="studio-address"><?php the_field('studio_address'); ?></p>
										<p class="studio-telephone"><?php the_field('studio_telephone'); ?></p>
										<p class="studio-fax"><?php the_field('studio_fax'); ?></p>
										<p class="studio-email"><?php the_field('studio_email'); ?></p>
										<p class="studio-twitter"><?php the_field('studio_twitter'); ?></p>
										<p class="studio-facebook"><?php the_field('studio_facebook'); ?></p>
									
									</div>
				
									<?php endwhile; ?>
				
								</ul>
				
								<?php wp_reset_query();?>
						</div>
					<?php endwhile; ?>


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





	<?php get_footer(); ?>