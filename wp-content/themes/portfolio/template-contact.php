<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <h2 role="heading" aria-level="2" class="contact_title main_title">Me contacter</h2>
        <section data-animation="showUp" class="contact">
            <div class="contact__content" itemscope itemtype="https://schema.org/Person">
                <h3 role="heading" aria-level="3">Informations de contact <span class="hidden" itemprop="name">Sam Requena</span>
                </h3>
                <div class="contact__content__item">
                    <p><b>Vous pouvez m'envoyer un mail sur</b></p>
                    <a title="Envoie un mail à Sam Requena"
                       href="mailto:<?= get_field('contact-email'); ?>" itemprop="email"><?= get_field('contact-email'); ?></a>
                </div>
                <div class="contact__content__item">
                    <p><b>Ou me joindre ici</b></p>
                    <a title="Appelle Sam Requena"
                       href="tel:<?= get_field('contact-phone'); ?>" itemprop="telephone"><?= get_field('contact-phone'); ?></a>
                </div>
                <img class="mobile_hidden" src="<?= get_field('contact-illu'); ?>" alt="Illustration de contact">
            </div>
            <div data-animation="showUp" class="contact__container">
                <h3 role="heading" aria-level="3">Formulaire de contact</h3>
                <?php get_template_part('components/contact-form'); ?>
            </div>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>