@extends('layout.adminlayout')
@section('content')
<section class="tab-components">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title mb-30">
              <h2>THÊM MỚI THƯƠNG HIỆU</h2>
            </div>
          </div>
          <!-- end col -->

        </div>
        <!-- end row -->
      </div>
      <!-- ========== title-wrapper end ========== -->

      <!-- ========== form-elements-wrapper start ========== -->
      <div class="form-elements-wrapper">
        <div class="row">
          <div class="col-lg-12">
            <!-- input style start -->
            <form action="{{URL::to('save-brand')}}" method="POST" enctype="multipart/form-data">
            @csrf
              <div class="card-style mb-30">
              <h6 class="mb-25">Điền thông tin thương hiệu</h6>
              <div class="input-style-1">
                <label>Tên thương hiệu</label>
                <input type="text" name="brand_product_name" placeholder="Thương hiệu" required/>
              </div>

              <div class="input-style-1">
                <label>Ảnh </label>
                <input type="file" name="brand_product_image" required/>
              </div>
              <div class="select-style-2">
                <div class="select-position">
                    <label>Trạng thái </label>
                  <select name="brand_product_status">
                    <option value="1">Hiện</option>
                    <option value="0">Ẩn</option>
                  </select>
                </div>
              </div>

              <button type="submit" name="add_brand_product"class="main-btn success-btn rounded-md btn-hover" >Thêm</button >
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
