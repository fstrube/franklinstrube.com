<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>
            @yield('title') &laquo; Admin &laquo; #!/bin/strube
        </title>

        <link rel="icon" href="/favicon.ico">

        <!-- Fonts -->
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,700|Yanone+Kaffeesatz:400,700,300" type="text/css" />

        <!-- Styles / Scripts -->
        @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    </head>
    <body class="@yield('body.class')">
        <main>
            @yield('main')
        </main>
    </body>
</html>
