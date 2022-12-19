@extends('layout.adminlayout')
@section('content')
<section class="table-components">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title mb-30">
              <h2>DANH SÁCH MÃ GIẢM GIÁ</h2>

            </div>
            <p class="text-sm mb-20">
                <a href="{{URL('/send-coupon')}}" class="btn btn-primary">Gửi mã giảm giá</a>
              </p>
          </div>

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
                        <th>Tên mã giảm giá</th>
                        <th>Mã giảm giá</th>
                        <th>Số lượng giảm giá</th>
                        <th>Điều kiện giảm giá</th>
                        <th>Số giảm</th>
                        <th>Xoá</th>
                    </tr>
                    <!-- end table row-->
                  </thead>
                  <tbody>
                    @foreach ($coupon as $key => $cou)


                    <tr>
                        <td>{{ $cou->coupon_name }}</td>
                        <td>{{ $cou->coupon_code }}</td>
                        <td>{{ $cou->coupon_time }}</td>
                        <td>
                            <?php
                            if($cou->coupon_condition==1){
                             ?>
                             Giảm theo %
                             <?php
                              }else{
                             ?>
                             Giảm theo tiền
                             <?php
                            }
                           ?>
                        </td>
                        <td>
                            <?php
                        if($cou->coupon_condition==1){
                            ?>
                            Giảm {{$cou->coupon_number}} %
                            <?php
                            }else{
                            ?>
                            Giảm {{$cou->coupon_number}} k
                            <?php
                        }
                        ?>
                        </td>
                        <td class="text-center">
                          <a  onclick="return confirm('Bạn có chắc chắn muốn xóa mã giảm giá này không 😥?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="btn btn-danger btn-sm"><i class="fas fa-times"></i></a>
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
