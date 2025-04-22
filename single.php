<?php
get_header();
vocalvibes_banner();
?>

<main id="primary" class="site-main single-post-layout radio-module">
	<section class="post-section">
		<div class="wrapper">
			<div class="post-card">
				<?php while (have_posts()) : the_post(); ?>
					<?php the_post_thumbnail('large'); ?>
					<div class="post-content scroll-container">
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			</div>

			<?php
			$post_slug = get_post_field('post_name', get_post());

			$radio_data = [
				'groepszangles' => [
					'img' => '/assets/images/green-radio.png',
					'alt' => 'Groene radio',
				],
				'prive-zangles' => [
					'img' => '/assets/images/purple-radio.png',
					'alt' => 'Paarse radio',
				],
				'onlineles' => [
					'img' => '/assets/images/pink-radio.png',
					'alt' => 'Roze radio',
				],
				'over-mij' => [
					'img' => '/assets/images/over-mij.png',
					'alt' => 'Over mij',
				],
			];

			if (array_key_exists($post_slug, $radio_data)) :
			?>
				<section class="radio-section">
					<div class="radio-wrapper">
						<?php
						if ($post_slug === 'prive-zangles') {
							echo get_radio_box_html_by_slug('prive-zangles', '/assets/images/purple-radio.png', 'Paarse radio');
							echo get_radio_box_html_by_slug('onlineles', '/assets/images/pink-radio.png', 'Roze radio');
						} else {
							$radio = $radio_data[$post_slug];
							echo get_radio_box_html_by_slug($post_slug, $radio['img'], $radio['alt']);

							echo '<div class="radio-placeholder"></div>';
						}
						?>
					</div>
				</section>
			<?php endif; ?>

		</div>

		<?php get_template_part('template-parts/signup-section'); ?>
		<?php get_template_part('template-parts/youtube-section'); ?>
	</section>
</main>

<?php get_footer(); ?>