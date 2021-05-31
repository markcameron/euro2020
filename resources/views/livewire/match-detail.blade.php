<div>

    <button wire:click="$emit('closeMatch')" class="w-10 mb-4 text-white font-bold">
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
                <div class="w-8">{{ $match->started ? $match->score_home : '' }}</div>
            </div>
            <div class="text-3xl text-gray-900 flex flex-row">
                <div class="mr-4 flex items-center">@flag($match->teamAway->code, 'w-6')</div>
                <div class="flex-grow">{{ $match->teamAway->name }}</div>
                <div class="w-8">{{ $match->started ? $match->score_away : '' }}</div>
            </div>
            <p class="mt-2 text-gray-500 tracking-tighter uppercase text-sm">{{ $match->stadium->name }} - {{ $match->stadium->city }}</p>
        </div>
        @if ($match->goals->isNotEmpty())
            <div class="border-t py-2 bg-gray-100 border-gray-300">
                @foreach ($match->goals as $goal)
                    <div class="px-4 py-1 border-b border-gray-200 last:border-b-0 flex flex-row">
                        <div class="flex-1 font-bold">{{ $goal->team === 'home' ? $goal->scored_by : '' }}</div>
                        <div class="w-10 text-center font-bold">{{ $goal->minute }}'</div>
                        <div class="flex-1 font-bold text-right">{{ $goal->team === 'away' ? $goal->scored_by : '' }}</div>
                    </div>
                @endforeach
            </div>
        @endif
        @if ($match->started)
            <div class="border-t border-gray-300 rounded-b-lg">
                @foreach ($match->predictions as $prediction)
                    <div class="flex items-center px-2 py-2 border-b border-gray-300 last:border-b-0">
                        <div class="mr-2 bg-{{ $prediction->user->background_color }} w-10 h-10 rounded-full flex items-center justify-center">
                            <x-icon name="{{ $prediction->user->avatar }}" class="text-{{ $prediction->user->color }} w-7 h-7"></x-icon>
                        </div>
                        <div class="flex-grow">
                            <p class="font-bold text-gray-900">{{ $prediction->user->name }}</p>
                            <p class="text-sm text-gray-700">{{ $prediction->user->catchphrase }}</p>
                        </div>
                        <div class="w-14 text-2xl font-bold">
                            {{ $prediction->score_home }} - {{ $prediction->score_away }}
                        </div>
                        <div class="bg-cover bg-center w-8 h-8 rounded-full ml-2">
                            <x-prediction-icon :prediction="$prediction" />
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100 text-center rounded-b-lg">
                <p>User predictions will appear after kick-off</p>
            </div>
        @endif
    </div>

</div>
