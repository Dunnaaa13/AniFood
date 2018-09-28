<?php
/**
 * The header for our theme
 *
 * @package WordPress
 * @subpackage lz-food-recipee
 * @since 1.0
 * @version 1.4
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'lz-food-recipee' ) ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
  <div class="toggle"><a class="toggleMenu" href="#"><?php esc_html_e('Menu','lz-food-recipee'); ?></a></div>

  <header id="masthead" class="site-header" role="banner">
    <?php get_template_part( 'template-parts/header/header', 'image' ); ?>
    <div class="main-top">
      <div class="container">
        <div class="topbar">
          <div class="row">
            <div class="col-lg-3 col-md-3">
              <div class="logo">        
                    <?php if( has_custom_logo() ){ lzrestaurant_the_custom_logo();
                       }else{ ?>
                      <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                      <?php $description = get_bloginfo( 'description', 'display' );
                      if ( $description || is_customize_preview() ) : ?> 
                        <p class="site-description"><?php echo esc_html($description); ?></p>       
                    <?php endif; }?>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div id="header">
                <div class="nav">
                  <?php wp_nav_menu( array('theme_location'  => 'primary') ); ?>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3">
              <div class="socialbox">
                <?php if(esc_url( get_theme_mod( 'lzrestaurant_facebook' ) ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'lzrestaurant_facebook','' ) ); ?>"><i class="fab fa-facebook-f"></i></a>
                <?php } ?>
                <?php if(esc_url( get_theme_mod( 'lzrestaurant_twitter' ) ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'lzrestaurant_twitter','' ) ); ?>"><i class="fab fa-twitter"></i></a>
                <?php } ?>
                <?php if(esc_url( get_theme_mod( 'lzrestaurant_google_plus' ) ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'lzrestaurant_google_plus','' ) ); ?>"><i class="fab fa-google-plus-g"></i></a>
                <?php } ?>
                <?php if(esc_url( get_theme_mod( 'lzrestaurant_pinterest' ) ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'lzrestaurant_pinterest','' ) ); ?>"><i class="fab fa-pinterest-p"></i></a>
                <?php } ?>
                <?php if(esc_url( get_theme_mod( 'lzrestaurant_tumblr' ) ) != '') { ?>
                  <a href="<?php echo esc_url( get_theme_mod( 'lzrestaurant_tumblr','' ) ); ?>"><i class="fab fa-tumblr"></i></a>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <?php

  if ( ( is_single() || ( is_page() && ! lzrestaurant_is_frontpage() ) ) && has_post_thumbnail( get_queried_object_id() ) ) :
    echo '<div class="single-featured-image-header">';
    echo get_the_post_thumbnail( get_queried_object_id(), 'lzrestaurant-featured-image' );
    echo '</div><!-- .single-featured-image-header -->';
  endif;
  ?>

  <div class="site-content-contain">
    <div id="content" class="site-content">