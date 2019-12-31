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
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
@if(session("message"))
    <h1>not found</h1>
@endif
<body>
		<div class="login-box">
				<div class="login-logo">
					<a><b>Admin Rest Password</a>
				</div>
				<!-- /.login-logo -->
				<div class="card">
					<div class="card-body login-card-body">
					 
				
					<form method="POST" action="{{adminUrl('forgot/password')}}">
						@csrf
						<div class="form-group has-feedback">
						<input type="email" name="email" class="form-control" placeholder="@lang('admin.email')">
						<span class="fa fa-envelope form-control-feedback"></span>
						</div>
						 
						<div class="row">
						 
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">@lang('admin.Rest')</button>
						</div>
						<!-- /.col -->
						</div>
					</form>
				
						
					<!-- /.social-auth-links -->
				
					 
					 
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