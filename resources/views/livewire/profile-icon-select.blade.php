<x-jet-action-section>
    <x-slot name="title">
        {{ __('Avatar') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Customize your profile avatar') }}
    </x-slot>

    <x-slot name="content">
        <div class="flex justify-center">
            <div class="w-20 h-20 rounded-full flex items-center justify-center bg-{{ $selectedBackgroundColor }}">
                <x-icon name="{{ $selectedIcon }}" class="text-{{ $selectedForegroundColor }} w-14 h-14"></x-icon>
            </div>
        </div>

        <h3 class="font-bold mt-8">Background Color</h3>
        <div class="flex">
            @foreach ($backgroundColors as $color)
                <div wire:click="setBackgroundColor('{{ $color }}')" class="flex-1 p-1">
                    <div class="inline-block rounded-full p-1 border-2 {{ $selectedBackgroundColor === 'white' && $color === 'white' ? 'gray-700' : ($selectedBackgroundColor === $color ? 'border-'. $color : 'border-white') }}">
                        <div class="rounded-full bg-{{ $color }} w-6 h-6 {{ $color === 'white' ? 'border border-gray-700' : '' }}"></div>
                    </div>
                </div>
            @endforeach
        </div>

        <h3 class="font-bold">Foreground Color</h3>
        <div class="flex">
            @foreach ($foregroundColors as $color)
                <div wire:click="setForegroundColor('{{ $color }}')" class="flex-1 p-1">
                    <div class="inline-block rounded-full p-1 border-2 {{ $selectedForegroundColor === $color ? 'border-'. $color : 'border-white' }}">
                        <div class="rounded-full bg-{{ $color }} w-6 h-6"></div>
                    </div>
                </div>
            @endforeach
        </div>

        <h3 class="font-bold">Symbol</h3>
        <div class="grid grid-cols-6">
            @foreach ($icons as $icon)
                <div wire:click="setAvatar('{{ $icon }}')">
                    <x-icon name="{{ $icon }}" class="text-{{ $selectedIcon === $icon ? 'euro' : 'gray-400' }}"></x-icon>
                </div>
            @endforeach
        </div>
    </x-slot>

</x-jet-action-section>
