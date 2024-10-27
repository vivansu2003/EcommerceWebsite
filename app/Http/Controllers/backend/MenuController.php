<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Post;
use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends Controller
{
    public function index()
    {
        $list = Menu::where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->select('id', 'name', 'link', 'position')
            ->get();
        $list_category = Category::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name')
            ->get();
        $list_brand = Brand::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name')
            ->get();
        $list_topic = Topic::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name')
            ->get();
        $list_page = Post::where([['status', '!=', 0], ['type', '=', 'page']])
            ->orderBy('created_at', 'DESC')
            ->select('id', 'title')
            ->get();

        return view('backend.menu.index', compact('list', 'list_category', 'list_brand', 'list_topic', 'list_page'));
    }

    public function store(Request $request)
    {
        if ($request->has('createCategory')) {
            $listid = $request->categoryid;
            if ($listid) {
                foreach ($listid as $id) {
                    $category = Category::find($id);
                    if ($category != null) {
                        $menu = new Menu;
                        $menu->name = $category->name;
                        $menu->link = 'danh-muc/'.$category->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'category';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }

                return redirect()->route('admin.menu.index');
            } else {
                echo 'KHong Có';
            }

            return redirect()->route('admin.menu.index')->with('success', 'Thêm menu thành công.');
        }

        if ($request->has('createBrand')) {
            $listid = $request->brandid;
            if ($listid) {
                foreach ($listid as $id) {
                    $brand = Brand::find($id);
                    if ($brand != null) {
                        $menu = new Menu;
                        $menu->name = $brand->name;
                        $menu->link = 'thuong-hieu/'.$brand->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'brand';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }

                return redirect()->route('admin.menu.index');
            } else {
                echo 'KHong Có';
            }

            return redirect()->route('admin.menu.index')->with('success', 'Thêm menu thành công.');
        }

        if ($request->has('createTopic')) {
            $listid = $request->topicid;
            if ($listid) {
                foreach ($listid as $id) {
                    $topic = Topic::find($id);
                    if ($topic != null) {
                        $menu = new Menu;
                        $menu->name = $topic->name;
                        $menu->link = 'chu-de/'.$topic->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'topic';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }
                }

                return redirect()->route('admin.menu.index');
            } else {
                echo 'KHong Có';
            }

            return redirect()->route('admin.menu.index')->with('success', 'Thêm menu thành công.');
        }

        if ($request->has('createPage')) {
            $listid = $request->pageid;
            if ($listid) {
                foreach ($listid as $id) {
                    $page = Post::where([['id', '=', $id], ['type', '=', 'page']])->first();
                    if ($page != null) {
                        $menu = new Menu;
                        $menu->name = $page->title;
                        $menu->link = 'trang-don/'.$page->slug;
                        $menu->sort_order = 0;
                        $menu->parent_id = 0;
                        $menu->type = 'page';
                        $menu->position = $request->position;
                        $menu->table_id = $id;
                        $menu->created_at = date('Y-m-d H:i:s');
                        $menu->created_by = Auth::id() ?? 1;
                        $menu->status = $request->status;
                        $menu->save();
                    }

                }

                return redirect()->route('admin.menu.index');
            } else {
                echo 'KHong Có';
            }

            return redirect()->route('admin.menu.index')->with('success', 'Thêm menu thành công.');
        }

        if (isset($request->createCustom)) {
            if (isset($request->name,$request->link)) {
                $menu = new Menu;
                $menu->name = $request->name;
                $menu->link = $request->link;
                $menu->sort_order = 0;
                $menu->parent_id = 0;
                $menu->type = 'custom';
                $menu->position = $request->position;
                $menu->created_at = date('Y-m-d H:i:s');
                $menu->created_by = Auth::id() ?? 1;
                $menu->status = $request->status;
                $menu->save();

                return redirect()->route('admin.menu.index')->with('success', 'Thêm menu thành công.');

            }

        }

    }

    //chỉnh sửa
    public function edit($id)
    {
        $menu = Menu::find($id);
        if (! $menu) {
            return redirect()->route('admin.menu.index')->with('error', 'Menu không tồn tại.');
        }

        $list_category = Category::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name')
            ->get();
        $list_brand = Brand::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name')
            ->get();
        $list_topic = Topic::where('status', '!=', 0)
            ->orderBy('created_at', 'DESC')
            ->select('id', 'name')
            ->get();
        $list_page = Post::where([['status', '!=', 0], ['type', '=', 'page']])
            ->orderBy('created_at', 'DESC')
            ->select('id', 'title')
            ->get();

        return view('backend.menu.edit', compact('menu', 'list_category', 'list_brand', 'list_topic', 'list_page'));
    }

    //cập nhật
    public function update(Request $request, $id)
    {
        $menu = Menu::find($id);
        if (! $menu) {
            return redirect()->route('admin.menu.index')->with('error', 'Menu không tồn tại.');
        }

        $menu->name = $request->name;
        $menu->link = $request->link;
        $menu->position = $request->position;
        $menu->status = $request->status;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;
        $menu->save();

        return redirect()->route('admin.menu.index')->with('success', 'Cập nhật menu thành công.');
    }

    //xóa tạm thời
    public function delete($id)
    {
        $menu = Menu::find($id);
        if ($menu == null) {
            return redirect()->route('admin.menu.index');
        }

        $menu->status = 0;
        $menu->updated_at = date('Y-m-d H:i:s');
        $menu->updated_by = Auth::id() ?? 1;

        $menu->save();

        return redirect()->route('admin.menu.index')->with('message', ['type' => 'success', 'msg' => ' di chuyển đến  thùng rác!']);
    }

    //khôi phục
    public function restore($id)
    {
        $menu = Menu::where('id', $id)->where('status', 0)->first();
        if ($menu) {
            $menu->status = 1;
            $menu->save();
        }

        return redirect()->route('admin.menu.trash')->with('message', ['type' => 'success', 'msg' => 'khôi phục sản phẩm thành công!']);
    }

    //xóa vĩnh viễn
    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();

        return redirect()->route('admin.menu.trash');
    }

    //thùng rác
    public function trash()
    {
        $menu = Menu::where('status', '=', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.menu.trash', compact('menu'));
    }
}
