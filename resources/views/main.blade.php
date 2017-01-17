<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials._head')
</head>
    @yield('head')

    <body>
        @include('partials._nav')


            @yield('content')

            @include('partials._footer')

        <!-- end of .container -->
        @include('partials._javascript')
        @yield('javascript')

    </body>
</html>