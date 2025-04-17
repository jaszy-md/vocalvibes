<footer id="colophon" class="site-footer">
	<div class="footer-top">
		<div class="wrapper footer-content">
			<div class="footer-logo">
				<?php vocalvibes_custom_logo(); ?>
			</div>

			<nav class="footer-nav">
				<?php
				wp_nav_menu(array(
					'theme_location' => 'footerMenuLocation',
					'menu_class'     => 'footer-menu',
					'container'      => false,
				));
				?>
			</nav>

			<div class="footer-socials-and-image">
				<div class="footer-socials">
					<a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
					<a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
					<a href="https://facebook.com" target="_blank"><i class="fab fa-facebook"></i></a>
				</div>
				<div class="footer-image">
					<img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-women.png" alt="Vrolijke vrouw" />
				</div>
			</div>
		</div>
	</div>

	<div class="footer-bottom">
		<p>&copy; <?php echo date('Y'); ?> JaszyDesigns. All rights reserved.</p>
	</div>
</footer>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>

</html>