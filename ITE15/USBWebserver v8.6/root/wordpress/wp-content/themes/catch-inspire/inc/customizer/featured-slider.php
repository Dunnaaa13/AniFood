<?php
/**
 * Featured Slider Options
 *
 * @package Catch_Inspire
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_inspire_slider_options( $wp_customize ) {
	$wp_customize->add_section( 'catch_inspire_featured_slider', array(
			'panel' => 'catch_inspire_theme_options',
			'title' => esc_html__( 'Featured Slider', 'catch-inspire' ),
		)
	);

	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_slider_option',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_inspire_sanitize_select',
			'choices'           => catch_inspire_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'catch-inspire' ),
			'section'           => 'catch_inspire_featured_slider',
			'type'              => 'select',
		)
	);

	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_slider_number',
			'default'           => '4',
			'sanitize_callback' => 'catch_inspire_sanitize_number_range',

			'active_callback'   => 'catch_inspire_is_slider_active',
			'description'       => esc_html__( 'Save and refresh the page if No. of Slides is changed (Max no of slides is 20)', 'catch-inspire' ),
			'input_attrs'       => array(
				'style' => 'width: 100px;',
				'min'   => 0,
				'max'   => 20,
				'step'  => 1,
			),
			'label'             => esc_html__( 'No of Slides', 'catch-inspire' ),
			'section'           => 'catch_inspire_featured_slider',
			'type'              => 'number',
		)
	);

	$slider_number = get_theme_mod( 'catch_inspire_slider_number', 4 );

	for ( $i = 1; $i <= $slider_number ; $i++ ) {
		// Page Sliders
		catch_inspire_register_option( $wp_customize, array(
				'name'              =>'catch_inspire_slider_page_' . $i,
				'sanitize_callback' => 'catch_inspire_sanitize_post',
				'active_callback'   => 'catch_inspire_is_slider_active',
				'label'             => esc_html__( 'Page', 'catch-inspire' ) . ' # ' . $i,
				'section'           => 'catch_inspire_featured_slider',
				'type'              => 'dropdown-pages',
			)
		);
	} // End for().
}
add_action( 'customize_register', 'catch_inspire_slider_options' );

/**
 * Returns an array of featured content show registered
 *
 * @since Catch Inspire 1.0
 */
function catch_inspire_content_show() {
	$options = array(
		'excerpt'      => esc_html__( 'Show Excerpt', 'catch-inspire' ),
		'full-content' => esc_html__( 'Full Content', 'catch-inspire' ),
		'hide-content' => esc_html__( 'Hide Content', 'catch-inspire' ),
	);
	return apply_filters( 'catch_inspire_content_show', $options );
}

/** Active Callback Functions */

if( ! function_exists( 'catch_inspire_is_slider_active' ) ) :
	/**
	* Return true if slider is active
	*
	* @since Catch Inspire 1.0
	*/
	function catch_inspire_is_slider_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option('page_for_posts');

		$enable = $control->manager->get_setting( 'catch_inspire_slider_option' )->value();

		//return true only if previwed page on customizer matches the type of slider option selected
		return ( 'entire-site' == $enable || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && 'homepage' == $enable )
			);
	}
endif;