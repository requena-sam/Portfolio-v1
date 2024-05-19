<?php /* Template Name: Projects page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <h2 role="heading" aria-level="2" class="all_projects_title main_title">Mes projets</h2>
        <section class="projects">
            <h3 class="hidden" role="heading" aria-level="3">Liste de mes projets</h3>
            <?php if (have_rows('project-list')) :
                while (have_rows('project-list')) : the_row();
                    $title = get_sub_field('title');
                    $category = get_sub_field('category');
                    $text = get_sub_field('introduction');
                    $image = get_sub_field('image');
                    $link = get_sub_field('link');
                    ?>
                    <a class="hover_card" href="<?= $link; ?>">
                        <article class="projects__card" itemscope itemtype="http://schema.org/CreativeWork"
                                 tabindex="0">
                            <div class="projects__card__content">
                                <h3 role="heading" aria-level="3" itemprop="name"><?= $title; ?></h3>
                                <span itemprop="genre" class="projects__card__content__category_web"><?= $category; ?></span>
                                <p itemprop="description"><?= $text; ?></p>
                            </div>
                            <div class="projects__card__img">
                                <img src="<?= $image; ?>" itemprop="image"
                                     alt="Image representative du projet" width="300px">
                            </div>
                        </article>
                    </a>
                <?php endwhile;
            endif;
            ?>
            <p class="projects__end">Vous êtes arrivé au bout</p>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>