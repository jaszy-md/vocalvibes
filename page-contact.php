<?php

/**
 * Template Name: Contactpagina
 */
get_header();
vocalvibes_banner();
?>

<main class="contactpage">
    <div class="wrapper">
        <div class="form-and-info">
            <section class="form-section">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/contact-form-bg.png" alt="Achtergrond" class="form-bg-img" />
                <div class="form-card">
                    <h2 class="form-title">Lets sing together!</h2>
                    <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
                        <input type="hidden" name="action" value="vocalvibes_contact_form">
                        <?php wp_nonce_field('vocalvibes_contact_nonce_action', 'vocalvibes_contact_nonce_field'); ?>

                        <label for="naam">Jouw naam</label>
                        <input type="text" name="naam" id="naam" required>

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" required>

                        <label for="bericht">Bericht</label>
                        <textarea name="bericht" id="bericht" rows="4" required></textarea>

                        <button type="submit">Verstuur aanmelding</button>
                    </form>
                </div>
            </section>

            <aside class="contact-info">
                <div class="info-box">
                    <div class="info-item">
                        <i class="fa-solid fa-envelope"></i>
                        <span>info@Singalong.nl</span>
                    </div>
                    <div class="info-item">
                        <i class="fa-solid fa-phone"></i>
                        <span>06 - 12345678</span>
                    </div>
                    <div class="info-item">
                        <i class="fa-solid fa-location-dot"></i>
                        <span>Goedereede</span>
                    </div>
                </div>
            </aside>
        </div>
    </div>

    <div class="people-image">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/people.png" alt="People" />
    </div>

    <?php get_template_part('template-parts/youtube-section'); ?>
</main>

<?php get_footer(); ?>