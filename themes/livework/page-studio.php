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

<?php get_sidebar(); ?>

<?php get_footer(); ?>