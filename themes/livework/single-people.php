<?php
/**
 * The Template for displaying all single People posts.
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
			
	<div id="person-intro">
	
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php the_post_thumbnail('full'); ?>
		<div id="person-headline" >
			<div class="wrapper">
				<h4><a href="<?php bloginfo('url'); ?>/our-team">Our Team</a></h4>
				<h1><?php the_title(); ?>: <span><?php the_field('job_title'); ?></span></h1>
				<div class="excerpt">
					<?php the_excerpt() ?>
				</div>
			</div>
		</div>
	</div>
	<article id="people-<?php the_ID(); ?>" class="main clearfix">
		<div class="wrapper">
			<div id="main" class="clearfix">

				<div class="entry-content left-col">
					<?php the_content(); ?>
				</div>

				<?php endwhile; ?>

				<aside id="sidebar-more-posts">

					<h2 class="section-title">Posts by <?php the_title(); ?></h2>

					<?php query_posts( 'posts_per_page=5' . '&author_name=' . $user_identity ); ?>
					<?php if (have_posts()) : ?>
					<ul>
					<?php while (have_posts()) : the_post(); ?>
					<li>
						<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>">
							<?php the_title(); ?><span class="pub-date"> <?php the_date('j/n/Y'); ?></span>
						</a>
					</li>
					<?php endwhile; ?>
					</ul>
					<?php else : ?>
					<?php endif; ?>	
					<?php wp_reset_query();?>
				</aside>
					
			</div><!-- /#main -->
		</div><!-- /.wrapper -->

	</article><!-- #post-## -->

	<aside class="extra">		
		<div class="wrapper">
			<div id="morepeople" >
				<h2 class="section-title">Livework people</h2>
				<ul id="people">
					<?php query_posts(array('post_type' => 'people', 'posts_per_page' => -1 ,'orderby' => 'title', 'order' => 'ASC', 'paged'=> $paged)); ?>
		
					<?php while(have_posts()) : the_post();  ?>

						<li><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
							<?php 
							if(has_post_thumbnail()) :
													the_post_thumbnail('original'); 
													else :				
							
													endif;
							
							
							the_title(); 
						
						
						
						
						?>
						</a></li>
						
						<?php endwhile; ?>
									
				</ul>
			</div>
		</div>
	</aside>
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>
