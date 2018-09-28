<?php
// SLIDER PANEL
function coller_customize_register_main_slider( $wp_customize ) {
$wp_customize->add_panel( 'coller_slider_panel', array(
    'priority'       => 35,
    'capability'     => 'edit_theme_options',
    'theme_supports' => '',
    'title'          => 'Main Slider',
) );

$wp_customize->add_section(
    'coller_sec_slider_options',
    array(
        'title'     => 'Enable/Disable',
        'priority'  => 0,
        'panel'     => 'coller_slider_panel'
    )
);


$wp_customize->add_setting(
    'coller_main_slider_enable',
    array( 'sanitize_callback' => 'coller_sanitize_checkbox' )
);

$wp_customize->add_control(
    'coller_main_slider_enable', array(
        'settings' => 'coller_main_slider_enable',
        'label'    => __( 'Enable Slider.', 'coller' ),
        'section'  => 'coller_sec_slider_options',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'coller_main_slider_count',
    array(
        'default' => '0',
        'sanitize_callback' => 'coller_sanitize_positive_number'
    )
);

// Select How Many Slides the User wants, and Reload the Page.
$wp_customize->add_control(
    'coller_main_slider_count', array(
        'settings' => 'coller_main_slider_count',
        'label'    => __( 'No. of Slides(Min:0, Max: 10)' ,'coller'),
        'section'  => 'coller_sec_slider_options',
        'type'     => 'number',
        'description' => __('Save the Settings, and Reload this page to Configure the Slides.','coller'),

    )
);





if ( get_theme_mod('coller_main_slider_count') > 0 ) :
    $slides = get_theme_mod('coller_main_slider_count');

    for ( $i = 1 ; $i <= $slides ; $i++ ) :

        //Create the settings Once, and Loop through it.

        $wp_customize->add_setting(
            'coller_slide_img'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            new WP_Customize_Image_Control(
                $wp_customize,
                'coller_slide_img'.$i,
                array(
                    'label' => '',
                    'section' => 'coller_slide_sec'.$i,
                    'settings' => 'coller_slide_img'.$i,
                )
            )
        );


        $wp_customize->add_section(
            'coller_slide_sec'.$i,
            array(
                'title'     => 'Slide '.$i,
                'priority'  => $i,
                'panel'     => 'coller_slider_panel'
            )
        );

        $wp_customize->add_setting(
            'coller_slide_title'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'coller_slide_title'.$i, array(
                'settings' => 'coller_slide_title'.$i,
                'label'    => __( 'Slide Title','coller' ),
                'section'  => 'coller_slide_sec'.$i,
                'type'     => 'text',
            )
        );

        $wp_customize->add_setting(
            'coller_slide_desc'.$i,
            array( 'sanitize_callback' => 'sanitize_text_field' )
        );

        $wp_customize->add_control(
            'coller_slide_desc'.$i, array(
                'settings' => 'coller_slide_desc'.$i,
                'label'    => __( 'Slide Description','coller' ),
                'section'  => 'coller_slide_sec'.$i,
                'type'     => 'text',
            )
        );


        $wp_customize->add_setting(
            'coller_slide_url'.$i,
            array( 'sanitize_callback' => 'esc_url_raw' )
        );

        $wp_customize->add_control(
            'coller_slide_url'.$i, array(
                'settings' => 'coller_slide_url'.$i,
                'label'    => __( 'Target URL','coller' ),
                'section'  => 'coller_slide_sec'.$i,
                'type'     => 'url',
            )
        );

    endfor;


endif;

}
add_action( 'customize_register', 'coller_customize_register_main_slider' );