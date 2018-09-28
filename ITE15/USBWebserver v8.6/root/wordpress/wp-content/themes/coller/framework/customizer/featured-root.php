<?php
//featured area 1 start
function coller_customize_register_root( $wp_customize )
{
// CREATE THE fcp PANEL
    $wp_customize->add_panel('coller_farea_panel', array(
        'priority' => 40,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Featured Content Areas', 'coller'),
        'description' => '',
    ));
//farea 1 start
    $wp_customize->add_section(
        'coller_root',
        array(
            'title' => __('Featured Posts Area 2', 'coller'),
            'priority' => 10,
            'panel' => 'coller_farea_panel'
        )
    );

    $wp_customize->add_setting(
        'coller_root_enable',
        array('sanitize_callback' => 'coller_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'coller_root_enable', array(
            'setting' => 'coller_root_enable',
            'label' => __('Enable featured area 2', 'coller'),
            'section' => 'coller_root',
            'type' => 'checkbox',
        )
    );


    $wp_customize->add_setting(
        'coller_root_title',
        array('sanitize_callback' => 'sanitize_text_field')
    );

    $wp_customize->add_control(
        'coller_root_title', array(
            'setting' => 'coller_root_title',
            'label' => __('Title for the featured area 2', 'coller'),
            'section' => 'coller_root',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting(
        'coller_root_cat',
        array('sanitize_callback' => 'coller_sanitize_category')
    );

    $wp_customize->add_control(
        new WP_Customize_Category_Control(
            $wp_customize,
            'coller_root_cat',
            array(
                'label' => __('Posts Category.', 'coller'),
                'setting' => 'coller_root_cat',
                'section' => 'coller_root'
            )
        )
    );
//farea 2 end.
}
add_action( 'customize_register', 'coller_customize_register_root' );