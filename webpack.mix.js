/*----- Webpack compiler ------ */
const mix = require('laravel-mix');

/* SCSS */
mix.sass('wp-content/themes/portfolio/ressources/sass/site.scss', 'wp-content/themes/portfolio/public/css');


/* JS */
mix.js('wp-content/themes/portfolio/ressources/js/site.js',
    'wp-content/themes/portfolio/public/js');
