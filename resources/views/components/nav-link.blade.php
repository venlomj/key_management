@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'group inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-900 border-b-2 border-indigo-400 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
                : 'group inline-flex items-center px-1 pt-1 text-sm font-medium leading-5 text-gray-500 border-b-2 border-transparent hover:text-gray-700 hover:border-transparent focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    <span class="relative">
        {{ $slot }}
        <span
            class="absolute inset-x-0 bottom-0 h-[2px] bg-kogeka-sky scale-x-0 group-hover:scale-x-100 transition-transform duration-300 ease-in-out"
        ></span>
    </span>
</a>


{{--@props(['active'])--}}

{{--@php--}}
{{--$classes = ($active ?? false)--}}
{{--            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'--}}
{{--            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out';--}}
{{--@endphp--}}

{{--<a {{ $attributes->merge(['class' => $classes]) }}>--}}
{{--    {{ $slot }}--}}
{{--</a>--}}
