<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <a href="{{ route('customers') }}">
                <svg class="w-6 mr-4 text-indigo-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
                </svg>
            </a>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Customer Users') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @livewire('add-customer-users', ['company' => $company])

            @if ( session('success_message') )
                <div class="flex w-100 bg-green-100 rounded border border-green-200 py-3 px-2 my-6 text-green-800">
                    <svg class="w-6 h-6 text-green-800 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ session('success_message') }}
                </div>
            @endif

            <div class="bg-white dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg">

                <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-800">
                    <thead class="bg-gray-50 dark:bg-gray-900">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Name') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Email') }}
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                {{ __('Status') }}
                            </th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-900 divide-y divide-gray-200 dark:divide-gray-800">
                        @forelse ($users as $user)
                        <tr class="text-sm">
                            <td class="px-6 py-4 whitespace-nowrap dark:text-gray-200">
                                {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-gray-200">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap dark:text-gray-200">
                                @if ( ! $user->isActive() )
                                    <span class="px-2 rounded-full text-sm font-light text-red-700 bg-red-100">{{ __('Inactive') }}</span>
                                @else
                                    <span class="px-2 rounded-full text-sm font-light text-green-700 bg-green-100">{{ __('Active') }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right text-sm font-medium flex justify-end items-center">
                                @if ( ! $user->isActive() )
                                    <form action="{{ '/customers/user/'.$user->id.'/invite' }}" method="post">
                                        @csrf
                                        <button type="submit" class="text-indigo-600 hover:text-indigo-900 mr-4">
                                            {{ __('Resend invitation') }}
                                        </button>
                                    </form>
                                @endif

                                @livewire('delete-customer-users', ['user' => $user, 'company' => $company])
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
