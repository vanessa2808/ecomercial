<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Management</title>
    <base href="{{asset('')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="admin_layouts/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="admin_layouts/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="admin_layouts/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/category.css">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    <div class="content-wrapper">
        <div class="content-header">
            <div class="container-fluid">
                @include('admin.layouts.sidebar')
                @yield('content')
                @include('admin.layouts.header')
                @include('admin.layouts.footer')
            </div>
        </div>
    </div>
</div>

<script src="{{ mix('/js/status_button.js') }}"></script>
<script src="{{ asset('js/Chart.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script src="{{ mix('js/order_chart.js') }}"></script>
<script src="admin_layouts/plugins/jquery/jquery.min.js"></script>
<script src="admin_layouts/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="admin_layouts/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="admin_layouts/dist/js/adminlte.js"></script>
<script src="admin_layouts/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="admin_layouts/plugins/raphael/raphael.min.js"></script>
<script src="admin_layouts/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="admin_layouts/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="admin_layouts/plugins/chart.js/Chart.min.js"></script>
<script src="admin_layouts/dist/js/demo.js"></script>
<script src="admin_layouts/dist/js/pages/dashboard2.js"></script>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="/js/pusher.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{ mix('/js/notification.js') }}"></script>
<script src="admin_layouts/plugins/chart.js/Chart.min.js"></script>
<script src="admin_layouts/dist/js/adminlte.js"></script>
<script src="admin_layouts/plugins/chart.js/Chart.min.js"></script>
<script src="admin_layouts/dist/js/demo.js"></script>
<script src="admin_layouts/dist/js/pages/dashboard3.js"></script>
@stack('js')
</body>
</html>
