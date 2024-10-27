@extends('backend.dashboard.index')
@section('title', $title ?? 'chỉnh sửa Post')
@section('content')
    <div class="container">
        <h1>Edit Post</h1>

        @if (session('message'))
            <div class="alert alert-{{ session('message')['type'] }}">
                {{ session('message')['msg'] }}
            </div>
        @endif

        <form action="{{ route('admin.post.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control"
                    value="{{ old('title', $post->title) }}" required>
            </div>

            <div class="form-group">
                <label for="detail">chi tiết</label>
                <textarea name="detail" id="detail" class="form-control" rows="5" required>{{ old('detail', $post->detail) }}</textarea>
            </div>

            <div class="form-group">
                <label for="status">trạng thái</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="1" {{ $post->status == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ $post->status == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="description">mô tả</label>
                <textarea name="description" id="description" class="form-control" rows="3">{{ old('description', $post->description) }}</textarea>
            </div>

            <div class="form-group">
                <label for="topic_id">chủ đề</label>
                <select name="topic_id" id="topic_id" class="form-control" required>
                    {!! $html_topic_id !!}
                </select>
            </div>

            <div class="form-group">
                <label for="image">hình ảnh</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($post->image)
                    <img src="{{ asset($post->image) }}" alt="Current Image" width="150" class="mt-2">
                @endif
            </div>

            <button type="submit" class="btn btn-primary">cập nhật</button>
        </form>
    </div>
@endsection
