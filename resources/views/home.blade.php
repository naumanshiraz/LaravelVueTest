<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        @if (Auth::check())
            <script>
                window.Laravel = {!!json_encode([
                'isLoggedin' => true,
                'user' => Auth::user()
            ])!!}
            </script>
        @else
            <script>
                window.Laravel = {!!json_encode([
                'isLoggedin' => false
            ])!!}
            </script>
        @endif

        <div id="app"></div>

        <footer class="flex justify-center bg-gray-800 p-5 mt-5">
            <p class="text-white">&copy; all rights reserved</p>
        </footer>
    </body>
    <script src="{{ asset('js/app.js') }}"></script>
</html>
