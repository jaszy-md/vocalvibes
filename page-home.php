<?php

/**
 * Template Name: Homepage
 */

get_header();
vocalvibes_banner();

// ✅ Functie om afbeelding en link uit een post te halen via slug
function get_radio_box_html_by_slug($slug, $radio_image_path, $alt_text)
{
    $post = get_posts(array(
        'name' => $slug,
        'post_type' => 'post',
        'posts_per_page' => 1
    ));

    if ($post) {
        $post_id = $post[0]->ID;
        $permalink = get_permalink($post_id);
        $banner_afbeelding = get_field('banner_afbeelding', $post_id);

        $output = '<a href="' . esc_url($permalink) . '" class="radio-box">';

        if ($banner_afbeelding) {
            $output .= '<div class="img-container">
                            <img src="' . esc_url($banner_afbeelding['url']) . '" alt="' . esc_attr($banner_afbeelding['alt']) . '" />
                        </div>';
        }

        $output .= '<img src="' . esc_url(get_theme_file_uri($radio_image_path)) . '" alt="' . esc_attr($alt_text) . '" />';
        $output .= '</a>';

        return $output;
    }

    return ''; // fallback
}
?>

<main class="homepage">

    <!-- RADIO SECTIE -->
    <section class="radio-section">
        <img src="<?php echo get_theme_file_uri('/assets/images/Music.png'); ?>" alt="Muzieknoot links" class="music-note left" />

        <div class="radio-wrapper">
            <?php echo get_radio_box_html_by_slug('prive-zangles', '/assets/images/purple-radio.png', 'Paarse radio'); ?>
            <?php echo get_radio_box_html_by_slug('groepszangles', '/assets/images/green-radio.png', 'Groene radio'); ?>
            <?php echo get_radio_box_html_by_slug('onlineles', '/assets/images/pink-radio.png', 'Roze radio'); ?>
        </div>

        <img src="<?php echo get_theme_file_uri('/assets/images/Music.png'); ?>" alt="Muzieknoot rechts" class="music-note right" />
    </section>

    <!-- BLOG-BOARD SECTIE -->
    <section class="full-width-image-section">
        <img src="<?php echo get_theme_file_uri('/assets/images/Weekly-blog-img.png'); ?>" alt="Volledige afbeelding" class="background-img" />

        <div class="blog-board-wrapper">
            <img src="<?php echo get_theme_file_uri('/assets/images/blog-board-e.png'); ?>" alt="Blog board" class="blog-board-img" />

            <div class="blog-board-content">
                <!-- Extra bovenbalk en linker blok -->
                <div class="top-bar"></div>
                <div class="side-block"></div>

                <!-- Overlay lagen -->
                <div class="top-half"></div>
                <div class="bottom-half"></div>

                <!-- Inhoud -->

            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/youtube-section'); ?>

</main>

<?php get_footer(); ?>