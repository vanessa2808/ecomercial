const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js/app.js')
    .copy('resources/js/favorites/favorite_product.js', 'public/js/favorite_product.js')
    .copy('resources/js/carts/cart.js', 'public/js/cart.js')
    .js('resources/js/users/ajax_logout.js', 'public/js/ajax_logout.js')
    .copy('resources/js/products/status_button.js', 'public/js/status_button.js')
    .copy('resources/js/notifications/notifications.js', 'public/js/notification.js')
    .copy('resources/js/chart/order_chart.js', 'public/js/order_chart.js')
    .copy('resources/js/chart/chart_day.js', 'public/js/chart_day.js')
    .copy('resources/js/chart/chart_week.js', 'public/js/chart_week.js')
    .copy('resources/js/chart/chart_quarter.js', 'public/js/chart_quarter.js')
    .copy('resources/js/chart/chart_month.js', 'public/js/chart_month.js')
    .sass('resources/sass/app.scss', 'public/css/app.css')
    .sass('resources/sass/category.scss', 'public/css/category.css')
    .copy('node_modules/chart.js/dist/Chart.js', 'public/js');
