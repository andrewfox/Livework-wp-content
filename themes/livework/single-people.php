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
		$name = get_the_title();
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

									<?php 
									
									$test = get_field('person_email');
									
									if ( $test == "" ) {
										
									}
									
									else {
										echo "<h4>Contact "; 
										echo $name; 
										echo "</h4>";
									}
									
									?>
									<div class="vcard">
									
										
										
										
										<?php if ( get_field('person_email') ) : ?>
										<p class="email"><span class="ssstandard">email</span> <a href="mailto:<?php the_field('person_email'); ?>"><?php the_field('person_email'); ?></a></p>
										<?php endif; ?>

										<?php if ( get_field('person_phone_number') ) : ?>
										<p class="tel"><span class="ssstandard">call</span> <?php the_field('person_phone_number'); ?></p>
										<?php endif; ?>
										
										<p><span class="ssstandard">location</span> 
										<?php if (in_category(11)) : 
										echo "London";
										elseif (in_category(13)) : 
										echo "Oslo";
										elseif (in_category(14)) : 
										echo "São Paulo";
										elseif (in_category(12)) : 
										echo "Rotterdam";
										?>
										</p>
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
										
										<?php $hello = false; ?>
										
										
									
										<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
										
										
										
										<?php 
										
											if ($hello == false) {
												
												
												if ( get_the_title() == "" ) {
													
												}
												
												else {
													echo "<h4>"; 
													
													
													$forename = substr($name, 0, stripos($name, " ") );
													echo $forename;
													
													
													echo "'s Posts</h4>";
													$hello = true;
												}
												
												
												
											}
										
										?>
										
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
