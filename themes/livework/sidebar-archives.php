<?php
/**
 * The Sidebar containing blog archives
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?>


					<div class="archives">
						<ul class="list-archive-date">
							<?php wp_list_categories('orderby=name&show_count=1&title_li='); ?>
						</ul>
						<ul class="list-archive-cat">
							<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
						</ul>
					</div>
