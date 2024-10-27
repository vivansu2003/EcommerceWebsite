<section class="new-spost"
    style="margin-right: 70px; margin-left: 70px; border-radius: 5px; padding: 10px; ">
    <!-- Nội dung bài viết mới -->
    <div class="new-spost">
        <h2 class="">Bài viết mới</h2>
        <h6 class="content-description">hãy đọc những bài viết mới nhất của chúng tôi tại đây !!</h6>
        <div class="row">
            @foreach ($post_new as $post)
                <div class="col-md-3 post-item">
                    <a href="{{ route('frontend.post.show', ['slug' => $post->slug]) }}">
                        <img class="img-fluid w-100" src="{{ asset($post->image) }}" alt="{{ $post->image }}">
                    </a>
                    <h3>
                        <a class="line-clamp line-clamp-1" href="/chi-tiet-bai-viet/{{ $post->slug }}"
                            title="{{ $post->title }}">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <p>
                        {{ $post->description }}
                    </p>
                    <a href="{{ url('chi-tiet-bai-viet/' . $post->slug) }}">Chi tiết </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
