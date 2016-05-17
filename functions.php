<?php
// Start the engine
require_once( get_template_directory() . '/lib/init.php' );

// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'SCOM' );
define( 'CHILD_THEME_URL', 'http://www.kylebeard.com/' );

// html5
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

// Require the Lib stuff
require_once( get_stylesheet_directory() . '/lib/structure/header-and-footer.php' );

// Add Viewport meta tag for mobile browsers
add_action( 'genesis_meta', 'sample_viewport_meta_tag' );
function sample_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

// stylesheet / js imports
add_action( 'wp_enqueue_scripts', 'scom_scripts_and_styles' );
function scom_scripts_and_styles() {
	wp_enqueue_style( 'various-styles', get_stylesheet_directory_uri() . '/css/compiled-styles.css' );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'various-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), array('jquery'), true );
}

// remove auto p tags
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );
