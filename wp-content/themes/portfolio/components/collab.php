<div class="collab">
    <h3>
        <?= get_field('collab-title', 'option'); ?>
    </h3>
    <p><?= get_field('collab-text', 'option'); ?></p>
    <div class="collab__cta cta_group">
        <a class="cta_group__primary_btn" href="<?= get_field('collab-link1', 'option'); ?>">Me contacter</a>
        <a class="cta_group__secondary_btn" href="<?= get_field('collab-link2', 'option'); ?>">Mes projets</a>
    </div>
</div>