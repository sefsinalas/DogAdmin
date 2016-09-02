<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->


        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
        	<li><a href="#"><i class="fa fa-circle-o text-green"></i> <span>{{ Auth::user()->name }}</span></a></li>
            <li class="header">MENU</li>
            @include('partials.sidebar_menu')
            <li class="header">ADMINISTRACIÓN</li>
            <li><a href="{{ url('/users') }}"><i class='fa fa-users'></i> <span>User Manager</span></a></li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
