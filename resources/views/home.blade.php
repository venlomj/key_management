<x-keymanagement-layout>
    <h1 class="font-bold">Sleutelbeheer</h1>
    <x-slot name="description">New description</x-slot>
    <x-slot name="title">Welkom op de pagina van Sleutelbeheer</x-slot>
    <x-slot name="pageTitle">Welkom op de pagina van Sleutelbeheer</x-slot>
    <x-slot name="pageSubtitle">Welkom op de pagina van Sleutelbeheer</x-slot>

    <p>Welkom op de pagina van Sleutelbeheer. Hier kunt u de sleutels beheren die door gebruikers zijn uitgeleend.</p>
    <p>Deze pagina biedt toegang tot alle beheeropties voor het uitlenen, terugbrengen en bijhouden van sleutels. Houd deze pagina in de gaten voor belangrijke informatie.</p>

    <hr class="my-4">

    <h2>Beheer uw sleutels effectief</h2>
    <p>Op deze pagina kunt u snel de status van sleutels beheren en bijhouden. Wij zorgen ervoor dat alles soepel verloopt en dat u altijd toegang heeft tot de nodige informatie.</p>

    @push('script')
        <script>
            console.log('Welkom bij Sleutelbeheer! 🙂')
        </script>
    @endpush
</x-keymanagement-layout>
