<?php
//featured area 1 start
function coller_customize_register_square( $wp_customize )
{
// CREATE THE fcp PANEL
    $wp_customize->add_panel('coller_farea_panel', array(
        'priority' => 40,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Featured Posts Area', 'coller'),
        'description' => '',
    ));
//farea 1 start
    $wp_customize->add_section(
        'coller_square',
        array(
            'title' => __('Featured Posts Area 1', 'coller'),
            'priority' => 10,
            'panel' => 'coller_farea_panel'
        )
    );

    $wp_customize->add_setting(
        'coller_square_enable',
        array('sanitize_callback' => 'coller_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'coller_square_enable', array(
            'setting' => 'coller_square_enable',
            'label' => __('Enable featured area 1', 'coller'),
            'section' => 'coller_square',
            'type' => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'coller_square_title',
        array('sanitize_callback' => 'sanitize_text_field')
    );

    $wp_customize->add_control(
        'coller_square_title', array(
            'setting' => 'coller_square_title',
            'label' => __('Title for the featured area 1', 'coller'),
            'section' => 'coller_square',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'coller_square_cat',
        array('sanitize_callback' => 'coller_sanitize_category')
    );

    $wp_customize->add_control(
        new WP_Customize_Category_Control(
            $wp_customize,
            'coller_square_cat',
            array(
                'label' => __('Posts Category.', 'coller'),
                'setting' => 'coller_square_cat',
                'section' => 'coller_square'
            )
        )
    );
//farea 1 end.
}
add_action( 'customize_register', 'coller_customize_register_square' );