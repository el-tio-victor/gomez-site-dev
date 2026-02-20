<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Gomez-Site | @yield('title','')</title>
        @yield('css')
        
    </head>
    <body>
        <div class='preloader'>
            @include('site.partials._preloader')
        </div>
        <div class='contain-page'>
        @section('header')
        @show

        <main>
            @section('content')
            @show
        </main>
        

        @section('footer')
        @show
        </div>
    </body>

    @yield('js')  
</html>
