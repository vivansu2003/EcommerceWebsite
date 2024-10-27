@extends('backend.dashboard.index')
@section('title', 'thùng rác brand')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">

                    <a href="{{ route('admin.brand.index') }}" class="btn btn-success ">
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
                        <th class="text-center"> tên </th>
                        <th class="text-center">mô tả</th>
                        <th class="text-center">hình ảnh</th>
                        <th class="text-center">hành động</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">trạng thái</thth>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($brand as $row)
                        <tr class="datarow">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->description }}</td>
                            <td><img src="{{ asset($row->image) }}" alt="Brand Image" style="max-width: 100px;">
                            </td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.brand.restore', $row->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.brand.edit', $row->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.brand.destroy', $row->id) }}" class="btn btn-sm btn-danger"
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

>@endsection
