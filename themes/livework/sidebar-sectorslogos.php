<?php
/**
 * The Sidebar containing list of sectors + logos
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?>


				<div class="logos-list clearfix">

					<div class="wrapper">
					
						
						<ul>
						<?php
						$sectors = get_terms( 'sectors', 'orderby=count&hide_empty=0' ); 
						foreach ($sectors as $sector) 
						//get each sector
						{ 
							 
							if ($sector->count > 0) 
							//if it has case studies
							{ ?>
							
								<li>
									<a href="<?php bloginfo('url'); ?>/our-clients-stories/<?php echo $sector->slug ?>"><?php echo $sector->name ?>
									</a>
								
								
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
											
											<?php 
											
											if (in_category('logo-only-case-study')) { 
												echo '<img src="';
												the_field('casestudies_logo');
												echo '" alt="';
												the_title();
												echo '" />';
											}
											else { 
												echo '<a href="';
												echo the_permalink();
												'" title="';
												echo the_field('casestudies_one_liner');
												' with ';
												echo the_title();
												echo '" rel="bookmark">';
													if( get_field('casestudies_logo') ){ 
														echo'<img src="';
														the_field('casestudies_logo');
														echo '" alt="';
														the_field('casestudies_one_liner');
														echo' with ';
														the_title();
														echo'" />';
											}
												
												echo '</a>';
											?>
											
											</li>
											
											<?php 
												
											} 
											endwhile;
											wp_reset_postdata();
							
											
											?>
									</ul>		
								</li>
										
										<?php 
							}
						}
									?>
									


							</ul>
							
							
					</div><!-- /.wrapper -->

				</div><!-- /.sectors-clients-list -->
