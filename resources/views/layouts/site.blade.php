<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css' rel='stylesheet' />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/styless.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .contact-icon {
            font-size: 24px;
            margin-right: 10px;
        }

        .contact__content-title {
            font-weight: bold;
        }

        .contact__content-link {
            color: #007bff;
            text-decoration: none;
        }

        .contact__content-link:hover {
            text-decoration: underline;
        }
    </style>

    <!-- Custom Inline CSS -->

</head>

<body>
    <header>
        <nav class="menu">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Logo">
            </div>
            <form class="search-form" action="#" method="GET">
                <input type="text" name="search" placeholder="Tìm kiếm...">
                <button type="submit">Tìm</button>
            </form>

            <x-main-menu />

            <div class="col-md-3 py-3">
                <ul class="nav justify-content-end">
                    <li class="nav-item px-2">
                        <i class=""></i>
                    </li>
                    @if (Auth::check())
                        @php
                            $user = Auth::user();
                        @endphp
                        <li class="nav-item px-2">
                            {{ $user->name }} <i class="fa-regular fa-user"></i>
                            <a href="{{ route('website.logout') }}" class="btn btn-primary btn-sm rounded-pill">Đăng
                                xuất</a>
                        </li>
                    @else
                        <li class="nav-item px-2">
                            <a href="{{ route('website.getlogin') }}">Đăng Nhập</a>
                    @endif
                    <li> <a href="{{ route('website.getRegister') }}">Đăng ký</a></li>

                    <li class="nav-item px-2 position-relative">
                        @php
                            $count = count(session('carts', []));
                        @endphp
                        <a class="item-link position-relative" href="{{ route('site.cart.index') }}">
                            Giỏ Hàng
                            <span
                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                (<span id="showqty">{{ $count }}</span>)
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer">
        <div class="download__app">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="download__app-introduce">
                            <div class="download__app-logo">
                                {{-- <svg version="1.1" viewBox="0 0 244 50" class=""> --}}
                                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                                    style="width: 300px; height: auto;">

                                </svg>
                            </div>
                            <div class="">
                                <h2 class="shop__content-heading">TÌM KIẾM ĐỒ THỂ THAO GIÁ TỐT NHẤT</h2>
                                <p class="shop__content-description">Chúng tôi là cửa hàng đồ thể thao hàng đầu Việt
                                    Nam. Khi mua sắm cùng chúng tôi, bạn sẽ tìm thấy những sản phẩm chất lượng cho mọi
                                    hoạt động thể thao. Với chúng tôi, việc tìm kiếm và đặt hàng đồ thể thao, giày, phụ
                                    kiện... trở nên nhanh chóng, thuận tiện và dễ dàng.</p>
                            </div>
                            {{-- <div class="download__app-by-image">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="download__app-qrcode">
                                            <img src="./assets/imgs/qr-code.png" alt=""
                                                class="download__app-qrcode-img">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <div class="download__app--app">
                                            <a href="" class="download__app-by-store">
                                                <img src="./assets/imgs/google-play.svg" alt=""
                                                    class="download__app-by-store-img">
                                            </a>
                                            <a href="" class="download__app-by-store">
                                                <img src="./assets/imgs/apple-store.svg" alt=""
                                                    class="download__app-by-store-img">
                                            </a>
                                            <a href="" class="download__app-by-store">
                                                <img src="./assets/imgs/huawei.svg" alt=""
                                                    class="download__app-by-store-img">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="download__app-picture">
                                    <img src="{{ asset('images/messi.jpg') }}" alt="Logo"
                                        style="width: 300px; height: 380px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="download__app-picture" style="margin-top: 20px;">
                                    <img src="{{ asset('images/ronaldo.jpg') }}" alt="Logo"
                                        style="width: 300px; height: 420px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-3 col-md-6" style="height: 100%;">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo"
                                    style="width: 150px; height: auto; margin-left: 0; margin-bottom: 20px;">
                                <div class="contact-item">
                                    <i class="fas fa-envelope contact-icon"></i>
                                    <div class="contact__content">
                                        <p class="contact__content-title">Messenger</p>
                                        <a href="" class="contact__content-link">http://127.0.0.1:8000/</a>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <i class="fas fa-phone-volume contact-icon"></i>
                                    <div class="contact__content">
                                        <p class="contact__content-title">Call center</p>
                                        <a href="" class="contact__content-link"> 18006586 (Việt Nam)</a>
                                        <a href="" class="contact__content-link"> 0889866666</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="top-football-shop">
                                    <p class="footer__content-heading">TOP SẢN PHẨM ĐÁ BÓNG ĐƯỢC YÊU THÍCH</p>
                                    <ul class="footer__content-list">
                                        <li class="footer__content-item"><a href="" class="footer__content-link"
                                                style="color: black;">Giày đá
                                                bóng</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Áo thi
                                                đấu</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Quần đá
                                                bóng</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Bóng
                                                đá</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Găng tay
                                                thủ môn</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Túi đựng
                                                bóng</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Phụ
                                                kiện thể thao</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Bảng
                                                tỉ số</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="favorite-space">
                                    <p class="footer__content-heading">KHÔNG GIAN ƯA THÍCH</p>
                                    <ul class="footer__content-list">
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Giày đá bóng</a>
                                        </li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Áo thi đấu</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Quần đá bóng</a>
                                        </li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Bóng đá</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Phụ kiện bóng
                                                đá</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="about-me">
                                    <p class="footer__content-heading">VỀ CHÚNG TÔI</p>
                                    <ul class="footer__content-list">
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Blog</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Điều
                                                khoảng hoạt động</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">1800
                                                6586</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">+84
                                                8898 66666</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">vansu@2003</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Trang
                                                thông tin dành cho chủ nhà</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Cơ
                                                hội nghề nghiệp</a></li>
                                        <li class="footer__content-item"><a href=""
                                                class="footer__content-link" style="color: black;">Tạp
                                                chí bóng đá</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="social">
                    <div class="row">
                        <div class="col-lg-4 col-md-5">
                            <div class="social-item">
                                <p class="footer__content-heading">SECURE YOUR TRANSACTION</p>
                                <div class="payment-methods">
                                    <div class="payment-item">
                                        <img src="{{ asset('images/visa.png') }}" alt="Logo">
                                    </div>
                                    <div class="payment-item">
                                        <img src="{{ asset('images/paypal.png') }}" alt="Logo">
                                    </div>
                                    <div class="payment-item">
                                        <img src="{{ asset('images/mertro.jpg') }}" alt="Logo">
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4">
                            <div class="social-item">
                                <p class="footer__content-heading">CERTIFICATION</p>
                                <div class="business-partner">
                                    <div class="business-item">
                                        <img src="{{ asset('images/dangki.png') }}" alt="Logo"
                                            style="width: 150px; height: auto;">
                                    </div>
                                    <div class="business-item">
                                        <img src="{{ asset('images/thongbao.png') }}" alt="Logo"
                                            style="width: 250px; height: auto;">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3">
                            <div class="social-item">
                                <p class="footer__content-heading">FOLLOW US</p>
                                <div class="social-network">
                                    <div class="social-item">
                                        <a href=""><i class="fab fa-instagram social-icon"
                                                style="font-size: 30px;"></i></a>
                                    </div>
                                    <div class="social-item">
                                        <a href=""><i class="fab fa-youtube social-icon"
                                                style="font-size: 30px;"></i></a>
                                    </div>
                                    <div class="social-item">
                                        <a href=""><i class="fab fa-facebook-f social-icon"
                                                style="font-size: 30px;"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <style>
                    #copyright {
                        text-align: center;
                        /* Căn giữa văn bản */
                        padding: 20px;
                        /* Thêm khoảng cách cho đẹp */
                        background-color: #f8f9fa;
                        /* Màu nền (tùy chọn) */
                    }

                    .copyright-content {
                        margin: 5px 0;
                        /* Thêm khoảng cách giữa các đoạn văn */
                    }
                </style>

                <div id="copyright">
                    <div class="container">
                        <p class="copyright-content">©2021 sport Bản quyền thuộc về Công ty TNHH Sport Việt Nam -
                            MSDN: 0108308449. Mọi hành vi sao chép đều là phạm pháp nếu không có sự cho phép bằng văn
                            bản của chúng tôi.</p>
                        <p class="copyright-content">67,đường 1,đỗ xuân hợp,thành phố Thủ Đức. Email: vansu@2003, Số
                            điện thoại: 0383735783</p>
                        <p class="copyright-content">Số Giấy chứng nhận đăng ký doanh nghiệp: 0108308449, ngày cấp:
                            06/06/2018, nơi cấp: Sở Kế hoạch và Đầu tư TP Hồ Chí Minh</p>
                        <p class="author-copyright">copyright© by <a href="https://facebook.com">vansu</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="move-on-top" style="position: fixed; bottom: 20px; right: 20px;">
            <div class="move-on-top__container">
                <a href="#top">
                    <i class="fas fa-arrow-up"
                        style="border-radius: 50%; box-shadow: 0 4px 8px rgba(117, 106, 106, 0.2); 
                     padding: 10px; border: 2px solid #a19e9e; background-color: #d5dedf; 
                     display: inline-flex; justify-content: center; align-items: center;"></i>
                </a>
            </div>
        </div>
    </footer>



    <!-- jQuery -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>

    <!-- Swiper JS -->
    <script src="{{ asset('https://unpkg.com/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js') }}"></script>
    <!-- Custom JS for Swiper -->
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            spaceBetween: 10,
            loop: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
        });
    </script>
    <script>
        document.querySelector('.move-on-top-btn').addEventListener('click', function() {
           setTimeout(() => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
           }, 5500);
        });
    </script>



</body>
@yield('footer')

</html>
