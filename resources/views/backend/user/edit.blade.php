@extends('backend.dashboard.index')
@section('title', 'chỉnh sửa thành viên')
@section('content')
    <div class="card">
        <div class="card-header bg-white">
            <h3 class="card-title">Edit User</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">tên </label>
                            <input type="text" id="name" name="name" class="form-control"
                                value="{{ old('name', $user->name) }}">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" name="username" class="form-control"
                                value="{{ old('username', $user->username) }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control"
                                value="{{ old('email', $user->email) }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">điện thoại</label>
                            <input type="text" id="phone" name="phone" class="form-control"
                                value="{{ old('phone', $user->phone) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="password">mật khẩu</label>
                            <input type="password" id="password" name="password" class="form-control"
                                value="{{ old('password', $user->password) }}">
                        </div>
                        <div class="form-group">
                            <label for="roles">Roles</label>
                            <select id="roles" name="roles" class="form-control"
                                value="{{ old('roles', $user->roles) }}">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">trạng thái</label>
                            <select id="status" name="status" class="form-control"
                                value="{{ old('status', $user->status) }}">
                                <option value="1">Active</option>
                                <option value="2">Inactive</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">địa chỉ</label>
                            <textarea id="address" name="address" class="form-control">{{ old('address', $user->address) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image">hình ảnh</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @if ($user->image)
                                <img src="{{ asset($user->image) }}" alt="{{ $user->name }}" style="max-width: 100px;">
                            @endif
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">cập nhật User</button>
            </form>
        </div>
    </div>
@endsection
