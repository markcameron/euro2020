<div class="m-4">

    @foreach ($matches as $match)
        <livewire:match-row :match="$match"/>
    @endforeach

</div>
