<!DOCTYPE html>
<html lang="fr-BE">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- Meta donnée du site -->
    <meta name="author" content="<?= get_bloginfo('name'); ?>">
    <meta name="title" content="Sam Requena">
    <meta name="keywords"
          content="Portfolio,Sam Requena, Front-end, Back-end, Fullstack, Développeur web, étudiant à l'HEPL, Développeur Wordpress">
    <meta name="description"
          content="Portfolio de Sam Requena, développeur web front-end à l’HEPL. Passioné et discipliné, je fais naitre et vivre vos idées qui vous semble être irréalisable !">

    <!-- Profil details -->
    <meta property="profile:first_name" content="Sam">
    <meta property="profile:last_name" content="Requena">
    <!-- Link css -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= dw_asset('css/site.css') ?>">
    <!-- Link js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/2.0.8/clipboard.min.js"></script>
    <!-- Meta details -->
    <link rel="apple-touch-icon" sizes="180x180" href="./public/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./public/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="./public/favicon/favicon-16x16.png">
    <link rel="manifest" href="./public/favicon/site.webmanifest">
    <link rel="mask-icon" href="./public/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!-- Title -->
    <title>
        Sam Requena - Développeur Web
    </title>
</head>
<body itemscope itemtype="https://schema.org/Person">
<noscript>
    <p class="no-js__message">
        Pour accéder à toutes les fonctionnalités de ce site, vous devez activer JavaScript.<br>
        Voici les <a href="https://www.enable-javascript.com/fr/" title="vers le site enable-javascript">instructions
            pour activer JavaScript dans votre navigateur Web</a>.
    </p>
</noscript>
<header role="banner">
    <h1 class="hidden" role="heading" aria-level="1">Portfolio - <span itemprop="name">Sam</span>
        <span itemprop="familyName">Requena</span> - <span itemprop="jobTitle">Developpeur Web</span></h1>
    <?php get_template_part('components/navigation'); ?>
</header>
