<?php

//sử dụng controllerbackend
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Middleware\LoginMiddleware;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;
//sử dụng controller frontend
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ContactController as lienheController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\PageController;
use App\Http\Controllers\frontend\PostController as baivietController;
use App\Http\Controllers\frontend\ProductController as sanphamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('site.home');

//bài viết
Route::get('bai-viet', [baivietController::class, 'index'])->name('frontend.post.index');
Route::get('chi-tiet-bai-viet/{slug}', [baivietController::class, 'show'])->name('frontend.post.show');
Route::get('chu-de/{slug}', [baivietController::class, 'topic'])->name('frontend.post.topic');

// //sản phẩm
Route::get('san-pham', [sanphamController::class, 'index'])->name('site.product');
Route::get('danh-muc/{slug}', [sanphamController::class, 'category'])->name('site.product.category');
Route::get('chi-tiet-san-pham/{slug}', [sanphamController::class, 'product_detail'])->name('site.product.detail');
Route::get('thuong-hieu/{slug}', [sanphamController::class, 'brand'])->name('site.product.banrd');

// //liên hệ
Route::get('lien-he', [lienheController::class, 'contact'])->name('frontend.contact');
Route::post('lien-he', [lienheController::class, 'docontact'])->name('frontend.docontact');


// //cart
Route::get('gio-hang', [CartController::class, 'index'])->name('site.cart.index');
Route::get('cart/addcart', [CartController::class, 'addcart'])->name('site.cart.addcart');
Route::post('cart/update', [CartController::class, 'update'])->name('site.cart.update');
Route::get('cart/delete{id}', [CartController::class, 'delete'])->name('site.cart.delete');
Route::get('thanh-toan', [CartController::class, 'checkout'])->name('site.cart.checkout');
Route::post('thong-bao', [CartController::class, 'docheckout'])->name('site.cart.docheckout');

// //chính sách mua hàng
// Route::get('trang-don/chinh-sach-mua-hang', [PageController::class, 'chinhsachmuahang'])->name('frontend.page.chinhsachmuahang');
// Route::get('trang-don/gioi-thieu', [PageController::class, 'gioithieu'])->name('frontend.page.gioithieu');
// Route::get('trang-don/chinh-sach-bao-hang', [PageController::class, 'chinhsachbaohanh'])->name('frontend.page.chinhsachbaohanh');
// Route::get('trang-don/chinh-sach-van-chuyen', [PageController::class, 'chinhsachvanchuyen'])->name('frontend.page.chinhsachvanchuyen');
// Route::get('trang-don/chinh-sach-doi-tra', [PageController::class, 'chinhsachdoitra'])->name('frontend.page.chinhsachdoitra');

//login
Route::get('dang-nhap', [AuthController::class, 'getlogin'])->name('website.getlogin');
Route::post('dang-nhap', [AuthController::class, 'dologin'])->name('website.dologin');
Route::get('dang-xuat', [AuthController::class, 'logout'])->name('website.logout');

//registration
Route::get('dang-ky', [AuthController::class, 'getRegister'])->name('website.getRegister');
Route::post('dang-ky', [AuthController::class, 'doRegister'])->name('website.doRegister');
//verify
Route::get('/verify-otp/{phone}', [AuthController::class, 'showVerifyOtpForm'])->name('verify.otp');
Route::post('/verify-otp', [AuthController::class, 'verifyOtp'])->name('verify.otp.submit');

// //admin
Route::prefix('admin')->middleware('middleauth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');

    //banner
    Route::prefix('/')->group(function () {
        Route::get('banner', [BannerController::class, 'index'])->name('admin.banner.index');
        Route::get('trash', [BannerController::class, 'trash'])->name('admin.banner.trash');
        Route::get('show/{id}', [BannerController::class, 'show'])->name('admin.banner.show');
        Route::get('create', [BannerController::class, 'create'])->name('admin.banner.create');
        Route::post('store', [BannerController::class, 'store'])->name('admin.banner.store');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
        Route::put('/update/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
        Route::get('/delete/{id}', [BannerController::class, 'delete'])->name('admin.banner.delete');
        Route::get('/restore/{id}', [BannerController::class, 'restore'])->name('admin.banner.restore');
        Route::get('/destroy/{id}', [BannerController::class, 'destroy'])->name('admin.banner.destroy');
    });

    //brand
    Route::prefix('brand')->group(function () {
        Route::get('/', [BrandController::class, 'index'])->name('admin.brand.index');
        Route::get('/trash', [BrandController::class, 'trash'])->name('admin.brand.trash');
        Route::get('/show/{id}', [BrandController::class, 'index'])->name('admin.brand.show');
        Route::get('/create', [BrandController::class, 'index'])->name('admin.brand.create');
        Route::post('store', [BrandController::class, 'store'])->name('admin.brand.store'); // Chỉ định POST cho route store
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('admin.brand.edit');
        Route::put('update/{id}', [BrandController::class, 'update'])->name('admin.brand.update');
        Route::get('delete/{id}', [BrandController::class, 'delete'])->name('admin.brand.delete');
        Route::get('destroy/{id}', [BrandController::class, 'destroy'])->name('admin.brand.destroy');
        Route::get('/restore/{id}', [BrandController::class, 'restore'])->name('admin.brand.restore');
    });

    //category
    Route::prefix('catrgory')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('admin.category.index');
        Route::get('trash', [CategoryController::class, 'trash'])->name('admin.category.trash');
        Route::get('/show/{category}', [CategoryController::class, 'show'])->name('admin.category.show');
        Route::get('/create', [CategoryController::class, 'create'])->name('admin.category.create');
        Route::post('store', [CategoryController::class, 'store'])->name('admin.category.store');        // Route::post('/update/{category}', [CategoryController::class, 'index'])->name('admin.category.update');
        Route::get('delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
        Route::put('update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
        Route::get('restore/{id}', [CategoryController::class, 'restore'])->name('admin.category.restore');
        Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');
        Route::match(['get', 'post'], 'admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store.unique');
    });

    //contact
    Route::prefix('contact')->group(function () {
        Route::get('/', [ContactController::class, 'index'])->name('admin.contact.index');
        // Route::get('/trash', [ContactController::class, 'index'])->name('admin.contact.trash');
        // Route::post('store', [ContactController::class, 'store'])->name('admin.contact.store');
        Route::get('create', [ContactController::class, 'create'])->name('admin.contact.create');
        Route::get('edit/{id}', [ContactController::class, 'edit'])->name('admin.contact.edit');
        Route::put('update/{id}', [ContactController::class, 'update'])->name('admin.contact.update');
        // Route::get('delete/{id}', [ContactController::class, 'index'])->name('admin.contact.delete');

    });

    //menu
    Route::prefix('menu')->group(function () {
        Route::get('/', [MenuController::class, 'index'])->name('admin.menu.index');
        Route::get('trash', [MenuController::class, 'trash'])->name('admin.menu.trash');
        Route::get('show/{id}', [MenuController::class, 'show'])->name('admin.menu.show');
        Route::get('create', [MenuController::class, 'create'])->name('admin.menu.create');
        Route::post('store', [MenuController::class, 'store'])->name('admin.menu.store');
        Route::get('edit/{id}', [MenuController::class, 'edit'])->name('admin.menu.edit');
        Route::put('update/{id}', [MenuController::class, 'update'])->name('admin.menu.update');
        Route::get('delete/{id}', [MenuController::class, 'delete'])->name('admin.menu.delete');
        Route::get('restore/{id}', [MenuController::class, 'restore'])->name('admin.menu.restore');
        Route::get('destroy/{id}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');

    });

    //Order
    Route::prefix('order')->group(function () {
        Route::get('/', [OrderController::class, 'index'])->name('admin.order.index');
        Route::get('/trash', [OrderController::class, 'index'])->name('admin.order.trash');
        Route::get('/show/{id}', [OrderController::class, 'index'])->name('admin.order.show');
        Route::get('create', [OrderController::class, 'create'])->name('admin.order.create');
        Route::post('store', [OrderController::class, 'store'])->name('admin.order.store');
        Route::get('/product', [OrderController::class, 'index'])->name('admin.order.product');
        Route::get('/edit/{id}', [OrderController::class, 'index'])->name('admin.order.edit');
        Route::get('/update/{id}', [OrderController::class, 'index'])->name('admin.order.update');
        Route::get('delete/{id}', [OrderController::class, 'delete'])->name('admin.order.delete');
        Route::get('/restore/{id}', [OrderController::class, 'index'])->name('admin.order.restore');
        Route::get('/destroy/{id}', [OrderController::class, 'index'])->name('admin.order.destroy');

    });

    //post
    Route::prefix('post')->group(function () {
        Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
        Route::get('trash', [PostController::class, 'trash'])->name('admin.post.trash');
        Route::get('/show/{id}', [PostController::class, 'show'])->name('admin.post.show');
        Route::get('create', [PostController::class, 'create'])->name('admin.post.create');
        Route::post('store', [PostController::class, 'store'])->name('admin.post.store');
        Route::get('/edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
        Route::put('/update/{id}', [PostController::class, 'update'])->name('admin.post.update');
        Route::get('delete/{id}', [PostController::class, 'delete'])->name('admin.post.delete');
        Route::get('/restore/{id}', [PostController::class, 'restore'])->name('admin.post.restore');
        Route::get('/destroy/{id}', [PostController::class, 'destroy'])->name('admin.post.destroy');
    });

    //product
    Route::prefix('product')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('admin.product.index');
        Route::get('trash', [ProductController::class, 'trash'])->name('admin.product.trash');
        Route::get('/show/{id}', [ProductController::class, 'index'])->name('admin.product.show');
        Route::post('store', [ProductController::class, 'store'])->name('admin.product.store');
        Route::get('create', [ProductController::class, 'create'])->name('admin.product.create');
        Route::get('/product', [ProductController::class, 'product'])->name('admin.product.product');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
        Route::put('/update/{id}', [ProductController::class, 'update'])->name('admin.product.update');
        Route::get('delete/{id}', [ProductController::class, 'delete'])->name('admin.product.delete');
        Route::get('/restore/{id}', [ProductController::class, 'restore'])->name('admin.product.restore');
        Route::get('/destroy/{id}', [ProductController::class, 'destroy'])->name('admin.product.destroy');

    });

    //topic
    Route::prefix('topic')->group(function () {
        Route::get('/', [TopicController::class, 'index'])->name('admin.topic.index');
        Route::get('/trash', [TopicController::class, 'trash'])->name('admin.topic.trash');
        Route::get('/show/{id}', [TopicController::class, 'show'])->name('admin.topic.show');
        Route::post('store', [TopicController::class, 'store'])->name('admin.topic.store');
        Route::get('create', [TopicController::class, 'create'])->name('admin.topic.create');
        Route::get('/edit/{id}', [TopicController::class, 'edit'])->name('admin.topic.edit');
        Route::put('/update/{id}', [TopicController::class, 'update'])->name('admin.topic.update');
        Route::get('/delete/{id}', [TopicController::class, 'delete'])->name('admin.topic.delete');
        Route::get('/restore/{id}', [TopicController::class, 'restore'])->name('admin.topic.restore');
        Route::get('/destroy/{id}', [TopicController::class, 'destroy'])->name('admin.topic.destroy');

    });

    //user
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
        Route::get('/trash', [UserController::class, 'trash'])->name('admin.user.trash');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('admin.user.show');
        Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
        Route::post('store', [UserController::class, 'store'])->name('admin.user.store');
        Route::get('/product', [UserController::class, 'index'])->name('admin.user.product');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
        Route::put('/update/{id}', [UserController::class, 'update'])->name('admin.user.update');
        Route::get('/delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
        Route::get('/restore/{id}', [UserController::class, 'restore'])->name('admin.user.restore');
        Route::get('/destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');

    });

});
