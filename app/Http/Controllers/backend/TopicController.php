<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;

class TopicController extends Controller
{
    public function index()
    {
        $list = Topic::where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.topic.index', compact('list'));
    }

    public function store(Request $request)
    {

        // Tạo chủ đề mới
        $topic = new Topic;
        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->description = $request->description;
        $topic->created_at = now();
        $topic->created_by = Auth::id() ?? 1;
        $topic->status = $request->status;
        // Lưu chủ đề
        $topic->save();

        // Chuyển hướng lại với thông báo lỗi
        if ($topic->save()) {
            return redirect()->route('admin.topic.index')->with('success', 'topic thêm thành công!');
        } else {
            return redirect()->route('admin.topic.index')->with('error', 'thêm topic thất bại .');
        }

    }

    //chỉnh sửa
    public function edit($id)
    {
        $topic = Topic::find($id);
        if (! $topic) {
            return redirect()->route('admin.topic.index')->with('error', 'topic không tồn tại.');
        }

        return view('backend.topic.edit', compact('topic'));
    }

    //cập nhật
    public function update(Request $request, $id)
    {
        $topic = Topic::find($id);
        if (! $topic) {
            return redirect()->route('admin.topic.index')->with('error', 'topic không tồn tại.');
        }

        $topic->name = $request->name;
        $topic->slug = Str::of($request->name)->slug('-');
        $topic->description = $request->description;
        $topic->updated_at = now();
        $topic->updated_by = Auth::id() ?? 1;
        $topic->status = $request->status;

        // Lưu chủ đề
        if ($topic->save()) {
            return redirect()->route('admin.topic.index')->with('success', 'topic cập nhật thành công!');
        } else {
            return redirect()->route('admin.topic.index')->with('error', 'cập nhật topic thất bại.');
        }
    }

    //xóa tạm thời
    public function delete($id)
    {
        $topic = Topic::find($id);
        if ($topic == null) {
            return redirect()->route('admin.post.index');
        }

        $topic->status = 0;
        $topic->updated_at = date('Y-m-d H:i:s');
        $topic->updated_by = Auth::id() ?? 1;

        $topic->save();

        return redirect()->route('admin.topic.index')->with('message', ['type' => 'success', 'msg' => ' di chuyển đến  thùng rác!']);
    }

    //thùng rác
    public function trash()
    {
        $topic = Topic::where('status', '=', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.topic.trash', compact('topic'));
    }

    //khôi phục
    public function restore($id)
    {
        $topic = Topic::where('id', $id)->where('status', 0)->first();
        if ($topic) {
            $topic->status = 1;
            $topic->save();
        }

        return redirect()->route('admin.topic.trash')->with('message', ['type' => 'success', 'msg' => 'khôi phục sản phẩm thành công!']);
    }

    //xóa vĩnh viễn
    public function destroy($id)
    {
        $topic = Topic::find($id);
        $topic->delete();

        return redirect()->route('admin.topic.trash');
    }
}
