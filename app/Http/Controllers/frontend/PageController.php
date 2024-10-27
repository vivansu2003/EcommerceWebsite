<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller; // Sử dụng model
use App\Models\Post;

class PageController extends Controller
{
    public function chinhsachmuahang()
    {
        // Lấy danh sách sản phẩm từ bảng products
        $posts = Post::where([['status', '=', 2], ['type', '=', 'page']])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.page.chinhsachmuahang', compact('posts'));
    }

    public function gioithieu()
    {
        // Lấy danh sách sản phẩm từ bảng products
        $posts = Post::where([['status', '=', 3], ['type', '=', 'page']])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.page.gioithieu', compact('posts'));
    }

    public function chinhsachbaohanh()
    {
        // Lấy danh sách sản phẩm từ bảng products
        $posts = Post::where([['status', '=', 4], ['type', '=', 'page']])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.page.chinhsachbaohanh', compact('posts'));
    }

    public function chinhsachvanchuyen()
    {
        // Lấy danh sách sản phẩm từ bảng products
        $posts = Post::where([['status', '=', 5], ['type', '=', 'page']])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.page.chinhsachvanchuyen', compact('posts'));
    }

    public function chinhsachdoitra()
    {
        // Lấy danh sách sản phẩm từ bảng products
        $posts = Post::where([['status', '=', 6], ['type', '=', 'page']])
            ->orderBy('created_at', 'desc')
            ->get();

        return view('frontend.page.chinhsachdoitra', compact('posts'));
    }
}
