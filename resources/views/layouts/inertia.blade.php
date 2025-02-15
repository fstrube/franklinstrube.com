<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" prefix="og: https://ogp.me/ns#">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="/favicon.ico">

        @routes
        @inertiaHead
        @vite(['resources/css/markdown-to-pdf.css'])
    </head>
    <body>
        @inertia
        @vite(['resources/js/markdown-to-pdf.js'])
    </body>
</html>
