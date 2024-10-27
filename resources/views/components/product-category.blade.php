<div class="row">
    @foreach ($product_list as $product)
        <div class="col-md">
            <x-pro-duct :productitem="$product" />
        </div>
    @endforeach

</div>
