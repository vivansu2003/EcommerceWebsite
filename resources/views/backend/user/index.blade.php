@extends('backend.dashboard.index')
@section('title', 'Thành viên')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-success ">
                        <i class="fa fa-plus px-2" aria-hidden="true"></i>thêm
                    </a>
                    <a href="{{ route('admin.user.trash') }}" class="btn btn-sm btn-danger ">
                        <i class="fa fa-trash px-2" aria-hidden="true"></i>Trash bin
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">hình ảnh</th>
                        <th class="text-center">tên</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">địa chỉ</th>
                        <th class="text-center">Phone</th>
                        <th class="text-center">Role</th>
                        <th class="text-center">hành động</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $row)
                        <tr>
                            <td><input type="checkbox" name="user_checkbox" value="1"></td>
                            <td><img src="{{ asset($row->image) }}" alt="user Image" style="max-width: 100px;">
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->username }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->address }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>{{ $row->roles }}</td>
                            <td><a href="#" class="btn btn-sm btn-success ">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-info ">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.user.edit', $row->id) }}" class="btn btn-sm btn-primary ">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.user.delete', $row->id) }}" class="btn btn-sm btn-danger "
                                    onclick="return confirm('bạn có chắc muốn xóa  và đưa vô thùng rác không?');">
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
    </section>
    <!-- /.CONTENT -->
    </div>

@endsection
