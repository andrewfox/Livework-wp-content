<?php
/**
 * The Sidebar containing list of sectors + clients
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?>
				

									<?php $args = array(
										'post_type'=> 'case_study',
										'taxonomy' => 'sectors',
										'showposts' => 10,
										'cat' => -196
//										'term' => $sector->slug,
//										'orderby' => 'title',
//										'order' => 'ASC'
									);
						
									$the_query = new WP_Query( $args );
									while ( $the_query->have_posts() ) : $the_query->the_post(); 
									?>
									<h4>
										<?php if (in_category('logo-only-case-study')) : ?>
										<?php the_title(); ?>
										<?php else: ?>
										<a href="<?php the_permalink() ?>" rel="bookmark" title="Client story <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
										<?php endif; ?>
									</h4>
									<?php endwhile; ?>
									<?php wp_reset_postdata() ?>
