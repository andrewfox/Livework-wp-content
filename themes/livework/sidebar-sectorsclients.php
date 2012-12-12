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

									</ul>
								</li>
							</ul>
							<?php } ?>
						<?php } ?>
						


										<?php
//for a given post type, return all
$post_type = 'case_study';
$tax = 'sectors';
$tax_terms = get_terms($tax);
if ($tax_terms) {
  foreach ($tax_terms  as $tax_term) {
    $args=array(
      'post_type' => $post_type,
      "$tax" => $tax_term->slug,
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'caller_get_posts'=> 1
    );

    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) {
      echo 'List of '.$post_type . ' where the taxonomy '. $tax . '  is '. $tax_term->name;
      while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <p><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></p>
        <?php
      endwhile;
    }
    wp_reset_query();
  }
}
?>

					</div><!-- /.wrapper -->

				</div><!-- /.sectors-clients-list -->
