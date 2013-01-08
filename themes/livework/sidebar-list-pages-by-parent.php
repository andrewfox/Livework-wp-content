<?php
/**
 * The List pages by parent
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?>

				<div class="wrapper">
				
							<?php query_posts(array('showposts' => -1, 'post_parent' => $parentid, 'post_type' => 'page', 'order' => 'asc', )); while (have_posts()) { the_post(); ?>
				
							<div class="">
				
								<h2><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></h2>
				
								
				
							</div> 
				
							<?php } ?>
				
						</div> <!-- /.wrapper -->