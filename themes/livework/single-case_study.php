
<?php
/**
 * The Template for displaying all single Case Study posts.
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

					<?php if (in_category(10)) : // show topimage if highlight ?>
					<div class="topimage"><?php the_post_thumbnail('full'); ?></div>
					<?php endif; ?>

					<div id="introduction">
						<div class="wrapper">

							<?php if (in_category(10)) : // show regular large image if NOT highlight ?>
							<?php else : ?>
							<?php the_post_thumbnail('large'); ?> 
							<?php endif; ?>

							<h4 class="section-title">Client Story</h4>
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

				<article id="people-<?php the_ID(); ?>" class="main clearfix">
					<div class="wrapper">

						<div id="main" class="clearfix">
							
							<div class="entry-content">

								<aside class="meta-data">

									<?php $authorid = get_the_author_meta('ID') ?> 
									<?php $args = array( 
										'author'=> $authorid,
										'post_type' => 'people', 
										'posts_per_page' => 1, 
									);
									$loop = new WP_Query( $args );
									while ( $loop->have_posts() ) : $loop->the_post(); ?>

									<a href="<?php the_permalink() ?>" rel="bookmark" title="Find out more about <?php the_title(); ?>">
										<?php the_post_thumbnail('thumbnail'); ?>
										<span>By <?php the_title(); ?></span>
									</a>

									<?php endwhile; ?>
									<?php wp_reset_query();?>
									<!-- End Loop -->

									<ul class="socialmedia">
										<li><a href="http://twitter.com/?status=@liveworkstudio" class="twitter"><span>twitter</span> Comment on Twitter</a></li>
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
						<div class="" >
							
							
							

							
							
							
							
							<?php
								$terms = get_the_terms( $post->ID, 'sectors' );
								$sectors_terms = array();
								foreach ( $terms as $term ) {
									$sectors_terms[] = $term->name;
								}
								$thesector = join( ", ", $sectors_terms );
							?>
							<h2 class="section-title">More from <span><?php echo $thesector; ?> </span></h2>
							
							<ul class="below-more">
							<?php 
							
							$args = array(
									'post_type'=> 'case_study',
									'taxonomy' => 'sectors',
									'term' => $thesector,
								);
							
							$the_query = new WP_Query( $args );
							while ( $the_query->have_posts() ) : $the_query->the_post(); 
							
							?>
							
							<?php if ( in_category('logo-only-case-study') ) { ?>
							
							<?php } else { ?>
							
								<li>
									<h3><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
									<?php 
									the_title();
									if(has_post_thumbnail()) :
										the_post_thumbnail('medium'); 
										else :				
										endif;
									?>
									</a><h3>
								</li>
								<?php } ?>
								<?php endwhile; ?>
								<?php wp_reset_postdata() ?>
								
							
							</ul>

						</div>
					</div><!-- /.wrapper -->
				</div><!-- /#extra -->

<?php get_footer(); ?>
