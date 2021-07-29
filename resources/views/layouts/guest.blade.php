<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config("app.name", "Feria d'Art") }}</title>
    <!-- FAVICON AND WEBMANIFEST MADE IN http://favicon.io -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <!-- FONTS -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- STYLES -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- CAROUSEL -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.2.0/css/glide.theme.css">
</head>

<body class="font-sans min-h-screen antialiased">
    <!-- FRONTPAGE HEADER MENU -->
    <x-header />
    <!-- FRONTPAGE SECTION CONTENT -->
    <main class="relative flex items-top justify-center text-gray-900 bg-white sm:items-center py-4 sm:pt-0">
        {{ $slot }}
    </main>
    <!-- FOOTER -->
    <x-footer />
    <!-- SCRIPTS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- LANGUAGE BUTTON DROPDOWN JAVASCRIPT -->
    <script>
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("invisible");
        }
        window.onclick = function(event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdown = document.getElementById("myDropdown");
                if (!dropdown.classList.contains("invisible")) {
                    dropdown.classList.toggle("invisible");
                }
            }
        }
        function myResponsiveFunction() {
            document.getElementById("myResponsiveDropdown").classList.toggle("invisible");
        }
        window.onclick = function(event) {
            if (!event.target.matches('.responsivedropbtn')) {
                var responsiveDropdown = document.getElementById("myResponsiveDropdown");
                if (!responsiveDropdown.classList.contains("invisible")) {
                    responsiveDropdown.classList.toggle("invisible");
                }
            }
        }
    </script>
</body>

</html>