<?php

// Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

// set up navigation
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action('genesis_header', 'genesis_do_header');
add_action('genesis_before', 'an_do_header');
function an_do_header() {
	?>
	<div class="site-header">
		<div class="logo left">
			<a href="/">SCOM</a>
		</div>

		<ul class="navigation right">
			<?php genesis_do_nav();  ?>
		</ul>

		<div class="clear"></div>
	</div>
	<?php
}
