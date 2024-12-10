<nav class="shadow bg-white/70 sticky top-0 backdrop-blur-sm z-10 mb-4 flex justify-center items-center p-4">
    <div class="flex items-center space-x-4">
        <x-nav-link href="{{ route('admin.persons') }}">
            Personen
        </x-nav-link>
        <x-nav-link href="{{ route('admin.keys') }}">
            Sleutels
        </x-nav-link>
        <x-nav-link href="{{ route('admin.classrooms') }}">
            Lokalen
        </x-nav-link>
        <x-nav-link href="/">
            Test
        </x-nav-link>
    </div>
</nav>
