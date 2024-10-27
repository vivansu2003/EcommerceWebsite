@extends('backend.dashboard.index')
@section('title', 'chỉnh sửa Brand')
@section('content')
    <div class="card-body">
        <form action="{{ route('admin.brand.update', $brand->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name">tên</label>
                <input type="text" name="name" id="name" class="form-control"
                    value="{{ old('name', $brand->name) }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description">mô tả</label>
                <textarea name="description" id="description" rows="3" class="form-control">{{ old('description', $brand->description) }}</textarea>
                @error('description')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="status">trạng thái</label>
                <select name="status" id="status" class="form-control">
                    <option value="1" {{ $brand->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $brand->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('status')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="image">hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($brand->image)
                    <?php \Log::info('Image path: ' . asset($brand->image)); ?>
                    <img src="{{ asset($brand->image) }}" alt="{{ $brand->name }}" class="img-thumbnail mt-2"
                        width="150">
                @endif
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-success">cập nhật</button>
            </div>
        </form>
    </div>
    </div>

@endsection
