<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <a href="{{ url()->previous() }}">
                <svg class="w-6 mr-4 text-indigo-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Editing ticket #') . $ticket->id }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-900 dark:text-gray-200 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">

                @livewire('edit-ticket', ['ticket' => $ticket])

            </div>

        </div>

    </div>
</x-app-layout>
