@extends('backend.dashboard.index')
@section('title', 'Menu')
@section('content')
    <div class="wrapper">
        <div class="card-header">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('admin.menu.trash') }}" class="btn btn-sm btn-danger">
                        <i class="fa fa-trash px-2" aria-hidden="true"></i>Trash bin
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-3">
                    <form action="{{ route('admin.menu.store') }}" method="POST">
                        @csrf
                        <div class="accordion" id="accordionExample">
                            <div class="card p-3">
                                <label for="position">Vị trí</label>
                                <select name="position" id="position" class="form-control">
                                    <option value="mainmenu">Main Menu</option>
                                    <option value="footermenu">Footer Menu</option>
                                </select>
                                @error('position')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="card">
                                <div class="card-header" id="headingCategory">
                                    <a class="d-block" data-toggle="collapse" data-target="#collapseCategory"
                                        aria-expanded="true" aria-controls="collapseCategory">
                                        Danh mục
                                    </a>
                                </div>
                                <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach ($list_category as $category)
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" name="categoryid[{{ $category->id }}]"
                                                    type="checkbox" value="{{ $category->id }}"
                                                    id="category{{ $category->id }}">
                                                <label class="form-check-label" for="category{{ $category->id }}">
                                                    {{ $category->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <input type="submit" name="createCategory" class="btn btn-success"
                                                value="thêm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card">
                                <div class="card-header" id="headingBrand">
                                    <a class="d-block" data-toggle="collapse" data-target="#collapseBrand"
                                        aria-expanded="true" aria-controls="collapseBrand">
                                        Thương hiệu
                                    </a>
                                </div>
                                <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach ($list_brand as $brand)
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" name="brandid[{{ $brand->id }}]"
                                                    type="checkbox" value="{{ $brand->id }}"
                                                    id="brand{{ $brand->id }}">
                                                <label class="form-check-label" for="brand{{ $brand->id }}">
                                                    {{ $brand->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <input type="submit" name="createBrand" class="btn btn-success" value="thêm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card">
                                <div class="card-header" id="headingTopic">
                                    <a class="d-block" data-toggle="collapse" data-target="#collapseTopic"
                                        aria-expanded="true" aria-controls="collapseTopic">
                                        Chủ đề
                                    </a>
                                </div>
                                <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach ($list_topic as $topic)
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" name="topicid[{{ $topic->id }}]"
                                                    type="checkbox" value="{{ $topic->id }}"
                                                    id="topic{{ $topic->id }}">
                                                <label class="form-check-label" for="topic{{ $topic->id }}">
                                                    {{ $topic->name }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <button type="submit" name="createTopic" class="btn btn-success">Thêm
                                                menu</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card">
                                <div class="card-header" id="headingPage">
                                    <a class="d-block" data-toggle="collapse" data-target="#collapsePage"
                                        aria-expanded="true" aria-controls="collapsePage">
                                        Trang đơn
                                    </a>
                                </div>
                                <div id="collapsePage" class="collapse" aria-labelledby="headingPage"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        @foreach ($list_page as $page)
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" name="pageid[{{ $page->id }}]"
                                                    type="checkbox" value="{{ $page->id }}"
                                                    id="page{{ $page->id }}">
                                                <label class="form-check-label" for="pageid{{ $page->id }}">
                                                    {{ $page->title }}
                                                </label>
                                            </div>
                                        @endforeach
                                        <div class="mb-3">
                                            <input type="submit" name="createPage" class="btn btn-success"
                                                value="thêm">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- end card -->
                            <div class="card">
                                <div class="card-header" id="headingCustom">
                                    <a class="d-block" data-toggle="collapse" data-target="#collapseCustom"
                                        aria-expanded="true" aria-controls="collapseCustom">
                                        Tùy liên kết
                                    </a>
                                </div>
                                <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom"
                                    data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label for="name">Tên menu</label>
                                            <input type="text" value="" name="name" id="name"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="link">Liên kết</label>
                                            <input type="text" value="" name="link" id="link"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <input type="submit" name="createCustom" class="btn btn-success"
                                                value="thêm">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                            <div class="card p-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2">Chưa xuất bản</option>
                                    <option value="1">Xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="col-md-9">
                    <table class="table table-bordered table-striped table-hover">

                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center" style="width:30px;">#</th>
                                <th>Tên menu</th>
                                <th>Liên kết</th>
                                <th>Vị trí</th>
                                <th class="text-center" style="width:200px;">Chức năng</th>
                                <th class="text-center" style="width:30px;">ID</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $row)
                                <tr class="datarow">
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>
                                        <div class="name">
                                            {{ $row->name }}
                                        </div>
                                    </td>
                                    <td>{{ $row->link }}</td>
                                    <td>{{ $row->position }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-success">
                                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" class="btn btn-sm btn-info">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.menu.edit', $row->id) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{ route('admin.menu.delete', $row->id) }}" method="get"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Bạn có chắc chắn muốn xóa?')">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </td>
                                    <td>{{ $row->id }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>
        </div>
        <!-- /.CONTENT -->
    </div>

    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>@endsection
