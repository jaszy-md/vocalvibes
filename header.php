<?php

/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up until <div id="content">
 *
 * @package VocalVibes
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<!-- Material Icons -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons+Outlined" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page" class="site">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'vocalvibes'); ?></a>

		<header class="header">
			<div class="header__topbar">
				<div class="header__topbar-left"></div>

				<div class="header__promo">Boek nu je eerste GRATIS proefles!</div>

				<div class="header__topbar-icons">
					<a href="mailto:info@vocalvibes.nl" title="Mail ons">
						<span class="material-icons-outlined">mail_outline</span>
					</a>
					<a href="tel:0612345678" title="Bel ons">
						<span class="material-icons-outlined">call</span>
					</a>
				</div>
			</div>

			<div class="header__inner">
				<div class="header__logo">
					<?php the_custom_logo(); ?>
				</div>

				<nav class="header__nav">
					<?php
					wp_nav_menu(array(
						'theme_location' => 'headerMenuLocation',
						'menu_class'     => 'header__menu',
						'container'      => false,
					));
					?>
				</nav>
			</div>
		</header>