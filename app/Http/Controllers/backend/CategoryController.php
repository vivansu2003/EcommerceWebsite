<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->select('id', 'image', 'name', 'parent_id', 'slug', 'description', 'sort_order', 'status')
            ->get();
        $htmlparentid = '';
        $htmlsortorder = '';
        foreach ($list as $item) {
            $htmlparentid .= "<option value='".$item->id."'>".$item->name.'</option>';
            $htmlsortorder .= "<option value='".$item->sort_order."'>".$item->name.'</option>';

        }

        return view('backend.category.index', compact('list', 'htmlparentid', 'htmlsortorder'));
    }

    //lưu category
    public function store(StoreCategoryRequest $request)
    {

        $category = new Category;
        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        $category->description = $request->description;
        $category->created_at = date('Y-m-d H:i:s');
        $category->created_by = Auth::id() ?? 1;
        $category->status = $request->status;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('public/category'), $filename);
            $category->image = 'public/category/'.$filename;
        }

        if ($category->save()) {
            return redirect()->route('admin.category.index')->with('success', 'Category thêm thành công!');
        } else {
            return redirect()->route('admin.category.index')->with('error', 'thêm category thất bại .');
        }
    }

    //chỉnh sửa
    public function edit($id)
    {
        $category = Category::find($id);
        if (! $category) {
            return redirect()->route('admin.category.index')->with('error', 'Category không tồn tại.');
        }

        $list = Category::where('status', '!=', 0)->orderBy('created_at', 'desc')->get();
        $htmlparentid = '';
        $htmlsortorder = '';
        foreach ($list as $item) {
            $htmlparentid .= "<option value='".$item->id."'>".$item->name.'</option>';
            $htmlsortorder .= "<option value='".$item->sort_order."'>".$item->name.'</option>';
        }

        return view('backend.category.edit', compact('category', 'htmlparentid', 'htmlsortorder'));
    }

    //cập nhật
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        if (! $category) {
            return redirect()->route('admin.category.index')->with('error', 'Category không tồn tại.');
        }

        $category->name = $request->name;
        $category->slug = Str::of($request->name)->slug('-');
        $category->parent_id = $request->parent_id;
        $category->sort_order = $request->sort_order;
        $category->description = $request->description;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;
        $category->status = $request->status;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('public/category'), $filename);
            $category->image = 'public/category/'.$filename;
        }

        if ($category->save()) {
            return redirect()->route('admin.category.index')->with('success', 'Category cập nhật thành công!');
        } else {
            return redirect()->route('admin.category.index')->with('error', 'Cập nhật category thất bại.');
        }
    }

    // thêm danh mục
    public function create()
    {
        $list = Category::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->select('id', 'image', 'name', 'parent_id', 'slug', 'description', 'sort_order', 'status')
            ->get();
        $htmlparentid = '';
        $htmlsortorder = '';
        foreach ($list as $item) {
            $htmlparentid .= "<option value='".$item->id."'>".$item->name.'</option>';
            $htmlsortorder .= "<option value='".$item->sort_order."'>".$item->name.'</option>';

        }

        return view('backend.category.create', compact('list', 'htmlparentid', 'htmlsortorder'));
    }

    //xóa tạm thời
    public function delete($id)
    {
        $category = Category::find($id);
        if ($category == null) {
            return redirect()->route('admin.category.index');
        }

        $category->status = 0;
        $category->updated_at = date('Y-m-d H:i:s');
        $category->updated_by = Auth::id() ?? 1;

        $category->save();

        return redirect()->route('admin.category.index')->with('message', ['type' => 'success', 'msg' => 'Post di chuyển đến  thùng rác!']);
    }

    //thùng rác
    public function trash()
    {
        $category = Category::where('status', '=', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.category.trash', compact('category'));
    }

    //khôi phục
    public function restore($id)
    {
        $category = Category::where('id', $id)->where('status', 0)->first();
        if ($category) {
            $category->status = 1;
            $category->save();
        }

        return redirect()->route('admin.category.trash')->with('message', ['type' => 'success', 'msg' => 'khôi phục sản phẩm thành công!']);
    }

    //xóa vĩnh viễn
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('admin.category.trash'); // Remove the $id parameter
    }
}
