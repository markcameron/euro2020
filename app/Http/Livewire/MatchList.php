<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Game;

class MatchList extends Component
{

    public $matches;

    public $showMatchDetail = false;
    public $game;

    protected $listeners = ['showMatchDetail', 'closeMatch'];

    public function render()
    {
        $this->matches = Game::get();

        return view('livewire.match-list');
    }

    public function showMatchDetail(Game $game)
    {
        $this->showMatchDetail = true;
        $this->game = $game;
    }

    public function closeMatch()
    {
        $this->showMatchDetail = false;
    }
}
