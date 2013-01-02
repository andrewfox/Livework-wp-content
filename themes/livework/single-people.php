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
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="splash <?php echo $catClass ?>">
					<?php $titleofpage = $post->post_name?>
					<div class="topimage"><?php the_post_thumbnail('large'); ?></div>
					<div id="introduction" >
						<div class="wrapper">
							<h4 class="tab"><a href="<?php bloginfo('url'); ?>/our-team">Our Team</a></h4>
							<h1><?php the_title(); ?> <span><?php the_field('job_title'); ?></span></h1>
							<div class="excerpt">
								<?php the_excerpt() ?>
							</div>
						</div>
					</div>
				</div>
				
				


			
				<article id="people-<?php the_ID(); ?>" class="main clearfix">
				
					<div class="wrapper">

						<div id="main" class="clearfix">
							
							<div class="entry-content">

								<aside class="entry-data"> 

									<div class="vcard">
									
										<?php 
										
										$test = get_field('person_email');
										
										if ( $test == "" ) {
											
										}
										
										else {
											echo "<h3>Contact Ben</h3>";
										}
										
										?>
										

										<?php if ( get_field('person_email') ) : ?>
										<p class="email"><span>e</span> <a href="mailto:<?php the_field('person_email'); ?>"><?php the_field('person_email'); ?></a></p>
										<?php endif; ?>

										<?php if ( get_field('person_phone_number') ) : ?>
										<p class="tel"><span>t</span> <?php the_field('person_phone_number'); ?></p>
										<?php endif; ?>

									</div> <!-- /.vcard -->
									
									<?php $anyposts = 0; ?>
									
									<?php $authorid = get_the_author_meta('ID') ?>
									<?php $args = array( 
														'author'=> $authorid,
														'posts_per_page' => 5, 
														
														);
									$loop = new WP_Query( $args );
									?>
									
									
									
									<div class="author-articles">
										
										<?php
										global $wp_query;
										$curauth = $wp_query->get_queried_object();
										$post_count = $wpdb->get_var("SELECT COUNT(*) FROM $wpdb->posts WHERE post_author = '" . $curauth->ID . "' AND post_type = 'post' AND post_status = 'publish'");
										?>
										
										
										<?php 
										
											$test = get_field('person_email');
											
											if ( $post_count > 1 ) {
												echo "<h3>Posts from "; 
												the_title();
												echo "</h3>";
											}
											
											else {
												
											}
										
										?>
										
										<h2>Post Count: <?php echo $post_count; ?></h2>
										
										<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
										
										
										
										
										<ul>
											<li>
												<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
													<?php the_title(); ?><span class="entry-date"> <?php the_date('j/n/Y'); ?></span>
												</a>
											</li>

										<?php endwhile; ?>

										</ul>
									
									</div>

									<?php wp_reset_query();?>

								</aside>

								<?php the_content(); ?>

							</div> <!-- /.entry-content -->

							<?php endwhile; ?>
						</div> <!-- /#main -->


					</div><!-- /.wrapper -->
				

				</article><!-- #people-## -->

				<?php 
				// Featured bar
				get_sidebar('featuredbar'); 
				?>

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
