<div>
    @if ( $successMessage )
        <div class="flex w-100 bg-green-100 rounded border border-green-200 py-3 my-4 px-2 text-green-800">
            <svg class="w-6 h-6 text-green-800 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ $successMessage }}
        </div>
    @endif

    <form wire:submit.prevent="updateTicket" method="POST">

        <div class="flex">
            <div class="w-1/2">

                <div class="w-2/3">
                    <div class="my-6">
                        <label for="status" class="block font-medium text-sm text-gray-700 dark:text-gray-200">{{ __('Status') }}</label>
                        <select wire:model.defer="status" name="status" id="status">
                            <option value="open" @if($status == 'open') selected @endif>{{__('Open')}}</option>
                            <option value="in_progress" @if($status == 'in_progress') selected @endif>{{__('In progress')}}</option>
                            <option value="completed" @if($status == 'completed') selected @endif>{{__('Completed')}}</option>
                        </select>
                    </div>

                    <div class="my-6">
                        <label for="mode" class="block font-medium text-sm text-gray-700 dark:text-gray-200">{{ __('Mode') }}</label>
                        <select wire:model.defer="mode" name="mode" id="mode">
                            <option value="remote" @if($mode == 'remote') selected @endif>{{__('Remote')}}</option>
                            <option value="on_site" @if($mode == 'on_site') selected @endif>{{__('On site')}}</option>
                        </select>
                    </div>

                    <div class="my-6">
                        <label for="priority" class="block font-medium text-sm text-gray-700 dark:text-gray-200">{{ __('Priority') }}</label>
                        <select wire:model.defer="priority" name="priority" id="priority">
                            <option value="low" @if($priority == 'low') selected @endif>{{__('Low')}}</option>
                            <option value="medium" @if($priority == 'medium') selected @endif>{{__('Medium')}}</option>
                            <option value="high" @if($priority == 'high') selected @endif>{{__('High')}}</option>
                        </select>
                    </div>

                    <div class="my-6">
                        <label for="priority" class="block font-medium text-sm text-gray-700 dark:text-gray-200">{{ __('Hours spent on this ticket') }}</label>
                        <input wire:model.defer="total_hours" type="text" name="total_hours">
                    </div>
                </div>

            </div>

            <div class="w-1/2">
                <div class="my-6">
                    <label for="notes" class="block font-medium text-sm text-gray-700 dark:text-gray-200">{{ __('Internal Notes') }}</label>
                    <textarea wire:model.defer="notes" name="notes" id="notes" rows="12"
                        class="form-input w-full">{{ $notes ?? '' }}</textarea>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <x-jet-button>
                {{ __('Save') }}
            </x-jet-button>
        </div>

    </form>

</div>
