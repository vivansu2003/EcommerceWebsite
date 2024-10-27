@extends('layouts.site')
@section('header')
    <link rel="stylesheet" href="">
@endsection
@section('content')
    <h1 class="text-center">Danh sách bài viết</h1>

    <div class="postall">
        @foreach ($posts as $post)
            <div class="post">
                <h2>{{ $post->title }}</h2>
                <a href="{{ route('frontend.post.show', ['slug' => $post->slug]) }}">
                    <img class="img-fluid w-100" src="{{ asset($post->image) }}" alt="{{ $post->image }}">
                </a>

                <p>{{ $post->description }}</p>
                <a href="{{ url('chi-tiet-bai-viet/' . $post->slug) }}">chi tiết</a>
            </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-12 d-flex justify-content-center">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
