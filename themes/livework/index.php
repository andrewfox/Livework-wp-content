<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>

				<article class="main">
					<div class="wrapper">
						<h1 class="page-title">Latest</h1>
						<p>News, articles, client stories and blog posts.</p>
					</div>


					<?php get_sidebar( 'archives' ); ?>


<?php
/* Run the loop to output the posts.
 * If you want to overload this in a child theme then include a file
 * called loop-index.php and that will be used instead. 
 */
 get_template_part( 'loop' );
?>


					<?php get_sidebar( 'archives-date' ); ?>



				</article><!-- /#bodytext -->

</div> <!--end wrapper-->


<?php get_footer(); ?>
