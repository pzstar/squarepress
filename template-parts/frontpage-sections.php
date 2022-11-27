<?php
$square_page = '';
$square_page_array = get_pages();
if (is_array($square_page_array)) {
    $square_page = $square_page_array[0]->ID;
}
?>

<section id="sq-home-slider-section">
    <div id="sq-bx-slider" class="owl-carousel">
        <?php
        for ($i = 1; $i < 4; $i++) {
            if ($i == 1) {
                $square_slider_title = get_theme_mod('square_slider_title1', __('Free WordPress Themes', 'squarepress'));
                $square_slider_subtitle = get_theme_mod('square_slider_subtitle1', __('Create website in no time', 'squarepress'));
                $square_slider_image = get_theme_mod('square_slider_image1', get_template_directory_uri() . '/images/bg.jpg');
            } else {
                $square_slider_title = get_theme_mod('square_slider_title' . $i);
                $square_slider_subtitle = get_theme_mod('square_slider_subtitle' . $i);
                $square_slider_image = get_theme_mod('square_slider_image' . $i);
            }

            if ($square_slider_image) {
                ?>
                <div class="sq-slide sq-slide-count<?php echo $i; ?>">
                    <img src="<?php echo esc_url($square_slider_image); ?>" alt="<?php esc_attr_e('Slider', 'squarepress') ?>">

                    <?php if ($square_slider_title || $square_slider_subtitle) { ?>
                        <div class="sq-container">
                            <div class="sq-slide-caption">
                                <div class="sq-slide-cap-title">
                                    <?php echo esc_html($square_slider_title); ?>
                                </div>

                                <div class="sq-slide-cap-desc">
                                    <?php echo esc_html($square_slider_subtitle); ?>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <?php
            }
        }
        ?>
    </div>
</section>

<section id="sq-featured-post-section" class="sq-section">
    <div class="sq-container">
        <div class="sq-featured-post-wrap sq-clearfix">
            <?php
            $square_enable_featured_link = get_theme_mod('square_enable_featured_link', true);
            $squarepress_enable_colored_box = get_theme_mod('squarepress_enable_colored_box', true);
            $square_featured_class = $squarepress_enable_colored_box ? 'theme-colored-box' : '';

            for ($i = 1; $i < 4; $i++) {
                $square_featured_page_id = get_theme_mod('square_featured_page' . $i, $square_page);
                $square_featured_page_icon = get_theme_mod('square_featured_page_icon' . $i, 'fa-bell');

                if ($square_featured_page_id) {
                    $args = array('page_id' => $square_featured_page_id);
                    $query = new WP_Query($args);
                    if ($query->have_posts()):
                        while ($query->have_posts()) : $query->the_post();
                            ?>
                            <div class="sq-featured-post <?php echo esc_attr($square_featured_class) . ' sq-featured-post' . $i // WPCS: XSS OK.;                          ?>">
                                <div class="sq-featured-icon"><i class="fa <?php echo esc_attr($square_featured_page_icon); ?>"></i></div>
                                <h4><?php the_title(); ?></h4>
                                <div class="sq-featured-excerpt">
                                    <?php
                                    if (has_excerpt() && '' != trim(get_the_excerpt())) {
                                        echo get_the_excerpt(); // WPCS: XSS OK.
                                    } else {
                                        echo square_excerpt(get_the_content(), 120); // WPCS: XSS OK.
                                    }
                                    ?>
                                </div>
                                <?php
                                if ($square_enable_featured_link) {
                                    ?>
                                    <a href="<?php the_permalink(); ?>" class="sq-featured-readmore"><?php echo esc_html__('Read More', 'squarepress') ?><i class="fa fa-angle-right"></i></a>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    wp_reset_postdata();
                }
            }
            ?>
        </div>
    </div>
</section>

<?php
$square_disable_about_sec = get_theme_mod('square_disable_about_sec');
if (!$square_disable_about_sec) {
    ?>
    <section id="sq-about-us-section" class="sq-section">
        <div class="sq-container sq-clearfix">
            <div class="sq-about-sec">
                <?php
                $args = array(
                    'page_id' => get_theme_mod('square_about_page')
                );
                $query = new WP_Query($args);
                if ($query->have_posts() && get_theme_mod('square_about_page')):
                    while ($query->have_posts()) : $query->the_post();
                        ?>
                        <h2 class="sq-section-title"><?php the_title(); ?></h2>
                        <div class="sq-content"><?php the_content(); ?></div>
                        <?php
                    endwhile;
                endif;
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </section>
    <?php
}

$square_disable_tab_sec = get_theme_mod('square_disable_tab_sec');
if (!$square_disable_tab_sec) {
    ?>
    <section id="sq-tab-section" class="sq-section">
        <div class="sq-container sq-clearfix">
            <?php
            $squarepress_tab_title = get_theme_mod('squarepress_tab_title');
            $squarepress_tab_subtitle = get_theme_mod('squarepress_tab_subtitle');

            if ($squarepress_tab_title) {
                ?>
                <h2 class="sq-section-title"><?php echo esc_html($squarepress_tab_title) ?></h2>
                <?php
            }

            if ($squarepress_tab_subtitle) {
                ?>
                <div class="sq-section-subtitle"><?php echo esc_html($squarepress_tab_subtitle) ?></div>
                <?php
            }
            ?>

            <ul class="sq-tab">
                <?php
                for ($i = 1; $i < 6; $i++) {
                    $square_tab_title = get_theme_mod('square_tab_title' . $i);
                    $square_tab_icon = get_theme_mod('square_tab_icon' . $i, 'fa-bell');

                    if ($square_tab_title) {
                        ?>
                        <li class="sq-tab-list<?php echo $i; ?>">
                            <a href="#<?php echo 'sq-tab' . $i; ?>">
                                <?php echo '<i class="fa ' . esc_attr($square_tab_icon) . '"></i><span>' . esc_html($square_tab_title) . '</span>'; ?>
                            </a>
                        </li>
                        <?php
                    }
                }
                ?>
            </ul>

            <div class="sq-tab-content">
                <?php
                for ($i = 1; $i < 6; $i++) {
                    $square_tab_page = get_theme_mod('square_tab_page' . $i);
                    if ($square_tab_page) {
                        ?>
                        <div class="sq-tab-pane animated zoomIn" id="<?php echo 'sq-tab' . $i; ?>">
                            <?php
                            $args = array(
                                'page_id' => $square_tab_page
                            );
                            $query = new WP_Query($args);
                            if ($query->have_posts()):
                                while ($query->have_posts()) : $query->the_post();
                                    ?>
                                    <h2><?php the_title(); ?></h2>
                                    <div class="sq-content"><?php the_content(); ?></div>
                                    <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}

$squarepress_disable_team_sec = get_theme_mod('squarepress_disable_team_sec');
if (!$squarepress_disable_team_sec) {
    ?>
    <section id="sq-team-section" class="sq-section">
        <div class="sq-container">
            <?php
            $squarepress_team_title = get_theme_mod('squarepress_team_title');
            $squarepress_team_subtitle = get_theme_mod('squarepress_team_subtitle');

            if ($squarepress_team_title) {
                ?>
                <h2 class="sq-section-title"><?php echo esc_html($squarepress_team_title) ?></h2>
                <?php
            }

            if ($squarepress_team_subtitle) {
                ?>
                <div class="sq-section-subtitle"><?php echo esc_html($squarepress_team_subtitle) ?></div>
                <?php
            }
            ?>

            <div class="sq-team-member-wrap sq-clearfix">
                <?php
                for ($i = 1; $i < 4; $i++) {
                    $squarepress_team_page_id = get_theme_mod('squarepress_team_page' . $i);
                    $squarepress_team_designation = get_theme_mod('squarepress_team_designation' . $i);

                    if ($squarepress_team_page_id) {
                        $args = array('page_id' => $squarepress_team_page_id);
                        $query = new WP_Query($args);
                        if ($query->have_posts()):
                            while ($query->have_posts()) : $query->the_post();
                                ?>
                                <div class="sq-team-member">
                                    <div class="sq-team-image">
                                        <?php
                                        if (has_post_thumbnail()) {
                                            $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'square-about-thumb');
                                            echo '<img src="' . esc_url($image[0]) . '"/>';
                                        }
                                        ?>
                                    </div>

                                    <div class="sq-team-excerpt">
                                        <h4><?php the_title(); ?></h4>

                                        <div class="sq-team-designation">
                                            <?php echo $squarepress_team_designation; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endwhile;
                        endif;
                        wp_reset_postdata();
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}

$squarepress_testimonial_sec = get_theme_mod('squarepress_disable_testimonial_sec');
if (!$squarepress_testimonial_sec) {
    ?>
    <section id="sq-testimonial-section" class="sq-section">
        <div class="sq-container">
            <?php
            $squarepress_testimonial_title = get_theme_mod('squarepress_testimonial_title');
            $squarepress_testimonial_subtitle = get_theme_mod('squarepress_testimonial_subtitle');

            if ($squarepress_testimonial_title) {
                ?>
                <h2 class="sq-section-title"><?php echo esc_html($squarepress_testimonial_title) ?></h2>
                <?php
            }

            if ($squarepress_testimonial_subtitle) {
                ?>
                <div class="sq-section-subtitle"><?php echo esc_html($squarepress_testimonial_subtitle) ?></div>
                <?php
            }
            ?>

            <div class="sq-testimonial-wrap">
                <div class="sq-testimonial-slider owl-carousel">
                    <?php
                    for ($i = 1; $i < 4; $i++) {
                        $squarepress_testimonial_page_id = get_theme_mod('squarepress_testimonial_page' . $i);
                        $squarepress_testimonial_designation = get_theme_mod('squarepress_testimonial_designation' . $i);

                        if ($squarepress_testimonial_page_id) {
                            $args = array('page_id' => $squarepress_testimonial_page_id);
                            $query = new WP_Query($args);
                            if ($query->have_posts()):
                                while ($query->have_posts()) : $query->the_post();
                                    ?>
                                    <div class="sq-testimonial">
                                        <div class="sq-testimonial-inner">
                                            <div class="sq-testimonial-excerpt">
                                                <?php
                                                if (has_excerpt() && '' != trim(get_the_excerpt())) {
                                                    the_excerpt();
                                                } else {
                                                    echo esc_html(square_excerpt(get_the_content(), 380));
                                                }
                                                ?>
                                            </div>

                                            <div class="sq-testimonial-image">
                                                <?php
                                                if (has_post_thumbnail()) {
                                                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail');
                                                    echo '<img src="' . esc_url($image[0]) . '"/>';
                                                }
                                                ?>
                                                <h4><?php the_title(); ?></h4>

                                                <div class="sq-testimonial-designation">
                                                    <?php echo $squarepress_testimonial_designation; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                endwhile;
                            endif;
                            wp_reset_postdata();
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <?php
}

$square_disable_logo_sec = get_theme_mod('square_disable_logo_sec');
if (!$square_disable_logo_sec) {
    ?>
    <section id="sq-logo-section" class="sq-section">
        <div class="sq-container">
            <?php
            $square_logo_title = get_theme_mod('square_logo_title');
            ?>

            <?php if ($square_logo_title) { ?>
                <h2 class="sq-section-title"><?php echo esc_html($square_logo_title); ?></h2>
            <?php } ?>

            <?php
            $square_client_logo_image = get_theme_mod('square_client_logo_image');
            $square_client_logo_image = explode(',', $square_client_logo_image);
            ?>

            <div class="sq_client_logo_slider owl-carousel">
                <?php
                foreach ($square_client_logo_image as $square_client_logo_image_single) {
                    $image = wp_get_attachment_image_src($square_client_logo_image_single, 'full');
                    if ($image) {
                        $image_alt = get_post_meta($square_client_logo_image_single, '_wp_attachment_image_alt', true);
                        $image_alt_text = $image_alt ? $image_alt : __('Logo', 'squarepress');
                        ?>
                        <img src="<?php echo esc_url($image[0]); ?>" alt="<?php echo esc_html($image_alt_text) ?>">
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
    <?php
}

