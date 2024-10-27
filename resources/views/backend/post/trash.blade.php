@extends('backend.dashboard.index')
@section('title', 'thùng rác bài viết')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.post.index') }}" class="btn btn-success ">
                        <i class=aria-hidden="true"></i>quay về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">id</th>
                        <th class="text-center">hình ảnh</th>
                        <th class="text-center">chủ đề ID</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">chi tiết</th>
                        <th class="text-center">mô tả</th>
                        <th class="text-center">trạng thái</th>
                        <th class="text-center">hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($post as $row)
                        <tr class="datarow">
                            <td>{{ $row->id }}</td>
                            <td>
                                @if ($row->image)
                                    <img src="{{ asset($row->image) }}" alt="{{ $row->name }}" style="max-width: 100px;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>{{ $row->topic_id }}</td>
                            <td>{{ $row->title }}</td>
                            <td>{{ $row->detail }}</td>
                            <td>{{ $row->description }}</td>
                            <td>{{ $row->status == 1 ? 'Active' : 'Inactive' }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.post.restore', $row->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Restore
                                </a>
                                <a href="{{ route('admin.post.edit', $row->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.post.destroy', $row->id) }}" class="btn btn-sm btn-danger"
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
