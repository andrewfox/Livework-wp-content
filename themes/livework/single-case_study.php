
<?php
/**
 * The Template for displaying all single Case Study posts.
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>

<!--facebook like button jssdk-->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
			

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

					<?php if (in_category(10)) : // show topimage if highlight ?>
					<div class="topimage"><?php the_post_thumbnail('full'); ?></div>
					<?php endif; ?>

					<div id="introduction">
						<div class="wrapper">

							<?php if (in_category(10)) : // show regular large image if NOT highlight ?>
							<?php else : ?>
							<?php the_post_thumbnail('medium'); ?> 
							<?php endif; ?>

							<h4 class="tab">Client Story</h4>
							<h1><?php the_field('casestudies_one_liner'); ?></h1>
							<h2 class="casestudy-title">with <?php the_title(); ?></h2>

							<?php 
							//only show excerpt if it exists
							if ($post->post_excerpt): ?>
							<div class="excerpt">
								<?php the_excerpt() ?>
							</div>
							<?php endif; ?>

						</div><!-- /.wrapper -->
					</div><!-- /#introduction -->
				</div>

				<article id="case_study-<?php the_ID(); ?>" class="main clearfix">
					<div class="wrapper">

						<div id="main" class="clearfix">
							
							<div class="entry-content">

								<aside class="entry-data"> 

									<?php $authorid = get_the_author_meta('ID') ?> 
									<?php $args = array( 
										'author'=> $authorid,
										'post_type' => 'people', 
										'posts_per_page' => 1, 
									);
									$loop = new WP_Query( $args );
									while ( $loop->have_posts() ) : $loop->the_post(); ?>

									<div class="author-details">
										<a href="<?php the_permalink() ?>" rel="bookmark" title="Find out more about <?php the_title(); ?>">
											<?php the_post_thumbnail('thumbnail'); ?>
											<span>By <?php the_title(); ?>, <?php the_field('job_title'); ?></span>
											
										</a>
									</div>

									<?php endwhile; ?>
									<?php wp_reset_query();?>
									<!-- End Loop -->

									<ul class="socialmedia">
																			<li><a href="https://twitter.com/share" class="twitter-share-button" data-via="liveworkstudio" data-count="none" data-dnt="true">Tweet</a>
									<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></li>
									<li><div class="fb-like" data-href="<?php the_permalink(); ?>" data-send="false" data-width="300" data-show-faces="false" data-font="arial"></div></li>
																		</ul>

								</aside>

								<?php the_content(); ?>

							</div> <!-- /.entry-content -->
	
							<?php endwhile; ?>
						</div>
						
						
		
								
					</div><!-- /.wrapper -->


				</article>
				
		
		
		
		<?php 
		// Featured bar
		get_sidebar('featuredbar'); 
		?>

				<div class="extra">		
					<div class="wrapper">
						<div class="case-studies more-cs">
							
							
							<?php
								$terms = get_the_terms( $post->ID, 'sectors' );
								if ($terms == "") {
									
								}
								
								else {
								$sectors_terms = array();
								foreach ( $terms as $term ) {
									$sectors_terms[] = $term->name;
								}
								$thesector = join( ", ", $sectors_terms );




							?>
									<h2 class="section-title">More from <span><?php echo $thesector; ?> </span></h2>
									
									<?php 
									
									$args = array(
											'post_type'=> array('case_study', 'post'),
											'taxonomy' => 'sectors',
											'term' => $thesector,
										);
									
									$the_query = new WP_Query( $args );
									while ( $the_query->have_posts() ) : $the_query->the_post(); 
							
								
							?>
							
							<?php if ( in_category('logo-only-case-study') ) { ?>
							
							<?php } else { ?>
							
							
							<!--Case studies-->
							<div  <?php post_class('clearfix'); ?>>	
								<div class="wrapper">
									<div class="case-studies-image">
										<?php if ( in_category(196) ) : ?>
										<?php 
										if( get_field('casestudies_logo') ): ?>
											<li><img src="<?php the_field('casestudies_logo'); ?>" alt="<?php the_title(); ?>" /></li><?php
										endif;
										?>
										<?php else : ?>
										<?php the_post_thumbnail('thumb-large'); ?>
										<?php endif; ?>
									</div>
									<div class="case-studies-content">
										
										<?php if ((get_post_type( $post->ID ) == "case_study")) : ?>
										<h4 class="tab">Client story</h4>
										<?php elseif (in_category(199)) : ?>
										<h4 class="tab">Point of view</h4>
										<?php else : ?>
										<h4 class="tab">News</h4>
										<?php endif; ?>
										
										<?php if( get_field('casestudies_one_liner') ): ?>
											<h2>
												
											<?php if ( in_category(196) ) : ?>
													<?php the_field('casestudies_one_liner'); ?> <span class="casestudy-title">with <span><?php the_title(); ?></span></span>
											<?php else : ?>
											<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
													<?php the_field('casestudies_one_liner'); ?> <span class="casestudy-title">with <span><?php the_title(); ?></span></span>
												</a>
											<?php endif; ?>
											
											</h2>
										<?php else : ?>
										<h2>
											<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a>
										</h2>
										<?php endif; ?>

										<div>
	 										<?php the_excerpt() ?>
											<p class="read-more"><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'livework'), the_title_attribute('echo=0') ); ?>" rel="bookmark">Read more &rarr;</a></p>

										</div>

	 								</div>

	 							</div> <!-- /.wrapper -->
	 						</div>
							<!--END-Case studies-->	
								
								
								<?php } ?>
								<?php endwhile; ?>
								
								<?php wp_reset_postdata() ?>
								
							
								<?php } ?>
						</div>
					</div><!-- /.wrapper -->
				</div><!-- /#extra -->

<?php get_footer(); ?>
