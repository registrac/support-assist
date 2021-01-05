<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contracts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ( session('error_message') )
                <div class="flex w-100 bg-red-100 rounded border border-red-200 py-3 px-2 text-red-800">
                    <svg class="w-6 h-6 text-red-800 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('error_message') }}
                </div>
            @endif

            @if ( session('success_message') )
                <div class="flex w-100 bg-red-100 rounded border border-red-200 py-3 px-2 text-red-800">
                    <svg class="w-6 h-6 text-red-800 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('error_message') }}
                </div>
            @endif

            <div class="my-4 flex justify-end">
                <a class="flex items-center font-semibold bg-indigo-600 hover:bg-indigo-500 text-white font px-4 py-2 rounded shadow" href="{{ route('contract-create') }}" >
                    <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                    </svg>
                    {{ __('New') }}
                </a>
            </div>

            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">

                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 dark:bg-gray-900">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('#') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Customer') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Effective Date') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Ending Date') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200">
                        @forelse ($contracts as $contract)
                        <tr class="text-sm">
                            <td class="px-6 py-4 whitespace-nowrap dark:text-gray-200">
                                {{ $contract->id }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-gray-200">
                                {{ $contract->companies[0]['name'] ?? 'n/a'}}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-gray-200">
                                {{ date('M d, Y h:i a', strtotime($contract->start)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-gray-200">
                                {{ date('M d, Y h:i a', strtotime($contract->end)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ '/contract/'.$contract->id }}" class="text-indigo-600 hover:text-indigo-900">
                                    {{ __('View details') }}
                                </a>
                            </td>
                        </tr>
                        @empty

                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>
