<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FooterMenu extends Component
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
    public function render(): View|Closure|string
    {

        $args_footermenu = [
            ['status', '=', 1],
            ['position', '=', 'footermenu'],
            ['parent_id', '=', 0],

        ];
        $list_menu = Menu::where($args_footermenu)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('components.footer-menu', compact('list_menu'));
    }
}
