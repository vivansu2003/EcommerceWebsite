@extends('backend.dashboard.index')
@section('title', 'sản phẩm')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-11 text-right">
                    <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-success">
                        <i class="fa fa-plus px-1" aria-hidden="true"></i>thêm
                    </a>
                    <a href="{{ route('admin.product.trash') }}" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash px-1" aria-hidden="true"></i>Trash bin
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="col-md-10">
                <table class="table table-bordered table-hover table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">tên </th>
                            <th class="text-center">danh mục</th>
                            <th class="text-center">thương hiệu</th>
                            <th class="text-center">chi tiết</th>
                            <th class="text-center">giá</th>
                            <th class="text-center">giá Sale</th>
                            <th class="text-center">số lượng</th>
                            <th class="text-center">mô tả</th>
                            <th class="text-center">hình ảnh</th>
                            <th class="text-center">hành động</th>
                            <th class="text-center">ID</th>
                            <th class="text-center">trạng thái</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->categoryid }}</td>
                                <td>{{ $row->brandid }}</td>
                                <td>{{ $row->detail }}</td>
                                <td>{{ $row->price }}</td>
                                <td>{{ $row->pricesale }}</td>
                                <td>{{ $row->qty }}</td>
                                <td>{{ $row->description }}</td>
                                <td>
                                    @if ($row->image)
                                        <img src="{{ asset($row->image) }}" alt="{{ $row->name }}"
                                            style="max-width: 100px;">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="#" class="btn btn-sm btn-success">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-info">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.product.edit', $row->id) }} "
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.product.delete', $row->id) }}"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('bạn có chắc muốn xóa  và đưa vô thùng rác không?');">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </div>
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
