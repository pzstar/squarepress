<?php

function squarepress_customize_register($wp_customize) {

    $wp_customize->remove_control('square_disable_sticky_header');
    $wp_customize->remove_control('square_about_image_header');
    $wp_customize->remove_control('square_about_image_stack');
    $wp_customize->get_setting('square_header_bg')->default = 'sq-white';
    $wp_customize->get_setting('square_body_family')->default = 'Poppins';
    $wp_customize->get_setting('square_h_family')->default = 'Poppins';
    $wp_customize->get_setting('square_menu_family')->default = 'Karla';
    $wp_customize->get_setting('square_menu_style')->default = '400';

    $wp_customize->add_panel('squarepress_header_panel', array(
        'title' => esc_html__('Header Settings', 'squarepress'),
        'priority' => 22,
    ));

    $wp_customize->get_section('title_tagline')->panel = 'squarepress_header_panel';
    $wp_customize->get_section('square_header_setting_sec')->panel = 'squarepress_header_panel';
    $wp_customize->get_section('square_header_setting_sec')->title = esc_html__('Main Header', 'squarepress');
    $wp_customize->get_section('square_header_setting_sec')->priority = 15;
    $wp_customize->get_section('title_tagline')->priority = 5;

    //HEADER SETTINGS

    $wp_customize->add_section('squarepress_top_header', array(
        'title' => esc_html__('Top Header', 'squarepress'),
        'panel' => 'squarepress_header_panel',
        'priority' => 10,
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

    $wp_customize->add_control(new Square_Upgrade_Info_Control($wp_customize, 'squarepress_right_header_info', array(
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

    $wp_customize->add_setting('squarepress_top_header_upgrade_text', array(
        'sanitize_callback' => 'square_sanitize_text'
    ));

    $wp_customize->add_control(new Square_Upgrade_Info_Control($wp_customize, 'squarepress_top_header_upgrade_text', array(
        'section' => 'squarepress_top_header',
        'label' => esc_html__('For more top header settings,', 'squarepress'),
        'choices' => array(
            esc_html__('Option to add menu, widget, html or social icons', 'squarepress'),
            esc_html__('Option to add unlimited and any social media', 'squarepress')
        ),
        'priority' => 100,
        'active_callback' => 'square_is_upgrade_notice_active',
        'upgrade_text' => esc_html__('Upgrade to PRO', 'squarepress'),
        'upgrade_url' => 'https://hashthemes.com/wordpress-theme/square-plus/?utm_source=wordpress&utm_medium=square-link&utm_campaign=square-upgrade'
    )));

    /* Tab Section */
    $wp_customize->add_setting('squarepress_tab_heading', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control(new Square_Heading_Control($wp_customize, 'squarepress_tab_heading', array(
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

    $wp_customize->add_control(new Square_Heading_Control($wp_customize, 'squarepress_tab_bg_heading', array(
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
        'title' => esc_html__('Team Section', 'squarepress'),
        'panel' => 'square_home_settings_panel'
    ));

    $wp_customize->add_setting('squarepress_disable_team_sec', array(
        'default' => 0,
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control('squarepress_disable_team_sec', array(
        'settings' => 'squarepress_disable_team_sec',
        'section' => 'squarepress_team_sec',
        'label' => esc_html__('Disable Team Section ', 'squarepress'),
        'type' => 'checkbox',
    ));


    $wp_customize->add_setting('squarepress_team_heading', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control(new Square_Heading_Control($wp_customize, 'squarepress_team_heading', array(
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

        $wp_customize->add_control(new Square_Heading_Control($wp_customize, 'squarepress_team_header' . $i, array(
            'settings' => 'squarepress_team_header' . $i,
            'section' => 'squarepress_team_sec',
            'label' => esc_html__('Team ', 'squarepress') . $i
        )));

        $wp_customize->add_setting('squarepress_team_page' . $i, array(
            'sanitize_callback' => 'absint'
        ));

        $wp_customize->add_control('squarepress_team_page' . $i, array(
            'settings' => 'squarepress_team_page' . $i,
            'section' => 'squarepress_team_sec',
            'type' => 'dropdown-pages',
            'label' => esc_html__('Select a Page', 'squarepress')
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

    $wp_customize->add_setting('squarepress_team_upgrade_text', array(
        'sanitize_callback' => 'square_sanitize_text'
    ));

    $wp_customize->add_control(new Square_Upgrade_Info_Control($wp_customize, 'squarepress_team_upgrade_text', array(
        'section' => 'squarepress_team_sec',
        'label' => esc_html__('For more layouts and settings,', 'squarepress'),
        'choices' => array(
            esc_html__('Unlimited team blocks', 'squarepress'),
            esc_html__('4 team styles', 'squarepress'),
            esc_html__('Configure no of column to display in a row', 'squarepress'),
            esc_html__('Multiple background option(image, gradient, video) for the section', 'squarepress')
        ),
        'priority' => 100,
        'active_callback' => 'square_is_upgrade_notice_active',
        'upgrade_text' => esc_html__('Upgrade to PRO', 'squarepress'),
        'upgrade_url' => 'https://hashthemes.com/wordpress-theme/square-plus/?utm_source=wordpress&utm_medium=square-link&utm_campaign=square-upgrade'
    )));

    /* ============TESTIMONIAL SECTION============ */
    $wp_customize->add_section('squarepress_testimonial_sec', array(
        'title' => esc_html__('Testimonial Section', 'squarepress'),
        'panel' => 'square_home_settings_panel'
    ));

    $wp_customize->add_setting('squarepress_disable_testimonial_sec', array(
        'default' => 0,
        'sanitize_callback' => 'absint'
    ));

    $wp_customize->add_control('squarepress_disable_testimonial_sec', array(
        'settings' => 'squarepress_disable_testimonial_sec',
        'section' => 'squarepress_testimonial_sec',
        'label' => esc_html__('Disable Testimonial Section ', 'squarepress'),
        'type' => 'checkbox',
    ));


    $wp_customize->add_setting('squarepress_testimonial_heading', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control(new Square_Heading_Control($wp_customize, 'squarepress_testimonial_heading', array(
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

        $wp_customize->add_control(new Square_Heading_Control($wp_customize, 'squarepress_testimonial_header' . $i, array(
            'settings' => 'squarepress_testimonial_header' . $i,
            'section' => 'squarepress_testimonial_sec',
            'label' => esc_html__('Testimonial ', 'squarepress') . $i
        )));

        $wp_customize->add_setting('squarepress_testimonial_page' . $i, array(
            'sanitize_callback' => 'absint'
        ));

        $wp_customize->add_control('squarepress_testimonial_page' . $i, array(
            'settings' => 'squarepress_testimonial_page' . $i,
            'section' => 'squarepress_testimonial_sec',
            'type' => 'dropdown-pages',
            'label' => esc_html__('Select a Page', 'squarepress')
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

    $wp_customize->add_control(new Square_Heading_Control($wp_customize, 'squarepress_testimonial_bg_heading', array(
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

    $wp_customize->add_setting('squarepress_testimonial_upgrade_text', array(
        'sanitize_callback' => 'square_sanitize_text'
    ));

    $wp_customize->add_control(new Square_Upgrade_Info_Control($wp_customize, 'squarepress_testimonial_upgrade_text', array(
        'section' => 'squarepress_testimonial_sec',
        'label' => esc_html__('For more layouts and settings,', 'squarepress'),
        'choices' => array(
            esc_html__('Unlimited testimonial blocks', 'squarepress'),
            esc_html__('4 testimonial styles', 'squarepress'),
            esc_html__('Multiple background option(image, gradient, video) for the section', 'squarepress')
        ),
        'priority' => 100,
        'active_callback' => 'square_is_upgrade_notice_active',
        'upgrade_text' => esc_html__('Upgrade to PRO', 'squarepress'),
        'upgrade_url' => 'https://hashthemes.com/wordpress-theme/square-plus/?utm_source=wordpress&utm_medium=square-link&utm_campaign=square-upgrade'
    )));

    $wp_customize->add_setting('squarepress_featured_box_heading', array(
        'sanitize_callback' => 'square_sanitize_text',
    ));

    $wp_customize->add_control(new Square_Heading_Control($wp_customize, 'squarepress_featured_box_heading', array(
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
        'label' => esc_html__('Enable/Disable ', 'squarepress'),
        'type' => 'checkbox',
    ));
}

add_action('customize_register', 'squarepress_customize_register', 50);

function squarepress_customizer_script() {
    wp_enqueue_style('squarepress-customizer-style', get_stylesheet_directory_uri() . '/inc/customizer-control.css', array('wp-color-picker'), SQUAREPRESS_VER);
}

add_action('customize_controls_enqueue_scripts', 'squarepress_customizer_script');
