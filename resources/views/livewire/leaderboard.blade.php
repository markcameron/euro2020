<div class="m-4">

    <div class="bg-white rounded-lg py-2">
        @foreach ($users as $position => $user)
            <div class="py-4 pr-4 flex items-center py-2 border-b border-gray-300 last:border-b-0">
                <div class="w-8 mx-1 font-bold text-grey-900 text-2xl text-center">{{ $position + 1 }}</div>
                <div class="mr-2 bg-cover bg-center w-8 h-10 rounded-full flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" class="text-green-600">
                        <path d="M2 10.5a1.5 1.5 0 113 0v6a1.5 1.5 0 01-3 0v-6zM6 10.333v5.43a2 2 0 001.106 1.79l.05.025A4 4 0 008.943 18h5.416a2 2 0 001.962-1.608l1.2-6A2 2 0 0015.56 8H12V4a2 2 0 00-2-2 1 1 0 00-1 1v.667a4 4 0 01-.8 2.4L6.8 7.933a4 4 0 00-.8 2.4z" />
                    </svg>
                </div>
                <div class="flex-grow">
                    <p class="font-bold text-gray-900">{{ $user->name }}</p>
                    <p class="text-sm text-gray-700">{{ $user->catchphrase }}</p>
                </div>
                <div class="w-14 text-2xl font-bold text-right">
                    {{ $user->score }}
                </div>
            </div>
        @endforeach
    </div>

</div>
