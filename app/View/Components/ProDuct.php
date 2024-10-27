<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ProDuct extends Component
{
    public $produc_row = null;

    public function __construct($productitem)
    {
        $this->produc_row = $productitem;
    }

    public function render(): View|Closure|string
    {
        $product = $this->produc_row; //

        return view('components.pro-duct', compact('product'));
    }
}
