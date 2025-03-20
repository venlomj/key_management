<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-nav-link href="{{ route('connect') }}" class="text-sidebar-dark-light">
            Login with your Microsoft Account
        </x-nav-link>

    </x-authentication-card>
</x-guest-layout>
