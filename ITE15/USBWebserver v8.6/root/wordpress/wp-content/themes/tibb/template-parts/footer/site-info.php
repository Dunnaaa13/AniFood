<?php
/**
 * Displays footer site info
 *
 * @package WordPress
 * @subpackage tibb
 * @since 1.0
 * @version 1.0
 */

?>
<div class="site-info">
	<small><?php echo tibb_get_copylight_credit() ?></small><br>
	<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'tibb' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'tibb' ), 'WordPress' ); ?></a>
</div><!-- .site-info -->
