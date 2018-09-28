<?php
/*
** Template to Render Social Icons on Top Bar
*/
$social_style = get_theme_mod('coller_social_icon_style_set','coller-default');
//var_dump($social_style);
for ($i = 1; $i < 8; $i++) : 
	$social = get_theme_mod('coller_social_'.$i);
	if ( ($social != 'none') && ($social != '') ) : ?>
	<a href="<?php echo esc_url( get_theme_mod('coller_social_url'.$i) ); ?>">
		<img class = "social-style <?php echo $social_style;?>" src="<?php echo get_template_directory_uri()."/assets/images/soshion/".$social.".png"; ?>">
	</a>
	<?php endif;

endfor; ?>