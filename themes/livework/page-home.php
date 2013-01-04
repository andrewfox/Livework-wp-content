<?php
/**
 * Template Name: Page - Home
 * Description: Homepage
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>


				<div class="splash alt <?php the_field('colour'); ?>">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<div class="topimage"><?php the_post_thumbnail('large'); ?></div>
					<div id="introduction">
						<div class="wrapper">
							<div class="excerpt">
								<?php the_content() ?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>





				<article id="page-<?php the_ID(); ?>" class="main">

							

<?php 
// Featured bar
get_sidebar('featuredbar'); 
?>










					<div class="latest-mini clearfix">

					 	<div class="wrapper">

							<h2><a href="<?php bloginfo('url'); ?>/latest">Latest from Livework</a></h2>

							<ul>
								<?php
								// The Query
								$the_query = new WP_Query( 'posts_per_page=8' );
								
								// The Loop
								while ( $the_query->have_posts() ) : $the_query->the_post();?>
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







				</article> <!-- /.main -->





<?php get_footer(); ?>