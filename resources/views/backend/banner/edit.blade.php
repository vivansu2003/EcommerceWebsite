@extends('backend.dashboard.index')
@section('title', $title ?? 'chỉnh sửa Banner')
@section('content')
    <div class="col-md-6">
        <form action="{{ route('admin.banner.update', $banner->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">tên</label>
                <input type="text" value="{{ old('name', $banner->name) }}" name="name" id="name"
                    class="form-control">
            </div>
            <div class="mb-3">
                <label for="description">mô tả</label>
                <textarea name="description" id="description" class="form-control">{{ old('description', $banner->description ?? '') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="image">hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($banner->image)
                    <img src="{{ asset($banner->image) }}" alt="{{ $banner->name }}" style="max-width: 100px;">
                @endif
            </div>
            <div class="mb-3">
                <label for="sort_order">sắp sếp</label>
                <input type="number" name="sort_order" id="sort_order" class="form-control"
                    value="{{ old('sort_order', $banner->sort_order) }}">
            </div>
            <div class="mb-3">
                <label for="status">trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option value="2" {{ old('status', $banner->status) == '2' ? 'selected' : '' }}>Chưa xuất bản
                    </option>
                    <option value="1" {{ old('status', $banner->status) == '1' ? 'selected' : '' }}>Xuất bản
                    </option>
                </select>
            </div>
            <div class="mb-3">
                <label for="link">Link</label>
                <input type="text" name="link" id="link" class="form-control"
                    value="{{ old('link', $banner->link) }}" placeholder="https://example.com">
            </div>
            <div class="mb-3">
                <label for="position">position</label>
                <select name="position" id="position" class="form-control">
                    <option value="slidershow" {{ old('position', $banner->position) == 'slidershow' ? 'selected' : '' }}>
                        slidershow
                    </option>
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="mb-3">
                <button type="submit" name="create" class="btn btn-success">cập nhật banner</button>
            </div>
        </form>

    </div>

@endsection
