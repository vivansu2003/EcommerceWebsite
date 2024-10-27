<div class="product-card">
    <div class="product-image">
        <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
            <img class="img-fluid w-100" src="{{ asset($product->image) }}" alt="{{ $product->image }}">
        </a>
    </div>
    <div class="product-info p-2 bg-white">
        <h3><a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">{{ $product->name }}</a></h3>
        <div class="color-size">
            <div class="row">
                <div class="col-8">
                    <span class="color_size size_red"></span> <span class="color_size size_blue"></span>
                    <span class="color_size size_green"></span>
                    <span class="color_size size_yellow"></span>
                </div>
                <div class="col-4 text-end">
                    Full Size
                </div>
            </div>
        </div>
        <div class="price_sale">
            <div class="row">
                @if ($product->pricesale == 0)
                    <div class="col-12"> {{ number_format($product->price) }}</div>
                @else
                    <div class="col-8">{{ number_format($product->pricesale) }}
                        <del>{{ number_format($product->price) }}</del>
                    </div>
                    <div class="col-4 text-end">-{{ round(100 - ($product->pricesale / $product->price) * 100) }}%</div>
                @endif

            </div>
        </div>
    </div>

</div>
