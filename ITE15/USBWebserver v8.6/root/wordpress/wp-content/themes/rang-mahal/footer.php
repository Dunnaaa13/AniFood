<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package rma
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer text-center mt-4 text-muted">

		<section class="footer-widgets text-left">
			<div class="container">
				<div class="row">
					<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="col">
							<aside class="widget-area footer-1-area mb-2">
								<?php dynamic_sidebar( 'footer-1' ); ?>
							</aside>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<div class="col">
							<aside class="widget-area footer-2-area mb-2">
								<?php dynamic_sidebar( 'footer-2' ); ?>
							</aside>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<div class="col">
							<aside class="widget-area footer-3-area mb-2">
								<?php dynamic_sidebar( 'footer-3' ); ?>
							</aside>
						</div>
					<?php endif; ?>

					<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<div class="col">
							<aside class="widget-area footer-4-area mb-2">
								<?php dynamic_sidebar( 'footer-4' ); ?>
							</aside>
						</div>
					<?php endif; ?>
				</div>
				<!-- /.row -->
			</div>
		</section>

		<div class="container">
			<div class="site-info">
				<a href="<?php echo esc_url( 'http://ibulb.work' ); ?>"><?php esc_html_e( 'Rang Mahal WordPress Theme', 'rang-mahal' ); ?></a>
				<span class="sep"> | </span>
				<?php
					/* translators: 1: Theme name. */
					printf( esc_html__( 'Theme Name: %1$s.', 'rang-mahal' ), 'rang-mahal' );
				?>
			</div><!-- .site-info -->
		</div>
		<!-- /.container -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
