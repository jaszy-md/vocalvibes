<?php

/**
 * VocalVibes functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package VocalVibes
 */

if (!defined('_S_VERSION')) {
	define('_S_VERSION', '1.0.0');
}

if (!is_admin()) {
	add_filter('show_admin_bar', '__return_false');
}

function vocalvibes_setup()
{
	load_theme_textdomain('vocalvibes', get_template_directory() . '/languages');

	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');

	add_theme_support('custom-logo', array(
		'height'      => 100,
		'width'       => 300,
		'flex-height' => true,
		'flex-width'  => true,
	));

	add_theme_support('html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	));

	register_nav_menus(array(
		'headerMenuLocation' => __('Header Menu', 'vocalvibes'),
		'footerMenuLocation' => __('Footer Menu', 'vocalvibes'),
	));
}
add_action('after_setup_theme', 'vocalvibes_setup');

function vocalvibes_scripts()
{
	wp_enqueue_style('vocalvibes-style', get_stylesheet_uri(), array(), _S_VERSION);

	wp_enqueue_script('vocalvibes-hamburger', get_template_directory_uri() . '/js/hamburger.js', array(), _S_VERSION, true);
	wp_enqueue_script('vocalvibes-radio', get_template_directory_uri() . '/js/radio.js', array(), _S_VERSION, true);
	wp_enqueue_script('vocalvibes-blog-board', get_template_directory_uri() . '/js/blog-board.js', array(), _S_VERSION, true);
}
add_action('wp_enqueue_scripts', 'vocalvibes_scripts');

require get_template_directory() . '/inc/template-tags.php';


function vocalvibes_custom_logo()
{
	$custom_logo_id = get_theme_mod('custom_logo');
	if ($custom_logo_id) {
		echo wp_get_attachment_image($custom_logo_id, 'full', false, array('class' => 'custom-logo'));
	} else {
		echo '<a href="' . esc_url(home_url('/')) . '" class="custom-logo-link" rel="home">';
		echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/logo.png') . '" class="custom-logo" alt="VocalVibes Logo" style="height:48px;width:auto;margin:3px 0 0 25px;">';
		echo '</a>';
	}
}

function vocalvibes_banner($args = [])
{
	$banner_type = get_field('banner_type');
	$banner_afbeelding = get_field('banner_afbeelding');
	$banner_video = get_field('banner_video_url');
	$titel_afbeelding = get_field('titel_afbeelding');

	$fallback_banner_image = get_theme_file_uri('/assets/images/default-banner.png');
	$fallback_banner_video = get_theme_file_uri('/assets/videos/video-girl.mp4');
	$fallback_titel_afbeelding = get_theme_file_uri('/assets/images/page-ribbon-black.png');

	$title = isset($args['title']) ? $args['title'] : get_the_title();
	$subtitle = isset($args['subtitle']) ? $args['subtitle'] : get_field('banner_subtitle');

	if ($banner_type === 'video' && $banner_video) {
		$video_url = esc_url($banner_video);
	} elseif ($banner_type === 'video') {
		$video_url = $fallback_banner_video;
	}
	if (!empty($video_url)) {
		$media = '<video autoplay muted loop playsinline class="banner__video"><source src="' . esc_url($video_url) . '" type="video/mp4"></video>';
	} elseif ($banner_type === 'image' && $banner_afbeelding) {
		$image_url = esc_url($banner_afbeelding['url']);
		$media = '<div class="banner__image" style="background-image: url(' . $image_url . ');"></div>';
	} else {
		$media = '<div class="banner__image" style="background-image: url(' . esc_url($fallback_banner_image) . ');"></div>';
	}

	$titel_afbeelding_url = $titel_afbeelding ? esc_url($titel_afbeelding['url']) : $fallback_titel_afbeelding;
?>
	<section class="banner">
		<?php echo $media; ?>

		<div class="banner__title-image-wrapper">
			<img src="<?php echo $titel_afbeelding_url; ?>" alt="Titel afbeelding" class="banner__title-image" />
			<h1 class="banner__title-on-image"><?php echo esc_html($title); ?></h1>
		</div>

		<?php if ($subtitle) : ?>
			<div class="banner__content container">
				<p class="banner__subtitle"><?php echo esc_html($subtitle); ?></p>
			</div>
		<?php endif; ?>
	</section>
<?php
}

// Radio
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
		if ($banner_afbeelding && isset($banner_afbeelding['url'])) {
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

// Background color
function add_background_color_class_to_body($classes)
{
	if (is_singular(['post', 'page'])) {
		$kleur = get_field('background_color');
		if ($kleur) {
			$classes[] = sanitize_html_class($kleur);
		}
	}
	return $classes;
}
add_filter('body_class', 'add_background_color_class_to_body');


// Contactform
add_action('admin_post_nopriv_vocalvibes_contact_form', 'handle_vocalvibes_contact_form');
add_action('admin_post_vocalvibes_contact_form', 'handle_vocalvibes_contact_form');

function handle_vocalvibes_contact_form()
{
	if (
		!isset($_POST['vocalvibes_contact_nonce_field']) ||
		!wp_verify_nonce($_POST['vocalvibes_contact_nonce_field'], 'vocalvibes_contact_nonce_action')
	) {
		wp_die('Ongeldige aanvraag.');
	}

	$naam = sanitize_text_field($_POST['naam']);
	$email = sanitize_email($_POST['email']);
	$bericht = sanitize_textarea_field($_POST['bericht']);

	wp_redirect(home_url('/bedankt'));
	exit;
}
