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
								<li><a href="<?php bloginfo('url'); ?>/our-clients-stories/<?php echo $sector->slug ?>"><?php echo $sector->name ?></a>
									<ul>
																
										<?php 
										$sector_slug = $sector->slug;
										query_posts(array('post_type' => 'case_study', 'sectors' => 'financial', 'posts_per_page' => -1 , 'order' => 'ASC', 'orderby' => 'title'));
										while(have_posts()) : the_post();  ?>

										<li>
											<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
												<?php the_title(); ?> (<?php echo $sector->slug ?>)
											</a>
										</li>

										<?php endwhile; ?>
										
										
										<?php 
										$query = new WP_Query( 'post_type=case_study', array( 'sectors' => 'financial' ) ); 
										if( $query->have_posts() ) {
											echo 'List of '.$post_type . ' where the taxonomy '. $tax . '  is '. $tax_term->name;
											while ($query->have_posts()) : $query->the_post(); ?>
												<p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
											<?php endwhile;
										}
										wp_reset_query();
										?>
										
										

									</ul>
								</li>
							</ul>
							<?php } ?>
						<?php } ?>
						

					</div><!-- /.wrapper -->

				</div><!-- /.sectors-clients-list -->
