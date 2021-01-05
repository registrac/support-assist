<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <a href="{{ route('tickets') }}">
                <svg class="w-6 mr-4 text-indigo-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Create ticket') }}
            </h2>
        </div>
    </x-slot>

    <livewire:create-ticket />

</x-app-layout>
