<?php
get_header();

// Toon de herbruikbare banner bovenaan
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
			];

			if (array_key_exists($post_slug, $radio_data)) :
				$radio = $radio_data[$post_slug];
			?>
				<section class="radio-section">
					<div class="radio-wrapper">
						<?php echo get_radio_box_html_by_slug($post_slug, $radio['img'], $radio['alt']); ?>
					</div>
				</section>
			<?php endif; ?>

		</div>


		<div class="regi-section">
			<div class="regi-inner">
				<p>📬 Aanmelden? Makkelijk!<br>
					Vul het contactformulier onderaan de pagina in, en we nemen telefonisch contact met je op om samen een eerste afspraak te plannen.<br>
					We kijken ernaar uit om met jou de muziek in te duiken!<br>
					Let’s sing it out loud! 🎶
				</p>
				<a href="/contact" class="btn btn-primary">Aanmelden</a>
			</div>
		</div>

		<?php get_template_part('template-parts/youtube-section'); ?>

	</section>
</main>

<?php get_footer(); ?>