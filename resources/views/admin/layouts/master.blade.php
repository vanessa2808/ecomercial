<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Management</title>
    <base href="{{asset('')}}">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="admin_layouts/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="admin_layouts/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="admin_layouts/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="css/category.css">
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
</body>
</html>
