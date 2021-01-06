<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if ( $successMessage )
            <div class="flex w-100 bg-green-100 rounded border border-green-200 py-3 my-4 px-2 text-green-800">
                <svg class="w-6 h-6 text-green-800 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $successMessage }}
            </div>
        @endif
        <div class="bg-white dark:bg-gray-900 dark:text-gray-200 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">

            {{-- Ticket contents --}}
            <div>
                <div class="flex justify-between">
                    <h2 class="text-2xl">
                        {{ $ticket->title }}
                    </h2>

                    <div>
                        <a class="mb-2" href="{{ '/ticket/'.$ticket->id.'/edit' }}">
                            <svg class="w-10 h-10 p-2 text-gray-400 rounded-lg hover:text-gray-600 hover:bg-indigo-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                            </svg>
                        </a>

                        @if ( $ticket->status != 'completed' )
                            <form class="mt-2" wire:submit.prevent="stopClock" method="post">
                                <button type="submit" title="{{ __('Close ticket') }}">
                                    <svg class="w-10 h-10 p-2 text-green-400 rounded-lg hover:text-green-600 hover:bg-green-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </button>
                            </form>

                        @else
                            <form class="mt-2" wire:submit.prevent="reopen" method="post">
                                <button type="submit" title="{{ __('Reopen ticket') }}">
                                    <svg class="w-10 h-10 p-2 text-red-400 rounded-lg hover:text-red-600 hover:bg-red-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                                    </svg>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    {{-- Left side --}}
                    <div class="sm:mr-1/6 md:mr-1/6">
                        <div class="flex items-center my-6">
                            <svg class="w-4 h-4 text-gray-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <span class="text-sm align-middle">
                                {{ $company }}
                            </span>
                        </div>

                        <div class="flex items-center my-6">
                            <svg class="w-4 h-4 text-gray-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm align-middle">
                                {{ date('M d, Y h:i a', strtotime($ticket->created_at)) }}
                            </span>
                        </div>

                        <div class="flex items-center my-6">
                            <svg class="w-4 h-4 text-gray-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                            <span class="text-sm align-middle capitalize">
                                {{ $ticket->priority . __(' priority') }}
                            </span>
                        </div>

                        <div class="flex items-center my-6">
                            <svg class="w-4 h-4 text-gray-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm align-middle capitalize">
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
                                    <svg class="w-4 h-4 text-orange-500 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    <span class="text-sm align-middle capitalize text-orange-500">
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

                        {{-- Right Side --}}
                        <div class="flex items-center my-6">
                            <svg class="w-4 h-4 text-indigo-600 dark:text-indigo-400 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm align-middle capitalize text-indigo-600 dark:text-indigo-400">
                                <a href="{{ $ticket->id.'/view-attachment' }}" target="_blank">{{ __('View attachment') }}</a>
                            </span>
                        </div>

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

                <hr class="border-gray-100">
                <div class="flex items-center my-6">
                    {{ $ticket->desc }}
                </div>
            </div>
        </div>


        @if ($ticket->start)
        <div class="bg-white dark:bg-gray-900 dark:text-gray-200 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
            <h3 class="text-xl flex">
                <svg class="w-6 h-6 text-gray-600 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                </svg>
                {{ __('Worklog') }}
            </h3>

            <div class="bg-gray-900 dark:bg-black text-gray-200 my-6 p-6 rounded-xl">

                @if ($ticket->start)
                    <div class="text-green-400 flex items-center my-2">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                        Ticket opened on: {{ $ticket->created_at }}
                    </div>
                @endif

                @if ($ticket->end)
                    <div class="text-green-400 flex items-center my-2">
                        <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                        Ticket closed on: {{ $ticket->end }}
                    </div>
                @endif

                @if ($ticket->notes)
                    <div class="text-green-400 my-2">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Notes:
                        </div>
                        <div class="mx-6">
                            {!! nl2br($ticket->notes) !!}
                        </div>
                    </div>
                @endif

            </div>

        </div>
        @endif


    </div>
</div>
