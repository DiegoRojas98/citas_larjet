<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @livewireStyles
    @vite(['resources/sass/app.scss','resources/js/app.js'])
    
    @yield('stylesAdd')
    
    
</head>
<body>
    @yield('body')

    <script
        src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous">
    </script>

    {{-- @vite(['resources/js/jquery-3.6.1.js']) // No esta funcionado la llamada --}}

    @yield('jscripts')
</body>
</html>