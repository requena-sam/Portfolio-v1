<?php get_header(); ?>
    <main>
        <h2 class="hidden" role="heading" aria-level="2">Error404</h2>
        <section class="error">
            <div class="error__content">
                <h3>Erreur 404</h3>
                <p>Ouups page introuvable !</p>
                <div class="error__cta cta_group">
                    <a class="cta_group__primary_btn" href="<?= get_field('404-home-link', 'options'); ?>">Retour à
                        l'accueil
                    </a>
                </div>
            </div>
        </section>
    </main>
<?php get_footer(); ?>