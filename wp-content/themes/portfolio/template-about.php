<?php /* Template Name: About me page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <h2 role="heading" aria-level="2" class="main_title about_title"><?= get_field('about-title'); ?></h2>
        <section  class="about" itemscope itemtype="https://schema.org/Person">
            <div data-animation="showUp"  class="about__img">
                <img src="<?= get_field('about-image'); ?>" alt="Image de moi" width="30%">
            </div>
            <div data-animation="showUp" class="about__content">
                <h3 role="heading" aria-level="3" itemprop="name"><?= get_field('name'); ?>
                    <span class="about__desc" itemprop="knowsAbout"><?= get_field('description'); ?></span>
                </h3>
                <p class="about__content" itemprop="description	"><?= get_field('content'); ?></p>
            </div>
        </section>
        <section class="parcours">
            <h2 data-animation="showUp" role="heading" aria-level="2" class="parcours__title second_title">
                <?= get_field('parcours-title'); ?>
            </h2>
            <div class="parcours__container">
                <?php if (have_rows('parcours-list')) :
                    while (have_rows('parcours-list')) :
                        the_row();
                        $schoolName = get_sub_field('school');
                        $duration = get_sub_field('duration');
                        $desc = get_sub_field('description');
                        ?>
                        <div data-animation="showUp" class="parcours__container__item" itemscope itemtype="https://schema.org/Organization">
                            <h3 class="parcours__container__item__school" role="heading" aria-level="3" itemprop="name">
                                <?= $schoolName; ?>
                            </h3>
                            <span class="parcours__container__item__duration">
                            <?= $duration; ?></span>
                            <p class="parcours__container__item__desc" itemprop="description">
                                <?= $desc; ?>
                            </p>
                        </div>
                    <?php endwhile;
                endif; ?>
            </div>
        </section>
        <section data-animation="showUp" class="workstep">
            <h2 class="workstep__title second_title" role="heading" aria-level="2"><?= get_field('workstep-title'); ?></h2>
            <div class="workstep__container">
                <?php
                $counter = 1; // Initialisation du compteur
                if (have_rows('workstep-list')) :
                    while (have_rows('workstep-list')) :
                        the_row();
                        $stepTitle = get_sub_field('title');
                        $stepDescription = get_sub_field('description');
                        ?>
                        <article data-animation="showUp" class="workstep__container__article">
                            <span><?= $counter++; ?></span> <!-- Utilisation du compteur et incrémentation -->
                            <h3 class="workstep__container__article__title" role="heading" aria-level="3"><?= $stepTitle; ?></h3>
                            <p class="workstep__container__article__text"><?= $stepDescription; ?></p>
                        </article>
                    <?php endwhile;
                endif; ?>
            </div>
        </section>
        <?php get_template_part('components/collab'); ?>
    </main>
<?php endwhile; endif; ?>
<?= get_footer(); ?>