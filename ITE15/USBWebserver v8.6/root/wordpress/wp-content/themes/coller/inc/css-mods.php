<?php
/* 
**   Custom Modifcations in CSS depending on user settings.
*/

function coller_custom_css_mods() {

	echo "<style id='custom-css-mods'>";
	
	
	//If Menu Description is Disabled.
/*
	if ( !has_nav_menu('primary') || get_theme_mod('coller_disable_nav_desc',true) ) :
		/*
			echo "#site-navigation ul li ul.sub-menu, #site-navigation ul li ul.children { top: 40px; }";
			echo "#site-navigation ul li ul.sub-menu li ul.sub-menu, #site-navigation ul li ul.children li ul.children { top: 0px; }";
		
		echo "#site-navigation ul li a { padding: 14px 12px; }";
		
	endif;
*/
	
	//If Highlighting Nav active item is disabled
	if ( get_theme_mod('coller_disable_active_nav') ) :
		echo "#site-navigation ul .current_page_item > a, #site-navigation ul .current-menu-item > a, #site-navigation ul .current_page_ancestor > a { border:none; background: inherit; }"; 
	endif;
	
	//If Title and Desc is set to Show Below the Logo
	if (  get_theme_mod('coller_branding_below_logo') ) :
		echo "#masthead #text-title-desc { display: block; clear: both; } ";		
	endif;
		
	if ( get_theme_mod('coller_site_titlecolor') ) :
		echo "h1.site-title a { color: ".get_theme_mod('coller_site_titlecolor', '#e10d0d')." !important; }";
	endif;
	
	
	if ( get_theme_mod('coller_header_desccolor','#777') ) :
		echo "h2.site-description { color: ".get_theme_mod('coller_header_desccolor','#777')." !important; }";
	endif;
	
	//For BG Color
	echo ".mega-container { background: #".get_background_color()."; }";
	
	if ( get_theme_mod('coller_hide_title_tagline') ) :
		echo "#masthead .site-branding #text-title-desc { display: none; }";
	endif;

	echo "</style>";
}

add_action('wp_head', 'coller_custom_css_mods');