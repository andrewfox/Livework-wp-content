
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
					<div class="topimage"><?php the_post_thumbnail('large'); ?></div>
					<div id="introduction">
						<div class="wrapper">
							<h4><a href="<?php bloginfo('url'); ?>/our-clients-stories">Our Clients Stories</a></h4>
							<h1><?php the_field('casestudies_one_liner'); ?></h1>
							<h2 class="casestudy-title">with <?php the_title(); ?></h2>
							<div class="excerpt">
								<?php the_excerpt() ?>
							</div>
						</div><!-- /.wrapper -->
					</div><!-- /#introduction -->
				</div>

				<article id="people-<?php the_ID(); ?>" class="main clearfix">
					<div class="wrapper">

						<div id="main" class="clearfix">

							<div class="entry-content">
								<?php the_content(); ?>
							</div>
	
							<?php endwhile; ?>
						</div>
						
						<aside id="sidebar-more-posts">
						<?php 
						// Featured bar
						get_sidebar('featuredbar-vert'); 
						?>
						</aside>
		
								
					</div><!-- /.wrapper -->
				</article>



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
