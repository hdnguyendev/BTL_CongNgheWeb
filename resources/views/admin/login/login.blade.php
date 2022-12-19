<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('backend/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/LineIcons.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/quill/bubble.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/quill/snow.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/fullcalendar.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/morris.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/datatable.css') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/main.css') }}" />
    <style>
        .container {
            height: 100vh;
        }

    </style>
</head>

<body>
    @if (Session::get('message_login'))
            <div class="alert alert-danger alert-dismissible fade show">
                <?php
                $message = Session::get('message_login');
                if ($message) {
                    echo ' ' . $message . '';
                    $message = Session::put('message', null);
                }
                ?>

            </div>
        @endif
    <div class="container d-flex  justify-content-center align-items-center ">

        <section class="signin-section">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="auth-cover-wrapper bg-primary-100">
                            <div class="auth-cover">
                                <div class="title text-center">
                                    <h1 class="text-primary mb-10">ONTECH</h1>
                                    <p class="text-medium">
                                        Sign in to your Existing account to continue
                                    </p>
                                </div>
                                <div class="cover-image">
                                    <img src="{{ asset('backend/assets/images/auth/signin-image.svg') }}"
                                        alt="" />
                                </div>
                                <div class="shape-image">
                                    <img src="{{ asset('backend/assets/images/auth/shape.svg') }}" alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6 d-flex align-items-center">
                        <div class="signin-wrapper">
                            <div class="form-wrapper">
                                <h4 class="mb-15">ĐĂNG NHẬP ADMIN</h4>
                                <form action="{{ URL::to('/login') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Email</label>
                                                <input type="email" name="admin_email" placeholder="Email" />
                                            </div>
                                        </div>
                                        @error('admin_email')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror
                                        <!-- end col -->
                                        <div class="col-12">
                                            <div class="input-style-1">
                                                <label>Mật khẩu</label>
                                                <input type="password" name="admin_password" placeholder="Password" />
                                            </div>
                                        </div>
                                        @error('admin_password')
                                            <span style="color:red;">{{ $message }}</span>
                                        @enderror

                                        <div class="col-12">
                                            <div
                                                class="
                        button-group
                        d-flex
                        justify-content-center
                        flex-wrap
                      ">
                                                <button type="submit"
                                                    class="
                          main-btn
                          primary-btn
                          btn-hover
                          w-100
                          text-center
                        ">
                                                    Đăng nhập
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- end row -->
                                </form>
                                {{-- <div class="singin-option pt-40">

                                <p class="text-sm text-medium text-dark text-center">
                                    Don’t have any account yet?
                                    <a href="{{ URL::to('register-auth') }}">Create an account</a>
                                </p>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
        </section>
    </div>

</body>

</html>
