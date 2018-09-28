<?php
//Logo Settings
function coller_customize_register_header( $wp_customize ) {
    $wp_customize->get_section('header_image')->panel = 'coller_header_panel';

    $wp_customize->add_panel('coller_header_panel', array(
        'title' => __('Header Settings', 'coller'),
        'priority' => 20,
    ));

    $wp_customize->add_section( 'title_tagline' , array(
        'title'      => __( 'Title, Tagline & Logo', 'coller' ),
        'priority'   => 30,
        'panel' => 'coller_header_panel'
    ) );

    $wp_customize->add_setting( 'coller_logo' , array(
        'default'     => '',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'coller_logo',
            array(
                'label' => __('Upload Logo','coller'),
                'section' => 'title_tagline',
                'settings' => 'coller_logo',
                'priority' => 5,
            )
        )
    );

    //Replace Header Text Color with, separate colors for Title and Description
    //Override coller_site_titlecolor
    $wp_customize->remove_control('display_header_text');
    $wp_customize->remove_setting('header_textcolor');
    $wp_customize->add_setting('coller_site_titlecolor', array(
        'default'     => '#e10d0d',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'coller_site_titlecolor', array(
            'label' => __('Site Title Color','coller'),
            'section' => 'colors',
            'settings' => 'coller_site_titlecolor',
            'type' => 'color'
        ) )
    );

    $wp_customize->add_setting('coller_header_desccolor', array(
        'default'     => '#777',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control(
            $wp_customize,
            'coller_header_desccolor', array(
            'label' => __('Site Tagline Color','coller'),
            'section' => 'colors',
            'settings' => 'coller_header_desccolor',
            'type' => 'color'
        ) )
    );
    //Settings For Logo Area

    $wp_customize->add_setting(
        'coller_hide_title_tagline',
        array( 'sanitize_callback' => 'coller_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'coller_hide_title_tagline', array(
            'settings' => 'coller_hide_title_tagline',
            'label'    => __( 'Hide Title and Tagline.', 'coller' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
        )
    );

    $wp_customize->add_setting(
        'coller_branding_below_logo',
        array( 'sanitize_callback' => 'coller_sanitize_checkbox' )
    );

    $wp_customize->add_control(
        'coller_branding_below_logo', array(
            'settings' => 'coller_branding_below_logo',
            'label'    => __( 'Display Site Title and Tagline Below the Logo.', 'coller' ),
            'section'  => 'title_tagline',
            'type'     => 'checkbox',
            'active_callback' => 'coller_title_visible'
        )
    );

    function coller_title_visible( $control ) {
        $option = $control->manager->get_setting('coller_hide_title_tagline');
        return $option->value() == false ;
    }

}
add_action( 'customize_register', 'coller_customize_register_header' );