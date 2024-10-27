@extends('backend.dashboard.index')
@section('title', 'đơn hàng')
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.order.create') }}" class="btn btn-sm btn-success ">
                        <i class="fa fa-plus px-2" aria-hidden="true"></i>Add
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
                        <th class="text-center">User Id</th>
                        <th class="text-center">Delivery name</th>
                        <th class="text-center">Delivery email</th>
                        <th class="text-center">Delivery phone</th>
                        <th class="text-center">Delivery adress</th>
                        <th class="text-center">Delivery note</th>
                        <th class="text-center">Action</th>
                        <th class="text-center">ID</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $row)
                        <tr>
                            <td><input type="checkbox" name="order_checkbox" value="1"></td>
                            <td>{{ $row->user_id }}</td>
                            <td>{{ $row->delivery_name }}</td>
                            <td>{{ $row->delivery_email }}</td>
                            <td>{{ $row->delivery_phone }}</td>
                            <td>{{ $row->delivery_address }}</td>
                            <td>{{ $row->note }}</td>
                            <td><a href="#" class="btn btn-sm btn-success ">
                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-info ">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary ">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger ">
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
    </section>
    <!-- /.CONTENT -->
    </div>


@endsection
