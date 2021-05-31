<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Prediction;

class PredictionIcon extends Component
{

    public $icon;
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($prediction)
    {
        $status = $prediction->getPredictionStatus();

        $this->icon = match($status) {
            Prediction::EXACT_SCORE => 'heroicon-o-thumb-up',
            Prediction::GOAL_DIFFERENCE => 'heroicon-o-emoji-happy',
            Prediction::WINNER => 'heroicon-o-emoji-sad',
            Prediction::LOSER => 'heroicon-o-thumb-down',
        };

        $this->color = match($status) {
            Prediction::EXACT_SCORE => 'text-green-400',
            Prediction::GOAL_DIFFERENCE => 'text-indigo-400',
            Prediction::WINNER => 'text-yellow-400',
            Prediction::LOSER => 'text-red-400',
        };
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.prediction-icon');
    }

    private function calculateIcon($match, $prediction)
    {
    }
}
