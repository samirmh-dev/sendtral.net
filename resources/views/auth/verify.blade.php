@extends('layouts.auth')

@push('js')
    @if (session('status'))
        <script>setTimeout(()=>{
                toastr["danger"]("{{ session('status') }}","Success")
            },1000)</script>
    @endif
    @if (session('status-success'))
        <script>setTimeout(()=>{
                toastr["success"]("{{ session('status-success') }}","Success")
            },1000)</script>
    @endif
    @if (session('resent'))
        <script>setTimeout(()=>{
                toastr["success"]("{{ __('A fresh verification link has been sent to your email address.') }}","Success")
            },1000)</script>
    @endif
    @if (\Illuminate\Support\Facades\Input::get('success'))
        <script>setTimeout(()=>{
                toastr["success"]("New company registered successfully","Success")
            },1000)</script>
    @endif
@endpush

@section('content')
    <div class="body-wrap">
        <div class="login login-v3">
            <div class="news-feed">
                <div class="news-image" style="background-image: url('{{ asset('content/banner-bg3.jpeg') }}');background-position: center; background-size: cover;background-repeat: no-repeat">
                </div>
            </div>
            <div class="right-content fullvh">
                <div class="login-header" style="width: 500px">
                    <div class="brand">
                        {{ mb_strtoupper(session('tenant')??'sendtral') }}
                    </div>
                </div>
                <div class="login-content">
                    <hr>

                    <h4 class="text-center mt-5">Verify your email address first</h4>

                    <div class="card-body text-center">
                        {{ __('Before proceeding, please check your email for a verification link.') }}
                        {{ __('If you did not receive the email') }}, <a href="{{ route('tenant:verification.resend',['tenant'=>session('tenant')]) }}">{{ __('click here to request another') }}</a>.
                    </div>

                    <a class="market-button  m-t-10 m-r-0 "
                       href="{{ route('tenant:dashboard',['tenant'=>session('tenant')]) }}"
                       style="padding: 5px 0px 5px 0px;{{ !session('tenant')?'min-width: 49%;':'width:100%' }}">
                        <span class="mb-subtitle text-center">Already verified?</span>
                        <span class="mb-title text-center">Go dashboard</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
