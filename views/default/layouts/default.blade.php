<!DOCTYPE html>
<html>
<head>
    
    @include('default.partials.head')

</head>
<body>

    @include('default.components.navbar')

        @yield('content')

    @include('default.partials.footer')

</body>
</html>