@extends('backend.dashboard.index')
@section('title', 'thêm sản phẩm')
@section('content')
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="name">tên </label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="category_id">dạnh mục</label>
            <select name="category_id" id="category_id" class="form-control">
                {!! $htmlcategoryid !!}
            </select>
            @error('category_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="brand_id">thương hiệu</label>
            <select name="brand_id" id="brand_id" class="form-control">
                {!! $htmlbrandid !!}
            </select>
            @error('brand_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="detail">chi tiết</label>
            <textarea name="detail" id="detail" rows="3" class="form-control">{{ old('detail') }}</textarea>
            @error('detail')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price">giá</label>
            <input type="number" name="price" id="price" class="form-control" value="{{ old('price') }}">
            @error('price')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="pricesale">giá Sale</label>
            <input type="number" name="pricesale" id="pricesale" class="form-control" value="{{ old('pricesale') }}">
            @error('pricesale')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="qty">số lượng</label>
            <input type="number" name="qty" id="qty" class="form-control" value="{{ old('qty') }}">
            @error('qty')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description">mô tả</label>
            <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image">hình ảnh</label>
            <input type="file" name="image" id="image" class="form-control">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="status">trạng thái</label>
            <select name="status" id="status" class="form-control">
                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>
                    Active</option>
                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>
                    Inactive</option>
            </select>
            @error('status')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">thêm sản phẩm</button>
        </div>
    </form>
@endsection
