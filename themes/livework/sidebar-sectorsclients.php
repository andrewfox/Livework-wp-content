<?php
/**
 * The Sidebar containing list of sectors + clients
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?>


				<div class="sectors-clients-list" class="clearfix">
					
					<div class="wrapper">

						<ul>
						<?php
						$sectors = get_terms( 'sectors', 'orderby=count&hide_empty=0' ); 
						foreach ($sectors as $sector) { 
							if ($sector->count > 0) { ?>
							<li><a href="<?php bloginfo('url'); ?>/our-clients-stories/<?php echo $sector->slug ?>"><?php echo $sector->name ?></a>
								<ul>
							<?php 
								$clients = get_terms( 'clients', 'orderby=count&hide_empty=0' );
								foreach ($clients as $client) { ?>
									<li><a href="<?php bloginfo('url'); ?>/case-study/<?php echo $client->slug ?>"><?php echo $client->name ?></a></li>
								
								<?php } ?>
								</ul>
							</li>
							<?php } ?>
						<?php } ?>
						</ul>

					</div><!-- /.wrapper -->

				</div><!-- /.sectors-clients-list -->
