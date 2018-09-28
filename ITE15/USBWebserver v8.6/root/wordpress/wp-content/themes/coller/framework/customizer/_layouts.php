<?php
// Layout and Design
function coller_customize_register_layouts( $wp_customize ) {
    $wp_customize->get_section('background_image')->panel = 'coller_design_panel';
    $wp_customize->get_section('colors')->panel = 'coller_design_panel';

    $wp_customize->add_panel('coller_design_panel', array(
        'priority' => 40,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __('Design & Layout', 'coller'),
    ));

    $wp_customize->add_section(
        'coller_design_options',
        array(
            'title' => __('Blog Layout', 'coller'),
            'priority' => 0,
            'panel' => 'coller_design_panel'
        )
    );


    $wp_customize->add_setting(
        'coller_blog_layout',
        array('sanitize_callback' => 'coller_sanitize_blog_layout')
    );

    function coller_sanitize_blog_layout($input)
    {
        if (in_array($input, array('grid', 'grid_2_column', 'grid_3_column', 'coller','coller_club','coller_flat')))
            return $input;
        else
            return '';
    }

    $wp_customize->add_control(
        'coller_blog_layout', array(
            'label' => __('Select Layout', 'coller'),
            'settings' => 'coller_blog_layout',
            'section' => 'coller_design_options',
            'type' => 'select',
            'choices' => array(
                'coller' => __('Coller Theme Layout', 'coller'),
                'coller_flat' => __('Coller Flattened', 'coller'),
                'coller_club' => __('Coller Club', 'coller'),

            )
        )
    );

    $wp_customize->add_section(
        'coller_sidebar_options',
        array(
            'title' => __('Sidebar Layout', 'coller'),
            'priority' => 0,
            'panel' => 'coller_design_panel'
        )
    );

    $wp_customize->add_setting(
        'coller_disable_sidebar',
        array('sanitize_callback' => 'coller_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'coller_disable_sidebar', array(
            'settings' => 'coller_disable_sidebar',
            'label' => __('Disable Sidebar Everywhere.', 'coller'),
            'section' => 'coller_sidebar_options',
            'type' => 'checkbox',
            'default' => false
        )
    );

    $wp_customize->add_setting(
        'coller_disable_sidebar_home',
        array('sanitize_callback' => 'coller_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'coller_disable_sidebar_home', array(
            'settings' => 'coller_disable_sidebar_home',
            'label' => __('Disable Sidebar on Home/Blog.', 'coller'),
            'section' => 'coller_sidebar_options',
            'type' => 'checkbox',
            'active_callback' => 'coller_show_sidebar_options',
            'default' => false
        )
    );

    $wp_customize->add_setting(
        'coller_disable_sidebar_front',
        array('sanitize_callback' => 'coller_sanitize_checkbox')
    );

    $wp_customize->add_control(
        'coller_disable_sidebar_front', array(
            'settings' => 'coller_disable_sidebar_front',
            'label' => __('Disable Sidebar on Front Page.', 'coller'),
            'section' => 'coller_sidebar_options',
            'type' => 'checkbox',
            'active_callback' => 'coller_show_sidebar_options',
            'default' => false
        )
    );


    $wp_customize->add_setting(
        'coller_sidebar_width',
        array(
            'default' => 4,
            'sanitize_callback' => 'coller_sanitize_positive_number')
    );

    $wp_customize->add_control(
        'coller_sidebar_width', array(
            'settings' => 'coller_sidebar_width',
            'label' => __('Sidebar Width', 'coller'),
            'description' => __('Min: 25%, Default: 33%, Max: 40%', 'coller'),
            'section' => 'coller_sidebar_options',
            'type' => 'range',
            'active_callback' => 'coller_show_sidebar_options',
            'input_attrs' => array(
                'min' => 3,
                'max' => 5,
                'step' => 1,
                'class' => 'sidebar-width-range',
                'style' => 'color: #0a0',
            ),
        )
    );

    /* Active Callback Function */
    function coller_show_sidebar_options($control)
    {

        $option = $control->manager->get_setting('coller_disable_sidebar');
        return $option->value() == false;

    }

    class Coller_Custom_CSS_Control extends WP_Customize_Control
    {
        public $type = 'textarea';

        public function render_content()
        {
            ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
                <textarea rows="8"
                          style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea($this->value()); ?></textarea>
            </label>
            <?php
        }
    }

    $wp_customize->add_section(
        'coller_custom_footer',
        array(
            'title' => __('Custom Footer Text', 'coller'),
            'description' => __('Enter your Own Copyright Text.', 'coller'),
            'priority' => 11,
            'panel' => 'coller_design_panel'
        )
    );

    $wp_customize->add_setting(
        'coller_footer_text',
        array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        )
    );

    $wp_customize->add_control(
        'coller_footer_text',
        array(
            'section' => 'coller_custom_footer',
            'settings' => 'coller_footer_text',
            'type' => 'text'
        )
    );
}

add_action( 'customize_register', 'coller_customize_register_layouts' );