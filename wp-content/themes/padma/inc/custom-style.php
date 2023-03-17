<?php 
function padma_custom_css() {
    wp_enqueue_style('padma-custom', get_template_directory_uri() . '/assets/css/custom-style.css' );
    $header_text_color = get_header_textcolor();
    $padma_custom_css = '';
    $padma_custom_css .= '
        .site-title a,
        .site-description,
        .site-title a:hover {
            color: #'.esc_attr( $header_text_color ).' ;
        }
    ';
    wp_add_inline_style( 'padma-custom', $padma_custom_css );
}
add_action( 'wp_enqueue_scripts', 'padma_custom_css' );