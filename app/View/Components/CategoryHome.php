<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\View\View;

class CategoryHome extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        $categories = Category::where('status', 1)
            ->where('parent_id', 0)
            ->orderBy('sort_order', 'asc')
            
            ->get();

        return view('components.category-home', compact('categories'));
    }
}
