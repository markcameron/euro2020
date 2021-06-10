<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Game;
use App\Models\User;

class LazyUserCheck extends Component
{

    public $users;
    public $matchCount;

    public function render()
    {
        $this->users = User::get();
        $this->matchCount = Game::count();

        return view('livewire.lazy-user-check');
    }
}
