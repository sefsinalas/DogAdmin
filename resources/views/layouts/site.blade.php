<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>@yield('page_title', 'Home') - Laravel AdminTheme</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <link href="{{ elixir('css/vendor.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ elixir('css/welcome.css') }}" rel="stylesheet" type="text/css">

        @yield('styles')

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <div class="site-wrapper">
            <div class="site-wrapper-inner">
                <div class="cover-container">
                    @yield('main-content')
                </div>
            </div>
        </div>
        @include('partials.scripts')
    </body>
</html>
