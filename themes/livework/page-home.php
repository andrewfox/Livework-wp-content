<?php
/**
 * Template Name: Page - Home
 * Description: Homepage
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>




				<div id="splash">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php the_post_thumbnail('large'); ?>
					<div id="introduction" class="alt">
						<div class="wrapper">
							<div class="excerpt">
								<?php the_content() ?>
							</div>
						</div>
					</div>
					<?php endwhile; ?>
				</div>





				<div id="hello" class="arrows">
				
				<?php
				$posts3 = get_field('previous_page');
				 
				if( $posts3 ): ?>
					<?php foreach( $posts3 as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>
					    	<a href="<?php the_permalink(); ?>"><img class="left-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/left-arrow.png" alt="go to previous page" /></a>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
				
				<?php
				$posts2 = get_field('next_page');
				 
				if( $posts2 ): ?>
					<?php foreach( $posts2 as $post): // variable must be called $post (IMPORTANT) ?>
						<?php setup_postdata($post); ?>
					    	<a href="<?php the_permalink(); ?>"><img class="right-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/right-arrow.png" alt="go to next page" /></a>
					<?php endforeach; ?>
					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
				
				</div>






				<article id="page-<?php the_ID(); ?>" class="main">

							
					<!--INSERT FEATURED POSTS	-->	
					
					<div class="featured clearfix">
										 
					 	<div class="wrapper">
					 		
					 		<?php if (the_field('featured_quote')) :?>
							<div class="featured_post">
								<h3 class="section-title">Quote</h3>
								<blockquote><?php the_field('featured_quote');?></blockquote>
								<p><?php the_field('featured_quote_attribution');?></p>
							</div>
							<?php endif; ?>

							<?php 
							// works out how many features there are
							if (the_field('featured_quote')) {
								$maxfeatures = 3; // there is a feature quote
							} elseif (is_home()) {
								$maxfeatures = 8; // homepage
							} else {
								$maxfeatures = 4; // no quote, not the homepage
							}
							$posts = get_field('featured_content');
							
		 					if( $posts ): ?>
	 						<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
	 						<?php setup_postdata($post); ?>
	 						<div class="featured_post">
	 							<h3 class="section-title">
	 							<?php
	 							$theposttype = get_post_type( $post->ID );
	 							if ($theposttype == 'case_study') {
	 								if (is_front_page()) {
										$terms = wp_get_object_terms($post->ID, 'sectors');
										echo '<a href="'.get_term_link($terms[0]->slug, $taxonomy).'">'.$terms[0]->name.'</a>';   
									} else {
		 								echo 'Case study';
	 								}
	 								$thumbnail = 'logo';
	 							} else if ($theposttype = 'people') {
	 								echo 'Liveworker';
	 								$thumbnail = 'featured';
	 							} else if ($theposttype = 'theme') {
	 								echo 'Theme';
	 								$thumbnail = 'featured';
	 							}
	 							?>
	 							</h3>
	 							<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark" class="feature-<?php echo $theposttype ?>">
	
									<?php if ($thumbnail == 'logo') { ?>
										<img src="<?php the_field('casestudies_logo'); ?>" alt="<?php the_title(); ?>" />
									<?php } else { 
										the_post_thumbnail('thumb-large');
									} ?>
	
									<?php if ($theposttype == 'case_study') { ?>
										<span><?php the_field('casestudies_one_liner'); ?></span>
									<?php } ?>

									<?php if ($theposttype == 'people') { ?>
										<span><?php the_title(); ?></span>
									<?php } ?>
	
								</a>
	 						</div>
	 						<?php endforeach; ?>
		 					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		 				<?php endif; ?>
	
					 	</div> <!-- /.wrapper -->

					</div> <!-- /.feature-posts -->

					<!--END:INSERT FEATURED POSTS:END	-->




					<div id="world" class="clearfix">
						<h1><a href="<?php bloginfo('url'); ?>/contact">Found the world over</a></h1>
						<ul>
							<li class="london"><a href="<?php bloginfo('url'); ?>/contact">London</a></li>
							<li class="oslo"><a href="<?php bloginfo('url'); ?>/contact">Oslo</a></li>
							<li class="sao-paulo"><a href="<?php bloginfo('url'); ?>/contact">Sao Paulo</a></li>
							<li class="rotterdam"><a href="<?php bloginfo('url'); ?>/contact">Rotterdam</a></li>
						</ul>
					</div>





					<div class="latest-mini clearfix">

						<h4><a href="<?php bloginfo('url'); ?>/news">Livework latest</a></h4>
						<ul>
							<?php
							// The Query
							$the_query = new WP_Query( 'posts_per_page=5' );
							
							// The Loop
							while ( $the_query->have_posts() ) : $the_query->the_post();?>
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
							<?php endwhile;
							
							// Reset Post Data
							wp_reset_postdata(); ?>	
						</ul>

					</div> <!-- /.latest-mini -->





				</article> <!-- /.main -->





<?php get_footer(); ?>