@extends('backend.dashboard.index')
@section('title', 'liên hệ')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.contact.create') }}" class="btn btn-sm btn-success ">
                        <i class="fa fa-plus px-2" aria-hidden="true"></i>thêm
                    </a>
                    <a href="#" class="btn btn-sm btn-danger ">
                        <i class="fa fa-trash px-2" aria-hidden="true"></i>Trash bin
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center">#</th>
                        <th class="text-center">User ID</th>
                        <th class="text-center">tên</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Title</th>
                        <th class="text-center">Content</th>

                        <th class="text-center" style="width:70%">Action</th>
                        <th class="text-center" style="width:2%">ID</th>
                        <th class="text-center" style="width:1%">Status</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($list as $row)
                        <tr>
                            <td><input type="checkbox" name="contact_checkbox" value="1"></td>
                            <td>{{ $row->user_id }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->title }} </td>
                            <td>{{ $row->content }}</td>
                            {{-- <td>{{ $row->replay_id }}</td> --}}
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="#" class="btn btn-sm btn-success">
                                        <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-info">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{ route('admin.contact.edit', $row->id) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="#" class="btn btn-sm btn-danger">
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
    </section>
    <!-- /.CONTENT -->
    </div>

@endsection
