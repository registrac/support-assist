<div>
    <div class="p-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <form wire:submit.prevent="createCustomer" method="post">

                <div class="shadow rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white dark:bg-gray-900 space-y-6 sm:p-6">

                        @if ( $successMessage )
                            <div class="flex w-100 bg-green-100 rounded border border-green-200 py-3 px-2 text-green-800">
                                <svg class="w-6 h-6 text-green-800 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                {{ $successMessage }}
                            </div>
                        @endif

                        <div>
                            <label for="name" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                {{ __('Company Name') }}
                                <span class="text-red-600">*</span>
                            </label>
                            <input wire:model.defer="name" name="name" type="text" value="{{ old('name') }}">
                            @error('name')
                                <small class="text-sm text-red-600">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div>
                            <label for="email" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                {{ __('Email') }}
                                <span class="text-red-600">*</span>
                            </label>
                            <input wire:model.defer="email" name="email" type="email" value="{{ old('email') }}" class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 rounded-md shadow-sm mt-1 block w-full @error('email') border-red-300 @enderror">
                            @error('email')
                                <small class="text-sm text-red-600">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div>
                            <label for="tel" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                {{ __('Phone') }}
                                <span class="text-red-600">*</span>
                            </label>
                            <input wire:model.defer="tel" name="tel" type="tel" value="{{ old('tel') }}" class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 rounded-md shadow-sm mt-1 block w-full @error('tel') border-red-300 @enderror">
                            @error('tel')
                                <small class="text-sm text-red-600">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div>
                            <label for="address" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                {{ __('Address') }}
                                <span class="text-red-600">*</span>
                            </label>
                            <input wire:model.defer="postal_address" name="postal_address" type="text" value="{{ old('postal_address') }}" class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 rounded-md shadow-sm mt-1 block w-full @error('postal_address') border-red-300 @enderror">
                            @error('postal_address')
                                <small class="text-sm text-red-600">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div>
                            <label for="stripe_id" class="block font-medium text-sm text-gray-700 dark:text-gray-200" title="{{__("Enter customer's Stripe ID")}}">
                                {{ __('Billing ID') }}
                                <span class="text-red-600">*</span>
                            </label>
                            <input wire:model.defer="stripe_id" name="stripe_id" type="text" value="{{ old('stripe_id') }}" class="dark:bg-gray-800 dark:text-gray-100 dark:border-gray-700 rounded-md shadow-sm mt-1 block w-full @error('stripe_id') border-red-300 @enderror">
                            @error('stripe_id')
                                <small class="text-sm text-red-600">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="flex justify-end">
                            <x-jet-button class="disabled:bg-gray-50">
                                <svg wire:loading class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                {{ __('Create') }}
                            </x-jet-button>
                        </div>

                    </div>
                </div>

            </form>

        </div>
    </div>
</div>
