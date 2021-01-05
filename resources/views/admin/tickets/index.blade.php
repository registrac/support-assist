<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Tickets') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ( session('success_message') )
                <div class="flex w-100 bg-green-100 rounded border border-green-200 py-3 px-2 text-green-800">
                    <svg class="w-6 h-6 text-green-800 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('success_message') }}
                </div>
            @endif

            <div class="my-4 flex justify-end">
                <a class="flex items-center font-semibold bg-indigo-600 hover:bg-indigo-500 text-white font px-4 py-2 rounded shadow" href="{{ route('ticket-create') }}" >
                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    {{ __('New') }}
                </a>
            </div>

            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                    <thead class="bg-gray-50 dark:bg-gray-900">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('#') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Subject') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Date Created') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Customer') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Status') }}
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">
                        @forelse ($tickets as $ticket)
                        <tr class="text-sm">
                            <td class="px-6 py-4 whitespace-nowrap dark:text-gray-200">
                                {{ $ticket->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-gray-200">
                                {{ $ticket->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-gray-200">
                                {{ date('M d, Y h:i a', strtotime($ticket->created_at)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-gray-200">
                                {{ $ticket->company()->get()[0]['name'] }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                @switch( $ticket->status )
                                    @case('open')
                                        <span class="px-2 rounded-full text-sm font-light text-red-700 bg-red-100">{{ $ticket->status }}</span>
                                        @break
                                    @case('in_progress')
                                        <span class="px-2 rounded-full text-sm font-light text-blue-700 bg-blue-100">{{ $ticket->status }}</span>
                                        @break
                                    @case('completed')
                                        <span class="px-2 rounded-full text-sm font-light text-green-700 bg-green-100">{{ $ticket->status }}</span>
                                        @break
                                    @default
                                @endswitch
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ '/ticket/'.$ticket->id }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-600">
                                    {{ __('View details') }}
                                </a>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="my-4">
                {{ $tickets->links() }}
            </div>

        </div>
    </div>
</x-app-layout>
