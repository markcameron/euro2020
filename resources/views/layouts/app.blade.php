<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles
        @laravelPWA
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        @if (request()->route()->getName() === 'matches')
            <livewire:navigation-tabs />
        @else
            <div class="flex flex-col h-screen justify-between">
                <header class="h-18 bg-euro-darkest">
                    @livewire('navigation-menu')
                </header>

                <main class="overflow-y-auto mb-auto flex-grow bg-gradient-to-b from-euro-darkest to-euro-light">
                    {{ $slot }}
                </main>
            </div>
        @endif

        @stack('modals')

        @livewireScripts
    </body>
</html>
