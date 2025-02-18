<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>J-Tools</title>

    <!-- Bootstrap and Animation -->
    <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.4.0/animate.min.css'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css'>


    <!-- Style -->
    <link rel="stylesheet" href="/css/app.css">


    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app vh-100">
        @if (Auth::check())
            @include('components/navbar')
        @endif

        <main class="pt-4 h-100 gradient-custom-2">
            @yield('content')
            <footer class="footer">
                <div class="container">
                    <div class="m-0 text-center">J-Tools | © 2025 All rights reserved. | Designed & Developed by <a href="https://iqbaald.github.io/portfolio-web/" class="text-decoration-none text-white fw-semibold">Iqbaal Dhoifulloh</a></div>
                </div>
            </footer>
        </main>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
    <script  src="/js/app.js"></script>
    <script src="https://unpkg.com/scrollreveal/dist/scrollreveal.min.js"></script>
    <script>
        function submitForm(radio) {
            radio.form.submit();
        }
    </script>
</body>
</html>
