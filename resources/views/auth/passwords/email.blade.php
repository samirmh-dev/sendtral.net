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
            <div class="login-content {{ session('status')?'':'animated' }} fadeInUp">
                @if (session('status'))
                    <script>toastr["success"]("Success", "{{ session('status') }}")</script>
                @endif

                <form action="{{route('tenant:password.email',['tenant'=>session('tenant')])}}" method="POST" class="margin-bottom-0">
                    @csrf
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
                        </div>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong style="color: white">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div style="position: relative;display: flex; justify-content: center">
                        {!! NoCaptcha::display() !!}
                    </div>
                    <br>
                    <div class="login-buttons">
                        <button  type="submit" class="btn btn-primary btn-block btn-lg sm_bg_6 border-0">Reset Password</button>
                        <a class="market-button windows-button m-t-10 float-left m-r-0" href="{{route('login')}}" style="padding: 5px 14px 5px 40px; min-width:100%;">
                            <span class="mb-subtitle text-center">Remembered? Click here</span>
                            <span class="mb-title text-center">Login</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
