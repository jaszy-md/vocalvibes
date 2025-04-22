<?php

/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package VocalVibes
 */

get_header();
vocalvibes_banner(); ?>

<main id="primary" class="site-main">
	<div class="wrapper">
		<section class="post-card">
			<header class="post-header">
				<h1 class="post-title"><?php esc_html_e('Pagina niet gevonden', 'vocalvibes'); ?></h1>
			</header>

			<div class="post-content">
				<p><?php esc_html_e('Oeps! Deze pagina bestaat niet (meer).', 'vocalvibes'); ?></p>
				<p><?php esc_html_e('Misschien heb je een tikfout gemaakt of is de link verouderd.', 'vocalvibes'); ?></p>
				<a href="<?php echo esc_url(home_url('/')); ?>">
					<button type="button" class="btn-purple">← Terug naar de homepage</button>
				</a>

			</div>
		</section>
	</div>
</main>

<?php get_footer(); ?>