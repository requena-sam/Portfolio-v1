<footer role="contentinfo" tabindex="0" class="footer" id="footer">
    <h2 role="heading" aria-level="2" class="hidden">Footer</h2>
    <div class="footer__upper">
        <div data-animation="showUp" class="footer__upper__social">
            <h3 role="heading" aria-level="3">Me suivre</h3>
            <ul role="list" id="social">
                <?php if (have_rows('follow-list', 'option')) :
                    while (have_rows('follow-list', 'option')) : the_row();
                        $image = get_sub_field('follow-image');
                        $link = get_sub_field('follow-link');
                        ?>
                        <li itemscope itemtype="http://schema.org/SiteNavigationElement">
                            <a href="<?= $link; ?>" tabindex="0" title="Vers la page du réseau" itemprop="url">
                                <img class="social_logo" src="<?= $image; ?>" alt="">
                            </a>
                        </li>
                    <?php endwhile;
                endif; ?>
            </ul>
        </div>
        <div data-animation="showUp" class="footer__upper__container">
            <div class="footer__upper__container__contact">
                <h3 role="heading" aria-level="3">Contact</h3>
                <ul role="list">
                    <li>
                        <a title="Envoyer un mail à Sam Requena" href="mailto:samrequena1510@gmail.com">Email</a>
                    </li>
                    <li>
                        <a title="Téléphoner à Sam Requena" href="tel:+32472860218">Téléphone</a>
                    </li>
                </ul>
            </div>
            <div class="footer__upper__container__navigation">
                <h3 role="heading" aria-level="3">Navigation</h3>
                <ul role="list">
                    <?php if (have_rows('footer-nav-list', 'option')) :
                        while (have_rows('footer-nav-list', 'option')) : the_row();
                            $title = get_sub_field('title');
                            $link = get_sub_field('link');
                            ?>
                            <li itemscope itemtype="http://schema.org/SiteNavigationElement">
                                <a href="<?= $link; ?>" tabindex="0" title="Vers la page" itemprop="url">
                                    <?= $title; ?>
                                </a>
                            </li>
                        <?php endwhile;
                    endif; ?>
                </ul>
            </div>
            <div class="footer__upper__container__usefull">
                <h3 role="heading" aria-level="3">Liens utiles</h3>
                <ul role="list">
                    <?php if (have_rows('footer-usefull-list', 'option')) :
                        while (have_rows('footer-usefull-list', 'option')) : the_row();
                            $title = get_sub_field('usefull-name');
                            $link = get_sub_field('usefull-link');
                            ?>
                            <li itemscope itemtype="http://schema.org/SiteNavigationElement">
                                <a href="<?= $link; ?>" tabindex="0" title="Vers la page" itemprop="url">
                                    <?= $title; ?>
                                </a>
                            </li>
                        <?php endwhile;
                    endif; ?>
                </ul>
            </div>
        </div>
    </div>
    <hr data-animation="showUp"><!--Barre de séparation-->
    <div data-animation="showUp" class="footer__bottom">
        <p>© 2024 Sam Requena. Tous droits réservés.</p>
        <a href="<?= get_field('footer-confi-link', 'options'); ?>" title="Vers la page de confidentialité">Politique de
            confidentialités</a>
    </div>
</footer>
<script type="module" src="<?= dw_asset('js/site.js') ?>" defer></script>
</body>
</html>