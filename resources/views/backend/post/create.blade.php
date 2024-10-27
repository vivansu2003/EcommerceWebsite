@extends('backend.dashboard.index')
@section('title', $title ?? ' thêm bài viết')
@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6 text-success">
                    <h1 style="text-transform: uppercase;"></h1>
                </div>

            </div>
        </div>
    </section>

    <section class="content">
        <form action="{{ route('admin.post.store') }}" name="form1" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                                type="button" role="tab" aria-controls="home" aria-selected="true">Chính</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="content-tab" data-bs-toggle="tab" data-bs-target="#content"
                                type="button" role="tab" aria-controls="content" aria-selected="false">Nội
                                Dung</button>
                        </li>
                    </ul>
                    <div class="tab-content p-3 border-right border-left border-bottom" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-8">
                                    <div>
                                        <label for="title">Tên bài viết</label>
                                        <input type="text" name="title" id="title" class="form-control"
                                            placeholder="" value="{{ old('title') }}">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="description">Mô tả</label>
                                        <textarea name="description" id="description" class="form-control" placeholder="Mô tả">{{ old('description') }}</textarea>
                                        @error('description')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="tab-pane fade show active" id="content" role="tabpanel"
                                        aria-labelledby="content-tab">

                                        <label for="detail">Chi tiết</label>
                                        <textarea name="detail" id="detail" cols="10" rows="2" class="form-control" placeholder="Chi tiết">{{ old('detail') }}</textarea>
                                        @error('detail')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="topic_id">Chủ đề</label>
                                        <select name="topic_id" id="topic_id" class="form-control">
                                            <option value="">--chon chủ đề--</option>
                                            {!! $html_topic_id !!}
                                        </select>
                                        @error('topic_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="image">Hình đại diện</label>
                                        <input type="file" name="image" id="image" class="form-control"
                                            value="{{ old('image') }}">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="status">Trạng thái</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Xuất bản
                                            </option>
                                            <option value="2" {{ old('status') == 2 ? 'selected' : '' }}>Không xuất
                                                bản
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-12 text-right">
                            <button name="THEM" type="submit" class="btn btn-sm btn-success">
                                <i class="fas fa-save"></i> Lưu[Thêm]
                            </button>
                            <a class="btn btn-sm btn-info" href="{{ route('admin.post.index') }}">
                                <i class="fas fa-arrow-circle-left"></i> Quay về danh sách
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
