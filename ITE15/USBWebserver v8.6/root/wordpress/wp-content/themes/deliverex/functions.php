<?php
/**
 * Theme functions and definitions
 *
 * @package Deliverex
 */

if ( ! function_exists( 'deliverex_enqueue_styles' ) ) :

	/**
	 * Load assets.
	 *
	 * @since 1.0
	 */
	function deliverex_enqueue_styles() {

		wp_enqueue_style( 'transportex-style-parent', get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'deliverex-style', get_stylesheet_directory_uri() . '/style.css', array( 'transportex-style-parent' ), '1.0' );
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style( 'deliverex-default-css', get_stylesheet_directory_uri()."/css/colors/default.css" );
		wp_dequeue_style( 'default',get_template_directory_uri() .'/css/colors/default.css');
		

	}

endif;

add_action( 'wp_enqueue_scripts', 'deliverex_enqueue_styles', 99 );
?>