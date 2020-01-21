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
  <link rel="stylesheet" href="{{asset('adminPanal/css/font-awesome.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('adminPanal/css/adminlte.min.css')}}">

  <!-- iCheck -->

  <link rel="stylesheet" href="{{asset('adminPanal/css/blue.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <script src="{{asset('adminPanal/js/jquery.min.js')}}"></script>
  <script src="{{asset('adminPanal/js/toastr.min.js')}}"></script>
  <script src="{{asset('adminPanal/js/sweetalert2.min.js')}}"></script>
</head>

<body>
@include('admin.layouts._messages')
	<div class="login-box">
		<div class="login-logo">
			<a href="../../index2.html"><b>Admin</b>LTE</a>
		</div>


		<!-- /.login-logo -->
		<div class="card">
			<div class="card-body login-card-body">
			<p class="login-box-msg">Sign in to start your session</p>
@include('admin.layouts._errors')
			<form method="POST" action="{{url('admin/login')}}">
				@csrf
				<div class="form-group has-feedback">
				<input type="email" name="email" class="form-control" placeholder="@lang('admin.email')">
				<span class="fa fa-envelope form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
				<input type="password" name="password" class="form-control" placeholder="@lang('admin.password')">
				<span class="fa fa-lock form-control-feedback"></span>
				</div>
				<div class="row">
				<div class="col-8">
					<div class="checkbox icheck">
					<label>
						<input type="checkbox" name="rememberme" value="1" id="customCheck1"> @lang('admin.Save_credentials')
					</label>
					</div>
				</div>
				<!-- /.col -->
				<div class="col-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">@lang('admin.login')</button>
				</div>
				<!-- /.col -->
				</div>
			</form>


			<!-- /.social-auth-links -->

			<p class="mb-1">
					<a href="{{adminUrl('forgot/password')}}" class="f-w-400">@lang('admin.Reset')</a>
			</p>
			<p class="mb-0">
				<a href="register.html" class="text-center">Register a new membership</a>
			</p>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>


	<!-- jQuery -->
	<script src="{{asset('adminPanal/js/jquery.min.js')}}"></script>
	<!-- Bootstrap 4 -->

	<script src="{{asset('adminPanal/js/bootstrap.bundle.min.js')}}"></script>
	<!-- iCheck -->
	<script src="{{asset('adminPanal/js/icheck.min.js')}}"></script>

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
