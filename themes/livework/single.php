<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
			
		
			
	<div id="person-intro">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php the_post_thumbnail('full'); ?>
		<?php $authorid = get_the_author_meta('ID') ?> 
		<div id="person-headline" >
			<div class="wrapper">
				<h4><a href="../../our-team">Our Team</a></h4>
				<h3><?php the_title(); ?>: <span><?php the_field('job_title'); ?></span></h3>
				<h2><?php the_excerpt() ?></h2>
				
			</div>
		</div>
	</div>
<div class="wrapper">
	<div id="main">
				
				
				
				

		
		 		
		
		
		
			
		<div class="entry-content left-col">
				<?php the_content(); ?>
				
				<?php 
								$cat = get_the_category( $id );
								
								var_dump($cat);
				//				if($cat == 193) :
				//										echo '<div id="new-post">';
				//										echo '<p>hi</p>'; 
				//										else :				
				//				
				//										endif;
							
							?>
		<?php endwhile; ?>
		</div>
			
			
		<aside id="sidebar-more-posts">
		
			<h2>Written by <?php the_author(); ?></h2>
	
			
			<!-- The Loop -->
			
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
					<h2>Livework people</h2>
					<ul id="people">
										<?php query_posts(array('post_type' => 'people', 'posts_per_page' => -1 ,'orderby' => 'title', 'order' => 'ASC', 'paged'=> $paged)); ?>
							
										<?php while(have_posts()) : the_post();  ?>
					
											<li><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
												<?php 
												if(has_post_thumbnail()) :
																		the_post_thumbnail('original'); 
																		else :				
												
																		endif;
												
												
												the_title(); 
											
											
											
											
											?>
											</a></li>
											
											<?php endwhile; ?>
											
											
										
					</ul>
				</div>
			</div>
		</div><?php get_sidebar(); ?>
		
	</div>	
<?php get_footer(); ?>
