<div class="flex items-center justify-end w-full mb-4 mr-2">
    <label
        for="toogleStats"
        class="flex items-center cursor-pointer"
    >
        <!-- label -->
        <div class="mr-3 text-white font-bold">
            {{ $label }}
        </div>
        <!-- toggle -->
        <div class="relative">
            <!-- input -->
            <input id="toogleStats" type="checkbox" class="sr-only" wire:model="showStats"/>
            <!-- line -->
            <div class="w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
            <!-- dot -->
            <div class="dot absolute w-6 h-6 bg-white rounded-full shadow -left-1 -top-1 transition"></div>
        </div>

    </label>
</div>

<style>
    /* Toggle B */
    input:checked ~ .dot {
        transform: translateX(100%);
        background-color: #2BA5B7;
    }
</style>
