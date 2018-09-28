<?php
/**
 * Catch Inspire back compat functionality
 *
 * Prevents Catch Inspire from running on WordPress versions prior to 4.4,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.4.
 *
 * @package Catch_Inspire
 */

/**
 * Prevent switching to Catch Inspire on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since Catch Inspire 1.0
 */
function catch_inspire_switch_theme() {
	switch_theme( WP_DEFAULT_THEME, WP_DEFAULT_THEME );

	unset( $_GET['activated'] );

	add_action( 'admin_notices', 'catch_inspire_upgrade_notice' );
}
add_action( 'after_switch_theme', 'catch_inspire_switch_theme' );

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * Catch Inspire on WordPress versions prior to 4.4.
 *
 * @since Catch Inspire 1.0
 *
 * @global string $wp_version WordPress version.
 */
function catch_inspire_upgrade_notice() {
	/* translators: %s: current WordPress version. */
	$message = sprintf( __( 'Catch Inspire requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'catch-inspire' ), $GLOBALS['wp_version'] );
	printf( '<div class="error"><p>%s</p></div>', $message );// WPCS: XSS ok.
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 4.4.
 *
 * @since Catch Inspire 1.0
 *
 * @global string $wp_version WordPress version.
 */
function catch_inspire_customize() {
	/* translators: %s: current WordPress version. */
	$message = sprintf( __( 'Catch Inspire requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'catch-inspire' ), $GLOBALS['wp_version'] ); // WPCS: XSS ok.

	wp_die( $message, '', array(
		'back_link' => true,
	) );
}
add_action( 'load-customize.php', 'catch_inspire_customize' );

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 4.4.
 *
 * @since Catch Inspire 1.0
 *
 * @global string $wp_version WordPress version.
 */
function catch_inspire_preview() {
	if ( isset( $_GET['preview'] ) ) {
		/* translators: %s: current WordPress version. */
		wp_die( sprintf( __( 'Catch Inspire requires at least WordPress version 4.4. You are running version %s. Please upgrade and try again.', 'catch-inspire' ), $GLOBALS['wp_version'] ) );// WPCS: XSS ok.
	}
}
add_action( 'template_redirect', 'catch_inspire_preview' );
