@extends('layouts.auth')

@push('js')
    @if (session('status'))
        <script>setTimeout(()=>{
                toastr["success"]("{{ session('status') }}","Success")
            },1000)</script>
    @endif
    {!!  NoCaptcha::renderJs('en',1,'recaptchaCallback') !!}
    <script>
        function recaptchaCallback() {
            document.querySelectorAll('.g-recaptcha').forEach(function (el) {
                grecaptcha.render(el);
            });
            setTimeout(function(){
                $('#g-recaptcha-response').attr('required',1).css({
                    'display': 'block',
                    'position': 'absolute',
                    'top': '0',
                    'z-index': '-999999',
                });
            },350)
        }
    </script>
@endpush

@section('content')
    <div class="sm_bg_transparent">
        <div class="login login-v2">
            <div class="login-header">
                <div class="brand">
                    Reset your password
                </div>
            </div>
            <div class="login-content animated fadeInUp">
                <form action="{{ route('tenant:password.update',['tenant'=>session('tenant')]) }}" method="POST" class="margin-bottom-0">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="row mb-3">
                        <div class="col-lg-12 sm-form-design">
                            <input type="email" name="email" id="cf_email"
                                   class="form-control h5-email"
                                   placeholder="Please enter your email address"
                                   value="{{ old('email') }}"
                                   autocomplete="off"
                                   tabindex="1"
                                   maxlength="35" required>
                            <label class="control-label">EMAIL</label>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                <strong style="color: white">{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 sm-form-design">
                            <input type="password" name="password"
                                   class="form-control h5-email"
                                   placeholder="Please enter your new password"
                                   value=""
                                   autocomplete="off"
                                   tabindex="1"
                                   maxlength="35" required>
                            <label class="control-label">New Password</label>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                <strong style="color: white">{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-12 sm-form-design">
                            <input type="password" name="password_confirmation"
                                   class="form-control h5-email"
                                   placeholder="Please confirm your new password"
                                   value=""
                                   autocomplete="off"
                                   tabindex="1"
                                   maxlength="35" required>
                            <label class="control-label">Confirm Password</label>
                        </div>
                    </div>
                    <div style="position: relative;display: flex; justify-content: center">
                        {!! NoCaptcha::display() !!}
                    </div>
                    <br>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-primary btn-block btn-lg sm_bg_6 border-0">Reset Password</button>
                        <a class="market-button windows-button m-t-10 float-left m-r-0" href="{{route('login')}}" style="padding: 5px 14px 5px 40px;min-width:100%;">
                            <span class="mb-subtitle text-center">Remembered? Click here</span>
                            <span class="mb-title text-center">Login</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
