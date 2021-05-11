<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Http\Request;

class BottomNavItem extends Component
{

    public $route;
    public $text;

    public $classes;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Request $request, $route, $text)
    {
        $this->route = route($route);
        $this->text = $text;

        if ($request->route()->getName() === $route) {
            $this->classes = 'flex-1 uppercase text-xs text-white text-center py-4 px-6 block hover:text-blue-500 focus:outline-none text-euro-darkest border-t-2 font-medium border-euro-darkest';
        } else {
            $this->classes = 'flex-1 uppercase text-xs text-white text-center py-4 px-6 block hover:text-blue-500 focus:outline-none border-t border-white';
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.bottom-nav-item');
    }
}
