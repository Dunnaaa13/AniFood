<?php
/**
 * Displays Header Right Navigation
 *
 * @package Catch_Inspire
 */
?>

<?php if ( has_nav_menu( 'social-header-right' ) ): ?>
	<div id="site-header-right-menu" class="site-secondary-menu">
			<nav id="social-secondary-navigation-top" class="social-navigation displaynone" role="navigation" aria-label="<?php esc_attr_e( 'Header Right Social Links Menu', 'catch-inspire' ); ?>">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'social-header-right',
						'menu_class'     => 'social-links-menu',
						'depth'          => 1,
						'link_before'    => '<span class="screen-reader-text">',
						'link_after'     => '</span>' . catch_inspire_get_svg( array( 'icon' => 'chain' ) ),
					) );
				?>
			</nav><!-- #social-secondary-navigation -->
	</div><!-- #site-header-right-menu -->
<?php endif;
