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
	));
}
add_action('after_setup_theme', 'vocalvibes_setup');

function vocalvibes_scripts()
{
	wp_enqueue_style('vocalvibes-style', get_stylesheet_uri(), array(), _S_VERSION);
}
add_action('wp_enqueue_scripts', 'vocalvibes_scripts');

// ✅ Laad de custom template tags, zoals vocalvibes_posted_on()
require get_template_directory() . '/inc/template-tags.php';
