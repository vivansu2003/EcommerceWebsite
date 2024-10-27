@extends('backend.dashboard.index')
@section('title', 'chỉnh sửa Contact')
@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">chỉnh sửaContact</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.contact.update', $contact->id) }}" method="POST">
                @csrf
                @method('PUT') <!-- Sử dụng phương thức PUT để cập nhật dữ liệu -->
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ $contact->name }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ $contact->email }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone</label>
                    <input type="text" id="phone" name="phone" class="form-control" value="{{ $contact->phone }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $contact->title }}"
                        required>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <textarea id="content" name="content" class="form-control" rows="5" required>{{ $contact->content }}</textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select id="status" name="status" class="form-control" required>
                        <option value="1" {{ $contact->status == 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ $contact->status == 0 ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>

@endsection
