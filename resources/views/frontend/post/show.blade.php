@extends('layouts.site')

@section('content')
    <div class="postdetail">
        <h1>{{ $post_detail->title }}</h1>
        <img class="img-fluid w-100" src="{{ asset($post_detail->image) }}" alt="{{ $post_detail->image }}">
        <p>{{ $post_detail->description }}</p>
        <div>{!! $post_detail->content !!}</div>
    </div>
@endsection
