<?php
/**
 * Template Name: Page - People Page
 * Description: People page intro, plus list
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
				
				
				
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="splash alt <?php the_field('colour'); ?>">
					<div class="topimage"><?php the_post_thumbnail('large'); ?></div>
					<div id="introduction" class="alt">
						<div class="wrapper">
							<h1 class="tab"><?php the_title(); ?></h1>
							<div class="excerpt">
								<?php the_content() ?>
							</div>
						</div>
					</div>
				</div>

				<article id="page-<?php the_ID(); ?>" class="main">
				
				
				

				

				</article><!-- #page-## -->


				<ul id="offices">
					<li class="all on">All</li>
					<li class="london">London</li>
					<li class="oslo">Oslo</li>
					<li class="sao-paulo">S&atilde;o Paulo</li>
					<li class="rotterdam">Rotterdam</li>
				</ul>


				<ul id="people" class="clearfix">

				<?php query_posts(array('post_type' => 'people', 'posts_per_page' => -1 , 'order' => 'ASC', 'orderby' => 'title', 'paged'=> $paged));
				while(have_posts()) : the_post();  ?>

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

				<?php wp_reset_query();?>


<?php endwhile; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>