<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package coller
 */
?>
</div><!--.mega-container-->
	</div><!-- #content -->

<?php get_sidebar('footer'); ?>


<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container">
			<div class="site-info col-md-4 col-sm-4 col-xs-12">
				<?php echo ( get_theme_mod('coller_footer_text') == '' ) ? ('&copy; '.date('Y').' '.get_bloginfo('name').__('. All Rights Reserved. ','coller')) : get_theme_mod('coller_footer_text'); ?>
				<span class="sep"></span>
				<?php printf( __( 'Coller Theme by %1$s.', 'coller' ), '<a href="'.esc_url("http://inkhive.com/").'" rel="nofollow">Rohit</a>' ); ?>
				
			</div><!-- .site-info -->

            <?php get_template_part('modules/navigation/menu','footer'); ?>
		</div>
	</footer><!-- #colophon -->
	
</div><!-- #page -->


<?php wp_footer(); ?>

</body>
</html>
