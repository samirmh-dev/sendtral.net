<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title class="has_page_title">Sendtral</title>
    <!-- FAVICON -->
    {{--<link href="http://via.placeholder.com/32x32" rel="icon" type="image/png">--}}
    <!-- BOOTSTRAP -->
    <link rel="stylesheet" href="{{asset('/plugins/bootstrap/css/bootstrap.min.css')}}" type="text/css">
    <!-- JQUERY UI -->
    <link type="text/css" href="{{asset('/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.css')}}" rel="stylesheet">
    <!-- STYLE -->
    <link id="stylesheet" type="text/css" href="{{asset('/css/style.css')}}" rel="stylesheet" media="screen">
    <!-- CUSTOM STYLE -->
    <link type="text/css" href="{{asset('/css/custom.css')}}" rel="stylesheet">
    <!--  MODERNIZR JS -->
    <script src="{{asset('/plugins/modernizr/modernizr-custom.js')}}"></script>
    <!--  PLUGINS -->
    <link type="text/css" href="{{asset('/plugins/perfect-scrollbar/css/perfect-scrollbar.min.css')}}" rel="stylesheet">
</head>
<style>
    .has-error{
        border-color:red !important;
        color:red !important;
    }
    .help-block{
        color:red;
        font-size:14px;
    }
    .state-error + em{
        display: block;
        margin-top: 6px;
        margin-left: 14px;
        padding: 0 1px;
        font-style: normal;
        font-size: 11px;
        line-height: 15px;
        color: #d9534f;
    }
    .state-error .form-control{
        border-color: #db4c4a !important;

    }
    .state-success .form-control{
        border-color: #7edc7f !important;

    }
</style>
<body class="">

<!-- BEGIN PRELOADER -->
<div id="preloader">
    <div class="inner">
        <span class="loader"></span>
    </div>
</div>

@yield('content')

<!-- CORE JS -->
<script src="{{asset('/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{asset('/plugins/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
<script src="{{asset('/plugins/popper/popper.min.js')}}"></script>
<script src="{{asset('/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/slidebar/slidebar.js')}}"></script>
<script src="{{asset('/js/classie.js')}}"></script>
<script src="{{asset('/js/side_menu.js')}}"></script>

<!-- PLUGINS -->
<script src="{{asset('/plugins/pace/pace.min.js')}}"></script>
<script src="{{asset('/plugins/smooth-scrollbar/smooth-scrollbar.js')}}"></script>
<script src="{{asset('/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{asset('/plugins/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js')}}"></script>
<script src="{{asset('/plugins/placeholders/placeholders.js')}}"></script>
<script src="{{asset('/plugins/jquery-validate/jquery.validate.min.js')}}"></script>
<script src="{{asset('/js/extra-signup.js')}}"></script>

<!-- APP JS -->
<script src="{{asset('/js/app.js')}}"></script>

<script>
    $(document).ready(function(){

        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
            $(".alert").slideUp(500);
        });
    });
</script>
</body>
</html>
