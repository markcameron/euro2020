<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Game;

class PredictionsList extends Component
{

    public $matches;
    public $todaysMatches;
    public $match;

    public $showPredictionForm = false;

    protected $listeners = ['showPrediction', 'closePrediction'];

    public function render()
    {
        $this->matches = Game::with(['teamHome', 'teamAway', 'goalsHome', 'goalsAway', 'userPrediction'])->get();
        $this->todaysMatches = $this->matches->whereBetween('date', [now()->startOfDay(), now()->endOfDay()]);

        return view('livewire.predictions-list');
    }

    public function showPrediction(Game $match)
    {
        $this->showPredictionForm = true;
        $this->match = $match;
    }

    public function closePrediction()
    {
        $this->showPredictionForm = false;
    }
}
