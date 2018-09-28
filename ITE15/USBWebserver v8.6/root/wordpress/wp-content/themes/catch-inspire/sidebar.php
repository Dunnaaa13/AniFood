<?php
/**
 * The template for the sidebar containing the main widget area
 *
 * @package Catch_Inspire
 */
?>

<?php
$catch_inspire_layout = catch_inspire_get_theme_layout();

// Bail early if no sidebar layout is selected.
if ( 'no-sidebar' === $catch_inspire_layout ) {
	return;
}

$sidebar = catch_inspire_get_sidebar_id();

if ( '' === $sidebar ) {
    return;
}
?>

<aside id="secondary" class="sidebar widget-area" role="complementary">
	<?php dynamic_sidebar( $sidebar ); ?>
</aside><!-- .sidebar .widget-area -->
