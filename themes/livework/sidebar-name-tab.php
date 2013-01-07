<?php
/**
 * The Sidebar naming tab
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?>

					<?php if ((get_post_type( $post->ID ) == "case_study")) : ?>
					<h4 class="tab">Client story</h4>
					<?php elseif ( in_category(199) ) : ?>
					<h4 class="tab">Point of view</h4>
					<?php elseif ( in_category(191) ) : ?>
					<h4 class="tab">Article</h4>
					<?php else : ?>
					<h4 class="tab">News</h4>
					<?php endif; ?>
