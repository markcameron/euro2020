<div class="m-4">

    @if ($showPredictionForm)
        <livewire:prediction :match="$match" />
    @else

        @foreach ($matches as $match)
            <livewire:prediction-row :match="$match"/>
        @endforeach

    @endif

</div>
