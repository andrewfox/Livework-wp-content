<?php
/**
 * Boilerplate functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, boilerplate_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached 
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'boilerplate_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Boilerplate
 * @since Boilerplate 1.0
 */




if ( ! function_exists( 'livework_filter_wp_title' ) ) :
	/**
	 * Makes some changes to the <title> tag, by filtering the output of wp_title().
	 *
	 * If we have a site description and we're viewing the home page or a blog posts
	 * page (when using a static front page), then we will add the site description.
	 *
	 * If we're viewing a search result, then we're going to recreate the title entirely.
	 * We're going to add page numbers to all titles as well, to the middle of a search
	 * result title and the end of all other titles.
	 *
	 * The site title also gets added to all titles.
	 *
	 * @since Twenty Ten 1.0
	 *
	 * @param string $title Title generated by wp_title()
	 * @param string $separator The separator passed to wp_title(). Twenty Ten uses a
	 * 	vertical bar, "|", as a separator in header.php.
	 * @return string The new title, ready for the <title> tag.
	 */
	function livework_filter_wp_title( $title, $separator ) {
		// Don't affect wp_title() calls in feeds.
		if ( is_feed() )
			return $title;

		// The $paged global variable contains the page number of a listing of posts.
		// The $page global variable contains the page number of a single post that is paged.
		// We'll display whichever one applies, if we're not looking at the first page.
		global $paged, $page;

		if ( is_search() ) {
			// If we're a search, let's start over:
			$title = sprintf( __( 'Search results for %s', 'livework' ), '"' . get_search_query() . '"' );
			// Add a page number if we're on page 2 or more:
			if ( $paged >= 2 )
				$title .= " $separator " . sprintf( __( 'Page %s', 'livework' ), $paged );
			// Add the site name to the end:livework_complete_version_removal
			$title .= " $separator " . get_bloginfo( 'name', 'display' );
			// We're done. Let's send the new title back to wp_title():
			return $title;
		}

		// Otherwise, let's start by adding the site name to the end:
		$title .= get_bloginfo( 'name', 'display' );

		// If we have a site description and we're on the home/front page, add the description:
		$site_description = get_bloginfo( 'description', 'display' );
		if ( $site_description && ( is_home() || is_front_page() ) )
			$title .= " $separator " . $site_description;

		// Add a page number if necessary:
		if ( $paged >= 2 || $page >= 2 )
			$title .= " $separator " . sprintf( __( 'Page %s', 'livework' ), max( $paged, $page ) );

		// Return the new title to wp_title():
		return $title;
	}
endif;
add_filter( 'wp_title', 'livework_filter_wp_title', 10, 2 );





if ( ! function_exists( 'livework_excerpt_length' ) ) :
	/**
	* Sets the post excerpt length to 40 characters.
	*
	* To override this length in a child theme, remove the filter and add your own
	* function tied to the excerpt_length filter hook.
	*
	* @since Twenty Ten 1.0
	* @return int
	*/
   function livework_excerpt_length( $length ) {
	   return 40;
   }
endif;
add_filter( 'excerpt_length', 'livework_excerpt_length' );





if ( ! function_exists( 'livework_auto_excerpt_more' ) ) :
	/**
	 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and boilerplate_continue_reading_link().
	 *
	 * To override this in a child theme, remove the filter and add your own
	 * function tied to the excerpt_more filter hook.
	 *
	 * @since Twenty Ten 1.0
	 * @return string An ellipsis
	 */
	function livework_auto_excerpt_more( $more ) {
		return ' &hellip;' . livework_continue_reading_link();
	}
endif;
add_filter( 'excerpt_more', 'livework_auto_excerpt_more' );




//if ( ! function_exists( 'livework_custom_excerpt_more' ) ) :
//	/**
//	 * Adds a pretty "Continue Reading" link to custom post excerpts.
//	 *
//	 * To override this link in a child theme, remove the filter and add your own
//	 * function tied to the get_the_excerpt filter hook.
//	 *
//	 * @since Twenty Ten 1.0
//	 * @return string Excerpt with a pretty "Continue Reading" link
//	 */
//	function livework_custom_excerpt_more( $output ) {
//		if ( has_excerpt() && ! is_attachment() ) {
//			$output .= livework_continue_reading_link();
//		}
//		return $output;
//	}
//endif;
//add_filter( 'get_the_excerpt', 'livework_custom_excerpt_more' );




if ( ! function_exists( 'livework_remove_gallery_css' ) ) :/**
	/**
	 * Remove inline styles printed when the gallery shortcode is used.
	 *
	 * Galleries are styled by the theme in Twenty Ten's style.css.
	 *
	 * @since Twenty Ten 1.0
	 * @return string The gallery style filter, with the styles themselves removed.
	 */
	function livework_remove_gallery_css( $css ) {
		return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
	}
endif;
add_filter( 'gallery_style', 'livework_remove_gallery_css' );



if ( ! function_exists( 'livework_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post—date/time and author.
	 *
	 * @since Twenty Ten 1.0
	 */
	function livework_posted_on() {
		// BP: slight modification to Twenty Ten function, converting single permalink to multi-archival link
		// Y = 2012
		// F = September
		// m = 01–12
		// j = 1–31
		// d = 01–31
		printf( __( '<span class="%1$s">Posted on</span> <span class="entry-date">%2$s %3$s %4$s</span> <span class="meta-sep">by</span> %5$s', 'livework' ),
			// %1$s = container class
			'meta-prep meta-prep-author',
			// %2$s = month: /yyyy/mm/
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/' . get_the_date( 'm' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'F' ) . ' ' . get_the_date( 'Y' ) ),
				get_the_date( 'F' )
			),
			// %3$s = day: /yyyy/mm/dd/
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/' . get_the_date( 'm' ) . '/' . get_the_date( 'd' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'F' ) . ' ' . get_the_date( 'j' ) . ' ' . get_the_date( 'Y' ) ),
				get_the_date( 'j' )
			),
			// %4$s = year: /yyyy/
			sprintf( '<a href="%1$s" title="%2$s" rel="bookmark">%3$s</a>',
				home_url() . '/' . get_the_date( 'Y' ) . '/',
				esc_attr( 'View Archives for ' . get_the_date( 'Y' ) ),
				get_the_date( 'Y' )
			),
			// %5$s = author vcard
			sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
				get_author_posts_url( get_the_author_meta( 'ID' ) ),
				sprintf( esc_attr__( 'View all posts by %s', 'livework' ), get_the_author() ),
				get_the_author()
			)
		);
	}
endif;





if ( ! function_exists( 'livework_posted_in' ) ) :
	/**
	 * Prints HTML with meta information for the current post (category, tags and permalink).
	 *
	 * @since Twenty Ten 1.0
	 */
	function livework_posted_in() {
		// Retrieves tag list of current post, separated by commas.
		$tag_list = get_the_tag_list( '', ', ' );
		if ( $tag_list ) {
			$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'livework' );
		} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'livework' );
		} else {
			$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'livework' );
		}
		// Prints the string, replacing the placeholders.
		printf(
			$posted_in,
			get_the_category_list( ', ' ),
			$tag_list,
			get_permalink(),
			the_title_attribute( 'echo=0' )
		);
	}
endif;
/*	End original TwentyTen functions (from Starkers Theme, renamed into this namespace) */





/*	Begin Boilerplate (renamed for this namespace */
// Add Admin
// require_once(get_template_directory() . '/boilerplate-admin/admin-menu.php');

// remove version info from head and feeds (http://digwp.com/2009/07/remove-wordpress-version-number/)
if ( ! function_exists( 'livework_complete_version_removal' ) ) :
	function livework_complete_version_removal() {
		return '';
	}
endif;
add_filter('the_generator', 'livework_complete_version_removal');

// add thumbnail support
if ( function_exists( 'add_theme_support' ) ) :
	add_theme_support( 'post-thumbnails' );
endif;

/*	End Boilerplate */







/* Start Livework specifics */

/* Case study post type */
add_action( 'init', 'create_post_type' );
function create_post_type() {
	register_post_type( 'case_study',
		array(
			'labels' => array(
			'name' => __( 'Case Studies' ),
			'singular_name' => __( 'Case Study' )
			),
		'public' => true,
		'publicly_queryable' => true,
		'rewrite' => array('slug' => 'case-study'),
		'has_archive' => true,
		'supports' => array( 'thumbnail', 'excerpt', 'editor', 'title', 'author' ),
		'taxonomies' => array('category'),
		)
	);
}




/* People post type */
add_action( 'init', 'create_post_type_people' );
function create_post_type_people() {
	register_post_type( 'people',
		array(
			'labels' => array(
			'name' => __( 'People' ),
			'singular_name' => __( 'Liveworker' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array( 'thumbnail', 'excerpt', 'editor', 'title', 'author' ),
		'taxonomies' => array('category'),
		)
	);
}


/* Topics post type */
add_action( 'init', 'create_post_type_topic' );
function create_post_type_topic() {
	register_post_type( 'topic',
		array(
			'labels' => array(
			'name' => __( 'Topics' ),
			'singular_name' => __( 'Topic' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array( 'thumbnail', 'excerpt', 'editor', 'title', 'author' ),
		'taxonomies' => array('category', 'tag'),
		)
	);
}



/* Clients taxonomy (tag) */
function clients_init() {
	// create a new taxonomy
	register_taxonomy(
		'clients',
		array('post','case_study'),
		array(
			'label' => __( 'Clients' ),
			'query_var' => ('true'),
			'rewrite' => array( 'slug' => 'client' ),
//			'capabilities' => array('assign_terms'=>'edit_guides', 'edit_terms'=>'publish_guides')
		)
	);
}
add_action( 'init', 'clients_init' );


/* Clients taxonomy (category) */
function sector_init() {
	// create a new taxonomy
	register_taxonomy(
		'sectors',
		array('post','case_study', 'topic'),
		array(
			'hierarchical' => ('true'), 
			'label' => __( 'Sectors' ),
			'show_admin_column' => true,
			'query_var' => ('true'),
			'rewrite' => array( 'slug' => 'sectors' ),
//			'capabilities' => array('assign_terms'=>'edit_guides', 'edit_terms'=>'publish_guides')
		)
	);
}
add_action( 'init', 'sector_init' );



/* Themes taxonomy (category) */
function theme_init() {
	// create a new taxonomy
	register_taxonomy(
		'themes',
		array('post','case_study', 'topic'),
		array(
			'hierarchical' => ('true'), 
			'label' => __( 'Themes' ),
			'show_admin_column' => true,
			'query_var' => ('true'),
			'rewrite' => array( 'slug' => 'themes' ),
//			'capabilities' => array('assign_terms'=>'edit_guides', 'edit_terms'=>'publish_guides')
		)
	);
}
add_action( 'init', 'theme_init' );



/* Editor style tweaks */
add_editor_style( 'css/editor-style.css' );

/* Menu support */
add_theme_support( 'menus' );

/* is_tree support,  */
function is_tree($pid) {      // $pid = The ID of the page we're looking for pages underneath
	global $post;         // load details about this page
	if(is_page()&&($post->post_parent==$pid||is_page($pid))) 
		return true;   // we're at the page or at a sub page
	else 
		return false;  // we're elsewhere
};



/* Additional image sizes */

add_image_size( 'thumb-large', 250, 250, true ); // Hard cropped large thumbnail, used on pages like Our Team




/* Continue reading (remove link) */

if ( ! function_exists( 'livework_continue_reading_link' ) ) :
	/**
	 * Returns a blank link where you'd expect a 'more' for excerpts
	 *
	 * @since Twenty Ten 1.0
	 * @return no string
	 */
	function livework_continue_reading_link() {
		return '';
	}
endif;

/* Changing type of images in Gallery */
remove_shortcode('gallery', 'gallery_shortcode');
add_shortcode('gallery', 'my_gallery_shortcode');

function my_gallery_shortcode($attr) {
	$post = get_post();

	static $instance = 0;
	$instance++;

	if ( ! empty( $attr['ids'] ) ) {
		// 'ids' is explicitly ordered, unless you specify otherwise.
		if ( empty( $attr['orderby'] ) )
			$attr['orderby'] = 'post__in';
		$attr['include'] = $attr['ids'];
	}

	// Allow plugins/themes to override the default gallery template.
	$output = apply_filters('post_gallery', '', $attr);
	if ( $output != '' )
		return $output;

	// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
	if ( isset( $attr['orderby'] ) ) {
		$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
		if ( !$attr['orderby'] )
			unset( $attr['orderby'] );
	}

	extract(shortcode_atts(array(
		'order'      => 'ASC',
		'orderby'    => 'menu_order ID',
		'id'         => $post->ID,
		'itemtag'    => 'dl',
		'icontag'    => 'dt',
		'captiontag' => 'dd',
		'columns'    => 3,
		'size'       => 'thumb-large',
		'include'    => '',
		'exclude'    => ''
	), $attr));

	$id = intval($id);
	if ( 'RAND' == $order )
		$orderby = 'none';

	if ( !empty($include) ) {
		$_attachments = get_posts( array('include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );

		$attachments = array();
		foreach ( $_attachments as $key => $val ) {
			$attachments[$val->ID] = $_attachments[$key];
		}
	} elseif ( !empty($exclude) ) {
		$attachments = get_children( array('post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	} else {
		$attachments = get_children( array('post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby) );
	}

	if ( empty($attachments) )
		return '';

	if ( is_feed() ) {
		$output = "\n";
		foreach ( $attachments as $att_id => $attachment )
			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
		return $output;
	}

	$itemtag = tag_escape($itemtag);
	$captiontag = tag_escape($captiontag);
	$columns = intval($columns);
	$itemwidth = $columns > 0 ? floor(100/$columns) : 100;
	$float = is_rtl() ? 'right' : 'left';

	$selector = "gallery-{$instance}";

	$gallery_style = $gallery_div = '';
	if ( apply_filters( 'use_default_gallery_style', true ) )
		$gallery_style = "
		<style type='text/css'>
			#{$selector} {
				margin: auto;
			}
			#{$selector} .gallery-item {
				float: {$float};
				margin-top: 10px;
				text-align: center;
				width: {$itemwidth}%;
			}
			#{$selector} img {
				border: 2px solid #cfcfcf;
			}
			#{$selector} .gallery-caption {
				margin-left: 0;
			}
		</style>
		<!-- see gallery_shortcode() in wp-includes/media.php -->";
	$size_class = sanitize_html_class( $size );
	$gallery_div = "<div id='$selector' class='gallery clearfix galleryid-{$id} gallery-columns-{$columns} gallery-size-{$size_class}'>";
	$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

	$i = 0;
	foreach ( $attachments as $id => $attachment ) {
		$link = isset($attr['link']) && 'file' == $attr['link'] ? wp_get_attachment_link($id, $size, false, false) : wp_get_attachment_link($id, $size, true, false);

		$output .= "<{$itemtag} class='gallery-item'>";
		$output .= "
			<{$icontag} class='gallery-icon'>
				$link
			</{$icontag}>";
		if ( $captiontag && trim($attachment->post_excerpt) ) {
			$output .= "
				<{$captiontag} class='wp-caption-text gallery-caption'>
				" . wptexturize($attachment->post_excerpt) . "
				</{$captiontag}>";
		}
		$output .= "</{$itemtag}>";
		if ( $columns > 0 && ++$i % $columns == 0 )
			$output .= '';
	}

	$output .= "
			
		</div>\n";

	return $output;
}

//function livework_add_custom_types( $query ) {
//  if( is_category() || is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
//    $query->set( 'post_type', array(
//     'post', 'case_study', 'nav_menu_item'
//		));
//	  return $query;
//	}
//}
//add_filter( 'pre_get_posts', 'livework_add_custom_types' );
//
//
add_filter( 'getarchives_where' , 'ucc_getarchives_where_filter' , 10 , 2 ); function ucc_getarchives_where_filter( $where , $r ) { $args = array( 'public' => true , '_builtin' => false ); $output = 'names'; $operator = 'and';

$post_types = get_post_types( $args , $output , $operator ); $post_types = array_merge( $post_types , array( 'post' ) ); $post_types = "'" . implode( "' , '" , $post_types ) . "'";

return str_replace( "post_type = 'post'" , "post_type IN ( $post_types )" , $where ); }

 
 
if ( ! function_exists( 'ucc_pre_get_posts_filter' ) ) {
function ucc_pre_get_posts_filter( $query ) {
	if ( ! is_preview() && ! is_admin() && ! is_singular() && ! is_404() ) {
		if ( $query->is_feed ) {
			// As always, handle your feed post types here.
		} else {
			$my_post_type = get_query_var( 'post_type' );
			if ( empty( $my_post_type ) ) {
				$args = array(
					'public' => true ,
					'_builtin' => false
				);
				$output = 'names';
				$operator = 'and';
 
				// Get all custom post types automatically.
				$post_types = get_post_types( $args, $output, $operator );
				// Or uncomment and edit to explicitly state which post types you want. */
				 $post_types = array( 'case_study', 'post' );
 
				// Add 'link' and/or 'page' to array() if you want these included.
				// array( 'post' , 'link' , 'page' ), etc.
				$post_types = array_merge( $post_types, array( 'post' ) );
				$query->set( 'post_type', $post_types );
			}
		}
	}
} }
add_action( 'pre_get_posts' , 'ucc_pre_get_posts_filter' );
 
/*
	Copyright 2012 Jennifer M. Dodd <jmdodd@gmail.com>
	Released under the GPLv2 (or later).
*/
 
 

/* End Livework specifics */







/**
 * Activate Add-ons
 * Here you can enter your activation codes to unlock Add-ons to use in your theme. 
 * Since all activation codes are multi-site licenses, you are allowed to include your key in premium themes. 
 * Use the commented out code to update the database with your activation code. 
 * You may place this code inside an IF statement that only runs on theme activation.
 */ 
 
// if(!get_option('acf_repeater_ac')) update_option('acf_repeater_ac', "xxxx-xxxx-xxxx-xxxx");
// if(!get_option('acf_options_page_ac')) update_option('acf_options_page_ac', "xxxx-xxxx-xxxx-xxxx");
// if(!get_option('acf_flexible_content_ac')) update_option('acf_flexible_content_ac', "xxxx-xxxx-xxxx-xxxx");
// if(!get_option('acf_gallery_ac')) update_option('acf_gallery_ac', "xxxx-xxxx-xxxx-xxxx");


/**
 * Register field groups
 * The register_field_group function accepts 1 array which holds the relevant data to register a field group
 * You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 * This code must run every time the functions.php file is read
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => '50a3a3f73f330',
		'title' => 'attach case study to sector page',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_50a28503fab14',
				'label' => 'Add Case Studies',
				'name' => 'add_case_studies',
				'type' => 'relationship',
				'order_no' => '0',
				'instructions' => '',
				'required' => '0',
				'conditional_logic' => 
				array (
					'status' => '0',
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
						),
					),
					'allorany' => 'all',
				),
				'post_type' => 
				array (
					0 => 'case_study',
					1 => 'post',
				),
				'taxonomy' => 
				array (
					0 => 'all',
				),
				'max' => '',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-sector.php',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '50a3a3f7439b6',
		'title' => 'Order',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_5099279524d3e',
				'label' => 'Choose Next Page',
				'name' => 'next_page',
				'type' => 'relationship',
				'order_no' => '0',
				'instructions' => '',
				'required' => '0',
				'conditional_logic' => 
				array (
					'status' => '0',
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'post_type' => 
				array (
					0 => 'page', 'post','case_study','people',
				),
				'taxonomy' => 
				array (
					0 => 'all',
				),
				'max' => '1',
			),
			1 => 
			array (
				'key' => 'field_50992b4c74d3f',
				'label' => 'Choose Previous Page',
				'name' => 'previous_page',
				'type' => 'relationship',
				'order_no' => '1',
				'instructions' => '',
				'required' => '0',
				'conditional_logic' => 
				array (
					'status' => '0',
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'post_type' => 
				array (
					0 => 'page', 'post','case_study','people',
				),
				'taxonomy' => 
				array (
					0 => 'all',
				),
				'max' => '1',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => '50a3a3f7477fa',
		'title' => 'People',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_509b8cd37ec4d',
				'label' => 'Job title',
				'name' => 'job_title',
				'type' => 'text',
				'order_no' => '0',
				'instructions' => '',
				'required' => '1',
				'conditional_logic' => 
				array (
					'status' => '0',
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
						),
					),
					'allorany' => 'all',
				),
				'default_value' => '',
				'formatting' => 'html',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'people',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
}

?>