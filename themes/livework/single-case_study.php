
<?php
/**
 * The Template for displaying all single Case Study posts.
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>


				<div id="splash" class="main">
		
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php the_post_thumbnail('full'); ?>
					<div id="introduction" >
						<div class="wrapper">
							<h4><a href="<?php bloginfo('url'); ?>/our-clients-stories">Our Clients Stories</a></h4>
							<h1><?php the_title(); ?></span></h1>
							<div class="excerpt">
								<?php the_excerpt() ?>
							</div>
						</div><!-- /.wrapper -->
					</div><!-- /#introduction -->
				</div>

				<article id="people-<?php the_ID(); ?>" class="main clearfix">
					<div class="wrapper">

						<div id="main" class="clearfix">

							<div class="entry-content">
								<?php the_content(); ?>
							</div>
	
							<?php endwhile; ?>
						</div>
						
						<aside id="sidebar-more-posts">
		
						<!-- The Loop -->
						<?php $authorid = get_the_author_meta('ID') ?> 
						<?php $args = array( 
											'author'=> $authorid,
											'post_type' => 'people', 
											'posts_per_page' => 1, 
										);
						$loop = new WP_Query( $args );
						while ( $loop->have_posts() ) : $loop->the_post(); ?>
							<li>
								<h2>Written by <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
								<?php the_post_thumbnail('thumbnail'); ?> <?php the_title(); ?>
								</a></h2>
							</li>
					
						<?php endwhile; ?>
						<?php wp_reset_query();?>
						<!-- End Loop -->
		
						</aside>
		
								
					</div><!-- /.wrapper -->
				</article>

				<div class="extra">		
					<div class="wrapper">
						<div id="morepeople" >
							<?php
								$terms = get_the_terms( $post->ID, 'sectors' );
								$sectors_terms = array();
								foreach ( $terms as $term ) {
									$sectors_terms[] = $term->name;
								}
								$thesector = join( ", ", $sectors_terms );
							?>
							<h2>More from <span><?php echo $thesector; ?> </span></h2>
							
							<ul>
							<?php 
							
							$args = array(
							    'post_type'=> 'case_study',
							    'taxonomy' => 'sectors',
							    'term' => $thesector,
						
							    );              
							
							$the_query = new WP_Query( $args );
							while ( $the_query->have_posts() ) : $the_query->the_post(); 
							
							?>
		
								<li>
									<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
									<?php 
									if(has_post_thumbnail()) :
										the_post_thumbnail('thumbnail'); 
										else :				
										endif;
									the_title(); 
									?>
									</a>
								</li>
								
								<?php endwhile; ?>
								<?php wp_reset_postdata() ?>
								
							
							</ul>

						</div>
					</div><!-- /.wrapper -->
				</div><!-- /#extra -->

<?php get_footer(); ?>
