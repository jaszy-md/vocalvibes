<?php
get_header();

// Toon de herbruikbare banner bovenaan
vocalvibes_banner();
?>

<main id="primary" class="site-main single-post-layout">
	<section class="post-section">
		<div class="wrapper">
			<div class="post-card">
				<?php while (have_posts()) : the_post(); ?>
					<?php the_post_thumbnail('large'); ?>

					<div class="post-content">
						<?php the_content(); ?>
					</div>
				<?php endwhile; ?>
			</div>
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