@extends('layout.adminlayout')
@section('content')
    <section class="section">

        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title mb-30">
                            <h2>Thông tin tài khoản</h2>
                        </div>
                    </div>
                    <!-- end col -->

                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->
            <form action="{{ URL::to('save-profile-ad/' . Auth::user()->admin_id) }}" method="POST"
                enctype="multipart/form-data">

                @csrf

                <!-- end col -->
                <div class="col-lg-12">
                    <div class="card-style settings-card-2 mb-30">
                        <div class="title mb-30">
                            <h6>My Profile</h6>
                        </div>
                        <form action="#">
                            <div class="row">

                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Tên user</label>
                                        <input type="text" placeholder="Full Name" value="{{ Auth::user()->admin_name }}"
                                            name="admin_name" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Email</label>
                                        <input type="email" placeholder="Email" value="{{ Auth::user()->admin_email }}"
                                            name="admin_email" />
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>SĐT</label>
                                        <input type="text" placeholder="" value="{{ Auth::user()->admin_phone }}"
                                            name="admin_phone" />
                                    </div>
                                </div>
                                {{-- <img src="{{ asset('upload/userImage/' . Auth::user()->admin_image) }}" alt=""> --}}
                                <div class="col-12">
                                    <div class="input-style-1">
                                        <label>Ảnh</label>
                                        <input type="file" placeholder="Email" name="admin_image" />
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Cập nhật</button>
                            <!-- end col -->
                    </div>
                    <!-- end row -->
                </div>
                <!-- end container -->
            </form>
    </section>
@endsection
