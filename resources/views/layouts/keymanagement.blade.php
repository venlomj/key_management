<!DOCTYPE html>
<html lang="{{ config('app.locale', 'en') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-layout.favicons />
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
        <x-layout.sidebar />
    </aside>
    <!-- /Sidebar -->

    <div class="flex h-full w-full flex-col md:w-full">
        <!-- Topbar -->
        <x-layout.topbar />

        <!-- Main -->
        <div class="h-full overflow-auto flex-1 w-full">
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
