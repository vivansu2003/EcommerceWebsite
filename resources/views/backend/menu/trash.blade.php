@extends('backend.dashboard.index')
@section('title', 'thùng rác menu')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.menu.index') }}" class="btn btn-success ">
                        <i class=aria-hidden="true"></i>quay về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" style="width:30px;">#</th>
                        <th>Tên menu</th>
                        <th>Liên kết</th>
                        <th>Vị trí</th>
                        <th class="text-center" style="width:200px;">Chức năng</th>
                        <th class="text-center" style="width:30px;">ID</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menu as $row)
                        <tr class="datarow">
                            <td>
                                <input type="checkbox">
                            </td>
                            <td>
                                <div class="name">
                                    {{ $row->name }}
                                </div>
                            </td>
                            <td>{{ $row->link }}</td>
                            <td>{{ $row->position }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.menu.restore', $row->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.menu.edit', $row->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.menu.destroy', $row->id) }}" class="btn btn-sm btn-danger"
                                    onclick="return confirm('bạn có chắc muốn xóa  vĩnh viễn không?');">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>{{ $row->id }}</td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>

>@endsection
