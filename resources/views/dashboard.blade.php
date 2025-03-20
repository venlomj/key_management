<!DOCTYPE html>
<html lang="{{ config('app.locale', 'en') }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Meta Description and Title -->
     <link rel="stylesheet" href="https://sleutelbeheer.kogeka.app/build/assets/app.9d96761f.css"/>
    <script type="module" src="https://sleutelbeheer.kogeka.app/build/assets/app.ab93cf8a.js"></script>

</head>
<body class="font-sans antialiased">
<div class="flex h-screen bg-gray-100">

Dashboard
</div>
@stack('script')
@livewireScripts
</body>
</html>







{{--<x-app-layout>--}}
{{--    <x-slot name="header">--}}
{{--        <h2 class="font-semibold text-xl text-gray-800 leading-tight">--}}
{{--            {{ __('Dashboard') }}--}}
{{--        </h2>--}}
{{--    </x-slot>--}}

{{--    <div class="py-12">--}}
{{--        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">--}}
{{--                <x-welcome />--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</x-app-layout>--}}
