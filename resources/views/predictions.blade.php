<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Matches') }}
        </h2>
    </x-slot>

    <livewire:predictions-list />

</x-app-layout>
