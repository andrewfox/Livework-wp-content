
<?php
/**
 * The Template for displaying all single People posts.
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>
			
	<div id="person-intro">
		<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
		<?php the_post_thumbnail('full'); ?>
		<div id="person-headline" >
			<div class="wrapper">
				<h4><a href="../../our-team">Our Team</a></h4>
				<h3><?php the_title(); ?>: <span><?php the_field('job_title'); ?></span></h3>
				<h2><?php the_excerpt() ?></h2>
			</div>
		</div>
	</div>
<div class="wrapper">
	<div id="main">
				
				
				
				

		
		<?php the_author(); ?> 
		
		
		
		
			
		<div class="entry-content left-col">
				<?php the_content(); ?>
		<?php endwhile; ?>
		</div>
			
			
		<aside id="sidebar-more-posts">
		
			<h2>Posts by <?php the_title(); ?></h2>
			
			<?php
			    $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
			    ?>
			
			    <h2>About: <?php echo $curauth->nickname; ?></h2>
			    <dl>
			        <dt>Website</dt>
			        <dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
			        <dt>Profile</dt>
			        <dd><?php echo $curauth->user_description; ?></dd>
			    </dl>
			
			    <h2>Posts by <?php echo $curauth->nickname; ?>:</h2>
			
			    <ul>
			<!-- The Loop -->
			
			    <?php $args = array( 'post_type' => 'people', 'posts_per_page' => 1 );
			    $loop = new WP_Query( $args );
			    while ( $loop->have_posts() ) : $loop->the_post(); ?>
			        <li>
			            <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
			            <?php the_title(); ?></a>,
			            <?php the_time('d M Y'); ?> in <?php the_category('&');?>
			        </li>
			
			    <?php endwhile; ?>
			
			
			<!-- End Loop -->
			
			
			<?php query_posts( 'posts_per_page=5' . '&author_name=' . $user_identity ); ?>
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<div class="mini-post-content">
			<h1><a href='<?php the_permalink() ?>'
			rel='bookmark' title='<?php the_title(); ?>'>
			<?php the_title(); ?><span> <?php the_date('j/n/Y'); ?></span></h1></a>
			
<!--					<h5 title="Permanent Link to <?php the_title(); ?>">Read More</h5>-->
			</div>
			<?php endwhile; ?>
			<?php else : ?>
			<?php endif; ?>	
			<?php wp_reset_query();?>
		</aside>
			
	</div>
</div>							
							
											



					

					
					
				</article><!-- #post-## -->
		<div class="grey-container">		
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
		</div>
			
<?php get_sidebar(); ?>
<?php get_footer(); ?>
