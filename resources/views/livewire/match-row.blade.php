<div class="mb-2 p-2 rounded-lg bg-white border border-gray-100 dark:bg-gray-900 dark:border-gray-800">
    <div class="flex flex-row">
        <div class="mr-2">FLAG</div>
        <div class="flex-grow">{{ $match->teamHome->name }}</div>
        @if (is_null($match->score_home))
            <div class="w-16 uppercase text-center">{{ $match->date->format('D j') }}</div>
        @else
            <div class="w-4">{{ $match->score_home }}</div>
        @endif
    </div>
    <div class="flex flex-row">
        <div class="mr-2">FLAG</div>
        <div class="flex-grow">{{ $match->teamAway->name }}</div>
        @if (is_null($match->score_away))
            <div class="w-16 text-center">{{ $match->date->format('H:i') }}</div>
        @else
            <div class="w-4">{{ $match->score_away }}</div>
        @endif
    </div>
</div>
