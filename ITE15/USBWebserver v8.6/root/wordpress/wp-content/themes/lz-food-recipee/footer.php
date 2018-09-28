<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package lz-food-recipee
 */
?>
    <div  id="footer" class="copyright-wrapper">
        <div class="container">
            <div class="row m-0">
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-1');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-2');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-3');?>
                </div>
                <div class="col-md-3 col-sm-3">
                    <?php dynamic_sidebar('footer-4');?>
                </div>        
            </div>
        </div>
    </div>
    <div class="site-info">
        <p><?php echo esc_html(get_theme_mod('lzrestaurant_footer_copy',__('Copyright 2018 -','lz-food-recipee'))); ?> <?php lzrestaurant_credit(); ?></p>
    </div>
    <?php wp_footer(); ?>
    </body>
</html>