<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-gray-200">
            {{ __('Verify your account') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form class="flex justify-center" action="{{ __('activate') }}" method="post">
                @csrf

                <div class="w-2/3">
                    <label for="token" class="text-gray-600 dark:text-gray-200">Please enter the account activation token you received on your inbox.</label>
                    <div class="flex items-center">
                        <input type="text" id="token" name="token">
                        <x-jet-button type="submit" class="ml-4">
                            <svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            {{ __('Activate') }}
                        </x-jet-button>
                    </div>
                    @error('token')
                        <small class="text-sm text-red-700">
                            {{ $message }}
                        </small>
                    @enderror
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
