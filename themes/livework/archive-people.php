<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the wordpress construct of pages
 * and that other 'pages' on your wordpress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>



	<article id="page-<?php the_ID(); ?>" class="main">
	
		<h1 class="page-title"><?php the_title(); ?></h1>

		<div class="entry-content">
			<ul>
				<?php
				
					$args = array( 'post_type' => 'people', 'posts_per_page' => -1 );
					$loop = new WP_Query( $args );
					while ( $loop->have_posts() ) : $loop->the_post();
						
						echo '<li>';
						
						the_title();
						echo '<div class="entry-content">';
						
	//					the_content();
						the_post_thumbnail('small');
	
						echo '</li>';
						
						
					endwhile;
				
				?>

			</ul>
		</div><!-- .entry-content -->

	</article><!-- #page-## -->








<?php get_sidebar(); ?>

<?php get_footer(); ?>