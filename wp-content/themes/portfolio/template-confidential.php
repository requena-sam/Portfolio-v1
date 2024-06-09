<?php /* Template Name: Confidential page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <main>
        <h2 role="heading" aria-level="2" class="main_title">Politique de confidentialité</h2>
        <section class="confidential">
            <p class="confidential__update">Dernières mise à jour le : <span><?= get_field('confi-date'); ?></span></p>
            <p>Nous accordons une importance capitale à la protection de vos données personnelles. Notre engagement se
                traduit par un traitement confidentiel de ces données et une utilisation strictement limitée au cadre
                initial de leur collecte. Il est à noter que vos données sont susceptibles d'être enregistrées dans nos
                bases de données et ne seront, en aucun cas, divulguées à des tiers sans votre consentement explicite.
                De plus, vous conservez en tout temps le droit de solliciter l'accès à vos données, leur rectification
                ou leur suppression.</p>
            <article class="confidential__card">
                <h3 role="heading" aria-level="3">Identité</h3>
                <p>Requena Sam<br> 4860, Pepinster <br>Belgique</p>
            </article>
            <article class="confidential__card">
                <h3 role="heading" aria-level="3">Contact</h3>
                <p>Vous pouvez nous contacter aux coordonnées suivantes :<br> Téléphone : +32 (0)472 86 02 18 <br>Email
                    : <a href="mailto:samrequena15@gmail.com">samrequena15@gmail.com</a></p>
            </article>
            <article class="confidential__card">
                <h3 role="heading" aria-level="3">Hébergement</h3>
                <p>INFOMANIAK<br> Sise au 26 Avenue de la Praille,<br> 1227 Genève,<br> Suisse.<br> Pour de plus amples
                    informations, veuillez consulter le site web d'Infomaniak via le lien suivant : <a
                            href="https://www.infomaniak.com/fr">https://www.infomaniak.com/fr</a></p>
            </article>
            <?php if (have_rows('confi-list')) :
                while (have_rows('confi-list')) :the_row();
                    $title = get_sub_field('confi-title');
                    $text = get_sub_field('confi-text');
                    ?>
                    <article class="confidential__card">
                        <h3 role="heading" aria-level="3"><?= $title; ?></h3>
                        <p><?= $text; ?></p>
                    </article>
                <?php endwhile;
            endif; ?>
        </section>
    </main>
<?php endwhile; endif; ?>
<?php get_footer(); ?><?php
