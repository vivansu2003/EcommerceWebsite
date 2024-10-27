@extends('layouts.site')
@section('title', 'chi tiết sản phẩm')
@section('header')
    <link rel="stylesheet" href="product.css">
@endsection
@section('content')
    <div class="container my-3">
        <div class="row">
            <div class="col-md-6">
                <img class="img-fluid w-100" src="{{ asset($product->image) }}" alt="{{ $product->image }}">
            </div>
            <div class="col-md-6">
                <h1>{{ $product->name }}</h1>
                <p>mô tả</p>
                <h3 class="fs-6">{{ $product->description }}</h3>
                <div class="row">
                    @if ($product->pricesale > 0 && $product->pricesale < $product->price)
                        <div class="col-6">Giá: {{ number_format($product->pricesale) }}
                            <del>{{ number_format($product->price) }}</del>
                        </div>
                        <div class="col-6 text-end">50%</div>
                    @else
                        <div class="col-12">Giá: {{ number_format($product->price) }}<sup>VNĐ</sup> </div>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input type="number" value="1" min="0" aria-describedby="basic-addon2" id="qty">
                    <button class="input-group-text" id="basic-addon2" onclick="handleAddCart({{ $product->id }})">ĐẶT
                        MUA</button>
                </div>

            </div>
        </div>
        <div class="row ">
            <div class="col-12">
                <h3>Chi tiết</h3>
                <h1>{!! $product->detail !!}</h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                            type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                            sản phẩm liên
                            quan</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">
                            Bình
                            luận</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                        tabindex="0">
                        <div class="row">
                            @foreach ($list_product as $productitem)
                                <div class="col-md-4 mb-4">
                                    <x-pro-duct :$productitem />
                                </div>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                            tabindex="0">
                            TÍCH HỢP FACEBOOK
                        </div>

                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('footer')
        <script>
            function handleAddCart(productid) {
                let qty = document.getElementById("qty").value;
                $.ajax({
                    url: "{{ route('site.cart.addcart') }}",
                    type: "GET",
                    data: {
                        productid: productid,
                        qty: qty
                    },
                    success: function(result, status, xhr) {
                        document.getElementById("showqty").innerHTML = result;
                        alert("Thêm thành công vào giỏ hàng");

                    },
                    error: function(xhr, status, error) {
                        alert(error);
                    }
                })

            }
        </script>
    @endsection
