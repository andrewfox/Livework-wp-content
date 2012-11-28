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



if ( ! function_exists( 'livework_continue_reading_link' ) ) :
	/**
	 * Returns a "Continue Reading" link for excerpts
	 *
	 * @since Twenty Ten 1.0
	 * @return string "Continue Reading" link
	 */
	function livework_continue_reading_link() {
		return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'livework' ) . '</a>';
	}
endif;





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
		'rewrite' => array('slug' => 'case-study'),
		'has_archive' => true,
		'supports' => array( 'thumbnail', 'excerpt', 'editor', 'title', 'author' ),
		'taxonomies' => array('category'),
		)
	);
}


/* Theme post type */
//add_action( 'init', 'create_post_type_theme' );
//function create_post_type_theme() {
//	register_post_type( 'theme',
//		array(
//			'labels' => array(
//			'name' => __( 'Themes' ),
//			'singular_name' => __( 'Theme' )
//			),
//		'public' => true,
//		'rewrite' => array('slug' => 'theme'),
//		'has_archive' => true,
//		'supports' => array( 'thumbnail', 'excerpt', 'editor', 'title', 'author' ),
//		'taxonomies' => array('category'),
//		)
//	);
//}


/* Theme post type */
//add_action( 'init', 'create_post_type_storysection' );
//function create_post_type_storysection() {
//	register_post_type( 'story_section',
//		array(
//			'labels' => array(
//			'name' => __( 'Story Sections' ),
//			'singular_name' => __( 'Story Section' )
//			),
//		'public' => true,
//		'rewrite' => array('slug' => 'story-section'),
//		'has_archive' => true,
//		'supports' => array( 'thumbnail', 'excerpt', 'editor', 'title', 'author' ),
//		'taxonomies' => array('category'),
//		)
//	);
//}


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


/* Clients taxonomy (tag) */
function clients_init() {
	// create a new taxonomy
	register_taxonomy(
		'clients',
		array('post','case_study'),
		array(
			'label' => __( 'Clients' ),
			'query_var' => ('true'),
			'rewrite' => array( 'slug' => 'Client' ),
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
		array('post','case_study'),
		array(
			'hierarchical' => ('true'), 
			'label' => __( 'Sectors' ),
			'query_var' => ('true'),
			'rewrite' => array( 'slug' => 'Sectors' ),
//			'capabilities' => array('assign_terms'=>'edit_guides', 'edit_terms'=>'publish_guides')
		)
	);
}
add_action( 'init', 'sector_init' );


/* Editor style tweaks */
add_editor_style( 'editor-style.css' );

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
					0 => 'page',
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
					0 => 'page',
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