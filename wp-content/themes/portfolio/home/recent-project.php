<section data-animation="showUp" class="recent">
    <h2 class="recent__title second_title" role="heading" aria-level="2">Projets récents</h2>
    <div  class="recent__container" itemscope itemtype="https://schema.org/CreativeWork">
        <?php if (have_rows('recent-list')) :
            while (have_rows('recent-list')) : the_row();
                $title = get_sub_field('recent-title');
                $image = get_sub_field('recent-image');
                $link = get_sub_field('recent-link');
                $alt = get_sub_field('recent-image-alt');
                ?>
                <div class="recent__container__card">
                    <a href="<?= $link; ?>" title="Ouvre le projet">
                        <img src="<?= $image; ?>" alt="<?= $alt; ?>" width="30%">
                    </a>
                    <a href="<?= $link; ?>" title="Ouvre le projet">
                        <h3 aria-level="3" role="heading" itemprop="name"><?= $title; ?></h3>
                    </a>
                </div>
            <?php endwhile;
        endif;
        ?>
    </div>
    <div class="recent__cta cta_group">
        <a class="cta_group__primary_btn" href="<?= get_field('recent-projects-link'); ?>"
           title="Lien vers la page de mes projets">Mes projets</a>
        <a class="cta_group__secondary_btn" href="<?= get_field('recent-about-link'); ?>"
           title="Lien vers la page à propos de moi">À propos de moi</a>
    </div>

</section>