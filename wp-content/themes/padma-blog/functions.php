<?php
/**
 * Padma Blog functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Padma Blog
 */

if ( ! defined( 'PADMA_LITE_VERSION' ) ) {
	$padma_blog_theme = wp_get_theme();
	define( 'PADMA_LITE_VERSION', $padma_blog_theme->get( 'Version' ) );
}


/**
 * Enqueue scripts and styles.
 */
function padma_blog_scripts() {
    wp_enqueue_style( 'padma-blog-parent-style', get_template_directory_uri() . '/style.css',array('bootstrap','slicknav','padma-default-block','padma-style'), '', 'all');
    wp_enqueue_style( 'padma-blog-main-style',get_stylesheet_directory_uri() . '/assets/css/main-style.css',array(), PADMA_LITE_VERSION, 'all');
}
add_action( 'wp_enqueue_scripts', 'padma_blog_scripts' );

/**
 * Custom excerpt length.
 */
function padma_blog_excerpt_length( $length ) {
    return 24;
}
add_filter( 'excerpt_length', 'padma_blog_excerpt_length', 999 );

/**
 * Custom excerpt More.
 */
function padma_blog_excerpt_more( $more ) {
    return '.';
}
add_filter( 'excerpt_more', 'padma_blog_excerpt_more' );

/**
 * Load Padma Blog Customizer.
 */
require get_stylesheet_directory() . '/inc/customizer.php';

/**
 * Load Padma Custom Style.
 */
require get_stylesheet_directory() . '/inc/custom-style.php';

/**
 * Load Padma Blog Footer Style.
 */
require get_stylesheet_directory() . '/inc/footer/footer-2.php';
