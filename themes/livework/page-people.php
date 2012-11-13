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
					
					<?php query_posts(array('post_type' => 'people', 'posts_per_page' => 100 , 'order' => 'DSC', 'paged'=> $paged)); ?>
		
					<?php while(have_posts()) : the_post(); ?>	

					<div class="person">
						
						<!-- VIDEOS VIA CUSTOM FIELD VALUE-->	
						<?php  if(has_post_thumbnail()) :?>
						<?php the_post_thumbnail('original'); ?>
						<?php else :?>
												
						<a href="<?php the_field('video_url'); ?>" 
						
							
								<?php
								 /* if no url spcified refresh videopage*/
								if(get_field('video_url'))
								{
									echo 'class="iframe"';
								}?>>
							<img src="<?php echo bloginfo('template_url'); ?>/img/default_thumbnail.jpg" alt="default_thumb" />
							
						

						<?php endif;?>
						<span class="play-icon"></span>
						<span class="video-text"><?php the_title(); ?><span class="video-people-text"><?php the_field('people'); ?></span></span>
						

						<!-- END VIDEOS VIA CUSTOM FIELD VALUE -->

						</a>
						

					</div><!-- /.video -->
	


					<?php endwhile; ?>

					<?php wp_reset_query();?>

				</article><!-- #page-## -->

<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>