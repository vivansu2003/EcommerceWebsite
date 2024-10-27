@extends('backend.dashboard.index')
@section('title', 'chỉnh sửa chủ đề')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('admin.topic.update', $topic->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="container">
                            <div class="row g-3">
                                <div class="col-md-12 mb-3">
                                    <label for="name" class="form-label">tên chủ đề</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name', $topic->name) }}" />
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">mô tả</label>
                                    <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $topic->description) }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="status" class="form-label">trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="2" {{ $topic->status == 2 ? 'selected' : '' }}>Chưa xuất bản
                                        </option>
                                        <option value="1" {{ $topic->status == 1 ? 'selected' : '' }}>Xuất bản</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button class="btn btn-primary w-100" type="submit">
                                        cập nhật
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>


            </div>
        @endsection
