<?php
/**
 * The Sidebar containing blog archives listings
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?>


					<div class="archives clearfix">
						<ul class="list-archive-date">
							<li>Date archives</li>
							<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
						</ul>
						<div class="expander">See all dates &rarr;</div>
					</div>
