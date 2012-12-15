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
						<ul class="list-archive-cat">
							<?php wp_list_categories('order=DESC&orderby=count&show_count=0&title_li='); ?>
						</ul>
					</div>
