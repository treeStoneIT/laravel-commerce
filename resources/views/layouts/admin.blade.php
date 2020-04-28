<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @livewireStyles
    <style>
        [x-cloak] { display: none; }
    </style>
</head>
<body class="bg-gray-100 h-screen antialiased leading-none">
<div class="h-screen flex overflow-hidden bg-gray-100"
     x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false">
    @include('admin.navigation')
    <div class="flex flex-col w-0 flex-1 overflow-hidden">
        <div class="md:hidden pl-1 pt-1 sm:pl-3 sm:pt-3">
            <button @click.stop="sidebarOpen = true" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none focus:bg-gray-200 transition ease-in-out duration-150" aria-label="Open sidebar">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <main class="flex-1 relative z-0 overflow-y-auto pt-2 pb-6 focus:outline-none md:py-6" tabindex="0"
              x-data="" x-init="$el.focus()">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8 my-3">
                <h1 class="text-2xl font-semibold text-gray-900">
                    @yield('page-title')
                </h1>
            </div>
            <div class="max-w-7xl mx-auto px-4 sm:px-6 md:px-8">
                <!-- Replace with your content -->
                <div class="py-4">
                    @yield('content')
                </div>
                <!-- /End replace -->
            </div>
            <p class="mt-8 text-center text-xs text-gray-700">
                <a href="https://bomshteyn.com" class="text-indigo-500 no-underline">
                    Bomshteyn Consulting
                </a>
                <span class="px-1">·</span> © 2020 Admin Panel
            </p>
        </main>
    </div>
</div>
<livewire:simple-notification>
@livewireScripts
@stack('scripts')
</body>
</html>
