<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <a href="{{ route('tickets') }}">
                <svg class="w-6 mr-4 text-indigo-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Ticket #') . $ticket->id }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">

                    {{-- Ticket contents --}}
                    <div>
                        <div class="flex justify-between">
                            <h2 class="text-2xl dark:text-gray-200">
                                {{ $ticket->title }}
                            </h2>
                        </div>

                        <div class="flex items-center justify-between">
                            {{-- Left side --}}
                            <div class="sm:mr-1/6 md:mr-1/6">
                                <div class="flex items-center my-6">
                                    <svg class="w-4 h-4 text-gray-600 dark:text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-sm align-middle dark:text-gray-200">
                                        {{ date('M d, Y h:i a', strtotime($ticket->created_at)) }}
                                    </span>
                                </div>

                                <div class="flex items-center my-6">
                                    <svg class="w-4 h-4 text-gray-600 dark:text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                    <span class="text-sm align-middle capitalize dark:text-gray-200">
                                        {{ $ticket->priority . __(' priority') }}
                                    </span>
                                </div>

                                <div class="flex items-center my-6">
                                    <svg class="w-4 h-4 text-gray-600 dark:text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                    <span class="text-sm align-middle capitalize dark:text-gray-200">
                                        {{ $ticket->mode }}
                                    </span>
                                </div>

                                <div class="flex items-center my-6">
                                    @switch($ticket->status)
                                        @case('open')
                                            <svg class="w-4 h-4 text-red-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="text-sm align-middle capitalize text-red-500">
                                                {{ $ticket->status }}
                                            </span>
                                            @break
                                        @case('in_progress')
                                            <svg class="w-4 h-4 text-yellow-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="text-sm align-middle capitalize text-yellow-500">
                                                {{ $ticket->status }}
                                            </span>
                                            @break
                                        @case('completed')
                                            <svg class="w-4 h-4 text-green-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            <span class="text-sm align-middle capitalize text-green-500">
                                                {{ $ticket->status }}
                                            </span>
                                            @break
                                        @default
                                    @endswitch
                                </div>

                                @if ( $ticket->attachment )
                                    <div class="flex items-center my-6">
                                        <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        <span class="text-sm align-middle capitalize text-indigo-600 dark:text-indigo-400">
                                            <a href="{{ $ticket->id.'/view-attachment' }}" target="_blank">{{ __('View attachment') }}</a>
                                        </span>
                                    </div>
                                @endif

                            </div>

                            {{-- Right side --}}
                            <div class="flex-row justify-center">
                                <div>
                                    <div class="p-6 bg-blue-50 border border-blue-200 text-blue-700 rounded-xl text-center">
                                        <p class="text-4xl">
                                            {{ $ticket->total_hours ?? 0 }}
                                        </p>
                                        <small>
                                            {{ __('Logged hours') }}
                                        </small>
                                    </div>
                                </div>
                            </div>

                        </div>


                        <hr class="border-gray-100 dark:border-gray-700">
                        <div class="flex items-center my-6 dark:text-gray-200">
                            {{ $ticket->desc }}
                        </div>
                    </div>
                </div>

                @if ($ticket->notes)
                    <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                        <h3 class="text-xl flex dark:text-gray-200">
                            <svg class="w-6 h-6 text-gray-600 dark:text-gray-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                            </svg>
                            {{ __('Notes') }}
                        </h3>

                        <div class="bg-gray-900 dark:bg-black text-gray-200 my-6 p-6 rounded-lg">
                            <div class="text-green-400 my-2">
                                <div class="mx-6">
                                    {!! nl2br($ticket->notes) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>

    </div>
</x-app-layout>
