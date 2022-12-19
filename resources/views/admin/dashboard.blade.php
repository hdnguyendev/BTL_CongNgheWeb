@extends('layout.adminlayout')
@section('title')
Dashboard
@endsection
@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>ONTECH Dashboard</h2>
                        </div>
                    </div>
                    <!-- end col -->

                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon purple">
                            <i class="lni lni-cart-full"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Đơn đặt hàng</h6>
                            <h3 class="text-bold mb-10">{{ $order_count }}</h3>
                            <p class="text-sm text-success">
                                <i class="lni lni-arrow-up"></i> +2.00%

                            </p>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon success">
                            <i class="lni lni-dollar"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Total Income</h6>
                            <h3 class="text-bold mb-10">$74,567</h3>
                            <p class="text-sm text-success">
                                <i class="lni lni-arrow-up"></i> +5.45%

                            </p>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon primary">
                            <i class="lni lni-credit-cards"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Total Expense</h6>
                            <h3 class="text-bold mb-10">$24,567</h3>
                            <p class="text-sm text-danger">
                                <i class="lni lni-arrow-down"></i> -2.00%

                            </p>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
                <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="icon-card mb-30">
                        <div class="icon orange">
                            <i class="lni lni-user"></i>
                        </div>
                        <div class="content">
                            <h6 class="mb-10">Khách hàng</h6>
                            <h3 class="text-bold mb-10">{{ $customer_count }}</h3>
                            <p class="text-sm text-danger">
                                <i class="lni lni-arrow-down"></i> -25.00%

                            </p>
                        </div>
                    </div>
                    <!-- End Icon Cart -->
                </div>
                <!-- End Col -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card-style mb-30">
                        <div class="title d-flex flex-wrap align-items-center justify-content-between">
                            <div class="left">
                                <h2 class="title mb-30">Thống kê truy cập</h2>
                            </div>
                            <div class="right">
                                <div class="select-style-1">
                                    <div class="select-position select-sm">
                                        <select class="light-bg">
                                            <option value="">Today</option>
                                            <option value="">Yesterday</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- end select -->
                            </div>
                        </div>
                        <!-- End Title -->
                        <div class="table-responsive">
                            <table class="table top-selling-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6 class="text-sm text-medium">Đang online</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">
                                                Tổng tháng trước
                                            </h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">
                                                Tổng tháng nay
                                            </h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">
                                                Tổng một năm
                                            </h6>
                                        </th>
                                        <th>
                                            <h4 class="text-sm text-medium ">
                                                Tổng truy cập
                                            </h4>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                          <div
                                          style="background-color: rgb(255, 208, 80); border-radius:50px 50px 50px 50px; text-align:center;">
                                          <p class="text-sm " style="color: white;font-size:16px;">
                                            {{ $visitor_count }}</p>
                                      </div>

                                        </td>
                                        <td>
                                            <p class="text-sm">{{ $visitor_of_last_month_count }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm">{{ $visitor_of_this_month_count }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm">{{ $visitor_of_year_count }}</p>
                                        </td>
                                        <td>
                                            <p class="text-sm">{{ $visitor_total }}</p>
                                        </td>

                                    </tr>

                                </tbody>
                            </table>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-style mb-30">
                        <div class="title d-flex flex-wrap justify-content-between align-items-center">
                            <div class="left">
                                <h4 class=" text-medium mb-30">Sản phẩm xem nhiều</h4>
                            </div>

                        </div>
                        <!-- End Title -->
                        <div class="table-responsive">
                            <table class="table top-selling-table">
                                <thead>

                                    <tr>

                                        <th>
                                            <h6 class="text-sm text-medium">STT</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">Hình ảnh</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">Tên sản phẩm</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">Lượt xem</h6>
                                        </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @php
                                            $i = 0;
                                        @endphp
                                        @foreach ($product_view as $view)
                                            <td>

                                                <p class="text-sm">{{ ++$i }}</p>
                                            </td>
                                            <td>
                                                <div class="image">
                                                    <img src="{{ asset('upload/productImage/' . $view->product_image) }}"
                                                        alt="" width="50" height="50" />
                                                </div>
                                            </td>

                                            <td>
                                                <p class="text-sm"><a
                                                        href="{{ URL::to('chi-tiet-san-pham/' . $view->product_id) }}">{{ $view->product_name }}</a>
                                                </p>
                                            </td>
                                            <td>
                                                <div
                                                    style="background-color: coral; border-radius:50px 50px 50px 50px; text-align:center;">
                                                    <p class="text-sm " style="color: white;font-size:16px;">
                                                        {{ $view->product_view }}</p>
                                                </div>
                                            </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                  <div class="card-style mb-30">
                      <div class="title d-flex flex-wrap justify-content-between align-items-center">
                          <div class="left">
                              <h4 class="text-medium mb-30">Bài viết xem nhiều</h4>
                          </div>

                      </div>
                      <!-- End Title -->
                      <div class="table-responsive">
                          <table class="table top-selling-table">
                              <thead>

                                  <tr>

                                      <th>
                                          <h6 class="text-sm text-medium">STT</h6>
                                      </th>
                                      <th class="min-width">
                                          <h6 class="text-sm text-medium">Hình ảnh</h6>
                                      </th>
                                      <th class="min-width">
                                          <h6 class="text-sm text-medium">Tên sản phẩm</h6>
                                      </th>
                                      <th class="min-width">
                                          <h6 class="text-sm text-medium">Lượt xem</h6>
                                      </th>

                                      <th></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr>
                                      @php
                                          $i = 0;
                                      @endphp
                                      @foreach ($blog_view as $view_b)
                                          <td>

                                              <p class="text-sm">{{ ++$i }}</p>
                                          </td>
                                          <td>
                                              <div class="image">
                                                  <img src="{{ asset('upload/blogImage/' . $view_b->blog_image) }}"
                                                      alt="" width="50" height="50" />
                                              </div>
                                          </td>

                                          <td>
                                              <p class="text-sm"><a
                                                      href="{{ URL::to('chi-tiet-san-pham/' . $view_b->blog_id) }}">{{ $view_b->blog_title }}</a>
                                              </p>
                                          </td>
                                          <td>
                                              <div
                                                  style="background-color: coral; border-radius:50px 50px 50px 50px; text-align:center;">
                                                  <p class="text-sm " style="color: white;font-size:16px;">
                                                      {{ $view_b->blog_view }}</p>
                                              </div>
                                          </td>

                                  </tr>
                                  @endforeach
                              </tbody>
                          </table>
                          <!-- End Table -->
                      </div>
                  </div>
              </div>
            </div>

        </div>


        <!-- End Row -->
        </div>
        <!-- end container -->
    </section>
@endsection
