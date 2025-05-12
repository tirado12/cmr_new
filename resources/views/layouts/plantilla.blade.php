<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <link rel="shortcut icon" href="{{asset('image/logo.ico')}}" type="">
        

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://kit.fontawesome.com/ba89c01799.js" crossorigin="anonymous"></script>
        
    </head>
    
    <body class="bg-gray-100">
             
        <div class="flex-1 flex flex-col overflow-hidden">
                <header class="justify-between bg-white  border-indigo-600">
                    
                    @include('componentes.navbar')
                    
                </header>
                {{-- main --}}
                <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 ">
                    <div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 py-8">
                        {{-- contenido --}}
                        @yield('contenido')
                        
                    </div>
                </main>
            </div>     
       
    </body>
</html>