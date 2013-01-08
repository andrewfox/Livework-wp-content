<?php
/**
 * The List pages by parent
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?>

				
				
							<?php query_posts(array('showposts' => -1, 'post_parent' => 2500, 'post_type' => 'page', 'order' => 'asc', )); while (have_posts()) { the_post(); ?>
				
				
								<h4><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?></a></h4>
				
								
					
							<?php } ?>
							<?php wp_reset_query();?>
				
