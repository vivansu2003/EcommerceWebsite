<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBannerRequest;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Banner::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.banner.index', compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBannerRequest $request)
    {
        $banner = new Banner;
        $banner->name = $request->name;
        $banner->link = $request->link;
        $banner->position = $request->position;
        $banner->sort_order = $request->sort_order;
        $banner->description = $request->description;
        $banner->status = $request->status;
        $banner->created_at = date('Y-m-d H:i:s');
        $banner->created_by = Auth::id() ?? 1;
        //upload file

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('images/banner/'), $filename);
            $banner->image = 'images/banner/'.$filename;
        }
        if ($banner->save()) {
            return redirect()->route('admin.banner.index')->with('message', ['type' => 'success', 'msg' => 'Thêm thành công!']);
        }

        return redirect()->route('admin.banner.index')->with('message', ['type' => 'danger', 'msg' => 'Thêm thất bại!!']);
    }

    public function edit($id)
    {
        $banner = Banner::findOrFail($id);

        return view('backend.banner.edit', compact('banner'));
    }

    // cập nhật
    public function update(Request $request, $id)
    {
        $banner = Banner::findOrFail($id);

        // Only update fields that are changed
        if ($request->has('name')) {
            $banner->name = $request->name;
        }
        if ($request->has('link')) {
            $banner->link = $request->link;
        }
        if ($request->has('position')) {
            $banner->position = $request->position;
        }
        if ($request->has('description')) {
            $banner->description = $request->description;
        }
        if ($request->has('sort_order')) {
            $banner->sort_order = $request->sort_order;
        }
        if ($request->has('status')) {
            $banner->status = $request->status;
        }

        // Only update image if a new one is uploaded
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('images/banner/'), $filename);
            $banner->image = 'images/banner/'.$filename;
        }

        if ($banner->save()) {
            return redirect()->route('admin.banner.index')->with('message', ['type' => 'success', 'msg' => 'cập nhật thành công!']);
        }

        return redirect()->route('admin.banner.index')->with('message', ['type' => 'danger', 'msg' => 'cập nhật thất bại!!']);
    }

    //xóa tạm thời
    public function delete($id)
    {
        $banner = Banner::find($id);
        if ($banner == null) {
            return redirect()->route('admin.banner.index');
        }

        $banner->status = 0;
        $banner->updated_at = date('Y-m-d H:i:s');
        $banner->updated_by = Auth::id() ?? 1;

        $banner->save();

        return redirect()->route('admin.banner.index')->with('message', ['type' => 'success', 'msg' => ' di chuyển đến  thùng rác!']);
    }

    //thùng rác
    public function trash()
    {
        $banner = Banner::where('status', '=', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.banner.trash', compact('banner'));
    }

    //khôi phục
    public function restore($id)
    {
        $banner = Banner::where('id', $id)->where('status', 0)->first();
        if ($banner) {
            $banner->status = 1;
            $banner->save();
        }

        return redirect()->route('admin.banner.trash')->with('message', ['type' => 'success', 'msg' => 'khôi phục sản phẩm thành công!']);
    }

    //xóa vĩnh viễn
    public function destroy($id)
    {
        $banner = Banner::find($id);
        $banner->delete();

        return redirect()->route('admin.banner.trash'); // Remove the $id parameter
    }
}
