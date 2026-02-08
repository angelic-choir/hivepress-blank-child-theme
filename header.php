<?php
/**
 * Child theme header override.
 *
 * This minimal header prints the necessary head tags and calls wp_head(),
 * but returns early (so the parent header HTML / navigation is not rendered)
 * when the page uses the `page-blank.php` template.
 *
 * Place this file in the child theme root so WordPress will use it instead
 * of the parent theme's header.php.
 */

if ( function_exists( 'is_page_template' ) && is_page_template( 'page-blank.php' ) ) {
    // Print only the essential head and body start so plugins/scripts can run.
    ?><!DOCTYPE html>
    <html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>
    <?php
    // Return to the caller template — do not render the full theme header markup.
    return;
}

// For non-blank pages, fallback to the parent theme header to retain original markup.
// We include the parent header directly to avoid recursion (do not call get_header()).
if ( file_exists( get_template_directory() . '/header.php' ) ) {
    require get_template_directory() . '/header.php';
}
