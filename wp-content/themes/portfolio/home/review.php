<section data-animation="showUp" class="reviews">
    <h2 role="heading" aria-level="2" class="reviews__title second_title">Retours clients</h2>
    <div class="reviews__slider">
        <div data-animation="showUp" class="reviews__slider__container" itemscope itemtype="https://schema.org/Review">
            <?php if (have_rows('review-list')) :
                $index = 0;
                while (have_rows('review-list')) : the_row();
                    ?>
                    <article  class="reviews__slider__container__article">
                        <h3 role="heading" aria-level="3" class="hidden" itemprop="name">Retour client</h3>
                        <p itemprop="about">"<?= get_sub_field('review-text'); ?>"</p>
                        <p itemprop="author" class="reviews__slider__container__article__name"><?= get_sub_field('review-name'); ?></p>
                    </article>
                <?php
                    $index++;
                endwhile;
            endif; ?>
        </div>
        <div data-animation="showUp" class="slider-bullets">
            <?php for ($i = 0; $i < $index; $i++) : ?>
                <div class="bullet" data-index="<?= $i ?>"></div>
            <?php endfor; ?>
        </div>
    </div>
    <div data-animation="showUp" class="reviews__cta cta_group">
        <a class="cta_group__primary_btn" href="<?= get_field('review-about-link'); ?>" title="Lien vers la page à propos de moi">A propos de moi</a>
        <a class="cta_group__secondary_btn" href="<?= get_field('recent-projects-link'); ?>" title="Lien vers la page des mes projets">Mes travaux</a>
    </div>
</section>