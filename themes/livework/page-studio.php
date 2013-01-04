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
					<h4 class="tab"><a href="<?php bloginfo('url'); ?>/contact-us">Studio</a></h4>
					<h1><?php the_title(); ?></h1>
				</div>
			</div>
		</div>
		

		




		<article id="page-<?php the_ID(); ?>" class="main clearfix">

			<div class="wrapper">

				<div id="main" class="clearfix">

					<div class="entry-content">

						<aside class="entry-data"> 

							<div class="vcard">
														
								<?php if ( get_field('studio_address') ) : ?><p class="studio-address"><span class="ssstandard">location</span> <?php the_field('studio_address'); ?></p><?php endif; ?>
								<?php if ( get_field('studio_telephone') ) : ?><p class="tel"><span class="ssstandard">call</span> <?php the_field('studio_telephone'); ?></p><?php endif; ?>
								<?php if ( get_field('studio_fax') ) : ?><p class="fax"><span class="ssstandard">fax</span> <?php the_field('studio_fax'); ?></p><?php endif; ?>
								<?php if ( get_field('studio_email') ) : ?><p class="email"><span class="ssstandard">email</span> <a href="mailto:<?php the_field('studio_email'); ?>"><?php the_field('studio_email'); ?></a></p><?php endif; ?>
								<?php if ( get_field('studio_twitter') ) : ?><p class="studio-twitter"><span class="sssocial">twitter</span> <a href="http://twitter.com/<?php the_field('studio_twitter'); ?>">@<?php the_field('studio_twitter'); ?></a></p><?php endif; ?>
								<?php if ( get_field('studio_facebook') ) : ?><p class="studio-facebook"><span class="sssocial">facebook</span> <a href="http://facebook.com/<?php the_field('studio_facebook'); ?>">Facebook</a></p><?php endif; ?>
								
								<?php if ( get_field('studio_google_maps') ) : ?><div id="map_canvas"> <?php the_field('studio_google_maps'); ?><?php endif; ?>

							</div>

						</aside>
						
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
						
						<div class="studio-find-us">

							<?php the_field('studio_how_to_find_us'); ?>

						</div> <!-- /.studio-find-us -->
			
					</div> <!-- /.entry-content -->
			
				</div> <!-- /#main -->
			
			
			</div><!-- /.wrapper -->
					
						
						
						
					
						
						
					


				</article><!-- #page-## -->

<?php endwhile; ?>

<?php wp_reset_postdata(); ?>


				<div class="latest-mini clearfix">

				 	<div class="wrapper">

						<h2>Latest from <?php the_title(); ?></h2>

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