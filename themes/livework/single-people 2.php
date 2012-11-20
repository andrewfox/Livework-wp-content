<?php
/**
 * The Template for displaying all single People posts.
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
			
<div id="splash">

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
				
				<?php
				$posts3 = get_field('previous_page');
				 
				if( $posts3 ): ?>
					<?php foreach( $posts3 as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>
					    	<a href="<?php the_permalink(); ?>"><img class="left-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/left-arrow.png" alt="go to previous page" /></a>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
				
				<?php query_posts('category_name=london&showposts=1&paged=' .get_query_var('paged')); ?>
				
				<?php
				$current =  get_permalink();
				$prevPost = get_previous_post(true);
				$prevURL = get_permalink($prevPost->ID);
				$nextPost = get_next_post(true);
				$nextURL = get_permalink($nextPost->ID);
				?>
 

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>				

					    	<a href="<?php echo $nextURL ?>"> <img class="right-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/right-arrow.png" alt="go to next page" /></a>
					    	
					    	<a href="<?php echo $previousURL ?>"> <img class="left-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/left-arrow.png" alt="go to previous page" /></a>
				
				</div>
				
				
				
				
				
				
				
				
				
				
				
					<?php previous_post_link( '%link', '' . _x( '&larr;', 'Previous post link', 'boilerplate' ) . ' %title' ); ?>
					<?php next_post_link( '%link', '%title ' . _x( '&rarr;', 'Next post link', 'boilerplate' ) . '' ); ?>
					
					
					<div id="more-info">
						<h2><a id = "more-infolink" href="#"><span class="ss-icon">down</span> More on <?php the_title(); ?></a></h2>
						<h1><?php the_title(); ?>: <span><?php the_field('page_title_suffix'); ?></span></h1>
					</div>
					
					
					
					
						
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="page-title"><?php the_title(); ?></h1>
					<div class="entry-meta">
						<?php // livework_posted_on(); ?>
					</div><!-- .entry-meta -->
					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
						
						
						
					</div><!-- .entry-content -->
					<footer class="entry-utility">
						<?php edit_post_link( __( 'Edit', 'boilerplate' ), '<span class="edit-link">', '</span>' ); ?>
					</footer><!-- .entry-utility -->
					
					
					<h2>More posts by <?php the_title(); ?></h2>
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
									
					<ul id="people">
					<?php query_posts(array('post_type' => 'people', 'posts_per_page' => 100 , 'order' => 'DSC', 'paged'=> $paged)); ?>
		
					<?php while(have_posts()) : the_post();  ?>

						<li><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
							<?php the_title(); 
						
						
						if(has_post_thumbnail()) :
						the_post_thumbnail('original'); 
						else :				

						endif;
						
						?>
						</a></li>
						
						<?php endwhile; ?>
					
					</ul>
	
					<?php wp_reset_query();?>

					
				</article><!-- #post-## -->
				<nav id="nav-below" class="navigation">
					<div class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'boilerplate' ) . '</span> %title' ); ?></div>
					<div class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'boilerplate' ) . '</span>' ); ?></div>
				</nav><!-- #nav-below -->
<?php endwhile; // end of the loop. ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>