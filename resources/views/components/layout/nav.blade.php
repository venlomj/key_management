<nav>
    <h2 x-show="open" class="text-lg font-semibold text-white mb-4">Navigatie</h2>
    <ul class="space-y-2">
        <li>
            <a href="{{ route('home') }}" class="flex items-center text-white hover:bg-blue-700 p-2 rounded">
                <i class="fas fa-home mr-2" x-show="open"></i>
                <span x-show="open">Home</span>
            </a>
        </li>
        <li>
            <a href="{{ route('key') }}" class="flex items-center text-white hover:bg-blue-700 p-2 rounded">
                <i class="fas fa-key mr-2" x-show="open"></i>
                <span x-show="open">Sleutel</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.keys') }}" class="flex items-center text-white hover:bg-blue-700 p-2 rounded">
                <i class="fas fa-lock mr-2" x-show="open"></i>
                <span x-show="open">Sleutels</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.person') }}" class="flex items-center text-white hover:bg-blue-700 p-2 rounded">
                <i class="fas fa-user mr-2" x-show="open"></i>
                <span x-show="open">Personen</span>
            </a>
        </li>
    </ul>
</nav>
