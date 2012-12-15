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
						<ul class="list-archive-cat">
							<li>Categories</li>
							<?php wp_list_categories('exclude=196&order=DESC&orderby=count&show_count=0&title_li='); ?>
						</ul>
						<div class="expander">See all &rarr;</div>
					</div>
