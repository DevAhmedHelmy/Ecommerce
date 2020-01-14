<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">

  <!-- iCheck -->

  <link rel="stylesheet" href="{{asset('css/blue.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/toastr.min.js')}}"></script>
  <script src="{{asset('js/sweetalert2.min.js')}}"></script>
</head>

<body class="hold-transition login-page">
@include('admin.layouts._messages')
	
    <div class="login-box">
        <div class="login-logo">
            <a href="/admin"><b>{{ trans('admin.forgotPasswordTitle') }}</b></a>
        </div>
        @include('admin.layouts._errors')
        <!-- /.login-logo -->
        <div class="card">
          <div class="card-body login-card-body">
            <p class="login-box-msg">Reset Password</p>
      
            <form action="{{ adminUrl('store/password/' . $checkToken->token) }}" method="POST">
                {{ csrf_field() }}
              <div class="input-group mb-3">
              <input type="email" value="{{ $checkToken->email }}" class="form-control" placeholder="Email" autocomplete="" name="email">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fa fa-envelope"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="New Password">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fa fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="input-group mb-3">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Password Confirmation">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <span class="fa fa-lock"></span>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-12">
                  <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
                </div>
                <!-- /.col -->
              </div>
            </form>
      
            <p class="mt-3 mb-1">
              <a href="{{ adminUrl('login') }}">Login</a>
            </p>
          </div>
          <!-- /.login-card-body -->
        </div>
      </div>

	<!-- jQuery -->
	<script src="{{asset('js/jquery.min.js')}}"></script>
	<!-- Bootstrap 4 -->

	<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
	<!-- iCheck -->
	<script src="{{asset('js/icheck.min.js')}}"></script>

	<script>
	$(function () {
		$('input').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass   : 'iradio_square-blue',
		increaseArea : '20%' // optional
		})
	})
	</script>
</body>
</html>
