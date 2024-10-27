<div class="container mt-4">
    <h2 class="text-center mb-4">Danh mục sản phẩm</h2>
    <div class="d-flex justify-content-center flex-wrap">
        @forelse ($categories as $category)
            <div class="category-card">
                <div class="category-image-container">
                    <img src="{{ asset($category->image) }}" class="category-image" alt="{{ $category->name }}">
                </div>
                <div class="category-content">
                    <h5 class="category-title">{{ $category->name }}</h5>
                    <a href="{{ route('site.product.category', ['slug' => $category->slug]) }}"
                        class="btn btn-primary btn-sm">Xem sản phẩm</a>
                </div>
            </div>
        @empty
            <p class="text-center w-100">No categories found.</p>
        @endforelse
    </div>
</div>

<style>
    .category-card {
        width: 150px;
        height: 150px;
        border-radius: 50%;
        overflow: hidden;
        position: relative;
        margin: 40px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        display: inline-block;
    }

    .category-card:hover {
        transform: scale(1.05);
    }

    .category-image-container {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
    }

    .category-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .category-content {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(255, 255, 255, 0.8);
        padding: 5px;
        text-align: center;
    }

    .category-title {
        margin: 0;
        font-size: 0.9rem;
        font-weight: bold;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>
