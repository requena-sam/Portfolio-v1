<section class="skills">
    <h2 class="skills__title second_title"><?= get_field('skill-title') ?></h2>
    <div class="skills__container">
        <?php if (have_rows('skill-list')) :
            while (have_rows('skill-list')) : the_row();
                $text = get_sub_field('text');
                $image = get_sub_field('image');
                ?>
                <img src="<?= $image; ?>" alt="logo de <?= $text; ?>">
            <?php endwhile;
        endif; ?>
    </div>

</section>
