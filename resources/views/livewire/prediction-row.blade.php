<div wire:click="$emit('showPrediction', '{{ $match->id }}')" class="mb-2 py-2 px-4 rounded-lg bg-white border border-white dark:bg-gray-900 dark:border-gray-800 font-bold">

    <div class="flex flex-row">
        <div class="mr-4 flex items-center">@flag($match->teamHome->code, 'w-4')</div>
        <div class="flex-grow">{{ $match->teamHome->name }}</div>
        <div class="w-4">{{ $match->userPrediction?->score_home ?? '-' }}</div>
    </div>

    <div class="flex flex-row">
        <div class="mr-4 flex items-center">@flag($match->teamAway->code, 'w-4')</div>
        <div class="flex-grow">{{ $match->teamAway->name }}</div>
        <div class="w-4">{{ $match->userPrediction?->score_away ?? '-' }}</div>
    </div>

</div>
