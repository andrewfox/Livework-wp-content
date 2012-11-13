<?php
/**
 * Template Name: Page - People Page
 * Description: Our Story: fullscreen area, plus extras
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="page-<?php the_ID(); ?>" class="main">
				
					<h1 class="page-title"><?php the_title(); ?></h1>

					<div class="entry-content">
						<ul>
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
							<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
						</div><!-- .entry-content -->
						
						<?php query_posts(array('post_type' => 'people', 'posts_per_page' => 100 , 'order' => 'DSC', 'paged'=> $paged)); ?>
			
						<?php while(have_posts()) : the_post(); 	
	
							echo '<li>';
							
							the_title();
							
							
							if(has_post_thumbnail()) :
							the_post_thumbnail('original'); 
							else :				
	
							endif;
							
							echo '</li>';
							
							endwhile; ?>
						
						</ul>
						</div>
	
						<?php wp_reset_query();?>

				</article><!-- #page-## -->

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>