<div class="overflow-hidden h-screen">
    <div class="hidden fixed top-8 left-1/2 -translate-x-1/2 z-50 animate-pulse" wire:loading>
        <x-kogeka.preloader class="bg-secondary-100 text-white border border-secondary-100 shadow-2xl">
            {{ $loading }}
        </x-kogeka.preloader>
    </div>
{{--     Filter--}}
    <x-kogeka.section class="mb-4 flex items-center gap-2">
        <div class="flex-1">
            <x-kogeka.form.search placeholder="Zoek op sleutelcode"
                                  wire:model.live.debounce.500="search"
                                  class="placeholder-gray-300"/>
        </div>
        <x-kogeka.form.button color="info" class="mt-1"
                              wire:click="newKey()">
            Voeg sleutel toe
        </x-kogeka.form.button>
    </x-kogeka.section>
    <x-kogeka.section>
        <div class="my-4 text-blue-400">{{ $keys->links() }}</div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-secondary">
                <tr>
                    <th scope="col" class="px-4 py-2 sm:px-2 md:px-6 md:py-3">
                        Sleutelcode
                    </th>
                    <th scope="col" class="px-4 py-2 sm:px-2 md:px-6 md:py-3">
                        Sleutel type
                    </th>
                    <th scope="col" class="px-4 py-2 sm:px-2 md:px-6 md:py-3">
                        <span class="sr-only">Bewerken</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($keys as $key)
                    <tr wire:key="{{ $key->id }}" class="bg-white border-b-gray-100 hover:bg-blue-50 dark:border-gray-700">
                        <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap sm:px-2 md:px-6 md:py-4">
                            {{ $key->code ?? 'Geen sleutelcode beschikbaar' }}
                        </th>
                        <td class="px-4 py-2 sm:px-2 md:px-6 md:py-4">
                            {{ $key->type ?? 'Geen sleutel type beschikbaar' }}
                        </td>
                        <td class="px-4 py-2 text-right sm:px-2 md:px-6 md:py-4">
                            <button class="text-gray-400 hover:text-green-400 transition" wire:click="editKey({{ $key->id }})">
                                <x-phosphor-pencil-line-duotone class="inline-block size-5" />
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border-t border-gray-300 p-4 font-bold text-sky-800 text-center italic">
                            Geen sleutels om weer te geven
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
        <div class="my-4">{{ $keys->links() }}</div>
    </x-kogeka.section>

{{--     Modal for add and update key--}}
    <x-dialog-modal id="keyModal" wire:model.live="showModal" class="w-full max-w-lg mx-auto p-4">
        <x-slot name="title">
            <h2 class="text-lg font-semibold text-center sm:text-left">
                {{ is_null($form->id) ? 'Nieuwe sleutel' : 'Sleutel bijwerken' }}
            </h2>

        </x-slot>

        <x-slot name="content">
{{--             error messages--}}
            <x-kogeka.error-bag/>
{{--             show only if $form->id is empty--}}
            <div class="grid gap-4 sm:grid-cols-2">
                <div class="flex flex-col">
                    <x-label for="code" value="Sleutelcode" />
                    <x-input id="code" type="text" step="0.01" wire:model.defer="form.code" placeholder="Sleutelcode"
                             class="w-full mt-1" />
                </div>
                <div class="flex flex-col">
                    <x-label for="type" value="Sleuteltype" />
                    <x-input id="type" type="text" step="0.01" wire:model.defer="form.type" placeholder="Sleuteltype"
                             class="w-full mt-1" />
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-col sm:flex-row sm:justify-end space-y-2 sm:space-y-0 sm:space-x-2 mt-4">
                <x-secondary-button @click="$wire.showModal = false" class="w-full sm:w-auto">Annuleren</x-secondary-button>
                @if(is_null($form->id))
                    <x-kogeka.form.button color="success"
                                          wire:click="createKey()" class="w-full sm:w-auto">
                        Opslaan
                        <div wire:loading class="inline-block ml-2">
                            <div class="w-4 h-4 border-2 border-t-transparent border-green-500 rounded-full animate-spin"></div>
                        </div>
                    </x-kogeka.form.button>

                @else
                    <x-kogeka.form.button color="success"
                                          wire:click="updateKey({{ $form->id }})" class="w-full sm:w-auto">
                        Wijzigingen opslaan
                        <div wire:loading class="inline-block ml-2">
                            <div class="w-4 h-4 border-2 border-t-transparent border-green-500 rounded-full animate-spin"></div>
                        </div>
                    </x-kogeka.form.button>
                @endif
            </div>
        </x-slot>
    </x-dialog-modal>
</div>
