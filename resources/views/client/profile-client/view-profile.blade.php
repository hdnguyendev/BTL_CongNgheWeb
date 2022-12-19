@extends('layout.homelayout')
@section('content')
    @if (isset($data_customer))
        <main id="main" class="main mt-20">

            <section class="section profile container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 align-self-center">
                        <form action="{{ URL::to('/update-avatar-profile-client/' . $data_customer->customer_id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                                    <img src="{{ asset('upload/clientImage/' . $data_customer->customer_image) }}"
                                        alt="Profile" height="200px" width="200px" style="border-radius: 100px">
                                    <input type="file" name="client_avatar" required>
                                    <button type="submit" class="btn btn-success">Lưu</button>
                                    <h2>{{ $data_customer->customer_name }}</h2>
                                    <h3>Khách hàng</h3>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-8 align-self-center">
                        @if (Session::get('msg') && Session::get('msg') == 'success' )
                            <div class="alert alert-success">
                                Thay đổi thông tin cá nhân thành công ❤️!
                            </div>
                        @elseif (Session::get('msg') && Session::get('msg') == 'fail')
                            <div class="alert alert-danger">
                                Thay đổi thông tin cá nhân thất bại 😥!
                            </div>
                        @endif
                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">
                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#profile-overview">Thông tin cá nhân</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2">
                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                        <!-- Profile Edit Form -->
                                        <form
                                            action="{{ URL::to('/update-infor-profile-client/' . $data_customer->customer_id) }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">
                                                    Ảnh</label>
                                                <div class="col-md-8 col-lg-9">

                                                </div>

                                            </div>

                                            <div class="row mb-3">
                                                <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Họ Và
                                                    Tên</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input type="text" class="form-control" id="fullName"
                                                        value="{{ $data_customer->customer_name }}" name="customer_name">
                                                </div>
                                            </div>


                                            <div class="row mb-3">
                                                <label for="Job" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="customer_email" type="text" class="form-control"
                                                        value="{{ $data_customer->customer_email }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="Country" class="col-md-4 col-lg-3 col-form-label">SĐT</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="customer_phone" type="text" class="form-control"
                                                        value="{{ $data_customer->customer_phone }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="Address" class="col-md-4 col-lg-3 col-form-label">Địa chỉ giao
                                                    hàng</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="customer_address" type="text" class="form-control"
                                                        value="{{ $data_customer->customer_address }}">
                                                </div>
                                            </div>


                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
                                            </div>
                                        </form><!-- End Profile Edit Form -->
                                    </div>
                                </div><!-- End Bordered Tabs -->
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body pt-3">
                                <!-- Bordered Tabs -->
                                <ul class="nav nav-tabs nav-tabs-bordered">

                                    <li class="nav-item">
                                        <button class="nav-link active" data-bs-toggle="tab"
                                            data-bs-target="#profile-overview">Đổi mật khẩu</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-2">

                                    <div class="tab-pane fade show active profile-overview" id="profile-overview">

                                        <!-- Change Password Form -->
                                        <form
                                            action="{{ URL::to('/update-password-profile-client/' . $data_customer->customer_id) }}"
                                            method="POST">
                                            @csrf
                                            <div class="row mb-3">
                                                <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">Mật khẩu
                                                    mới</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="customer_password" type="password" class="form-control"
                                                        id="newPassword">
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary">Lưu mật khẩu</button>
                                            </div>
                                        </form><!-- End Change Password Form -->
                                    </div>
                                </div><!-- End Bordered Tabs -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">

                </div>
            </section>

        </main><!-- End #main -->
    @endif
@endsection
