<div class="sm:flex">
    <div class="bg-green-50 shadow-sm rounded-lg p-6 sm:w-1/3 mx-6 sm:ml-0 sm:mr-6 my-6 border-b-2 border-green-400 text-gray-600">
        <h1 class="text-4xl font-bold" wire:poll>
            {{ $closed_tickets ?? 0 }}
        </h1>
        <p class="font-normal">
            {{ __('MTD Closed tickets') }}
        </p>
    </div>

    <div class="bg-red-50 shadow rounded-lg p-6 sm:w-1/3 mx-6 sm:mx-6 my-6 border-b-2 border-red-400 text-gray-600">
        <h1 class="text-4xl font-bold" wire:poll>
            {{ $open_tickets ?? 0 }}
        </h1>
        <p class="font-normal">
            {{ __('MTD Open tickets') }}
        </p>
    </div>

    <div class="bg-indigo-50 shadow-sm rounded-lg p-6 sm:w-1/3 mx-6 sm:mr-0 sm:ml-6 my-6 border-b-2 border-indigo-400 text-gray-600">
        <h1 class="text-4xl font-bold">
            {{ $mtd }}
        </h1>
        <p class="font-normal">
            {{ __('MTD Total Tickets') }}
        </p>
    </div>
</div>
