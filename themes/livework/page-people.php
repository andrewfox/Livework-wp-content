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
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
					</div><!-- .entry-content -->
						
					<ul id="offices">
						<li class="london">London</li>
						<li class="oslo">Oslo</li>
						<li class="sao-paulo">Sao Paulo</li>
						<li class="rotterdam">Rotterdam</li>
					</ul>
					
					<ul id="people">
					<?php query_posts(array('post_type' => 'people', 'posts_per_page' => 100 , 'order' => 'DSC', 'paged'=> $paged)); ?>
		
					<?php while(have_posts()) : the_post();  ?>

						<li><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
							<?php the_title(); 
						
						
						if(has_post_thumbnail()) :
						the_post_thumbnail('original'); 
						else :				

						endif;
						
						echo '<img src="img/portrait.png" alt="placeholder image" height="200" width="200">'
						
						
						?>
						</a></li>
						
						<?php endwhile; ?>
					
					</ul>
	
					<?php wp_reset_query();?>

				</article><!-- #page-## -->

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>