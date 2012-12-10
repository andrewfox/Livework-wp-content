<?php
/**
 * Template Name: Page - Our Client's Stories Page Parent
 * Description: Our Client's Stories Parent: intro, sectors list, then full client list
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="page-<?php the_ID(); ?>" class="clearfix">
					
					<div class="wrapper">
				
						<h1 class="page-title"><?php the_title(); ?></h1>
	
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
							<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
						</div><!-- .entry-content -->
						
						
						<?php print_r(get_terms( 'sectors', 'orderby=count&hide_empty=0' )); ?>
					
					</div>

				</article><!-- #page-## -->

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>