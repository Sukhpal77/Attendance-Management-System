<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Attendance') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            
            <div id="content">
            @include('layouts.navigation')
            </div>

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                    <button id="button1">Load Demo</button>
                    <button id="button2">Load File 2</button>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
   <script>
            document.getElementById('button1').addEventListener('click', function() {
            loadContent('/demo', 'content');
        });

        document.getElementById('button2').addEventListener('click', function() {
            loadContent('file2.php', 'content');
        });

        function loadContent(file, targetElementId) {
            // Clear the content div before loading new content
            document.getElementById(targetElementId).innerHTML = '';

            var xhr = new XMLHttpRequest();
            xhr.open('GET', file, true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    document.getElementById(targetElementId).innerHTML = xhr.responseText;
                }
            };
            xhr.send();
        }
   </script>

    </body>
</html>
