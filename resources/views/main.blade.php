<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>
    @yield('head')

    <body>
        @include('partials._nav')

        <div class="container">

            @yield('content')

            @include('partials._footer')

        </div>
        <!-- end of .container -->
        @include('partials._javascript')
        @yield('javascript')

    </body>
</html>