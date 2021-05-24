<?php

namespace App\Services;

use App\Models\User;

class AvatarService
{

    public static function icons()
    {
        return collect([
            'heroicon-o-academic-cap',
            'heroicon-o-ban',
            'heroicon-o-beaker',
            'heroicon-o-bell',
            'heroicon-o-book-open',
            'heroicon-o-briefcase',
            'heroicon-o-cake',
            'heroicon-o-calculator',
            'heroicon-o-camera',
            'heroicon-o-chart-bar',
            'heroicon-o-check',
            'heroicon-o-chip',
            'heroicon-o-clipboard-list',
            'heroicon-o-clock',
            'heroicon-o-cog',
            'heroicon-o-cube',
            'heroicon-o-database',
            'heroicon-s-desktop-computer',
            'heroicon-o-device-mobile',
            'heroicon-o-dots-horizontal',
            'heroicon-o-emoji-happy',
            'heroicon-o-emoji-sad',
            'heroicon-o-eye',
            'heroicon-o-fire',
            'heroicon-o-finger-print',
            'heroicon-o-fire',
            'heroicon-o-flag',
            'heroicon-o-gift',
            'heroicon-o-globe',
            'heroicon-o-hand',
            'heroicon-o-hashtag',
            'heroicon-o-heart',
            'heroicon-o-home',
            'heroicon-o-key',
            'heroicon-o-lightning-bolt',
            'heroicon-o-link',
            'heroicon-o-location-marker',
            'heroicon-o-mail',
            'heroicon-o-moon',
            'heroicon-o-music-note',
            'heroicon-o-paper-clip',
            'heroicon-o-pencil',
            'heroicon-o-puzzle',
            'heroicon-o-qrcode',
            'heroicon-o-scale',
            'heroicon-o-scissors',
            'heroicon-o-shopping-cart',
            'heroicon-o-sparkles',
            'heroicon-o-status-online',
            'heroicon-o-sun',
            'heroicon-o-trash',
            'heroicon-o-truck',
            'heroicon-o-video-camera',
            'heroicon-o-wifi',
        ]);
    }

    public static function backgroundColors()
    {
        return collect([
            'white',
            'gray-800',
            'red-500',
            'pink-600',
            'yellow-500',
            'green-500',
            'blue-500',
            'purple-500',
        ]);
    }

    public static function foregroundColors()
    {
        return collect([
            'white',
            'gray-800',
            'red-300',
            'pink-300',
            'yellow-300',
            'green-400',
            'blue-400',
            'purple-400',
        ]);
    }
}
