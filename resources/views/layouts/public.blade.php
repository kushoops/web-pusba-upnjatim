<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <style>
            .ql-size-small {
                font-size: 0.875rem; /* 14px */
                line-height: 1.25rem; /* 20px */
            }
            .ql-size-large {
                font-size: 1.125rem; /* 18px */
                line-height: 1.75rem; /* 28px */
            }
            .ql-size-huge {
                font-size: 1.25rem; /* 20px */
                line-height: 1.75rem; /* 28px */
            }
            .ql-indent-1  {text-indent: 3rem;}
            .ql-indent-2  {text-indent: 6rem;}
            .ql-indent-3  {text-indent: 9rem;}
            .ql-indent-4  {text-indent: 12rem;}
            .ql-indent-5  {text-indent: 15rem;}
            .ql-indent-6  {text-indent: 18rem;}
            .ql-indent-7  {text-indent: 21rem;}
            .ql-indent-8  {text-indent: 24rem;}
            .ql-indent-9  {text-indent: 27rem;}
            .ql-indent-10 {text-indent: 30rem;}
            .ql-indent-11 {text-indent: 33rem;}
            .ql-indent-12 {text-indent: 36rem;}
            .ql-direction-rtl {direction: rtl;}
            .ql-align-center {text-align: center}
            .ql-align-right {text-align: right}
            .ql-align-justify {text-align: justify}
            .a {color: skyblue; text-decoration: underline}
        </style>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen">
            <livewire:layout.navbar-public />

            <main class="mt-[76px]">
                {{ $slot }}
            </main>

            {{-- Footer --}}
            <livewire:layout.footer />
        </div>
    </body>
</html>
