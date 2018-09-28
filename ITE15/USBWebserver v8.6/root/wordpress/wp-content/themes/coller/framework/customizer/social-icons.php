<?php
// Social Icons
function coller_customize_register_social( $wp_customize ) {
$wp_customize->add_section('coller_social_section', array(
    'title' => __('Social Icons','coller'),
    'priority' => 44 ,
    'panel' => 'coller_header_panel'
));

$social_networks = array( //Redefinied in Sanitization Function.
    'none' => __('-','coller'),
    'facebook' => __('Facebook','coller'),
    'twitter' => __('Twitter','coller'),
    'google-plus' => __('Google Plus','coller'),
    'instagram' => __('Instagram','coller'),
    'rss' => __('RSS Feeds','coller'),
    'vine' => __('Vine','coller'),
    'vimeo-square' => __('Vimeo','coller'),
    'youtube' => __('Youtube','coller'),
    'flickr' => __('Flickr','coller'),
);
//social icons style
    $social_style = array(
        'coller-default'  => __('Default', 'coller'),
        'style1'   => __('Style 1', 'coller'),
        'style2'   => __('Style 2', 'coller'),


    );
    $wp_customize->add_setting(
        'coller_social_icon_style_set', array(
        'sanitize_callback' => 'coller_sanitize_social_style',
        'default' => 'coller-default'
    ));

    function coller_sanitize_social_style( $input ) {
        if ( in_array($input, array('coller-default','style1','style2') ) )
            return $input;
        else
            return '';
    }

    $wp_customize->add_control( 'coller_social_icon_style_set', array(
        'setting' => 'coller_social_icon_style_set',
        'label' => __('Social Icon Style ','coller'),
        'description' => __('You can choose your icon style','coller'),
        'section' => 'coller_social_section',
        'type' => 'select',
        'choices' => $social_style,
    ));
$social_count = count($social_networks);

for ($x = 1 ; $x <= ($social_count - 3) ; $x++) :

    $wp_customize->add_setting(
        'coller_social_'.$x, array(
        'sanitize_callback' => 'coller_sanitize_social',
        'default' => 'none'
    ));

    $wp_customize->add_control( 'coller_social_'.$x, array(
        'setting' => 'coller_social_'.$x,
        'label' => __('Icon ','coller').$x,
        'section' => 'coller_social_section',
        'type' => 'select',
        'choices' => $social_networks,
    ));

    $wp_customize->add_setting(
        'coller_social_url'.$x, array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control( 'coller_social_url'.$x, array(
        'setting' => 'coller_social_url'.$x,
        'description' => __('Icon ','coller').$x.__(' Url','coller'),
        'section' => 'coller_social_section',
        'type' => 'url',
        'choices' => $social_networks,
    ));

endfor;

function coller_sanitize_social( $input ) {
    $social_networks = array(
        'none' ,
        'facebook',
        'twitter',
        'google-plus',
        'instagram',
        'rss',
        'vine',
        'vimeo-square',
        'youtube',
        'flickr'
    );
    if ( in_array($input, $social_networks) )
        return $input;
    else
        return '';
}
}
add_action( 'customize_register', 'coller_customize_register_social' );