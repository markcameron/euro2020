<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Services\AvatarService;

class ProfileIconSelect extends Component
{

    public $icons;
    public $backgroundColors;
    public $foregroundColors;

    public $selectedIcon;
    public $selectedBackgroundColor;
    public $selectedForegroundColor;

    public function __construct()
    {
        $this->icons = AvatarService::icons();
        $this->backgroundColors = AvatarService::backgroundColors();
        $this->foregroundColors = AvatarService::foregroundColors();
    }

    public function render()
    {
        $this->selectedIcon = request()->user()->avatar;
        $this->selectedBackgroundColor = request()->user()->background_color;
        $this->selectedForegroundColor = request()->user()->color;

        return view('livewire.profile-icon-select');
    }

    public function setAvatar($icon)
    {
        if (!$this->icons->contains($icon)) {
            return 'error';
        }

        $user = request()->user();
        $user->avatar = $icon;
        $user->save();
    }

    public function setBackgroundColor($color)
    {
        if (!$this->backgroundColors->contains($color)) {
            return 'error';
        }

        $user = request()->user();
        $user->background_color = $color;
        $user->save();
    }

    public function setForegroundColor($color)
    {
        if (!$this->foregroundColors->contains($color)) {
            return 'error';
        }

        $user = request()->user();
        $user->color = $color;
        $user->save();
    }
}
