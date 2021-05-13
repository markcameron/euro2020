<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PredictionRow extends Component
{

    public $match;

    public function render()
    {
        return view('livewire.prediction-row');
    }
}
