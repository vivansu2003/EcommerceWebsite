@extends('backend.dashboard.index')
@section('title', 'thùng rác chủ đề')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.topic.index') }}" class="btn btn-success ">
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
                        <th class="text-center">tên chủ đề</th>
                        <th class="text-center">slug</th>
                        <th class="text-center">mô tả</th>
                        <th class="text-center">hành động</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">trạng thái</t </tr>
                </thead>
                <tbody>
                    @foreach ($topic as $row)
                        <tr class="datarow">
                            <td><input type="checkbox" name="topic_checkbox" value="1"></td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->slug }}</td>
                            <td>{{ $row->description }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.topic.restore', $row->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Restore
                                </a>
                                <a href="{{ route('admin.topic.edit', $row->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.topic.destroy', $row->id) }}" class="btn btn-sm btn-danger"
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
