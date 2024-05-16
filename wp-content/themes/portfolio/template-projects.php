<?php /* Template Name: Projects page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
            <h2 role="heading" aria-level="2">Mes projets</h2>
            <?php if (have_rows('project-list')) :
                while (have_rows('project-list')) : the_row();
                    $title = get_sub_field('title');
                    $category = get_sub_field('category');
                    $text = get_sub_field('introduction');
                    $image = get_sub_field('image');
                    $link = get_sub_field('link');
                    ?>
                    <a href="<?= $link ;?>">
                        <article class="project" itemscope itemtype="http://schema.org/CreativeWork" tabindex="0">
                            <div class="project__content">
                                <h3 role="heading" aria-level="3" itemprop="name"><?= $title; ?></h3>
                                <p itemprop="description"><?= $text; ?></p>
                                <span itemprop="genre"><?= $category; ?></span>
                            </div>
                            <img src="<?= $image; ?>" itemprop="image"
                                 alt="Image representative du projet" width="300px">
                        </article>
                    </a>
                <?php endwhile;
            endif;
            ?>
    </main>
<?php endwhile; endif; ?>
<?= get_footer(); ?>