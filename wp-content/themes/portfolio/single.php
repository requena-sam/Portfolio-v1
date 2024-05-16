<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <h2><?= get_field('projet-title'); ?></h2>
        <a class="back_projects" href="<?= get_field('back-link'); ?>">Retour au projets</a>
        <section class="description">
            <div class="description__content">
                <h2 role="heading" aria-level="2">Description</h2>
                <p class="desciption__content__text">
                    <?= get_field('projet-description'); ?>
                </p>
                <a class="desciption__content__visit" href="<?= get_field('projet-visit-link'); ?>">
                    Vister le site
                </a>
                <a class="desciption__content__github" href="<?= get_field('projet-github-link'); ?>">
                    Projet Github
                </a>
            </div>
            <img src="<?= get_field('projet-mockup1'); ?>" alt="Image d'un mockup de notre site web" width=" 30%">
        </section>
        <section class="functionality">
            <img src="<?= get_field('projet-mockup2'); ?>" alt="Image d'un mockup illustrant le site"
            width="30%">
            <div>
                <div class="functionality__content">
                    <h2 role="heading" aria-level="2">Fonctionailtés</h2>
                    <p><?= get_field('project-functionality'); ?></p>
                </div>
                <div class="tools">
                    <ul>
                        <?php if (have_rows('tools-list')) :
                            while (have_rows('tools-list')) : the_row();
                                $image = get_sub_field('tool-image');
                                $alt = get_sub_field('tool-alt');
                                ?>
                                <li>
                                    <img src="<?= $image; ?>" alt="Logo de la compétence <?= $alt; ?>" width="50px">
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
            <ul>
                <?php if (have_rows('color-list')) :
                    while (have_rows('color-list')) : the_row();
                        $hex = get_sub_field('color-hex');
                        ?>
                        <li> <?= $hex; ?></li>
                    <?php endwhile;
                endif;
                ?>
            </ul>
        </section>
        <?php get_template_part('components/collab'); ?>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>