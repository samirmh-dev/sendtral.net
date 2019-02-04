@extends('layouts.app')

@section('content')

    <!-- BEGIN MAIN WRAPPER -->
    <div class="body-wrap">
        <div class="login login-v3 register">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="http://www.apexinformatics.com/sendtral/assets/img/banner-bg4.jpg" data-id="login-cover-image" alt=""/>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content fullvh">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        Sendtral
                        <small>Create a new account</small>
                    </div>
                    <div class="icon">
                        <i class="ion-log-in"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    @if (session('status'))
                        <div class="form-group">
                            <div class="alert alert-danger">{{ session('status') }}</div>
                        </div>
                    @endif
                    <form class="form-default " method="post" action="{{route('register')}}" id="signup-form" >
                    @csrf

                        <div class="row mb-3">
                            <div class="col-lg-12 sm-form-design ">
                                <input type="text" class="form-control h5-email {{ $errors->has('email') ? ' has-error' : '' }}"
                                       placeholder="Please enter your email id" name="email" value="{{ old('email') }}">
                                <label class="control-label">Email</label>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>


                        </div>

                        <div class="row mb-3">
                            <div class="col-lg-12 sm-form-design">
                                <input type="password" class="form-control h5-email  {{ $errors->has('password') ? ' has-error' : '' }}"
                                       placeholder="Please enter your password" name="password" id="password">
                                <label class="control-label">Password</label>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>

                        </div>
                        <div class="row mb-3">

                            <div class="col-lg-12 sm-form-design res-md-m-t-16 res-xs-m-t-16">
                                <input type="password" class="form-control h5-email  {{ $errors->has('password_confirmation') ? ' has-error' : '' }}"
                                       placeholder="Please confirm your password" name="password_confirmation">
                                <label class="control-label">Confirm Password</label>
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-lg-12 sm-form-design res-md-m-t-16 res-xs-m-t-16">
                                <input required type="text" class="form-control h5-email  {{ $errors->has('company_name') ? ' has-error' : '' }}"
                                     value="{{ old('company_name') }}"  placeholder="Please enter your company name" name="company_name">
                                <label class="control-label">Company Name</label>
                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="mt-1">
                            <small class="">By clicking "Sign up" you agree to our terms and conditions</small>
                        </div>

                        <button type="submit"
                                class="btn btn-styled btn-block btn-base-1 mt-4 sm_bg_6 border-0 text-white pull-right">
                            Register Now
                        </button>
                        <a class="market-button windows-button m-t-10 float-left m-r-0" href="{{route('login')}}" style="padding: 5px 14px 5px 15px;min-width: 100%;">
                            <span class="mb-subtitle text-center">Already a Member?</span>
                            <span class="mb-title text-center">Sign In</span>
                        </a>
                        <hr/>
                        <p class="text-center f-s-12">
                            Copyright &copy; 2017-2022 Sendtral. All Rights Reserved | <a href="">Privacy Policy </a>.
                        </p>
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
    </div>
    <!-- END MAIN WRAPPER -->

@endsection
