<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="{{ session('tenant')?'noindex, nofollow':'index, follow' }}">
    <meta name="description" content="Cloud Software Suite and SaaS Applications for employee scheduling, dispatching, investigations, lost & found management">
    <meta name="keywords" content="">
    <meta name="author" content="Samir Mammadhasanov <mrsamir.com>">
    @stack('meta')
    <title class="has_page_title">{{ session('tenant')!==NULL?ucfirst(session('tenant')) . ' - Sendtral':'Sendtral - Adding Power to Your Process' }}</title>
    <link rel="stylesheet" href="{{ mix('css/app.min.css') }}">
    @stack('css')
</head>
<body class="">
    <div id="preloader">
        <div class="inner">
            <span class="loader"></span>
        </div>
    </div>

    @yield('content')

    <script src="{{ mix('js/app.min.js')}}"></script>
    @stack('js')
</body>
</html>
