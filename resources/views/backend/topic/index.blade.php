@extends('backend.dashboard.index')
@section('title', 'chủ đề')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.topic.trash') }}" class="btn btn-sm btn-danger ">
                        <i class="fa fa-trash px-2" aria-hidden="true"></i>Trash bin
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('admin.topic.store') }}" method="post">
                        @csrf
                        <div class="container">
                            <div class="row g-3">
                                <div class="col-md-12 mb-3">
                                    <label for="name" class="form-label">tên chủ đề</label>
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="{{ old('name') }}" />
                                    @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="description" class="form-label">mô tả</label>
                                    <textarea name="description" id="description" class="form-control" rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="status" class="form-label">trạng thái</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="2">Chưa xuất bản</option>
                                        <option value="1">Xuất bản</option>
                                    </select>
                                    @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-12 mb-3">
                                    <button class="btn btn-primary w-100" type="submit">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-md-9">
                    <table class="table table-bordered table-hover table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">tên chủ đề</th>
                                <th class="text-center">slug</th>
                                <th class="text-center">mô tả</th>
                                <th class="text-center">hành động</th>
                                <th class="text-center">ID</th>
                                <th class="text-center">trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $row)
                                <tr>
                                    <td><input type="checkbox" name="topic_checkbox" value="1"></td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->slug }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td><a href="#" class="btn btn-sm btn-success ">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-info ">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.topic.edit', $row->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.topic.delete', $row->id) }}"
                                            class="btn btn-sm btn-danger "
                                            onclick="return confirm('bạn có chắc muốn xóa  và đưa vô thùng rác không?');">
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
    </div>
    </section>
    <!-- /.CONTENT -->
    </div>
@endsection
