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

				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

					<h1 class="page-title">News</h1>

					<?php while ( have_posts() ) : the_post() ?>
					
						<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
							
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>


							<?php if ( has_post_thumbnail() ) {
								echo '<div class="post-image">';
								the_post_thumbnail('medium');
								echo '</div>';
							} ?>			

							<div class="entry-content">
								
								<div class="entry-meta">
									<span class="meta-prep meta-prep-author"><?php _e('By ', 'blankslate'); ?></span>
									<span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all articles by %s', 'blankslate' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
									<span class="meta-sep"> | </span>
									<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'blankslate'); ?></span>
									<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
									<?php edit_post_link( __( 'Edit', 'blankslate' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
								</div>

								<?php the_excerpt(); ?>
							</div>

						</div><!-- /.post -->
					
					
					<?php endwhile; ?>

						<div class="nav-paged">
							<p class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> older articles', 'blankslate' )) ?></p>
							<p class="nav-next"><?php previous_posts_link(__( 'newer articles <span class="meta-nav">&raquo;</span>', 'blankslate' )) ?></p>
						</div>
					
					<?php } ?>

				</article><!-- /#bodytext -->




<?php get_footer(); ?>
