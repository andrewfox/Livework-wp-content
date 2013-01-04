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



		<?php
		// Previous arrow (left)
		$posts3 = get_field('previous_page');
		if( get_field('previous_page') ): ?>
		<?php foreach( $posts3 as $post): // variable must be called $post (IMPORTANT) 
		setup_postdata($post); ?>
		<a href="<?php the_permalink(); ?>" class="arrow-nav arrow-prev"><img src="<?php bloginfo( 'template_directory' ); ?>/img/left-arrow.png" alt="Go to previous page <?php the_title(); ?>" /><span><?php the_title(); ?></span></a>
		<?php endforeach; 
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
		endif; ?>
		
		<?php
		// Next arrow (right)
		$posts2 = get_field('next_page');
		if( $posts2 ): 
		foreach( $posts2 as $post): // variable must be called $post (IMPORTANT) ?>
		<?php setup_postdata($post); ?>
		<a href="<?php the_permalink(); ?>" class="arrow-nav arrow-next"><img src="<?php bloginfo( 'template_directory' ); ?>/img/right-arrow.png" alt="Go to next page <?php the_title(); ?>" /><span><?php the_title(); ?></span></a>
		<?php endforeach; 
		wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly 
		endif; ?>




		<footer role="contentinfo">
			
			<a href="<?php the_permalink(); ?>" class="livework-man"><img src="<?php bloginfo( 'template_directory' ); ?>/img/LIVEWORK_MAN_blue.png" alt="Livework team <?php the_title(); ?>" /></a>
			
			<p>&copy; <?php echo date("Y"); ?> <a href="<?php echo home_url( '/' ) ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			
			<nav class="social">
				<?php wp_nav_menu( array('container' => '', 'menu' => 'Footer' )); ?>
			</nav>
			
			<?php query_posts(array('showposts' => 4, 'post_parent' => 15, 'post_type' => 'page', 'order' => 'asc', )); while (have_posts()) { the_post(); ?>
			
			<div class="footer-offices">
				
				<h4><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
				<div class="vcard">
					<?php if ( get_field('studio_telephone') ) : ?><p class="tel"><span class="ssstandard">call</span> <?php the_field('studio_telephone'); ?></p><?php endif; ?>
					
					<?php if ( get_field('studio_email') ) : ?>
					<p class="email"><span class="ssstandard">email</span> 
						<a href="mailto:<?php the_field('studio_email'); ?>">
						Email <?php the_title(); ?></a>
					</p>
					
					<?php endif;?>
				</div>
			
			</div>
			
			<?php }; 
			wp_reset_postdata();?>
		</footer><!-- footer -->




		<!-- Symbolset JS support -->
		<script src="<?php bloginfo( 'template_directory' ); ?>/webfonts/ss-standard.js"></script>




<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>
	

	</body>

</html>