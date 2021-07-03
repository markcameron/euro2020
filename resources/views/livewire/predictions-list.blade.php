<div class="m-4">

    <div wire:loading.flex class="text-white h-96 flex items-center justify-center">
        <svg class="animate-spin -ml-1 mr-3 h-16 w-16 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
            <circle class="opacity-30" cx="12" cy="12" r="10" stroke="white" stroke-width="4"></circle>
            <path class="opacity-75" fill="white" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
        </svg>
    </div>

    <div wire:loading.remove>
        @if ($showPredictionForm)
            <livewire:prediction :match="$match" />
        @else

            @if ($todaysMatches->isNotEmpty())
                <div class="mb-6">
                    <div class="mb-2 font-bold font-xl text-white">Today</div>
                    @foreach ($todaysMatches->whereBetween('date', [now()->startOfDay(), now()->endOfDay()]) as $match)
                        <livewire:prediction-row :match="$match"/>
                    @endforeach
                </div>
            @endif

            <div class="mt-4 mb-2 font-bold font-xl text-white">Semi Finals</div>
            @foreach ($matches->where('stage', 'SEMI_FINAL') as $match)
                <livewire:prediction-row :match="$match"/>
            @endforeach

            <div class="mt-4 mb-2 font-bold font-xl text-white">Quarter Finals</div>
            @foreach ($matches->where('stage', 'QUARTER_FINAL') as $match)
                <livewire:prediction-row :match="$match"/>
            @endforeach

            <div class="mt-4 mb-2 font-bold font-xl text-white">Round of 16</div>
            @foreach ($matches->where('stage', 'LAST_16') as $match)
                <livewire:prediction-row :match="$match"/>
            @endforeach

            <div class="mb-2 font-bold font-xl text-white">Group stage</div>
            @foreach ($matches->where('stage', 'GROUP_STAGE') as $match)
                <livewire:prediction-row :match="$match"/>
            @endforeach

        @endif
    </div>

</div>
