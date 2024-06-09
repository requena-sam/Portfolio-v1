<div class="collab">
    <h3 class="collab__title" role="heading" aria-level="3">
        <?= get_field('collab-title', 'option'); ?>
    </h3>
    <p class="collab__text"><?= get_field('collab-text', 'option'); ?></p>
    <div class="collab__cta cta_group">
        <a class="cta_group__primary_btn" href="<?= get_field('collab-link1', 'option'); ?>" title="Lien vers la page de contact">Me contacter</a>
        <a class="cta_group__secondary_btn" href="<?= get_field('collab-link2', 'option'); ?>" title="Lien vers la page des projets">Mes projets</a>
    </div>
</div>