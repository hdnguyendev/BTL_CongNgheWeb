@extends('layout.adminlayout')
@section('content')
<section class="table-components">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title mb-30">
              <h2>DANH SÁCH BÀI VIẾT</h2>
            </div>
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
                <table class="table">
                  <thead>
                    <tr>
                        <th>Mã bài viết</th>
                        <th>Tên bài viết</th>
                        <th>Ảnh</th>
                        <th  class="text-center">Hành động</th>
                    </tr>
                    <!-- end table row-->
                  </thead>
                  <tbody>
                    @foreach ($all as $key => $all_blog)
                    <tr>
                      <td class="min-width">
                        <p>{{$all_blog->blog_id}}</p>
                        </div>
                        <td class="min-width">
                        <p>{{$all_blog->blog_title}}</p>
                    </div>
                      </td>
                     <td>
                      <img src="{{asset('upload/blogImage/'.$all_blog->blog_image)}}" alt="#" width="100" height="100">
                     </td>

                      <td>
                        <div class="text-center">
                            <a href="{{URL::to('edit-blog/'.$all_blog->blog_id)}}" class="btn btn-info text-white" >Sửa</a>
                             <a  onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết này không 😥?')" href="{{URL::to('delete-blog/'.$all_blog->blog_id)}}" class="btn btn-danger" ><i class="fas fa-times"></i></a>
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
