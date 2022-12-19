@section('title')
    Chi tiết sản phẩm
@endsection
@extends('layout.homelayout')
@section('content')
    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 10000000000000;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.9);
            /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content,
        #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @keyframes zoom {
            from {
                transform: scale(0.1)
            }

            to {
                transform: scale(1)
            }
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px) {
            .modal-content {
                width: 100%;
            }
        }
    </style>
    <!-- The Modal -->
    <div id="myModal" class="modal">
        <span class="close">&times;</span>
        <img class="modal-content" id="img01">
        <div id="caption"></div>
    </div>
    <form action="{{ URL::to('checkout') }}" method="POST">
        @foreach ($detail_product as $detail)
            <input type="hidden" id="product_view_id" value="{{ $detail->product_id }}">
        @endforeach
        <!-- End Breadcrumbs -->
        <div class="content pt-50">
            <div class="container">
                <div class="row gt-10">
                    <div class="col-lg-7">
                        <div class="lightslider">
                            <div class="lightslider-item">
                                <div class="clearfix" style="max-width:1500px;">
                                    <ul id="image-gallery">
                                        @foreach ($detail_product as $detail)
                                            <li data-thumb="{{ asset('upload/productImage/' . $detail->product_image) }}">
                                                <img hidden
                                                    src="{{ asset('upload/productImage/' . $detail->product_image) }}"
                                                    id="wishlist_productimage{{ $detail->product_id }}" />
                                                <img src="{{ asset('upload/productImage/' . $detail->product_image) }}"
                                                    id="myImg" />
                                            </li>
                                        @endforeach
                                        @foreach ($gallery as $gallery_image)
                                            <li data-thumb="{{ asset('upload/gallery/' . $gallery_image->gallery_image) }}">
                                                <img src="{{ asset('upload/gallery/' . $gallery_image->gallery_image) }}" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    @foreach ($detail_product as $detail)
                        <input type="hidden" name="product_id" value="{{ $detail->product_id }}">
                        <div class="col-lg-5">
                            <div style="margin: 0 20px;">
                                <div class="title-product">
                                    <h3><a id="wishlist_producturl{{ $detail->product_id }}"
                                            style="color: black">{{ $detail->product_name }} </a> </h3>
                                </div>
                                <div class="row text-center">
                                    <div class="col-3 d-flex align-self-center">
                                        <div class="product-id">
                                            <p>Mã sản phẩm: {{ $detail->product_id }} </p>

                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <div class="wish-button">
                                            <a class="btn button_wishlist" id="{{ $detail->product_id }}"
                                                onclick="add_wishlist(this.id);"><span id="text-wishlist"><i
                                                        class="lni lni-heart"></i></span></a>
                                        </div>

                                    </div>
                                </div>
                                <div class="info-body ">
                                    <h5>Thông tin sản phẩm</h5>
                                    <ul class="normal-list mt-10">
                                        {!! $detail->product_desc !!}
                                    </ul>
                                </div>

                                <div class="price">
                                    @if ($detail->product_price_sell == $detail->product_price)
                                        <h5 class="mt-20 mb-20">Giá yêu thương 💕</h5>
                                        <div class="price-sale mt-10 mb-10">
                                            <div class="km">
                                                <h4>{{ number_format($detail->product_price) }} đ</h4>
                                            </div>
                                            <div class="goc">
                                                <h5>{{ number_format($detail->product_price) }} đ</h5>
                                            </div>
                                        </div>
                                    @else
                                        <h5 class="mt-20 mb-20">Giá khuyến mãi ✨</h5>
                                        <div class="price-sale mt-10 mb-10">
                                            <div class="km">
                                                <h4>{{ number_format($detail->product_price_sell) }} đ</h4>
                                            </div>
                                            <div class="goc">
                                                <h5>{{ number_format($detail->product_price) }} đ</h5>
                                            </div>
                                        </div>
                                    @endif

                                </div>

                                <form>
                                    @csrf
                                    <div class="quantity mt-20">
                                        <div class="row">
                                            <div class="col-lg-5">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-flex ">
                                        <div class="col-2 m-auto">
                                            Số lượng

                                        </div>

                                        <div class="col-2">
                                            <div class="soluong">
                                                <input type="number" value="1"
                                                    class="form-control qty cart_product_qty_{{ $detail->product_id }}"
                                                    name="qty">
                                                <input type="hidden" value="{{ $detail->product_id }}"
                                                    class="cart_product_id_{{ $detail->product_id }}">
                                                <input type="hidden" id="wishlist_productname{{ $detail->product_id }}"
                                                    value="{{ $detail->product_name }}"
                                                    class="cart_product_name_{{ $detail->product_id }}">
                                                <input type="hidden" id="wishlist_productimage{{ $detail->product_id }}"
                                                    value="{{ $detail->product_image }}"
                                                    class="cart_product_image_{{ $detail->product_id }}">
                                                <input type="hidden" id="wishlist_productprice{{ $detail->product_id }}"
                                                    value="{{ number_format($detail->product_price_sell) }}">
                                                <input type="hidden" value="{{ $detail->product_price_sell }}"
                                                    class="cart_product_price_{{ $detail->product_id }}">
                                            </div>
                                        </div>
                                        <div class="col-8">
                                            <div class="bottom-content">
                                                <div class="align-items-start">
                                                    <input type="button" value="Thêm vào giỏ hàng"
                                                        class="btn btn-primary add-to-cart w-100"
                                                        data-id_product="{{ $detail->product_id }}" name="add-to-cart" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="info-body ">
                                        <ul class="normal-list mt-10">
                                            <div class="fb-like" data-href="{{ $url_canonical }}" data-width=""
                                                data-layout="button_count" data-action="like" data-size="small"
                                                data-share="true"></div>

                                            <li><span>Số lượng:</span> {{ $detail->product_soluong }}</li>
                                            <li><span> Sản phẩm chính hãng 100%</span></li>
                                            <li><span>Trả góp lãi suất 0% toàn bộ giỏ hàng</span> </li>
                                            <li><span> Bảo hành tận nơi cho doanh nghiệp</span></li>

                                        </ul>
                                    </div>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row gx-5 mt-20">
            <div class="col-lg-12 ">
                <section class="reviews-wrapper ">
                    <div class="container border-content">
                        <div class="reviews-style">
                            <div class="reviews-menu">
                                <ul class="breadcrumb-list-grid nav nav-tabs border-0" id="myTab" role="tablist">

                                    <li class="nav-item" role="presentation">
                                        <a class="active" id="deatail" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-selected="false">
                                            Chi tiết sản phẩm
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a id="home-tab" data-toggle="tab" href="#home" role="tab"
                                            aria-controls="home" aria-selected="true">
                                            Bình luận
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="deatail">
                                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="details-wrapper">
                                        <div class="fb-comments" data-href="{{ $url_canonical }}" data-width=""
                                            data-numposts="10"></div>
                                    </div>
                                </div>
                                <div class="tab-pane fade show active" id="profile" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <div class="review-wrapper">

                                        <div class="row">
                                            <div class="col-lg-12">
                                                @foreach ($detail_product as $detail)
                                                    <div class="reviews-title">
                                                        <h4 class="title">Đánh giá sản phẩm {{ $detail->product_name }}
                                                        </h4>
                                                    </div>
                                                    <p>{!! $detail->product_content !!}</p>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="bbb_viewed">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="bbb_main_container">
                            <div class="bbb_viewed_title_container">
                                <h3 class="bbb_viewed_title">Sản phẩm liên quan</h3>
                                <div class="bbb_viewed_nav_container">
                                    <div class="bbb_viewed_nav bbb_viewed_prev"><i class="fas fa-chevron-left"></i></div>
                                    <div class="bbb_viewed_nav bbb_viewed_next"><i class="fas fa-chevron-right"></i></div>
                                </div>
                            </div>
                            <div class="bbb_viewed_slider_container">
                                <div class="owl-carousel owl-theme bbb_viewed_slider">
                                    @foreach ($related_product as $related)
                                        <div class="owl-item">
                                            <div class="single-product">
                                                <div class="product-image-2">
                                                    <a href="{{ URL::to('chi-tiet-san-pham/' . $related->product_id) }}"><img
                                                            src="{{ asset('upload/productImage/' . $related->product_image) }}"
                                                            alt="#"></a>
                                                </div>
                                                <div class="product-info">
                                                    @if ($related->product_soluong > 0)
                                                        <span class="category">Còn hàng</span>
                                                    @else
                                                        <span class="category">Hết hàng</span>
                                                    @endif

                                                    <h4 style="height:50px;font-size:14px;margin-bottom:15px;">
                                                        <a
                                                            href="{{ URL::to('chi-tiet-san-pham/' . $related->product_id) }}">{{ $related->product_name }}</a>
                                                    </h4>
                                                    <ul class="review">
                                                        <li><span>{{ $related->product_view }} luợt xem</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>{{ number_format($related->product_price_sell) }} ₫</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>
@endsection
@section('js')
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById('myImg');
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        img.onclick = function() {
            modal.style.display = "block";
            modalImg.src = this.src;
            captionText.innerHTML = this.alt;
        }

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    </script>
    <script>
        $(document).ready(function() {
            var id_product = {{ $id_product }}
            checkWishList(id_product)
        });

        function checkWishList(clicked_id) {
            var id = clicked_id;
            var name = document.getElementById('wishlist_productname' + id).value;
            var price = document.getElementById('wishlist_productprice' + id).value;
            var image = document.getElementById('wishlist_productimage' + id).src;
            var url = document.getElementById('wishlist_producturl' + id).href;
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
                $('#text-wishlist').append('  Xóa sản phẩm khỏi danh sách yêu thích');
            } else {
                $('#text-wishlist').append('  Thêm sản phẩm vào danh sách yêu thích');
            }
        }
    </script>
@endsection
@section('js')
@endsection
