@extends('layouts.site')
@section('title', 'Trang liên hệ')
@section('header')
    <link rel="stylesheet" href="contact.css">
@endsection
@section('content')
    <form action="{{ route('frontend.docontact') }}" method="post">
        @csrf
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row my-5">
            @auth
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Họ tên</label>
                        <input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label>Điện thoại</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" class="form-control">
                    </div>
                </div>
            @endauth
            <div class="col-md-6">
                <div class="mb-3">
                    <label>Tiêu đề</label>
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <div class="mb-3">
                    <label>Nội dung</label>
                    <textarea name="content" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-12 text-end">
                <button class="btn btn-success" type="submit">Gửi liên hệ</button>
            </div>
        </div>
    </form>
@endsection