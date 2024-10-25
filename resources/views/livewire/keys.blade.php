<div>
    <x-sjg.livewire-log :keys="$keys" />
    <div class="my-4 text-blue-400">{{ $keys->links() }}</div>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-sjg-lightgreen">
            <tr>
                <th scope="col" class="px-4 py-2 md:px-6 md:py-3">
                    Sleutelcode
                </th>
                <th scope="col" class="px-4 py-2 md:px-6 md:py-3">
                    Sleutel type
                </th>
                <th scope="col" class="px-4 py-2 md:px-6 md:py-3">
                    Afbeelding
                </th>
                <th scope="col" class="px-4 py-2 md:px-6 md:py-3">
                    Afbeelding Embedded
                </th>
                <th scope="col" class="px-4 py-2 md:px-6 md:py-3">
                    <span class="sr-only">Bewerken</span>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($keys as $key)
                <tr class="bg-white border-b-gray-100 hover:bg-blue-50 dark:border-gray-700">
                    <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap md:px-6 md:py-4">
                        {{ $key->key_code ?? 'Geen sleutelcode beschikbaar' }}
                    </th>
                    <td class="px-4 py-2 md:px-6 md:py-4">
                        {{ $key->key_type ?? 'Geen sleutel type beschikbaar' }}
                    </td>
                    <td class="px-4 py-2 md:px-6 md:py-4">
                        {{ $key->image ?? 'Geen afbeelding beschikbaar' }}
                    </td>
                    <td class="px-4 py-2 md:px-6 md:py-4">
                        {{ $key->embedded_image ?? 'Geen afbeelding embedded beschikbaar'}}
                    </td>
                    <td class="px-4 py-2 text-right md:px-6 md:py-4">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="my-4">{{ $keys->links() }}</div>
</div>
