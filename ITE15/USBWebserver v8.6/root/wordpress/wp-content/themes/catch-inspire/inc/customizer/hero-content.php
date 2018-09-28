<?php
/**
 * Hero Content Options
 *
 * @package Catch_Inspire
 */

/**
 * Add hero content options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_inspire_hero_content_options( $wp_customize ) {
	$wp_customize->add_section( 'catch_inspire_hero_content_options', array(
			'title' => esc_html__( 'Hero Content Options', 'catch-inspire' ),
			'panel' => 'catch_inspire_theme_options',
		)
	);

	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_hero_content_visibility',
			'default'           => 'disabled',
			'sanitize_callback' => 'catch_inspire_sanitize_select',
			'choices'           => catch_inspire_section_visibility_options(),
			'label'             => esc_html__( 'Enable on', 'catch-inspire' ),
			'section'           => 'catch_inspire_hero_content_options',
			'type'              => 'select',
		)
	);

	catch_inspire_register_option( $wp_customize, array(
			'name'              => 'catch_inspire_hero_content',
			'default'           => '0',
			'sanitize_callback' => 'catch_inspire_sanitize_post',
			'active_callback'   => 'catch_inspire_is_hero_content_active',
			'label'             => esc_html__( 'Page', 'catch-inspire' ),
			'section'           => 'catch_inspire_hero_content_options',
			'type'              => 'dropdown-pages',
		)
	);
}
add_action( 'customize_register', 'catch_inspire_hero_content_options' );

/** Active Callback Functions **/
if ( ! function_exists( 'catch_inspire_is_hero_content_active' ) ) :
	/**
	* Return true if hero content is active
	*
	* @since Catch Inspire 1.0
	*/
	function catch_inspire_is_hero_content_active( $control ) {
		global $wp_query;

		$page_id = $wp_query->get_queried_object_id();

		// Front page display in Reading Settings
		$page_for_posts = get_option( 'page_for_posts' );

		$enable = $control->manager->get_setting( 'catch_inspire_hero_content_visibility' )->value();

		//return true only if previwed page on customizer matches the type of content option selected
		return ( 'entire-site' == $enable  || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) &&	 'homepage' == $enable )
			);
	}
endif;