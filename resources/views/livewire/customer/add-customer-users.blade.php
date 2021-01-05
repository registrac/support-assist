<div>
    <div class="my-4 flex justify-end">
        <button class="flex items-center font-semibold bg-indigo-600 hover:bg-indigo-500 text-white font px-4 py-2 rounded shadow" wire:click="$toggle('addUser')" >
            <svg class="w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
            </svg>
            {{ __('Invite') }}
        </button>
    </div>

    <x-jet-dialog-modal wire:model="addUser">
        <x-slot name="title">
            Invite User
        </x-slot>

        <x-slot name="content">
            <div class="my-2">
                <x-jet-label class="dark:text-gray-200">Name <span class="text-red-600">*</span></x-jet-label>
                <x-jet-input class="w-full dark:bg-gray-900 dark:border-gray-700" type="text" wire:model="name"></x-jet-input>
            </div>
            <div class="my-2">
                <x-jet-label class="dark:text-gray-200">Email <span class="text-red-600">*</span></x-jet-label>
                <x-jet-input class="w-full dark:bg-gray-900 dark:border-gray-700" type="email" wire:model="email"></x-jet-input>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('addUser')" wire:loading.attr="disabled">
                Cancel
            </x-jet-secondary-button>

            <x-jet-button class="ml-2" wire:click="inviteUser" wire:loading.attr="disabled">
                Send Invitation
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
