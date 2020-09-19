@extends('frontend.layouts.master')


@section('content')

<div class="paralax-section-slide-data" style="background-image: url(&quot;img/banner6.jpg&quot;); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: center 72.075px;"></div>
<div class="signup-form">

    <!--  START MANAGE CONTEND  -->
    <div class="about_content">
        <div class="container">
            <div class="row">
                <div class="col-12  col-lg-8 offset-lg-2 text-center wow slideInUp" style="visibility: visible; animation-name: slideInUp;">
                    <h1 class="heading">@lang('Login')</h1>
                    <p class="para_text mt-3"></p>
                </div>
            </div>
        </div>



        <!--  START FORM SECTION  -->
        <div class="row no-gutters">
            <div class="col-lg-8 offset-lg-2 col-md-12 col-sm-12 pr-lg-0 whitebox wow slideInLeft" style="visibility: visible; animation-name: slideInLeft;">
                <div class="widget logincontainer register-account">
                    <form class="getin_form border-form" id="login" action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="row">


                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <label for="registerEmail" class="d-none"></label>
                                    <input name="email" class="form-control @error('email') is-invalid @enderror" type="email" placeholder="Email:" required="" id="registerEmail">
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
                                    <input name="password" class="form-control" type="password" placeholder="Password:" required="" id="registerPass">
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <div class="form-group bottom35">
                                    <div class="form-check text-left">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                            <label class="custom-control-label" for="defaultUnchecked">Remember me on this device</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-12 register-btn">
                                <button type="submit" class="btn pink-gradient-btn-into-black">@lang('login')</button>
                                <p class="top20 SignInclass">@lang('dont_have_an_account') ? &nbsp;<a href="{{route('register')}}">@lang('sign_up')</a> </p>

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
