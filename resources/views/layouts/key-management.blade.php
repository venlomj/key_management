<!DOCTYPE html>
<html lang="{{ config('app.locale', 'en') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-layout.favicons/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <meta name="description" content="{{ $description ?? 'Welkome op de pagina van Sleutelbeheer' }}">
    <title>{{ $title ?? 'Sleutelbeheer' }}</title>
</head>
<body class="font-sans antialiased">
<div x-data="{ open: true }" class="flex min-h-screen text-gray-800 bg-gray-100">
    <aside :class="open ? 'w-64' : 'w-16'" class="bg-blue-900 shadow-md p-4 transition-all duration-300">
        <button @click="open = !open" class="mb-4 text-white focus:outline-none">
            <i :class="open ? 'fas fa-chevron-left' : 'fas fa-chevron-right'"></i>
        </button>
        <x-layout.nav />
    </aside>

    <div class="flex-1 flex flex-col">
        <header class="shadow bg-white/70 sticky top-0 backdrop-blur-sm z-10 mb-4 flex justify-between items-center p-4">
            <div class="flex-grow">
                <!-- You can add a title or logo here if needed -->
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="text-gray-700 hover:text-blue-500">Aanmelden</a>
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button @click="dropdownOpen = !dropdownOpen" class="focus:outline-none">
                        <i class="fas fa-user-circle text-gray-700 hover:text-blue-500 fa-lg"></i>
                    </button>
                    <div x-show="dropdownOpen" @click.outside="dropdownOpen = false" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md" style="display: none;">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</a>
                    </div>
                </div>
            </div>
        </header>

        <main class="flex-1 p-4">
            {{-- Title in Main Content --}}
            <h1 class="text-xl">{{ $subtitle ?? $title ?? "This page has no (sub)title" }}</h1>
            {{-- Main content --}}
            {{ $slot }}
        </main>

        <x-layout.footer />
        @stack('script')
        @livewireScripts
    </div>
</div>
</body>
</html>
