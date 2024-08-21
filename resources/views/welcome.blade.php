<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->

        @vite(['resources/js/app.js'])
    </head>
    <body class="bg-[#14111b] flex flex-col justify-center items-center">
        <div id="app">
            <test-component></test-component>
        </div>
        <div class="images">
            <img src="{{ asset('img/1.jpg') }}" alt="Image 1">
            <img src="{{ asset('img/2.jpg') }}" alt="Image 2">
        </div>
    </body>
</html>
