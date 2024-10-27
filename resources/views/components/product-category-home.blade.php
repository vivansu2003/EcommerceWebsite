@foreach ($category_list as $cat_row)
    <div class="section_product_category my-5 py-4">
        <div class="container">
            <div class="category-box">
                <h1 class="text-center">{{ $cat_row->name }}</h1>
                <div class="row">
                    <div class="col-12">
                        <x-product-category :catrow="$cat_row" />
                        <div class="row mt-5">
                            <div class="col-12 text-center">
                                <a href="{{ route('site.product.category', ['slug' => $cat_row->slug]) }}"
                                    class="btn btn-success px-5">Xem thêm sản phẩm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
