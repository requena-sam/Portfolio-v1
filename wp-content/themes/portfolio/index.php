<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <section data-animation="showUp" class="home">
            <h2 class="hidden" role="heading" aria-level="2">Page d'accueil</h2>
            <div class="home__image">
                <img class="mobile_hidden" src="<?= get_field('home-image-desktop'); ?>" alt="">
                <img class="desktop_hidden" src="<?= get_field('home-image-mobile'); ?>" alt="">
            </div>
            <p class="home__scroll">scroll</p>
        </section>
        <?php get_template_part('home/skills'); ?>
        <?php get_template_part('home/recent-project'); ?>
        <?php get_template_part('home/review'); ?>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>