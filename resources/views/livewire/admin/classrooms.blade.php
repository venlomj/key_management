<div class="overflow-hidden h-screen">
    {{-- Filter --}}
    <x-kogeka.section class="mb-4 flex items-center gap-2">
        <div class="flex-1">
            <x-kogeka.form.search
                placeholder="Zoek op klaslokaal naam, code of blok"
                wire:model.live.debounce.500="search"
                class="placeholder-gray-300" />
        </div>
        {{--        <x-kogeka.form.button color="info" class="mt-1"--}}
        {{--                              wire:click="newKey()">--}}
        {{--            Voeg sleutel toe--}}
        {{--        </x-kogeka.form.button>--}}
    </x-kogeka.section>
    <x-kogeka.section>
        <div class="my-4 text-blue-400">{{ $classrooms->links() }}</div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-secondary">
                <tr>
                    <th scope="col" class="px-4 py-2 sm:px-2 md:px-6 md:py-3">
                        Lokaal
                    </th>
                    <th scope="col" class="px-4 py-2 sm:px-2 md:px-6 md:py-3">
                        Lokaalcode
                    </th>
                    <th scope="col" class="px-4 py-2 sm:px-2 md:px-6 md:py-3">
                        Blok
                    </th>
                    <th scope="col" class="px-4 py-2 sm:px-2 md:px-6 md:py-3">
                        Kort beschrijving
                    </th>
                    <th scope="col" class="px-4 py-2 sm:px-2 md:px-6 md:py-3">
                        Sleutel
                    </th>
                    <th scope="col" class="px-4 py-2 sm:px-2 md:px-6 md:py-3">
                        <span class="sr-only">Bewerken</span>
                    </th>
                </tr>
                </thead>
                <tbody>
                @forelse($classrooms as $classroom)
                    <tr wire:key="{{ $classroom->id }}" class="bg-white border-b-gray-100 hover:bg-blue-50 dark:border-gray-700">
                        <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap sm:px-2 md:px-6 md:py-4">
                            {{ $classroom->classroom_name ?? 'Geen lokaal beschikbaar' }}
                        </th>
                        <td class="px-4 py-2 sm:px-2 md:px-6 md:py-4">
                            {{ $classroom->classroom_code ?? 'Geen code beschikbaar' }}
                        </td>
                        <td class="px-4 py-2 sm:px-2 md:px-6 md:py-4">
                            {{ $classroom->classroom_block ?? 'Geen sleutel type beschikbaar' }}
                        </td>
                        <td class="px-4 py-2 sm:px-2 md:px-6 md:py-4">
                            {{ $classroom->short_description ?? 'Geen beschrijving beschikbaar' }}
                        </td>
                        <td class="px-4 py-2 sm:px-2 md:px-6 md:py-4">
                            {{ $classroom->key_code ?? 'Geen sleutel beschikbaar' }}
                            {{--                            {{ $classroom->key_code ?? 'Geen sleutel beschikbaar' }}--}}
                        </td>
                        <td class="px-4 py-2 text-right sm:px-2 md:px-6 md:py-4">
                            <button
                                class="w-6 h-6 text-blue-400 hover:text-blue-500"
                                wire:click="newKey({{ $classroom->id }})"
                            >
                                {{ svg('eos-content-modified', 'mr-2 text-green-500 cursor-pointer w-5 h-5') }}
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border-t border-gray-300 p-4 font-bold text-sky-800 text-center italic">
                            Geen lokalen om weer te geven
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>

        </div>
        <div class="my-4">{{ $classrooms->links() }}</div>
    </x-kogeka.section>

    {{-- Modal to update classroom key --}}
    <x-dialog-modal id="keyModal" wire:model.live="showModal" class="w-full max-w-lg mx-auto p-4">
        <x-slot name="title">
            <h2 class="text-lg font-semibold text-center sm:text-left">
                {{ is_null($form->key_id) ? 'Sleutel toevoegen' : 'Sleutel wijzigen' }}
            </h2>
        </x-slot>

        <x-slot name="content">
            <x-kogeka.error-bag />

            <!-- Classroom Information -->
            <div class="mb-4 space-y-2">
                <h3 class="text-md font-semibold text-gray-700">Klaslokaal Informatie</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div class="mb-4">
                        <x-label for="classroom_name" value="Klaslokaal Naam" class="font-semibold text-gray-700" />
                        <x-input type="text" id="classroom_name" wire:model.defer="form.classroom_name" disabled class="block w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md" />
                    </div>
                    <div class="mb-4">
                        <x-label for="classroom_code" value="Klaslokaal Code" class="font-semibold text-gray-700" />
                        <x-input type="text" id="classroom_code" wire:model.defer="form.classroom_code" disabled class="block w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md" />
                    </div>
                    <div class="mb-4">
                        <x-label for="classroom_block" value="Blok" class="font-semibold text-gray-700" />
                        <x-input type="text" id="classroom_block" wire:model.defer="form.classroom_block" disabled class="block w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md" />
                    </div>
                    <div class="mb-4">
                        <x-label for="classroom_description" value="Beschrijving" class="font-semibold text-gray-700" />
                        <x-input id="classroom_description" wire:model.defer="form.classroom_description" rows="3" disabled>{{ $form->classroom_description }}</x-input>
                    </div>
                    <div class="mb-4">
                        <x-label for="short_description" value="Korte Beschrijving" class="font-semibold text-gray-700" />
                        <x-input id="short_description" wire:model.defer="form.short_description" rows="2" disabled>{{ $form->short_description }}</x-input>
                    </div>
                    <div class="mb-4">
                        <x-label for="note" value="Opmerking" class="font-semibold text-gray-700" />
                        <x-input id="note" wire:model.defer="form.note" rows="2" disabled>{{ $form->note }}</x-input>
                    </div>
                    <div class="mb-4">
                        <x-label for="first_specification" value="Eerste Specificatie" class="font-semibold text-gray-700" />
                        <x-input type="text" id="first_specification" wire:model.defer="form.first_specification" disabled class="block w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md" />
                    </div>
                    <div class="mb-4">
                        <x-label for="second_specification" value="Tweede Specificatie" class="font-semibold text-gray-700" />
                        <x-input type="text" id="second_specification" wire:model.defer="form.second_specification" disabled class="block w-full px-4 py-2 bg-gray-100 border border-gray-300 rounded-md" />
                    </div>
                </div>
            </div>

            <!-- Key Selection -->
            <div class="mb-4 space-y-2">
                <x-label for="key_id" value="Sleutel" class="font-semibold text-gray-700" />
                <x-kogeka.form.select wire:model.defer="form.key_id" id="key_id" class="block w-full px-4 py-2 bg-white border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-300 focus:ring-opacity-50">
                    <option value="-1" disabled selected>Kies een sleutel</option>
                    @foreach($keys as $key)
                        <option value="{{ $key->id }}" {{ $form->key_id == $key->id ? 'selected' : '' }}>{{ $key->code }}</option>
                    @endforeach
                </x-kogeka.form.select>
            </div>
        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-col sm:flex-row sm:justify-end space-y-2 sm:space-y-0 sm:space-x-2 mt-4">
                <x-secondary-button @click="$wire.showModal = false" class="w-full sm:w-auto">Annuleren</x-secondary-button>
                <x-kogeka.form.button color="success" wire:click="addKey({{ $form->id }})" class="w-full sm:w-auto">
                    {{ is_null($form->key_id) ? 'Opslaan' : 'Wijzigingen opslaan' }}
                    <div wire:loading class="inline-block ml-2">
                        <div class="w-4 h-4 border-2 border-t-transparent border-green-500 rounded-full animate-spin"></div>
                    </div>
                </x-kogeka.form.button>
            </div>
        </x-slot>
    </x-dialog-modal>

</div>

