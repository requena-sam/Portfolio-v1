<nav id="navigation" class="navigation" role="navigation" itemscope>
    <h2 class="hidden" role="heading" aria-level="2">Navigation principale</h2>
    <input type="checkbox" class="input menu-btn mid_hidden" id="menu-btn">
    <label class="menu-icon mid_hidden" for="menu-btn">
        <span class="navicon" aria-label="Hamburger menu 'icon'"></span>
    </label>
    <div class="navigation__container">
        <ul role="menu" class="navigation__container__menu" tabindex="0">
            <h3 role="heading" class="hidden" aria-level="3">Navigation principale</h3>
            <?php if (have_rows('nav-list', 'option')) :
                while (have_rows('nav-list', 'option')) : the_row();
                    $text = get_sub_field('title');
                    $link = get_sub_field('link');
                    ?>
                    <li itemscope itemtype="http://schema.org/SiteNavigationElement">
                        <a href="<?= $link; ?>" tabindex="0" title="Vers la page <?= $text; ?>" itemprop="url" class="<?=dw_is_active($link);?>">
                            <span itemprop="name"><?= $text; ?></span>
                        </a>
                    </li>
                <?php endwhile;
            endif; ?>
        </ul>
    </div>
</nav>