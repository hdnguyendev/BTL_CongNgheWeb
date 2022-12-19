@extends('layout.adminlayout')
@section('content')
    <section class="tab-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>THÊM MÃ GIẢM GIÁ MỚI</h2>
                        </div>
                    </div>

                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <!-- ========== form-elements-wrapper start ========== -->
            <div class="form-elements-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- input style start -->
                        <form action="{{ URL::to('/insert-coupon-code') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            <div class="card-style mb-30">
                                <h6 class="mb-25">Điền thông tin mã giảm giá</h6>
                                <div class="input-style-1">
                                    <label>Tên mã giảm giá</label>
                                    <input type="text" name="coupon_name" required />
                                </div>
                                <div class="input-style-1">
                                    <label>Mã giảm giá</label>
                                    <input type="text" name="coupon_code" required />
                                </div>
                                <div class="input-style-1">
                                    <label>Nhập số % giảm giá</label>
                                    <input type="text" name="coupon_number" required />
                                </div>

                                <div class="input-style-1">
                                    <label>Số lượng mã</label>
                                    <input type="text" name="coupon_time" required/>
                                </div>


                                <button type="submit"
                                    name="add_brand_product"class="main-btn success-btn rounded-md btn-hover">Thêm</button>
                            </div>
                        </form>

                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== form-elements-wrapper end ========== -->
        </div>
        <!-- end container -->
    </section>
@endsection
