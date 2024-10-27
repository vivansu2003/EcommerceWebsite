@extends('layouts.site')
@section('title', 'Trang sản phẩm theo danh mục')
@section('header')
    <link rel="stylesheet" href="product.css">
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-md-3">
                <h3 id="danh-muc" class="section-title">Danh mục sản phẩm</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <input type="checkbox" id="ao-bong-da">
                        <label for="ao-bong-da">Áo bóng đá</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" id="gang-tay">
                        <label for="gang-tay">Găng tay</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" id="balo">
                        <label for="balo">Balo</label>
                    </li>
                    <!-- Thêm các danh mục khác nếu cần -->
                </ul>
                <h3 id="thuong-hieu" class="section-title">Thương hiệu</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <input type="checkbox" id="viet-nam">
                        <label for="viet-nam">Việt Nam</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" id="han-quoc">
                        <label for="han-quoc">Hàn Quốc</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" id="nhat-ban">
                        <label for="nhat-ban">Nhật Bản</label>
                    </li>
                </ul>
                <h3 id="loc-theo-gia" class="section-title">Lọc theo giá</h3>
                <form>
                    <div class="form-group">
                        <label for="min-price">Giá tối thiểu</label>
                        <input type="number" class="form-control" id="min-price" name="min-price">
                    </div>
                    <div class="form-group">
                        <label for="max-price">Giá tối đa</label>
                        <input type="number" class="form-control" id="max-price" name="max-price">
                    </div>
                    <button type="submit" class="btn btn-primary">Lọc</button>
                </form>
                <h3 id="loc-theo-mau" class="section-title">Lọc theo màu</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <input type="checkbox" id="mau-viet-nam">
                        <label for="mau-viet-nam">Việt Nam</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" id="mau-han-quoc">
                        <label for="mau-han-quoc">Hàn Quốc</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" id="mau-thai-lan">
                        <label for="mau-thai-lan">Thái Lan</label>
                    </li>
                </ul>
                <h3 id="bang-size" class="section-title">Bảng size</h3>
                <ul class="list-group">
                    <li class="list-group-item">
                        <input type="checkbox" id="size-s">
                        <label for="size-s">S</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" id="size-m">
                        <label for="size-m">M</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" id="size-l">
                        <label for="size-l">L</label>
                    </li>
                    <li class="list-group-item">
                        <input type="checkbox" id="size-xl">
                        <label for="size-xl">XL</label>
                    </li>
                </ul>
            </div>

            <!-- Product List -->
            <div class="col-md-9">
                <h3 id="san-pham" class="section-title text-center">{{ $row->name }}</h3>
                <div class="row">
                    @foreach ($list_product as $productitem)
                        <div class="col-md-4 mb-4">
                            <x-pro-duct :$productitem />
                        </div>
                    @endforeach
                </div>
                <div class="row mt-5">
                    <div class="col-12 d-flex justify-content-center">
                        {{ $list_product->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


@endsection
