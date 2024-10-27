<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request; // Đảm bảo rằng bạn đã import model Post
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        $post_new = Post::where('status', '!=', 0);
        $post_new = $post_new->orderBy('created_at', 'desc')->get();

        return view('backend.post.index', compact('post_new'));
    }

    public function store(StorePostRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->detail = $request->detail;
        $post->status = $request->status;
        $post->description = $request->description;
        $post->topic_id = $request->topic_id;
        $post->type = 'post';
        $post->created_at = date('Y-m-d H:i:s');
        $post->created_by = Auth::id() ?? 1;

        // Upload file
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('public/post'), $filename);
            $post->image = 'public/post/'.$filename;
        }

        if ($post->save()) {
            return redirect()->route('admin.post.index')->with('message', ['type' => 'success', 'msg' => 'Thêm thành công!']);
        }

        return redirect()->route('admin.post.create')->with('message', ['type' => 'danger', 'msg' => 'Thêm thất bại!!']);
    }

    public function create()
    {
        $topics = Topic::all(); // Giả sử bạn có model Topic
        $html_topic_id = '';

        foreach ($topics as $topic) {
            $html_topic_id .= '<option value="'.$topic->id.'">'.$topic->name.'</option>';
        }

        return view('backend.post.create', compact('html_topic_id', 'topics'));
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $topics = Topic::all();
        $html_topic_id = '';

        foreach ($topics as $topic) {
            $html_topic_id .= '<option value="'.$topic->id.'" '.($post->topic_id == $topic->id ? 'selected' : '').'>'.$topic->name.'</option>';
        }

        return view('backend.post.edit', compact('post', 'html_topic_id', 'topics'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->slug = Str::slug($request->title, '-');
        $post->detail = $request->detail;
        $post->status = $request->status;
        $post->description = $request->description;
        $post->topic_id = $request->topic_id;
        $post->type = 'post';
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;

        // Upload file
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('public/post'), $filename);
            $post->image = 'public/post/'.$filename;
        }

        if ($post->save()) {
            return redirect()->route('admin.post.index')->with('message', ['type' => 'success', 'msg' => 'Cập nhật thành công!']);
        }

        return redirect()->route('admin.post.edit', $id)->with('message', ['type' => 'danger', 'msg' => 'Cập nhật thất bại!!']);
    }

    //xóa tạm thời
    public function delete($id)
    {
        $post = Post::find($id);
        if ($post == null) {
            return redirect()->route('admin.post.index');
        }

        $post->status = 0;
        $post->updated_at = date('Y-m-d H:i:s');
        $post->updated_by = Auth::id() ?? 1;

        $post->save();

        return redirect()->route('admin.post.index')->with('message', ['type' => 'success', 'msg' => ' di chuyển đến  thùng rác!']);
    }

    //thùng rác
    public function trash()
    {
        $post = Post::where('status', '=', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.post.trash', compact('post'));
    }

    //khôi phục
    public function restore($id)
    {
        $post = Post::where('id', $id)->where('status', 0)->first();
        if ($post) {
            $post->status = 1;
            $post->save();
        }

        return redirect()->route('admin.post.trash')->with('message', ['type' => 'success', 'msg' => 'khôi phục sản phẩm thành công!']);
    }

    //xóa vĩnh viễn
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('admin.post.trash');
    }
}
