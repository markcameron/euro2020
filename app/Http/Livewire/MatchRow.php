<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MatchRow extends Component
{

    public $match;

    public function render()
    {
        return view('livewire.match-row');
    }
}
