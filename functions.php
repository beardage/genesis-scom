<?php
// Start the engine
require_once( get_template_directory() . '/lib/init.php' );

// Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Allnighter' );
define( 'CHILD_THEME_URL', 'http://www.kylebeard.com/' );

// html5
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );

// Require the Lib stuff
require_once( get_stylesheet_directory() . '/lib/cpts/portfolio-cpt.php' );

// Add Viewport meta tag for mobile browsers
add_action( 'genesis_meta', 'sample_viewport_meta_tag' );
function sample_viewport_meta_tag() {
	echo '<meta name="viewport" content="width=device-width, initial-scale=1.0"/>';
}

// stylesheet / js imports
add_action( 'wp_enqueue_scripts', 'allnighter_scripts_and_styles' );
function allnighter_scripts_and_styles() {
	wp_enqueue_style( 'various-styles', get_stylesheet_directory_uri() . '/css/compiled-styles.css' );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css' );
	wp_enqueue_script('jquery');
	wp_enqueue_script( 'various-scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array(), array('jquery'), true );
}



// remove auto p tags
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

// Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 1 );


// no footer as of now
remove_action( 'genesis_footer', 'genesis_do_footer' );


// set up navigation
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action('genesis_header', 'genesis_do_header');
add_action('genesis_before', 'an_do_header');
function an_do_header() {
	?>
	<div class="site-header">
		<div class="logo left">
			<a href="/" data-text="kylebeard //">kylebeard //</a>
		</div>

		<ul class="navigation right">
			<?php genesis_do_nav();  ?>
		</ul>
	</div>
	<?php
}
