@extends('backend.dashboard.index')
@section('title', 'chỉnh sửa danh mục')
@section('content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="name">Tên danh mục</label>
                    <input type="text" value="{{ old('name', $category->name) }}" name="name" id="name"
                        class="form-control">
                    @error('name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="description">Mô tả</label>
                    <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $category->description) }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="parent_id">Cấp cha</label>
                    <select name="parent_id" id="parent_id" class="form-control">
                        <option value="0">Cấp cha</option>
                        {!! $htmlparentid !!}
                    </select>
                    @error('parent_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="sort_order">Sắp xếp</label>
                    <select name="sort_order" id="sort_order" class="form-control">
                        <option value="">Chọn vị trí</option>
                        {!! $htmlsortorder !!}
                    </select>
                    @error('sort_order')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="image">Hình ảnh</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if ($category->image)
                        <img src="{{ asset($category->image) }}" alt="{{ $category->name }}" style="max-width: 100px;">
                    @endif
                    @error('image')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="status">Trạng thái</label>
                    <select name="status" id="status" class="form-control">
                        <option value="2" {{ $category->status == 2 ? 'selected' : '' }}>Chưa xuất bản
                        </option>
                        <option value="1" {{ $category->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-success">Cập nhật danh mục</button>
                </div>
            </form>
        </div>
    </div>
    </section>
    </div>
    </div>
@endsection
