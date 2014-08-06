<?php

/* Add featured WP Menu support
---------------------------------------------------------------------------------------------------------------*/

add_theme_support( 'menus' );

/* Add featured image support
---------------------------------------------------------------------------------------------------------------*/

add_theme_support( 'post-thumbnails' );

/* LOAD LOCALES
---------------------------------------------------------------------------------------------------------------*/

function load_theme_locale(){
	$theme_dir = get_template_directory() . '/locales/';
	load_theme_textdomain( 'storini', $theme_dir );
}

// We want a Welsh theme that doesn't rely on WP' Welsh translations, because
// users don't know how to install them, so we override some stuff WP did prior.
function force_theme_locale() {
	if( get_theme_locale_with_fallback() == 'cy') {
		if( !is_admin() && $GLOBALS['pagenow'] != 'wp-login.php' ){

			global $locale, $wp_locale;
			$locale = 'cy';
			$theme_dir = get_template_directory() . '/locales/';

			// If Wordpress has its own Welsh translations, use those. Otherwise, use the
			// ones we've taken from cy.wordpress.org
			if( file_exists( WP_LANG_DIR . "/cy.mo" ) ) {
				load_textdomain( 'default', WP_LANG_DIR . "/cy.mo" );
			}else{
				load_textdomain( 'default', $theme_dir . "/wordpress/cy.mo" );
			}

			// $wp_locale translates dates upfront, so refresh it.
			$wp_locale = new WP_Locale();

			// Finally, reload our translations.
			load_theme_textdomain( 'storini', $theme_dir );
		}
	}
}

function get_theme_locale_with_fallback(){
	// if( function_exists('get_field') ) {
	// 	if( get_field('display_in_english', 'option') ) {
	// 		return 'en';
	// 	}else{
	// 		return 'cy';
	// 	}
	// }else{
	// 	return get_distribution_locale();
	// }

	// For some reason, get_field clobbers the field, so we're removing the option
	// and defaulting just to the distribution.

	return get_distribution_locale();
}

add_action('after_setup_theme', 'load_theme_locale');
add_action('init', 'force_theme_locale', 500);

function get_distribution_locale(){
	return trim(file_get_contents(get_template_directory() . '/LOCALE.TXT'));
}

function force_locale(){
	global $locale;
	$locale = get_distribution_locale();
	load_theme_locale();
}

function reset_locale(){
	global $locale;
	$locale = WPLANG;
}

/* CONTENT WIDTH
---------------------------------------------------------------------------------------------------------------*/

if ( ! isset( $content_width ) ) {
	$content_width = 600;
}


/* ALT POST FORMAT (for photo posts)
---------------------------------------------------------------------------------------------------------------*/
add_theme_support( 'post-formats', array( 'gallery' ) );
add_theme_support( 'automatic-feed-links' );

/* LINK PAGE SETTINGS
---------------------------------------------------------------------------------------------------------------*/
	wp_link_pages(array(
	'before'           => '<p>' . __( 'Pages:', 'storini' ),
	'after'            => '</p>',
	'link_before'      => '',
	'link_after'       => '',
	'next_or_number'   => 'number',
	'separator'        => ' ',
	'nextpagelink'     => __( 'Next page', 'storini' ),
	'previouspagelink' => __( 'Previous page', 'storini' ),
	'pagelink'         => '%',
	'echo'             => 1
));


/* IMAGES
---------------------------------------------------------------------------------------------------------------*/
add_image_size( 'thumb', 400, 267, true ); /* thumbnail */
add_image_size( 'small_thumb', 300, 200, true ); /* thumbnail */
add_image_size( 'post', 620, 9999 ); /* post */
add_image_size( 'home', 465, 320, true ); /* home */
add_image_size( 'logo', 480, 90 ); /* logo */
add_image_size( 'ad', 300, 250, true ); /* banner */




/* COMMENTS FORM
---------------------------------------------------------------------------------------------------------------*/
function remove_comment_fields($fields) {
	unset($fields['url']);
 	return $fields;
}
add_filter('comment_form_default_fields','remove_comment_fields');




/* EXCERPT
---------------------------------------------------------------------------------------------------------------*/
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt).'...';
  }
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}

function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content).'...';
  }
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content);
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}




/* EXCLUDE CATEGORIES IN NAVI
---------------------------------------------------------------------------------------------------------------*/
function the_category_filter($thelist,$separator=' ') {
	if(!defined('WP_ADMIN')) {
		$exclude = array('What&#39;s on?','Uncategorized','Lead story');
		$cats = explode($separator,$thelist);
		$newlist = array();
		foreach($cats as $cat) {
			$catname = trim(strip_tags($cat));
			if(!in_array($catname,$exclude))
				$newlist[] = $cat;
		}
		return implode($separator,$newlist);
	} else
		return $thelist;
}
add_filter('the_category','the_category_filter',10,2);




/* ADD HOME PAGE, MAKE IT FRONT PAGE AND APPLY A TEMPLATE
---------------------------------------------------------------------------------------------------------------
add_action( 'after_switch_theme', 'setup_home' );
function setup_home(){
  if ( 'page' === get_option( 'show_on_front' ) && get_option( 'page_on_front' ) )
	return;
	force_locale();
  $homepage = wp_insert_post( array(
    'post_title'   => __("Home", 'storini'),
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_content' => ''
  ) );
	reset_locale();
  if ( $homepage )
  {
    update_option( 'show_on_front', 'page' );
    update_option( 'page_on_front', $homepage );
  }
  update_post_meta( $homepage, '_wp_page_template', 'home-page.php' );
}

*/


/* ADD MAIN POSTS PAGE AND APPLY A TEMPLATE
---------------------------------------------------------------------------------------------------------------
add_action( 'after_switch_theme', 'setup_news' );
function setup_news(){
  if ( 'page' === get_option( 'show_on_front' ) && get_option( 'page_for_posts' ) )
	return;
	force_locale();
  $homepage = wp_insert_post( array(
    'post_title'   => __("Latest News", 'storini'),
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_content' => ''
  ) );
	reset_locale();
  if ( $homepage )
  {
    update_option( 'show_on_front', 'page' );
    update_option( 'page_for_posts', $homepage );
  }
  update_post_meta( $homepage, '_wp_page_template', 'index.php' );
}
*/



/* CREATE THEME PAGES
---------------------------------------------------------------------------------------------------------------
add_action( 'after_switch_theme', 'setup_pages' );
function setup_pages(){
	force_locale();
  $my_post = wp_insert_post( array(
    'post_title'   => __("About", 'storini'),
    'post_status'  => 'publish',
    'post_type'    => 'page'
  ) );
  $my_post = wp_insert_post( array(
    'post_title'   => __("Contact", 'storini'),
    'post_status'  => 'publish',
    'post_type'    => 'page'
  ) );
  $my_post = wp_insert_post( array(
    'post_title'   => __("Advertising", 'storini'),
    'post_status'  => 'publish',
    'post_type'    => 'page'
  ) );
	reset_locale();
  update_post_meta( $my_post, '_wp_page_template', 'page.php' );
}

add_action( 'after_switch_theme', 'setup_reporter' );
function setup_reporter(){
	force_locale();
  $my_post = wp_insert_post( array(
    'post_title'   => __("Become a reporter", 'storini'),
    'post_status'  => 'publish',
    'post_type'    => 'page'
  ) );
	reset_locale();
  update_post_meta( $my_post, '_wp_page_template', 'reporter.php' );
}

add_action( 'after_switch_theme', 'setup_submit' );
function setup_submit(){
	force_locale();
  $my_post = wp_insert_post( array(
    'post_name'    => 'submit',
    'post_title'   => __("Submit your news", 'storini'),
    'post_status'  => 'publish',
    'post_type'    => 'page'
  ) );
	reset_locale();
  update_post_meta( $my_post, '_wp_page_template', 'submit.php' );
}

add_action( 'after_switch_theme', 'setup_thanks' );
function setup_thanks(){
	force_locale();
  $my_post = wp_insert_post( array(
    'post_title'   => __("Thank you", 'storini'),
    'post_status'  => 'publish',
    'post_type'    => 'page',
    'post_content' => __("Thank you for submitting your news.", 'storini')
  ) );
	reset_locale();
  update_post_meta( $my_post, '_wp_page_template', 'thanks.php' );
}

*/


/* CREATE CORE CATEGORIES
---------------------------------------------------------------------------------------------------------------
// We'll translate these on the front end
$noop = Array(__('Sport', 'storini'), __('Community', 'storini'), __('Business', 'storini'), __('Education', 'storini'),
			__('Health', 'storini'), __('What&#39;s on?', 'storini'), __('Lead story', 'storini'));
function create_my_cat () {
    if (file_exists (ABSPATH.'/wp-admin/includes/taxonomy.php')) {
        require_once (ABSPATH.'/wp-admin/includes/taxonomy.php');
        if ( ! get_cat_ID( 'Sport, Community, Business, Education, Health, What&#39;s on?, Lead story' ) ) {
            wp_create_category( 'Sport' );
            wp_create_category( 'Community' );
            wp_create_category( 'Business' );
            wp_create_category( 'Education' );
            wp_create_category( 'Health' );
            wp_create_category( 'What&#39;s on?' );
            wp_create_category( 'Lead story' );
        }
    }
}
add_action ( 'after_setup_theme', 'create_my_cat' );

*/


/* SETUP PERMALINK STRUCTURE
---------------------------------------------------------------------------------------------------------------
function setup_permalink () {
	if (get_option('permalink_structure') !== "/%postname%/") {
		// Including files responsible for .htaccess update
		require_once(ABSPATH . 'wp-admin/includes/misc.php');
		require_once(ABSPATH . 'wp-admin/includes/file.php');

		global $wp_rewrite;
		$wp_rewrite->set_permalink_structure( '/%postname%/' );
		$wp_rewrite->flush_rules();
	}
}
add_action ( 'after_setup_theme', 'setup_permalink' );

*/


/* CUSTOM USER (AUTHOR) PROIFLE FIELDS
---------------------------------------------------------------------------------------------------------------*/
function modify_author($profile_fields) {
	// Add new fields
	$profile_fields['twitter'] = __("Twitter username", 'storini');
	// Remove old fields
	unset($profile_fields['aim']);
	unset($profile_fields['yim']);
	unset($profile_fields['jabber']);
	return $profile_fields;
}
add_filter('user_contactmethods', 'modify_author');




/* ADVANCED CUSTOM FIELDS
---------------------------------------------------------------------------------------------------------------*/
define( 'ACF_LITE' , true );

// Include repeating fields add on
add_action('acf/register_fields', 'my_register_fields');

function my_register_fields()
{
	include_once('acf-repeater/repeater.php');
}

add_action('init', 'load_acf_fields');

function load_acf_fields(){

	// Add field groups
	if(function_exists("register_field_group"))
	{

		/* ALL POSTS
		---------------------------------------------------------------------------------------------------------------*/
		register_field_group(array (
			'id' => 'acf_posts',
			'title' => 'Post',
			'fields' => array (
				array (
					'key' => 'field_52e68fdf319f3',
					'label' => __("Storini reporters", 'storini'),
					'name' => '',
					'type' => 'tab',
				),
				array (
					'key' => 'field_52e68c7a71da5',
					'label' => __("Storini reporters", 'storini'),
					'name' => 'storini_reporters',
					'type' => 'repeater',
					'instructions' => __("Optionally, credit reporters for this post/article", 'storini'),
					'sub_fields' => array (
						array (
							'key' => 'field_52e68cbe71da6',
							'label' => __("Reporter name", 'storini'),
							'name' => 'reporter_name',
							'type' => 'text',
							'column_width' => '',
							'default_value' => '',
							'placeholder' => 'Joe Bloggs',
							'prepend' => '',
							'append' => '',
							'formatting' => 'none',
							'maxlength' => '',
						),
						array (
							'key' => 'field_52e68d7071da8',
							'label' => __("Twitter handle", 'storini'),
							'name' => 'reporter_twitter',
							'type' => 'text',
							'instructions' => __("Optional (don't include the @)", 'storini'),
							'column_width' => '',
							'default_value' => '',
							'placeholder' => 'storini',
							'prepend' => '',
							'append' => '',
							'formatting' => 'none',
							'maxlength' => '',
						),
						array (
							'key' => 'field_52e68d0471da7',
							'label' => __("Web link", 'storini'),
							'name' => 'reporter_link',
							'type' => 'text',
							'instructions' => __("Optional (must include http://)", 'storini'),
							'column_width' => '',
							'default_value' => '',
							'placeholder' => 'http://',
							'prepend' => '',
							'append' => '',
							'formatting' => 'none',
							'maxlength' => '',
						),
						array (
							'key' => 'field_52e68e5871da9',
							'label' => __("Email address", 'storini'),
							'name' => 'reporter_email',
							'type' => 'text',
							'instructions' => 'Optional',
							'column_width' => '',
							'default_value' => '',
							'placeholder' => 'example@storini.com',
							'prepend' => '',
							'append' => '',
							'formatting' => 'none',
							'maxlength' => '',
						),
					),
					'row_min' => 0,
					'row_limit' => '',
					'layout' => 'row',
					'button_label' => __("Add a reporter", 'storini'),
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'post',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 1,
		));

		/* STANDARD POST
		---------------------------------------------------------------------------------------------------------------*/
		register_field_group(array (
			'id' => 'acf_standard_post',
			'title' => __("Standard post", 'storini'),
			'fields' => array (
				array (
					'key' => 'field_52e668ee661b2',
					'label' => __("Header image", 'storini'),
					'name' => '',
					'type' => 'tab',
				),
				array (
					'key' => 'field_52e65f4b7d484',
					'label' => __("Image", 'storini'),
					'name' => 'image',
					'type' => 'image',
					'instructions' => __("Ideally, the image should be a minimum width of 630 pixels", 'storini'),
					'save_format' => 'id',
					'preview_size' => 'post',
					'library' => 'all',
				),
				array (
					'key' => 'field_52e66500d2b30',
					'label' => __("Alt description", 'storini'),
					'name' => 'alt',
					'type' => 'text',
					'instructions' => __("Optionally, add a short description of image content", 'storini'),
					'default_value' => '',
					'placeholder' => '',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e65fa07d485',
					'label' => __("Credit (name)", 'storini'),
					'name' => 'credit_name',
					'type' => 'text',
					'instructions' => __("Optionally, add a photographer credit", 'storini'),
					'default_value' => '',
					'placeholder' => 'Joe Bloggs',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e65fe17d486',
					'label' => __("Credit (link)", 'storini'),
					'name' => 'credit_link',
					'type' => 'text',
					'instructions' => __("Optionally, add a URL for the photographer (must include http://)", 'storini'),
					'default_value' => '',
					'placeholder' => 'http://',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_format',
						'operator' => '==',
						'value' => 'standard',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));


		/* PAGE
		---------------------------------------------------------------------------------------------------------------*/
		register_field_group(array (
			'id' => 'acf_page',
			'title' => 'Page',
			'fields' => array (
				array (
					'key' => 'field_52e6d4d383ee0',
					'label' => __("Include social sharing buttons?", 'storini'),
					'name' => 'social_buts',
					'type' => 'true_false',
					'message' => '',
					'default_value' => 0,
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_type',
						'operator' => '==',
						'value' => 'page',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));


		/* GALLERY POST
		---------------------------------------------------------------------------------------------------------------*/
		register_field_group(array (
			'id' => 'acf_gallery_post',
			'title' => __("Gallery post", 'storini'),
			'fields' => array (
				array (
					'key' => 'field_52e6e5a3d725b',
					'label' => __("Add photos", 'storini'),
					'name' => '',
					'type' => 'tab',
				),
				array (
					'key' => 'field_52e6e488bbb72',
					'label' => __("Gallery images", 'storini'),
					'name' => 'gallery_images',
					'type' => 'repeater',
					'sub_fields' => array (
						array (
							'key' => 'field_52e6e4a5bbb73',
							'label' => 'Image',
							'name' => 'image',
							'type' => 'image',
							'instructions' => __("Ideally, the image should be a minimum width of 630 pixels", 'storini'),
							'column_width' => '',
							'save_format' => 'id',
							'preview_size' => 'post',
							'library' => 'all',
						),
						array (
							'key' => 'field_52e6e4e7bbb74',
							'label' => __("Alt", 'storini'),
							'name' => 'alt',
							'type' => 'text',
							'instructions' => __("Optionally, add a short description of image content", 'storini'),
							'column_width' => '',
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'formatting' => 'none',
							'maxlength' => '',
						),
					),
					'row_min' => 0,
					'row_limit' => '',
					'layout' => 'row',
					'button_label' => __("Add an image", 'storini'),
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'post_format',
						'operator' => '==',
						'value' => 'gallery',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));


		/* THEME OPTIONS
		---------------------------------------------------------------------------------------------------------------*/

		register_field_group(array (
			'id' => 'acf_theme-settings',
			'title' => __("Theme settings", 'storini'),
			'fields' => array (
				array (
					'key' => 'field_52e8097e126ad',
					'label' => __("Appearance", 'storini'),
					'name' => '',
					'type' => 'tab',
				),
				array (
					'key' => 'field_52e7a1da8c49e',
					'label' => __("Logo", 'storini'),
					'name' => 'logo',
					'type' => 'image',
					'instructions' => __("Minimum image height of 90px", 'storini'),
					'save_format' => 'id',
					'preview_size' => 'logo',
					'library' => 'all',
				),
				array (
					'key' => 'field_52e7a2fdfb018',
					'label' => __("Theme colour", 'storini'),
					'name' => 'theme_colour',
					'type' => 'color_picker',
					'instructions' => __("Changes the global theme colour (default theme colour = #f42779)", 'storini'),
					'default_value' => '#f42779',
				),
				array (
					'key' => 'field_52e7a2e4fb017',
					'label' => __("Settings", 'storini'),
					'name' => '',
					'type' => 'tab',
				),

				//Secondary Colour Field
				
			//	array (
			//		'key' => 'fieldxyz',
			//		'label' => __("Secondary colour", 'storini'),
			//		'name' => 'secondary_colour',
			//		'type' => 'color picker'
			//		'instructions' => __("Changes the secondary theme colour (default secondary colour = #8dc63f), 'storini'"),
			//		'default value' => '#8dc63f',
			//		),
				

	//Language switcher
				
				// array (
				// 	'key' => 'field_52e817284cgba',
				// 	'label' => __("English?", 'storini'),
				// 	'name' => 'display_in_english',
				// 	'type' => 'true_false',
				// 	'instructions' => __("Should this theme display in English? Leave unchecked to display in Welsh", 'storini'),
				// 	'message' => __("Display in English?", 'storini'),
				// 	'default_value' => true,
				// ),

				array (
					'key' => 'field_52e7c1c352aab',
					'label' => __("Location", 'storini'),
					'name' => 'location',
					'type' => 'text',
					'instructions' => __("What is the location for your hyperlocal news? (e.g. Cardiff)", 'storini'),
					'default_value' => '',
					'placeholder' => __("City, town or area name", 'storini'),
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e809a9126ae',
					'label' => 'Twitter',
					'name' => 'twitter',
					'type' => 'text',
					'instructions' => __("Your Twitter username, minus the '@' — This adds your latest tweet to the home page", 'storini'),
					'default_value' => '',
					'placeholder' => '(e.g. storini)',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e817284c2be',
					'label' => __("What's on?", 'storini'),
					'name' => 'whats_on',
					'type' => 'true_false',
					'instructions' => __("Include a link to the &quot;What's on?&quot; post category in the top navigation bar?", 'storini'),
					'message' => __("Include the &quot;What's on?&quot; category?", 'storini'),
					'default_value' => 0,
				),
				array (
					'key' => 'field_52e817284c2bz',
					'label' => __("Integrate with Storini?", 'storini'),
					'name' => 'integrate_storini',
					'type' => 'true_false',
					'instructions' => __("Include a the 'Become a local reporter' and 'Submit your news' (via Storini) pages?", 'storini'),
					'message' => __("Integrate with Storini?", 'storini'),
					'default_value' => 0,
				),
				array (
					'key' => 'field_52e7a34ffb019',
					'label' => __("Social links", 'storini'),
					'name' => '',
					'type' => 'tab',
				),
				array (
					'key' => 'field_52e7a370fb01a',
					'label' => 'Facebook',
					'name' => 'url_facebook',
					'type' => 'text',
					'instructions' => __("Link to your Facebook Page (must include http://)", 'storini'),
					'default_value' => '',
					'placeholder' => 'http://',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e7a77e61dec',
					'label' => 'Twitter',
					'name' => 'url_twitter',
					'type' => 'text',
					'instructions' => __("Link to your Twitter page (must include http://)", 'storini'),
					'default_value' => '',
					'placeholder' => 'http://',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e7a79e61ded',
					'label' => 'Google+',
					'name' => 'url_google',
					'type' => 'text',
					'instructions' => __("Link to your Google+ Page (must include http://)", 'storini'),
					'default_value' => '',
					'placeholder' => 'http://',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e7a7c061dee',
					'label' => 'Instagram',
					'name' => 'url_instagram',
					'type' => 'text',
					'instructions' => __("Link to your Instagram (must include http://)", 'storini'),
					'default_value' => '',
					'placeholder' => 'http://',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e7a7eb61def',
					'label' => 'Pinterest',
					'name' => 'url_pinterest',
					'type' => 'text',
					'instructions' => __("Link to your Pinterest page (must include http://)", 'storini'),
					'default_value' => '',
					'placeholder' => 'http://',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e7a80661df0',
					'label' => 'Vimeo',
					'name' => 'url_vimeo',
					'type' => 'text',
					'instructions' => __("Link to your Vimeo page (must include http://)", 'storini'),
					'default_value' => '',
					'placeholder' => 'http://',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e7a81761df1',
					'label' => 'YouTube',
					'name' => 'url_youtube',
					'type' => 'text',
					'instructions' => __("Link to your YouTube page (must include http://)", 'storini'),
					'default_value' => '',
					'placeholder' => 'http://',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e7a843b4950',
					'label' => __("Advertising", 'storini'),
					'name' => '',
					'type' => 'tab',
				),
				array (
					'key' => 'field_52e7e492b0297',
					'label' => __("Accept advertising on this website?", 'storini'),
					'name' => 'advertising',
					'type' => 'true_false',
					'instructions' => __("Disabling this will remove the advertising banner slots", 'storini'),
					'message' => __("Enable advertising", 'storini'),
					'default_value' => 0,
				),
				array (
					'key' => 'field_52e7ea7bd4d45',
					'label' => 'Google AdSense',
					'name' => 'google_adsense',
					'type' => 'textarea',
					'instructions' => __("If you have a Google AdSense account, copy and paste your ad unit code here. This banner ad will replace the content of 'Ad slot 1'. You can create a free AdSense account at: https://www.google.com/adsense/", 'storini'),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'formatting' => 'html',
				),
				array (
					'key' => 'field_52e7e0a528a03',
					'label' => __("Ad slot 1 (image)", 'storini'),
					'name' => 'ad_one_image',
					'type' => 'image',
					'instructions' => __("Ad banner/image should be a maximum of 300x250px", 'storini'),
					'save_format' => 'id',
					'preview_size' => 'ad',
					'library' => 'all',
				),
				array (
					'key' => 'field_52e7e25428a04',
					'label' => __("Ad slot 1 (link)", 'storini'),
					'name' => 'ad_one_link',
					'type' => 'text',
					'instructions' => __("URL of advertiser (must include http://)", 'storini'),
					'default_value' => '',
					'placeholder' => 'http://',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e7eaced4d46',
					'label' => __("Ad slot 2 (image)", 'storini'),
					'name' => 'ad_two_image',
					'type' => 'image',
					'save_format' => 'id',
					'preview_size' => 'ad',
					'library' => 'all',
				),
				array (
					'key' => 'field_52e7eaffd4d47',
					'label' => __("Ad slot 2 (link)", 'storini'),
					'name' => 'ad_two_link',
					'type' => 'text',
					'default_value' => '',
					'placeholder' => 'http://',
					'prepend' => '',
					'append' => '',
					'formatting' => 'none',
					'maxlength' => '',
				),
				array (
					'key' => 'field_52e7f239c75ea',
					'label' => __("Ad slot 2 visible on mobile?", 'storini'),
					'name' => 'ad_mobile',
					'type' => 'true_false',
					'instructions' => __("Having two advertising slots on mobile means a larger area for the user to scroll before to scroll before they get to the content — this could put some users off...", 'storini'),
					'message' => __("Visible on mobile?", 'storini'),
					'default_value' => 0,
				),
				array (
					'key' => 'field_52e7e6d1d4d43',
					'label' => __("Ad slot 2 visible on posts?", 'storini'),
					'name' => 'ad_posts',
					'type' => 'true_false',
					'instructions' => __("Having two advertising slots on archive/tile pages works well, but can be excessive for posts/articles. Would you like the two ad slots to appear on posts too, or just archive/tile pages?", 'storini'),
					'message' => __("Visible on posts?", 'storini'),
					'default_value' => 0,
				),
				array (
					'key' => 'field_52e7a8a2b4952',
					'label' => 'Google Analytics',
					'name' => '',
					'type' => 'tab',
				),
				array (
					'key' => 'field_52e7a858b4951',
					'label' => __("Tracking code", 'storini'),
					'name' => 'google_analytics',
					'type' => 'textarea',
					'instructions' => __("Copy and paste your Google Analytics tracking code here. You can create a free account at: http://www.google.com/analytics/", 'storini'),
					'default_value' => '',
					'placeholder' => '',
					'maxlength' => '',
					'formatting' => 'none',
				),
			),
			'location' => array (
				array (
					array (
						'param' => 'options_page',
						'operator' => '==',
						'value' => 'acf-options',
						'order_no' => 0,
						'group_no' => 0,
					),
				),
			),
			'options' => array (
				'position' => 'normal',
				'layout' => 'no_box',
				'hide_on_screen' => array (
				),
			),
			'menu_order' => 0,
		));
	}

}




/* THEME OPTIONS PAGE
---------------------------------------------------------------------------------------------------------------*/

// Include ACF options page add on
include_once('acf-options-page/acf-options-page.php');




/* PROMOPT USER TO ACTIVATE REQUIRED WP PLUGINS
---------------------------------------------------------------------------------------------------------------*/
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
function my_theme_register_required_plugins() {

	$plugins = array(

		array(
			'name' 		=> 'Advanced Custom Fields',
			'slug' 		=> 'advanced-custom-fields',
			'required' 	=> true,
		),
		array(
			'name' 		=> 'User Photo',
			'slug' 		=> 'user-photo',
			'required' 	=> true,
		),
		array(
			'name' 		=> 'WP Paginate',
			'slug' 		=> 'wp-paginate',
			'required' 	=> true,
		)

	);

	$theme_text_domain = 'storini';

	$config = array(
		'domain'       		=> $theme_text_domain,
		'default_path' 		=> '',
		'parent_menu_slug' 	=> 'themes.php',
		'parent_url_slug' 	=> 'themes.php',
		'menu'         		=> 'install-required-plugins',
		'has_notices'      	=> true, // Show admin notices or not
		'is_automatic'    	=> false,	// Automatically activate plugins after installation or not
		'message' 			=> '',
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
			'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
			'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}




/* WP LOGIN LOGO
---------------------------------------------------------------------------------------------------------------*/
function my_custom_login_logo() {
    echo '<style type="text/css">
    		.login h1 { margin-bottom:10px; }
    			.login h1 a { width:270px; height:161px; background-size:270px 161px; }
        	h1 a { background-image:url(/wp-content/themes/storini/images/storini-login.png) !important; }
    </style>';
}
add_action('login_head', 'my_custom_login_logo');




/* REMOVE LEFT NAVI ELEMENTS
---------------------------------------------------------------------------------------------------------------*/
add_action( 'admin_menu', 'remove_menu' );
function remove_menu() {
	remove_menu_page('link-manager.php'); // Links
	remove_submenu_page('themes.php', 'customize.php'); // Appearance > Customize
	remove_submenu_page('plugins.php', 'plugin-editor.php'); // Plugins > Editor
}




?>
