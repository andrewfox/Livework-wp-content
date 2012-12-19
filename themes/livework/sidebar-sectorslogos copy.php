<?php
/**
 * The Sidebar containing list of sectors + logos
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?>


				<div class="all-logos-list clearfix">

					
						
						<ul class="all-sectors clearfix">
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
								
								
									<ul class="all-logos">
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
											
											
											
											<?php 
											
											if( get_field('casestudies_logo') == '' ){
												
												}
												
											else {
												echo '<li>';
												
												
												if (in_category('logo-only-case-study')) { 
													echo '<img src="';
													the_field('casestudies_logo');
													echo '" alt="';
													the_title();
													echo '" />';
												}
												else { 
													echo '<a href="';
													the_permalink();
													echo '" title="';
													the_field('casestudies_one_liner');
													echo ' with ';
													the_title();
													echo '" rel="bookmark">';
														if( get_field('casestudies_logo') ){ 
															echo'<img src="';
															the_field('casestudies_logo');
															echo '" alt="';
															the_field('casestudies_one_liner');
															echo' with ';
															the_title();
															echo'" a/>';
												}
													
//													echo '</a>';
													
												echo '</li>';
											}
											
											?>
											
										
											
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
							
							

				</div><!-- /.sectors-clients-list -->
