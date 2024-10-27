<section class="product-sale"
    style="margin-right: 70px; margin-left: 70px;  margin-bottom: 50px; 
     border-radius: 5px; padding: 10px; transition: transform 0.3s ease;">

    <!-- Nội dung sản phẩm giảm giá -->
    <div class="product-sale">
        <h2 class="">Sản phẩm giảm giá</h2>
        <h6 class="content-description">Chỉ có tại Spor!,dưới đây là sản phẩm chúng tôi đang giảm gia !</h6>
        <div class="row product-item-sale">
            @foreach ($product_sale as $product_item)
                <div class="col-md-3">
                    <x-pro-duct :productitem="$product_item" />
                </div>
            @endforeach
        </div>
    </div>
</section>
