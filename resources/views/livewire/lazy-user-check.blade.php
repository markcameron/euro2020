<div class="m-4">

    <div class="mb-2 py-2 px-4 rounded-lg bg-white border border-white">
        @foreach ($users as $user)
            <div class="grid grid-cols-2 p-2 border-b">
                <div>
                    {{ $user->name }}
                </div>
                <div class="text-right font-bold">
                    <span class="{{ $user->predictions->count() < $matchCount ? 'text-red-400' : 'text-green-400' }}">{{ $user->predictions->count() }}</span> / {{ $matchCount }}
                </div>
            </div>
        @endforeach
    </div>

</div>
