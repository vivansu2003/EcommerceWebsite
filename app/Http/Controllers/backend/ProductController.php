<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $list = Product::with(['category', 'brand'])
            ->select(
                'id',
                'name',
                'image',
                'description',
                'status',
                'category_id as categoryid',
                'brand_id as brandid',
                'detail',
                'price',
                'pricesale',
                'qty'
            )
            ->where('status', '!=', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        $htmlcategoryid = '';
        $htmlbrandid = '';
        foreach ($brands as $brand) {
            $htmlbrandid .= "<option value='{$brand->id}'>{$brand->name}</option>";
        }
        foreach ($categories as $category) {
            $htmlcategoryid .= "<option value='{$category->id}'>{$category->name}</option>";
        }

        return view('backend.product.index', compact('list', 'htmlbrandid', 'htmlcategoryid'));
    }

    public function store(StoreProductRequest $request)
    {
        $product = new Product;
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->created_at = now();
        $product->created_by = Auth::id() ?? 1; // Đảm bảo created_by không bị null
        $product->updated_by = Auth::id() ?? 1;
        $product->status = $request->status;
        $product->save();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('images/product'), $filename);
            $product->image = 'images/product/'.$filename;

        }
        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product added successfully.');
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $htmlcategoryid = '';
        $htmlbrandid = '';
        foreach ($brands as $brand) {
            $htmlbrandid .= "<option value='{$brand->id}'>{$brand->name}</option>";
        }
        foreach ($categories as $category) {
            $htmlcategoryid .= "<option value='{$category->id}'>{$category->name}</option>";
        }

        return view('backend.product.create', compact('categories', 'brands', 'htmlcategoryid', 'htmlbrandid'));
    }

    //chỉnh sửa
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $brands = Brand::all();

        return view('backend.product.edit', compact('product', 'categories', 'brands'));
    }

    //cập nhật
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->slug = Str::of($request->name)->slug('-');
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->detail = $request->detail;
        $product->price = $request->price;
        $product->pricesale = $request->pricesale;
        $product->qty = $request->qty;
        $product->description = $request->description;
        $product->updated_at = now();
        $product->updated_by = Auth::id() ?? 1;
        $product->status = $request->status;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'-'.$file->getClientOriginalName();
            $file->move(public_path('images/product'), $filename);
            $product->image = 'images/product/'.$filename;
        }

        $product->save();

        return redirect()->route('admin.product.index')->with('success', 'Product updated successfully.');
    }

    //xóa tạm thời
    public function delete($id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::find($id);
        if ($product == null) {
            return redirect()->route('admin.product.index');
        }

        $product->status = 0;
        $product->updated_at = date('Y-m-d H:i:s');
        $product->updated_by = Auth::id() ?? 1;

        $product->save();

        return redirect()->route('admin.product.index')->with('message', ['type' => 'success', 'msg' => 'Post di chuyển đến  thùng rác!']);
    }

    //thùng rác
    public function trash()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::where('status', '=', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('backend.product.trash', compact('product', 'categories', 'brands'));
    }

    //khôi phục
    public function restore($id)
    {
        $product = Product::where('id', $id)->where('status', 0)->first();
        if ($product) {
            $product->status = 1; // Set status to 1 to mark as active
            $product->save();
        }

        return redirect()->route('admin.product.trash')->with('message', ['type' => 'success', 'msg' => 'khôi phục sản phẩm thành công!']);
    }

    //xóa vĩnh viễn
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.product.trash'); // Remove the $id parameter
    }
}
