<div>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form wire:submit.prevent="createContract" method="post">

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
                            <label for="customer" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                {{ __('Customer') }}
                                <span class="text-red-600">*</span>
                            </label>
                            <input wire:model="customer"
                                name="customer"
                                type="search"
                                class="dark:bg-gray-800 dark:border-gray-700 dark:text-gray-200 rounded-md shadow-sm mt-1 w-2/3 block @error('customer') border-red-300 @enderror"
                                autocomplete="off"
                                list="search"
                                placeholder="Start typing here..."
                            >
                            <datalist id="search">
                                @forelse ($queryCustomerName as $customer)
                                    <option value="{{ $customer->name }}">
                                @empty
                                    <option value="{{ __('Nothing found.') }}">
                                @endforelse
                            </datalist>
                            @error('customer')
                                <small class="text-sm text-red-800">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div>
                            <label for="desc" class="block font-medium text-sm text-gray-700 dark:text-gray-200">
                                {{ __('Contract description') }}
                            </label>
                            <textarea
                                wire:model="desc"
                                name="desc"
                                id="desc"
                                cols="30"
                                rows="10"
                                class="form-input rounded-md mt-1 w-full block @error('desc') border-red-300 @enderror"></textarea>
                            @error('desc')
                                <small class="text-sm text-red-800">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-200">
                                {{ __('Signed contract') }}
                                <span class="text-red-600">*</span>
                            </label>
                            <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 dark:border-gray-700 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span class="dark:bg-gray-900">Upload a file</span>
                                    <input wire:model="attachment" id="file-upload" name="attachment" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">
                                    DOC, PDF up to 10MB
                                </p>
                                </div>
                            </div>
                        </div>

                        <div>
                            <label for="start" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contract Start Date <span class="text-red-600">*</span></label>
                            <input wire:model="start" type="date" name="start" class="form-input block">
                        </div>

                        <div>
                            <label for="end" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contract End Date <span class="text-red-600">*</span></label>
                            <input wire:model="end" type="date" name="end" class="form-input block">
                        </div>

                        <div>
                            <label for="remote_hours" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Included remote hours <span class="text-red-600">*</span></label>
                            <input wire:model="remote_hours" type="number" name="remote_hours" class="form-input block">
                        </div>

                        <div>
                            <label for="onsite_hours" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Included on site hours <span class="text-red-600">*</span></label>
                            <input wire:model="onsite_hours" type="number" name="onsite_hours" class="form-input block">
                        </div>

                        <div class="flex justify-end">
                            <x-jet-button class="disabled:bg-gray-50">
                                <svg wire:loading wire:target="createTicket" class="animate-spin h-5 w-5 mr-3 ..." viewBox="0 0 24 24">
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
