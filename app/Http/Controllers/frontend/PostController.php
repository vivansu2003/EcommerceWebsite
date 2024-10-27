<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post; // Sử dụng model
use App\Models\topic;

class PostController extends Controller
{
    public function index()
    {
        // Lấy danh sách sản phẩm từ bảng products
        $posts = Post::where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(4);

        return view('frontend.post.index', compact('posts'));
    }

    public function show($slug)
    {
        // Lấy thông tin chi tiết sản phẩm theo id
        $post_detail = Post::where([['status', '=', 1], ['slug', '=', $slug]])->first();

        return view('frontend.post.show', compact('post_detail'));
    }

    // lay bài viettheo chủ de
    public function topic($slug)
    {
        $topic = Topic::where([['slug', '=', $slug], ['status', '=', 1]])->first();
        $list_post = Post::where([['status', '=', 1], ['type', '=', 'post'], ['topic_id', '=', $topic->id]])
            ->orderBy('created_at', 'asc')
            ->paginate(2);

        return view('frontend.post.topic', compact('list_post', 'topic'));
    }
}
