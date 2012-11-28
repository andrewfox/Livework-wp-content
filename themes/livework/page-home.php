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
		
		
		
		<ul>
			<?php
			// The Query
			$query = new WP_Query( 'posts_per_page=5' );
			
			// The Loop
			while ( $the_query->have_posts() ) : $the_query->the_post();
				echo '<li>';
				the_title();
				echo '</li>';
			endwhile;
			
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

<?php endwhile; ?>

<?php get_footer(); ?>