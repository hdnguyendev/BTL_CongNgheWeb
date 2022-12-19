@extends('layout.adminlayout')
@section('content')
    <section class="table-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>DANH SÁCH THƯƠNG HIỆU</h2>
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

                            <div class="table-wrapper table-responsive">
                                <table class="table text-center">
                                    <thead>
                                        <tr>
                                            <th>Mã sản phẩm</th>
                                            <th>Tên thương hiệu</th>
                                            <th>Hình ảnh</th>
                                            <th>Trạng thái</th>
                                            <th>Hành động</th>
                                        </tr>
                                        <!-- end table row-->
                                    </thead>
                                    <tbody>
                                        @foreach ($show_all_products as $key => $value_show)
                                            <tr>
                                                <td width=100px>
                                                    <p>{{ $value_show->brand_id }}</p>
                                                </td>
                                                <td>
                                                    <p>{{ $value_show->brand_name }}</p>
                                                </td>
                                                </td>
                                                <td>
                                                    <img src="{{ asset('upload/brandImage/' . $value_show->brand_image) }}"alt=""
                                                        width="80px" height="80px" />
                                                </td>
                                                <td>
                                                    <?php
                        if ($value_show->brand_status == 0)
                        {
                        ?>
                                                    <a
                                                        href="{{ URL::to('/unactive-brand-product/' . $value_show->brand_id) }}"><span
                                                            class="fas fa-eye-slash"
                                                            style=" color:rgb(230, 57, 57);"></span>
                                                        <?php
                        }  else{
                        ?>
                                                        <a
                                                            href="{{ URL::to('/active-brand-product/' . $value_show->brand_id) }}"><span
                                                                class="fas fa-eye" style=" color:rgb(83, 224, 83);"></span>
                                                            <?php
                        }
                        ?>
                                                </td>
                                                <td>
                                                    <div class="">
                                                        <a href="{{ URL::to('edit-brand/' . $value_show->brand_id) }}"
                                                            class="btn btn-info text-white">Sửa</a>
                                                        <a onclick="return confirm('Bạn có chắc chắn muốn xóa?')"
                                                            href="{{ URL::to('delete-brand/' . $value_show->brand_id) }}"
                                                            class="btn btn-danger">Xóa</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- end table row -->
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
