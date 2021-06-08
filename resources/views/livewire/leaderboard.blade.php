<div class="m-4">

    <div class="bg-white rounded-lg py-2">
        @foreach ($users as $position => $user)
            <div class="py-4 pr-4 flex items-center py-2 border-b border-gray-300 last:border-b-0">
                <div class="w-8 mx-1 font-bold text-grey-900 text-2xl text-center">{{ $position + 1 }}</div>
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
                <div class="w-14 text-2xl font-bold text-right">
                    {{ $user->score }}
                </div>
            </div>
        @endforeach
    </div>

</div>
