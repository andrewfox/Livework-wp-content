<?php
/**
 * Template Name: Page - Home
 * Description: Homepage
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

				<article id="page-<?php the_ID(); ?>" class="main">

					<div class="entry-content">
						<?php the_content(); ?>
						<?php wp_link_pages( array( 'before' => '' . __( 'Pages:', 'livework' ), 'after' => '' ) ); ?>
						<?php edit_post_link( __( 'Edit', 'livework' ), '', '' ); ?>
					</div><!-- .entry-content -->

				</article><!-- #page-## -->
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		
		<ul>
			<?php
			// The Query
			$the_query = new WP_Query( 'posts_per_page=5' );
			
			// The Loop
			while ( $the_query->have_posts() ) : $the_query->the_post();?>
				<li>
					<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
					<?php 
					if(has_post_thumbnail()) :
						the_post_thumbnail('thumbnail'); 
						else :				
						endif;
					the_title(); 
					?>
					</a>
				</li>
			<?php endwhile;
			
			// Reset Post Data
			wp_reset_postdata(); ?>	
		</ul>
				
				
				
				
								<div id="world">
					<h1><a href="<?php bloginfo('url'); ?>/contact">Found the world over</a></h1>
					<ul>
						<li class="london"><a href="<?php bloginfo('url'); ?>/contact">London</a></li>
						<li class="oslo"><a href="<?php bloginfo('url'); ?>/contact">Oslo</a></li>
						<li class="sao-paulo"><a href="<?php bloginfo('url'); ?>/contact">Sao Paulo</a></li>
						<li class="rotterdam"><a href="<?php bloginfo('url'); ?>/contact">Rotterdam</a></li>
					</ul>
				</div>



<?php get_footer(); ?>