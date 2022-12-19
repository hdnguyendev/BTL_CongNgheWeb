@extends('layout.adminlayout')
@section('content')
    <section class="table-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>DANH SÁCH SẢN PHẨM</h2>
                        </div>
                    </div>

                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->

            <!-- ========== tables-wrapper start ========== -->
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <h6 class="mb-10"></h6>

                            <div class="table-wrapper table-responsive">
                                <table class="table text-center" id="table">
                                    <thead>
                                        <tr>
                                            <th>Mã sản phẩm</th>
                                            <th>Tên</th>
                                            <th>Hình ảnh</th>
                                            <th>Thư viện ảnh</th>
                                            <th>Số lượng</th>
                                            <th>Trạng thái</th>
                                            <th>Danh mục</th>
                                            <th>Thương hiệu</th>
                                            <th>Hành động</th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        @foreach ($all_product as $key => $item_show)
                                            <tr>
                                                <td class="min-width">
                                                    <p>{{ $item_show->product_id }}</p>
                                                </td>
                                                <td class="min-width" style="width:300px">
                                                    <p>{{ $item_show->product_name }}</p>
                                                </td>
                                                <td class="min-width">
                                                    <img src="{{ asset('upload/productImage/' . $item_show->product_image) }}"
                                                        alt="" height="90" width="90">
                                                </td>
                                                <td class="min-width">
                                                    <a href="{{ URL::to('add-gallery/' . $item_show->product_id) }}" class="text-sm">
                                                        <i class="fa-solid fa-images"></i> Thêm ảnh
                                                    </a>
                                                </td>
                                                <td class="min-width">
                                                    <p>{{ $item_show->product_soluong }}</p>
                                                </td>

                                                <td class="min-width" style="width:70px">
                                                    <?php
                        if ($item_show->product_status == 0)
                        {
                        ?>
                                                    <a href="{{ URL::to('/unactive-product/' . $item_show->product_id) }}"><span
                                                            class="fas fa-eye-slash"
                                                            style=" color:rgb(230, 57, 57);"></span>
                                                        <?php
                        }  else{
                        ?>
                                                        <a href="{{ URL::to('/active-product/' . $item_show->product_id) }}"><span
                                                                class="fas fa-eye" style=" color:rgb(83, 224, 83);"></span>
                                                            <?php
                        }
                        ?>
                                                </td>
                                                <td class="min-width">
                                                    <p>{{ $item_show->category_name }}</p>
                                                </td>
                                                <td class="min-width">
                                                    <p>{{ $item_show->brand_name }}</p>
                                                </td>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <a href="{{ URL::to('edit-product/' . $item_show->product_id) }}"
                                                            class=" btn btn-info text-white">Sửa</a>

                                                        <a onclick="return confirm('Bạn có thật sự muốn xóa?')"
                                                            class="btn btn-danger"
                                                            href="{{ URL::to('delete-product/' . $item_show->product_id) }}">Xóa</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- end table -->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== tables-wrapper end ========== -->
        </div>
        <!-- end container -->
    </section>
@endsection
