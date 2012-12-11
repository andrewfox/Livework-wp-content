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
								query_posts(array('post_type' => 'case_study', 'sectors' => $sector_slug, 'posts_per_page' => -1 , 'order' => 'ASC', 'orderby' => 'title', 'paged'=> $paged));
				while(have_posts()) : the_post();  ?>

					<li <?php post_class(); ?>>
						<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
							<?php the_title(); ?>
						</a>
					</li>

					<?php endwhile; ?>

								
								
									</ul>
								</li>
							</ul>
							<?php } ?>
						<?php } ?>
						

					</div><!-- /.wrapper -->

				</div><!-- /.sectors-clients-list -->
