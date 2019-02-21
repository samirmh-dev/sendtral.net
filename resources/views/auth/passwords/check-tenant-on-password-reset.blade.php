@extends('layouts.auth')

@push('js')
    @if (session('success'))
        <script>setTimeout(()=>{
                toastr["success"]("{{ session('success') }}","Success")
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
                    Forget password
                </div>
            </div>
            <div class="login-content animated fadeInUp">
                <form action="{{route('password.request')}}" method="POST" class="margin-bottom-0">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-12 sm-form-design">
                            <div class="input-group input-group--style-1">
                                <input required {{ session('tenant')?'readonly':'' }} type="text" name="company" id=""
                                       class="form-control h5-email {{ $errors->has('company') ? '' : '' }}"
                                       placeholder="Please enter your company name"
                                       value="{{ old('company') }}"
                                       autocomplete="off"
                                       tabindex="1"
                                       maxlength="35">

                                @if(!session('tenant'))
                                    <span class="input-group-addon" style="border:1px solid transparent; color: white;background-color: rgba(0, 0, 0, .4)">.sendtral.net</span>
                                @endif

                                <label class="control-label" style="z-index: 9999;">Company name</label>
                            </div>

                            @if ($errors->has('company'))
                                <span class="help-block">
                                    <strong style="color: white">{{ $errors->first('company') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div style="position: relative;">
                        {!! NoCaptcha::display() !!}
                    </div>
                    <br>
                    <div class="login-buttons">
                        <button type="submit" class="btn btn-primary btn-block btn-lg sm_bg_6 border-0">Request password
                            reset
                        </button>
                        <a class="market-button windows-button m-t-10 float-left m-r-0" href="{{route('login')}}"
                           style="padding: 5px 14px 5px 40px; min-width:100%;">
                            <span class="mb-subtitle text-center">Remembered? Click here</span>
                            <span class="mb-title text-center">Login</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
