<?php
/**
 * Returns theme options
 *
 * Uses sane defaults in case the user has not configured any theme options yet.
 *
 * @package Maxwell
 */

/**
* Get a single theme option
*
* @return mixed
*/
function maxwell_get_option( $option_name = '' ) {

	// Get all Theme Options from Database.
	$theme_options = maxwell_theme_options();

	// Return single option.
	if ( isset( $theme_options[ $option_name ] ) ) {
		return $theme_options[ $option_name ];
	}

	return false;
}


/**
 * Get saved user settings from database or theme defaults
 *
 * @return array
 */
function maxwell_theme_options() {

	// Merge theme options array from database with default options array.
	$theme_options = wp_parse_args( get_option( 'maxwell_theme_options', array() ), maxwell_default_options() );

	// Return theme options.
	return $theme_options;
}


/**
 * Returns the default settings of the theme
 *
 * @return array
 */
function maxwell_default_options() {

	$default_options = array(
		'retina_logo'           => false,
		'site_title'            => true,
		'site_description'      => false,
		'custom_header_link'    => '',
		'custom_header_hide'    => false,
		'layout'                => 'right-sidebar',
		'blog_title'            => '',
		'blog_description'      => '',
		'post_layout'           => 'one-column',
		'read_more_text'        => esc_html__( 'Continue reading', 'maxwell' ),
		'blog_magazine_widgets' => true,
		'excerpt_use_more_tag'  => false,
		'excerpt_length'        => 20,
		'meta_date'             => true,
		'meta_author'           => true,
		'meta_category'         => true,
		'meta_tags'             => true,
		'post_navigation'       => true,
		'post_image_archives'   => true,
		'post_image_single'     => true,
		'slider_magazine'       => false,
		'slider_blog'           => false,
		'slider_category'       => 0,
		'slider_limit'          => 8,
		'slider_animation'      => 'slide',
		'slider_speed'          => 7000,
	);

	return $default_options;
}
