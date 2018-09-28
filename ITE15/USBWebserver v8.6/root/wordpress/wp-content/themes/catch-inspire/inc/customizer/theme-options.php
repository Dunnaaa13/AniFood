<?php
/**
 * Theme Options
 *
 * @package Catch_Inspire
 */

/**
 * Add theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_inspire_theme_options( $wp_customize ) {
	$wp_customize->add_panel( 'catch_inspire_theme_options', array(
		'title'    => esc_html__( 'Theme Options', 'catch-inspire' ),
		'priority' => 130,
	) );

	// Breadcrumb Option.
	$wp_customize->add_section( 'catch_inspire_breadcrumb_options', array(
		'description'   => esc_html__( 'Breadcrumbs are a great way of letting your visitors find out where they are on your site with just a glance.', 'catch-inspire' ),
		'panel'         => 'catch_inspire_theme_options',
		'title'         => esc_html__( 'Breadcrumb', 'catch-inspire' ),
	) );

	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_breadcrumb_option',
			'default'           => 1,
			'sanitize_callback' => 'catch_inspire_sanitize_checkbox',
			'label'             => esc_html__( 'Check to enable Breadcrumb', 'catch-inspire' ),
			'section'           => 'catch_inspire_breadcrumb_options',
			'type'              => 'checkbox',
		)
	);

	// Layout Options
	$wp_customize->add_section( 'catch_inspire_layout_options', array(
		'title' => esc_html__( 'Layout Options', 'catch-inspire' ),
		'panel' => 'catch_inspire_theme_options',
		)
	);

	/* Default Layout */
	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_default_layout',
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'catch_inspire_sanitize_select',
			'label'             => esc_html__( 'Default Layout', 'catch-inspire' ),
			'section'           => 'catch_inspire_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'right-sidebar'         => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'catch-inspire' ),
				'no-sidebar'            => esc_html__( 'No Sidebar', 'catch-inspire' ),
			),
		)
	);

	/* Homepage/Archive Layout */
	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_homepage_archive_layout',
			'default'           => 'right-sidebar',
			'sanitize_callback' => 'catch_inspire_sanitize_select',
			'label'             => esc_html__( 'Homepage/Archive Layout', 'catch-inspire' ),
			'section'           => 'catch_inspire_layout_options',
			'type'              => 'radio',
			'choices'           => array(
				'right-sidebar'         => esc_html__( 'Right Sidebar ( Content, Primary Sidebar )', 'catch-inspire' ),
				'no-sidebar'            => esc_html__( 'No Sidebar', 'catch-inspire' ),
			),
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'catch_inspire_excerpt_options', array(
		'panel'     => 'catch_inspire_theme_options',
		'title'     => esc_html__( 'Excerpt Options', 'catch-inspire' ),
	) );

	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_excerpt_length',
			'default'           => '20',
			'sanitize_callback' => 'absint',
			'description' => esc_html__( 'Excerpt length. Default is 20 words', 'catch-inspire' ),
			'input_attrs' => array(
				'min'   => 10,
				'max'   => 200,
				'step'  => 5,
				'style' => 'width: 60px;',
			),
			'label'    => esc_html__( 'Excerpt Length (words)', 'catch-inspire' ),
			'section'  => 'catch_inspire_excerpt_options',
			'type'     => 'number',
		)
	);

	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_excerpt_more_text',
			'default'           => esc_html__( 'Read More', 'catch-inspire' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Read More Text', 'catch-inspire' ),
			'section'           => 'catch_inspire_excerpt_options',
			'type'              => 'text',
		)
	);

	// Excerpt Options.
	$wp_customize->add_section( 'catch_inspire_search_options', array(
		'panel'     => 'catch_inspire_theme_options',
		'title'     => esc_html__( 'Search Options', 'catch-inspire' ),
	) );

	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_search_text',
			'default'           => esc_html__( 'Search', 'catch-inspire' ),
			'sanitize_callback' => 'sanitize_text_field',
			'label'             => esc_html__( 'Search Text', 'catch-inspire' ),
			'section'           => 'catch_inspire_search_options',
			'type'              => 'text',
		)
	);

	// Homepage / Frontpage Options.
	$wp_customize->add_section( 'catch_inspire_homepage_options', array(
		'description' => esc_html__( 'Only posts that belong to the categories selected here will be displayed on the front page', 'catch-inspire' ),
		'panel'       => 'catch_inspire_theme_options',
		'title'       => esc_html__( 'Homepage / Frontpage Options', 'catch-inspire' ),
	) );

	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_front_page_category',
			'sanitize_callback' => 'catch_inspire_sanitize_category_list',
			'custom_control'    => 'Catch_Inspire_Multi_Categories_Control',
			'label'             => esc_html__( 'Categories', 'catch-inspire' ),
			'section'           => 'catch_inspire_homepage_options',
			'type'              => 'dropdown-categories',
		)
	);

	// Pagination Options.
	$pagination_type = get_theme_mod( 'catch_inspire_pagination_type', 'default' );

	$nav_desc = '';

	/**
	* Check if navigation type is Jetpack Infinite Scroll and if it is enabled
	*/
	$nav_desc = sprintf(
		wp_kses(
			__( 'For infinite scrolling, use %1$sCatch Infinite Scroll Plugin%2$s with Infinite Scroll module Enabled.', 'catch-inspire' ),
			array(
				'a' => array(
					'href' => array(),
					'target' => array(),
				),
				'br'=> array()
			)
		),
		'<a target="_blank" href="https://wordpress.org/plugins/catch-infinite-scroll/">',
		'</a>'
	);

	$wp_customize->add_section( 'catch_inspire_pagination_options', array(
		'description' => $nav_desc,
		'panel'       => 'catch_inspire_theme_options',
		'title'       => esc_html__( 'Pagination Options', 'catch-inspire' ),
	) );

	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_pagination_type',
			'default'           => 'default',
			'sanitize_callback' => 'catch_inspire_sanitize_select',
			'choices'           => catch_inspire_get_pagination_types(),
			'label'             => esc_html__( 'Pagination type', 'catch-inspire' ),
			'section'           => 'catch_inspire_pagination_options',
			'type'              => 'select',
		)
	);

	/* Scrollup Options */
	$wp_customize->add_section( 'catch_inspire_scrollup', array(
		'panel'    => 'catch_inspire_theme_options',
		'title'    => esc_html__( 'Scrollup Options', 'catch-inspire' ),
	) );

	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_disable_scrollup',
			'sanitize_callback' => 'catch_inspire_sanitize_checkbox',
			'label'             => esc_html__( 'Disable Scroll Up', 'catch-inspire' ),
			'section'           => 'catch_inspire_scrollup',
			'type'              => 'checkbox',
		)
	);
}
add_action( 'customize_register', 'catch_inspire_theme_options' );