<?php
/**
 * The Template for displaying all single blog posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
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

					<?php if (in_category(10)) :  // show topimage if highlight ?>
					<div class="topimage"><?php the_post_thumbnail('full'); ?></div>
					<?php endif; ?>

					<div id="introduction">
						<div class="wrapper">

							<?php if (in_category(10)) :  // show regular large image if NOT highlight?>
							<?php else : ?>
							<?php the_post_thumbnail('medium'); ?> 
							<?php endif; ?>

							<?php get_sidebar( 'name-tab' ); ?>
							
							<h1><?php the_title(); ?></h1>
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

				<article id="post-<?php the_ID(); ?>" class="main clearfix">
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
									
								<!--List categories-->
								
								<h4>Categories</h4>
								<?php echo get_the_category_list(); ?>
								
								<!--END:List categories-->
								
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


				<div class="latest-mini clearfix">
				
			 	<div class="wrapper">

					<h2><a href="<?php bloginfo('url'); ?>/latest">Latest from Livework</a></h2>

					<ul>
						<?php
						// The Query
						$the_query = new WP_Query( 'posts_per_page=8' );
						
						// The Loop
						while ( $the_query->have_posts() ) : $the_query->the_post();?>
						<li>
							<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
							<?php 
							if(has_post_thumbnail()) :
								the_post_thumbnail('thumb-large'); 
							endif;?>
								<span><?php the_title();?> <span class="entry-date"><?php the_time('j/m/Y') ?></span></span>
							</a>
						</li>
						<?php endwhile;
						
						// Reset Post Data
						wp_reset_postdata(); ?>
						
					</ul>

				</div> <!-- /.wrapper -->

			</div> <!-- /.latest-mini -->
				

<?php get_footer(); ?>
