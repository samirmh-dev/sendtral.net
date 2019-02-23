<!DOCTYPE html>
<html lang="en" class="js">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="keywords" content="Cloud Software Suite and SaaS Applications for employee scheduling, dispatching, investigations, lost & found management">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Cloud Software Suite and SaaS Applications for employee scheduling, dispatching, investigations, lost & found management">
    <meta name="author" content="Samir Mammadhasanov <mrsamir.com>">
    @stack('meta')
    <title class="has_page_title">@stack('title', 'Dashboard') - {{ ucfirst(session('tenant')) }} on Sendtral</title>
    <link rel="stylesheet" href="{{ mix('css/app.min.css') }}">
    @stack('css')
    <style>
        .nav-item.dropdown.megamenu a{
            padding: 10px 15px
        }
        .table td, .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #e9ecef;
        }
        .sm-header-style-1 .sm-header {
            background: #242a30;
        }
    </style>
</head>
<body class="">
<div id="preloader">
    <div class="inner">
        <span class="loader"></span>
    </div>
</div>

<!-- BEGIN MAIN WRAPPER -->
<div class="body-wrap">
    <!--BEGIN SM CONTAINER-->
    <div id="sm-container" class="sm-container">
        <!-- BEGIN SM PUSHER -->
        <div class="sm-pusher">
            <div class="sm-content">
                <div class="sm-content-inner">
                    <!-- BEGIN HEADER -->
                    <div class="header">
                        <!-- BEGIN TOP BAR -->
                        <div class="top-navbar" id="top-navbar">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="aux-text d-none d-md-inline-block">
                                            <ul class="inline-links inline-links--style-1">
                                                {{--<li class="d-none d-lg-inline-block">--}}
                                                    {{--<a href="javascript:void(0)"><i class="fa fa-phone"></i> +91 915 954--}}
                                                        {{--7048</a>--}}
                                                {{--</li>--}}
                                                <li>
                                                    <a href="http://sendtral.net" target="_blank"><i class="fa fa-globe"></i>
                                                        www.sendtral.net</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <nav class="top-navbar-menu">
                                            <ul class="top-menu">
                                                {{--<li class="dropdown">--}}
                                                    {{--<a href="javascript:void(0)">--}}
                                                        {{--<i class="fa fa-bell"></i>--}}
                                                    {{--</a>--}}
                                                    {{--<ul class="sub-menu" id="notification_mobile">--}}
                                                        {{--<li>--}}
                                                            {{--<div class="dropdown-cart px-0">--}}
                                                                {{--<div class="dc-header">--}}
                                                                    {{--<h3 class="heading heading-6 strong-600">--}}
                                                                        {{--4 New Notifications--}}
                                                                    {{--</h3>--}}
                                                                {{--</div>--}}
                                                                {{--<div id="notification_scrollbar" data-scrollbar="true" tabindex="1" style="overflow: hidden; outline: none;"><div class="scroll-content">--}}
                                                                        {{--<div class="dc-item">--}}
                                                                            {{--<div class="d-flex align-items-center">--}}
                                                                                {{--<div class="dc-image">--}}
                                                                                    {{--<a href="javascript:void(0)">--}}
                                                                                        {{--<img src="assets/img/avatar/user-1.jpg" class="img-fluid rounded-circle" alt="">--}}
                                                                                    {{--</a>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="dc-content">--}}
                                                                            {{--<span class="d-block dc-product-name text-capitalize strong-600 mb-1">--}}
                                                                                {{--<a href="javascript:void(0)">--}}
                                                                                    {{--Server Error Reports--}}
                                                                                {{--</a>--}}
                                                                            {{--</span>--}}
                                                                                    {{--<span class="dc-quantity">--}}
                                                                                {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry.--}}
                                                                            {{--</span>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="dc-actions">--}}
                                                                                    {{--<button>--}}
                                                                                        {{--<i class="ion-close"></i>--}}
                                                                                    {{--</button>--}}
                                                                                {{--</div>--}}
                                                                            {{--</div>--}}
                                                                        {{--</div>--}}
                                                                        {{--<div class="dc-item">--}}
                                                                            {{--<div class="d-flex align-items-center">--}}
                                                                                {{--<div class="dc-image">--}}
                                                                                    {{--<a href="javascript:void(0)">--}}
                                                                                        {{--<img src="assets/img/avatar/user-2.jpg" class="img-fluid rounded-circle" alt="">--}}
                                                                                    {{--</a>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="dc-content">--}}
                                                                            {{--<span class="d-block dc-product-name text-capitalize strong-600 mb-1">--}}
                                                                                {{--<a href="javascript:void(0)">--}}
                                                                                     {{--New User Registered--}}
                                                                                {{--</a>--}}
                                                                            {{--</span>--}}
                                                                                    {{--<span class="dc-quantity">--}}
                                                                                {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry.--}}
                                                                            {{--</span>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="dc-actions">--}}
                                                                                    {{--<button>--}}
                                                                                        {{--<i class="ion-close"></i>--}}
                                                                                    {{--</button>--}}
                                                                                {{--</div>--}}
                                                                            {{--</div>--}}
                                                                        {{--</div>--}}
                                                                        {{--<div class="dc-item">--}}
                                                                            {{--<div class="d-flex align-items-center">--}}
                                                                                {{--<div class="dc-image">--}}
                                                                                    {{--<a href="javascript:void(0)">--}}
                                                                                        {{--<img src="assets/img/avatar/user-5.jpg" class="img-fluid rounded-circle" alt="">--}}
                                                                                    {{--</a>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="dc-content">--}}
                                                                            {{--<span class="d-block dc-product-name text-capitalize strong-600 mb-1">--}}
                                                                                {{--<a href="javascript:void(0)">--}}
                                                                                     {{--New Email From John--}}
                                                                                {{--</a>--}}
                                                                            {{--</span>--}}
                                                                                    {{--<span class="dc-quantity">--}}
                                                                                {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry.--}}
                                                                            {{--</span>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="dc-actions">--}}
                                                                                    {{--<button>--}}
                                                                                        {{--<i class="ion-close"></i>--}}
                                                                                    {{--</button>--}}
                                                                                {{--</div>--}}
                                                                            {{--</div>--}}
                                                                        {{--</div>--}}
                                                                        {{--<div class="dc-item">--}}
                                                                            {{--<div class="d-flex align-items-center">--}}
                                                                                {{--<div class="dc-image">--}}
                                                                                    {{--<a href="javascript:void(0)">--}}
                                                                                        {{--<img src="assets/img/avatar/user-4.jpg" class="img-fluid rounded-circle" alt="">--}}
                                                                                    {{--</a>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="dc-content">--}}
                                                                            {{--<span class="d-block dc-product-name text-capitalize strong-600 mb-1">--}}
                                                                                {{--<a href="javascript:void(0)">--}}
                                                                                    {{--John Smith--}}
                                                                                {{--</a>--}}
                                                                            {{--</span>--}}
                                                                                    {{--<span class="dc-quantity">--}}
                                                                                {{--Lorem Ipsum is simply dummy text of the printing and typesetting industry.--}}
                                                                            {{--</span>--}}
                                                                                {{--</div>--}}
                                                                                {{--<div class="dc-actions">--}}
                                                                                    {{--<button>--}}
                                                                                        {{--<i class="ion-close"></i>--}}
                                                                                    {{--</button>--}}
                                                                                {{--</div>--}}
                                                                            {{--</div>--}}
                                                                        {{--</div>--}}
                                                                    {{--</div><div class="scrollbar-track scrollbar-track-x" style="display: none;"><div class="scrollbar-thumb scrollbar-thumb-x"></div></div><div class="scrollbar-track scrollbar-track-y" style="display: none;"><div class="scrollbar-thumb scrollbar-thumb-y"></div></div></div>--}}

                                                                {{--<div class="py-4 text-center">--}}
                                                                    {{--<ul class="inline-links inline-links--style-3">--}}
                                                                        {{--<li class="">--}}
                                                                            {{--<a href="javascript:void(0)" class="btn btn-styled btn-sm btn-base-1 text-white text-capitalize">--}}
                                                                                {{--My account--}}
                                                                            {{--</a>--}}
                                                                        {{--</li>--}}
                                                                        {{--<li class="">--}}
                                                                            {{--<a href="javascript:void(0)" class="btn btn-styled btn-sm btn-base-1 text-white text-capitalize">--}}
                                                                                {{--View All--}}
                                                                            {{--</a>--}}
                                                                        {{--</li>--}}
                                                                        {{--<li class="">--}}
                                                                            {{--<a href="javascript:void(0)" class="btn btn-styled btn-sm btn-base-1 text-white text-capitalize">--}}
                                                                                {{--Clear All--}}
                                                                            {{--</a>--}}
                                                                        {{--</li>--}}
                                                                    {{--</ul>--}}
                                                                {{--</div>--}}
                                                            {{--</div>--}}
                                                        {{--</li>--}}
                                                    {{--</ul>--}}
                                                {{--</li>--}}

                                                <li class="dropdown">
                                                    <a class="dropdown-toggle has-badge" href="javascript:void(0)" data-toggle="dropdown" data-hover="dropdown" aria-expanded="false">
                                                        <span style="text-transform: capitalize" class="dropdown-text strong-600 d-none d-lg-inline-block d-xl-inline-block">
                                                            <i class="fa fa-user"></i> {{ auth('web')->user()->fullname }}
                                                        </span>
                                                        <span class="dropdown-text strong-600 d-xl-none d-lg-none d-md-inline-block">
                                                            <i class="fa fa-user"></i>
                                                        </span>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right dropdown-scale">
                                                        <h6 class="dropdown-header">Navigation</h6>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <span class="float-right badge badge-primary">4</span>
                                                            <i class="ion-ios-email-outline icon-lg text-primary"></i>Messages
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="ion-ios-person-outline icon-lg text-primary"></i>Profile
                                                        </a>
                                                        <a class="dropdown-item" href="javascript:void(0)">
                                                            <i class="ion-ios-gear-outline icon-lg text-primary"></i>Settings
                                                        </a>
                                                        <div class="dropdown-divider" role="presentation"></div>
                                                        <form action="{{route('logout')}}" method="POST">
                                                            @csrf
                                                            <button style="cursor: pointer;" class="dropdown-item" href="javascript:void(0)">
                                                                <i class="ion-log-out icon-lg text-primary"></i>Logoff
                                                            </button>
                                                        </form>
                                                    </div>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--END TOP BAR-->



                        <!-- BEGIN NAVBAR -->
                        <nav id="header"
                             class="navbar navbar-expand-lg navbar--bold navbar-light bg-default navbar--bb-1px">
                            <!--navbar-inverse bg-dark-->
                            <div class="container navbar-container py-2">
                                <!-- BEGIN LOGO -->
                                  <a class="navbar-brand" style="text-transform: uppercase" href="{{ route('tenant:dashboard',['tenant'=>session('tenant')]) }}">
                                      {{ auth('web')->user()->tenant()['company_name'] }}
                                  </a>
                                <!--END LOGO-->

                                <div class="d-inline-block">
                                    <!-- BEGIN NAVBAR TOGGLER  -->
                                    <button class="navbar-toggler hamburger hamburger-js hamburger--spring"
                                            type="button" data-toggle="collapse" data-target="#navbar_main">
                                        <span class="hamburger-box">
                                            <span class="hamburger-inner"></span>
                                        </span>
                                    </button>
                                    <!-- END NAVBAR TOGGLER  -->
                                </div>

                                <div class="collapse navbar-collapse align-items-center justify-content-end"
                                     id="navbar_main">
                                    <!-- BEGIN NAVBAR LINKS -->
                                    <ul class="navbar-nav">

                                        {{--<li class="nav-item dropdown megamenu">--}}
                                            {{--<a class="nav-link dropdown-toggle" href="javascript:void(0)"--}}
                                               {{--data-toggle="dropdown"--}}
                                               {{--aria-haspopup="true" aria-expanded="false">--}}
                                                {{--<i class="fa fa-desktop"></i>--}}
                                                {{--Dispatch--}}
                                            {{--</a>--}}

                                            {{--<div class="dropdown-menu">--}}
                                                {{--<div class="mega-dropdown-menu row row-no-padding">--}}


                                                    {{--<div class="col-md-4 ">--}}
                                                        {{--<label class="nav_label">Set Up</label>--}}
                                                        {{--<ul class="megadropdown-links">--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Attentions</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Contacts</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Departments</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Documents</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Document Type</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Employees</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Groups</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Locations</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Lock Locations</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Occurrences</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Shedule On</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Vehicle Services</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Users</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Vehicle Colors</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Vehicle Manufacturers</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Vehicle Models</a> </li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}

                                                    {{--<div class="col-md-4 ">--}}
                                                        {{--<label class="nav_label ">Dispatcher</label>--}}
                                                        {{--<ul class="megadropdown-links">--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Dispatcher Dashboard</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Manager Dashboard</a> </li>--}}
                                                            {{--<li>--}}
                                                                {{--<label class="nav_label m-t-20">Reports</label>--}}
                                                            {{--</li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Activity Report</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Ban & Bar Report </a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Bolo Report</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Custody Report</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Daily Activity Report</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Incidents</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Incident Report </a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Productivity</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Use Of Force</a> </li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}

                                                    {{--<div class="col-md-4 ">--}}
                                                        {{--<label class="nav_label">Logs</label>--}}
                                                        {{--<ul class="megadropdown-links">--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Information Log </a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Money Bag Log </a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Mortuary Log </a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> MV Assistance </a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Parking Exceptions Log </a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Property Pass </a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Valuable Log</a> </li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}

                                        {{--<li class="nav-item dropdown megamenu">--}}
                                            {{--<a class="nav-link dropdown-toggle" href="javascript:void(0)"--}}
                                               {{--data-toggle="dropdown"--}}
                                               {{--aria-haspopup="true" aria-expanded="false">--}}
                                                {{--<i class="fa fa-book"></i>--}}
                                                {{--Investigations--}}
                                            {{--</a>--}}

                                            {{--<div class="dropdown-menu" style="width:30%;">--}}
                                                {{--<div class="mega-dropdown-menu row row-no-padding">--}}


                                                    {{--<div class="col-md-6 ">--}}
                                                        {{--<label class="nav_label">Setup</label>--}}
                                                        {{--<ul class="megadropdown-links">--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Activity </a> </li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Associations </a> </li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Follow-Up </a> </li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Collaborator Type </a> </li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Investigation Type </a> </li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Priority </a> </li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Type Of Clearance </a> </li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}

                                                    {{--<div class="col-md-6 ">--}}
                                                        {{--<label class="nav_label">Investigations </label>--}}
                                                        {{--<ul class="megadropdown-links">--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Investigation Short Form </a> </li>--}}

                                                            {{--<li>--}}
                                                                {{--<label class="nav_label m-t-20"> Investigations Reports </label>--}}

                                                            {{--</li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Investigation Reports </a> </li>--}}

                                                            {{--<li>--}}
                                                                {{--<label class="nav_label m-t-20"> Dashboard </label>--}}

                                                            {{--</li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Investigation Dashboard </a> </li>--}}


                                                        {{--</ul>--}}
                                                    {{--</div>--}}


                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}


                                        {{--<li class="nav-item dropdown megamenu">--}}
                                            {{--<a class="nav-link dropdown-toggle" href="javascript:void(0)"--}}
                                               {{--data-toggle="dropdown"--}}
                                               {{--aria-haspopup="true" aria-expanded="false">--}}
                                                {{--<i class="fa fa-undo"></i>--}}
                                                {{--Reclaim--}}
                                            {{--</a>--}}

                                            {{--<div class="dropdown-menu" style="width:30%;">--}}
                                                {{--<div class="mega-dropdown-menu row row-no-padding">--}}


                                                    {{--<div class="col-md-6 ">--}}
                                                        {{--<label class="nav_label">Set Up</label>--}}
                                                        {{--<ul class="megadropdown-links">--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Item categories</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Storage Locations</a> </li>--}}
                                                            {{--<li>--}}
                                                                {{--<label class="nav_label m-t-20">Reports</label>--}}
                                                            {{--</li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Disposed Items</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Donated Items</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Found Items </a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Lost Items</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Matched Items</a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Return Items</a> </li>--}}

                                                        {{--</ul>--}}
                                                    {{--</div>--}}

                                                    {{--<div class="col-md-6 ">--}}
                                                        {{--<label class="nav_label ">Items</label>--}}
                                                        {{--<ul class="megadropdown-links">--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Found </a> </li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Lost </a> </li>--}}
                                                            {{--<li>--}}
                                                                {{--<label class="nav_label m-t-20">Dashboard</label>--}}
                                                            {{--</li>--}}
                                                            {{--<li> <a class="dropdown-item" href=""> Reclaim Dashboard</a> </li>--}}

                                                        {{--</ul>--}}
                                                    {{--</div>--}}


                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}



                                        {{--<li class="nav-item dropdown megamenu">--}}
                                            {{--<a class="nav-link dropdown-toggle" href="javascript:void(0)"--}}
                                               {{--data-toggle="dropdown"--}}
                                               {{--aria-haspopup="true" aria-expanded="false">--}}
                                                {{--<i class="fa fa-calendar"></i>--}}
                                                {{--Scheduling--}}
                                            {{--</a>--}}

                                            {{--<div class="dropdown-menu" style="width:30%;">--}}
                                                {{--<div class="mega-dropdown-menu row row-no-padding">--}}


                                                    {{--<div class="col-md-6">--}}
                                                        {{--<label class="nav_label">Setup</label>--}}
                                                        {{--<ul class="megadropdown-links">--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Defaults </a> </li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Open Shifts </a> </li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Shifts </a> </li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Time-off Types  </a> </li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Time Of Log  </a> </li>--}}
                                                            {{--<li>--}}
                                                                {{--<label class="nav_label m-t-20"> Shifts</label>--}}
                                                            {{--</li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Available Shifts </a> </li>--}}
                                                            {{--<li>--}}
                                                                {{--<label class="nav_label m-t-20">Shift Planning</label>--}}
                                                            {{--</li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Shift Planning </a> </li>--}}
                                                        {{--</ul>--}}
                                                    {{--</div>--}}

                                                    {{--<div class="col-md-6">--}}
                                                        {{--<label class="nav_label">Time Clock </label>--}}
                                                        {{--<ul class="megadropdown-links">--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Time Clock </a> </li>--}}

                                                            {{--<li>--}}
                                                                {{--<label class="nav_label m-t-20">Reports</label>--}}
                                                            {{--</li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Employee Time Report </a> </li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Open Shifts Report </a> </li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Time Clock Report </a> </li>--}}

                                                            {{--<li>--}}
                                                                {{--<label class="nav_label m-t-20"> Dashboard </label>--}}
                                                            {{--</li>--}}
                                                            {{--<li>  <a class="dropdown-item" href=""> Sheduling Dashboard </a> </li>--}}

                                                        {{--</ul>--}}
                                                    {{--</div>--}}


                                                {{--</div>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}


                                        <li class="nav-item dropdown megamenu">
                                            <a class="nav-link dropdown-toggle" href="javascript:void(0)"
                                               data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-unlock-alt"></i>
                                                Security
                                            </a>

                                            <div style="width: 200px;"  class="dropdown-menu">
                                                <div class="mega-dropdown-menu row row-no-padding">


                                                    <div class="col-md-12">
                                                        <label class="nav_label"> Security</label>
                                                        <ul class="megadropdown-links">
                                                            <li> <a class="dropdown-item" href="{{route('tenant:access-logs',['tenant'=>session('tenant')])}}"> Access Logs</a> </li>
                                                            <li> <a class="dropdown-item" href="{{url('/permissions/view')}}"> Users</a> </li>
                                                            <li> <a class="dropdown-item" href="{{ route('tenant:roles.index',['tenant'=>session('tenant')]) }}"> Roles</a> </li>

                                                        </ul>
                                                    </div>



                                                </div>
                                            </div>

                                        </li>





                                    </ul>
                                    <!-- END NAVBAR LINKS -->
                                </div>
                                <!-- <div class="d-none d-lg-inline-block d-xl-inline-block"> -->
                                <!-- BEGIN SIDEBAR BUTTON -->
                                <!-- <ul class="navbar-nav ml-auto"> -->
                                <!-- <li class="nav-item nav-item-icon hidden-md-down"> -->
                                <!-- <a href="javascript:void(0)" class="nav-link btn-st-trigger p-r-5" -->
                                <!-- data-effect="sm-effect-1"> -->
                                <!-- <span><i class="fa fa-bars"></i></span> -->
                                <!-- </a> -->
                                <!-- </li> -->
                                <!-- </ul> -->
                                <!-- END SIDEBAR BUTTON -->
                                <!-- </div> -->
                            </div>
                        </nav>
                        <!--END NAV BAR-->
                    </div>


                    @yield('content')

                    <!-- BEGIN FOOTER -->
                    <footer id="footer" class="footer footer-inverse">
                        <div class="footer-bottom py-3">
                            <div class="container">
                                <div class="row cols-xs-space col-sm-space align-items-center">
                                    <div class="col-md-7 col-12">
                                        <div class="text-xs-center text-sm-left">
                                            <ul class="footer-menu">
                                                <li>
                                                    <a href="{{ route('tenant:dashboard',['tenant'=>session('tenant')]) }}" class="p-l-0">DASHBOARD</a>
                                                </li>
                                            </ul>

                                            <div class="copyright mt-1">
                                                <ul class="copy-links">
                                                    <li>
                                                        © 2018 <a href="https://sendtral.net" target="_blank">Sendtral</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Terms</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">License</a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:void(0)">Privacy policy</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-5">
                                        <div class="text-xs-center text-sm-right">
                                            <ul class="social-media social-media--style-1-v4">
                                                <li>
                                                    <a href="javascript:void(0)" target="_blank" data-toggle="tooltip"
                                                       data-original-title="Facebook">
                                                        <i class="fa fa-facebook"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" target="_blank" data-toggle="tooltip"
                                                       data-original-title="Twitter">
                                                        <i class="fa fa-twitter"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" target="_blank" data-toggle="tooltip"
                                                       data-original-title="Instagram">
                                                        <i class="fa fa-instagram"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="javascript:void(0)" target="_blank" data-toggle="tooltip"
                                                       data-original-title="Github">
                                                        <i class="fa fa-github"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                    <!--END FOOTER-->
                </div>
            </div>
        </div>
        <!-- END SM PUSHER -->
    </div>
    <!--END SM CONTAINER-->
</div>
<!-- END MAIN WRAPPER -->

<!-- TO TOP -->
<a href="javascript:void(0)" class="back-to-top btn-back-to-top sm_bg_1"></a>
<script src="{{ mix('js/app.min.js')}}"></script>
@stack('js')
@if (session('verified'))
    <script>setTimeout(()=>{
            toastr["success"]("Your account verified successfully","Success")
        },1000)</script>
@endif
@if (session('success'))
    <script>setTimeout(()=>{
            toastr["success"]("{{ session('success') }}","Success")
        },1000)</script>
@endif
@if (session('warning'))
    <script>setTimeout(()=>{
            toastr["warning"]("{{ session('warning') }}","Warning")
        },1000)</script>
@endif
@if (session('error'))
    <script>setTimeout(()=>{
            toastr["danger"]("{{ session('error') }}","Error")
        },1000)</script>
@endif
</body>
</html>
