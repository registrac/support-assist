<div>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <form wire:submit.prevent="createTicket" method="post">

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

                        @if ( auth()->user()->isAdmin() )
                            <div>
                                <label for="name" class="block font-medium text-sm text-gray-700">
                                    {{ __('Customer') }}
                                    <span class="text-red-600">*</span>
                                </label>
                                <input wire:model="name"
                                    name="name"
                                    type="search"
                                    class="form-input rounded-md shadow-sm mt-1 w-2/3 block @error('name') border-red-300 @enderror"
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
                                @error('name')
                                    <small class="text-sm text-red-800">
                                        {{ __('The customer field is required.') }}
                                    </small>
                                @enderror
                            </div>
                        @endif

                        <div>
                            <label for="title" class="block font-medium text-sm text-gray-700">
                                {{ __('Subject')}}
                                <span class="text-red-600">*</span>
                            </label>
                            <input
                                wire:model="title"
                                type="text"
                                name="title"
                                class="form-input rounded-md shadow-sm mt-1 w-2/3 block @error('title') border-red-300 @enderror"
                                >
                            @error('title')
                                <small class="text-sm text-red-800">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div>
                            <label for="mode" class="block font-medium text-sm text-gray-700">
                                {{ __('Service Mode') }}
                                <span class="text-red-600">*</span>
                            </label>
                            <select
                                wire:model="mode"
                                name="mode"
                                id="mode"
                                class="form-select rounded w-1/3 mt-1 @error('mode') border-red-300 @enderror"
                                >
                                <option value="">{{ __('Select an option') }}</option>
                                <option value="remote">{{ __('Remote') }}</option>
                                <option value="on-site">{{ __('On site') }}</option>
                            </select>
                            @error('mode')
                                <small class="text-sm text-red-800 block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div>
                            <label for="priority" class="block font-medium text-sm text-gray-700">
                                {{ __('Priority') }}
                                <span class="text-red-600">*</span>
                            </label>
                            <select
                                wire:model="priority"
                                name="priority"
                                id="priority"
                                class="form-select rounded w-1/3 mt-1 @error('priority') border-red-300 @enderror"
                                >
                                <option value="">{{ __('Select an option') }}</option>
                                <option value="low">{{ __('Low') }}</option>
                                <option value="medium">{{ __('Medium') }}</option>
                                <option value="high">{{ __('High') }}</option>
                            </select>
                            @error('priority')
                                <small class="text-sm text-red-800 block">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div>
                            <label for="desc" class="block font-medium text-sm text-gray-700">
                                {{ __('Description') }}
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
                            <label class="block text-sm font-medium text-gray-700">
                                {{ __('Attachment') }}
                            </label>
                            <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                    <span>Upload a file</span>
                                    <input wire:model="attachment" id="file-upload" name="attachment" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">
                                    JPG, JPEG, PNG, PDF up to 10MB
                                </p>
                                </div>
                            </div>
                        </div>

                        @if ( auth()->user()->isAdmin() )
                            <div>
                                <label for="notify" class="block text-sm font-medium text-gray-700">
                                    {{ __('Notify via email:') }}
                                </label>
                                <select name="notify[]" wire:model="notify" multiple class="mt-1">
                                    {{--  --}}
                                    @if ($emails)
                                        @forelse ($emails as $email)
                                            <option value="{{ $email->email }}">{{ $email->email }}</option>
                                        @empty
                                            <option disabled>{{ __('There are currently no users registered for this customer.') }}</option>
                                        @endforelse
                                    @else
                                        <option disabled>{{ __('Please select a customer for notification options.') }}</option>
                                    @endif
                                </select>
                            </div>
                        @endif

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
