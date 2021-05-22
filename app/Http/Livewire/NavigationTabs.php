<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NavigationTabs extends Component
{

    public $selectedTab = 1;

    public function render()
    {
        return view('livewire.navigation-tabs');
    }

    public function selectTab($tab)
    {
        $this->selectedTab = $tab;
    }
}
