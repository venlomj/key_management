@php
    $model =  $attributes->wire('model')->value();
@endphp
<div
    @if($model)
        x-data="{ value: @entangle($model) }"
    @endif
    class="mt-1 relative w-full">
    <input type="text"
        {{ $attributes->merge(["class" => "w-full pl-10 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"]) }} />
    <x-phosphor-magnifying-glass class="absolute top-3 ml-3 w-5 h-5 text-gray-400"/>
    <button
        x-show="value"
        x-cloak
        @click="$wire.set('{{ $model }}', '')"
        class="w-5 absolute right-4 top-3 text-gray-400">
        <x-phosphor-x-circle-fill/>
    </button>
</div>
