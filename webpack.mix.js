const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js/app.js')
    .js('resources/assets/js/favorite_product.js', 'public/js/favorite_product.js')
    .sass('resources/sass/app.scss', 'public/css/app.css');
