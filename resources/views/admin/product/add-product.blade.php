@extends('layout.adminlayout')
@section('content')
<section class="tab-components">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title mb-30">
              <h2>THÊM SẢN PHẨM MỚI</h2>
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
            <form action="{{URL::to('save-product')}}" method="POST" enctype="multipart/form-data">
              {{ csrf_field() }}
            <div class="card-style mb-30">
              <h6 class="mb-25">Nhập thông tin sản phẩm</h6>
              <div class="input-style-1">
                <label>Tên sản phẩm</label>
                <input type="text" name="product_name"  placeholder="Tên sản phẩm" required/>
              </div>

              <div class="input-style-1">
                <label>Giá gốc</label>
                <input type="text"  name="product_price" placeholder="vnđ" required/>
              </div>
              <div class="input-style-1">
                <label>Giá bán</label>
                <input type="text"  name="product_price_sell"  placeholder="vnđ" required/>
              </div>

              <div class="input-style-1">
                <label>Ảnh </label>
                <input type="file" name="product_image"  required/>
              </div>
              <div class="input-style-1">
                <label>Số lượng</label>
                <input type="number" name="product_soluong"  placeholder="Số lượng" required/>
              </div>
              <div class="input-style-1">
                <label>Nội dung</label>
                <textarea name="product_content" rows="5"></textarea>
              </div>
              <div class="input-style-1">
                <label>Mô tả</label>
                <textarea  name="product_desc" rows="5"></textarea>
              </div>
              <div class="select-style-2">
                <div class="select-position">
                    <label>Danh mục </label>
                  <select name="product_cate" >
                    @foreach ($cate_product as $item => $category)
                    <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="select-style-2">
                <div class="select-position">
                    <label>Thương hiệu</label>
                  <select name="product_brand">
                    @foreach ($brand_product as $item => $brand)
                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="select-style-2">
                <div class="select-position">
                    <label>Trạng thái </label>
                  <select name="product_status">
                    <option value="1">Hiện</option>
                    <option value="0">Ẩn</option>
                  </select>
                </div>
              </div>

              <button type="submit" name="add_product" class="btn btn-success">Submit</button>
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
