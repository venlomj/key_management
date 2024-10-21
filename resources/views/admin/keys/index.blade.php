<x-key-management-layout>
    <x-slot name="title">Sleutelbeheer: sleutels</x-slot>
    <x-slot name="subtitle">Sleutels</x-slot>
    <section class="grid sm:grid-cols-2 gap-4">
        <div>
            <h3>Original list</h3>
            <ul>
                @foreach ($keys as $key)
                    <li>{{ $key }}</li>
                @endforeach
            </ul>
        </div>
        <div>
            <h3>Bullet list</h3>
            <x-sjg.list>
                @foreach ($keys as $key)
                    <li>{{ $key }}</li>
                @endforeach
            </x-sjg.list>
        </div>
        <div>
            <h3>Numbered list</h3>
            <x-sjg.list>
                @foreach ($keys as $key)
                    <li>{{ $key }}</li>
                @endforeach
            </x-sjg.list>
        </div>
        <div>
            <h3>Group list</h3>
            <x-sjg.list>
                @foreach ($keys as $key)
                    <li>{{ $key }}</li>
                @endforeach
            </x-sjg.list>
        </div>
    </section>
</x-key-management-layout>
