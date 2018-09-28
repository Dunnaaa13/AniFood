<?php
/**
 * Customizer functionality
 *
 * @package Catch_Inspire
 */

/**
 * Sets up the WordPress core custom header and custom background features.
 *
 * @since Catch Inspire 1.0
 *
 * @see catch_inspire_header_style()
 */
function catch_inspire_custom_header_and_background() {
	$default_background_color = '#f3f5f5';
	$default_text_color       = '#000000';

	/**
	 * Filter the arguments used when adding 'custom-background' support in Persona.
	 *
	 * @since Catch Inspire 1.0
	 *
	 * @param array $args {
	 *     An array of custom-background support arguments.
	 *
	 *     @type string $default-color Default color of the background.
	 * }
	 */
	add_theme_support( 'custom-background', apply_filters( 'catch_inspire_custom_background_args', array(
		'default-color' => $default_background_color,
	) ) );

	/**
	 * Filter the arguments used when adding 'custom-header' support in Persona.
	 *
	 * @since Catch Inspire 1.0
	 *
	 * @param array $args {
	 *     An array of custom-header support arguments.
	 *
	 *     @type string $default-text-color Default color of the header text.
	 *     @type int      $width            Width in pixels of the custom header image. Default 1200.
	 *     @type int      $height           Height in pixels of the custom header image. Default 280.
	 *     @type bool     $flex-height      Whether to allow flexible-height header images. Default true.
	 *     @type callable $wp-head-callback Callback function used to style the header image and text
	 *                                      displayed on the blog.
	 * }
	 */
	add_theme_support( 'custom-header', apply_filters( 'catch_inspire_custom_header_args', array(
		'default-image'      	 => get_parent_theme_file_uri( '/assets/images/header-image.jpg' ),
		'default-text-color'     => $default_text_color,
		'width'                  => 1920,
		'height'                 => 822,
		'flex-height'            => true,
		'flex-height'            => true,
		'wp-head-callback'       => 'catch_inspire_header_style',
		'video'                  => true,
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/header-image.jpg',
			'thumbnail_url' => '%s/assets/images/header-image-275x155.jpg',
			'description'   => esc_html__( 'Default Header Image', 'catch-inspire' ),
		),
	) );
}
add_action( 'after_setup_theme', 'catch_inspire_custom_header_and_background' );

if ( ! function_exists( 'catch_inspire_header_style' ) ) :
	/**
	 * Styles the header text displayed on the site.
	 *
	 * Create your own catch_inspire_header_style() function to override in a child theme.
	 *
	 * @since Catch Inspire Pro 1.0
	 *
	 * @see catch_inspire_custom_header_and_background().
	 */
	function catch_inspire_header_style() {
	

	if ( display_header_text() ) {
		$header_text_color = get_header_textcolor();

		if ( $header_text_color ) :
		?>
		<style type="text/css" id="catch-inspire-header-css">
		.site-title a,
		.site-description {
			color: #<?php echo esc_attr( $header_text_color ); ?>;
		}
		</style>
	<?php
		endif;
	} else {
		?>
		<style type="text/css" id="catch-inspire-header-css">
		.site-branding {
			margin: 0 auto 0 0;
		}

		.site-identity {
			clip: rect(1px, 1px, 1px, 1px);
			position: absolute;
		}
		</style>
	<?php
	}
}
endif; // catch_inspire_header_style

/**
 * Customize video play/pause button in the custom header.
 *
 * @param array $settings header video settings.
 */
function catch_inspire_video_controls( $settings ) {
	$settings['l10n']['play'] = '<span class="screen-reader-text">' . esc_html__( 'Play background video', 'catch-inspire' ) . '</span>' . catch_inspire_get_svg( array(
		'icon' => 'play',
	) );
	$settings['l10n']['pause'] = '<span class="screen-reader-text">' . esc_html__( 'Pause background video', 'catch-inspire' ) . '</span>' . catch_inspire_get_svg( array(
		'icon' => 'pause',
	) );

	return $settings;
}
add_filter( 'header_video_settings', 'catch_inspire_video_controls' );
