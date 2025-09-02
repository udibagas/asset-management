<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Location;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Footer extends Component
{
    public $locations;

    public $categories;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->locations = Location::all();
        $this->categories = Category::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.footer');
    }
}
