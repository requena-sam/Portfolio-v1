<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <div class="single_project_head">
            <h2 role="heading" aria-level="2" class="main_title" ><?= get_field('projet-title'); ?></h2>
            <a class="back_projects" href="<?= get_field('back-link'); ?>">Retour au projets</a>
        </div>
        <section class="description">
            <div class="description__content">
                <div class="description__content__text">
                    <h2 role="heading" aria-level="2">Description</h2>
                    <p class="desciption__content__text">
                        <?= get_field('projet-description'); ?>
                    </p>
                </div>
                <div class="cta_group description__content__cta">
                    <a class="desciption__content__cta__visit cta_group__primary_btn"
                       href="<?= get_field('projet-visit-link'); ?>">
                        Vister le site
                    </a>
                    <a class="desciption__content__cta__github cta_group__secondary_btn"
                       href="<?= get_field('projet-github-link'); ?>">
                        Projet Github
                    </a>
                </div>
            </div>
            <div class="description__img">
                <img src="<?= get_field('projet-mockup1'); ?>" alt="Image d'un mockup de notre site web"
                     width=" 30%">
            </div>
        </section>
        <section class="informations">
            <div class="informations__img">
                <img src="<?= get_field('projet-mockup2'); ?>" alt="Image d'un mockup illustrant le site"
                     width="30%">
            </div>
            <div class="informations__text">
                <div class="informations__text__content">
                    <h2 role="heading" aria-level="2">Fonctionailtés</h2>
                    <p><?= get_field('project-functionality'); ?></p>
                </div>
                <div class="informations__text__tools">
                    <h2 role="heading" aria-level="2">Outils utilisés</h2>
                    <ul>
                        <?php if (have_rows('tools-list')) :
                            while (have_rows('tools-list')) : the_row();
                                $image = get_sub_field('tool-image');
                                $alt = get_sub_field('tool-alt');
                                ?>
                                <li>
                                    <img src="<?= $image; ?>" alt="Logo de la compétence <?= $alt; ?>">
                                </li>
                            <?php endwhile;
                        endif;
                        ?>
                    </ul>
                </div>
            </div>
        </section>
        <section class="color">
            <h2 class="color__title">Palette de couleur</h2>
            <ul class="color__container">
                <?php if (have_rows('color-list')) :
                    while (have_rows('color-list')) : the_row();
                        $hex = get_sub_field('color-hex');
                        ?>
                        <li style="background-color: <?= $hex ?>" class="color__container__item">
                            <p><?= $hex; ?></p>
                            <div class="copy-tooltip color__container__item__copy">C'est copié ;)</div>
                        </li>
                    <?php endwhile;
                endif;
                ?>
            </ul>
        </section>
        <?php get_template_part('components/collab'); ?>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>