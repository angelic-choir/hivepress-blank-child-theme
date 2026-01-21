<?php

add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'hivepress-child-blank',
		get_stylesheet_uri(),
		[],
		wp_get_theme()->get( 'Version' ) );
} );

add_action( 'wp_enqueue_scripts', function () {

	if ( is_page_template( 'page-blank.php' ) ) {           // runs only on that page :contentReference[oaicite:4]{index=4}
		// 1. Remove HivePress & parent assets
		wp_dequeue_style( 'hivepress-grid' );
		wp_dequeue_style( 'hivepress-core-common' );
		wp_dequeue_style( 'hivepress-core-frontend' );
		wp_dequeue_style( 'hivepress-core-frontend' );
		wp_dequeue_style( 'hivepress-blocks-frontend' );
		wp_dequeue_style( 'hivepress-bookings' );
		wp_dequeue_style( 'hivepress-bookings-frontend' );
		wp_dequeue_style( 'hivepress-geolocation-frontend' );
		wp_dequeue_style( 'hivepress-marketplace-frontend' );
		wp_dequeue_style( 'hivepress-messages-frontend' );
		wp_dequeue_style( 'hivepress-reviews-frontend' );
		wp_dequeue_style( 'hivetheme-core-frontend' );
		wp_dequeue_style( 'hivetheme-parent-frontend' );
		wp_dequeue_style( 'hivetheme-parent-frontend-inline' );
		wp_dequeue_style( 'minireset' );
		wp_dequeue_style( 'flexbox-grid' );
		wp_dequeue_script( 'hivepress-theme' );               // example :contentReference[oaicite:5]{index=5}

	}
}, 20 );   // priority 20 ⇒ runs after HivePress enqueues

// Add inline styles to hide .hp-modal on blank page template
add_action( 'wp_head', function () {
	if ( is_page_template( 'page-blank.php' ) ) {
		echo '<style>
			body.page-template-page-blank .hp-modal,
			body.page-template-page-blank-php .hp-modal {
				display: none !important;
			}
		</style>';
	}
} );

add_action( 'after_setup_theme', function () {
	// HivePress removes this; we add it back so the Template dropdown shows.
	add_post_type_support( 'page', 'page-attributes' );  //  ← requirement ② :contentReference[oaicite:2]{index=2}
} );