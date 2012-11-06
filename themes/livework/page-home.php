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
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="page-<?php the_ID(); ?>" class="main">

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'livework' ), 'after' => '' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'livework' ), '', '' ); ?>
					</div><!-- .entry-content -->

				</article><!-- #page-## -->

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>