<!DOCTYPE html>
<html lang="en">

    <head>
    <meta charset="utf-8">
    <title>Ujian Nasional CBT - JILC</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="JILC">
    <meta name="author" content="ewakooLabs">

    <!-- Main Style CSS - Include with every page -->
    {{ HTML::style('assets/css/bootstrap.css') }}
    {{ HTML::style('assets/font-awesome/css/font-awesome.css') }}
    {{ HTML::style('assets/lineicons/style.css') }}

    <!-- Main Style CSS - Include with every page -->
    {{ HTML::style('assets/css/style.css') }}
    {{ HTML::style('assets/css/style-responsive.css') }}


    <!-- Core Scripts - Include with every page -->
    {{ HTML::script('assets/js/jquery-1.8.3.min.js') }}
    {{ HTML::script('assets/js/bootstrap.min.js') }}

    {{ HTML::style('assets/ico/favicon', array('rel' => 'icon')) }}


    </head>

    <body>

        <div id="login-page">
            
            <div class="container">
                
                @yield('content')

            </div>

        </div>

    </body>

</html>