<?php
/**
 * Template Name: Page - Sector Meta
 * Description: Our Client's Stories Sector page: fullscreen area, list of case studies and themes
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>


				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="splash alt <?php the_field('colour'); ?>">
					<div class="topimage"><?php the_post_thumbnail('large'); ?></div>
					<div id="introduction" class="alt">
						<div class="wrapper">
							<h1><?php the_title(); ?></h1>
							<div class="excerpt">
								<?php the_content() ?>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>

				<article id="page-<?php the_ID(); ?>" class="main">




<?php 
// Featured bar
get_sidebar('featuredbar'); 
?>

<!--INSERT ALL LOGOS FOR SECTOR	-->	
			
			<div class="logos-list clearfix">
			
				<div class="wrapper">
				
					<h3 class="section-title">All of our lovely logos</h3>
							
					<ul class="logos">
					
					
					<?php 
					
					$args = array(
					    'post_type'=> 'case_study',
					    );              
					
					$the_query = new WP_Query( $args );
					while ( $the_query->have_posts() ) : $the_query->the_post(); 
				
					
					?>
						<li>
							<?php if ( in_category('logo-only-case-study') ) { ?>
							<?php 
							if( get_field('casestudies_logo') ): ?>
								<img src="<?php the_field('casestudies_logo'); ?>" alt="<?php the_title(); ?>" /><?php
							endif;
							?>
							</a>

							<?php } else { ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_field('casestudies_one_liner'); ?> with <?php the_title(); ?>" rel="bookmark">
							<?php 
							if( get_field('casestudies_logo') ): ?>
								<img src="<?php the_field('casestudies_logo'); ?>" alt="<?php the_field('casestudies_one_liner'); ?> with <?php the_title(); ?>" /><?php
							endif;
							?>
							</a>
						
							<?php } ?>
						</li>
						
						
						<?php endwhile; ?>
						<?php wp_reset_postdata() ?>
										
					</ul>
					<!--END:INSERT ALL LOGOS FOR SECTOR:END	-->
			
				</div> <!-- /.wrapper -->
			
			</div> <!-- /.logos-list -->



				<?php 
				// Sectors + clients listings
				get_sidebar('sectorslogos'); 
				?>
				
				<?php 
				// Sectors + clients listings
				get_sidebar('sectorsclients'); 
				?>



					



	 			</article> <!-- /.main -->










	<?php get_footer(); ?>