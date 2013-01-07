<?php
/**
 * The loop that displays posts.
 *
 * The loop displays the posts and the post content.  See
 * http://codex.wordpress.org/The_Loop to understand it and
 * http://codex.wordpress.org/Template_Tags to understand
 * the tags used in it.
 *
 * This can be overridden in child themes with loop.php or
 * loop-template.php, where 'template' is the loop context
 * requested by a template. For example, loop-index.php would
 * be used if it exists and we ask for the loop with:
 * <code>get_template_part( 'loop', 'index' );</code>
 *
 * @package WordPress
 * @subpackage livework
 * @since livework 1.0
 */
?>





<?php
	/* Start the Loop.
	 */ ?>
	 
<?php query_posts($query_string . '&cat=-196'); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

						<?php if ( in_category(10) && has_post_thumbnail() ) : // if is highlight and has featured image (post thumbnail) ?>
						<?php $domsxe = simplexml_load_string(get_the_post_thumbnail());
							$thumbnailsrc = $domsxe->attributes()->src; ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> style="background-image: url('<?php echo $thumbnailsrc ?>')">	
						<?php else : ?>
						
						<?php endif; ?>

							

<?php /* If case study ------------------------------------------ */ 
if ((get_post_type( $post->ID ) == "case_study")) : ?>


								
									
									
									
									<?php if( get_field('casestudies_one_liner') ): ?>
									<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
									<div class="wrapper clearfix">
									
									<div class="case-studies-image">
										<?php the_post_thumbnail('thumb-large'); ?>
									</div>
									<div class="case-studies-content">
										<h2>
											
										<?php if ( in_category(196) ) : ?>
												<h4 class="tab">Client story</h4>
												<?php the_field('casestudies_one_liner'); ?> <span class="casestudy-title">with <span><?php the_title(); ?></span></span>
										<?php else : ?>
											<h4 class="tab">Client story</h4>
										<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
												<?php the_field('casestudies_one_liner'); ?> <span class="casestudy-title">with <span><?php the_title(); ?></span></span>
											</a>
										<?php endif; ?>
										
										</h2>
										<div>
											<?php the_excerpt() ?>
											<p class="read-more"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'livework'), the_title_attribute('echo=0') ); ?>" rel="bookmark">Read more &rarr;</a></p>
										</div>
	
									</div>
									<?php else : ?>
									<?php endif; ?>
	
									


<?php /* Else is a news post (blog, article, point of view) ------------------------------------------ */

else : ?>
	<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
	<div class="wrapper clearfix">

								<?php if ( in_category(199) ) : ?>
								<h4 class="tab">Point of view</h4>
								<?php elseif ( in_category(191) ) : ?>
								<h4 class="tab">Article</h4>
								<?php else : ?>
								<h4 class="tab">News</h4>
								<?php endif; ?>

								<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?> <span class="entry-date"><?php the_time('j/m/Y') ?></span></a></h2>

								<?php if ( has_post_thumbnail()) : ?>
									<?php if ( in_category(10) ) : // don't show if highlight cat ?>
									<?php else : ?>
								<div class="post-image blog-image"><?php the_post_thumbnail('medium');?></div>
									<?php endif; ?>
								<?php endif; ?>


								<div class="entry-content">
									<?php the_excerpt(); ?>
									<p class="read-more"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'livework'), the_title_attribute('echo=0') ); ?>" rel="bookmark">Read more &rarr;</a></p>
								</div>



								<div class="entry-data">
									<?php
									$authorid = get_the_author_meta('ID');
									$args = array( 
										'author'=> $authorid,
										'post_type' => 'people', 
										'posts_per_page' => 1, 
									);
									$loop = new WP_Query( $args );
									while ( $loop->have_posts() ) : $loop->the_post(); 
									?>
									<a href="<?php the_permalink() ?>" rel="bookmark" title="Find out more about <?php the_title(); ?>">
										<?php the_post_thumbnail('thumbnail'); ?>
										<span>By <?php the_title(); ?></span>
									</a>
									<?php endwhile; ?>
									<?php wp_reset_query();?>
								</div>


<?php /* End of main if statement case study or post ------------------------------------------ */
endif;
 ?>

							</div><!-- /.wrapper -->
	
						</div><!-- /.post -->
						
	
						<?php endwhile; else: ?>
						 <p>Sorry, no posts matched your criteria.</p>
						 <?php endif; ?>
	
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( $wp_query->max_num_pages > 1 ) : ?>
						<nav id="nav-above" class="navigation">
							<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older', 'livework' ) ); ?></div>
							<div class="nav-next"><?php previous_posts_link( __( 'Newer<span class="meta-nav">&rarr;</span>', 'livework' ) ); ?></div>
						</nav><!-- #nav-above -->
	<?php endif; ?>


