
<?php
/**
 * The Template for displaying all single People posts.
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
			
	<div id="person-intro">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php the_post_thumbnail('full'); ?>
		<div id="person-headline" >
			<div class="wrapper">
				<h4><a href="../../our-clients-stories">Our Clients Stories</a></h4>
				<h3><?php the_title(); ?>: <span><?php the_field('job_title'); ?></span></h3>
				<h2><?php the_excerpt() ?></h2>
				
			</div>
		</div>
	</div>
<div class="wrapper">
	<div id="main">
				
				
				
				

		
		 		
		
		
		
			
		<div class="entry-content left-col">
				<?php the_content(); ?>
		<?php endwhile; ?>
		</div>
			
			
		<aside id="sidebar-more-posts">
		
			<h2>Written by <?php the_author(); ?></h2>
	
			
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
			            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
			            <?php the_title(); ?></a>
			            <?php the_post_thumbnail('small'); ?>
			        </li>
			
			    <?php endwhile; ?>
			
			
			<!-- End Loop -->
			
			
<!---->
		</aside>
			
	</div>
</div>							
							
											



					

					
					
				</article><!-- #post-## -->
		<div class="grey-container">		
			<div class="wrapper">
				<div id="morepeople" >
					<h2>More Case Studies</h2>
					<ul id="people">
										
										
										<?php
										$terms = get_the_terms( $post->ID, 'sectors' );
																
										if ( $terms && ! is_wp_error( $terms ) ) : 
										
											$sectors_terms = array();
										
											foreach ( $terms as $term ) {
												$sectors_terms[] = $term->name;
											}
																
											$on_draught = join( ", ", $sectors_terms );
										?>
										
										<p class="beers draught">
											On draught: <span><?php echo $on_draught; ?></span>
										</p>
										
										<?php endif; ?>
										
										<?php query_posts(array(
										array(
													'taxonomy' => 'sectors',
													'field' => 'slug',
													'terms' => '$sectors_terms'
												),
										'post_type' => 'case_study',
										'posts_per_page' => -1 ,
										'orderby' => 'title', 
										'order' => 'ASC', 
										'paged'=> $paged)); ?>
							
										<?php while(have_posts()) : the_post();  ?>
					
											<li><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
												<?php 
												if(has_post_thumbnail()) :
																		the_post_thumbnail('thumbnail'); 
																		else :				
												
																		endif;
												
												
												the_title(); 
											
											
											
											
											?>
											</a></li>
											
											<?php endwhile; ?>
										
					</ul>
				</div>
			</div>
		</div>
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>
