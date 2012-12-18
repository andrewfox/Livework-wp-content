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
									<?php if (in_category('logo-only-case-study')) { 
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
										endwhile;
										wp_reset_postdata()
									} ?>
							</ul>
							<?php } ?>




					</div><!-- /.wrapper -->

				</div><!-- /.sectors-clients-list -->
