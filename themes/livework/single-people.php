<?php
/**
 * The Template for displaying all single People posts.
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
			
	<div id="person-intro">


			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<?php the_post_thumbnail('full'); ?>
				
				<div id="person-headline">
					<h3><?php the_title(); ?>: <span><?php the_field('job_title'); ?></span></h3>
					<h2><?php the_field('page_headline'); ?></h2>
				</div>
			<?php endwhile; ?>
			
			<aside id="sidebar-more-posts">
				<h2>Posts by <?php the_title(); ?></h2>
				
				<?php query_posts( 'posts_per_page=5' . '&author_name=' . $user_identity ); ?>
				<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
				<div class="mini-post-content">
				<h1><?php the_title(); ?></h1>
				<?php the_excerpt() ?>
<!--					<h5 title="Permanent Link to <?php the_title(); ?>">Read More</h5>-->
				</div>
				<?php endwhile; ?>
				<?php else : ?>
				<?php endif; ?>	
				<?php wp_reset_query();?>
			</aside>
			
			<div id="person-profile">
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				
				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
			</div>
			
			
	</div>

	</div> <!-- /#top -->


</div> <!-- /#splash -->
							
							
											
<div id="hello" class="arrows">
				
<?php
	$current =  get_permalink();
	$prevPost = get_previous_post(false);
	$prevURL = get_permalink($prevPost->ID);
	$nextPost = get_next_post(false);
	$nextURL = get_permalink($nextPost->ID);
?>

	<a href="<?php echo $nextURL ?>"> <img class="right-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/right-arrow.png" alt="go to next page" /></a>
	
	<a href="<?php echo $prevURL ?>"> <img class="left-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/left-arrow.png" alt="go to previous page" /></a>  	
				
</div>

					

					
					
				</article><!-- #post-## -->
						
				
				<div id="morepeople">
					<h2>More people</h2>
					<ul id="people">
										<?php query_posts(array('post_type' => 'people', 'posts_per_page' => -1 ,'orderby' => 'title', 'order' => 'ASC', 'paged'=> $paged)); ?>
							
										<?php while(have_posts()) : the_post();  ?>
					
											<li><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
												<?php 
												if(has_post_thumbnail()) :
																		the_post_thumbnail('original'); 
																		else :				
												
																		endif;
												
												
												the_title(); 
											
											
											
											
											?>
											</a></li>
											
											<?php endwhile; ?>
										
					</ul>
				</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
