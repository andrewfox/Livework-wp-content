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
		</section><!-- #main -->
		<footer role="contentinfo">
			<?php echo date("Y"); ?> <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
			<?php wp_nav_menu( array( 'container_class' => 'menu-footer', 'theme_location' => 'Footer' ) ); ?>
			<ul>
				<li><a href="http://twitter.com/liveworkstudio" class="ss-social">Twitter</a></li>
				<li><a href="https://www.facebook.com/liveworkglobal" class="ss-social">Facebook</a></li>
			</ul>
		</footer><!-- footer -->
<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>




	</body>
</html>