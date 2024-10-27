<div class="swiper-container">
    <div class="swiper-wrapper">
        @forelse ($list_banner as $banner)
            <div class="swiper-slide">
                <a href="{{ $banner->link }}" target="_blank">
                    <img class="img-fluid w-100 rounded" src="{{ asset($banner->image) }}" alt="{{ $banner->title }}"
                        style="border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.5);">
                    @if ($banner->title || $banner->description)
                        <div class="banner-content">
                            @if ($banner->title)
                                <h2>{{ $banner->title }}</h2>
                            @endif

                        </div>
                    @endif
                </a>
            </div>
        @empty
            <div class="swiper-slide">
                <p>Không có banner nào.</p>
            </div>
        @endforelse
    </div>
    <!-- Thêm Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Thêm Navigation -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const swiper = new Swiper('.swiper-container', {
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            // Remove the following line to disable touch move
            // allowTouchMove: false, 
            touchRatio: 0, // Set touch ratio to 0 to disable swipe gesture
            // Add the following line to enable autoplay
            loop: true, // Enable loop mode to allow autoplay
        });
    });
</script>
