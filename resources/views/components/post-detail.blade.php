<!-- post-detail.blade.php -->
@extends('layouts.site')
@section('content')
    <section class="post-detail">
        <!-- Chi tiết bài viết -->
        <h2>{{ $post->title }}</h2>
        <div class="row">
            <div class="post-detail-item">
                <img class="img-fluid" src="{{ asset('images/post/' . $post->image) }}" alt="{{ $post->image }}">
                <p>
                    {{ $post->description }}
                </p>
            </div>
        </div>
    </section>
@endsection
