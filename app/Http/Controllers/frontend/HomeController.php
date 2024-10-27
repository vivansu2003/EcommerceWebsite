<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.home');
    }

    // public function detail($slug)
    // {
    //     $post = Post::where('slug', $slug)->firstOrFail();

    //     return view('components.post-detail', compact('post'));
    // }
}
