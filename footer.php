<?php
/**
 * Child theme footer override.
 *
 * When the page uses the `page-blank.php` template we call wp_footer()
 * (so plugins and scripts still enqueue) and then return early to avoid
 * rendering the parent theme footer markup.
 *
 * Place this file in the child theme root so WordPress will use it instead
 * of the parent theme's footer.php.
 */

if ( function_exists( 'is_page_template' ) && is_page_template( 'page-blank.php' ) ) {
    // Let plugins and scripts enqueue footer scripts but omit theme footer markup.
    wp_footer();
    return;
}

// For non-blank pages, fallback to the parent theme footer to retain original markup.
if ( file_exists( get_template_directory() . '/footer.php' ) ) {
    require get_template_directory() . '/footer.php';
}
