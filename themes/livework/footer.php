<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */
?>
		</section><!-- #content -->


		<footer role="contentinfo">

			<?php echo date("Y"); ?> <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			
			<nav id="social">
				<?php wp_nav_menu( array('container' => '', 'menu' => 'Footer' )); ?>
			</nav>

		</footer><!-- footer -->


		<div id="hello" class="arrows">
		
		<?php
		$posts3 = get_field('previous_page');
		if( get_field('previous_page') ): ?>
		<?php foreach( $posts3 as $post): // variable must be called $post (IMPORTANT) 
		setup_postdata($post); ?>
		<a href="<?php the_permalink(); ?>"><img class="left-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/left-arrow.png" alt="go to previous page" /></a>
		<?php endforeach; 
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
		endif; ?>
		
		<?php
		$posts2 = get_field('next_page');
		if( $posts2 ): 
		foreach( $posts2 as $post): // variable must be called $post (IMPORTANT) ?>
		<?php setup_postdata($post); ?>
		<a href="<?php the_permalink(); ?>"><img class="right-arrow" src="<?php bloginfo( 'template_directory' ); ?>/img/right-arrow.png" alt="go to next page" /></a>
		<?php endforeach; 
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
		endif; ?>
		
		</div>



<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>

	</body>

</html>