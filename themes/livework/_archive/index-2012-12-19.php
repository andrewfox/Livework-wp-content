<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>

				<article class="main">
					<div class="wrapper">
						<h1 class="page-title">Latest</h1>
						<p>News, articles, client stories and blog posts.</p>
					</div>


					<?php get_sidebar( 'archives' ); ?>


					<?php
					$the_query = new WP_Query( array( 'post_type' => array( 'post', 'case_study' ) ) );
					while ( $the_query->have_posts() ) : $the_query->the_post() ?>



					<?php if ( in_category(10) && has_post_thumbnail() ) : // if is highlight and has featured image (post thumbnail) ?>
					<?php $domsxe = simplexml_load_string(get_the_post_thumbnail());
						$thumbnailsrc = $domsxe->attributes()->src; ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> style="background-image: url('<?php echo $thumbnailsrc ?>')">	
					<?php else : ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
					<?php endif; ?>



						<div class="wrapper clearfix">

							<?php if ((get_post_type( $post->ID ) == "case_study")) : ?>
							<h4 class="tab">Client story</h4>
							<?php elseif (in_category(191)) : ?>
							<h4 class="tab">Theme/Article</h4>
							<?php else : ?>
							<h4 class="tab">News</h4>
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
							<div class="post-image blog-image"><?php the_post_thumbnail('medium');?></div>
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




					<?php /* Display navigation to next/previous pages when applicable */ ?>
					<?php if ( $wp_query->max_num_pages > 1 ) : ?>
						<nav id="nav-above" class="navigation">
							<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older', 'livework' ) ); ?></div>
							<div class="nav-next"><?php previous_posts_link( __( 'Newer<span class="meta-nav">&rarr;</span>', 'livework' ) ); ?></div>
						</nav><!-- #nav-above -->
					<?php endif; ?>


					<?php get_sidebar( 'archives-date' ); ?>



				</article><!-- /#bodytext -->

</div> <!--end wrapper-->


<?php get_footer(); ?>
