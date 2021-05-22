<button wire:click="selectTab({{ $tab }})" class="{{ $classes }}">
    {{ $slot }}
    <span class="font-bold">{{ $text }}</span>
</button>
