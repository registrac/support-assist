<div>
    <div class="flex justify-between align-middle">
        <h2 class="text-4xl font-bold">
            {{ $contract->companies[0]['name'] }}
        </h2>

        <button class="outline-0" wire:click="$toggle('confirmingContractDeletion')">
            <svg class="w-10 h-10 p-2 text-gray-400 rounded-lg hover:text-gray-600 hover:bg-indigo-50" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
        </button>

    </div>

    <p class="my-6 flex items-center">
        <svg class="text-gray-600 align-middle w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        <span class="text-sm align-middle">
            {{ __('From ') . date('M d, Y', strtotime( $contract->start )) . __(' to ') . date('M d, Y', strtotime( $contract->end )) }}
        </span>
    </p>

    <p class="my-6 flex items-center">
        <svg class="text-gray-600 align-middle w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
        </svg>
        <span class="text-sm align-middle">
            {{ __('Remote hours: ') . $contract->remote_hours }}
        </span>
    </p>

    <p class="my-6 flex items-center">
        <svg class="text-gray-600 align-middle w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
        </svg>
        <span class="text-sm align-middle">
            {{ __('On site hours: ') . $contract->remote_hours }}
        </span>
    </p>

    <p class="my-6 flex items-center">
        <svg class="text-gray-600 align-middle w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
        </svg>
        <span class="text-sm align-middle">
            <a class="text-indigo-700 hover:text-indigo-500" href="{{ $contract->id.'/view-file' }}" target="__blank">{{ __('Download contract') }}</a>
        </span>
    </p>

    <div class="mt-12 border border-gray-100 p-6 rounded-xl">
        <p class="mb-4 font-bold">
            {{ __('Contract description') }}
        </p>
        {!! nl2br( $contract->desc ) !!}
    </div>

    <x-jet-confirmation-modal wire:model="confirmingContractDeletion">
        <x-slot name="title">
            Delete Contract
        </x-slot>

        <x-slot name="content">
            Are you sure you want to delete this contract? Once the contract is deleted, all of its data will be permanently deleted.
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingContractDeletion')" wire:loading.attr="disabled">
                Nevermind
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="deleteContract" wire:loading.attr="disabled">
                Delete Contract
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>

</div>
