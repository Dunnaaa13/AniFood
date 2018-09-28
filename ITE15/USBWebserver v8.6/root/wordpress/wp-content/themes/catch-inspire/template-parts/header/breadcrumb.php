<?php
/**
 * Display Breadcrumb
 *
 * @package Catch_Inspire
 */
?>

<?php
if ( ! get_theme_mod( 'catch_inspire_breadcrumb_option', 1 ) ) {
    // Bail if breadcrumb is disabled.
    return;
}
    catch_inspire_breadcrumb();
