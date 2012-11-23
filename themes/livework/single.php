<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */

get_header(); ?>
			
<?php
$categories = get_the_category();
$other = '';
$old = '<div id="old-post"> <!--old post-->';
$output = '';
if($categories){
	foreach($categories as $category) {
		$output = $category->cat_name;
		if ($output == 'hightlight') {
			$feature = true;
			
		}
		else {
		$standard = true;
		}
	}

}


if ($feature = true) {

//----------------------------------
?>
<div id="person-intro">
		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php the_post_thumbnail('full'); ?>
			<div id="person-headline" >
				<div class="wrapper">
					<h4><a href="<?php bloginfo('url'); ?>/our-team">Our Team</a></h4>
					<h1><?php the_title(); ?>: <span><?php the_field('job_title'); ?></span></h1>
					<div class="excerpt">
						<?php the_excerpt() ?>
					</div>
				</div>
			</div>
		</div>
		<article id="people-<?php the_ID(); ?>" class="main clearfix">
			<div class="wrapper">
				<div id="main" class="clearfix">
	
					<div class="entry-content left-col">
						<?php the_content(); ?>
					</div>
	
					<?php endwhile; ?>
		</div>
			
			
		<aside id="sidebar-more-posts">
		
			<h2>Written by <?php the_author(); ?></h2>
	
			
			<!-- The Loop -->
			
			    <?php $args = array( 
			    					'author'=> $authorid,
			    					'post_type' => 'people', 
			    					'posts_per_page' => 1, 
			    					
			    					);
			    $loop = new WP_Query( $args );
			    while ( $loop->have_posts() ) : $loop->the_post(); ?>
			        <li>
			            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
			            <?php the_title(); ?></a>
			            <?php the_post_thumbnail('small'); ?>
			        </li>
			
			    <?php endwhile; ?>
			
			
			<!-- End Loop -->
			
			
<!---->
		</aside>
			
	</div>
</div>							
							
											



					

					
					
				</article><!-- #post-## -->
		<div class="extra">		
			<div class="wrapper">
				<div id="morepeople" >
					<h2>Livework people</h2>
					<ul id="people">
										<?php query_posts(array('post_type' => 'people', 'posts_per_page' => -1 ,'orderby' => 'title', 'order' => 'ASC', 'paged'=> $paged)); ?>
							
										<?php while(have_posts()) : the_post();  ?>
					
											<li><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark">
												<?php 
												if(has_post_thumbnail()) :
																		the_post_thumbnail('original'); 
																		else :				
												
																		endif;
												
												
												the_title(); 
											
											
											
											
											?>
											</a></li>
											
											<?php endwhile; ?>
											
											
										
					</ul>
				</div>
			</div>
		</div><?php get_sidebar(); ?>
		
	</div>	
<?php
//----------------------------------
	
}

else {
//----------------------------------
?>
<div id="single-post-basic">
		
			<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
			<?php the_post_thumbnail('full'); ?>
				<div class="wrapper">
					<h4><a href="<?php bloginfo('url'); ?>/blog">Blog</a></h4>
					<h1><?php the_title(); ?>: <span></span></h1>
				</div>
		</div>
		<article id="post-<?php the_ID(); ?>" class="main clearfix">
			<div class="wrapper">
				<div id="main" class="clearfix">
	
					<div class="entry-content">
														
							<div class="entry-meta">
								<span class="meta-prep meta-prep-author"><?php _e('From ', 'blankslate'); ?></span>
								<span class="author vcard"><a class="url fn n" href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="<?php printf( __( 'View all articles by %s', 'blankslate' ), $authordata->display_name ); ?>"><?php the_author(); ?></a></span>
								<span class="meta-sep"> | </span>
								<span class="meta-prep meta-prep-entry-date"><?php _e('Published ', 'blankslate'); ?></span>
								<span class="entry-date"><abbr class="published" title="<?php the_time('Y-m-d\TH:i:sO') ?>"><?php the_time( get_option( 'date_format' ) ); ?></abbr></span>
								<?php edit_post_link( __( 'Edit', 'blankslate' ), "<span class=\"meta-sep\"> | </span>\n\t\t\t\t\t\t<span class=\"edit-link\">", "</span>\n\t\t\t\t\t" ) ?>
							</div>
							
							<?php if ( has_post_thumbnail() ) {
								echo '<div class="post-image blog-image">';
								the_post_thumbnail('full');
								echo '</div>';
							} ?>

							<?php the_content(); ?>
					</div>
					
				</div>
	
					<?php endwhile; ?>
			</div>
			
			
		<aside id="sidebar-more-posts">
		
			
			
<!---->
		</aside>
			
	</div>
</div>							
							
											



					

					
					
				</article><!-- #post-## -->
		<div class="extra">		
			<div class="wrapper">
								</div>
			</div>
		</div><?php get_sidebar(); ?>
		
	</div>	
<?php
//----------------------------------	
}


?>			
			
		
<?php get_footer(); ?>
