<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @hasSection('title')
            <title>@yield('title') - {{ config('app.name') }}</title>
        @else
            <title>{{ config('app.name') }}</title>
        @endif
		
        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>

    <body>
        @yield('body')

        @include('rsg::modules.notification')

        <script>
            function showModal(id)
            {
                var event = new CustomEvent('show-modal', {
                    detail: {
                        'id': id
                    }
                });

                window.dispatchEvent(event);
            }
        </script>

        <script src="{{ mix('js/app.js') }}"></script>
        @livewireScripts
        @stack('scripts')
        {{-- @paddleJS --}}
    </body>
</html>
