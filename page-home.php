<?php

/**
 * Template Name: Homepage
 */

get_header();
vocalvibes_banner();

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

    return '';
}

$weekly_blog = get_posts([
    'post_type' => 'wekelijkse_blog',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC'
]);

$week_number = $title = $description = $exercise = '';

if ($weekly_blog) {
    $blog_id = $weekly_blog[0]->ID;
    $week_number = get_field('week_number', $blog_id);
    $title = get_field('title', $blog_id);
    $description = get_field('description', $blog_id);
    $exercise = get_field('exercise', $blog_id);
}
?>

<main class="homepage">
    <section class="radio-section">
        <img src="<?php echo get_theme_file_uri('/assets/images/Music.png'); ?>" alt="Muzieknoot links" class="music-note left" />
        <div class="radio-wrapper">
            <?php echo get_radio_box_html_by_slug('prive-zangles', '/assets/images/purple-radio.png', 'Paarse radio'); ?>
            <?php echo get_radio_box_html_by_slug('groepszangles', '/assets/images/green-radio.png', 'Groene radio'); ?>
            <?php echo get_radio_box_html_by_slug('onlineles', '/assets/images/pink-radio.png', 'Roze radio'); ?>
        </div>
        <img src="<?php echo get_theme_file_uri('/assets/images/Music.png'); ?>" alt="Muzieknoot rechts" class="music-note right" />
    </section>

    <section class="full-width-image-section">
        <img src="<?php echo get_theme_file_uri('/assets/images/Weekly-blog-img.png'); ?>" alt="Volledige afbeelding" class="background-img" />

        <div class="blog-board-wrapper">
            <img src="<?php echo get_theme_file_uri('/assets/images/blog-board-e.png'); ?>" alt="Blog board" class="blog-board-img" />

            <div class="blog-board-content">
                <div class="top-bar">
                    <?php if (!empty($week_number)) : ?>
                        <span class="week-label"><?php echo esc_html($week_number); ?></span>
                    <?php endif; ?>
                    <img src="<?php echo get_theme_file_uri('/assets/images/week-ribbon.png'); ?>" class="week-ribbon" alt="Week ribbon" />
                    <?php if (!empty($title)) : ?>
                        <h2 class="blog-title"><?php echo esc_html($title); ?></h2>
                    <?php endif; ?>
                </div>

                <div class="side-block"><strong>Oefening</strong></div>

                <div class="top-half">
                    <?php if (!empty($description)) : ?>
                        <div class="scroll-container">
                            <p><?php echo esc_html($description); ?></p>
                        </div>
                    <?php endif; ?>
                </div>


                <div class="bottom-half">
                    <?php if (!empty($exercise)) : ?>
                        <div class="scroll-container">
                            <p><?php echo nl2br(esc_html($exercise)); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <?php get_template_part('template-parts/youtube-section'); ?>
</main>

<?php get_footer(); ?>