<?php
//Settings for Header Image
function coller_customize_register_header_img( $wp_customize ) {
$wp_customize->add_setting( 'coller_himg_style' , array(
    'default'     => 'cover',
    'sanitize_callback' => 'coller_sanitize_himg_style'
) );

/* Sanitization Function */
function coller_sanitize_himg_style( $input ) {
    if (in_array( $input, array('contain','cover') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'coller_himg_style', array(
    'label' => __('Header Image Arrangement','coller'),
    'section' => 'header_image',
    'settings' => 'coller_himg_style',
    'type' => 'select',
    'choices' => array(
        'contain' => __('Contain','coller'),
        'cover' => __('Cover Completely (Recommended)','coller'),
    )
) );

$wp_customize->add_setting( 'coller_himg_align' , array(
    'default'     => 'center',
    'sanitize_callback' => 'coller_sanitize_himg_align'
) );

/* Sanitization Function */
function coller_sanitize_himg_align( $input ) {
    if (in_array( $input, array('center','left','right') ) )
        return $input;
    else
        return '';
}

$wp_customize->add_control(
    'coller_himg_align', array(
    'label' => __('Header Image Alignment','coller'),
    'section' => 'header_image',
    'settings' => 'coller_himg_align',
    'type' => 'select',
    'choices' => array(
        'center' => __('Center','coller'),
        'left' => __('Left','coller'),
        'right' => __('Right','coller'),
    )
) );

$wp_customize->add_setting( 'coller_himg_repeat' , array(
    'sanitize_callback' => 'coller_sanitize_checkbox'
) );

$wp_customize->add_control(
    'coller_himg_repeat', array(
    'label' => __('Repeat Header Image','coller'),
    'section' => 'header_image',
    'settings' => 'coller_himg_repeat',
    'type' => 'checkbox',
) );

}
add_action( 'customize_register', 'coller_customize_register_header_img' );