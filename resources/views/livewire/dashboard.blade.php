<div>
    {{-- Be like water. --}}

    <div class="sm:flex">
        {{-- Count total open tickets --}}
        <div class="bg-red-50 shadow-sm rounded-lg p-6 sm:w-1/2 lg:w-1/4 mx-6 sm:ml-0 sm:mr-6 my-6 border-b-2 border-red-400 text-gray-600">
            <h1 class="text-4xl font-bold" wire:poll>
                {{ $open_tickets ?? 0 }}
            </h1>
            <p class="font-normal">
                {{ __('Open Tickets') }}
            </p>
        </div>

        {{-- Count total in progress tickets --}}
        <div class="bg-yellow-50 shadow-sm rounded-lg p-6 sm:w-1/2 lg:w-1/4 mx-6 sm:ml-0 sm:mr-6 my-6 border-b-2 border-yellow-400 text-gray-600">
            <h1 class="text-4xl font-bold" wire:poll>
                {{ $in_progress_tickets ?? 0 }}
            </h1>
            <p class="font-normal">
                {{ __('In Progress Tickets') }}
            </p>
        </div>

        {{-- Count total closed tickets --}}
        <div class="bg-green-50 shadow-sm rounded-lg p-6 sm:w-1/2 lg:w-1/4 mx-6 sm:ml-0 sm:mr-6 my-6 border-b-2 border-green-400 text-gray-600">
            <h1 class="text-4xl font-bold" wire:poll>
                {{ $closed_tickets ?? 0 }}
            </h1>
            <p class="font-normal">
                {{ __('Closed Tickets') }}
            </p>
        </div>

        {{-- Count total hours worked MTD --}}
        <div class="bg-indigo-50 shadow-sm rounded-lg p-6 sm:w-1/2 lg:w-1/4 mx-6 sm:ml-0 sm:mr-6 my-6 border-b-2 border-indigo-400 text-gray-600">
            <h1 class="text-4xl font-bold" wire:poll>
                {{ $total_mtd_tickets ?? 0 }}
            </h1>
            <p class="font-normal">
                {{ __('MTD Total Tickets') }}
            </p>
        </div>
    </div>
</div>
