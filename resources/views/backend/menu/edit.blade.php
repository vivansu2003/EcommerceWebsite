@extends('backend.dashboard.index')
@section('title', 'chỉnh sửa Menu')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>chỉnh sửa Menu</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.menu.update', $menu->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="name">tên</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ $menu->name }}">
                        </div>

                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" class="form-control" id="link" name="link"
                                value="{{ $menu->link }}">
                        </div>

                        <div class="form-group">
                            <label for="position">Position</label>
                            <select class="form-control" id="position" name="position">
                                <option value="mainmenu" {{ $menu->position == 'mainmenu' ? 'selected' : '' }}>Main Menu
                                </option>
                                <option value="footermenu" {{ $menu->position == 'footermenu' ? 'selected' : '' }}>Footer
                                    Menu</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="1" {{ $menu->status == 1 ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ $menu->status == 0 ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">cập nhật</button>
                        <a href="{{ route('admin.menu.index') }}" class="btn btn-primary">quay về menu</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
