<?php

if (!defined('SQUAREPRESS_VER')) {
    $squarepress_get_theme = wp_get_theme();
    $squarepress_version = $squarepress_get_theme->Version;
    define('SQUAREPRESS_VER', $squarepress_version);
}

function squarepress_dequeue_script() {
    wp_dequeue_style('square-fonts');
    wp_dequeue_script('square-custom');
}

add_action('wp_print_scripts', 'squarepress_dequeue_script', 100);

add_action('wp_enqueue_scripts', 'squarepress_enqueue_scripts');

function squarepress_slug_setup() {
    load_child_theme_textdomain('squarepress', get_stylesheet_directory() . '/languages');
}

add_action('after_setup_theme', 'squarepress_slug_setup');

function squarepress_enqueue_scripts() {
    wp_enqueue_style('squarepress-parent-style', get_template_directory_uri() . '/style.css', array(), SQUAREPRESS_VER);
    wp_enqueue_style('squarepress-style', get_stylesheet_directory_uri() . '/style.css', array('squarepress-parent-style'), SQUAREPRESS_VER);
    wp_add_inline_style('squarepress-style', squarepress_dymanic_styles());
    wp_enqueue_script('squarepress-custom', get_stylesheet_directory_uri() . '/js/squarepress-custom.js', array('jquery'), SQUAREPRESS_VER, true);
    wp_enqueue_style('squarepress-fonts', squarepress_fonts_url(), array(), NULL);
}

function squarepress_fonts_url() {
    $fonts_url = '';
    $fonts = array();
    $subsets = 'latin,latin-ext';

    /*
     * Translators: If there are characters in your language that are not supported
     * by Open Sans, translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'Poppins font: on or off', 'squarepress')) {
        $fonts[] = 'Poppins:300,300i,400,400i,500,700,700i';
    }

    /*
     * Translators: If there are characters in your language that are not supported
     * by Inconsolata, translate this to 'off'. Do not translate into your own language.
     */
    if ('off' !== _x('on', 'Karla font: on or off', 'squarepress')) {
        $fonts[] = 'Karla';
    }

    /*
     * Translators: To add an additional character subset specific to your language,
     * translate this to 'greek', 'cyrillic', 'devanagari' or 'vietnamese'. Do not translate into your own language.
     */
    $subset = _x('no-subset', 'Add new subset (greek, cyrillic, devanagari, vietnamese)', 'squarepress');

    if ('cyrillic' == $subset) {
        $subsets .= ',cyrillic,cyrillic-ext';
    } elseif ('greek' == $subset) {
        $subsets .= ',greek,greek-ext';
    } elseif ('devanagari' == $subset) {
        $subsets .= ',devanagari';
    } elseif ('vietnamese' == $subset) {
        $subsets .= ',vietnamese';
    }

    if ($fonts) {
        $fonts_url = add_query_arg(array(
            'family' => urlencode(implode('|', $fonts)),
            'subset' => urlencode($subsets),
                ), '//fonts.googleapis.com/css');
    }

    return esc_url_raw($fonts_url);
}

function squarepress_dymanic_styles() {
    $color = get_theme_mod('square_template_color', '#5BC2CE');
    $squarepress_tab_bg = get_theme_mod('squarepress_tab_bg', get_stylesheet_directory_uri() . '/images/banner-image.jpg');
    $squarepress_testimonial_bg = get_theme_mod('squarepress_testimonial_bg', get_stylesheet_directory_uri() . '/images/banner-image.jpg');

    $custom_css = "
        #sq-tab-section{background-image: url(" . esc_url($squarepress_tab_bg) . ")}
        #sq-testimonial-section{background-image: url(" . esc_url($squarepress_testimonial_bg) . ")}
    ";

    return squarepress_css_strip_whitespace($custom_css);
}

function squarepress_css_strip_whitespace($css) {
    $replace = array(
        "#/\*.*?\*/#s" => "", // Strip C style comments.
        "#\s\s+#" => " ", // Strip excess whitespace.
    );
    $search = array_keys($replace);
    $css = preg_replace($search, $replace, $css);

    $replace = array(
        ": " => ":",
        "; " => ";",
        " {" => "{",
        " }" => "}",
        ", " => ",",
        "{ " => "{",
        ";}" => "}", // Strip optional semicolons.
        ",\n" => ",", // Don't wrap multiple selectors.
        "\n}" => "}", // Don't wrap closing braces.
        "} " => "}\n", // Put each rule on it's own line.
    );
    $search = array_keys($replace);
    $css = str_replace($search, $replace, $css);

    return trim($css);
}

/**
 * Customizer additions.
 */
require get_stylesheet_directory() . '/inc/customizer.php';
