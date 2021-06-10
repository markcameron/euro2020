<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\User;

class MatchDetail extends Component
{
    public $match;
    public $users;

    public function render()
    {
        $this->users = User::get();

        return view('livewire.match-detail');
    }
}
