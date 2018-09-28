<?php
/**
 * Displays top navigation
 *
 * @package WordPress
 * @subpackage lzrestaurant
 * @since 1.0
 * @version 1.4
 */

?>
<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'lzrestaurant' ); ?>">
	<i class="fa fa-bars" aria-hidden="true"></i><button class="menu-toggle" aria-controls="top-menu" aria-expanded="false">
		<?php
			esc_html_e( 'Menu', 'lzrestaurant' );
		?>
	</button>

	<?php wp_nav_menu( array(
		'theme_location' => 'top',
		'menu_id'        => 'top-menu',
	) ); ?>	
</nav>