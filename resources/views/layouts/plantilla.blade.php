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

    {{--  Forma de llamar a jquery por CDN
    <script
        src="https://code.jquery.com/jquery-3.6.1.js"
        integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI="
        crossorigin="anonymous"> 
    </script>
    --}}
    {{-- Forma local el archivo debe estar en la carpeta public y por medio de la funcion
        asset() sera accedido   
     --}}
    <script src="{{ asset('jquery.js')}}"></script>

    {{-- @vite(['resources/js/jquery-3.6.1.js']) // No funciona Por medio de vite en resources--}}

    @yield('jscripts')
</body>
</html>
