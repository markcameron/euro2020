<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Game;

class PredictionsList extends Component
{

    public $matches;
    public $match;

    public $showPredictionForm = false;

    protected $listeners = ['showPrediction', 'closePrediction'];

    public function render()
    {
        $this->matches = Game::with(['teamHome', 'teamAway', 'goalsHome', 'goalsAway', 'userPrediction'])->get();

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
