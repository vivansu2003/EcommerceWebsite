@extends('backend.dashboard.index')
@section('title', 'Brand')
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">

                    <a href="{{ route('admin.brand.trash') }}" class="btn btn-sm btn-danger ">
                        <i class="fa fa-trash px-2" aria-hidden="true"></i>Trash bin
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <form action="{{ route('admin.brand.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name">tên</label>
                            <input type="text" value="{{ old('name') }}" name="name" id="name"
                                class="form-control">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="description">mô tả</label>
                            <textarea name="description" id="description" rows="3" class="form-control">{{ old('description') }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="image">hình ảnh</label>
                            <input type="file" name="image" id="image" class="form-control">
                            @error('image')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status">trạng thái</label>
                            <select name="status" id="status" class="form-control">
                                <option value="2">Show</option>
                                <option value="1">Hide</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">thêm</button>
                        </div>
                    </form>

                </div>
                <div class="col-md-10">
                    <table class="table table-bordered table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center"> tên</th>
                                <th class="text-center">mô tả</th>
                                <th class="text-center">hình ảnh</th>
                                <th class="text-center">hành động </th>
                                <th class="text-center">ID</th>
                                <th class="text-center">trạng thái</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td><img src="{{ asset($row->image) }}" alt="Brand Image" style="max-width: 100px;">
                                    </td>
                                    <td><a href="#" class="btn btn-sm btn-success ">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-info ">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.brand.edit', $row->id) }}"
                                            class="btn btn-sm btn-primary ">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{ route('admin.brand.delete', $row->id) }}" method="get"
                                            class="d-inline"
                                            onsubmit="return confirm('bạn có chắc muốn xóa và đưa vào thùng rác?');">
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"></button>
                                        </form>
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
    </div>
    </section>
    </div>

@endsection
