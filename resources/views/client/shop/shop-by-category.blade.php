@extends('layout.homelayout')
@section('content')
    <section class="product-grids section">
        <div class="container-xxl">
            <div class="row">
                <div class="col-lg-3 col-12">
                    <div class="product-sidebar">

                        {{-- LOC SAN PHAM --}}
                        <div class="product-grid-topbar">
                            <div class="row align-items-center ">
                                <div class="product-sorting">
                                    <form>
                                        @csrf
                                        <select name="sort" id="sort" class="form-control w-100">
                                            <option value="none">--Lọc-- </option>
                                            <option value="tang_dan">Giá tăng dần </option>
                                            <option value="giam_dan">Giá giảm dần </option>
                                            <option value="a_z">Tên sản phẩm A tới Z</option>
                                            <option value="z_a">Tên sản phẩm Z tới A</option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="single-widget">
                            <div class="section-title " style="  background-image: url(upload/productImage/line.jpg);">
                                <h5>DANH MỤC</h5>
                            </div>
                            <ul class="list mt-20">
                                @foreach ($category as $cate)
                                    <li>
                                        <a href="{{ URL::to('danh-muc-san-pham/' . $cate->category_id) }}">{{ $cate->category_name }} <span>({{ $cate->quantity }}) </span></a>
                                    </li>
                                @endforeach


                            </ul>
                        </div>


                        {{-- Thuong hieu --}}
                        <div class="single-widget">
                            <div class="section-title mb-20 "
                                style="  background-image: url(upload/productImage/line.jpg);">
                                <h5>THƯƠNG HIỆU</h5>
                            </div>
                            <ul class="list mt-20">
                                @foreach ($brands as $brand)
                                    <li>
                                        <a href="{{ URL::to('thuong-hieu-san-pham/' . $brand->brand_id) }}"
                                            style="color: gray">{{ $brand->brand_name }} <span>({{ $brand->quantity }}) </span> </a>

                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                </div>
                <div class="col-lg-9 col-12">
                    <div class="product-grids-head">
                        <div class="product-grid-topbar">

                        </div>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade show active" id="nav-grid" role="tabpanel"
                                aria-labelledby="nav-grid-tab">
                                <div class="row" id="products_list">
                                    <!-- <div class="col-lg-3 col-md-4 col-12 col-sm-4"> -->
                                    @foreach ($category_by_id as $product_shop)
                                        <div class="col-6  col-sm-3 col-md-15 col-md-3 col-lg-3 col-md-15  ">
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <a
                                                        href="{{ URL::to('/chi-tiet-san-pham/' . $product_shop->product_id) }}">
                                                        <img src="{{ asset('upload/productImage/' . $product_shop->product_image) }}"
                                                            alt="#"></a>
                                                    <div class="button">
                                                        <a href="{{ URL::to('/chi-tiet-san-pham/' . $product_shop->product_id) }}"
                                                            class="btn"><i class="lni lni-cart"></i>Đặt hàng </a>
                                                    </div>

                                                </div>
                                                <div class="product-info">
                                                    <h5 class="title" style="height:60px;width:100%">
                                                        <a
                                                            href="{{ URL::to('/chi-tiet-san-pham/' . $product_shop->product_id) }}">{{ $product_shop->product_name }}</a>
                                                    </h5>
                                                    <ul class="review">
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><i class="lni lni-star-filled"></i></li>
                                                        <li><span>{{ $product_shop->product_view }} lượt xem</span></li>
                                                    </ul>
                                                    <div class="price">
                                                        <span>{{ number_format($product_shop->product_price_sell) }} vnđ</span>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    @endforeach
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="pagination right">
                                            <ul class="pagination-list">
                                                {{-- <li><a href="javascript:void(0)">1</a></li>
                                  <li class="active"><a href="javascript:void(0)">2</a></li>
                                  <li><a href="javascript:void(0)">3</a></li>
                                  <li><a href="javascript:void(0)">4</a></li>
                                  <li><a href="javascript:void(0)"><i class="lni lni-chevron-right"></i></a></li> --}}
                                                {!! $category_by_id->render() !!}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
