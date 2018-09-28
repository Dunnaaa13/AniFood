<?php
/**
 * The template for displaying the footer
 * @package WordPress
 * @subpackage lzrestaurant
 * @since 1.0
 * @version 1.4
 */

?>
		</div>
		<footer id="colophon" class="site-footer" role="contentinfo">
			<div class="container">
				<?php
				get_template_part( 'template-parts/footer/footer', 'widgets' );
				?>
			</div>
			<div class="clearfix"></div>
			<div class="copyright">
				<div class="container">
					<?php
					if ( has_nav_menu( 'social' ) ) : ?>
						<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'lzrestaurant' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
								) );
							?>
						</nav>
					<?php endif;

					get_template_part( 'template-parts/footer/site', 'info' );
					?>
				</div>
			</div>
		</footer>
	</div>
</div>
<?php wp_footer(); ?>

</body>
</html>
