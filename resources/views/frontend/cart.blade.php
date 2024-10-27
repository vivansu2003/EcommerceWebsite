@extends('layouts.site')
@section('title', 'giỏ hàng')
@section('header')
    <link rel="stylesheet" href="cart.css">

@endsection
@section('content')
    <div class="container">
        <h1>Giỏ Hàng</h1>
        <form action="{{ route('site.cart.update') }}" method="post">
            @csrf
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th style="width:90px">Hinh</th>
                        <th>Tên sản phẩm</th>
                        <th>số lượng</th>
                        <th>Giá</th>
                        <th>Tổng tiền</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalMoney = 0;
                    @endphp
                    @foreach ($list_cart as $row_cart)
                        <tr>
                            <td>{{ $row_cart['id'] }}</td>
                            <td>
                                <img class="img-fluid" src="{{ asset($row_cart['image']) }}" alt="{{ $row_cart['image'] }}">
                            </td>
                            <td>{{ $row_cart['name'] }}</td>
                            <td>
                                <input type="number" min="0" name="qty[{{ $row_cart['id'] }}]"
                                    value="{{ $row_cart['qty'] }}">
                            </td>
                            <td>{{ number_format($row_cart['price']) }}</td>
                            <td>{{ number_format($row_cart['price'] * $row_cart['qty']) }}</td>
                            <td class="text-center">
                                <a href="{{ route('site.cart.delete', ['id' => $row_cart['id']]) }}"
                                    class="btn btn-danger btn-sm"> x</a>
                            </td>

                        </tr>
                        @php
                            $totalMoney += $row_cart['price'] * $row_cart['qty'];
                        @endphp
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">
                            <a class=" btn btn-success px-5" href="{{ route('site.home') }}">Mua thêm</a>
                            <button type="submit" class=" btn btn-primary px-5">Cập nhật</button>
                            <a class=" btn btn-info px-5" href="{{ route('site.cart.checkout') }}">Thanh toán</a>
                        </th>
                        <th colspan="3" class="text-right">
                            <strong>Tổng tiền: {{ number_format($totalMoney) }}</strong>
                        </th>
                    </tr>
                </tfoot>
            </table>
        </form>
    </div>
@endsection
