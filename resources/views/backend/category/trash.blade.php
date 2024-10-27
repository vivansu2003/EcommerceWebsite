@extends('backend.dashboard.index')
@section('title', 'thùng rác danh mục')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">

                    <a href="{{ route('admin.category.index') }}" class="btn btn-success ">
                        <i class=aria-hidden="true"></i>quay về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">Image</th>
                        <th class="text-center">Category Name</th>
                        <th class="text-center">Parent Category</th>
                        <th class="text-center">Slug</th>
                        <th class="text-center">Description</th>
                        <th class="text-center">Action</th>
                        <th class="text-center">ID</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $row)
                        <tr class="datarow">
                            <td>
                                <input type="checkbox">
                            </td>
                            <td>
                                @if ($row->image)
                                    <img src="{{ asset($row->image) }}" alt="{{ $row->name }}" style="max-width: 100px;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td>
                                <div class="name">
                                    {{ $row->name }}

                                </div>
                            </td>
                            <td>{{ $row->parent_id }}</td>
                            <td>{{ $row->slug }}</td>
                            <td>{{ $row->description }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.category.restore', $row->id) }}" class="btn btn-sm btn-success">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Restore
                                </a>
                                <a href="{{ route('admin.category.edit', $row->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{ route('admin.category.destroy', $row->id) }}" class="btn btn-sm btn-danger"
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
