<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Game;

class MatchList extends Component
{

    public $matches;

    public function render()
    {
        $this->matches = Game::get();

        return view('livewire.match-list');
    }
}
