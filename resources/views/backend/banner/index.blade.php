@extends('backend.dashboard.index')
@section('title', $title ?? 'Banner')
@section('content')
    <div class="card-body">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">

                    <a href="{{ route('admin.banner.trash') }}" class="btn btn-sm btn-danger ">
                        <i class="fa fa-trash px-2" aria-hidden="true"></i>Trash bin
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2">
                <form action="{{ route('admin.banner.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name">tên</label>
                        <input type="text" value="" name="name" id="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ old('name', '') }}">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description">mô tả</label>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image">hình ảnh</label>
                        <input type="file" name="image" id="image"
                            class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="sort_order">sắp xếp</label>
                        <input type="number" name="sort_order" id="sort_order"
                            class="form-control @error('sort_order') is-invalid @enderror"
                            value="{{ old('sort_order', 0) }}">
                        @error('sort_order')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="status">trạng thái</label>
                        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="2">Chưa xuất bản</option>
                            <option value="1">Xuất bản</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="link">Link</label>
                        <input type="" name="link" id="link"
                            class="form-control @error('link') is-invalid @enderror" value="{{ old('link', '') }}"
                            placeholder="https://example.com">
                        @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="position">position</label>
                        <select name="position" id="position" class="form-control @error('position') is-invalid @enderror">
                            <option value="slidershow">slidershow</option>
                            <!-- Add more options as needed -->
                        </select>
                        @error('position')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="create" class="btn btn-success">Thêm banner</button>
                    </div>
                </form>
            </div>
            <div class="col-md-10">
                <table class="table table-bordered" id="myTable">
                    <thead class="thead-dark"">
                        <tr>
                            <th class="text-center" style="width:5%">
                                <div class="form-group select-all">
                                    <input type="checkbox" id="select-all">
                                </div>
                            </th>
                            <th class="text-center" style="width:10%">Hình</th>
                            <th class="text-center" style="width:10%">mô tả</th>
                            <th class="text-center" style="width:12%">Tiêu đề</th>
                            <th class="text-center">Link</th>
                            <th class="text-center" style="width:10%">Ngày tạo</th>
                            <th class="text-center" style="width:20%">Chức năng</th>
                            <th class="text-center" style="width 5%">Trạng thái</th>
                            <th class="text-center" style="width:5%">ID</th>
                            <th class="text-center" style="width:5%">Sort Order</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            <tr>
                                <td class="text-center">
                                    <div class="form-group">
                                        <input name="checkId[]" type="checkbox" value="{{ $row->id }}">
                                    </div>
                                </td>
                                <td>
                                    @if ($row->image)
                                        <img src="{{ asset($row->image) }}" alt="{{ $row->name }}"
                                            style="max-width: 100px;">
                                    @else
                                        <span>No Image</span>
                                    @endif
                                </td>
                                <td>{{ $row->description }}</td>
                                <td>{{ $row->name }}</td>
                                <td>{{ $row->link }}</td>
                                <td class="text-center">{{ $row->created_at }}</td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-success">
                                        <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.banner.edit', $row->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.banner.delete', $row->id) }}" class="btn btn-sm btn-danger"
                                        onsubmit="return confirm('bạn có chắc muốn xóa và đưa vào thùng rác?');">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
                                </td>
                                <td class="text-center">{{ $row->status == 1 ? '1' : '2' }}</td>
                                <td class="text-center">{{ $row->id }}</td>
                                <td class="text-center">{{ $row->sort_order }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
