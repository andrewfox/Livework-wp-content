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
				<div id="splash" class="main <?php echo $catClass ?>">
		
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<?php 
					if ($standard == true) {
						echo'<div class="wrapper">';
						the_post_thumbnail('medium'); 
						echo'</div>';
					} else {
						the_post_thumbnail('full');
					}
					?>
					<div id="introduction" >
						<div class="wrapper">
							<h4><a href="<?php bloginfo('url'); ?>/news">News</a></h4>
							<h1><?php the_title(); ?>: <span><?php the_field('job_title'); ?></span></h1>
							<div class="excerpt">
								<?php the_excerpt() ?>
							</div>
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

							<div class="socialmedia"><a href="http://twitter.com/?status=@liveworkstudio" class="link-pad">Comment on Twitter</a></div>

						</div>
						
					</div><!-- /.wrapper -->
				</article>

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

				<div class="extra">		
					<div class="wrapper">
						<div id="morepeople" >
							<h2>Livework people</h2>
							<ul id="people">
								<?php query_posts(array('post_type' => 'people', 'posts_per_page' => -1 ,'orderby' => 'title', 'order' => 'ASC', 'paged'=> $paged)); ?>
								<?php while(have_posts()) : the_post();  ?>
								<li>
									<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
									<?php 
									if(has_post_thumbnail()) :
										the_post_thumbnail('original'); 
									else :				
									endif;
									the_title(); 
									?>
									</a>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
					</div><!-- /.wrapper -->
				</div><!-- /#extra -->


<?php get_footer(); ?>
