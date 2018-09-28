<?php

add_action( 'wp_enqueue_scripts', 'ultimate_amp_enqueue_styles' );

function ultimate_amp_enqueue_styles() {
    wp_enqueue_style( 'ultimate-amp-style', get_stylesheet_directory_uri() . '/style.css', array('videostories-style'));
	wp_enqueue_style( 'ultimate-amp-header', get_stylesheet_directory_uri() . '/assets/css/header.css', array('videostories-header'));
	wp_enqueue_style( 'ultimate-amp-themes', get_stylesheet_directory_uri() . '/assets/css/themes.css', array('videostories-themes'));
	wp_enqueue_style( 'ultimate-amp-responsive', get_stylesheet_directory_uri() . '/assets/css/responsive.css', array('videostories-responsive'));

	//Owl Carousel
	wp_enqueue_style( 'owl-carousel', get_stylesheet_directory_uri() . '/assets/css/owl.carousel.css');
	wp_enqueue_script( 'owl-carousel', get_stylesheet_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '', true );
	wp_enqueue_script( 'ultimate-amp-script', get_stylesheet_directory_uri() . '/assets/js/ultimate-amp-script.js', array('jquery'), '', true );
}


/*
* After Theme Setup
*/
add_action( 'after_setup_theme', 'ultimate_amp_setup' );
if ( ! function_exists( 'ultimate_amp_setup' ) ) {
	function ultimate_amp_setup(){
		add_image_size( 'ultimate-amp-slider-thumb', '180', '260', true );
		add_image_size( 'ultimate-amp-blog', '750', '425', true );
		add_image_size( 'ultimate-amp-featured-thumb', '720', '530', true );
		add_image_size( 'ultimate-amp-featured-square-thumb', '365', '265', true );
	}
}



require ( get_stylesheet_directory() . '/inc/ultimate-amp-functions.php' );