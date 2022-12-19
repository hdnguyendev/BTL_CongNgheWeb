@extends('layout.homelayout')
@section('content')
<div class="account-login section">
    <div class="container ">
      <div class="row mt-30">

        <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
          <form class="card login-form" method="POST" action="{{URL::to('/login-customer')}}">
            @csrf
            <div class="card-body">
              <div class="title">
                <h3>ĐĂNG NHẬP NGAY</h3>
              </div>
              <div class="message">
                @if (Session::get('message_success'))
                <div class="alert alert-success">
                    {{ Session::get('message_success') }}
                </div>
                @endif
                @if (Session::get('message'))
                    <div class="alert alert-danger">
                        {{ Session::get('message') }}

                    </div>
                @endif
              </div>
              <div class="form-group input-group">
                <label for="reg-fn">Email</label>
                @if (Session::get('email_register'))
                <input class="form-control" name="email_acc" type="email" id="reg-email" required value="{{ Session::get('email_register')}}">
                @else
                <input class="form-control" name="email_acc" type="email" id="reg-email" required value="{{ old('email_acc')}}">
                @endif

              </div>
              <div class="form-group input-group">
                <label for="reg-fn">Mật khẩu</label>
                <input class="form-control" name="pass_acc" type="password" id="reg-pass" required>
              </div>
              <div class="d-flex flex-wrap justify-content-between bottom-content">

                <a class="" href="{{url::to('/forget-pass')}}"><p style="font-size:16px">Quên mật khẩu</p></a>
              </div>
              <div class="button">
                <button class="btn" type="submit">Đăng nhập</button>
              </div>
              <p class="outer-link">Nếu bạn chưa có tài khoản? <a href="{{url::to('/register-client')}}">Đăng ký ngay</a>
              </p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

@endsection
