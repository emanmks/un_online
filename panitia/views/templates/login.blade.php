<!DOCTYPE html>
<html class="bg-black">

<head>

    <title>iSILK | Login</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Sistem Informasi Laboratorium Kesehatan">
    <meta name="author" content="Unggul Visi Utama">

    <!-- Core CSS - Include with every page -->
    {{ HTML::style('assets/css/bootstrap.min.css') }}
    {{ HTML::style('assets/css/font-awesome.min.css') }}

    <!-- Admin LTE CSS - Include with every page -->
    {{ HTML::style('assets/css/AdminLTE.css') }}

</head>

<body class="bg-black">

    @yield('content')

    <!-- Core Scripts - Include with every page -->
    {{ HTML::script('assets/js/jquery-2.1.0.min.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}

</body>

</html>
