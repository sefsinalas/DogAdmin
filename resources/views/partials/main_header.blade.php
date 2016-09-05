<!-- Main Header -->
<header class="main-header">

    <!-- Logo -->
    <a href="{{ url('/home') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini">{{ env('MINI_TITLE') }}</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg">{{ env('TITLE') }}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <li class="tasks-menu">
                    <a href="{{ url('/logout') }}" title="Cerrar sesión de {{ Auth::user()->name }}">
                        <i class="fa fa-sign-out"></i>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</header>