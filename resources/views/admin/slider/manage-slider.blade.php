@extends('layout.adminlayout')
@section('content')
<section class="tab-components">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title mb-30">
              <h2>QUẢN LÍ BANNER</h2>
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
            <form action="{{URL::to('insert-slider')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="card-style mb-30">
              <h6 class="mb-25">Thêm banner</h6>
              <div class="input-style-1">
                <label>Tên hình ảnh</label>
                <input type="text" name="slider_name" required/>
              </div>

              <div class="input-style-1">
                <label>Ảnh</label>
                <input type="file" name="slider_image" required />
              </div>
              <div class="select-style-2">
                <div class="select-position">
                    <label>Trạng thái </label>
                  <select  name="slider_status">
                    <option value="1">Hiện</option>
                    <option value="0">Ẩn</option>
                  </select>
                </div>
              </div>

              <button type="submit"name="add_slider" class="main-btn success-btn rounded-md btn-hover" >Thêm</button >
            </div>
            </form>

          </div>
          <!-- end col -->
        </div>
        <!-- end row -->
        <div class="tables-wrapper">
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">DANH SÁCH HÌNH ẢNH BANNER</h6>
                  <p class="text-sm mb-20">

                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table text-center">
                      <thead>
                        <tr>
                            <th>Mã banner</th>
                            <th>Tên</th>
                            <th>Hình ảnh</th>
                            <th>Trạng thái</th>
                            <th>Xóa</th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                      <tbody>
                        @foreach ($all_slide as $key => $slider)
                        <tr>
                          <td width=100px>
                            <p>{{$slider->slider_id}}</p>
                            </div>
                            <td>
                            <p>{{$slider->slider_name}}</p>
                        </div>
                          </td>
                          <td>
                            <img
                                  src="{{asset('upload/sliderImage/'.$slider->slider_image)}}"alt="" width="80px" height="80px" />
                          </td>
                          <td width=100px>
                            <?php
                            if ($slider->slider_status == 0)
                            {
                            ?>
                                <a href="{{URL::to('/unactive-slide/'.$slider->slider_id)}}" ><span class="fas fa-eye-slash" style=" color:rgb(230, 57, 57);"></span>
                                <?php
                            }  else{
                            ?>
                            <a href="{{URL::to('/active-slide/'.$slider->slider_id)}}"><span class="fas fa-eye" style=" color:rgb(83, 224, 83);"></span>
                                <?php
                            }
                            ?>
                          </td>
                          <td>
                            <div class="">
                                 <a  onclick="return confirm('Bạn có chắc chắn muốn xóa banner này không 😥?')" href="{{URL::to('delete-slider/'.$slider->slider_id)}}" class="btn btn-danger" ><i class="fas fa-times"></i></a>
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
      </div>
      <!-- ========== form-elements-wrapper end ========== -->
    </div>
    <!-- end container -->
  </section>
  @endsection
