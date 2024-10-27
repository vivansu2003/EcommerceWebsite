<?php

namespace App\View\Components;

use App\Models\Banner;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Slider extends Component
{
    /**
     * Tạo một instance mới của component.
     */
    public function __construct()
    {
        // Cố tình để trống
    }

    /**
     * Lấy view / nội dung đại diện cho component.
     */
    public function render(): View|Closure|string
    {
        $list_banner = Banner::where('status', 1)
            ->where('position', 'slidershow')
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('components.slider', compact('list_banner'));
    }
}
