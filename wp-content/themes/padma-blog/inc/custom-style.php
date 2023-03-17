<?php 
function padma_blog_custom_css() {
    wp_enqueue_style('padma-blog-custom', get_template_directory_uri() . '/assets/css/custom-blog-style.css' );
    $padma_theme_color = get_theme_mod('padma_theme_color','#0bbbc1'); 
    $padma_theme_color_sec = get_theme_mod('padma_theme_color_sec','#777777'); 
    $padma_footer_background_color = get_theme_mod('padma_footer_background_color','#F8F8F8'); 
    $padma_footer_text_color = get_theme_mod('padma_footer_text_color','#F8F8F8'); 
    $padma_body_font_size = get_theme_mod('padma_body_font_size','15'); 
    $padma_body_line_height = get_theme_mod('padma_body_line_height','26'); 
    $padma_body_letter_spacing = get_theme_mod('padma_body_letter_spacing','1'); 
    $padma_font_weight = get_theme_mod('padma_font_weight','400'); 
    $padma_heading_font_size = get_theme_mod('padma_heading_font_size','20'); 
    $padma_heading_font_weight = get_theme_mod('padma_heading_font_weight','700'); 
    $padma_menu_position_settings = get_theme_mod('padma_menu_position_settings','center'); 
    $padma_logo_position_settings = get_theme_mod('padma_logo_position_settings','center'); 
    $padma_blogpost_border_width = get_theme_mod('padma_blogpost_border_width','2'); 
    $padma_blogpost_border_style = get_theme_mod('padma_blogpost_border_style','solid'); 
    $padma_border_color = get_theme_mod('padma_border_color','#dddddd'); 
    $padma_blog_custom_css = '';
    $padma_blog_custom_css .= '
        a.underline-text,
        .entry-title a:hover {
            color: '.esc_attr( $padma_theme_color ).' ;
        }
    ';
    $padma_blog_custom_css .= '
        .blog-text p,
        .blog-text span {
            color: '.esc_attr( $padma_theme_color_sec ).' ;
        }
    ';
    $padma_blog_custom_css .= '
        .footer-area {
            background-color: '.esc_attr( $padma_footer_background_color ).' ;
        }
    ';
    $padma_blog_custom_css .= '
        body {
            font-size: '.esc_attr( $padma_body_font_size ).'px ;
            line-height: '.esc_attr( $padma_body_line_height ).'px ;
            letter-spacing: '.esc_attr( $padma_body_letter_spacing ).'px ;
            font-weight: '.esc_attr( $padma_font_weight ).' ;
        }
    ';
    $padma_blog_custom_css .= '
        .widget h2,
        .blog-text h5 {
            font-size: '.esc_attr( $padma_heading_font_size ).'px ;
            font-weight: '.esc_attr( $padma_heading_font_weight ).';
        }
    ';
    if($padma_menu_position_settings == 'left'){
    $padma_blog_custom_css .= '
        .mainmenu-area.text-center {
            text-align: left !important;
        }
    ';
    } elseif ($padma_menu_position_settings == 'right') {
    $padma_blog_custom_css .= '
        .mainmenu-area.text-center {
            text-align: right !important;
        }
    ';
    } 
    if($padma_logo_position_settings == 'left'){
    $padma_blog_custom_css .= '
        .site-branding.text-center {
            text-align: left !important;
        }
    ';
    } elseif ($padma_logo_position_settings == 'right') {
    $padma_blog_custom_css .= '
        .site-branding.text-center {
            text-align: right !important;
        }
    ';
    }  
    $padma_blog_custom_css .= '
        article.post {
            border-bottom-width: '.esc_attr( $padma_blogpost_border_width ).'px ;
            border-bottom-style: '.esc_attr( $padma_blogpost_border_style ).' ;
            border-bottom-color: '.esc_attr( $padma_border_color ).' ;
        }
    ';   
    wp_add_inline_style( 'padma-blog-custom', $padma_blog_custom_css );
}
add_action( 'wp_enqueue_scripts', 'padma_blog_custom_css' );