<?php
/**
 * Padma Blog Theme Customizer
 *
 * @package Padma-blog
 */

//Sanitize Blog Post
function padma_sanitize_radio_post($value){ 
    if(!in_array($value, array('true','false'))){
        $value = 'true';
    }
    return $value;
}

//Sanitize Blog Layout
function padma_sanitize_select_box($value){ 
    if(!in_array($value, array('right-sidebar','left-sidebar','full-width'))){
        $value = 'right-sidebar';
    }
    return $value;
}

//Sanitize Blog Layout
function padma_sanitize_select_border_style($value){ 
    if(!in_array($value, array('solid','dotted','dashed','double','groove','ridge'))){
        $value = 'solid';
    }
    return $value;
}

//Sanitize Menu Layout
function padma_menu_select_box($value){ 
    if(!in_array($value, array('right','left','center'))){
        $value = 'center';
    }
    return $value;
}

//Sanitize Blog Layout
function padma_sanitize_select_box_font_weight($value){ 
    if(!in_array($value, array('100','300','400','500','700','900'))){
        $value = '400';
    }
    return $value;
}

/**
 * 
 * Padma Blog customizer
 */
function padma_blog_customize_register( $wp_customize ) {
    $wp_customize->add_panel( 'padma_blog_typography_options', array(
        'priority'       => 9,
        'capability'     => 'edit_theme_options',
        'title'          => esc_html__('Typography Settings', 'padma-blog'),
        'description'    => esc_html__('Select padma blog theme typrography settings from here.', 'padma-blog'),
    ) );
    // Add padma typography options section
    $wp_customize->add_section('padma_typography_options', array(
        'title'          => esc_html__('Body Fonts Settings', 'padma-blog'),
        'capability'     => 'edit_theme_options',
        'description'    => esc_html__('Select body fonts settings from here.', 'padma-blog'),
        'panel'  => 'padma_blog_typography_options',
    ));

    // Body Font Size
    $wp_customize->add_setting('padma_body_font_size', array(
        'default'           => esc_html__('15', 'padma-blog'),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_body_font_size_control', array(
        'label'      => esc_html__('Body font size', 'padma-blog'),
        'description'=> esc_html__('Type your body font size from here.', 'padma-blog'),
        'section'    => 'padma_typography_options',
        'settings'   => 'padma_body_font_size',
        'type'       => 'number'
    ));

    // Body line height
    $wp_customize->add_setting('padma_body_line_height', array(
        'default'           => esc_html__('26', 'padma-blog'),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_body_line_height_control', array(
        'label'      => esc_html__('Body line height', 'padma-blog'),
        'description'=> esc_html__('Type your body line height from here.', 'padma-blog'),
        'section'    => 'padma_typography_options',
        'settings'   => 'padma_body_line_height',
        'type'       => 'number'
    ));

    // Body letter spacing
    $wp_customize->add_setting('padma_body_letter_spacing', array(
        'default'           => esc_html__('1', 'padma-blog'),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_body_letter_sapcing_control', array(
        'label'      => esc_html__('Body letter spacing', 'padma-blog'),
        'description'=> esc_html__('Type your body letter spacing from here.', 'padma-blog'),
        'section'    => 'padma_typography_options',
        'settings'   => 'padma_body_letter_spacing',
        'type'       => 'number'
    ));

    // Sidebar Settings
    $wp_customize->add_setting('padma_font_weight', array(
        'default'           => '400',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_select_box_font_weight',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_font_weight_control', array(
        'label'             => esc_html__('Select font weight', 'padma-blog'),
        'description'       => esc_html__('Select font weight from here.', 'padma-blog'),
        'section'           => 'padma_typography_options',
        'settings'          => 'padma_font_weight',
        'type'              => 'select',
        'choices'           => array(
            '100'    => esc_html__('100', 'padma-blog'),
            '300'    => esc_html__('300', 'padma-blog'),
            '400'    => esc_html__('400', 'padma-blog'),
            '500'    => esc_html__('500', 'padma-blog'),
            '700'    => esc_html__('700', 'padma-blog'),
            '900'    => esc_html__('900', 'padma-blog'),
        ),
    ));

    // Add header typography options section
    $wp_customize->add_section('padma_header_typography_options', array(
        'title'          => esc_html__('Heading Font Settings', 'padma-blog'),
        'capability'     => 'edit_theme_options',
        'description'    => esc_html__('Select heading fonts settings from here.', 'padma-blog'),
        'panel'  => 'padma_blog_typography_options',
    ));

    // Heading Font Size
    $wp_customize->add_setting('padma_heading_font_size', array(
        'default'           => esc_html__('20', 'padma-blog'),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_heading_font_size_control', array(
        'label'      => esc_html__('Heading font size', 'padma-blog'),
        'description'=> esc_html__('Type your heading font size from here.', 'padma-blog'),
        'section'    => 'padma_header_typography_options',
        'settings'   => 'padma_heading_font_size',
        'type'       => 'number'
    ));

    // Heading Font Weight Settings
    $wp_customize->add_setting('padma_heading_font_weight', array(
        'default'           => '700',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_select_box_font_weight',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_heading_font_weight_control', array(
        'label'             => esc_html__('Select font weight', 'padma-blog'),
        'description'       => esc_html__('Select font weight from here.', 'padma-blog'),
        'section'           => 'padma_header_typography_options',
        'settings'          => 'padma_heading_font_weight',
        'type'              => 'select',
        'choices'           => array(
            '100'    => esc_html__('100', 'padma-blog'),
            '300'    => esc_html__('300', 'padma-blog'),
            '400'    => esc_html__('400', 'padma-blog'),
            '500'    => esc_html__('500', 'padma-blog'),
            '700'    => esc_html__('700', 'padma-blog'),
            '900'    => esc_html__('900', 'padma-blog'),
        ),
    ));

    // Add padma Footer Options Section
    $wp_customize->add_section('padma_logo_position_options', array(
        'title'          => esc_html__('Logo Position Settings', 'padma-blog'),
        'capability'     => 'edit_theme_options',
        'description'    => esc_html__('Select Logo settings from here.', 'padma-blog'),
        'priority' => 10,
    ));

    // Sidebar Settings
    $wp_customize->add_setting('padma_logo_position_settings', array(
        'default'           => 'center',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_menu_select_box',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_logo_position_control', array(
        'label'             => esc_html__('Select logo position layout', 'padma-blog'),
        'description'       => esc_html__('Select logo position layout from here.', 'padma-blog'),
        'section'           => 'padma_logo_position_options',
        'settings'          => 'padma_logo_position_settings',
        'type'              => 'select',
        'choices'           => array(
            'left'      => esc_html__('Left Menu', 'padma-blog'),
            'right'     => esc_html__('Right Menu', 'padma-blog'),
            'center'    => esc_html__('Center Menu', 'padma-blog'),
        ),
    ));

    // Add padma menu Options Section
    $wp_customize->add_section('padma_menu_position_options', array(
        'title'          => esc_html__('Menu Position Settings', 'padma-blog'),
        'capability'     => 'edit_theme_options',
        'description'    => esc_html__('Select menu settings from here.', 'padma-blog'),
        'priority' => 11,
    ));

    // Sidebar Settings
    $wp_customize->add_setting('padma_menu_position_settings', array(
        'default'           => 'center',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_menu_select_box',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_menu_position_control', array(
        'label'             => esc_html__('Select menu position layout', 'padma-blog'),
        'description'       => esc_html__('Select menu position layout from here.', 'padma-blog'),
        'section'           => 'padma_menu_position_options',
        'settings'          => 'padma_menu_position_settings',
        'type'              => 'select',
        'choices'           => array(
            'left'      => esc_html__('Left Menu', 'padma-blog'),
            'right'     => esc_html__('Right Menu', 'padma-blog'),
            'center'    => esc_html__('Center Menu', 'padma-blog'),
        ),
    ));

	// Add padma blogpage options section
    $wp_customize->add_section('padma_blog_options', array(
        'title'          => esc_html__('Blogpage Settings', 'padma-blog'),
        'capability'     => 'edit_theme_options',
        'description'    => esc_html__('Select blog settings from here.', 'padma-blog'),
        'priority' => 12,
    ));

    // Blog Style Settings
    $wp_customize->add_setting('padma_style_settings', array(
        'default'           => 'false',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_style_control', array(
        'label'          => esc_html__('Select blog style', 'padma-blog'),
        'description'    => esc_html__('Select blog style from here.', 'padma-blog'),
        'section'        => 'padma_blog_options',
        'settings'       => 'padma_style_settings',
        'type'           => 'select',
        'choices'        => array(
            'false'      => esc_html__('List Blog', 'padma-blog'),
            'true'       => esc_html__('Grid Blog', 'padma-blog'),
        ),
    ));

    // Sidebar Settings
    $wp_customize->add_setting('padma_siderbar_settings', array(
        'default'           => 'right-sidebar',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_select_box',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_sidebar_control', array(
        'label'             => esc_html__('Select blog sidebar', 'padma-blog'),
        'description'       => esc_html__('Select blog sidebar from here.', 'padma-blog'),
        'section'           => 'padma_blog_options',
        'settings'          => 'padma_siderbar_settings',
        'type'              => 'select',
        'choices'           => array(
            'left-sidebar'  => esc_html__('Left Sidebar', 'padma-blog'),
            'right-sidebar' => esc_html__('Right Sidebar', 'padma-blog'),
            'full-width'    => esc_html__('Full Width', 'padma-blog'),
        ),
    ));

    // Display Featured Image
    $wp_customize->add_setting('padma_display_featured_img', array(
        'default'           => 'true',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_display_featured_img_control', array(
        'label'      => esc_html__('Display Featured Image?', 'padma-blog'),
        'description'=> esc_html__('If you don\'t want to show featured image. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_blog_options',
        'settings'   => 'padma_display_featured_img',
        'type'       => 'radio',
        'choices'    => array(
            'true'  => esc_html__('Yes', 'padma-blog'),
            'false' => esc_html__('No',  'padma-blog'),
        ),
    ));

    // Display Post Ttile
    $wp_customize->add_setting('padma_display_post_title', array(
        'default'           => 'true',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_display_post_title_control', array(
        'label'      => esc_html__('Display post title?', 'padma-blog'),
        'description'=> esc_html__('If you don\'t want to show post title. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_blog_options',
        'settings'   => 'padma_display_post_title',
        'type'       => 'radio',
        'choices'    => array(
            'true'  => esc_html__('Yes', 'padma-blog'),
            'false' => esc_html__('No',  'padma-blog'),
        ),
    ));

    // Display Post By
    $wp_customize->add_setting('padma_display_post_by', array(
        'default'           => 'true',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_post_by_control', array(
        'label'      => esc_html__('Display post by?', 'padma-blog'),
        'description'=> esc_html__('If you don\'t want to show post by. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_blog_options',
        'settings'   => 'padma_display_post_by',
        'type'       => 'radio',
        'choices'    => array(
            'true'  => esc_html__('Yes', 'padma-blog'),
            'false' => esc_html__('No',  'padma-blog'),
        ),
    ));

    // Display Post Date
    $wp_customize->add_setting('padma_display_post_date', array(
        'default'           => 'true',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_post_date_control', array(
        'label'      => esc_html__('Display post date?', 'padma-blog'),
        'description'=> esc_html__('If you don\'t want to show post date. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_blog_options',
        'settings'   => 'padma_display_post_date',
        'type'       => 'radio',
        'choices'    => array(
            'true'  => esc_html__('Yes', 'padma-blog'),
            'false' => esc_html__('No', 'padma-blog'),
        ),
    ));

    // Display Post Content
    $wp_customize->add_setting('padma_display_post_content', array(
        'default'           => 'true',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_post_content_control', array(
        'label'      => esc_html__('Display post content?', 'padma-blog'),
        'description'=> esc_html__('If you don\'t want to show post content. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_blog_options',
        'settings'   => 'padma_display_post_content',
        'type'       => 'radio',
        'choices'    => array(
            'true'  => esc_html__('Yes', 'padma-blog'),
            'false' => esc_html__('No', 'padma-blog'),
        ),
    ));

    // Display Readmore Button
    $wp_customize->add_setting('padma_display_readmore', array(
        'default'           => 'true',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_readmore_control', array(
        'label'      => esc_html__('Display post read more button?', 'padma-blog'),
        'description'=> esc_html__('If you don\'t want to show post read more button. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_blog_options',
        'settings'   => 'padma_display_readmore',
        'type'       => 'radio',
        'choices'    => array(
            'true'  => esc_html__('Yes', 'padma-blog'),
            'false' => esc_html__('No', 'padma-blog'),
        ),
    ));

    // Add padma blogpost options section
    $wp_customize->add_section('padma_blogpost_options', array(
        'title'          => esc_html__('Blogpost Style Settings', 'padma-blog'),
        'capability'     => 'edit_theme_options',
        'description'    => esc_html__('Select blogpost settings from here.', 'padma-blog'),
        'priority' => 13,
    ));

    // Border bottom width
    $wp_customize->add_setting('padma_blogpost_border_width', array(
        'default'           => esc_html__('2', 'padma-blog'),
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_blogpost_border_width_control', array(
        'label'      => esc_html__('Blogpost border width', 'padma-blog'),
        'description'=> esc_html__('Type your blogpost border width from here.', 'padma-blog'),
        'section'    => 'padma_blogpost_options',
        'settings'   => 'padma_blogpost_border_width',
        'type'       => 'number'
    ));

    // Border bottom style
    $wp_customize->add_setting('padma_blogpost_border_style', array(
        'default'           => 'solid',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_select_border_style',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_blogpost_border_style_control', array(
        'label'      => esc_html__('Blogpost border style', 'padma-blog'),
        'description'=> esc_html__('Type your blogpost border style from here.', 'padma-blog'),
        'section'    => 'padma_blogpost_options',
        'settings'   => 'padma_blogpost_border_style',
        'type'       => 'select',
        'choices'           => array(
            'solid'   => esc_html__('Solid', 'padma-blog'),
            'dotted'  => esc_html__('Dotted', 'padma-blog'),
            'dashed'  => esc_html__('Dashed', 'padma-blog'),
            'double'  => esc_html__('Double', 'padma-blog'),
            'groove'  => esc_html__('Groove', 'padma-blog'),
            'ridge'   => esc_html__('Ridge', 'padma-blog'),
        ),
    ));

    // Display border Color
    $wp_customize->add_setting('padma_border_color', array(
        'default'           => '#dddddd',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'padma_border_color', array(
                'label'          => esc_html__('Border Bottom Color','padma-blog'),
                'description'    => esc_html__('Select border bottom color from here.', 'padma-blog'),
                'section'        => 'padma_blogpost_options'
            )
        )
    );

    // Add padma singlepage options section
    $wp_customize->add_section('padma_single_options', array(
        'title'          => esc_html__('Singlepage Settings', 'padma-blog'),
        'capability'     => 'edit_theme_options',
        'description'    => esc_html__('Select single page settings from here.', 'padma-blog'),
        'priority' => 14,
    ));

    // Display Blogpage Container Width
    $wp_customize->add_setting('padma_single_container', array(
        'default'           => 'false',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_single_container_control', array(
        'label'      => esc_html__('Singlepage Container Width', 'padma-blog'),
        'description'=> esc_html__('Please select your singlepage container width from here. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_single_options',
        'settings'   => 'padma_single_container',
        'type'       => 'radio',
        'choices'    => array(
            'true'  => esc_html__('Container Full', 'padma-blog'),
            'false' => esc_html__('Container Box', 'padma-blog'),
        ),
    ));

    // Sidebar Settings
    $wp_customize->add_setting('padma_single_siderbar_settings', array(
        'default'           => 'right-sidebar',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_select_box',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('pakhi_single_sidebar_control', array(
        'label'             => esc_html__('Select singlepage layout', 'padma-blog'),
        'description'       => esc_html__('Select singlepage layout from here.', 'padma-blog'),
        'section'           => 'padma_single_options',
        'settings'          => 'padma_single_siderbar_settings',
        'type'              => 'select',
        'choices'           => array(
            'left-sidebar'  => esc_html__('Left Sidebar', 'padma-blog'),
            'right-sidebar' => esc_html__('Right Sidebar', 'padma-blog'),
            'full-width'    => esc_html__('Full Width', 'padma-blog'),
        ),
    ));

    // Display Featured Image
    $wp_customize->add_setting('padma_display_single_featured_img', array(
        'default'           => 'true',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_display_single_featured_img_control', array(
        'label'      => esc_html__('Display Single Featured Image?', 'padma-blog'),
        'description'=> esc_html__('If you don\'t want to show single featured image. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_single_options',
        'settings'   => 'padma_display_single_featured_img',
        'type'       => 'radio',
        'choices'    => array(
            'true'  => esc_html__('Yes', 'padma-blog'),
            'false' => esc_html__('No',  'padma-blog'),
        ),
    ));

    // Display Post By
    $wp_customize->add_setting('padma_display_single_post_by', array(
        'default'           => 'true',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_single_post_by_control', array(
        'label'      => esc_html__('Display post by?', 'padma-blog'),
        'description'=> esc_html__('If you don\'t want to show post by. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_single_options',
        'settings'   => 'padma_display_single_post_by',
        'type'       => 'radio',
        'choices'    => array(
            'true'  => esc_html__('Yes', 'padma-blog'),
            'false' => esc_html__('No', 'padma-blog'),
        ),
    ));

    // Display Post Date
    $wp_customize->add_setting('padma_display_single_post_date', array(
        'default'           => 'true',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_single_post_date_control', array(
        'label'      => esc_html__('Display post date?', 'padma-blog'),
        'description'=> esc_html__('If you don\'t want to show post date. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_single_options',
        'settings'   => 'padma_display_single_post_date',
        'type'       => 'radio',
        'choices'    => array(
            'true'   => esc_html__('Yes', 'padma-blog'),
            'false'  => esc_html__('No', 'padma-blog'),
        ),
    ));

    // Display Post Content
    $wp_customize->add_setting('padma_display_single_post_content', array(
        'default'           => 'true',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_single_post_content_control', array(
        'label'      => esc_html__('Display post content?', 'padma-blog'),
        'description'=> esc_html__('If you don\'t want to show post content. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_single_options',
        'settings'   => 'padma_display_single_post_content',
        'type'       => 'radio',
        'choices'    => array(
            'true'   => esc_html__('Yes', 'padma-blog'),
            'false'  => esc_html__('No', 'padma-blog'),
        ),
    ));

    // Add padma Styling Options Section
    $wp_customize->add_section('padma_styling_options', array(
        'title'          => esc_html__('Styling Settings', 'padma-blog'),
        'capability'     => 'edit_theme_options',
        'description'    => esc_html__('Select styling settings from here.', 'padma-blog'),
        'priority' => 15,
    ));

    // Display Theme Color
    $wp_customize->add_setting('padma_theme_color', array(
        'default'           => '#0bbbc1',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'padma_theme_color', array(
                'label'          => esc_html__('Theme Color','padma-blog'),
                'description'    => esc_html__('Select theme color from here.', 'padma-blog'),
                'section'        => 'padma_styling_options'
            )
        )
    );

    // Display Theme Color
    $wp_customize->add_setting('padma_theme_color_sec', array(
        'default'           => '#777777',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'padma_theme_color_sec', array(
                'label'          => esc_html__('Text Color','padma-blog'),
                'description'    => esc_html__('Select text color from here.', 'padma-blog'),
                'section'        => 'padma_styling_options'
            )
        )
    );

     // Add padma General Options Section
    $wp_customize->add_section('padma_general_options', array(
        'title'          => esc_html__('General Settings', 'padma-blog'),
        'capability'     => 'edit_theme_options',
        'description'    => esc_html__('Select general settings from here.', 'padma-blog'),
        'priority' => 16,
    ));
     // Display Breadcrumb
    $wp_customize->add_setting('padma_breadcrumb', array(
        'default'           => 'true',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_breadcrumb_control', array(
        'label'      => esc_html__('Enable Breadcrumb?', 'padma-blog'),
        'description'=> esc_html__('If you don\'t want to show breadcrumb in your site. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_general_options',
        'settings'   => 'padma_breadcrumb',
        'type'       => 'radio',
        'choices'    => array(
            'true'  => esc_html__('Yes', 'padma-blog'),
            'false' => esc_html__('No', 'padma-blog'),
        ),
    ));

    // Display Blogpage Container Width
    $wp_customize->add_setting('padma_container', array(
        'default'           => 'false',
        'capability'        => 'edit_theme_options',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'padma_sanitize_radio_post',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control('padma_container_control', array(
        'label'      => esc_html__('Blogpage Container Width', 'padma-blog'),
        'description'=> esc_html__('Please select your blogpage container width from here. Please turn button no.', 'padma-blog'),
        'section'    => 'padma_general_options',
        'settings'   => 'padma_container',
        'type'       => 'radio',
        'choices'    => array(
            'true'  => esc_html__('Container Full', 'padma-blog'),
            'false' => esc_html__('Container Box', 'padma-blog'),
        ),
    ));

    // Add padma Footer Options Section
    $wp_customize->add_section('padma_footer_options', array(
        'title'          => esc_html__('Footer Settings', 'padma-blog'),
        'capability'     => 'edit_theme_options',
        'description'    => esc_html__('Select footer settings from here.', 'padma-blog'),
        'priority' => 17,
    ));
    // Display Footer Background Color
    $wp_customize->add_setting('padma_footer_background_color', array(
        'default'           => '#F8F8F8',
        'type'              => 'theme_mod',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize, 'padma_footer_background_color', array(
                'label'          => esc_html__('Footer Background Color','padma-blog'),
                'description'    => esc_html__('Select footer background color from here.', 'padma-blog'),
                'section'        => 'padma_footer_options'
            )
        )
    );
}
add_action( 'customize_register', 'padma_blog_customize_register' );