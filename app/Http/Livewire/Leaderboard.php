<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Collection;

use App\Models\User;

class Leaderboard extends Component
{

    public $users;

    public function render()
    {
        $this->generateLeaderboard();

        return view('livewire.leaderboard');
    }

    /**
     * Retrieve all users and their score
     *
     * @return Collection
     */
    private function generateLeaderboard()
    {
        $users = User::get();

        $this->users = $users->sortByDesc('score');
    }
}
