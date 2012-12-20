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
		<?php $studiocat = $post->post_name?>
		<div class="splash highlight">
			<div class="topimage"><?php the_post_thumbnail('large'); ?></div>
			<div id="introduction" >
				<div class="wrapper">
					<h4><a href="<?php bloginfo('url'); ?>/contact-us">Studio</a></h4>
					<h1><?php the_title(); ?> </h1>
				</div>
			</div>
		</div>
		

		




				<article id="page-<?php the_ID(); ?>" class="main clearfix">
					
					<div class="wrapper">
					
						<div id="main" class="clearfix">
							
							<div class="entry-content">
					
								<aside class="entry-data"> 
					
									<div class="vcard">
										
										<p class="studio-address"><?php the_field('studio_address'); ?></p>
										<p class="tel"><span>t</span><?php the_field('studio_telephone'); ?></p>
										<p class="fax"><span>f</span><?php the_field('studio_fax'); ?></p>
										<p class="email"><span>e</span><?php the_field('studio_email'); ?></p>
										<p class="studio-twitter"><?php the_field('studio_twitter'); ?></p>
										<p class="studio-facebook"><?php the_field('studio_facebook'); ?></p>
										
									</div>
					
					
								</aside>
								
									<?php the_content(); ?>
									<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
									<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
								
								<div class="studio-find-us"><?php the_field('studio_how_to_find_us'); ?>
					
							</div> <!-- /.entry-content -->
					
						</div> <!-- /#main -->
					
					
					</div><!-- /.wrapper -->
					
						
						
						
					
						
						
					


				</article><!-- #page-## -->

<?php endwhile; ?>

<?php wp_reset_postdata(); ?>


				<div class="latest-mini clearfix">

				 	<div class="wrapper">

						<h2><strong>Latest</strong> from <?php the_title(); ?></h2>

						<ul>
							<?php
							// The Query
							
							$args = array( 
												'category_name'=> $studiocat,
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