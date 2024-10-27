@extends('backend.dashboard.index')
@section('title', 'thùng rác sản phẩm')
@section('content')
    <div class="container my-4">
        @if (session('message'))
            <div class="alert alert-{{ session('message')['type'] }} alert-dismissible fade show" role="alert">
                {{ session('message')['msg'] }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="row mb-3">
            <div class="col-12 text-right">
                <a href="{{ route('admin.product.index') }}" class="btn btn-success">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i> quay về danh sách sản phẩm
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">tên </th>
                        <th class="text-center">chi tiết</th>
                        <th class="text-center">giá</th>
                        <th class="text-center">giá Sale</th>
                        <th class="text-center">số lượng</th>
                        <th class="text-center">mô tả</th>
                        <th class="text-center">hình ảnh</th>
                        <th class="text-center">hành dộng</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">trạng thái</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $row)
                        <tr>
                            <td class="text-center">{{ $loop->iteration }}</td>
                            <td class="text-center">{{ $row->name }}</td>
                            <td class="text-center">{{ $row->detail }}</td>
                            <td class="text-center">{{ $row->price }}</td>
                            <td class="text-center">{{ $row->pricesale }}</td>
                            <td class="text-center">{{ $row->qty }}</td>
                            <td class="text-center">{{ $row->description }}</td>
                            <td class="text-center">
                                @if ($row->image)
                                    <img src="{{ asset($row->image) }}" alt="{{ $row->name }}"
                                        style="max-width: 100px;">
                                @else
                                    <span>No Image</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('admin.product.restore', $row->id) }}"
                                    class="btn btn-sm btn-success mb-1">
                                    <i class="fa fa-eye" aria-hidden="true"></i> Restore
                                </a>
                                <form action="{{ route('admin.product.destroy', $row->id) }}" method="get"
                                    style="display:inline;">
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('bạn có chắc muốn xóa  vĩnh viễn không?');">
                                        <i class="fa fa-trash" aria-hidden="true"></i> Delete
                                    </button>
                                </form>
                            </td>
                            <td class="text-center">{{ $row->id }}</td>
                            <td class="text-center">{{ $row->status == 0 ? 'Inactive' : 'Active' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    @endsection
