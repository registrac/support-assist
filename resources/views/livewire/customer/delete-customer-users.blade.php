<div>
    {{-- Do your work, then step back. --}}
    <button wire:click="$toggle('confirmUserDeletion')">
        <svg class="text-red-600 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
    </button>

    <x-jet-confirmation-modal wire:model="confirmUserDeletion">
        <x-slot name="title">
            Delete Account
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete this account? Once the account is deleted, all of its resources and data will be permanently deleted.') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmUserDeletion')" wire:loading.attr="disabled">
                Nevermind
            </x-jet-secondary-button>

            <form wire:submit.prevent="delete" method="post">
                <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                    Delete Account
                </x-jet-danger-button>
            </form>
        </x-slot>
    </x-jet-confirmation-modal>

</div>
