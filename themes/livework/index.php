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
					

					<?php while ( have_posts() ) : the_post() ?>
					
						<div class="post-wrapper" id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
							<h1 class="page-title">News</h1>
							
							<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>


										

							<div class="entry-content">
								
								<div class="entry-meta">
									<?php $authorid = get_the_author_meta('ID') ?> 
									    <?php $args = array( 
									    					'author'=> $authorid,
									    					'post_type' => 'people', 
									    					'posts_per_page' => 1, 
									    					
									    					);
									    $loop = new WP_Query( $args );
									    while ( $loop->have_posts() ) : $loop->the_post(); ?>
									        <li>
									            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
									            <?php the_post_thumbnail('thumbnail'); ?>
									            <?php the_title(); ?></a>
									        </li>
									
									    <?php endwhile; ?>
										<?php wp_reset_query();?>
									    
									<span class="pub-date"> <?php the_date('j/n/Y'); ?></span>
								</div>
								
								<?php if ( has_post_thumbnail() ) {
									echo '<div class="post-image blog-image">';
									the_post_thumbnail('full');
									echo '</div>';
								} ?>

								<?php the_content(); ?>
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
