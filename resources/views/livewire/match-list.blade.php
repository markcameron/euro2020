<div class="m-4">

    <div wire:loading.flex class="text-white h-96 flex items-center justify-center">
        <svg class="animate-spin -ml-1 mr-3 h-16 w-16 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-30" cx="12" cy="12" r="10" stroke="white" stroke-width="4"></circle>
            <path class="opacity-75" fill="white" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>

    <div wire:loading.remove>
        @if ($showMatchDetail)
            <livewire:match-detail :match="$game" />
        @else

            @foreach ($matches as $match)
                <livewire:match-row :match="$match"/>
            @endforeach

        @endif
    </div>

</div>
