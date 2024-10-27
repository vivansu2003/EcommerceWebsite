@extends('backend.dashboard.index')

@section('title', 'chỉnh sủa Product')

@section('content')
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">tên sản phẩm</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="category_id">dạnh mục</label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="brand_id">thượng hiệu</label>
                    <select name="brand_id" id="brand_id" class="form-control" required>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>
                                {{ $brand->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="detail">chi tiết</label>
                    <textarea name="detail" id="detail" class="form-control" rows="5" required>{{ $product->detail }}</textarea>
                </div>

                <div class="form-group">
                    <label for="price">giá</label>
                    <input type="number" name="price" id="price" class="form-control" value="{{ $product->price }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="pricesale">giá Sale</label>
                    <input type="number" name="pricesale" id="pricesale" class="form-control"
                        value="{{ $product->pricesale }}">
                </div>

                <div class="form-group">
                    <label for="qty">Quantity</label>
                    <input type="number" name="qty" id="qty" class="form-control" value="{{ $product->qty }}"
                        required>
                </div>

                <div class="form-group">
                    <label for="description">mô tả</label>
                    <textarea name="description" id="description" class="form-control" rows="5">{{ $product->description }}</textarea>
                </div>

                <div class="form-group">
                    <label for="image">hình ảnh</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if ($product->image)
                        <img src="{{ asset($product->image) }}" alt="{{ $product->name }}"
                            style="max-width: 100px; height: auto;" class="mt-2">
                    @endif
                </div>

                <div class="form-group">
                    <label for="status">trạng thái</label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $product->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">cập nhật sản phẩm</button>
            </form>
        </div>
    </div>
@endsection
