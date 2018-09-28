<?php
function coller_customize_register_misc_scripts($wp_customize){
    $wp_customize->add_section(
        'coller_sec_pro',
        array(
            'title'     => __('Important Links','coller'),
            'priority'  => 10,
        )
    );

    $wp_customize->add_setting(
        'coller_pro',
        array( 'sanitize_callback' => 'esc_textarea' )
    );

    $wp_customize->add_control(
        new WP_Customize_Upgrade_Control(
            $wp_customize,
            'coller_pro',
            array(
                'description'	=> '<a class="coller-important-links" href="https://inkhive.com/contact-us/" target="_blank">'.__('InkHive Support Forum', 'coller').'</a>
                                    <a class="coller-important-links" href="https://inkhive.com/documentation/coller" target="_blank">'.__('Coller Documentation', 'coller').'</a>
                                    <a class="coller-important-links" href="https://demo.inkhive.com/coller-plus/" target="_blank">'.__('Coller Plus Live Demo', 'coller').'</a>
                                    <a class="coller-important-links" href="https://www.facebook.com/inkhivethemes/" target="_blank">'.__('We Love Our Facebook Fans', 'coller').'</a>
                                    <a class="coller-important-links" href="https://wordpress.org/support/theme/coller/reviews" target="_blank">'.__('Review Coller on WordPress', 'coller').'</a>',
                'section' => 'coller_sec_pro',
                'settings' => 'coller_pro',
            )
        )
    );
}
add_action('customize_register', 'coller_customize_register_misc_scripts');