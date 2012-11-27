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

						<h1 class="page-title">News</h1>


						<?php while ( have_posts() ) : the_post() ?>
					
							<div id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> class="post">
							
								<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>

								
								<div class="entry-meta">
								<?php $authorid = get_the_author_meta('ID') ?> 
									<?php $args = array( 
											'author'=> $authorid,
											'post_type' => 'people', 
											'posts_per_page' => 1, 
										);
										$loop = new WP_Query( $args );
										while ( $loop->have_posts() ) : $loop->the_post(); ?>
									<a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
											<?php the_post_thumbnail('thumbnail'); ?>
											<?php the_title(); ?>									
											<?php endwhile; ?>
									<?php wp_reset_query();?>
										<span class="meta-sep"> | </span>
										<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'blankslate'); ?></span>
										<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
									<?php edit_post_link( __( 'Edit', 'blankslate' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
									</a>
								</div>
								
								<?php if ( has_post_thumbnail() ) {
									echo '<div class="post-image blog-image">';
									the_post_thumbnail('large');
									echo '</div>';
								} ?>
									<div class="entry-content">
										<?php the_content(); ?>
									</div>
								</div>

						</div><!-- /.post -->
					
					
					<?php endwhile; ?>

						<div class="nav-paged">
							<p class="nav-previous"><?php next_posts_link(__( '<span class="meta-nav">&laquo;</span> older articles', 'blankslate' )) ?></p>
							<p class="nav-next"><?php previous_posts_link(__( 'newer articles <span class="meta-nav">&raquo;</span>', 'blankslate' )) ?></p>
						</div>
					

				</article><!-- /#bodytext -->

</div> <!--end wrapper-->


<?php get_footer(); ?>
