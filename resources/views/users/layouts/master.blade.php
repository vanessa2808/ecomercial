<!DOCTYPE html>
<html lang="zxx">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tasty Food</title>
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="user_layouts/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="user_layouts/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="user_layouts/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="user_layouts/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="user_layouts/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="user_layouts/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="user_layouts/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="user_layouts/css/style.css" type="text/css">
    <link rel="stylesheet" href="css/category.css" type="text/css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>
<body>

<section class="categories">
    <div class="container">
        @include('users.layouts.header')
        @yield('content')
        @include('users.layouts.footer')
    </div>
</section>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="js/ajax_logout.js"></script>
<script src="user_layouts/js/jquery-3.3.1.min.js"></script>
<script src="user_layouts/js/bootstrap.min.js"></script>
<script src="user_layouts/js/jquery.nice-select.min.js"></script>
<script src="user_layouts/js/jquery-ui.min.js"></script>
<script src="user_layouts/js/jquery.slicknav.js"></script>
<script src="user_layouts/js/mixitup.min.js"></script>
<script src="user_layouts/js/owl.carousel.min.js"></script>
<script src="user_layouts/js/main.js"></script>
<script src="js/addToCart.js"></script>
</body>
</html>
