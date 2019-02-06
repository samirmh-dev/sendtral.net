@extends('layouts.app')

@section('content')
    <!-- BEGIN MAIN WRAPPER -->
    <div class="body-wrap">
        <div class="login login-v3">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image">
                    <img src="http://www.apexinformatics.com/sendtral/assets/img/banner-bg3.jpg" data-id="login-cover-image" alt=""/>
                </div>
                <div class="news-caption">
                    {{--<h4 class="caption-title"><img src="http://via.placeholder.com/106x20" alt=""/><span class="hide">Test</span></h4>--}}
                    {{--<p>--}}
                        {{--Download the <img src="http://via.placeholder.com/106x20" style="width: 80px;vertical-align:  text-top;margin-right: 3px;" alt=""/>. Lorem ipsum dolor sit amet, consectetur adipiscing elit.--}}
                    {{--</p>--}}
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content fullvh">
                <!-- begin login-header -->
                <div class="login-header" style="width: 500px">
                    <div class="brand">
                        Sendtral
                        <small>Login to your account</small>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                  @if (session('status'))
                        <div class="form-group">


                            <div class="alert success">{{ session('status') }}</div>
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST" class="margin-bottom-0 form-default">
                        @csrf

                        <div class="row mb-3">
                            <div class="col-lg-12 sm-form-design ">
                                <div class="input-group input-group--style-1">
                                    <input {{ session('tenant')?'readonly':'' }} type="text" name="company" id=""
                                           class="form-control h5-email {{ $errors->has('company') ? ' has-error' : '' }}"
                                           placeholder="Please enter your company name"
                                           value="{{ session('company_name')??(session('tenant')?session('tenant').'.sendtral.com':(old('company')??'')) }}"
                                           autocomplete="off"
                                           tabindex="1"
                                           maxlength="35" >

                                    @if(!session('tenant'))
                                        <span class="input-group-addon" style="    border-right-style: solid;
    border-right-width: 1px;border-right-color: rgb(230, 230, 230);">
                                                                                .sendtral.com
                                    </span>
                                    @endif

                                    <label class="control-label" style="z-index: 9999;">Company name</label>
                                </div>


                                @if ($errors->has('company'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if(session('tenant'))
                            <div class="row mb-3">
                                <div class="col-lg-12 sm-form-design">
                                    <input required type="text" name="email" id="cf_email"
                                           class="form-control h5-email {{ $errors->has('email') ? ' has-error' : '' }}"
                                           placeholder="Please enter your email address"
                                           value="{{ old('email') }}"
                                           autocomplete="off"
                                           tabindex="1"
                                           maxlength="35" >
                                    <label class="control-label">EMAIL</label>
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-lg-12 sm-form-design">
                                    <input required type="password" name="password" id="cf_password"
                                           class="form-control h5-email {{ $errors->has('password') ? ' has-error' : '' }}"
                                           placeholder="Please enter your password"
                                           value=""
                                           autocomplete="off"
                                           tabindex="2"
                                           maxlength="35" >
                                    <label class="control-label">PASSWORD</label>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="row m-b-10 m-t-15">
                                <div class="col-lg-12">
                                    <div class="checkbox">
                                        <input type="checkbox" checked id="chkRemember">
                                        <label for="chkRemember">Remember me</label>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="login-buttons">
                            <button type="submit" class="btn btn-success btn-block btn-lg sm_bg_6 border-0">Sign me in</button>
                            @if(!session('tenant'))
                                <a class="market-button  m-t-10 float-left m-r-0" href="{{route('register')}}" style="min-width: 49%;padding: 5px 0px 5px 0px;">
                                    <span class="mb-subtitle text-center">Not a member yet?</span>
                                    <span class="mb-title text-center">Register Now</span>
                                </a>
                            @endif
                            <a class="market-button {{ !session('tenant')?'float-left':'' }} m-t-10  m-r-0 m-l-5" href="{{route('password.request')}}" style="padding: 5px 0px 5px 0px;min-width: 49%;">
                                <span class="mb-subtitle text-center">Forget Password?</span>
                                <span class="mb-title text-center">Reset Password</span>
                            </a>
                        </div>

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
