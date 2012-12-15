<?php
/**
 * The Sidebar containing blog archives listings
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?>


					<div class="archives">
						<ul class="list-archive-date">
							<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
						</ul>
					</div>
