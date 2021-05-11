<div class="m-4">

    <div class="bg-white rounded-lg">
        <div class="p-4">
            <p class="mb-2 uppercase tracking-wide text-sm font-bold text-gray-700">{{ $match->date->format('l jS - H:i') }}</p>
            <div class="text-3xl text-gray-900 flex flex-row">
                <div class="mr-4 flex items-center">@flag($match->teamHome->code, 'w-6')</div>
                <div class="flex-grow">{{ $match->teamHome->name }}</div>
                <div class="w-8">{{ $match->score_home ?? 0}}</div>
            </div>
            <div class="text-3xl text-gray-900 flex flex-row">
                <div class="mr-4 flex items-center">@flag($match->teamAway->code, 'w-6')</div>
                <div class="flex-grow">{{ $match->teamAway->name }}</div>
                <div class="w-8">{{ $match->score_away ?? 0}}</div>
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
        @if ($match->show_predictions)
            <div class="border-t border-gray-300 rounded-b-lg">
                @foreach ($match->predictions as $prediction)
                    <div class="flex items-center px-4 py-2 border-b border-gray-300 last:border-b-0">
                        <div class="bg-cover bg-center w-10 h-10 rounded-full mr-3">
                            <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" class="text-green-600">
                                <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                            </svg>
                        </div>
                        <div class="flex-grow">
                            <p class="font-bold text-gray-900">{{ $prediction->user->name }}</p>
                            <p class="text-sm text-gray-700">{{ $prediction->user->catchphrase }}</p>
                        </div>
                        <div class="w-14 text-2xl font-bold">
                            {{ $prediction->score_home }} - {{ $prediction->score_away }}
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
