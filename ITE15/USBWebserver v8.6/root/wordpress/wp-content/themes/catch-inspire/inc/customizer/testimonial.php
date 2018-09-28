<?php
/**
 * Add Testimonial Settings in Customizer
 *
 * @package Catch_Inspire
*/

/**
 * Add testimonial options to theme options
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function catch_inspire_testimonial_options( $wp_customize ) {
    // Add note to Jetpack Testimonial Section
    catch_inspire_register_option( $wp_customize, array(
            'name'              => 'catch_inspire_jetpack_testimonial_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Catch_Inspire_Note_Control',
            'label'             => sprintf( esc_html__( 'For Testimonial Options for Catch Inspire Theme, go %1$shere%2$s', 'catch-inspire' ),
                '<a href="javascript:wp.customize.section( \'catch_inspire_testimonials\' ).focus();">',
                 '</a>'
            ),
           'section'            => 'jetpack_testimonials',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

    $wp_customize->add_section( 'catch_inspire_testimonials', array(
            'panel'    => 'catch_inspire_theme_options',
            'title'    => esc_html__( 'Testimonials', 'catch-inspire' ),
        )
    );

     $action = 'install-plugin';
    $slug   = 'essential-content-types';

    $install_url = wp_nonce_url(
        add_query_arg(
            array(
                'action' => $action,
                'plugin' => $slug
            ),
            admin_url( 'update.php' )
        ),
        $action . '_' . $slug
    );

    // Add note to ECT Featured Content Section
    catch_inspire_register_option( $wp_customize, array(
            'name'              => 'catch_inspire_testimonial_note_1',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Catch_Inspire_Note_Control',
            'active_callback'   => 'catch_inspire_is_ect_testimonial_inactive',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
            'label'             => sprintf( esc_html__( 'For Testimonial, install %1$sEssential Content Types%2$s Plugin with Testimonial Content Type Enabled', 'catch-inspire' ),
                '<a target="_blank" href="' . esc_url( $install_url ) . '">',
                '</a>'

            ),
           'section'            => 'catch_inspire_testimonials',
            'type'              => 'description',
            'priority'          => 1,
        )
    );

    catch_inspire_register_option( $wp_customize, array(
            'name'              => 'catch_inspire_testimonial_option',
            'default'           => 'disabled',
            'sanitize_callback' => 'catch_inspire_sanitize_select',
            'active_callback'   => 'catch_inspire_is_ect_testimonial_active',
            'choices'           => catch_inspire_section_visibility_options(),
            'label'             => esc_html__( 'Enable on', 'catch-inspire' ),
            'section'           => 'catch_inspire_testimonials',
            'type'              => 'select',
            'priority'          => 1,
        )
    );

    catch_inspire_register_option( $wp_customize, array(
            'name'              => 'catch_inspire_testimonial_cpt_note',
            'sanitize_callback' => 'sanitize_text_field',
            'custom_control'    => 'Catch_Inspire_Note_Control',
            'active_callback'   => 'catch_inspire_is_testimonial_active',
            /* translators: 1: <a>/link tag start, 2: </a>/link tag close. */
			'label'             => sprintf( esc_html__( 'For CPT heading and sub-heading, go %1$shere%2$s', 'catch-inspire' ),
                '<a href="javascript:wp.customize.section( \'jetpack_testimonials\' ).focus();">',
                '</a>'
            ),
            'section'           => 'catch_inspire_testimonials',
            'type'              => 'description',
        )
    );

    catch_inspire_register_option( $wp_customize, array(
            'name'              => 'catch_inspire_testimonial_number',
            'default'           => '3',
            'sanitize_callback' => 'catch_inspire_sanitize_number_range',
            'active_callback'   => 'catch_inspire_is_testimonial_active',
            'label'             => esc_html__( 'Number of items to show', 'catch-inspire' ),
            'section'           => 'catch_inspire_testimonials',
            'type'              => 'number',
            'input_attrs'       => array(
                'style'             => 'width: 100px;',
                'min'               => 0,
            ),
        )
    );

    $number = get_theme_mod( 'catch_inspire_testimonial_number', 3 );

    for ( $i = 1; $i <= $number ; $i++ ) {
        //for CPT
        catch_inspire_register_option( $wp_customize, array(
                'name'              => 'catch_inspire_testimonial_cpt_' . $i,
                'sanitize_callback' => 'catch_inspire_sanitize_post',
                'active_callback'   => 'catch_inspire_is_testimonial_active',
                'label'             => esc_html__( 'Testimoial', 'catch-inspire' ) . ' ' . $i ,
                'section'           => 'catch_inspire_testimonials',
                'type'              => 'select',
                'choices'           => catch_inspire_generate_post_array( 'jetpack-testimonial' ),
            )
        );
    } // End for().
}
add_action( 'customize_register', 'catch_inspire_testimonial_options' );

/**
 * Active Callback Functions
 */
if ( ! function_exists( 'catch_inspire_is_testimonial_active' ) ) :
    /**
    * Return true if testimonial is active
    *
    * @since Catch Inspire 1.0
    */
    function catch_inspire_is_testimonial_active( $control ) {
        $enable = $control->manager->get_setting( 'catch_inspire_testimonial_option' )->value();

        //return true only if previwed page on customizer matches the type of content option selected
        return ( catch_inspire_check_section( $enable ) );
    }
endif;

if ( ! function_exists( 'catch_inspire_is_ect_testimonial_inactive' ) ) :
    /**
    *
    * @since Catch Inspire 1.0
    */
    function catch_inspire_is_ect_testimonial_inactive( $control ) {
        return ! ( class_exists( 'Essential_Content_Jetpack_Testimonial' ) || class_exists( 'Essential_Content_Pro_Jetpack_Testimonial' ) );
    }
endif;

if ( ! function_exists( 'catch_inspire_is_ect_testimonial_active' ) ) :
    /**
    *
    * @since Catch Inspire 1.0
    */
    function catch_inspire_is_ect_testimonial_active( $control ) {
        return ( class_exists( 'Essential_Content_Jetpack_Testimonial' ) || class_exists( 'Essential_Content_Pro_Jetpack_Testimonial' ) );
    }
endif;