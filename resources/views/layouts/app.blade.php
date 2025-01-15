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

        {{-- Quill --}}
        <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css" rel="stylesheet" />
    
    </head>
    <body class="font-sans antialiased" x-init="initFlowbite()">
        <div class="min-h-screen bg-gray-100">
            {{-- <livewire:layout.navigation /> --}}

            <!-- Page Heading -->
            {{-- @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif --}}

            <livewire:layout.navbar-admin />
            
            <aside id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700" aria-label="Sidebar">
                <div class="h-full px-3 pb-4 overflow-y-auto bg-white dark:bg-gray-800">
                    <ul class="space-y-2 font-medium">
                    <li>
                        <a href="{{ env('APP_URL').'/dashboard' }}" class="{{ !request()->routeIs('dashboard') ? 'text-gray-900' : ' bg-gray-100' }} flex items-center p-2 rounded-lg dark:text-gray-900 hover:bg-gray-100 dark:hover:bg-gray-700 group">
                            <svg class="w-5 h-5 text-gray-900 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                                <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z"/>
                                <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z"/>
                            </svg>
                            <span class="ms-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                            <svg class="w-5 h-5 text-gray-900 dark:text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm16 7H4v7h16v-7ZM5 8a1 1 0 0 1 1-1h.01a1 1 0 0 1 0 2H6a1 1 0 0 1-1-1Zm4-1a1 1 0 0 0 0 2h.01a1 1 0 0 0 0-2H9Zm2 1a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2H12a1 1 0 0 1-1-1Z" clip-rule="evenodd"/>
                            </svg>
                            <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Data Publik</span>
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <ul id="dropdown-example" class="{{ request()->routeIs(['data-publik.beranda.carousel', 'data-publik.beranda.layanan', 'data-publik.beranda.sambutan', 'data-publik.beranda.video', 'data-publik.beranda.catatan', 'data-publik.beranda.footer', 'data-publik.profil.sambutan', 'data-publik.profil.visi-misi', 'data-publik.profil.struktur-organisasi', 'data-publik.profil.pengajar', 'data-publik.profil.gallery', 'data-publik.layanan.ept', 'data-publik.layanan.bipa', 'data-publik.layanan.pelatihan-bahasa', 'data-publik.informasi.pendaftaran-ept', 'data-publik.informasi.jadwal-kelas', 'data-publik.informasi.jadwal-tes', 'data-publik.informasi.jenis', 'data-publik.informasi.jenis.aksi', 'data-publik.bipa.program', 'data-publik.bipa.pendaftaran', 'data-publik.bipa.placement-test', 'data-publik.faq']) ?: 'hidden' }} py-2 space-y-2">
                            <li>
                                <a href="{{ env('APP_URL').'/data-publik/beranda/carousel' }}" class="{{ !request()->routeIs(['data-publik.beranda.carousel', 'data-publik.beranda.layanan', 'data-publik.beranda.sambutan', 'data-publik.beranda.video', 'data-publik.beranda.catatan', 'data-publik.beranda.footer']) ? 'text-gray-900' : ' bg-gray-100' }} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-700">Beranda</a>
                            </li>
                            <li>
                                <a href="{{ env('APP_URL').'/data-publik/profil/sambutan' }}" class="{{ !request()->routeIs(['data-publik.profil.sambutan', 'data-publik.profil.visi-misi', 'data-publik.profil.struktur-organisasi', 'data-publik.profil.pengajar', 'data-publik.profil.gallery']) ? 'text-gray-900' : ' bg-gray-100' }} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-700">Profil</a>
                            </li>
                            <li>
                                <a href="{{ env('APP_URL').'/data-publik/layanan/ept' }}" class="{{ !request()->routeIs(['data-publik.layanan.ept', 'data-publik.layanan.bipa', 'data-publik.layanan.pelatihan-bahasa']) ? 'text-gray-900' : ' bg-gray-100' }} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-700">Layanan</a>
                            </li>
                            <li>
                                <a href="{{ env('APP_URL').'/data-publik/informasi/pendaftaran-ept' }}" class="{{ !request()->routeIs(['data-publik.informasi.pendaftaran-ept', 'data-publik.informasi.jadwal-kelas', 'data-publik.informasi.jadwal-tes', 'data-publik.informasi.jenis', 'data-publik.informasi.jenis.aksi']) ? 'text-gray-900' : ' bg-gray-100' }} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-700">Informasi</a>
                            </li>
                            <li>
                                <a href="{{ env('APP_URL').'/data-publik/bipa/program' }}" class="{{ !request()->routeIs(['data-publik.bipa.program', 'data-publik.bipa.pendaftaran', 'data-publik.bipa.placement-test']) ? 'text-gray-900' : ' bg-gray-100' }} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-700">BIPA</a>
                            </li>
                            <li>
                                <a href="{{ env('APP_URL').'/data-publik/faq' }}" class="{{ !request()->routeIs('data-publik.faq') ? 'text-gray-900' : ' bg-gray-100' }} flex items-center w-full p-2 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-gray-900 dark:hover:bg-gray-700">FAQ</a>
                            </li>
                        </ul>
                    </li>
                    </ul>
                </div>
            </aside>

            <!-- Page Content -->
            <main class="p-4 sm:ml-64">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
