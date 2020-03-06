<?php

function squarepress_customize_register($wp_customize) {

    $wp_customize->remove_control('square_disable_sticky_header');
    $wp_customize->remove_control('square_about_image_header');
    $wp_customize->remove_control('square_about_image_stack');
    $wp_customize->get_setting('square_header_bg')->default = 'sq-white';

    //HEADER SETTINGS

    $wp_customize->add_section('squarepress_top_header', array(
        'title' => esc_html__('Top Header Settings', 'squarepress'),
        'panel' => 'square_general_settings_panel',
    ));

    $wp_customize->add_setting('squarepress_left_header_text', array(
        'sanitize_callback' => 'wp_kses_post',
        'default' => 'Aveneu Park, Starling, Australia'
    ));

    $wp_customize->add_control('squarepress_left_header_text', array(
        'type' => 'textarea',
        'section' => 'squarepress_top_header',
        'label' => esc_html__('Top left Header Content', 'squarepress')
    ));

    $wp_customize->add_setting('squarepress_right_header_info', array(
        'sanitize_callback' => 'square_sanitize_text'
    ));

    $wp_customize->add_control(new Square_Info_Text($wp_customize, 'squarepress_right_header_info', array(
        'settings' => 'squarepress_right_header_info',
        'section' => 'squarepress_top_header',
        'label' => esc_html__('Top Right Header Socials Icons', 'squarepress')
    )));

    $wp_customize->add_setting('squarepress_facebook_link', array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('squarepress_facebook_link', array(
        'settings' => 'squarepress_facebook_link',
        'section' => 'squarepress_top_header',
        'type' => 'text',
        'label' => esc_html__('Facebook', 'squarepress')
    ));

    $wp_customize->add_setting('squarepress_twitter_link', array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('squarepress_twitter_link', array(
        'settings' => 'squarepress_twitter_link',
        'section' => 'squarepress_top_header',
        'type' => 'text',
        'label' => esc_html__('Twitter', 'squarepress')
    ));

    $wp_customize->add_setting('squarepress_instagram_link', array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('squarepress_instagram_link', array(
        'settings' => 'squarepress_instagram_link',
        'section' => 'squarepress_top_header',
        'type' => 'text',
        'label' => esc_html__('Instagram', 'squarepress')
    ));

    $wp_customize->add_setting('squarepress_youtube_link', array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('squarepress_youtube_link', array(
        'settings' => 'squarepress_youtube_link',
        'section' => 'squarepress_top_header',
        'type' => 'text',
        'label' => esc_html__('Youtube', 'squarepress')
    ));

    $wp_customize->add_setting('squarepress_pinterest_link', array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('squarepress_pinterest_link', array(
        'settings' => 'squarepress_pinterest_link',
        'section' => 'squarepress_top_header',
        'type' => 'text',
        'label' => esc_html__('Pinterest', 'squarepress')
    ));

    $wp_customize->add_setting('squarepress_linkedin_link', array(
        'sanitize_callback' => 'esc_url_raw'
    ));

    $wp_customize->add_control('squarepress_linkedin_link', array(
        'settings' => 'squarepress_linkedin_link',
        'section' => 'squarepress_top_header',
        'type' => 'text',
        'label' => esc_html__('LinkedIn', 'squarepress')
    ));

    /* Tab Section */
    $wp_customize->add_setting('squarepress_tab_heading', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control(new Square_Customize_Heading($wp_customize, 'squarepress_tab_heading', array(
        'settings' => 'squarepress_tab_heading',
        'section' => 'square_tab_sec',
        'label' => esc_html__('Tab Title / SubTitle', 'squarepress'),
        'priority' => 6
    )));

    $wp_customize->add_setting('squarepress_tab_title', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control('squarepress_tab_title', array(
        'settings' => 'squarepress_tab_title',
        'section' => 'square_tab_sec',
        'type' => 'text',
        'label' => esc_html__('Title', 'squarepress'),
        'priority' => 6
    ));

    $wp_customize->add_setting('squarepress_tab_subtitle', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control('squarepress_tab_subtitles', array(
        'settings' => 'squarepress_tab_subtitle',
        'section' => 'square_tab_sec',
        'type' => 'textarea',
        'label' => esc_html__('Sub Title', 'squarepress'),
        'priority' => 6
    ));

    $wp_customize->add_setting('squarepress_tab_bg_heading', array(
        'sanitize_callback' => 'square_sanitize_text',
        'default' => get_stylesheet_directory_uri() . '/images/banner-image.jpg'
    ));

    $wp_customize->add_control(new Square_Customize_Heading($wp_customize, 'squarepress_tab_bg_heading', array(
        'settings' => 'squarepress_tab_bg_heading',
        'section' => 'square_tab_sec',
        'label' => esc_html__('Background Image', 'squarepress')
    )));

    $wp_customize->add_setting('squarepress_tab_bg', array(
        'sanitize_callback' => 'esc_url_raw',
    ));

    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'squarepress_tab_bg', array(
        'label' => esc_html__('Background Image', 'squarepress'),
        'section' => 'square_tab_sec',
        'settings' => 'squarepress_tab_bg',
    )));

    /* ============TEAM SECTION============ */
    $wp_customize->add_section('squarepress_team_sec', array(
        'title' => esc_html__('Team Section', 'square'),
        'panel' => 'square_home_settings_panel'
    ));

    $wp_customize->add_setting('squarepress_disable_team_sec', array(
        'default' => 0,
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control('squarepress_disable_team_sec', array(
        'settings' => 'squarepress_disable_team_sec',
        'section' => 'squarepress_team_sec',
        'label' => esc_html__('Disable Team Section ', 'square'),
        'type' => 'checkbox',
    ));


    $wp_customize->add_setting('squarepress_team_heading', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control(new Square_Customize_Heading($wp_customize, 'squarepress_team_heading', array(
        'settings' => 'squarepress_team_heading',
        'section' => 'squarepress_team_sec',
        'label' => esc_html__('Team Title / SubTitle ', 'squarepress'),
    )));

    $wp_customize->add_setting('squarepress_team_title', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control('squarepress_team_title', array(
        'settings' => 'squarepress_team_title',
        'section' => 'squarepress_team_sec',
        'type' => 'text',
        'label' => esc_html__('Title', 'squarepress'),
    ));

    $wp_customize->add_setting('squarepress_team_subtitle', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control('squarepress_team_subtitles', array(
        'settings' => 'squarepress_team_subtitle',
        'section' => 'squarepress_team_sec',
        'type' => 'textarea',
        'label' => esc_html__('Sub Title', 'squarepress'),
    ));

    for ($i = 1; $i < 4; $i++) {

        $wp_customize->add_setting('squarepress_team_header' . $i, array(
            'sanitize_callback' => 'square_sanitize_text'
        ));

        $wp_customize->add_control(new Square_Customize_Heading($wp_customize, 'squarepress_team_header' . $i, array(
            'settings' => 'squarepress_team_header' . $i,
            'section' => 'squarepress_team_sec',
            'label' => esc_html__('Team ', 'square') . $i
        )));

        $wp_customize->add_setting('squarepress_team_page' . $i, array(
            'sanitize_callback' => 'absint'
        ));

        $wp_customize->add_control('squarepress_team_page' . $i, array(
            'settings' => 'squarepress_team_page' . $i,
            'section' => 'squarepress_team_sec',
            'type' => 'dropdown-pages',
            'label' => esc_html__('Select a Page', 'square')
        ));

        $wp_customize->add_setting('squarepress_team_designation' . $i, array(
            'sanitize_callback' => 'square_sanitize_text',
        ));

        $wp_customize->add_control('squarepress_team_designation' . $i, array(
            'settings' => 'squarepress_team_designation' . $i,
            'section' => 'squarepress_team_sec',
            'type' => 'text',
            'label' => esc_html__('Designation', 'squarepress'),
        ));
    }

    /* ============TESTIMONIAL SECTION============ */
    $wp_customize->add_section('squarepress_testimonial_sec', array(
        'title' => esc_html__('Testimonial Section', 'square'),
        'panel' => 'square_home_settings_panel'
    ));

    $wp_customize->add_setting('squarepress_disable_testimonial_sec', array(
        'default' => 0,
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control('squarepress_disable_testimonial_sec', array(
        'settings' => 'squarepress_disable_testimonial_sec',
        'section' => 'squarepress_testimonial_sec',
        'label' => esc_html__('Disable Testimonial Section ', 'square'),
        'type' => 'checkbox',
    ));


    $wp_customize->add_setting('squarepress_testimonial_heading', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control(new Square_Customize_Heading($wp_customize, 'squarepress_testimonial_heading', array(
        'settings' => 'squarepress_testimonial_heading',
        'section' => 'squarepress_testimonial_sec',
        'label' => esc_html__('Testimonial Title / SubTitle ', 'squarepress'),
    )));

    $wp_customize->add_setting('squarepress_testimonial_title', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control('squarepress_testimonial_title', array(
        'settings' => 'squarepress_testimonial_title',
        'section' => 'squarepress_testimonial_sec',
        'type' => 'text',
        'label' => esc_html__('Title', 'squarepress'),
    ));

    $wp_customize->add_setting('squarepress_testimonial_subtitle', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control('squarepress_testimonial_subtitles', array(
        'settings' => 'squarepress_testimonial_subtitle',
        'section' => 'squarepress_testimonial_sec',
        'type' => 'textarea',
        'label' => esc_html__('Sub Title', 'squarepress'),
    ));

    for ($i = 1; $i < 4; $i++) {

        $wp_customize->add_setting('squarepress_testimonial_header' . $i, array(
            'sanitize_callback' => 'square_sanitize_text'
        ));

        $wp_customize->add_control(new Square_Customize_Heading($wp_customize, 'squarepress_testimonial_header' . $i, array(
            'settings' => 'squarepress_testimonial_header' . $i,
            'section' => 'squarepress_testimonial_sec',
            'label' => esc_html__('Testimonial ', 'square') . $i
        )));

        $wp_customize->add_setting('squarepress_testimonial_page' . $i, array(
            'sanitize_callback' => 'absint'
        ));

        $wp_customize->add_control('squarepress_testimonial_page' . $i, array(
            'settings' => 'squarepress_testimonial_page' . $i,
            'section' => 'squarepress_testimonial_sec',
            'type' => 'dropdown-pages',
            'label' => esc_html__('Select a Page', 'square')
        ));

        $wp_customize->add_setting('squarepress_testimonial_designation' . $i, array(
            'sanitize_callback' => 'square_sanitize_text',
        ));

        $wp_customize->add_control('squarepress_testimonial_designation' . $i, array(
            'settings' => 'squarepress_testimonial_designation' . $i,
            'section' => 'squarepress_testimonial_sec',
            'type' => 'text',
            'label' => esc_html__('Designation', 'squarepress'),
        ));
    }

    $wp_customize->add_setting('squarepress_testimonial_bg_heading', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control(new Square_Customize_Heading($wp_customize, 'squarepress_testimonial_bg_heading', array(
        'settings' => 'squarepress_testimonial_bg_heading',
        'section' => 'squarepress_testimonial_sec',
        'label' => esc_html__('Background Image', 'squarepress')
    )));

    $wp_customize->add_setting('squarepress_testimonial_bg', array(
        'sanitize_callback' => 'esc_url_raw',
        'default' => get_stylesheet_directory_uri() . '/images/banner-image.jpg'
    ));

    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'squarepress_testimonial_bg', array(
        'label' => esc_html__('Background Image', 'squarepress'),
        'section' => 'squarepress_testimonial_sec',
        'settings' => 'squarepress_testimonial_bg',
    )));

    $wp_customize->add_setting('squarepress_featured_box_heading', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control(new Square_Customize_Heading($wp_customize, 'squarepress_featured_box_heading', array(
        'settings' => 'squarepress_featured_box_heading',
        'section' => 'square_featured_page_sec',
        'label' => esc_html__('Enable Theme Colored Box', 'squarepress'),
    )));

    $wp_customize->add_setting('squarepress_enable_colored_box', array(
        'default' => 1,
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control('squarepress_enable_colored_box', array(
        'settings' => 'squarepress_enable_colored_box',
        'section' => 'square_featured_page_sec',
        'label' => esc_html__('Enable/Disable ', 'square'),
        'type' => 'checkbox',
    ));
}

add_action('customize_register', 'squarepress_customize_register', 50);

function squarepress_customizer_script() {
    wp_enqueue_style('squarepress-customizer-style', get_stylesheet_directory_uri() . '/inc/customizer-control.css', array('wp-color-picker'), '1.0.0');
}

add_action('customize_controls_enqueue_scripts', 'squarepress_customizer_script');