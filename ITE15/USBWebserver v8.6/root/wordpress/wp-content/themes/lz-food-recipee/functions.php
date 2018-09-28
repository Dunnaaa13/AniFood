<?php
/**
 * Theme Functions.
 */

add_action( 'wp_enqueue_scripts', 'lz_food_recipee_enqueue_styles' );
	function lz_food_recipee_enqueue_styles() {
    	$parent_style = 'lzrestaurant-style'; // Style handle of parent theme.
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'lz-food-recipee-style', get_stylesheet_uri(), array( $parent_style ) );
}

// Customizer Section
function lz_food_recipee_customizer ( $wp_customize ) {

	$wp_customize->add_section('lz_food_recipee_service',array(
		'title'	=> __('Restaurant Menu','lz-food-recipee'),
		'panel' => 'lzrestaurant_panel_id',
	));

	$wp_customize->add_setting('lz_food_recipee_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('lz_food_recipee_title',array(
		'label'	=> __('Section Title','lz-food-recipee'),
		'section'	=> 'lz_food_recipee_service',
		'setting'	=> 'lz_food_recipee_title',
		'type'		=> 'text'
	));

	$categories = get_categories();
	$cats = array();
	$i = 0;
	$cat_pst[]= 'select';
	foreach($categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_pst[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('lz_food_recipee_category_setting',array(
		'default'	=> 'select',
		'sanitize_callback' => 'lz_food_recipee_sanitize_choices',
	));
	$wp_customize->add_control('lz_food_recipee_category_setting',array(
		'type'    => 'select',
		'choices' => $cat_pst,
		'label' => __('Select Category to display Post','lz-food-recipee'),
		'section' => 'lz_food_recipee_service',
	));
}
add_action( 'customize_register', 'lz_food_recipee_customizer' );


/*radio button sanitization*/
function lz_food_recipee_sanitize_choices( $input, $setting ) {
    global $wp_customize; 
    $control = $wp_customize->get_control( $setting->id ); 
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

?>