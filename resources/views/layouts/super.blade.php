<!DOCTYPE html>
<html>
    <head>  
        <title>Sistem Ujian - @yield('title')</title>
        @include('partials.dashHead')
    </head>

    <body>
        <div class="wrapper">
            @include('partials.dashNavbar')
            
            
            @include('partials.superadmin.dashSidebar')
            

            <div class="content-wrapper">
                <!-- This Line is For Breadcrumb -->
                <!-- Main content -->
                <section class="content">
                    @yield('content')
                </section>
                <!-- End of Main content -->
            </div>
            @include('partials.dashFooter')
        </div>
    </body>
</html>

