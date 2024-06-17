/*----- Webpack compiler ------ */
const mix = require('laravel-mix');

/* SCSS */
mix.sass('wp-content/themes/portfolio/ressources/sass/site.scss',
    'wp-content/themes/portfolio/public/css').options({
    processCssUrls: false,
});

/* JS */
mix.js('wp-content/themes/portfolio/ressources/js/site.js',
    'wp-content/themes/portfolio/public/js');
/* Images */
mix.copyDirectory('wp-content/themes/portfolio/ressources/img',
    'wp-content/themes/portfolio/public/img');
/* Fonts */
mix.copyDirectory('wp-content/themes/portfolio/ressources/font',
    'wp-content/themes/portfolio/public/font');
/* Favicon */
mix.copyDirectory('wp-content/themes/portfolio/ressources/favicon', 'wp-content/themes/portfolio/public/favicon');
