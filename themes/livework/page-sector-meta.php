<?php
/**
 * Template Name: Page - Sector Meta
 * Description: Our Client's Stories Sector page: fullscreen area, list of case studies and themes
 *
 * @package WordPress
 * @subpackage Livework
 * @since Boilerplate 1.0
 */

get_header(); ?>


				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<div class="splash alt <?php the_field('colour'); ?>">
					<div class="topimage"><?php the_post_thumbnail('large'); ?></div>
					<div id="introduction" class="alt">
						<div class="wrapper">
							<h1><?php the_title(); ?></h1>
							<div class="excerpt">
								<?php the_content() ?>
							</div>
						</div>
					</div>
				</div>
				<?php endwhile; ?>

				<article id="page-<?php the_ID(); ?>" class="main">





<div class="wrapper">

			<?php query_posts(array('showposts' => -1, 'post_parent' => 9, 'post_type' => 'page', 'order' => 'asc', )); while (have_posts()) { the_post(); ?>

			<div class="office">

				<h2><a href="<?php the_permalink(); ?>" title="<?php printf( __('Read', 'blankslate'), the_title_attribute('echo=0') ); ?>" rel="bookmark"><?php the_title(); ?><?php the_post_thumbnail('thumb-large');  ?></a></h2>

				

				<div class="vcard">

					<?php if ( get_field('studio_address') ) : ?><p class="studio-address"><span class="ssstandard">location</span> <?php the_field('studio_address'); ?></p><?php endif; ?>
					<?php if ( get_field('studio_telephone') ) : ?><p class="tel"><span class="ssstandard">call</span> <?php the_field('studio_telephone'); ?></p><?php endif; ?>
					<?php if ( get_field('studio_fax') ) : ?><p class="fax"><span class="ssstandard">fax</span> <?php the_field('studio_fax'); ?></p><?php endif; ?>
					<?php if ( get_field('studio_email') ) : ?><p class="email"><span class="ssstandard">email</span> <a href="mailto:<?php the_field('studio_email'); ?>"><?php the_field('studio_email'); ?></a></p><?php endif; ?>
					<?php if ( get_field('studio_twitter') ) : ?><p class="studio-twitter"><span class="sssocial">twitter</span> <a href="http://twitter.com/<?php the_field('studio_twitter'); ?>">@<?php the_field('studio_twitter'); ?></a></p><?php endif; ?>
					<?php if ( get_field('studio_facebook') ) : ?><p class="studio-facebook"><span class="sssocial">facebook</span> <a href="http://facebook.com/<?php the_field('studio_facebook'); ?>">Facebook</a></p><?php endif; ?>

				</div> <!-- /.vcard -->

			</div> <!-- /.office -->

			<?php } ?>

		</div> <!-- /.wrapper -->






				<?php 
				// Featured bar
//				get_sidebar('featuredbar'); 
				?>

				<?php 
				// Sectors + clients listings
//				get_sidebar('sectorslogos'); 
				?>
				
				<?php 
				// Sectors + clients listings
//				get_sidebar('sectorsclients'); 
				?>




	 			</article> <!-- /.main -->










	<?php get_footer(); ?>