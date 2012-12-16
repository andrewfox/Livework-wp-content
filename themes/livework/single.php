<?php
/**
 * The Template for displaying all single blog posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
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

					<?php if (in_category(10)) : ?>
					<div class="topimage"><?php the_post_thumbnail('full'); ?></div>
					<?php else : ?>
					<?php the_post_thumbnail('full'); ?> 
					<?php endif; ?>

					<div id="introduction">
						<div class="wrapper">
							<h4 class="section-title">News</h4>
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
								<?php the_content(); ?>
							</div>

							<?php endwhile; ?>

							<div class="socialmedia"><a href="http://twitter.com/?status=@liveworkstudio" class="twitter"><span>twitter</span> Comment on Twitter</a></div>

						</div>
						
					</div><!-- /.wrapper -->



					<aside id="sidebar-more-posts">
	
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
							<h2>Written by <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
							<?php the_post_thumbnail('thumbnail'); ?> <?php the_title(); ?>
							</a></h2>
						</li>
				
					<?php endwhile; ?>
	
					<!-- End Loop -->
	
					</aside>



				</article>


				<div class="latest-mini clearfix">
				
			 	<div class="wrapper">

					<h2><a href="<?php bloginfo('url'); ?>/latest"><strong>Latest</strong> from Livework</a></h2>

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
