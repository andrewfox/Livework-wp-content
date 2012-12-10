<?php
/**
 * The Template for displaying all single People posts.
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
		<?php
		$standard = false;
		$feature = false;
		$categories = get_the_category();
		$catClass = '';
		$output = '';
		if($categories){
			foreach($categories as $category) {
				$output = $category->cat_name;
				if ($output == 'Highlight') {
					$feature = true;
				}
				else {
				}
			}
		
		}
		
		if ($feature == true) {
			$catClass = 'highlight';
		} else {
			$standard = true;
			$catClass = 'basic';
		}
		
		?>	
				<div class="splash <?php echo $catClass ?>">
	
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php the_post_thumbnail('large'); ?>
					<div id="introduction" >
						<div class="wrapper">
							<h4><a href="<?php bloginfo('url'); ?>/our-team">Our Team</a></h4>
							<h1><?php the_title(); ?> <span><?php the_field('job_title'); ?></span></h1>
							<div class="excerpt">
								<?php the_excerpt() ?>
							</div>
						</div>
					</div>
				</div>
				
				


		<div class="wrapper">
				<article id="people-<?php the_ID(); ?>" class="main clearfix people ">
						<div id="main" class="clearfix">
			
							<div class="entry-content left-col">
								<?php the_content(); ?>
							</div>
						</div>
				</article>
				
				<aside id="sidebar-more-posts">
							
					
					
					<?php $authorid = get_the_author_meta('ID') ?>
					<?php $args = array( 
										'author'=> $authorid,
										'posts_per_page' => 5, 
										
										);
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post(); ?>
					<?php 
					
					$anyposts = $wp_query->found_posts;
					if (!empty ($anyposts)) {
					echo'<h2 class="section-title">Posts by <?php the_title(); ?></h2>'
					}
					?>
					
					<li>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php the_title(); ?><span class="pub-date"> <?php the_date('j/n/Y'); ?></span>
						</a>
					</li>
					<?php endwhile; ?>
					</ul>

					<?php wp_reset_query();?>
				
				</aside>
			</div>
		
			
							<?php endwhile; ?>
							
							
							
<!--INSERT FEATURED POSTS	-->	
							
							<div class="featured clearfix">
												 
							 	<div class="wrapper">
							 	
									<div class="featured_post">
										<h3 class="section-title">Quote</h3>
										<blockquote><?php the_field('featured_quote');?></blockquote>
										<p><?php the_field('featured_quote_attribution');?></p>
									</div>
				
									<?php $posts = get_field('featured_content');
				 					if( $posts ): ?>
			 						<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
			 						<?php setup_postdata($post); ?>
			 						<div class="featured_post">
			 							<h3 class="section-title">
			 							<?php
			 							$theposttype = get_post_type( $post->ID );
			 							if ($theposttype == 'case_study') {
			 								echo 'Case study';
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
			
															
						</div><!-- /#main -->
					</div><!-- /.wrapper -->
			
				</article><!-- #post-## -->

				<div class="extra">

					<h3><a href="<?php echo get_page_link(7); ?>">Our team</a></h3>

					<ul id="offices">
						<li class="all on">All</li>
						<li class="london">London</li>
						<li class="oslo">Oslo</li>
						<li class="sao-paulo">S&atilde;o Paulo</li>
						<li class="rotterdam">Rotterdam</li>
					</ul>

					<ul id="people" class="clearfix">
	
					<?php query_posts(array('post_type' => 'people', 'posts_per_page' => -1 , 'order' => 'ASC', 'orderby' => 'title', 'paged'=> $paged)); ?>
		
					<?php while(have_posts()) : the_post();  ?>
	
						<li <?php post_class(); ?>>
							<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
								<?php if(has_post_thumbnail()) :
								the_post_thumbnail('thumb-large'); 
								endif;?>
								<span><?php the_title(); ?></span>
							</a>
						</li>
	
						<?php endwhile; ?>
	
					</ul>
				</div><!-- /#extra -->


<?php get_footer(); ?>
