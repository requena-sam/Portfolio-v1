<section class="reviews">
    <h2 role="heading" class="review__title">Retours clients</h2>
    <div class="reviews__slider">
        <div class="reviews__slider__container">
            <?php if (have_rows('review-list')) :
                while (have_rows('review-list')) : the_row();
                    ?>
                    <article class="reviews__slider__container__article">
                        <p>"<?= get_sub_field('review-text'); ?>"</p>
                        <p class="reviews__slider__container__article__name"><?= get_sub_field('review-name'); ?></p>
                    </article>
                <?php endwhile;
            endif; ?>
        </div>
    </div>
    <div class="reviews__cta cta_group">
        <a class="cta_group__primary_btn" href="<?= get_field('review-about-link'); ?>">A propos de moi</a>
        <a class="cta_group__secondary_btn" href="<?= get_field('recent-projects-link'); ?>">Mes travaux</a>
    </div>
</section>