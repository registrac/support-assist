<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <a href="{{ route('customers') }}">
                <svg class="w-6 mr-4 text-indigo-700 dark:text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Customer') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-900 dark:text-gray-200 overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                    <div class="flex justify-between align-middle">
                        <h2 class="text-4xl font-bold">
                            {{ $customer->name }}
                        </h2>

                        <div class="flex">
                            <a class="mx-2" href="{{ '/customer/'.$customer->id.'/users' }}">
                                <svg class="w-10 h-10 p-2 text-gray-400 rounded-lg hover:text-gray-600 hover:bg-indigo-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                            </a>
                            <a class="mx-2" href="{{ '/customer/'.$customer->id.'/edit' }}">
                                <svg class="w-10 h-10 p-2 text-gray-400 rounded-lg hover:text-gray-600 hover:bg-indigo-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    {{-- Customer details --}}
                    <div class="flex justify-between items-center">
                        {{-- Left side --}}
                        <div class="sm:mr-1/6 md:mr-1/6">
                            <p class="my-6 flex items-center">
                                <svg class="text-gray-600 align-middle w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                                <span class="text-sm align-middle">
                                    <a class="text-indigo-700 dark:text-indigo-500 hover:text-indigo-500" href="mailto:{{ $customer->email }}">{{ $customer->email }}</a>
                                </span>
                            </p>
                            <p class="my-6 flex items-center">
                                <svg class="text-gray-600 align-middle w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span class="text-sm align-middle">
                                    {{ $customer->tel }}
                                </span>
                            </p>
                            <p class="my-6 flex items-center">
                                <svg class="text-gray-600 align-middle w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span class="text-sm align-middle">
                                    <a class="text-indigo-700 dark:text-indigo-500 hover:text-indigo-500" href="{{ 'https://www.google.com/maps/place/' . str_replace(' ', '+',  $customer->postal_address) }}" target="_blank">{{ $customer->postal_address }}</a>
                                </span>
                            </p>
                            <p class="my-6 flex items-center">
                                <span class="text-sm align-middle">
                                    <svg class="text-gray-600 align-middle w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </span>
                                <span class="text-sm align-middle">
                                    @if ( ! empty( $customer->contracts->toArray() ) )
                                        <a class="text-indigo-700 dark:text-indigo-500 hover:text-indigo-500" href="{{ '/contract/' . $customer->contracts[0]['id'] }}">{{ __('View contract details.') }}</a>
                                    @else
                                        <span class="flex">
                                            {{ __('No contract on file.') }}
                                            <a class="text-indigo-700 dark:text-indigo-500 hover:text-indigo-500 ml-2" href="{{ route('contract-create') }}">
                                                {{__('Add contract')}}
                                            </a>
                                        </span>
                                    @endif
                                </span>
                            </p>

                            @if ( $customer->stripe_id )

                                <p class="my-6 flex items-center">
                                    <span class="text-sm align-middle">
                                        <svg class="text-gray-600 align-middle w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                    </span>
                                    <span class="text-sm align-middle">
                                        <a class="text-indigo-700 dark:text-indigo-500 hover:text-indigo-500" href="{{ '/customer/'.$customer->id.'/billing' }}">
                                            {{ __('View billing details') }}
                                        </a>
                                    </span>
                                </p>

                            @endif

                        </div>

                        {{-- Right side --}}
                        <div class="flex">
                            <div class="mr-4 p-6 bg-green-50 border border-green-200 text-green-700 rounded-xl text-center">
                                <p class="text-4xl">
                                    {{ $mtd_remote }}
                                </p>
                                <small>
                                    {{ __('MTD Remote') }}
                                </small>
                            </div>

                            <div class="mr-4 p-6 bg-blue-50 border border-blue-200 text-blue-700 rounded-xl text-center">
                                <p class="text-4xl">
                                    {{ $mtd_onsite ?? 0 }}
                                </p>
                                <small>
                                    {{ __('MTD On site') }}
                                </small>
                            </div>
                        </div>

                    </div>

            </div>

            <div class="bg-white dark:bg-gray-900 dark:text-gray-200 overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800 border border-gray-100 dark:border-gray-900 dark:bg-gray-900 dark:text-gray-200 rounded-lg">
                    <thead class="bg-gray-50 dark:bg-gray-900 dark:text-gray-200">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Subject') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Date Created') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Priority') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Status') }}
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 dark:text-gray-800 dark:divide-gray-800">
                        @forelse ($tickets as $ticket)
                        <tr class="text-sm">
                            <td class="px-6 py-4 whitespace-nowrap dark:bg-gray-900 dark:text-gray-200">
                                {{ $ticket->title }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap dark:bg-gray-900 dark:text-gray-200">
                                {{ date('M d, Y h:i a', strtotime($ticket->created_at)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap capitalize dark:bg-gray-900 dark:text-gray-200">
                                {{ $ticket->priority }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap dark:bg-gray-900 dark:text-gray-200">
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
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium dark:bg-gray-900 dark:text-gray-200">
                                <a href="{{ '/ticket/'.$ticket->id }}" class="text-indigo-600 hover:text-indigo-900">
                                    {{ __('View details') }}
                                </a>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>

                <div class="my-4">
                    {{ $tickets->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
