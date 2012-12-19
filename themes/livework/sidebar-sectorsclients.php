<?php
/**
 * The Sidebar containing list of sectors + clients
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?>


				<div class="sectors-clients-list clearfix">

					<div class="wrapper">
					
						

					<?php
					$sectors = get_terms( 'sectors', 'orderby=count&hide_empty=0' ); 
					foreach ($sectors as $sector) { 
						if ($sector->count > 0) { ?>
						<ul>
							<li>
								<a href="<?php bloginfo('url'); ?>/our-clients-stories/<?php echo $sector->slug ?>"><?php echo $sector->name ?></a>
								<ul>
									<?php $args = array(
										'post_type'=> 'case_study',
										'taxonomy' => 'sectors',
										'term' => $sector->slug,
										'orderby' => 'title',
										'order' => 'ASC'
									);
						
									$the_query = new WP_Query( $args );
									while ( $the_query->have_posts() ) : $the_query->the_post(); 
									?>
									<li>
										<?php if (in_category('logo-only-case-study')) : ?>
										<?php the_title(); ?>
										<?php else: ?>
										<a href="<?php the_permalink() ?>" rel="bookmark" title="Client story <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
										<?php endif; ?>
									</li>
									<?php endwhile; ?>
									<?php wp_reset_postdata() ?>
								</ul>
							</li>
						</ul>
						<?php } ?>
					<?php } ?>




					</div><!-- /.wrapper -->

				</div><!-- /.sectors-clients-list -->
