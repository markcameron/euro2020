<div class="m-4">

    <x-toggle label="Stats"></x-toggle>

    <div class="bg-white rounded-lg py-2">
        @foreach ($users as $position => $user)
            <div class="border-b border-gray-300 last:border-b-0">
                <div class="py-4 pr-4 py-2 flex items-center">
                    <div class="w-8 mx-1 flex-shrink-0 font-bold text-grey-900 text-2xl text-center">{{ $position + 1 }}</div>
                    <div class="mr-2 bg-{{ $user->background_color }} w-10 h-10 rounded-full flex-shrink-0 flex items-center justify-center">
                        <x-icon name="{{ $user->avatar }}" class="text-{{ $user->color }} w-7 h-7"></x-icon>
                    </div>
                    <div class="flex-grow">
                        <p class="font-bold text-gray-900">{{ $user->nickname ?? $user->name }}</p>
                        <p class="text-sm text-gray-700">{{ $user->catchphrase }}</p>
                        @if ($user->nickname)
                            <p class="text-sm text-gray-700">{{ $user->name }}</p>
                        @endif
                    </div>
                    <div class="w-14 flex-shrink-0 text-2xl font-bold text-right">
                        {{ $user->score }}
                    </div>
                </div>
                @if ($showStats)
                    <div class="border-t border-gray-200 p-2 bg-gray-50 grid grid-cols-4">
                        <x-leaderboard-stat type="ES">
                            {{ $user->prediction_stats->get(\App\Models\Prediction::EXACT_SCORE)?->count() ?? 0 }}
                        </x-leaderboard-stat>
                        <x-leaderboard-stat type="GD">
                            {{ $user->prediction_stats->get(\App\Models\Prediction::GOAL_DIFFERENCE)?->count() ?? 0 }}
                        </x-leaderboard-stat>
                        <x-leaderboard-stat type="W">
                            {{ $user->prediction_stats->get(\App\Models\Prediction::WINNER)?->count() ?? 0 }}
                        </x-leaderboard-stat>
                        <x-leaderboard-stat type="L">
                            {{ $user->prediction_stats->get(\App\Models\Prediction::LOSER)?->count() ?? 0 }}
                        </x-leaderboard-stat>
                    </div>
                @endif
            </div>
        @endforeach
    </div>

</div>
