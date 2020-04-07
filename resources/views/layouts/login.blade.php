<!DOCTYPE html>
<html lang="en">
    <!-- BEGIN HEAD -->
    <head>
        @include('partials.metadata')
    </head>

    <body class=" login">
        <div class="menu-toggler sidebar-toggler"></div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGO -->
        <div class="logo">
            
                <img src="assets/pages/img/logo-big.png" alt="" />
         
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            
            @yield('content')
            
        </div>
       @include('partials.js_lib')
    </body>
</html>