<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/LineIcons.3.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/glightbox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/sweetalert.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/scss/_nav.scss') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/lightslider.css') }}" />
    <script src="{{ asset('frontend/assets/js/jquery1.9.1.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/lightslider.js') }}"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        $(document).ready(function() {
            $("#content-slider").lightSlider({
                loop: true,
                keyPress: true
            });
            $('#image-gallery').lightSlider({
                gallery: true,
                item: 1,
                thumbItem: 5,
                slideMargin: 0,
                speed: 500,
                auto: true,
                loop: true,
                onSliderLoad: function() {
                    $('#image-gallery').removeClass('cS-hidden');
                }
            });
        });
    </script>
    <title>
        @yield('title')

    </title>
</head>

<body>

    {{-- <div class="preloader">
         <div class="preloader-inner">
            <div class="preloader-icon">
               <span></span>
               <span></span>
            </div>
         </div>
      </div>  --}}
    <header class="header navbar-area">
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center d-flex justify-content-between">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="top-middle">
                            <ul class="useful-links text-white">
                                <li>Liên hệ: <span><a href="tel:+84382876922">0382876922</a></span></li>
                            </ul>
                        </div>
                    </div>
                    <style>


                    </style>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end dropdown">

                            <div class="user dropbtn">
                                <p>
                                    <i class="lni lni-user"></i>

                                    <?php $customer_name = Session::get('customer_name');
                                    if ($customer_name) {
                                        echo $customer_name;
                                    } ?>
                                </p>
                            </div>
                            @if (Session::get('customer_id') != null)
                                <div class="dropdown-content">
                                    <a href="{{ URL::to('manage-profile-client/' . Session::get('customer_id')) }}"><i
                                            class="fa-solid fa-user"></i> Tài khoản của tôi</a>

                                    <a href="{{ URL::to('manage-puchase-order/' . Session::get('customer_id')) }}"><i
                                            class="fa-sharp fa-solid fa-box"></i> Đơn hàng của tôi</a>

                                </div>
                            @endif

                            <ul class="user-login">


                                <li>
                                    <?php
                              $customer_id =Session::get('customer_id');
                              if ($customer_id!=NULL) {
                              ?><i class="fa-solid fa-arrow-right-from-bracket text-white"></i>
                                    <a href="{{ URL::to('logout') }}" style="color: white">Đăng xuất</a>
                                    <?php
                           }  else{
                           ?>
                                    <a href="{{ URL::to('login-client') }}" style="color: white">Đăng nhập</a>

                                    <?php
                           }
                           ?>
                                </li>
                                @if ($customer_id === null)
                                    <li>
                                        <a href="{{ URL::to('register-client') }}" style="color: white">Đăng kí</a>

                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <a class="navbar-brand" href="{{ URL::to('/') }}">
                            <img src="{{ asset('frontend\assets\default-monochrome.svg') }}" alt="Logo">
                        </a>
                    </div>
                    <div class="col-lg-6 col-md-7 ">
                        <form action="{{ URL::to('/tim-kiem') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="main-menu-search">
                                <div class="navbar-search search-style-5">

                                    <div class="search-input">
                                        <input type="text" name="keyword" id="keywords"
                                            value="{{ old('keyword') }}" placeholder="Search">
                                        <div id="search_ajax"></div>
                                    </div>
                                    <div class="search-btn">
                                        <button><i class="fa-solid fa-magnifying-glass"></i></button>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-2 col-5">
                        <div class="middle-right-area">

                            <div class="navbar-cart">
                                <div class="wishlist">
                                    <a href="{{ URL::to('wishlist') }}">

                                        <!-- <i class="lni lni-heart" style="color: rgb(204, 24, 24) ;font-weight:bold; font-size: 19px;"></i> -->
                                        <i class="fa-solid fa-heart"
                                            style="color: rgb(214, 73, 73) ;font-weight:bold; font-size: 19px;"></i>

                                    </a>
                                </div>
                                <div class="cart-items">

                                    <a href="{{ URL::to('gio-hang') }}" class="main-bt">
                                        <!-- <i class="lni lni-cart" style=" color: rgb(68, 66, 66);;font-weight:bold;font-size: 22px;"></i> -->
                                        <span>Giỏ hàng<i class="fa-solid fa-cart-shopping"
                                                style=" color: rgb(68, 66, 66);;font-weight:bold;font-size: 19px;"></i></span>

                                        <span class="total-items">
                                            @if (isset($_SESSION['quantity']))
                                                {{ $_SESSION['quantity'] }}
                                            @else
                                                0
                                            @endif
                                        </span>
                                    </a>
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span>
                                                @if (isset($_SESSION['quantity']))
                                                    {{ $_SESSION['quantity'] }}
                                                @else
                                                    0
                                                @endif
                                            </span>
                                            <span>Sản phẩm</span>
                                        </div>
                                        <ul class="shopping-list">
                                            @if (isset($_SESSION['carts']))
                                                {{-- @php
                                     $total = 0;
                                    $subtotal = $key['product_price'] * $key['product_qty'];
                                    $total += $subtotal;
                                     @endphp --}}
                                                @foreach ($_SESSION['carts'] as $key)
                                                    <li>
                                                        <a href="{{ URL::to('/del-product/' . $key['product_id']) }}"
                                                            class="remove" title="Remove this item"><i
                                                                class="lni lni-close"></i></a>
                                                        <div class="cart-img-head">
                                                            <a class="cart-img"
                                                                href="{{ URL::to('/chi-tiet-san-pham/' . $key['product_id']) }}"><img
                                                                    src="{{ asset('upload/productImage/' . $key['product_image']) }}"
                                                                    alt="#"></a>
                                                        </div>
                                                        <div class="content">
                                                            <h4><a
                                                                    href="{{ URL::to('chi-tiet-san-pham/' . $key['product_id']) }}">
                                                                    {{ $key['product_name'] }}</a>
                                                            </h4>
                                                            <p class="quantity">SL: {{ $key['product_qty'] }} <span
                                                                    class="amount">Tiền:
                                                                    {{ number_format($key['product_price'], 0, ',', '.') }}</span>
                                                            </p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                        </ul>

                                        {{-- <div class="bottom">
                                       <div class="total">
                                          <span>Total</span>
                                       @if (!isset($key))
                                       <span class="total-amount">{{ number_format( $key['product_qty']* $key['product_price'], 0, ',', '.') }}</span>
                                        @else
                                        <span class="total-amount">0</span>
                                       @endif
                                       </div>
                                       <div class="button">
                                          <a href="{{URL::to('checkout')}}" class="btn animate">Thanh toán</a>
                                       </div>
                                    </div> --}}
                                    @else
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-9 col-md-6 col-12">
                    <div class="nav-inner">
                        <div class="mega-category-menu">
                            <span class="cat-button"><i class="fa-solid fa-bars"></i>Danh mục sản phẩm</span>
                            <ul class="sub-category">
                                @foreach ($category as $cate)
                                    <li style="display: flex; justify-content:center;">
                                        <a href="{{ URL::to('danh-muc-san-pham/' . $cate->category_id) }}"
                                            style="font-size: 16px"> {{ $cate->category_name }} <i
                                                class="lni lni-chevron-right"></i></a>
                                        <ul class="inner-sub-category">
                                            <div class="row">

                                                <div class="col-lg-4 col-12">
                                                    <li><a href="{{ route('danhmucsp', [$cate->category_id]) }}">
                                                            {{ $cate->category_name }}
                                                            <img src="{{ asset('upload/categoryImage/' . $cate->category_image) }}"
                                                                alt="" style="width: 100px; height:90px"></a>
                                                    </li>
                                                </div>

                                            </div>


                                        </ul>
                                    </li>
                                @endforeach

                            </ul>
                        </div>
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{ URL::to('/') }}" aria-label="Toggle navigation"
                                            style="font-size: 16px; font-weight:bold"> Trang chủ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ URL::to('shop') }}" aria-label="Toggle navigation"
                                            style="font-size: 16px; font-weight:bold">Cửa hàng</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{ URL::to('blog-list') }}"
                                            style="font-size: 16px; font-weight:bold">Thông tin công nghệ</a>

                                    </li>

                                    {{-- <li class="nav-item">
                                <a class="dd-menu collapsed" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#submenu-1-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Pages</a>
                                <ul class="sub-menu collapse" id="submenu-1-2">
                                   <li class="nav-item"><a href="about-us.html">About Us</a></li>
                                   <li class="nav-item"><a href="faq.html">Faq</a></li>
                                   <li class="nav-item"><a href="login.html">Login</a></li>
                                   <li class="nav-item"><a href="register.html">Register</a></li>
                                   <li class="nav-item"><a href="mail-success.html">Mail Success</a></li>
                                   <li class="nav-item"><a href="404.html">404 Error</a></li>
                                </ul>
                             </li> --}}
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="nav-social">
                        <h5 class="title">Theo dõi chúng tôi:</h5>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-facebook-oval"></i></a>
                            </li>

                        </ul>
                    </div>

                </div>
            </div>
        </div>

    </header>
    <div class="pb-100" style="    background-color: #f9f9f9;">
        @yield('content')

    </div>


    <footer class="footer">

        <div class="footer-top">
            <div class="container">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-3 col-md-4 col-12">
                            <div class="footer-logo">
                                <a href="index.html">
                                    <img src="{{ asset('frontend\assets\default-monochrome-white.svg') }}"
                                        alt="Logo">
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>


        <div class="footer-middle mt-50">
            <div class="container">
                <div class="bottom-inner">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="single-footer f-contact">
                                <h3>Get In Touch With Us</h3>
                                <p class="phone">Phone: +1 (900) 33 169 7720</p>
                                <ul>
                                    <li><span>Monday-Friday: </span> 9.00 am - 8.00 pm</li>
                                    <li><span>Saturday: </span> 10.00 am - 6.00 pm</li>
                                </ul>
                                <p class="mail">
                                    <a href="/cdn-cgi/l/email-protection#96e5e3e6e6f9e4e2d6e5fef9e6f1e4fff2e5b8f5f9fb"><span
                                            class="__cf_email__"
                                            data-cfemail="c6b5b3b6b6a9b4b286b5aea9b6a1b4afa2b5e8a5a9ab">[email&#160;protected]</span></a>
                                </p>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="single-footer our-app">
                                <h3>Our Mobile App</h3>
                                <ul class="app-btn">
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-apple"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">App Store</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)">
                                            <i class="lni lni-play-store"></i>
                                            <span class="small-title">Download on the</span>
                                            <span class="big-title">Google Play</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="single-footer f-link">
                                <h3>Information</h3>
                                <ul>
                                    <li><a href="{{ URL::to('login-auth') }}">Login Admin</a></li>
                                    <li><a href="javascript:void(0)">Contact Us</a></li>
                                    <li><a href="javascript:void(0)">Downloads</a></li>
                                    <li><a href="javascript:void(0)">Sitemap</a></li>
                                    <li><a href="javascript:void(0)">FAQs Page</a></li>
                                </ul>
                            </div>

                        </div>
                        <div class="col-lg-3 col-md-6 col-12">

                            <div class="single-footer f-link">
                                <h3>Shop Departments</h3>
                                <ul>
                                    <li><a href="javascript:void(0)">Computers & Accessories</a></li>
                                    <li><a href="javascript:void(0)">Smartphones & Tablets</a></li>
                                    <li><a href="javascript:void(0)">TV, Video & Audio</a></li>
                                    <li><a href="javascript:void(0)">Cameras, Photo & Video</a></li>
                                    <li><a href="javascript:void(0)">Headphones</a></li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>
    {{-- <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="assets/js/bootstrap.min.js"></script> --}}
    <script src="{{ asset('frontend/assets/js/tiny-sl') }}ider.js"></script>
    <script src="{{ asset('frontend/assets/js/glightb') }}ox.min.js"></script>
    {{-- <script src="{{asset('frontend/assets/js/main.js')}}"></script> --}}
    <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/glightbox.min.j') }}s"></script>

    <script type="text/javascript">
        //========= Hero Slider
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
    <script>
        const finaleDate = new Date("February 15, 2023 00:00:00").getTime();

        const timer = () => {
            const now = new Date().getTime();
            let diff = finaleDate - now;
            if (diff < 0) {
                document.querySelector('.alert').style.display = 'block';
                document.querySelector('.container').style.display = 'none';
            }

            let days = Math.floor(diff / (1000 * 60 * 60 * 24));
            let hours = Math.floor(diff % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
            let minutes = Math.floor(diff % (1000 * 60 * 60) / (1000 * 60));
            let seconds = Math.floor(diff % (1000 * 60) / 1000);

            days <= 99 ? days = `0${days}` : days;
            days <= 9 ? days = `00${days}` : days;
            hours <= 9 ? hours = `0${hours}` : hours;
            minutes <= 9 ? minutes = `0${minutes}` : minutes;
            seconds <= 9 ? seconds = `0${seconds}` : seconds;

            document.querySelector('#days').textContent = days;
            document.querySelector('#hours').textContent = hours;
            document.querySelector('#minutes').textContent = minutes;
            document.querySelector('#seconds').textContent = seconds;

        }
        timer();
        setInterval(timer, 1000);
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.send_order').click(function() {
                swal({
                        title: "Xác nhận đơn hàng",
                        text: "\nĐơn hàng sẽ không được hoàn trả khi đặt,bạn có muốn đặt không? \n \n",
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonClass: "btn-danger",
                        confirmButtonText: "Tiếp tục",

                        cancelButtonText: "Đóng",
                        closeOnConfirm: false,
                        closeOnCancel: false
                    },
                    function(isConfirm) {
                        if (isConfirm) {

                            var shipping_email = $('.shipping_email').val();
                            var shipping_name = $('.shipping_name').val();
                            var shipping_address = $('.shipping_address').val();
                            var shipping_phone = $('.shipping_phone').val();
                            var shipping_notes = $('.shipping_notes').val();
                            var shipping_method = $('.payment_select').val();
                            var order_fee = $('.order_fee').val();
                            var order_coupon = $('.order_coupon').val();
                            var _token = $('input[name="_token"]').val();

                            $.ajax({
                                url: '{{ url('/confirm-order') }}',
                                method: 'POST',
                                data: {
                                    shipping_email: shipping_email,
                                    shipping_name: shipping_name,
                                    shipping_address: shipping_address,
                                    shipping_phone: shipping_phone,
                                    shipping_notes: shipping_notes,
                                    _token: _token,
                                    order_fee: order_fee,
                                    order_coupon: order_coupon,
                                    shipping_method: shipping_method
                                },
                                success: function() {
                                    swal("Đơn hàng",
                                        "Đơn hàng của bạn đang chờ xử lý 🥳!",
                                        "success");
                                    setTimeout(function() {
                                        window.location = "/";

                                    }, 5000);

                                }
                            });

                            window.setTimeout(function() {
                                location.reload();
                            }, 300000);

                        } else {
                            swal("Đóng", "Đơn hàng chưa được gửi, làm ơn hoàn tất đơn hàng", "error");

                        }

                    });


            });
        });
    </script>

    {{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> --}}
    <script src="{{ asset('frontend/assets/js/sweetalert.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.add-to-cart').click(function() {

                var id = $(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: `{{ url('/add-cart-ajax') }}`,
                    method: 'POST',
                    data: {
                        cart_product_id: cart_product_id,
                        cart_product_name: cart_product_name,
                        cart_product_image: cart_product_image,
                        cart_product_price: cart_product_price,
                        cart_product_qty: cart_product_qty,
                        _token: _token
                    },
                    success: function() {
                        swal({
                                title: '',
                                text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                showCancelButton: true,
                                cancelButtonText: "Xem tiếp",
                                confirmButtonClass: "btn-success",
                                confirmButtonText: "Đi đến giỏ hàng",
                                closeOnConfirm: false,

                            },
                            function() {
                                window.location.href = '{{ url('/gio-hang') }}';
                            });

                    },
                    error: function(error) {
                        console.log(error)
                    }


                });
            });
        });
    </script>

    <script type="text/javascript">
        function add_wishlist(clicked_id) {
            var id = clicked_id;
            var name = document.getElementById('wishlist_productname' + id).value;
            var price = document.getElementById('wishlist_productprice' + id).value;
            var image = document.getElementById('wishlist_productimage' + id).src;
            var url = 'http://127.0.0.1:8000/chi-tiet-san-pham/' + id;
            var new_Item = {
                'url': url,
                'id': id,
                'name': name,
                'price': price,
                'image': image
            }
            if (localStorage.getItem('data') == null) {
                localStorage.setItem('data', '[]');
            }
            var old_data = JSON.parse(localStorage.getItem('data'));
            var matches = $.grep(old_data, function(obj) {
                return obj.id == id;
            })
            if (matches.length) {
                old_data = old_data.filter(item => item.id != id)

                alert('Sản phẩm này đã được xóa khỏi danh sách yêu thích!')
                location.reload()
            } else {
                old_data.push(new_Item);
                alert('Đã thêm sản phẩm yêu thích ❤️!')
                location.reload()

            }
            localStorage.setItem('data', JSON.stringify(old_data));
        }
    </script>
    <script type="text/javascript">
        $('#keywords').keyup(function() {
            var query = $(this).val();
            if (query != '') {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: "{{ url('/autocomplete-ajax') }}",
                    method: "POST",
                    data: {
                        query: query,
                        _token: _token
                    },
                    success: function(data) {
                        $('#search_ajax').fadeIn();
                        $('#search_ajax').html(data);
                    }
                });

            } else {
                $('#search_ajax').fadeOut();
            }
        });
        $(document).on('click', 'li_search_ajax', function() {
            $('#keywords').val($(this).text());
            $('#search_ajax').fadeOut();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {

            fetch_delivery();

            function fetch_delivery() {
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url: '{{ url('/select-feeship') }}',
                    method: 'POST',
                    data: {
                        _token: _token
                    },
                    success: function(data) {
                        $('#load_delivery').html(data);
                    }
                });
            }
            $(document).on('blur', '.fee_feeship_edit', function() {

                var feeship_id = $(this).data('feeship_id');
                var fee_value = $(this).text();
                var _token = $('input[name="_token"]').val();
                // alert(feeship_id);
                // alert(fee_value);
                $.ajax({
                    url: '{{ url('/update-delivery') }}',
                    method: 'POST',
                    data: {
                        feeship_id: feeship_id,
                        fee_value: fee_value,
                        _token: _token
                    },
                    success: function(data) {
                        fetch_delivery();
                    }
                });

            });
            $('.add_delivery').click(function() {

                var city = $('.city').val();
                var province = $('.province').val();
                var wards = $('.wards').val();
                var fee_ship = $('.fee_ship').val();
                var _token = $('input[name="_token"]').val();
                // alert(city);
                // alert(province);
                // alert(wards);
                // alert(fee_ship);
                $.ajax({
                    url: '{{ url('/insert-delivery') }}',
                    method: 'POST',
                    data: {
                        city: city,
                        province: province,
                        _token: _token,
                        wards: wards,
                        fee_ship: fee_ship
                    },
                    success: function(data) {
                        fetch_delivery();
                    }
                });


            });
            $('.choose').on('change', function() {
                var action = $(this).attr('id');
                var ma_id = $(this).val();
                var _token = $('input[name="_token"]').val();
                var result = '';


                if (action == 'city') {
                    result = 'province';
                } else {
                    result = 'wards';
                }
                $.ajax({
                    url: '{{ url('/select-delivery') }}',
                    method: 'POST',
                    data: {
                        action: action,
                        ma_id: ma_id,
                        _token: _token
                    },
                    success: function(data) {
                        $('#' + result).html(data);
                    }
                });
            });
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.calculate_delivery').click(function() {
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if (matp == '' && maqh == '' && xaid == '') {
                    // alert('Làm ơn chọn để tính phí vận chuyển');
                } else {
                    $.ajax({
                        url: '{{ url('/calculate-fee') }}',
                        method: 'POST',
                        data: {
                            matp: matp,
                            maqh: maqh,
                            xaid: xaid,
                            _token: _token
                        },
                        success: function() {
                            location.reload();
                        }
                    });
                }
            });
        });
    </script>
    <script>
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            margin: 10,
            loop: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        })
    </script>
    <script type="text/javascript">
        @if (isset($data_js))

            $(document).ready(function() {
                $('#sort').on('change', function() {
                    var condition = $(this).val();
                    if (condition == "giam_dan") {
                        var data_all_products = {{ Js::from($data_js) }};
                        console.log(data_all_products);
                        data_all_products.sort(function(a, b) {
                            return b.product_price_sell - a.product_price_sell
                        });
                        var html_data = "";
                        data_all_products.forEach(element => {

                            html_data +=
                                `<div class="col-6  col-sm-3 col-md-15 col-md-3 col-lg-3 col-md-15  ">
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <a
                                                        href="{{ URL::to('/chi-tiet-san-pham/') }}/${element.product_id}">
                                                        <img src="{{ asset('upload/productImage/') }}/${element.product_image}"
                                                            alt="#"></a>
                                                    <div class="button">
                                                        <a href="{{ URL::to('/chi-tiet-san-pham/') }}/${element.product_id}"
                                                            class="btn"><i class="lni lni-cart"></i>Đặt hàng </a>
                                                    </div>

                                                </div>
                                                <div class="product-info">
                                                    <h5 class="title" style="height:60px;width:100%">
                                                        <a
                                                            href="{{ URL::to('/chi-tiet-san-pham/') }}/${element.product_id}">${element.product_name}</a>
                                                    </h5>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><span>${element.product_view} lượt xem</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span> ${element.product_price_sell.replace(/\B(?=(\d{3})+(?!\d))/g, ',')} vnđ</span>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>`
                        });
                        $('#products_list').html(html_data);
                        $('#product_paginate').html("");

                    }
                    if (condition == "tang_dan") {
                        var data_all_products = {{ Js::from($data_js) }};
                        console.log(data_all_products);
                        data_all_products.sort(function(a, b) {
                            return a.product_price_sell - b.product_price_sell
                        });
                        var html_data = "";
                        data_all_products.forEach(element => {

                            html_data +=
                                `<div class="col-6  col-sm-3 col-md-15 col-md-3 col-lg-3 col-md-15  ">
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <a
                                                        href="{{ URL::to('/chi-tiet-san-pham/') }}/${element.product_id}">
                                                        <img src="{{ asset('upload/productImage/') }}/${element.product_image}"
                                                            alt="#"></a>
                                                    <div class="button">
                                                        <a href="{{ URL::to('/chi-tiet-san-pham/') }}/${element.product_id}"
                                                            class="btn"><i class="lni lni-cart"></i>Đặt hàng </a>
                                                    </div>

                                                </div>
                                                <div class="product-info">
                                                    <h5 class="title" style="height:60px;width:100%">
                                                        <a
                                                            href="{{ URL::to('/chi-tiet-san-pham/') }}/${element.product_id}">${element.product_name}</a>
                                                    </h5>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><span>${element.product_view} lượt xem</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span> ${element.product_price_sell.replace(/\B(?=(\d{3})+(?!\d))/g, ',')} đ</span>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>`
                        });
                        $('#products_list').html(html_data);
                        $('#product_paginate').html("");

                    }
                    if (condition == "a_z") {
                        var data_all_products = {{ Js::from($data_js) }};
                        console.log(data_all_products);
                        data_all_products.sort(function(a, b) {
                            let x = a.product_name.toLowerCase()[0];
                            let y = b.product_name.toLowerCase()[0];
                            if (x < y) {
                                return -1;
                            }
                            if (x > y) {
                                return 1;
                            }
                            return 0;
                        });
                        var html_data = "";
                        data_all_products.forEach(element => {

                            html_data +=
                                `<div class="col-6  col-sm-3 col-md-15 col-md-3 col-lg-3 col-md-15  ">
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <a
                                                        href="{{ URL::to('/chi-tiet-san-pham/') }}/${element.product_id}">
                                                        <img src="{{ asset('upload/productImage/') }}/${element.product_image}"
                                                            alt="#"></a>
                                                    <div class="button">
                                                        <a href="{{ URL::to('/chi-tiet-san-pham/') }}/${element.product_id}"
                                                            class="btn"><i class="lni lni-cart"></i>Đặt hàng </a>
                                                    </div>

                                                </div>
                                                <div class="product-info">
                                                    <h5 class="title" style="height:60px;width:100%">
                                                        <a
                                                            href="{{ URL::to('/chi-tiet-san-pham/') }}/${element.product_id}">${element.product_name}</a>
                                                    </h5>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><span>${element.product_view} lượt xem</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span> ${element.product_price_sell.replace(/\B(?=(\d{3})+(?!\d))/g, ',')} đ</span>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>`
                        });
                        $('#products_list').html(html_data);
                        $('#product_paginate').html("");

                    }
                    if (condition == "z_a") {
                        var data_all_products = {{ Js::from($data_js) }};
                        console.log(data_all_products);
                        data_all_products.sort(function(a, b) {
                            let x = a.product_name.toLowerCase()[0];
                            let y = b.product_name.toLowerCase()[0];
                            if (x > y) {
                                return -1;
                            }
                            if (x < y) {
                                return 1;
                            }
                            return 0;
                        });
                        var html_data = "";
                        data_all_products.forEach(element => {

                            html_data +=
                                `<div class="col-6  col-sm-3 col-md-15 col-md-3 col-lg-3 col-md-15  ">
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <a
                                                        href="{{ URL::to('/chi-tiet-san-pham/') }}/${element.product_id}">
                                                        <img src="{{ asset('upload/productImage/') }}/${element.product_image}"
                                                            alt="#"></a>
                                                    <div class="button">
                                                        <a href="{{ URL::to('/chi-tiet-san-pham/') }}/${element.product_id}"
                                                            class="btn"><i class="lni lni-cart"></i>Đặt hàng </a>
                                                    </div>

                                                </div>
                                                <div class="product-info">
                                                    <h5 class="title" style="height:60px;width:100%">
                                                        <a
                                                            href="{{ URL::to('/chi-tiet-san-pham/') }}/${element.product_id}">${element.product_name}</a>
                                                    </h5>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><span>${element.product_view} lượt xem</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span> ${element.product_price_sell.replace(/\B(?=(\d{3})+(?!\d))/g, ',')} đ</span>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>`
                        });
                        $('#products_list').html(html_data);
                        $('#product_paginate').html("");

                    }
                });
            });
        @endif
    </script>
    {{-- <script>
      $(document).ready(function() {
        $( "#slider-range" ).slider({
          range: true,
          min:{{$min}},
          max:{{$max_price_range}},
          steps:10000,
          values: [ {{$min}}, {{$max}}],
          slide: function( event, ui ) {
            $( "#amount" ).val( "vnđ" + ui.values[ 0 ] + " - đ" + ui.values[ 1 ] );
            $( "#start_price" ).val(  ui.values[ 0 ]  );
            $( "#end_price" ).val(  ui.values[ 1 ] );

          }
        });
        $( "#amount" ).val( "đ" + $( "#slider-range" ).slider( "values", 0 ) +
          " - đ" + $( "#slider-range" ).slider( "values", 1 ) );
      } );
      </script> --}}
    <script>
        $(document).ready(function() {


            if ($('.bbb_viewed_slider').length) {
                var viewedSlider = $('.bbb_viewed_slider');

                viewedSlider.owlCarousel({
                    // loop:true,
                    margin: 30,
                    autoWidth:true,
                    autoplay: true,
                    autoplayTimeout: 6000,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        575: {
                            items: 2
                        },
                        768: {
                            items: 3
                        },
                        991: {
                            items: 4
                        },
                        1199: {
                            items: 5
                        }
                    }
                });

                if ($('.bbb_viewed_prev').length) {
                    var prev = $('.bbb_viewed_prev');
                    prev.on('click', function() {
                        viewedSlider.trigger('prev.owl.carousel');
                    });
                }

                if ($('.bbb_viewed_next').length) {
                    var next = $('.bbb_viewed_next');
                    next.on('click', function() {
                        viewedSlider.trigger('next.owl.carousel');
                    });
                }
            }


        });
    </script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0"
        nonce="lcAm15r3"></script>
</body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0"
    nonce="twQCLVmY"></script>
@yield('js')

</html>
