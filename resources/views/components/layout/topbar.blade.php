<nav class="shadow bg-white/70 sticky top-0 backdrop-blur-sm z-10 mb-4 flex justify-end items-center p-4 pr-6">
    <div class="flex items-center space-x-4">
        <x-nav-link href="{{ route('admin.persons') }}" class="text-sidebar-dark-light">
            Personen
        </x-nav-link>
        <x-nav-link href="{{ route('admin.keys') }}" class="text-sidebar-dark-light">
            Sleutels
        </x-nav-link>
        <x-nav-link href="{{ route('admin.classrooms') }}" class="text-sidebar-dark-light">
            Lokalen
        </x-nav-link>
        <x-nav-link href="{{ route('admin.key-storage') }}" class="text-sidebar-dark-light">
            Sleutelkast
        </x-nav-link>
        <x-nav-link href="{{ route('logout') }}" class="text-sidebar-dark-light">
            Logout
        </x-nav-link>
    </div>
</nav>
