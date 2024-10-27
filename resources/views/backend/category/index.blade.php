@extends('backend.dashboard.index')
@section('title', 'danh mục')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">

                    <a href="{{ route('admin.category.trash') }}" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash px-2" aria-hidden="true"></i>Trash bin
                    </a>
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">Tên danh mục</label>
                            <input type="text" value="{{ old('name') }}" name="name" id="name"
                                class="form-control">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">Mô tả</label>
                            <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="parent_id">Cấp cha</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                <option value="0">Cấp cha</option>
                                {!! $htmlparentid !!}
                            </select>
                            @error('parent_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="sort_order">Sắp xếp</label>
                            <select name="sort_order" id="sort_order" class="form-control">
                                <option value="">Chọn vị trí</option>
                                {!! $htmlsortorder !!}
                            </select>
                            @error('sort_order')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image">Hình ảnh</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status">Trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="2">Chưa xuất bản</option>
                                <option value="1">Xuất bản</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Thêm danh mục</button>
                        </div>
                    </form>
                </div>

                <div class="col-md-10">
                    <table class="table table-bordered table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">hình anhe</th>
                                <th class="text-center">tên danh mục</th>
                                <th class="text-center" style="width:8%">Parent Category</th>
                                <th class="text-center">Slug</th>
                                <th class="text-center">mô tả</th>
                                <th class="text-center">hành động</th>
                                <th class="text-center">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $row)
                                <tr class="datarow">
                                    <td class="text-center">
                                        <input type="checkbox">
                                    </td>
                                    <td class="text-center">
                                        @if ($row->image)
                                            <img src="{{ asset($row->image) }}" alt="{{ $row->name }}"
                                                style="max-width: 100px; height: auto;">
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        {{ $row->name }}
                                    </td>
                                    <td class="text-center">{{ $row->parent_id }}</td>
                                    <td class="text-center">{{ $row->slug }}</td>
                                    <td class="text-center">{{ $row->description }}</td>
                                    <td class="text-center">
                                        <div class="btn-group" role="group">
                                            <a href="#" class="btn btn-sm btn-success mx-1">
                                                <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                            </a>
                                            <a href="#" class="btn btn-sm btn-info mx-1">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.category.edit', $row->id) }}"
                                                class="btn btn-sm btn-primary mx-1">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.category.delete', $row->id) }}"
                                                class="btn btn-sm btn-danger mx-1"
                                                onclick="return confirm('bạn có chắc muốn xóa và đưa vô thùng rác không?');">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </a>
                                        </div>
                                    </td>
                                    <td class="text-center">{{ $row->id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
