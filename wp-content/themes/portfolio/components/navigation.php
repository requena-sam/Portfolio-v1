<nav id="navigation" class="navigation" role="navigation" aria-label="Menu de navigation principal" itemscope
     itemtype="http://schema.org/SiteNavigationElement" tabindex="0">
    <h2 class="hidden" role="navigation" aria-label="Menu de navigation principal">Navigation principale</h2>
    <input type="checkbox" class="input menu-btn mid_hidden" id="menu-btn">
    <label class="menu-icon mid_hidden" for="menu-btn">
        <span class="navicon" aria-label="Hamburger menu 'icon'"></span>
    </label>
    <div class="navigation__container">
        <ul role="menu" class="navigation__container__menu" tabindex="0">
            <?php if (have_rows('nav-list', 'option')) :
                while (have_rows('nav-list', 'option')) : the_row();
                    $text = get_sub_field('title');
                    $link = get_sub_field('link');
                    ?>
                    <li itemscope itemtype="http://schema.org/SiteNavigationElement">
                        <a href="<?= $link; ?>" tabindex="0" title="Vers la page <?= $text; ?>" itemprop="url">
                            <span itemprop="name"><?= $text; ?></span>
                        </a>
                    </li>
                <?php endwhile;
            endif; ?>
        </ul>
    </div>
</nav>