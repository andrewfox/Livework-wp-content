<?php
/**
 * The Sidebar containing Feature Bar
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */
?>

				<?php 
				$testforfeature = get_field('featured_content');
				$testforquote = get_field('featured_quote');
				
				if ($testforfeature == "") {
					
				}
								
				else{
				 ?>
					<div class="featured clearfix">
										 
					 	<div class="wrapper">
					 		
					 		<?php if ($testforquote == "") {
					 			$quote = false;
					 		}
					 						
					 		else{
					 		 ?>
							<div class="featured_post">
								<h3 class="section-title">Quote</h3>
								<blockquote><?php the_field('featured_quote');?></blockquote>
								<p><?php the_field('featured_quote_attribution');?></p>
							</div>
							
							<?php }?>

							<?php 
							// works out how many features there are
							if ($quote=true) {
								$maxfeatures = 3; // there is a feature quote
							} elseif (is_home()) {
								$maxfeatures = 8; // homepage
							} else {
								$maxfeatures = 4; // no quote, not the homepage
							}
							$posts = get_field('featured_content');
							
		 					if( $posts ): ?>
	 						<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
	 						<?php setup_postdata($post); ?>
	 						<div class="featured_post">
	 							<h3 class="section-title">
	 							<?php
	 							$theposttype = get_post_type( $post->ID );
	 							if ($theposttype == 'case_study') {
	 								if (is_front_page()) {
										$terms = wp_get_object_terms($post->ID, 'sectors');
										echo '<a href="'.get_term_link($terms[0]->slug, 'sectors').'">'.$terms[0]->name.'</a>';   
									} else {
		 								echo 'Case study';
	 								}
	 								$thumbnail = 'logo';
	 							} else if ($theposttype = 'people') {
	 								echo 'Liveworker';
	 								$thumbnail = 'featured';
	 							} else if ($theposttype = 'theme') {
	 								echo 'Theme';
	 								$thumbnail = 'featured';
	 							}
	 							?>
	 							</h3>
	 							<a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark" class="feature-<?php echo $theposttype ?>">
	
									<?php if ($thumbnail == 'logo') { ?>
										<img src="<?php the_field('casestudies_logo'); ?>" alt="<?php the_title(); ?>" />
									<?php } else { 
										the_post_thumbnail('medium');
									} ?>
	
									<?php if ($theposttype == 'case_study') { ?>
										<span><?php the_field('casestudies_one_liner'); ?></span>
									<?php } ?>

									<?php if ($theposttype == 'people') { ?>
										<span><?php the_title(); ?></span>
									<?php } ?>
	
								</a>
	 						</div>
	 						<?php endforeach; ?>
		 					<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		 				<?php endif; ?>
	
					 	</div> <!-- /.wrapper -->

					</div> <!-- /.feature-posts -->
					
					<?php
					}
					?>
