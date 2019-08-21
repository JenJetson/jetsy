<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package jetsy
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses jetsy_header_style()
 */
/* this is for the header image features in the CUSTOMIZER
 */


function jetsy_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'jetsy_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => 'fff',
		'width'                  => 2000,
		'height'                 => 850,
		'flex-height'            => true,
		'wp-head-callback'       => 'jetsy_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'jetsy_custom_header_setup' );
