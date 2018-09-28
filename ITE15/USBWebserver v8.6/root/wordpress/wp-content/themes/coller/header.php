<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package coller
 */
?>
<?php get_template_part('modules/header/head'); ?>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'coller' ); ?></a>

    <?php get_template_part('modules/header/jumbosearch'); ?>

    <?php get_template_part('modules/header/masthead'); ?>

    <?php get_template_part('modules/navigation/menu','primary'); ?>
	
	<?php get_template_part('framework/featured-components/slider', 'nivo' ); ?>
	
	<div class="mega-container">
		<?php get_template_part('framework/featured-components/featured', 'square' ); ?>
        <?php get_template_part('framework/featured-components/featured', 'root' ); ?>
		<?php get_template_part('featured', 'posts' ); ?>
		<?php get_template_part('featured', 'content2'); ?>
		<?php get_template_part('featured', 'content1'); ?>
	
		<div id="content" class="site-content container">