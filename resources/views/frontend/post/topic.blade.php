@extends('layouts.site')
@section('content')
    <h1 class="text-center">{{ $topic->name }}</h1>
    <ul>
        <div class="postall">
            @foreach ($list_post as $post)
                <div class="post">
                    <h2>{{ $post->title }}</h2>
                    <img class="img-fluid w-100" src="{{ asset($post->image) }}" alt="{{ $post->image }}">
                    <p>{{ $post->description }}</p>
                    <a href="{{ url('chi-tiet-bai-viet/' . $post->slug) }}">chi tiết</a>
                </div>
            @endforeach
        </div>
        <div class="row mt-5">
            <div class="col-12 d-flex justify-content-center">
                {{ $list_post->links() }}
            </div>
        </div>
    </ul>
@endsection
