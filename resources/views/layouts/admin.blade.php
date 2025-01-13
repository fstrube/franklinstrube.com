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
        @include('partials.fonts')

        <!-- Styles / Scripts -->
        @vite(['resources/css/admin.css', 'resources/js/admin.js'])
    </head>
    <body class="@yield('body.class')">
        <aside>
            @yield('sidebar')
        </aside>
        <main>
            @yield('main')
        </main>
        <div class="notifications">
            @if (session()->has('notification'))
            <div class="notification" data-type="{{ session('notification.type', 'notice') }}" data-dismiss="{{ session('notification.dismiss', 1500) }}">{{ session('notification.message') }}</div>
            @endif
            @if(session()->has('errors'))
            @foreach(session('errors')->all() as $error)
            <div class="notification" data-type="error">{{ $error }}</div>
            @endforeach
            @endif
        </div>
    </body>
</html>
