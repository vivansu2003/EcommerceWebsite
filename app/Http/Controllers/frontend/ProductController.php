<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    //product all
    public function index()
    {
        $list_product = Product::where('status', '=', 1)
            ->orderBy('created_at', 'desc')
            ->paginate(6);

        return view('frontend.product', compact('list_product'));
    }

    public function getlistcategoryid($rowid)
    {
        $listcatid = [];
        array_push($listcatid, $rowid);
        $list1 = Category::where([['parent_id', '=', $rowid], ['status', '=', 1]])->select('id')->get();
        if (count($list1) > 0) {
            foreach ($list1 as $row1) {
                array_push($listcatid, $row1->id);
                $list2 = Category::where([['parent_id', '=', $row1->id], ['status', '=', 1]])->select('id')->get();
                if (count($list2) > 0) {
                    foreach ($list2 as $row2) {
                        array_push($listcatid, $row2->id);
                    }
                }
            }
        }

        return $listcatid;
    }

    //product category
    public function category($slug)
    {
        $row = Category::where([['slug', '=', $slug], ['status', '=', 1]])->select('id', 'name', 'slug')->first();
        $listcatid = [];
        if ($row != null) {
            array_push($listcatid, $row->id);
            $list1 = Category::where([['parent_id', '=', $row->id], ['status', '=', 1]])->select('id')->get();
            if (count($list1) > 0) {
                foreach ($list1 as $row1) {
                    array_push($listcatid, $row1->id);
                    $list2 = Category::where([['parent_id', '=', $row1->id], ['status', '=', 1]])->select('id')->get();
                    if (count($list2) > 0) {
                        foreach ($list2 as $row2) {
                            array_push($listcatid, $row2->id);

                        }

                    }

                }

            }
        }

        $list_product = Product::where('status', '=', 1)
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('frontend.product_category', compact('list_product', 'row'));
    }

    //productdetail
    public function product_detail($slug)
    {
        // Lấy sản phẩm từ cơ sở dữ liệu dựa trên slug
        $product = Product::where([['status', '=', 1], ['slug', '=', $slug]])->first();

        // Lấy danh sách category_id liên quan
        $listcatid = $this->getlistcategoryid($product->category_id);

        // Lấy danh sách sản phẩm liên quan
        $list_product = Product::where('status', 1)
            ->where('id', '!=', $product->id)
            ->whereIn('category_id', $listcatid)
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        // Truyền sản phẩm đến view
        return view('frontend.product_detail', compact('product', 'list_product'));
    }

    // sản phẩm theo thương hiệu
    public function brand($slug)
    {
        $brand = Brand::where([['slug', '=', $slug], ['status', '=', 1]])->first();
        $list_product = Product::where([['status', '=', 1], ['brand_id', '=', $brand->id]])
            ->orderBy('created_at', 'asc')
            ->paginate(3);

        return view('frontend.product_brand', compact('list_product', 'brand'));
    }
}
