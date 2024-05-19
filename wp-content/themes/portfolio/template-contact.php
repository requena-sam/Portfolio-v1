<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <h2 role="heading" aria-level="2" class="contact_title main_title">Me contacter</h2>
        <section class="contact">
            <div class="contact__content">
                <h3>Informations de contact</h3>
                <div class="contact__content__item">
                    <p><b>Vous pouvez m'envoyez un mail sur</b></p>
                    <p><?= get_field('contact-email'); ?></p>
                </div>
                <div class="contact__content__item">
                    <p><b>Ou me joindre ici</b></p>
                    <p><?= get_field('contact-phone'); ?></p>
                </div>
                <img src="<?= get_field('contact-illu'); ?>" alt="Illustration de contact">
            </div>
            <div class="contact__container">
                <h3>Formulaire de contact</h3>
                <?php get_template_part('components/contact-form'); ?>
            </div>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>