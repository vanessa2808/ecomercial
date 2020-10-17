const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js/app.js')
    .copy('resources/js/favorites/favorite_product.js', 'public/js/favorite_product.js')
    .copy('resources/js/carts/cart.js', 'public/js/cart.js')
    .js('resources/js/users/ajax_logout.js', 'public/js/ajax_logout.js')
    .copy('resources/js/products/status_button.js', 'public/js/status_button.js')
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .sass('resources/sass/category.scss', 'public/css/category.css');
