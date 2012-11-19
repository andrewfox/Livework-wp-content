<?php
/**
 * The Template for displaying all single People posts.
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
			
<div id="splash" class="single-people">

	<div id="top">

		<div class="no-bkg hat" ></div>

		<div class="no-bkg box" >
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<h3><?php the_title(); ?>: <span><?php the_field('page_title_suffix'); ?></span></h3>
			<h2><?php the_field('page_headline'); ?></h2>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<?php endwhile; ?>
		</div>

	</div> <!-- /#top -->

	<?php the_post_thumbnail('full'); ?>

</div> <!-- /#splash -->
							
							
											
<div id="hello" class="arrows">


<?php add_filter( $redordernext, $function_to_add, $priority, $accepted_args ); ?>
				
<?php

$sort  = apply_filters( "get_previous_post_sort", "ORDER BY title $order ASC" );
$sort2  = apply_filters( "get_next_post_sort", "ORDER BY title $order ASC" );
echo $sort
	$current =  get_permalink();
	$prevPost = get_previous_post(false);
	$prevURL = get_permalink($prevPost->ID);
	$nextPost = get_next_post(false);
	$nextURL = get_permalink($nextPost->ID);
?>

	<a href="<?php echo $nextURL ?>"> <img class="right-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/right-arrow.png" alt="go to next page" /></a>
	
	<a href="<?php echo $prevURL ?>"> <img class="left-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/left-arrow.png" alt="go to previous page" /></a>  	
				
</div>
					
	
					
					
					
					<div id="more-info">
						<h2><a id = "more-infolink" href="#"><span class="ss-icon">down</span> More posts by <?php the_title(); ?></a></h2><h2><a class="morepeople" href="#">More people</a></h2>
						<h1>
						<?php the_title(); ?> <span>
						<?php the_field('page_title_suffix'); ?>
						</span>
						</h1>
						
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
					
					<?php query_posts( 'posts_per_page=5' . '&author_name=' . $user_identity ); ?>
					<?php if (have_posts()) : ?>
					<?php while (have_posts()) : the_post(); ?>
					<div class="about">
					<h1><?php the_title(); ?></h1>
					<?php the_excerpt() ?>
<!--					<h5 title="Permanent Link to <?php the_title(); ?>">Read More</h5>-->
					</div>
					<?php endwhile; ?>
					<?php else : ?>
					<?php endif; ?>	
									
					
	
					<?php wp_reset_query();?>

					
				</article><!-- #post-## -->
				<nav id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'boilerplate' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'boilerplate' ) . '</span>' ); ?></div>
				</nav><!-- #nav-below -->
				
				
<?php get_sidebar(); ?>
<?php get_footer(); ?>
