<?php

namespace App\View\Components;

use App\Models\Menu;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MainMenu extends Component
{
    public function render(): View|Closure|string
    {
        $args_mainmenu = [
            ['status', '=', 1],
            ['position', '=', 'mainmenu'],
            ['parent_id', '=', 0],

        ];
        $list_menu = Menu::where($args_mainmenu)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('components.main-menu', compact('list_menu'));
    }
}
