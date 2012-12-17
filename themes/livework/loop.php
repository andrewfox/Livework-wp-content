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

<?php /* Display navigation to next/previous pages when applicable */ ?>
<?php if ( $wp_query->max_num_pages > 1 ) : ?>
	<nav id="nav-above" class="navigation">
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'livework' ) ); ?></div>
		<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'livework' ) ); ?></div>
	</nav><!-- #nav-above -->
<?php endif; ?>

<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if ( ! have_posts() ) : ?>
	<article id="post-0" class="post error404 not-found">
		<h1 class="entry-title"><?php _e( 'Not Found', 'livework' ); ?></h1>
		<div class="entry-content">
			<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'livework' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .entry-content -->
	</article><!-- #post-0 -->
<?php endif; ?>

<?php
	/* Start the Loop.
	 *
	 * In Twenty Ten we use the same loop in multiple contexts.
	 * It is broken into three main parts: when we're displaying
	 * posts that are in the gallery category, when we're displaying
	 * posts in the asides category, and finally all other posts.
	 *
	 * Additionally, we sometimes check for whether we are on an
	 * archive page, a search page, etc., allowing for small differences
	 * in the loop on each template without actually duplicating
	 * the rest of the loop that is shared.
	 *
	 * Without further ado, the loop:
	 */ ?>
<?php
$the_query = new WP_Query( array( 'post_type' => array( 'post', 'case_study' ) ) );
while ( $the_query->have_posts() ) : $the_query->the_post() ?>

<?php /* How to display posts in the Gallery category. */ ?>

	<?php if ( in_category(10) && has_post_thumbnail() ) : // if is highlight and has featured image (post thumbnail) ?>
						<?php $domsxe = simplexml_load_string(get_the_post_thumbnail());
							$thumbnailsrc = $domsxe->attributes()->src; ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> style="background-image: url('<?php echo $thumbnailsrc ?>')">	
						<?php else : ?>
						<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
						<?php endif; ?>
	
	
	
							<div class="wrapper clearfix">
	
								<?php if ((get_post_type( $post->ID ) == "case_study")) : ?>
								<h4 class="section-title">Client story</h4>
								<?php elseif (in_category(191)) : ?>
								<h4 class="section-title">Theme/Article</h4>
								<?php else : ?>
								<h4 class="section-title">News</h4>
								<?php endif; ?>
								
								<?php if ((get_post_type( $post->ID ) == "case_study")) : // if case study ?>
	
									<?php if( get_field('casestudies_one_liner') ): // with one liner intro ?>
	
								<h2><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_field('casestudies_one_liner'); ?> <span class="casestudy-title">with <span><?php the_title(); ?></span></span></a></h2>
	
									<?php else : // with no one liner ?>
	
								<h2><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
	
									<?php endif; ?>
	
								<?php else : // regular blog/article ?>
	
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?> <span class="entry-date"><?php the_time('j/m/Y') ?></span></a></h2>
	
								<?php endif; ?>
	
	
								<?php if ( has_post_thumbnail()) : ?>
									<?php if ( in_category(10) ) : // don't show if highlight cat ?>
									<?php else : ?>
								<div class="post-image blog-image"><?php the_post_thumbnail('large');?></div>
									<?php endif; ?>
								<?php endif; ?>
	
	
	
								<div class="entry-content">
									<?php the_excerpt(); ?>
									<p class="read-more"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">Read more &rarr;</a></p>
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
	
	
	
							</div><!-- /.wrapper -->
	
						</div><!-- /.post -->
	
						<?php endwhile; ?>
	
	
	
	
						<ul class="nav-paged">
							<li class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> older articles', 'blankslate' )) ?></li>
							<li class="nav-next"><?php previous_posts_link(__( 'newer articles <span class="meta-nav">&raquo;</span>', 'blankslate' )) ?></li>
						</ul>
	
	
	
						<?php get_sidebar( 'archives-date' ); ?>