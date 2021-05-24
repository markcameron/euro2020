<div class="m-4">

    @if ($showMatchDetail)
        <livewire:match-detail :match="$game" />
    @else

        @foreach ($matches as $match)
            <livewire:match-row :match="$match"/>
        @endforeach

    @endif

</div>
