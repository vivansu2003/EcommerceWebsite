@extends('layouts.site')
@section('title', 'Home')
@section('header')

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

@endsection
@section('content')
    <x-slider />
    <x-category-home />
    <div class="content__container">
        <section class="discount"
            style="margin-right: 70px; margin-left: 70px;  margin-bottom: 50px; border-radius: 5px; padding: 10px;">

            <div class="">
                <h2 class="content-title">Ưu đãi độc quyền</h2>
                <h6 class="content-description">Chỉ có tại Sport, hấp dẫn và hữu hạn, mua ngay!</h6>
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('images/giamgia4.jpg') }}" alt="discount"
                        style="width:450px; height:150px; margin: 10px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); transition: transform 0.5s ease; transform: scale(1);"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="{{ asset('images/giamgia2.jpg') }}" alt="discount"
                        style="width:450px; height:150px; margin: 10px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); transition: transform 0.5s ease; transform: scale(1);"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    <img src="{{ asset('images/giamgia3.jpg') }}" alt="discount"
                        style="width:450px; height:150px; margin: 10px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5); transition: transform 0.5s ease; transform: scale(1);"
                        onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                </div>
            </div>
    </div>
    </div>
    <x-product-new />
    <x-product-sale />
    {{-- <x-product-category-home /> --}}
    <x-new-post />
    @yield('footer')
@endsection
