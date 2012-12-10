<?php
/**
 * Template Name: Page - Story Page Parent
 * Description: Our Story Parent: fullscreen area, plus extras
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="page-<?php the_ID(); ?>" class="main clearfix">
					
					<div class="wrapper">
				
						<h1 class="page-title"><?php the_title(); ?></h1>
	
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
							<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
						</div><!-- .entry-content -->

						<ul>
						<?php
	
							$mypages = get_pages( array( 'child_of' => $post->ID, 'sort_column' => 'post_date', 'sort_order' => 'asc' ) );
						
							foreach( $mypages as $page ) {		
								$content = $page->post_content;
								if ( ! $content ) // Check for empty page
									continue;
									$content = apply_filters( 'the_excerpt', $content );
							?>
									<li>
										<h2><a href="<?php echo get_page_link( $page->ID ); ?>"><?php echo $page->post_title; ?></a></h2>
										<div class="entry">
											<?php the_field('story_page_headline'); ?>
										</div>
									</li>
							<?php
							}	
						?>

						</ul>

					</div><!-- /.wrapper -->

				</article><!-- #page-## -->

<?php endwhile; ?>




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
				
				<?php
				$posts2 = get_field('next_page');
				 
				if( $posts2 ): ?>
					<?php foreach( $posts2 as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>
					    	<a href="<?php the_permalink(); ?>"><img class="right-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/right-arrow.png" alt="go to next page" /></a>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
				
				</div>





	<?php get_footer(); ?>