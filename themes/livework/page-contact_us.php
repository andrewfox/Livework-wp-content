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
							
								<?php query_posts(array('showposts' => 4, 'post_parent' => 15, 'post_type' => 'page')); while (have_posts()) { the_post(); ?>
								
					
				
									<div class="wrapper">
										
										<h1 class="page-title"><?php the_title(); ?></h1>
										
										<p class="studio-address"><?php the_field('studio_address'); ?></p>
										<p class="studio-telephone"><?php the_field('studio_telephone'); ?></p>
										<p class="studio-fax"><?php the_field('studio_fax'); ?></p>
										<p class="studio-email"><?php the_field('studio_email'); ?></p>
										<p class="studio-twitter"><?php the_field('studio_twitter'); ?></p>
										<p class="studio-facebook"><?php the_field('studio_facebook'); ?></p>
									
									</div>
				
				
								</ul>
				
								<?php wp_reset_query();?>
						</div>


	

	<?php get_footer(); ?>