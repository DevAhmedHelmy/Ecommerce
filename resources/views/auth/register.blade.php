@extends('frontend.layouts.master')


@section('content')

<div class="paralax-section-slide-data" style="background-image: url(&quot;img/banner6.jpg&quot;); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center 72.075px;"></div>
<div class="signup-form">

    <!--  START MANAGE CONTEND  -->
    <div class="about_content">
        <div class="container">
            <div class="row">
                <div class="col-12  col-lg-8 offset-lg-2 text-center wow slideInUp" style="visibility: visible; animation-name: slideInUp;">
                    <h1 class="heading">@lang('registeration')</h1>
                    <p class="para_text mt-3"></p>
                </div>
            </div>
        </div>

        <!--  START FORM SECTION  -->
        <div class="row no-gutters">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 pr-lg-0 whitebox wow slideInLeft" style="visibility: visible; animation-name: slideInLeft;">
                <div class="widget logincontainer register-account">
                    <h3 class="bottom35 text-center text-md-left"> @lang('create_your_account')</h3>
                    <form class="getin_form border-form" id="register" action="" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="registerName" class="d-none"></label>
                                    <input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Full Name:" required="required" name="name" id="registerName" value="{{ old('name')}}">
                                    @error('name')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="username" class="d-none"></label>
                                    <input class="form-control @error('username') is-invalid @enderror" type="text" placeholder="User Name:" required="required" name="username" id="username" value="{{ old('username') }}">
                                    @error('username')
                                      <div class="invalid-feedback">
                                        {{ $message }}
                                      </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="registerEmail" class="d-none"></label>
                                    <input name="email" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email:" required="" id="registerEmail" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="registerPass" class="d-none"></label>
                                    <input name="password" class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password:" required="" id="registerPass">
                                    @error('password')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                   @enderror
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="registerPassConfirm" class="d-none"></label>
                                    <input name="password_confirmation" class="form-control" type="password" placeholder="Confirm Password:" required="" id="registerPassConfirm">
                                </div>
                            </div>

                            <div class="col-sm-12 register-btn">
                                <button type="submit" class="btn pink-gradient-btn-into-black">@lang('register')</button>
                                <p class="top20 SignInclass">@lang('already_have_an_account') ? &nbsp;<a href="{{route('login')}}">Sign In</a> </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
        <!--  END FORM SECTION  -->

    </div>
    <!--  END MANAGE CONTEND  -->



</div>
@endsection
