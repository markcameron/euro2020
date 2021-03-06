<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Game;

class MatchList extends Component
{

    public $matches;
    public $todaysMatches;

    public $showMatchDetail = false;
    public $game;

    protected $listeners = ['showMatchDetail', 'closeMatch'];

    public function render()
    {
        $this->matches = Game::with(['teamHome', 'teamAway', 'goalsHome', 'goalsAway'])->get();
        $this->todaysMatches = $this->matches->whereBetween('date', [now()->startOfDay(), now()->endOfDay()]);

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
