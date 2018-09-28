<?php
/**
 * Displays header site branding
 *
 * @package WordPress
 * @subpackage lzrestaurant
 * @since 1.0
 * @version 1.4
 */

?>
<div class="site-branding">
	<div class="container">
		<?php if ( ( lzrestaurant_is_frontpage() || ( is_home() && is_front_page() ) ) && ! has_nav_menu( 'top' ) ) : ?>
		<a href="#content" class="menu-scroll-down"><span class="screen-reader-text"><?php esc_html_e( 'Scroll down to content', 'lzrestaurant' ); ?></span></a>
	<?php endif; ?>
	</div>
</div>