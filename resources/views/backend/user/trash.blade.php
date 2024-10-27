@extends('backend.dashboard.index')
@section('title', 'thùng rác thành viên')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.user.index') }}" class="btn btn-success ">
                        <i class=aria-hidden="true"></i>quay về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">hình ảnh </th>
                        <th class="text-center">tên</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">điện thoại</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">địa chỉ</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">hành động</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">trạng thái</th>
                </thead>
                <tbody>
                    @foreach ($user as $row)
                        <tr class="datarow">
                            <td><input type="checkbox" name="user_checkbox" value="1"></td>
                            <td><img src="{{ asset($row->image) }}" alt="user Image" style="max-width: 100px;">
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->address }}</td>
                            <td>{{ $row->roles }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.user.restore', $row->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Restore
                                </a>
                                <a href="{{ route('admin.user.edit', $row->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.user.destroy', $row->id) }}" class="btn btn-sm btn-danger"
                                    onclick="return confirm('bạn có chắc muốn xóa  vĩnh viễn không?');">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->status }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>

@endsection
