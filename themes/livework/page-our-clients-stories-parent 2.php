<?php
/**
 * Template Name: Page - Our Client's Stories Page Parent
 * Description: Our Client's Stories Parent: intro, sectors list, then full client list
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="page-<?php the_ID(); ?>" class="clearfix">
					
					<div class="wrapper">
				
						<h1 class="page-title"><?php the_title(); ?></h1>
	
						<div class="entry-content">
							<?php the_content(); ?>
							<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'boilerplate' ), 'after' => '' ) ); ?>
							<?php edit_post_link( __( 'Edit', 'boilerplate' ), '', '' ); ?>
						</div><!-- .entry-content -->
						
					</div>
						<ul class="cases-mosaic">
							
								<?php 
								
								$args = array(
								    'post_type'=> 'case_study',
								    );              
								
								$the_query = new WP_Query( $args );
								while ( $the_query->have_posts() ) : $the_query->the_post(); 
								
								?>
								
								<?php if ( in_category('logo-only-case-study') ) { ?>
								
								<?php } else { ?>
								
									<li>
										<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
										<?php 
										if(has_post_thumbnail()) :
											the_post_thumbnail('thumbnail'); 
											else :				
											endif;
										?>
										</a>
									</li>
									<?php } ?>
									<?php endwhile; ?>
									<?php wp_reset_postdata() ?>
									
								<?php 
								
								$args = array(
								    'post_type'=> 'case_study',
								    );              
								
								$the_query = new WP_Query( $args );
								while ( $the_query->have_posts() ) : $the_query->the_post(); 
								
								?>
								
								<?php if ( in_category('logo-only-case-study') ) { ?>
								
								<?php } else { ?>
								
									<li>
										<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
										<?php 
										if(has_post_thumbnail()) :
											the_post_thumbnail('thumbnail'); 
											else :				
											endif;
										?>
										</a>
									</li>
									<?php } ?>
									<?php endwhile; ?>
									<?php wp_reset_postdata() ?>
									
								<?php 
								
								$args = array(
								    'post_type'=> 'case_study',
								    );              
								
								$the_query = new WP_Query( $args );
								while ( $the_query->have_posts() ) : $the_query->the_post(); 
								
								?>
								
								<?php if ( in_category('logo-only-case-study') ) { ?>
								
								<?php } else { ?>
								
									<li>
										<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
										<?php 
										if(has_post_thumbnail()) :
											the_post_thumbnail('thumbnail'); 
											else :				
											endif;
										?>
										</a>
									</li>
									<?php } ?>
									<?php endwhile; ?>
									<?php wp_reset_postdata() ?>
									
								<?php 
								
								$args = array(
								    'post_type'=> 'case_study',
								    );              
								
								$the_query = new WP_Query( $args );
								while ( $the_query->have_posts() ) : $the_query->the_post(); 
								
								?>
								
								<?php if ( in_category('logo-only-case-study') ) { ?>
								
								<?php } else { ?>
								
									<li>
										<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
										<?php 
										if(has_post_thumbnail()) :
											the_post_thumbnail('thumbnail'); 
											else :				
											endif;
										?>
										</a>
									</li>
									<?php } ?>
									<?php endwhile; ?>
									<?php wp_reset_postdata() ?>
						
						</ul>
						
						<div class="wrapper">
						
						<ul class="sectors-list">
						<?php
						$sectors = get_terms( 'sectors', 'orderby=count&hide_empty=0' ); 
						foreach ($sectors as $sector) { 
							if ($sector->count > 0) { ?>
							<li><a href="<?php bloginfo('url'); ?>/our-clients-stories/<?php echo $sector->slug ?>"><?php echo $sector->name ?></a></li>
							<?php } ?>
						<?php } ?>
						</ul>



					</div><!-- /.wrapper -->

				</article><!-- #page-## -->

<?php endwhile; ?>



<?php 
// Sectors + clients listings
get_sidebar('sectorsclients'); 
?>



<?php get_footer(); ?>	