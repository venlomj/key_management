<!DOCTYPE html>
<html lang="{{ config('app.locale', 'en') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Meta Description and Title -->
    <meta name="description" content="{{ $description ?? 'Welcome to Sleutelbeheer' }}">
    <title>{{ $title ?? 'Sleutelbeheer' }}</title>
</head>
<body class="font-sans antialiased">
<div class="flex h-screen bg-gray-100">
    <aside class="fixed z-50 md:relative">
        <!-- Sidebar -->
        <input type="checkbox" class="peer hidden" id="sidebar-open" />
        <label class="peer-checked:rounded-full peer-checked:p-2 peer-checked:right-6 peer-checked:bg-gray-600 peer-checked:text-white absolute top-5 z-20 mx-4 cursor-pointer md:hidden" for="sidebar-open">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </label>
        <x-layout.sidebar />
    </aside>
    <!-- /Sidebar -->

    <div class="flex h-full w-full flex-col">
        <!-- Topbar -->
        <x-layout.topbar />

        <!-- Main -->
        <div class="h-full overflow-auto">
            <main class="flex-1 p-4 overflow-hidden">
                <h1 class="text-3xl font-bold text-gray-800">{{ $pageTitle ?? "Deze pagina heeft geen (sub)title" }}</h1>
                <h2 class="text-lg text-gray-600 mt-2">{{ $pageSubtitle ?? "" }}</h2>
                {{ $slot }}
            </main>
        </div>
        <!-- /Main -->
        <x-layout.footer />
    </div>
</div>
@stack('script')
@livewireScripts
</body>
</html>
