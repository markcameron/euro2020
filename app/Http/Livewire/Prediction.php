<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Prediction extends Component
{

    public $match;

    public function render()
    {
        return view('livewire.prediction');
    }

    public function decreaseScore($team): void
    {
        $this->match->matchPrediction->decreaseScore($team);

        $this->match->refresh();
    }

    public function increaseScore($team): void
    {
        $this->match->matchPrediction->increaseScore($team);

        $this->match->refresh();
    }
}