<?php /* Template Name: About me page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <h2 role="heading" aria-level="2"><?= get_field('about-title'); ?></h2>
        <section class="about">
            <img src="<?= get_field('about-image'); ?>" alt="Image de moi" width="30%">
            <h3 role="heading" aria-level="3"><?= get_field('name'); ?>
                <span class="about__desc"><?= get_field('description'); ?></span>
            </h3>
            <p class="about__content"><?= get_field('content'); ?></p>
        </section>
        <section class="parcours">
            <h2 role="heading" aria-level="2" class="parcours__title">
                <?= get_field('parcours-title'); ?>
            </h2>
            <?php if (have_rows('parcours-list')) :
            while (have_rows('parcours-list')) :
            the_row();
            $schoolName = get_sub_field('school');
            $duration = get_sub_field('duration');
            $desc = get_sub_field('description');
            ?>
            <div class="parcours__item">
                <h3 class="parcours__item__school" role="heading" aria-level="3">
                    <?= $schoolName; ?>
                </h3>
                <span class="parcours__item__duration">
                            <?= $duration; ?>
                        </span>
                <p class="parcours__item__desc">
                    <?= $desc; ?>
                </p>
                <?php endwhile;
                endif; ?>
            </div>
        </section>
        <section class="workstep">
            <h2 class="workstep__title"><?= get_field('workstep-title'); ?></h2>
            <ol>
                <?php if (have_rows('workstep-list')) :
                    while (have_rows('workstep-list')) :
                        the_row();
                        $stepTitle = get_sub_field('title');
                        $stepDescription = get_sub_field('description');
                        ?>

                        <li>
                            <article>
                                <h3><?= $stepTitle; ?></h3>
                                <p><?= $stepDescription; ?></p>
                            </article>
                        </li>
                    <?php endwhile;
                endif; ?>
            </ol>
        </section>
        <?php get_template_part('components/collab'); ?>
    </main>
<?php endwhile; endif; ?>
<?= get_footer(); ?>