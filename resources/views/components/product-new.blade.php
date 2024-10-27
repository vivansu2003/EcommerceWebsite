<section class="product-new"
    style="margin-right: 70px; margin-left: 70px;  margin-bottom: 40px; border-radius: 5px; padding: 10px; 
    transition: transform 0.3s ease; ">
    <!-- Nội dung sản phẩm mới -->
    <div class="produc-new">
        <h2 class="">Sản phẩm Mới</h2>
        <h6 class="content-description">Chỉ có tại Sport! Đừng bỏ lỡ cơ hội sở hữu
            những sản phẩm độc đáo và giới hạn. Mua ngay hôm nay!
        </h6>
        <h7>chúng tôi mới cập nhật sản phẩm mới nhất tại đây!</h7>
        <div class="row">
            @foreach ($product_new as $product_item)
                <div class="col-md-3">
                    <x-pro-duct :productitem="$product_item" />
                </div>
            @endforeach
        </div>
    </div>
</section>
