<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from ableproadmin.com/bootstrap/default/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Nov 2019 08:45:55 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>

	<title>Login</title>
	<!-- HTML5 Shim and Respond.js IE11 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 11]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="" />
	<meta name="keywords" content="">
	<meta name="author" content="Phoenixcoded" />
	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">

	<!-- vendor css -->
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	
	


</head>
@if(session("message"))
    <h1>not found</h1>
@endif
<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content">
		<div class="card">
			<div class="row align-items-center text-center">
				<div class="col-md-12">
					<div class="card-body">
						<img src="assets/images/logo-dark.png" alt="" class="img-fluid mb-4">
                        <h4 class="mb-3 f-w-400">@lang('admin.login')</h4>
                        <form method="POST" action="{{url('admin/login')}}">
                            @csrf
                            <div class="form-group mb-3">
                                <label class="floating-label" for="Email">@lang('admin.email')</label>
                                <input type="text" class="form-control" id="Email" name="email"  placeholder="">
                            </div>
                            <div class="form-group mb-4">
                                <label class="floating-label" for="Password">@lang('admin.password')</label>
                                <input type="password" class="form-control" name="password" id="Password" placeholder="">
                            </div>
                            <div class="custom-control custom-checkbox text-left mb-4 mt-2">
                                <input type="checkbox" class="custom-control-input" name="rememberme" value="1" id="customCheck1">
                                <label class="custom-control-label" for="customCheck1">@lang('admin.Save_credentials')</label>
                            </div>
                            <button class="btn btn-block btn-primary mb-4">@lang('admin.login')</button>
						</form>
						<p class="mb-2 text-muted">Forgot password? <a href="{{adminUrl('forgot/password')}}" class="f-w-400">Reset</a></p>
						<p class="mb-2 text-muted">@lang('admin.Don’t_have_an_account')? <a href="auth-signup.html" class="f-w-400">@lang('admin.Signup')</a></p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<!-- Required Js -->
<script src="{{asset('js/vendor-all.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/ripple.js')}}"></script>
<script src="{{asset('js/pcoded.min.js')}}"></script>



</body>


<!-- Mirrored from ableproadmin.com/bootstrap/default/auth-signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 28 Nov 2019 08:45:56 GMT -->
</html>
