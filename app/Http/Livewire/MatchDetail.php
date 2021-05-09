<?php

namespace App\Http\Livewire;

use Livewire\Component;

class MatchDetail extends Component
{
    public $match;

    public function render()
    {
        return view('livewire.match-detail');
    }
}
