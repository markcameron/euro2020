<div>
    <button wire:click="$emit('closePrediction')" class="w-10 mb-4 text-white font-bold">
        <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fillRule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clipRule="evenodd" />
        </svg>
    </button>

    <div class="bg-white rounded-lg">
        <div class="p-4">
            <p class="mb-2 uppercase tracking-wide text-sm font-bold text-gray-700">{{ $match->date->format('l jS - H:i') }}</p>
            <div class="text-3xl text-gray-900 flex flex-row">
                <div class="mr-4 flex items-center">@flag($match->teamHome->code, 'w-6')</div>
                <div class="flex-grow">{{ $match->teamHome->name }}</div>
                <div class="w-8 flex items-center" wire:click="decreaseScore('home')">
                    <x-icon name="heroicon-o-minus-sm" class="text-euro-darkest w-7 h-7"></x-icon>
                </div>
                <div class="w-8 flex items-center justify-center">{{ $match->userPrediction->score_home ?? 0}}</div>
                <div class="w-8 flex items-center" wire:click="increaseScore('home')">
                    <x-icon name="heroicon-o-plus-sm" class="text-euro-darkest"></x-icon>
                </div>
            </div>
            <div class="text-3xl text-gray-900 flex flex-row">
                <div class="mr-4 flex items-center">@flag($match->teamAway->code, 'w-6')</div>
                <div class="flex-grow">{{ $match->teamAway->name }}</div>
                <div class="w-8 flex items-center" wire:click="decreaseScore('away')">
                    <x-icon name="heroicon-o-minus-sm" class="text-euro-darkest w-7 h-7"></x-icon>
                </div>
                <div class="w-8 flex items-center justify-center"><span>{{ $match->userPrediction->score_away ?? 0}}</span></div>
                <div class="w-8 flex items-center" wire:click="increaseScore('away')">
                    <x-icon name="heroicon-o-plus-sm" class="text-euro-darkest"></x-icon>
                </div>
            </div>
            <p class="mt-2 text-gray-500 tracking-tighter uppercase text-sm">{{ $match->stadium->name }} - {{ $match->stadium->city }}</p>
        </div>
    </div>
</div>
