@php use App\Enums\PaymentMethod; @endphp
<div class="overflow-hidden min-h-screen">
    <div class="hidden fixed top-8 left-1/2 -translate-x-1/2 z-50 animate-pulse" wire:loading>
        <x-kogeka.preloader class="bg-secondary-100 text-white border border-secondary-100 shadow-2xl">
            {{ $loading }}
        </x-kogeka.preloader>
    </div>

    {{-- Filter --}}
    <x-kogeka.section class="mb-4 flex items-center gap-2">
        <div class="flex-1">
            <x-kogeka.form.search placeholder="Zoek op voornaam, achternaam of Roepnaam"
                                  wire:model.live.debounce.500ms="search"
                                  class="placeholder-gray-300"/>
        </div>
        <x-kogeka.form.button color="info" class="mt-1"
                              wire:click="newPerson()"
                              data-tippy-content="Klik om een persoon toe te voegen">
            {{ svg('tabler-user-plus') }}
        </x-kogeka.form.button>
        <x-kogeka.form.switch id="waarborg"
                              wire:model="noDeposit"
                              text-off="Waarborg betaald" color-off="text-gray-400 font-light bg-gray-100 before:line-through"
                              text-on="Geen waarborg betaald" color-on="text-white bg-rose-600 h-auto"
                              class="w-20 mt-1"/>
    </x-kogeka.section>

    <x-kogeka.section>
        <div class="my-4 text-blue-400">{{ $persons->links() }}</div>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-secondary">
                <tr>
                    <th scope="col" class="px-4 py-2 md:px-6 md:py-3">Roepnaam</th>
                    <th scope="col" class="px-4 py-2 md:px-6 md:py-3">Voornaam</th>
                    <th scope="col" class="px-4 py-2 md:px-6 md:py-3">Achternaam</th>
                    <th scope="col" class="px-4 py-2 md:px-6 md:py-3">School</th>
                    <th scope="col" class="px-4 py-2 md:px-6 md:py-3">Waarborg betaald</th>
                    <th scope="col" class="px-4 py-2 md:px-6 md:py-3"><span class="sr-only">Bewerken</span></th>
                </tr>
                </thead>
                <tbody>
                @forelse($persons as $person)
                    <tr wire:key="{{ $person->id }}" class="bg-white border-b-gray-100 hover:bg-blue-50 dark:border-gray-700">
                        <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap md:px-6 md:py-4">
                            {{ $person->preferred_name ?? 'Geen roepnaam beschikbaar' }}
                        </th>
                        <td class="px-4 py-2 md:px-6 md:py-4">{{ $person->first_name ?? 'Geen voornaam beschikbaar' }}</td>
                        <td class="px-4 py-2 md:px-6 md:py-4">{{ $person->last_name ?? 'Geen achternaam beschikbaar' }}</td>
                        <td class="px-4 py-2 md:px-6 md:py-4">
                            @if ($person->institutions->isNotEmpty())
                                <ul>
                                    @foreach ($person->institutions as $institution)
                                        <li class="italic text-tertiary">{{ $institution->name }}</li>
                                    @endforeach
                                </ul>
                            @else
                                Geen school beschikbaar
                            @endif
                        </td>
                        <td class="px-4 py-2 md:px-6 md:py-4">{{ $person->hadPaidDeposit() ? 'Ja' : 'Nee' }}</td>
                        <td class="px-4 py-2 text-right md:px-6 md:py-4">
                            <div class="flex gap-1 justify-center items-center [&>*]:cursor-pointer [&>*]:outline-0 [&>*]:transition">
                                <x-phosphor-key
                                    class="w-5 text-gray-400 border-gray-300 hover:text-gold"
                                    wire:click="showSelectedPerson({{ $person->id }})"
                                    data-tippy-content="Klik om de geleende sluetels te zien"
                                />
                                <button
                                    class="w-6 h-6 text-blue-400 hover:text-blue-500"
                                    wire:click="showKey({{ $person->id }})"
                                    data-tippy-content="Klik om sleutels aan de persoon te lenen"
                                >
                                    {{ svg('solar-key-minimalistic-square-2-bold-duotone') }}
                                </button>
                                <button
                                    class="w-6 h-6 text-green-400 hover:text-green-500"
                                    wire:click="editPerson({{ $person->id }})"
                                    data-tippy-content="Klik om een persoon te bewerken"
                                >
                                    {{ svg('iconsax-bul-user-edit') }}
                                </button>
                                <button
                                    class="w-6 h-6 text-red-400 hover:text-red-500"
                                    wire:click="deletePerson({{ $person->id }})"
                                    data-tippy-content="Klik om een persoon te verwijderen">
                                    {{ svg('iconsax-bul-user-remove') }}
                                </button>
                            </div>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="border-t border-gray-300 p-4 font-bold text-sky-800">Geen persoon gevonden</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
            <div class="my-4 text-blue-400">{{ $persons->links() }}</div>
        </div>

        {{--        Confirm Deletion modal--}}
        <x-confirmation-modal wire:model="confirmingDelete">
            <x-slot name="title">
                Verwijder persoon
            </x-slot>

            <x-slot name="content">
                Weet je zeker dat je deze persoon wilt verwijderen? Deze actie kan niet ongedaan worden gemaakt.
            </x-slot>

            <x-slot name="footer">
                <x-secondary-button wire:click="$set('confirmingDelete', false)">
                    Annuleren
                </x-secondary-button>

                <x-danger-button wire:click="deleteConfirmed" class="ml-3">
                    Verwijderen
                </x-danger-button>
            </x-slot>
        </x-confirmation-modal>
    </x-kogeka.section>


    {{-- Modal to add and update person --}}
    <x-dialog-modal id="personModal" wire:model.live="showPersonModal" class="w-full max-w-lg mx-auto p-4" maxWidth="5xl">
        <x-slot name="title">
            <h2 class="text-lg font-semibold text-center sm:text-left">
                {{ is_null($form->id) ? 'Nieuwe persoon' : 'Persoon bijwerken' }}
            </h2>
        </x-slot>

        <x-slot name="content">
            {{-- error messages --}}
            <x-kogeka.error-bag/>

            <div class="grid gap-4 sm:grid-cols-1 lg:grid-cols-2">

                <!-- First Name -->
                <div class="flex flex-col">
                    <x-label for="first_name" value="Voornaam" />
                    <x-input id="first_name" type="text" wire:model.defer="form.first_name" placeholder="Voornaam"
                             class="w-full mt-1" />
                </div>

                <!-- Last Name -->
                <div class="flex flex-col">
                    <x-label for="last_name" value="Achternaam" />
                    <x-input id="last_name" type="text" wire:model.defer="form.last_name" placeholder="Achternaam"
                             class="w-full mt-1" />
                </div>

                <!-- Preferred Name -->
                <div class="flex flex-col">
                    <x-label for="preferred_name" value="Roepnaam" />
                    <x-input id="preferred_name" type="text" wire:model.defer="form.preferred_name" placeholder="Roepnaam"
                             class="w-full mt-1" />
                </div>

                <!-- Email -->
                <div class="flex flex-col">
                    <x-label for="email" value="E-mailadres" />
                    <x-input id="email" type="email" wire:model.defer="form.email" placeholder="E-mailadres"
                             class="w-full mt-1" />
                </div>

                <!-- Account ID -->
                <div class="flex flex-col">
                    <x-label for="account_id" value="Account ID" />
                    <x-input id="account_id" type="text" wire:model.defer="form.account_id" placeholder="Account ID"
                             class="w-full mt-1" />
                </div>

                <!-- Employee Code -->
                <div class="flex flex-col">
                    <x-label for="employee_code" value="Werknemer code" />
                    <x-input
                        id="employee_code"
                        type="text"
                        wire:model.defer="form.employee_code"
                        placeholder="Werknemer code"
                        class="w-full mt-1" />
                </div>


                {{-- Payment Section --}}
                <div class="mt-6 sm:col-span-2">
                    <x-label class="block text-sm font-medium text-gray-700">Betalingsinformatie</x-label>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
                        <!-- Deposit Paid Checkbox -->
                        <div class="flex items-center space-x-2">
                            <x-input
                                type="checkbox"
                                id="deposit_paid"
                                wire:model="form.deposit_paid"
                                class="form-checkbox h-4 w-4 text-green-600"
                            />
                            <x-label for="deposit_paid" class="text-sm text-gray-700">
                                Borg betaald
                            </x-label>
                        </div>

                        <!-- Deposit Refunded Checkbox -->
                        <div class="flex items-center space-x-2">
                            <x-input
                                type="checkbox"
                                id="deposit_refunded"
                                wire:model="form.deposit_refunded"
                                class="form-checkbox h-4 w-4 text-red-600"
                            />
                            <x-label for="deposit_refunded" class="text-sm text-gray-700">
                                Borg terugbetaald
                            </x-label>
                        </div>

                        <!-- Deposit Amount Input -->
                        <div class="flex flex-col">
                            <x-label for="deposit_amount" value="Bedrag (€)" />
                            <x-input
                                id="deposit_amount"
                                type="text"
                                wire:model.defer="form.deposit_amount"
                                step="0.01"
                                placeholder="Bedrag"
                                class="w-full sm:w-48 mt-1"
                            />
                        </div>

                        <!-- Payment Method Dropdown -->
                        <div class="flex flex-col">
                            <x-label for="payment_method" value="Betaalmethode" />
                            <x-kogeka.form.select
                                id="payment_method"
                                wire:model="form.payment_method"
                                class="block mt-1 w-full sm:w-48"
                            >
                                <option value="">Kies een betaalmethode</option>
                                @foreach(PaymentMethod::toArray() as $paymentMethod => $paymentName)
                                    <option value="{{ $paymentMethod }}">{{ $paymentName }}</option>
                                @endforeach
                            </x-kogeka.form.select>
                        </div>
                    </div>
                </div>




                <!-- Institution Checkboxes -->
                <div class="mt-4 sm:col-span-2">
                    <x-label class="block text-sm font-medium text-gray-700">Kies de scholen</x-label>
                    <div class="flex flex-wrap gap-4">
                        @foreach ($institutions as $institution)
                            <div class="flex items-center w-full sm:w-auto">
                                <x-input
                                    type="checkbox"
                                    id="institution-{{ $institution->id }}"
                                    value="{{ $institution->id }}"
                                    wire:model.defer="form.institutions"
                                    class="form-checkbox h-4 w-4 text-indigo-600"
                                />
                                <x-label for="institution-{{ $institution->id }}" class="ml-2 text-sm text-gray-700">
                                    {{ $institution->name }}
                                </x-label>
                            </div>
                        @endforeach
                    </div>
                    @error('form.institutions')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>



            </div>

        </x-slot>

        <x-slot name="footer">
            <div class="flex flex-col sm:flex-row sm:justify-end space-y-2 sm:space-y-0 sm:space-x-2 mt-4">
                <x-secondary-button @click="$wire.showPersonModal = false" class="w-full sm:w-auto">Annuleren</x-secondary-button>
                @if(is_null($form->id))
                    <x-kogeka.form.button color="success" wire:click="createPerson()" class="w-full sm:w-auto">
                        Opslaan
                        <div wire:loading class="inline-block ml-2">
                            <div class="w-4 h-4 border-2 border-t-transparent border-green-500 rounded-full animate-spin"></div>
                        </div>
                    </x-kogeka.form.button>
                @else
                    <x-kogeka.form.button color="success" wire:click="updatePerson({{ $form->id }})" class="w-full sm:w-auto">
                        Wijzigingen opslaan
                        <div wire:loading class="inline-block ml-2">
                            <div class="w-4 h-4 border-2 border-t-transparent border-green-500 rounded-full animate-spin"></div>
                        </div>
                    </x-kogeka.form.button>
                @endif
            </div>
        </x-slot>
    </x-dialog-modal>

    {{-- Modal for person with key --}}
    <x-dialog-modal id="userKeyModal" wire:model.live="showModal" maxWidth="5xl" class="max-h-[75vh]" >  <!-- Set height of modal -->
        <x-slot name="title">
            <h2 class="text-tertiary-500">Geleende sleutels van {{ $selectedPerson->preferred_name ?? '' }}</h2>
        </x-slot>

        <x-slot name="content">
            <x-kogeka.section>
                <div class="my-4 space-y-4 max-h-[60vh] overflow-auto">
                    <div class="flex space-x-6 bg-gray-100 p-4 rounded-lg shadow-md hover:bg-gray-200 transition-colors">
                        <div class="flex-1">
                            <dt class="font-semibold text-gray-700">Naam</dt>
                            <dd class="text-gray-900">{{ $selectedPerson->last_name ?? '' }}</dd>
                        </div>
                        <div class="flex-1">
                            <dt class="font-semibold text-gray-700">Voornaam</dt>
                            <dd class="text-gray-900">{{ $selectedPerson->first_name ?? '' }}</dd>
                        </div>
                    </div>
                    <div class="flex space-x-6 bg-gray-100 p-4 rounded-lg shadow-md hover:bg-gray-200 transition-colors">
                        <div class="flex-1">
                            <dt class="font-semibold text-gray-700">School</dt>
                            <dd class="text-gray-900">{{ $selectedPerson->school ?? '' }}</dd>
                        </div>
                        <div class="flex-1">
                            <dt class="font-semibold text-gray-700">SmartSchool Id</dt>
                            <dd class="text-gray-900">{{ $selectedPerson->account_id ?? '' }}</dd>
                        </div>
                    </div>
                    <div class="flex space-x-6 bg-gray-100 p-4 rounded-lg shadow-md hover:bg-gray-200 transition-colors">
                        <div class="flex-1">
                            <dt class="font-semibold text-gray-700">Roepnaam</dt>
                            <dd class="text-gray-900">{{ $selectedPerson->preferred_name ?? '' }}</dd>
                        </div>
                        <div class="flex-1">
                            <dt class="font-semibold text-gray-700">Werknemer code</dt>
                            <dd class="text-gray-900">{{ $selectedPerson->employee_id ?? '' }}</dd>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-6 p-4 rounded-lg">
                        <!-- Deposit Paid Section -->
                        <div>
                            <div class="flex flex-col space-y-2">
                                <div class="flex items-center space-x-2">
                                    <dt class="font-semibold text-gray-700">Waarborg betaald</dt>
                                    @if($deposit_paid)
                                        <x-phosphor-check-fat-duotone class="text-green-500 w-5 h-5" />
                                    @else
                                        <span class="text-gray-500 italic">Nog niet betaald</span>
                                    @endif
                                </div>
                                <div>
                                    <dt class="font-semibold text-gray-700">Waarborg betaald op</dt>
                                    <dd class="text-gray-900 italic">
                                        {{ $deposit_paid_at ? \Carbon\Carbon::parse($deposit_paid_at)->format('d-m-Y H:i:s') : 'Onbekend' }}
                                    </dd>
                                </div>
                            </div>
                        </div>

                        <!-- Deposit Refunded Section -->
                        <div>
                            <div class="flex flex-col space-y-2">
                                <div class="flex items-center space-x-2">
                                    <dt class="font-semibold text-gray-700">Waarborg terugbetaald</dt>
                                    @if($deposit_refunded)
                                        <x-phosphor-check-fat-duotone class="text-red-500 w-5 h-5" />
                                    @else
                                        <span class="text-gray-500 italic">Nog niet terugbetaald</span>
                                    @endif
                                </div>
                                <div>
                                    <dt class="font-semibold text-gray-700">Waarborg terugbetaald op</dt>
                                    <dd class="text-gray-900 italic">
                                        {{ $deposit_refunded_at ? \Carbon\Carbon::parse($deposit_refunded_at)->format('d-m-Y H:i:s') : 'Onbekend' }}
                                    </dd>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </x-kogeka.section>

            <div class="mt-4">
                <!-- Modal Content - Table -->
                <div class="sm:rounded-lg max-h-[32vh] overflow-hidden">
                    <!-- Add a wrapper div with fixed height and overflow-auto for scrolling -->
                    <div class="overflow-auto max-h-[32vh]">
                        <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-secondary sticky top-0 z-10">
                            <tr>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3"></th>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3">Sleutelcode</th>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3">Sleutel type</th>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3">Opmerking</th>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3"><span class="sr-only">Bewerken</span></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($userKeys as $key)
                                <tr class="bg-white border-b-gray-100 hover:bg-blue-50 dark:border-gray-700">
                                    <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap md:px-6 md:py-4">
                                        <x-input type="checkbox" id="selectKey" class="mr-2"/>
                                    </th>
                                    <th scope="row" class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap md:px-6 md:py-4">
                                        {{ $key->key->code ?? 'Geen sleutelcode beschikbaar' }}
                                    </th>
                                    <td class="px-4 py-2 md:px-6 md:py-4">{{ $key->key->type ?? 'Geen sleutel type beschikbaar' }}</td>
                                    <td class="px-4 py-2 md:px-6 md:py-4">{{ $key->remark ?? 'Geen opmerking' }}</td>
                                    <td class="px-4 py-2 text-right md:px-6 md:py-4">
                                        <button class="w-5 hover:text-red-500"
                                                wire:click="removeKeyFromUser({{ $key->id }})">
                                            <x-phosphor-trash-duotone />
                                        </button>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.showModal = false">Afsluiten</x-secondary-button>
        </x-slot>

    </x-dialog-modal>

    {{--    BorrowkeyModal--}}
    <x-dialog-modal id="borrowKeyModal" wire:model.live="showKeyModal" maxWidth="5xl" class="h-[40vh]">
        <x-slot name="title">
            <h2 class="text-tertiary-500">Sleutels voor {{ $selectedPerson->full_name ?? '' }}</h2>
        </x-slot>

        <x-slot name="content">
            <div class="mt-4">
                {{-- Filter --}}
                <x-kogeka.section class="mb-4 flex items-center gap-2">
                    <div class="flex-1">
                        <x-kogeka.form.search placeholder="Zoek op sleutelcode"
                                              wire:model.live.debounce.500ms="filter"
                                              class="placeholder-gray-300"/>
                    </div>
                </x-kogeka.section>
                <!-- Modal Content - Table -->
                <div class="sm:rounded-lg max-h-[30vh] overflow-hidden">
                    <div class="overflow-auto max-h-[30vh]">
                        <table class="min-w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-secondary sticky top-0 z-10">
                            <tr>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3"></th>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3">Sleutelcode</th>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3">Sleutel type</th>
                                <th scope="col" class="px-4 py-2 md:px-6 md:py-3">Opmerking</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($keyList as $key)
                                <tr class="bg-white border-b-gray-100 hover:bg-blue-50 dark:border-gray-700">
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap md:px-6 md:py-4">
                                        <x-input
                                            type="checkbox"
                                            id="selectKey-{{ $key->id }}"
                                            class="mr-2"
                                            wire:model.defer="selectedKeyIds"
                                            value="{{ $key->id }}"
                                            multiple
                                        />


                                    </td>
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap md:px-6 md:py-4">
                                        {{ $key->code ?? 'Geen sleutelcode beschikbaar' }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-4">
                                        {{ $key->type ?? 'Geen sleutel type beschikbaar' }}
                                    </td>
                                    <td class="px-4 py-2 md:px-6 md:py-4">
                                        <x-input
                                            type="text"
                                            wire:model="selectedKeyRemarks.{{ $key->id }}"
                                            placeholder="Voeg opmerking toe"
                                            class="mt-1"
                                        />

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.showKeyModal = false">Annuleren</x-secondary-button>
            <x-kogeka.form.button color="success" wire:click="borrowSelectedKeys()" class="ml-2">Bevestig lening
                <div wire:loading class="inline-block ml-2">
                    <div class="w-4 h-4 border-2 border-t-transparent border-green-500 rounded-full animate-spin"></div>
                </div></x-kogeka.form.button>

        </x-slot>
    </x-dialog-modal>

</div>
