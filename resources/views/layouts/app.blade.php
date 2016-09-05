<!DOCTYPE html>
<html>

    @include('partials.header')

    <body class="skin-{{ env('MAIN_COLOR') }} sidebar-{{ env('LAYOUT') }}">
        <div class="wrapper">

            @include('partials.main_header')

            @include('partials.sidebar')

            <div class="content-wrapper">

                @include('partials.page_heading')

                <section class="content">
                    @yield('main-content')
                </section>
            </div>

            @include('partials.control_sidebar')

            @include('partials.footer')

        </div>

        @include('partials.scripts')
    </body>
</html>