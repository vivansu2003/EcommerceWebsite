<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class NewPost extends Component
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
        $post_new = Post::where([['status', '=', 1], ['type', '=', 'post ']])
            ->orderBy('created_at', 'desc')//mới nhất
            ->limit(4)
            ->get();

        return view('components.new-post', compact('post_new'));
    }
}
