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

					<?php if ( in_category(10) && has_post_thumbnail() ) : // if is highlight and has post thumbnail ?>
					<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 720,405 ), false, '' ); ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> style="<?php $src[0] ?>">	
					<?php else : ?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
					<?php endif; ?>


					<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>

						<div class="wrapper">

							<?php if ((get_post_type( $post->ID ) == "case_study")) : ?>
							<h4 class="section-title">Client story</h4>
							<?php elseif (in_category(191)) : ?>
							<h4 class="section-title">Theme</h4>
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
								<?php endif; ?
							<?php endif; ?>



							<div class="entry-content">
								<?php the_excerpt(); ?>
								<p class="read-more"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">Read more&#8230;</a></p>
							</div>



							<div class="entry-author">
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
								<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
									<?php the_post_thumbnail('thumbnail'); ?>
									<span><?php the_title(); ?></span>
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



				</article><!-- /#bodytext -->

</div> <!--end wrapper-->


<?php get_footer(); ?>
