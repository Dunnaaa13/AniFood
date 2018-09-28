<?php
/* Add the child theme setup function to the 'after_setup_theme' hook. */
add_action( 'after_setup_theme', 'collerange_setup', 10 );

function collerange_setup() {
	add_theme_support(
		'custom-background',
		array(
			'default-color' => 'f2f2f2',
		)
	);
}
add_action('wp_enqueue_scripts', 'collerange_scripts');
function collerange_scripts() {
	/* Enqueue the Sole Google Font */
	wp_enqueue_style('collerange-fonts', '//fonts.googleapis.com/css?family=Droid+Sans');
}
?>